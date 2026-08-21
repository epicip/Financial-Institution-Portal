<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Login extends My_Controller
{

	/**
	 * Initialize the Login controller.
	 *
	 * Loads helpers, form validation, and the users model used
	 * for authentication and password reset flows.
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();

		$this->load->helper(array('cookie', 'date', 'form'));
		$this->load->library(array('form_validation'));
		$this->load->model('users_model');
	}

	/**
	 * Display the login page.
	 *
	 * Shows the login form when the user is not logged in;
	 * otherwise redirects to the dashboard.
	 *
	 * @return void
	 */
	function index()
	{
		if ($this->checkLogin('E') == '') {
			$this->load->view('login', $this->data);
		} else {
			redirect('dashboard');
		}
	}

	/**
	 * Process the login form submission.
	 *
	 * Validates email and password, verifies reCAPTCHA, checks that the
	 * account is active, and creates the user session on success.
	 * Optionally sets a remember-me cookie.
	 *
	 * @return void
	 */
	public function check_login_process()
	{
		$this->form_validation->set_rules('email_id', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		if ($this->form_validation->run() === FALSE) {
			$this->load->view('login', $this->data);
		} else {

			if ($this->verify_recaptcha()) {

				// get user details from post
				$email_id = $this->input->post('email_id');
				$password = $this->input->post('password');

				// get user details from adprep_financial_institutions_users
				$condition = array('email' => $email_id);
				$user_details = $this->users_model->get_row_details('adprep_financial_institutions_users', $condition);

				// check if user exists in adprep_financial_institutions_users
				if (!empty($user_details) && $user_details->status == 'Active') {

					// check if password is correct
					if (password_verify($password, $user_details->password)) {

						$institutiondata = array(
							'fc_session_institution_id' => $user_details->institutions_id,
							'fc_session_user_id' => $user_details->user_id,
							'fc_session_user_name' => $user_details->name,
							'fc_session_user_type' => strtolower(trim((string) ($user_details->type ?? ''))),
						);
						$this->session->sess_regenerate(TRUE);
						$this->session->set_userdata($institutiondata);
						if ($this->input->post('remember') != '') {
							$cookie = array(
								'name'   => 'institution_session',
								'value'  => $user_details->user_id,
								'expire' => 86400,
								'secure' => TRUE,
								'httponly' => TRUE
							);

							$this->input->set_cookie($cookie);
						}
						$this->setErrorMessage('success', 'Login successfully');

						redirect('dashboard');
					} else {
						$this->setErrorMessage('danger', 'Invalid login credentials');
					}
				} else {
					$this->setErrorMessage('danger', 'your account is not active');
				}
			} else {
				$this->setErrorMessage('error', 'Please try again.');
			}
		}
		redirect('login');
	}

	/**
	 * Log out the current user.
	 *
	 * Clears session user data, removes the institution session cookie,
	 * sets a success message, and redirects to the login page.
	 *
	 * @return void
	 */
	public function logout()
	{
		$institutiondata = array(
			'fc_session_institution_id' => '',
			'fc_session_user_id' => '',
			'fc_session_user_name' => '',
			'fc_session_user_type' => '',
		);
		$this->session->set_userdata($institutiondata);
		$cookie = array(
			'name'   => 'institution_session',
			'value'  => '',
			'expire' => -86400,
			'secure' => TRUE
		);

		$this->input->set_cookie($cookie);
		$this->setErrorMessage('success', 'Successfully logout from your account');
		redirect('login');
	}

	/**
	 * Display the forgot password page.
	 *
	 * @return void
	 */
	function forgot_password()
	{
		$this->load->view('forgot-password', $this->data);
	}

	/**
	 * Process a forgot password request.
	 *
	 * Validates the email, verifies reCAPTCHA, generates a new password,
	 * updates the user record, and emails the new credentials.
	 *
	 * @return void
	 */
	function forgot_password_process()
	{
		$this->form_validation->set_rules('email_id', 'Email', 'required|valid_email');
		if ($this->form_validation->run() === FALSE) {
			$this->load->view('forgot-password', $this->data);
			return;
		} else {
			if ($this->verify_recaptcha()) {
				$email_id = $this->input->post('email_id');
				$condition = array('email' => $email_id);
				$user_details = $this->users_model->get_row_details('adprep_financial_institutions_users', $condition);
				if (!empty($user_details)) {
					$password = $this->generate_strong_password(8);
					$hashed_password = password_hash($password, PASSWORD_DEFAULT);
					$newdata = array('password' => $hashed_password);
					$condition = array('user_id' => $user_details->user_id);
					$this->users_model->update_details('adprep_financial_institutions_users', $newdata, $condition);

					$message = "<strong>New password:</strong> " . $password . "<br /><br />";
					$message .= "You can log in using above password and change.<br /><br />";
					$message .= "Thanks & Regards,<br /><strong>EPE Legal and public notice advertising</strong>";

					$subject = 'EPE Client Portal : Password Reset';

					$response = $this->users_model->common_mail_send($user_details->email, $subject, $message, NR_EPICADS_EMAIL);

					if (!empty($response) && $response == 'sent') {
						$this->setErrorMessage('success', 'New password has been sent to your email');
					} else {
						$this->setErrorMessage("warning", "New password not sent to your email, please try after sometime.");
					}
				} else {
					$this->setErrorMessage('warning', 'Email not found');
				}
			} else {
				$this->setErrorMessage('error', 'Please try again.');
			}
		}
		redirect('forgot-password');
	}

	/**
	 * Verify the Google reCAPTCHA v3 token from the posted form.
	 *
	 * Skips validation when the captcha constant is set; otherwise
	 * verifies the token with Google's siteverify API.
	 *
	 * @return bool True when verification succeeds or captcha is skipped
	 */
	private function verify_recaptcha()
	{
		// If CAPTCHA constant has a value, skip reCAPTCHA validation
		if (!empty(captcha)) {
			return true;
		}

		$url = "https://www.google.com/recaptcha/api/siteverify";
		$data = [
			'secret' => "6Ld-YakaAAAAADRsHLmgYJtrJhQDYlKs8xhjz_CU",
			'response' => $this->input->post('token'),
			'remoteip' => $_SERVER['REMOTE_ADDR']
		];

		$options = array(
			'http' => array(
				'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
				'method'  => 'POST',
				'content' => http_build_query($data)
			)
		);

		$context  = stream_context_create($options);
		$response = @file_get_contents($url, false, $context);

		$res = json_decode($response, true);
		return is_array($res) && !empty($res['success']);
	}
}
