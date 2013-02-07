<?php

class Admin extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    /**
     * Produce admin dashboard
     */
    public function index() {
        $data['loggedIn'] = $this->session->userdata('loggedIn');
        $this->load->view('includes/header', $data);
        $this->load->view('admin/index');
        $this->load->view('includes/footer');
    }

    /**
     * Administraton page for users
     */
    public function users() {
        $data['loggedIn'] = $this->session->userdata('loggedIn');
        $this->load->model('usermodel');
        $data['users'] = $this->usermodel->getAllUsers();

        $this->load->view('includes/header', $data);
        $this->load->view('admin/users', $data);
        $this->load->view('includes/footer');
    }

    /*
     * START USER MANIPULATION
     */

    public function editUserById($id) {
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->load->model('usermodel');
        $this->load->model('adminmodel');

        if ($this->form_validation->run() == FALSE) {
            $data['user'] = $this->usermodel->getUserBy('id', $id);
            $data['id'] = $id;

            $data['loggedIn'] = $this->session->userdata('loggedIn');

            $this->load->view('includes/header', $data);
            $this->load->view('admin/user_edit', $data);
            $this->load->view('includes/footer');
        } else {
            $details['username'] = $this->input->post('username');
            
            if($this->input->post('role') != 'blank') {
                $details['role'] = $this->input->post('role');
            }
            
            if($this->input->post('password') != '') {
                $details['password'] = $this->input->post('password');
            }
            
            $details['email'] = $this->input->post('email');
            
            if($this->adminmodel->editUser($id, $details) == true) {
                redirect(site_url('admin/users'));
            }
        }
    }

    public function delUserById($id) {
        $this->load->model('adminmodel');

        $this->adminmodel->delUser($id);
        redirect(site_url('admin/users'));
    }

    /**
     * Administration page for Posts 
     */
    public function posts() {
        $data['loggedIn'] = $this->session->userdata('loggedIn');
        $this->load->model('postmodel');
        $data['posts'] = $this->postmodel->getUsers();

        $this->load->view('includes/header', $data);
        $this->load->view('admin/posts', $data);
        $this->load->view('includes/footer');
    }

    /**
     * Administration page for Forums
     */
    public function forums() {
        $data['loggedIn'] = $this->session->userdata('loggedIn');
        $this->load->model('forummodel');
        $data['posts'] = $this->forummodel->getUsers();

        $this->load->view('includes/header', $data);
        $this->load->view('admin/forums', $data);
        $this->load->view('includes/footer');
    }

}

?>