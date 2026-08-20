<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Cases extends My_Controller
{

    public function __construct()
    {
        parent::__construct();

        if ($this->checkLogin('E') == '') {
            redirect('login');
        }

        $this->load->helper(array('cookie', 'date', 'form'));
        $this->load->library(array('form_validation'));
        $this->load->model('Cases_model');
    }


    function index()
    {
        $this->load->view('all-cases', $this->data);
    }

    function pending()
    {
        $this->load->view('pending-cases', $this->data);
    }
}
