<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Cases_model extends My_Model
{

    /**
     * Initialize the Cases model.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Get all portal cases for the logged-in institution.
     *
     * Joins email_logs_institutions with adprep_wills_probate and returns
     * cases where notification_type is PORTAL for the current institution.
     *
     * @return array List of case objects, or an empty array on query failure
     */
    public function get_all_cases()
    {
        $this->db->select('adprep_wills_probate.*, email_logs_institutions.id AS log_id, email_logs_institutions.email_status');
        $this->db->from('email_logs_institutions');
        $this->db->join(
            'adprep_wills_probate',
            'adprep_wills_probate.caseId = email_logs_institutions.case_id',
            'inner'
        );
        $this->db->where('email_logs_institutions.notification_type', 'PORTAL');
        $this->db->where(
            'email_logs_institutions.user_id',
            $this->session->userdata('fc_session_institution_id')
        );

        $query = $this->db->get();
        if ($query === false) {
            return array();
        }
        return $query->result();
    }

    /**
     * Get pending portal cases for the logged-in institution.
     *
     * Same base query as get_all_cases(), limited to records where
     * email_status is still NULL (not yet reviewed/responded).
     *
     * @return array List of pending case objects, or an empty array on query failure
     */
    public function get_pending_cases()
    {
        $this->db->select('adprep_wills_probate.*, email_logs_institutions.id AS log_id, email_logs_institutions.email_status');
        $this->db->from('email_logs_institutions');
        $this->db->join(
            'adprep_wills_probate',
            'adprep_wills_probate.caseId = email_logs_institutions.case_id',
            'inner'
        );
        $this->db->where('email_logs_institutions.notification_type', 'PORTAL');
        $this->db->where(
            'email_logs_institutions.user_id',
            $this->session->userdata('fc_session_institution_id')
        );

        $this->db->where('email_logs_institutions.email_status IS NULL', null, false);
        $query = $this->db->get();
        if ($query === false) {
            return array();
        }
        return $query->result();
    }

    /**
     * Count pending portal cases for a specific institution.
     *
     * @param int|string $institution_id Institution ID (stored as user_id on email logs)
     * @return int
     */
    public function count_pending_cases_by_institution($institution_id)
    {
        $this->db->from('email_logs_institutions');
        $this->db->where('notification_type', 'PORTAL');
        $this->db->where('user_id', $institution_id);
        $this->db->where('email_status IS NULL', null, false);
        return (int) $this->db->count_all_results();
    }

    /**
     * Get a single portal case with its email log ID for the logged-in institution.
     *
     * Used by case details and match/no-match updates so the correct
     * email_logs_institutions row can be updated.
     *
     * @param int|string      $case_id Case ID from adprep_wills_probate.caseId
     * @param int|string|null $log_id  Optional email_logs_institutions.id
     * @return object|null Case row including log_id, or null when not found
     */
    public function get_case_by_id($case_id)
    {
        $this->db->select('adprep_wills_probate.*, email_logs_institutions.id AS log_id, email_logs_institutions.email_status');
        $this->db->from('email_logs_institutions');
        $this->db->join(
            'adprep_wills_probate',
            'adprep_wills_probate.caseId = email_logs_institutions.case_id',
            'inner'
        );
        $this->db->where('email_logs_institutions.notification_type', 'PORTAL');
        $this->db->where(
            'email_logs_institutions.user_id',
            $this->session->userdata('fc_session_institution_id')
        );
        $this->db->where('adprep_wills_probate.caseId', $case_id);

        $this->db->order_by('email_logs_institutions.id', 'DESC');
        $this->db->limit(1);

        $query = $this->db->get();
        if ($query === false || $query->num_rows() === 0) {
            return null;
        }

        return $query->row();
    }

}
