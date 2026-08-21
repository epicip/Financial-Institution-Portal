<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Users_model extends My_Model
{

  /**
   * Initialize the Users model.
   *
   * @return void
   */
  public function __construct()
  {
    parent::__construct();
  }

  /**
   * Get all users for the logged-in institution.
   *
   * Returns every user record from adprep_financial_institutions_users
   * that belongs to the current session institution.
   *
   * @return array List of user objects
   */
  public function get_all_users()
  {
    $this->db->select('*');
    $this->db->from('adprep_financial_institutions_users');
    $this->db->where('institutions_id', $this->session->userdata('fc_session_institution_id'));
    $query = $this->db->get();
    return $query->result();
  }
}
