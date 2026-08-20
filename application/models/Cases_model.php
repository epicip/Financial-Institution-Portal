<?php

defined('BASEPATH') or exit('No direct script access allowed');


class Cases_model extends My_Model
{

    public function __construct()
    {
        parent::__construct();
    }

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
