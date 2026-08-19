<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

require 'vendor/autoload.php';

/**
 * 
 * This controller contains the common functions
 * @author Teamtweaks
 *
 */
class MY_Controller extends CI_Controller
{
	public $privStatus;
	public $data = array();
	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
		$this->output->set_header('Pragma: no-cache');
		// Clickjacking protection
		$this->output->set_header('X-Frame-Options: DENY');
		$this->output->set_header("Content-Security-Policy: frame-ancestors 'self';");
		$this->load->library('session');
		//for XSS protection
		$this->config->set_item('global_xss_filtering', TRUE);
		$_POST = $this->security->xss_clean($_POST);
		$_GET  = $this->security->xss_clean($_GET);

		/*
		 * Connecting Database
		 */
		$this->load->database();


		if ($this->checkLogin('E') != '') {
			$clientDetails = $this->db->query(
				'SELECT * FROM adprep_financial_institutions_users WHERE id = ?',
				array($this->checkLogin('E'))
			);
			if ($clientDetails->num_rows() == 1) {
				$this->data['client_id'] = $clientDetails->row()->id;
			}
		}

		$this->data['flash_data'] = $this->session->flashdata('sErrMSG');
		$this->data['flash_data_type'] = $this->session->flashdata('sErrMSGType');
	}



	/**
	 * 
	 * This function return the session value based on param
	 * @param $type
	 */
	public function checkLogin($type = '')
	{
		if ($type == 'E') {
			return $this->session->userdata('fc_session_client_id');
		}
	}

	/**
	 * 
	 * This function set the error message and type in session
	 * @param string $type
	 * @param string $msg
	 */
	public function setErrorMessage($type = '', $msg = '')
	{
		$this->session->set_flashdata('sErrMSGType', $type);
		$this->session->set_flashdata('sErrMSG', $msg);
	}

	/* * 
	* Generate a strong password
	* @param int $length Length of the password
	* @return string Generated password
	* 
	* This function generates a strong password with at least one uppercase letter,
	* one lowercase letter, one number, and one special character. The length of the
	* password can be specified as an argument.
   */
	function generate_strong_password($length = 12)
	{
		// Minimum character types
		$uppercase    = chr(rand(65, 90)); // A-Z
		$lowercase    = chr(rand(97, 122)); // a-z
		$number       = chr(rand(48, 57));  // 0-9
		$specialChars = '@#$^*-';
		$special      = $specialChars[rand(0, strlen($specialChars) - 1)];

		// Remaining characters pool
		$all = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789' . $specialChars;

		// Fill the rest of the password length
		$remainingLength = $length - 4;
		$rest = '';
		for ($i = 0; $i < $remainingLength; $i++) {
			$rest .= $all[rand(0, strlen($all) - 1)];
		}

		// Combine all and shuffle
		$password = str_shuffle($uppercase . $lowercase . $number . $special . $rest);

		return $password;
	}
}
