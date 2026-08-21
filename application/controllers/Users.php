<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Users extends My_Controller
{

    /**
     * Initialize the Users controller.
     *
     * Ensures the user is logged in, then loads helpers, form validation,
     * and the users model used by this controller.
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
        $this->load->model('users_model');
    }

    /**
     * Display the institution users list page.
     *
     * Only admin users can access this page. Loads all users for the
     * current institution and renders the users-list view.
     *
     * @return void
     */
    function index()
    {
        if ($this->session->userdata('fc_session_user_type') != 'admin') {
            $this->setErrorMessage('danger', 'You are not authorized to access users page only admin can access this page.');
            redirect('dashboard');
            return;
        }

        $this->data['users'] = $this->users_model->get_all_users();
        $this->load->view('users-list', $this->data);
    }

    /**
     * Load the add/edit user form via AJAX.
     *
     * Reads an optional user_id from POST. When provided, fetches that
     * user's details for editing; otherwise loads a blank add-user form.
     *
     * @return void
     */
    function add_edit_user_form()
    {
        $user_id = $this->input->post('user_id');
        $this->data['user_id'] = $user_id;

        if (!empty($user_id)) {
            $this->data['data'] = $this->users_model->get_row_details(
                'adprep_financial_institutions_users',
                ['user_id' => $user_id]
            );
        }

        $this->load->view('add-edit-user', $this->data);
    }

    /**
     * Create a new user or update an existing user.
     *
     * Validates posted name, email, and status. Updates the record when
     * user_id is present; otherwise creates a new user with a generated
     * password and emails the login credentials.
     *
     * @return void
     */
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
            $this->users_model->update_details(
                'adprep_financial_institutions_users',
                $data,
                ['user_id' => $this->input->post('user_id')]
            );
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

    /**
     * Display the change password page.
     *
     * @return void
     */
    function change_password()
    {
        $this->load->view('change-password', $this->data);
    }

    /**
     * Process a password change request for the logged-in user.
     *
     * Validates old, new, and confirm password fields. Verifies the current
     * password, applies password strength rules, then updates the hashed
     * password in the database.
     *
     * @return void
     */
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
            $this->load->library('PasswordValidation');

            $condition = array('user_id' => $this->session->userdata('fc_session_user_id'));

            $user_details = $this->users_model->get_row_details('adprep_financial_institutions_users', $condition);
            if (!empty($user_details)) {
                if (!password_verify($old_password, $user_details->password)) {
                    $this->setErrorMessage('danger', 'Invalid current password');
                    redirect('users/change_password');
                    return;
                }

                $validatePassword = $this->passwordvalidation->validatePassword($new_password, $user_details->password);
                if ($validatePassword !== true) {
                    $this->setErrorMessage('danger', $validatePassword);
                    redirect('users/change_password');
                    return;
                }

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
