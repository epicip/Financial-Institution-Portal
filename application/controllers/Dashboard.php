<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends My_Controller
{

	/**
	 * Initialize the Dashboard controller.
	 *
	 * Ensures the user is logged in, then loads helpers, form validation,
	 * and the cases/users models used by the dashboard.
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();

		if ($this->checkLogin('E') == '') {
			redirect('login');
		}

		$this->load->helper(array('cookie', 'date', 'form'));
		$this->load->library(array('form_validation'));
		$this->load->model('cases_model');
		$this->load->model('users_model');
	}

	/**
	 * Display the dashboard page.
	 *
	 * Loads all cases, pending cases, and users for the current institution,
	 * then renders the dashboard view with those counts/lists.
	 *
	 * @return void
	 */
	function index()
	{
		$all_cases = $this->cases_model->get_all_cases();
		$pending_cases = $this->cases_model->get_pending_cases();
		$users = $this->users_model->get_all_users();

		$this->data['all_cases'] = $all_cases;
		$this->data['pending_cases'] = $pending_cases;
		$this->data['users'] = $users;
		$this->load->view('dashboard', $this->data);
	}
}
