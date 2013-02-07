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
        echo 'id to edit = ' . $id;
    }
    
    public function delUserById($id) {
        echo 'id to del = ' . $id;
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