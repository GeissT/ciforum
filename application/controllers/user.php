<?php

class User extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    /**
     * Produce default user page
     */
    public function index() {
        if ($this->_checkOwner($this->session->userdata('username')) == true || $this->_checkAdmin($this->session->userdata('username')) == true) {
            redirect(site_url('admin/index'));
        } else {
            $data['loggedIn'] = $this->session->userdata('loggedIn');
            $this->load->view('includes/header', $data);
            $this->load->view('user/dash');
            $this->load->view('includes/footer');
        }
    }

    /**
     * Produce and/or process logins.
     */
    public function login() {
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data['loggedIn'] = $this->session->userdata('loggedIn');
            $this->load->view('includes/header', $data);
            $this->load->view('user/login/index');
            $this->load->view('includes/footer');
        } else {
            $this->load->model('usermodel');
            $creds['username'] = $this->input->post('username');
            $creds['password'] = $this->input->post('password');

            if ($this->usermodel->login($creds) == TRUE) {
                // Login Successful!
                $sessiondata = array('username' => $this->input->post('username'), 'loggedIn' => 1, 'isOwner' => $this->_checkOwner($username), 'isAdmin' => $this->_checkAdmin($username));
                $this->session->set_userdata($sessiondata);
                redirect(site_url());
            } else {
                $data['loggedIn'] = $this->session->userdata('loggedIn');
                $this->load->view('includes/header', $data);
                $this->load->view('user/login/error');
                $this->load->view('includes/footer');
            }
        }
    }

    private function _checkOwner($username) {
        $this->load->model('usermodel');
        return $this->usermodel->isOwner($username);
    }

    private function _checkAdmin($username) {
        $this->load->model('usermodel');
        return $this->usermodel->isAdmin($username);
    }

    /**
     * Produce and/or process registrations
     */
    public function register() {
        $this->form_validation->set_rules('username', 'Username', 'required|is_unique[users.username]');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('password_conf', 'Password Confirmation', 'required|matches[password]');
        $this->form_validation->set_rules('email', 'Email', 'required|is_unique[users.email]');
        $this->form_validation->set_rules('email_conf', 'Email Confirmation', 'required|is_unique[users.email]|matches[email]');

        if ($this->form_validation->run() == FALSE) {
            $data['loggedIn'] = $this->session->userdata('loggedIn');
            $this->load->view('includes/header', $data);
            $this->load->view('user/register/index');
            $this->load->view('includes/footer');
        } else {
            $this->load->model('usermodel');
            $creds['username'] = $this->input->post('username');
            $creds['password'] = $this->input->post('password');
            $creds['email'] = $this->input->post('email');
            $creds['role'] = 'mem';

            if ($this->usermodel->register($creds) == TRUE) {
                $data['loggedIn'] = $this->session->userdata('loggedIn');
                $this->load->view('includes/header', $data);
                $this->load->view('user/register/success');
                $this->load->view('includes/footer');
            } else {
                $data['loggedIn'] = $this->session->userdata('loggedIn');
                $this->load->view('includes/header', $data);
                $this->load->view('user/register/failure');
                $this->load->view('includes/footer');
            }
        }
    }

    /**
     * Log the user out by destroying the session.
     */
    public function logout() {
        $this->session->sess_destroy();
        redirect(site_url());
    }

}

?>