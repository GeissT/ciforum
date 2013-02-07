<?php

class Index extends CI_Controller {
    function __construct() {
        parent::__construct();
    }
    /**
     * Generates main page
     */
    public function index() {
        $this->load->model('indexmodel');
        
        $data['forums'] = $this->indexmodel->getAllForums();
        $data['loggedIn'] = $this->session->userdata('loggedIn');
        
        $this->load->view('includes/index_header', $data);
        $this->load->view('index/index', $data);
        $this->load->view('includes/footer');
    }
}

?>