<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Users extends My_Controller
{

    public function __construct()
    {
        parent::__construct();

        if ($this->checkLogin('E') == '') {
            redirect('login');
        }

        $this->load->helper(array('cookie', 'date', 'form'));
        $this->load->library(array('form_validation'));
        $this->load->model('users_model');
    }




    /**
     * Load the user list view.
     *
     * This function renders the user list page by loading.
     *
     * @return void
     */
    function index()
    {

        if ($this->session->userdata('fc_session_user_type') != 'admin') {
            $this->setErrorMessage('danger', 'You are not authorized to access this page.');
            redirect('dashboard');
            return;
        }

        $this->data['users'] = $this->users_model->get_all_users();

        // View page link
        $this->load->view('users-list', $this->data);
    }

    /**
     * Loads the add/edit institutions user form.
     *
     * Reads institutions and optional user IDs from POST data, fetches user details
     * when editing, and renders the add-institutions-user view.
     *
     * @return void
     */

    function add_edit_user_form()
    {
        $user_id = $this->input->post('user_id'); // Get the user id
        $this->data['user_id'] = $user_id;

        if (!empty($user_id)) {
            $this->data['data'] = $this->users_model->get_row_details('adprep_financial_institutions_users', ['user_id' => $user_id]); // Get the user details
        }

        $this->load->view('add-edit-user', $this->data); // Load the view

    }


    // User List
    public function insert_update_user()
    {
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('status', 'Status', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('add-edit-user', $this->data);
            return;
        }


        $data = array();
        $data['institutions_id'] = $this->session->userdata('fc_session_institution_id');
        $data['name'] = $this->input->post('name');
        $data['email'] = $this->input->post('email');
        $data['status'] = $this->input->post('status');
        $data['type'] = 'user';

        if (!empty($this->input->post('user_id'))) {
            $this->users_model->update_details('adprep_financial_institutions_users', $data, ['user_id' => $this->input->post('user_id')]);
        } else {
            $password = $this->generate_strong_password(8);
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $data['password'] = $hashed_password;
            $this->users_model->insert_details('adprep_financial_institutions_users', $data);

            $message  = 'Dear ' . $data['name'] . ', <br /><br />';
            $message .= 'You have just created a new account on Financial Institutions Portal. <br /> <br />';
            $message .= 'Please use the credentials below to access the client portal.<br /><br />';
            $message .= '<strong>Login here - </strong> https://www.financialinstitutions.com/users/login<br /><br />';
            $message .= '<strong>Username:</strong> ' . $data['email'] . '<br />';
            $message .= '<strong>Password:</strong> ' . $password . '<br /><br />';

            $subject  = 'Financial Institutions Portal : Add New User';
            $response = $this->users_model->common_mail_send($data['email'], $subject, $message, NR_EPICADS_EMAIL);

            if (!empty($response) && $response == 'sent') {
                $this->setErrorMessage('success', 'New user has been added and will receive login details shortly.');
            } else {
                $this->setErrorMessage('warning', 'Email not sent, please try after sometime.');
            }
        }
        redirect('users');
    }

    // View Change Password 
    function change_password()
    {
        $this->load->view('change-password', $this->data);
    }

    public function change_password_process()
    {
        $this->form_validation->set_rules('old_password', 'Password', 'required');
        $this->form_validation->set_rules('new_password', 'New Password', 'required');
        $this->form_validation->set_rules('confirm_password', 'Retype Password', 'required');

        $old_password = $this->input->post('old_password');
        $new_password = $this->input->post('new_password');
        $confirm_password = $this->input->post('confirm_password');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('users/change_password', $this->data);
        } else {

            // Load PasswordValidation library
            $this->load->library('PasswordValidation');

            $condition = array('user_id' => $this->session->userdata('fc_session_user_id'));

            $user_details = $this->users_model->get_row_details('adprep_financial_institutions_users', $condition);
            if (!empty($user_details)) {
                // check if new password and confirm password are same
                if (!password_verify($old_password, $user_details->password)) {
                    $this->setErrorMessage('danger', 'Invalid current password');
                    redirect('users/change_password');
                    return;
                }

                // check password validation by PasswordValidation library
                $validatePassword =  $this->passwordvalidation->validatePassword($new_password, $user_details->password);
                if ($validatePassword !== true) {
                    $this->setErrorMessage('danger', $validatePassword);
                    redirect('users/change_password');
                    return;
                }

                // create new hashed password
                $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
                $newdata = array('password' => $hashed_password);

                $condition = array('user_id' => $this->session->userdata('fc_session_user_id'));
                $this->users_model->update_details('adprep_financial_institutions_users', $newdata, $condition);
                $this->setErrorMessage('success', 'Your password has been changed successfully');
            } else {
                $this->setErrorMessage('danger', 'Invalid current password');
            }

            redirect('users/change_password');
        }
    }
}
