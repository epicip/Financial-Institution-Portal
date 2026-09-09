<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Audit_logs extends MY_Controller
{
    /**
     * Initialize the audit logs controller.
     *
     * Ensures the user is logged in and loads the audit model.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();

        if ($this->checkLogin('E') == '') {
            redirect('login');
        }

        $this->load->model('Audit_model');
    }

    /**
     * Display audit logs for the current institution.
     *
     * Restricts access to administrators and loads the audit logs view
     * with records associated with the current institution.
     *
     * @return void
     */
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
