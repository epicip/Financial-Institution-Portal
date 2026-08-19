
	<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

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
			$this->load->model('dashboard_model');
		}

		function index()
		{
			$this->load->view('dashboard', $this->data);
		}
	}
