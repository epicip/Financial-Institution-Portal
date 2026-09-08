<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

/**
 * 
 * This model contains all common db related functions
 * @author Teamtweaks
 *
 */

class My_Model extends CI_Model
{

	/**
	 * 
	 * This function connect the database and load the functions from CI_Model
	 */

	public function __construct()
	{
		parent::__construct();
		//		$this->load->database();

	}



	/**
	 * 
	 * This function returns the table contents based on data
	 * @param String $table	->	Table name
	 * @param Array $condition	->	Conditions
	 * @param Array $sortArr	->	Sorting details
	 * 
	 * return Array
	 */
	public function get_all_details($table = '', $condition = '', $sortArr = '', $limit = '', $start = '', $group_by = '')
	{
		if ($sortArr != '' && is_array($sortArr)) {
			foreach (array_keys($sortArr) as $key) {
				$this->db->order_by($key, $sortArr[$key]);
			}
		}

		if (!empty($group_by)) {
			$this->db->group_by($group_by);
		}

		if ($limit != '') {
			$this->db->limit($limit, $start);
		}

		return $this->db->get_where($table, $condition);
	}

	/**
	 * 
	 * This function returns the table contents based on data
	 * @param String $table	->	Table name
	 * @param Array $condition	->	Conditions
	 * 
	 * return single row
	 **/
	public function get_row_details($table = '', $condition = '')
	{
		$this->db->select()->from($table);
		$this->db->where($condition);
		$query = $this->db->get();
		return $query->row();
	}


	/**

	 * 
	 * This function update the table contents based on params
	 * @param String $table		->	Table name
	 * @param Array $data		->	New data
	 * @param Array $condition	->	Conditions
	 */

	public function update_details($table = '', $data = '', $condition = '')
	{
		$this->db->where($condition);
		return $this->db->update($table, $data);
	}

	public function insert_details($table = '', $data = '')
	{
		$this->db->insert($table, $data);
		return $this->db->insert_id();
	}

	public function delete_details($table = '', $condition = '')
	{
		$this->db->where($condition);
		return $this->db->delete($table);
	}


	/**
	 * 
	 * For getting last insert id
	 */
	public function get_last_insert_id()
	{
		return $this->db->insert_id();
	}

	public function common_mail_send($email_to, $subject, $message, $cc = '', $attachment_file = '')
	{

		//Create an instance; passing `true` enables exceptions
		$mail = new PHPMailer(true);

		$mail->isSMTP();                                            //Send using SMTP
		$mail->Host       =     'smtp-mail.outlook.com';                //Set the SMTP server to send through
		$mail->SMTPAuth   =     true;                                   //Enable SMTP authentication
		$mail->Username   =     CS_FROM_EMAIL;       //SMTP username
		$mail->Password   =     CS_EMAIL_PASSWORD;                             //SMTP password
		$mail->SMTPSecure =     'tls';                                  //Enable implicit TLS encryption
		$mail->Port       =     587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
		$mail->CharSet    =     "UTF-8";

		//Recipients
		$mail->setFrom(CS_FROM_EMAIL, CS_FROM_NAME);

		//Email to
		if (is_array($email_to) && !empty($email_to)) {
			foreach ($email_to as $single_to):
				$mail->addAddress(trim($single_to));
			endforeach;
		} else if ($email_to != "") {
			$mail->addAddress(trim($email_to));
		}
		//Email CC
		if (is_array($cc) && !empty($cc)) {
			foreach ($cc as $single_cc):
				$mail->addCC(trim($single_cc));
			endforeach;
		} else if ($cc != "") {
			$mail->addCC(trim($cc));
		}
		$mail->addBCC('rahul.mishra@epicip.com', 'Rahul Mishra');

		//Attachments
		if (is_array($attachment_file) && !empty($attachment_file)) {
			foreach ($attachment_file as $single_file):
				$mail->addAttachment($single_file);
			endforeach;
		} else if ($attachment_file != "") {
			$mail->addAttachment($attachment_file);
		}

		//Content
		$mail->isHTML(true);                                  //Set email format to HTML
		$mail->Subject = $subject;
		$mail->Body    = $message;

		if ($mail->send()) {
			$response = 'sent';
		} else {
			$response = 'Mailer Error: ' . $mail->ErrorInfo;
		}

		return $response;
	}
}
