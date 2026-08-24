<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Reminder_email extends My_Controller
{

	/**
	 * Reminder interval in days for each frequency setting.
	 *
	 * @var array
	 */
	private $reminder_days = array(
		'weekly'      => 7,
		'two_weekly'  => 14,
		'monthly'     => 30,
		'quarterly'   => 90,
	);

	/**
	 * Initialize the Reminder Email controller.
	 *
	 * Intended to be called by a scheduled cron job (no login required).
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->model('users_model');
		$this->load->model('cases_model');
		$this->load->helper('url');
	}

	/**
	 * Cron entry point — process and send due reminder emails.
	 *
	 * Example cron (daily):
	 * curl https://your-domain/reminder_email
	 *
	 * @return void
	 */
	public function index()
	{
		$this->send();
	}

	/**
	 * Send pending-case reminder emails based on each institution's setting.
	 *
	 * For institutions due by their reminder frequency (weekly / two weekly /
	 * monthly / quarterly), emails all Active users when there are pending
	 * portal cases. From: search@legalads.co.uk
	 *
	 * @return void
	 */
	public function send()
	{
		$institutions = $this->users_model->get_institutions_with_reminder();
		$login_url = rtrim(base_url(), '/') . '/login';

		$summary = array(
			'institutions_checked' => 0,
			'institutions_due'     => 0,
			'emails_sent'          => 0,
			'emails_failed'        => 0,
			'skipped_no_pending'   => 0,
			'details'              => array(),
		);

		foreach ($institutions as $institution) {
			$summary['institutions_checked']++;

			$frequency = strtolower(trim((string) ($institution->reminder ?? '')));
			if (!$this->is_reminder_due($frequency, $institution->last_reminder_sent ?? null)) {
				continue;
			}

			$summary['institutions_due']++;
			$pending_count = $this->cases_model->count_pending_cases_by_institution($institution->id);

			if ($pending_count < 1) {
				$summary['skipped_no_pending']++;
				$summary['details'][] = 'Institution #' . $institution->id . ': skipped (0 pending cases)';
				continue;
			}

			$users = $this->users_model->get_active_users_by_institution($institution->id);
			if (empty($users)) {
				$summary['details'][] = 'Institution #' . $institution->id . ': skipped (no active users)';
				continue;
			}

			$subject = 'Financial Institutions Portal : Pending cases reminder';
			$case_label = $pending_count === 1 ? 'case' : 'cases';
			$body  = 'Just a reminder that there are <strong>' . (int) $pending_count . '</strong> ' . $case_label;
			$body .= ' in the portal pending your review.<br /><br />';
			$body .= 'Please log in to review them here:<br />';
			$body .= '<a href="' . html_escape($login_url) . '">' . html_escape($login_url) . '</a><br /><br />';
			$body .= 'Thanks & Regards,<br /><strong>Legal Ads Search</strong>';

			$sent_for_institution = 0;
			foreach ($users as $user) {
				$response = $this->users_model->send_reminder_mail($user->email, $subject, $body);
				if ($response === 'sent') {
					$summary['emails_sent']++;
					$sent_for_institution++;
				} else {
					$summary['emails_failed']++;
					$summary['details'][] = 'Failed to ' . $user->email . ': ' . $response;
				}
			}

			if ($sent_for_institution > 0) {
				$this->users_model->mark_reminder_sent($institution->id);
				$summary['details'][] = 'Institution #' . $institution->id . ' (' . html_escape($institution->name ?? '') . '): sent to ' . $sent_for_institution . ' user(s), pending=' . $pending_count;
			}
		}

		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($summary));
	}

	/**
	 * Determine whether a reminder should be sent for the given frequency.
	 *
	 * @param string      $frequency          weekly|two_weekly|monthly|quarterly
	 * @param string|null $last_reminder_sent Datetime of last successful send
	 * @return bool
	 */
	private function is_reminder_due($frequency, $last_reminder_sent)
	{
		if (!isset($this->reminder_days[$frequency])) {
			return false;
		}

		if (empty($last_reminder_sent) || $last_reminder_sent === '0000-00-00 00:00:00') {
			return true;
		}

		$last_ts = strtotime($last_reminder_sent);
		if ($last_ts === false) {
			return true;
		}

		$days = (int) $this->reminder_days[$frequency];
		$next_due = strtotime('+' . $days . ' days', $last_ts);

		return $next_due !== false && time() >= $next_due;
	}
}
