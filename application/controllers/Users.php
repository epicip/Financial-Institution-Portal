<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends My_Controller
{

    public function __construct()
    {
        parent::__construct();

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
    function users_list()
    {

        // Get Published orders number
        $this->data['userList'] = $this->users_model->getUsersList();

        // View page link
        $this->load->view('users-list', $this->data);
    }

    // User List
    function add_user()
    {
        $this->load->view('add-user', $this->data);
    }

    // User List
    public function insertUser()
    {
        // Get user details from post
        $ContactName   = trim((string) $this->input->post('ContactName', true));
        $ContactNumber = trim((string) $this->input->post('ContactNumber', true));
        $ContactEmail  = trim((string) $this->input->post('ContactEmail', true));
        $comp_id       = $this->input->post('comp_id', true);
        $customer_id   = $this->input->post('customer_id', true);

        if ($ContactName === '' || $ContactEmail === '' || $ContactNumber === '') {
            $this->setErrorMessage('warning', 'Required fields are missing.');
            redirect('users/add_user', $this->data);
            return;
        }

        if (!filter_var($ContactEmail, FILTER_VALIDATE_EMAIL)) {
            $this->setErrorMessage('warning', 'Invalid email address.');
            redirect('users/add_user', $this->data);
            return;
        }

        $this->load->helper('xss');
        if (xss_payload_detected($ContactName) || xss_payload_detected($ContactNumber)) {
            $this->setErrorMessage('error', 'Invalid input detected.');
            redirect('users/add_user', $this->data);
            return;
        }

        $pass = $this->generate_strong_password(8);
        $hashed_password = password_hash($pass, PASSWORD_DEFAULT);

        $data = array(
            'comp_id'       => $comp_id,
            'customer_id'   => $customer_id,
            'ContactName'   => $ContactName,
            'ContactNumber' => $ContactNumber,
            'ContactEmail'  => $ContactEmail,
            'password'      => $hashed_password,
            'status'        => 'Active',
        );

        $condition = array('ContactEmail' => $ContactEmail, 'comp_id' => $comp_id);
        $multiquery = $this->users_model->get_all_details('admake_customers', $condition);

        if ($multiquery->num_rows() == 1) {
            $this->setErrorMessage('Danger', 'Email Id already exists');
            redirect('users/add_user', $this->data);
            return;
        }

        $usercondition = array('ContactEmail' => $ContactEmail, 'customer_id' => $customer_id);
        $query = $this->users_model->get_all_details('admake_customers_users', $usercondition);

        if ($query->num_rows() == 1) {
            $this->setErrorMessage('Danger', 'Email Id already exists in user');
            redirect('users/add_user', $this->data);
            return;
        }

        if (empty($ContactEmail)) {
            redirect('users/add_user', $this->data);
            return;
        }

        $this->users_model->insert_details('admake_customers_users', $data, $pass);

        $safeName  = htmlspecialchars($ContactName, ENT_QUOTES, 'UTF-8');
        $safeEmail = htmlspecialchars($ContactEmail, ENT_QUOTES, 'UTF-8');

        $message  = 'Dear ' . htmlspecialchars(current(explode(' ', $ContactName)), ENT_QUOTES, 'UTF-8') . ', <br /><br />';
        $message .= 'You have just created a new account on EPE Client Portal. <br /> <br />';
        $message .= 'Please use the credentials below to access the client portal.<br /><br />';
        $message .= '<strong>Login here - </strong> https://www.legaladvertisers.co.uk/reynell-thorpe/users/login<br /><br />';
        $message .= '<strong>Username:</strong> ' . $safeEmail . '<br />';
        $message .= '<strong>Password:</strong> ' . htmlspecialchars($pass, ENT_QUOTES, 'UTF-8') . '<br /><br />';

        if (getReturnData('admake_customers', 'id', $customer_id, 'comp_id') == 2) {
            $message .= "If you have any problems with order's and your account, please contact EPE Legal and public notice advertising  - customer.service@epicads.co.uk <br /><br />";
        } else {
            $message .= "If you have any problems with order's and your account, please contact EPE Legal and public notice advertising  - either 020 8501 9730 or customer.service@epicads.co.uk  <br /><br />";
        }
        $message .= 'Thanks & Regards,<br /><strong>EPE Legal and public notice advertising</strong>';

        $subject  = 'EPE Client Portal : Add New User';
        $response = $this->users_model->common_mail_send($ContactEmail, $subject, $message, NR_EPICADS_EMAIL);

        if (!empty($response) && $response == 'sent') {
            // Do not put raw ContactName in flash (XSS)
            $this->setErrorMessage('success', 'New user has been added and will receive login details shortly.');
        } else {
            $this->setErrorMessage('warning', 'Email not sent, please try after sometime.');
        }

        redirect('users/users_list', $this->data);
    }

    public function change_password()
    {
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('new_password', 'New Password', 'required');
        $this->form_validation->set_rules('confirm_password', 'Retype Password', 'required');

        $old_password = $this->input->post('password');
        $new_password = $this->input->post('new_password');
        $confirm_password = $this->input->post('confirm_password');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('users/profile', $this->data);
        } else {

            // Load PasswordValidation library
            $this->load->library('PasswordValidation');

            if (!empty($this->session->userdata('fc_session_client_user_id'))) {
                $condition = array('user_id' => $this->session->userdata('fc_session_client_user_id'));

                $userQuery = $this->users_model->get_all_details('admake_customers_users', $condition);
                if ($userQuery->num_rows() == 1) {
                    $user = $userQuery->row();

                    // check if new password and confirm password are same
                    if (!password_verify($old_password, $user->password)) {
                        $this->setErrorMessage('danger', 'Invalid current password');
                        redirect('users/password_change');
                        return;
                    }

                    // check password validation by PasswordValidation library
                    $validatePassword =  $this->passwordvalidation->validatePassword($new_password, $user->password);
                    if ($validatePassword !== true) {
                        $this->setErrorMessage('danger', $validatePassword);
                        redirect('users/password_change');
                        return;
                    }

                    // create new hashed password
                    $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
                    $newdata = array('password' => $hashed_password);

                    $condition = array('user_id' => $this->session->userdata('fc_session_client_user_id'));
                    $this->users_model->update_details('admake_customers_users', $newdata, $condition);
                    $this->setErrorMessage('success', 'User password changed successfully');
                } else {
                    $this->setErrorMessage('danger', 'Invalid current password');
                }
            } else {
                $condition = array('id' => $this->session->userdata('fc_session_client_id'));
                $query = $this->users_model->get_all_details('admake_customers', $condition);
                if ($query->num_rows() == 1) {
                    $user = $query->row();

                    // check if new password and confirm password are same
                    if (!password_verify($old_password, $user->password)) {
                        $this->setErrorMessage('danger', 'Invalid current password');
                        redirect('users/password_change');
                        return;
                    }

                    // check password validation by PasswordValidation library
                    $validatePassword =  $this->passwordvalidation->validatePassword($new_password, $user->password);
                    if ($validatePassword !== true) {
                        $this->setErrorMessage('danger', $validatePassword);
                        redirect('users/password_change');
                        return;
                    }

                    // create new hashed password
                    $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
                    $newdata = array('password' => $hashed_password, 'password_change' => 'Active');
                    $condition = array('id' => $this->session->userdata('fc_session_client_id'));
                    $this->users_model->update_details('admake_customers', $newdata, $condition);
                    $this->setErrorMessage('success', 'Admin password changed successfully');
                } else {
                    $this->setErrorMessage('danger', 'Invalid current password');
                }
            }

            redirect('users/view_profile');
        }
    }

    public function verified_email($id)
    {

        if (!empty($id)) {
            $condition = array('id' => $id);
            $query = $this->users_model->get_all_details('admake_customers', $condition);

            if ($query->num_rows() == 1) {

                $newdata = array('verified' => 'Yes');
                $condition = array('id' => $query->row()->id);
                $this->users_model->update_details('admake_customers', $newdata, $condition);

                $message = "Dear " . current(explode(" ", $query->row()->AccountName)) . ", <br /><br />Thank you for registering as a client with us on the ordering platform.<br /><br />";
                $message .= "Your account is under review and the onabording team will confirm shortly. <br /> <br />";
                $message .= "Please use the credentials below to access the client portal. Remember, you will not be able to place the order until your registration is confirmed by the onboarding team.<br /><br />";
                $message .= "<strong>Client login portal - https://www.legaladvertisers.co.uk/reynell-thorpe/users/login<br /><br />";
                $message .= "<strong>Username:</strong> " . $query->row()->ContactEmail . "<br />";
                $message .= "<strong>Password:</strong> " . $query->row()->password . "<br /><br />";
                $message .= "We have attached the user manual for the client portal for your reference.<br /><br />If you have any concern with your account, please contact the onboarding team on 02085019730/ 01438 350990 or write statads@epe-reynell.co.uk  <br /><br />";
                $message .= "Thanks & Regards,<br /><strong>EPE Legal and public notice advertising</strong>";

                $subject = 'Welcome to EPE Legal and public notice advertising ordering portal';

                $response = $this->users_model->common_mail_send($query->row()->ContactEmail, $subject, $message, NR_EPICADS_EMAIL);

                if (!empty($response) && $response == 'sent') {
                    $this->setErrorMessage('success', 'Thank you for verifying your email address.');
                } else {
                    $this->setErrorMessage("warning",    'Email not sent, please try after sometime.');
                }
            }
        }
        redirect(base_url() . 'users/login', $this->data);
    }

    // View Change Password 
    function password_change()
    {
        $this->load->view('change-password', $this->data);
    }
}
