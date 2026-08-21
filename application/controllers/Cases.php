<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Cases extends My_Controller
{

    /**
     * Initialize the Cases controller.
     *
     * Ensures the user is logged in, then loads helpers, form validation,
     * and the cases model used by this controller.
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
        $this->load->model('Cases_model');
    }

    /**
     * Display all cases for the current institution.
     *
     * Loads every portal case and renders the all-cases view.
     *
     * @return void
     */
    function index()
    {
        $this->data['cases'] = $this->Cases_model->get_all_cases();
        $this->load->view('all-cases', $this->data);
    }

    /**
     * Display pending cases for the current institution.
     *
     * Loads cases that still need review and renders the pending-cases view.
     *
     * @return void
     */
    function pending_cases()
    {
        $this->data['cases'] = $this->Cases_model->get_pending_cases();
        $this->load->view('pending-cases', $this->data);
    }

    /**
     * Display the case details for the given case ID.
     *
     * Loads the case with its email log ID (required for match / no-match
     * updates) and renders the case-details view.
     *
     * @param int         $case_id Case ID from adprep_wills_probate
     * @param int|null    $log_id  Optional email_logs_institutions.id
     * @return void
     */
    function case_details($case_id)
    {
        $case = $this->Cases_model->get_case_by_id($case_id);

        if (empty($case) || empty($case->log_id)) {
            $this->setErrorMessage('warning', 'Case not found or log id is missing for this case.');
            redirect('cases');
            return;
        }

        $this->data['case_id'] = $case_id;
        $this->data['log_id'] = $case->log_id;
        $this->data['data'] = $case;
        $this->load->view('case-details', $this->data);
    }

    /**
     * Store a no-match (no records) response against the email log.
     *
     * Expects POST: log_id
     * For AJAX requests returns JSON so flashdata is shown on the next page load.
     *
     * @return void
     */

    public function no_match()
    {
        $log_id = $this->input->post('log_id');

        if (empty($log_id)) {
            $this->setErrorMessage('danger', 'Log id is missing. Unable to save no-match response.');
            return;
        }

        $this->Cases_model->update_details(
            'email_logs_institutions',
            array(
                'email_status' => 'no_match',
                'email_response' => 'yes',
            ),
            array(
                'id' => $log_id,
                'user_id' => $this->session->userdata('fc_session_institution_id'),
                'notification_type' => 'PORTAL',
            )
        );

        $this->setErrorMessage('success', 'No records response saved successfully.');

        redirect('pending');
    }

    public function match_found()
    {
        $log_id = $this->input->post('log_id');
        $notes = trim((string) $this->input->post('email_notes'));

        if (empty($log_id)) {
            $this->setErrorMessage('danger', 'Log id is missing. Unable to save match response.');
            redirect('pending');
            return;
        }

        if ($notes === '') {
            $this->setErrorMessage('danger', 'Notes are missing. Please add details of the assets found.');
            redirect('pending');
            return;
        }

        $this->Cases_model->update_details(
            'email_logs_institutions',
            array(
                'email_status' => 'match',
                'email_response' => 'yes',
                'email_notes' => $notes,
            ),
            array(
                'id' => $log_id,
                'user_id' => $this->session->userdata('fc_session_institution_id'),
                'notification_type' => 'PORTAL',
            )
        );

        $this->setErrorMessage('success', 'Match response saved successfully.');
        redirect('pending');
    }
}
