<?php

class Forum extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    /**
     * Display forum by it's ID.
     * @param integer $fid Forum ID
     */
    public function byID($fid) {
        $this->load->model('forummodel');

        $data['posts'] = $this->forummodel->getAllPosts($fid);
        $data['forum'] = $this->forummodel->getForumTitle($fid);
        $data['fid'] = $fid;
        $data['loggedIn'] = $this->session->userdata('loggedIn');

        if (count($data['posts']) < 1) {
            $this->load->view('includes/forum_header_noposts', $data);
            $this->load->view('forum/noposts', $data);
            $this->load->view('includes/footer');
        } else {
            $this->load->view('includes/forum_header', $data);
            $this->load->view('forum/index', $data);
            $this->load->view('includes/footer');
        }
    }

}

?>