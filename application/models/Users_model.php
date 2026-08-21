<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Users_model extends My_Model
{
  public function __construct()
  {
    parent::__construct();
  }

  public function get_all_users()
  {
    $this->db->select('*');
    $this->db->from('adprep_financial_institutions_users');
    $this->db->where('institutions_id', $this->session->userdata('fc_session_institution_id'));
    $query = $this->db->get();
    return $query->result();
  }
}
