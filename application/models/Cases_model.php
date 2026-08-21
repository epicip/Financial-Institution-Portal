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
        $this->db->select('adprep_wills_probate.*');
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
        $this->db->select('adprep_wills_probate.*');
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
}
