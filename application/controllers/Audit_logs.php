<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Audit_logs extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();

        if ($this->checkLogin('E') == '') {
            redirect('login');
        }

        $this->load->model('Audit_model');
    }

    public function index()
    {
        if ($this->session->userdata('fc_session_user_type') !== 'admin') {
            $this->setErrorMessage('danger', 'Only administrators can access audit logs.');
            redirect('dashboard');
            return;
        }

        $this->data['audit_logs'] = $this->Audit_model->get_logs_for_current_institution();
        $this->load->view('audit-logs', $this->data);
    }
}
