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
     * Loads the case details and renders the case-details view.
     *
     * @param int $case_id The ID of the case to display details for
     * @return void
     */

    function case_details($case_id)
    {
        $this->data['case_id'] = $case_id;
        $this->data['data'] = $this->Cases_model->get_row_details('adprep_wills_probate', ['caseId' => $case_id]);
        $this->load->view('case-details', $this->data);
    }
}
