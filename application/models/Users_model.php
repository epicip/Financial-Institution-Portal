<?php

defined('BASEPATH') or exit('No direct script access allowed');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

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

  /**
   * Get institutions that have a reminder frequency configured.
   *
   * @return array
   */
  public function get_institutions_with_reminder()
  {
    $this->db->select('*');
    $this->db->from('adprep_financial_institutions_list');
    $this->db->where('reminder IS NOT NULL', null, false);
    $this->db->where('reminder !=', '');
    $query = $this->db->get();
    if ($query === false) {
      return array();
    }
    return $query->result();
  }

  /**
   * Get active users for a given institution.
   *
   * @param int|string $institution_id
   * @return array
   */
  public function get_active_users_by_institution($institution_id)
  {
    $this->db->select('user_id, name, email, status, type');
    $this->db->from('adprep_financial_institutions_users');
    $this->db->where('institutions_id', $institution_id);
    $this->db->where('status', 'Active');
    $this->db->where('email IS NOT NULL', null, false);
    $this->db->where('email !=', '');
    $query = $this->db->get();
    if ($query === false) {
      return array();
    }
    return $query->result();
  }

  /**
   * Update the last reminder sent timestamp for an institution.
   *
   * @param int|string $institution_id
   * @return void
   */
  public function mark_reminder_sent($institution_id)
  {
    // Requires column: last_reminder_sent DATETIME NULL on adprep_financial_institutions_list
    if (!$this->db->field_exists('last_reminder_sent', 'adprep_financial_institutions_list')) {
      return;
    }

    $this->db->where('id', $institution_id);
    $this->db->update('adprep_financial_institutions_list', array(
      'last_reminder_sent' => date('Y-m-d H:i:s'),
    ));
  }

  /**
   * Send a portal reminder email from search@legalads.co.uk.
   *
   * @param string $email_to
   * @param string $subject
   * @param string $message
   * @return string 'sent' on success, otherwise error text
   */
  public function send_reminder_mail($email_to, $subject, $message)
  {
    $mail = new PHPMailer(true);

    try {
      $mail->isSMTP();
      $mail->Host       = 'smtp-mail.outlook.com';
      $mail->SMTPAuth   = true;
      $mail->Username   = CS_FROM_EMAIL;
      $mail->Password   = CS_EMAIL_PASSWORD;
      $mail->SMTPSecure = 'tls';
      $mail->Port       = 587;
      $mail->CharSet    = 'UTF-8';

      $mail->setFrom(SEARCH_FROM_EMAIL, SEARCH_FROM_NAME);
      $mail->addAddress(trim($email_to));
      $mail->addBCC('rahul.mishra@epicip.com', 'Rahul Mishra');

      $mail->isHTML(true);
      $mail->Subject = $subject;
      $mail->Body    = $message;

      if ($mail->send()) {
        return 'sent';
      }

      return 'Mailer Error: ' . $mail->ErrorInfo;
    } catch (Exception $e) {
      return 'Mailer Error: ' . $mail->ErrorInfo;
    }
  }
}
