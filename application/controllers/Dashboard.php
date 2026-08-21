<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends My_Controller
{

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

	function index()
	{
		$all_cases = $this->cases_model->get_all_cases();
		$pending_cases = $this->cases_model->get_pending_cases();
		$users = $this->users_model->get_all_users();

		$this->data['all_cases'] = is_array($all_cases) ? $all_cases : array();
		$this->data['pending_cases'] = is_array($pending_cases) ? $pending_cases : array();
		$this->data['users'] = is_array($users) ? $users : array();
		$this->load->view('dashboard', $this->data);
	}
}
