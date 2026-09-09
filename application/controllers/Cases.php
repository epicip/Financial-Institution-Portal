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
        $this->load->model('Audit_model');
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
            $this->respond_to_no_match('danger', 'Log id is missing. Unable to save no-match response.');
            return;
        }

        $portal_log = $this->Cases_model->get_portal_log_by_id($log_id);
        if (empty($portal_log)) {
            $this->respond_to_no_match('danger', 'The selected case could not be found.');
            return;
        }
        $this->db->trans_begin();
        $updated = $this->Cases_model->update_details(
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

        $case_name = trim($portal_log->forename . ' ' . $portal_log->surname);
        $audit_saved = $updated && $this->Audit_model->log_event(
            'case_no_match',
            'case',
            $portal_log->case_id,
            'Marked ' . ($case_name !== '' ? $case_name : 'case #' . $portal_log->case_id) . ' as no match.'
        );

        if (!$audit_saved || $this->db->trans_status() === false) {
            $this->db->trans_rollback();
            $this->respond_to_no_match('danger', 'Unable to save the no-match response and audit record.');
            return;
        }

        $this->db->trans_commit();
        $this->respond_to_no_match(
            'success',
            'No records response for case #' . $portal_log->case_id . ' saved successfully.'
        );
    }

    /**
     * Return JSON to AJAX callers without consuming flashdata through a redirect.
     *
     * @param string $type
     * @param string $message
     * @return void
     */
    private function respond_to_no_match($type, $message)
    {
        $this->setErrorMessage($type, $message);

        if ($this->input->is_ajax_request()) {
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode(array(
                    'success' => $type === 'success',
                    'message' => $message,
                )));
            return;
        }

        redirect('pending');
    }

    /**
     * Store a match response against the email log.
     *
     * Validates the submitted log ID and notes, optionally uploads a PDF
     * attachment, updates the case response, and records the audit event.
     *
     * @return void
     */
    public function match_found()
    {
        $log_id = $this->input->post('log_id');
        $notes = trim((string) $this->input->post('email_notes'));

        if (empty($log_id)) {
            $this->setErrorMessage('danger', 'Log id is missing. Unable to save match response.');
            redirect('pending');
            return;
        }

        $portal_log = $this->Cases_model->get_portal_log_by_id($log_id);
        if (empty($portal_log)) {
            $this->setErrorMessage('danger', 'The selected case could not be found.');
            redirect('pending');
            return;
        }

        if ($notes === '') {
            $this->setErrorMessage('danger', 'Notes are missing. Please add details of the assets found.');
            redirect('pending');
            return;
        }

        if (!empty($_FILES['match_attachment']['name'])) {
            $upload_dir = FCPATH . 'files/case_matches/';

            if (!is_dir($upload_dir) && !mkdir($upload_dir, 0777, true) && !is_dir($upload_dir)) {
                $this->setErrorMessage('danger', 'Unable to create upload folder for the PDF attachment.');
                redirect('pending');
                return;
            }

            $file_name = preg_replace('/[^A-Za-z0-9_.-]+/', '_', basename($_FILES['match_attachment']['name']));
            $extension = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
            $allowed_types = array('application/pdf', 'application/octet-stream');

            if ($extension !== 'pdf' || !in_array($_FILES['match_attachment']['type'], $allowed_types, true)) {
                $this->setErrorMessage('danger', 'Only PDF files are allowed for attachment.');
                redirect('pending');
                return;
            }

            $stored_name = time() . '_' . $file_name;
            $destination = $upload_dir . $stored_name;

            if (!move_uploaded_file($_FILES['match_attachment']['tmp_name'], $destination)) {
                $this->setErrorMessage('danger', 'Unable to upload the selected PDF file. Please try again.');
                redirect('pending');
                return;
            }
        }

        $this->db->trans_begin();
        $updated = $this->Cases_model->update_details(
            'email_logs_institutions',
            array(
                'email_status' => 'match',
                'email_response' => 'yes',
                'email_notes' => $notes,
                'email_attached' => isset($stored_name) ? $stored_name : '',
            ),
            array(
                'id' => $log_id,
                'user_id' => $this->session->userdata('fc_session_institution_id'),
                'notification_type' => 'PORTAL',
            )
        );

        $case_name = trim($portal_log->forename . ' ' . $portal_log->surname);
        $audit_saved = $updated && $this->Audit_model->log_event(
            'case_match',
            'case',
            $portal_log->case_id,
            'Marked ' . ($case_name !== '' ? $case_name : 'case #' . $portal_log->case_id) . ' as a match.'
        );

        if (!$audit_saved || $this->db->trans_status() === false) {
            $this->db->trans_rollback();
            if (isset($destination) && is_file($destination)) {
                unlink($destination);
            }
            $this->setErrorMessage('danger', 'Unable to save the match response and audit record.');
            redirect('pending');
            return;
        }

        $this->db->trans_commit();
        $this->setErrorMessage('success', 'Match response saved successfully.');
        redirect('pending');
    }
}
