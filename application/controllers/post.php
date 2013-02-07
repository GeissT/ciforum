<?php

class Post extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    /**
     * Generate Post page based on Post ID
     * @param integer $pid Post ID
     */
    public function byID($pid) {
        $this->load->model('postmodel');

        $data['post'] = $this->postmodel->getPost($pid);
        $data['pid'] = $pid;
        $data['postTitle'] = $this->postmodel->getPostTitle($pid);
        $data['loggedIn'] = $this->session->userdata('loggedIn');

        if ($this->postmodel->getReplies($pid) != FALSE) {
            $data['replies'] = $this->postmodel->getReplies($pid);
        }

        $this->load->view('includes/post_header', $data);
        $this->load->view('post/index', $data);
        $this->load->view('includes/footer');
    }

    /**
     * Add a Post to a forum
     * @param integer $fid Forum ID to add to.
     */
    public function add($fid) {
        if ($this->session->userdata('username') != '') {
            $this->form_validation->set_rules('title', 'Title', 'required');
            $this->form_validation->set_rules('content', 'Content', 'required');

            if ($this->form_validation->run() == FALSE) {
                $data['loggedIn'] = $this->session->userdata('loggedIn');
                $data['fid'] = $fid;
                $this->load->view('includes/header', $data);
                $this->load->view('post/add', $data);
                $this->load->view('includes/footer');
            } else {
                $details['postAuthor'] = $this->session->userdata('username');
                $details['postTitle'] = $this->input->post('title');
                $details['postContent'] = $this->input->post('content');
                $this->load->model('postmodel');
                $this->postmodel->createPost($fid, $details);
                redirect(site_url('forum/' . $fid));
            }
        } else {
            redirect(site_url('user/login'));
        }
    }

    /**
     * Reply to a Post
     * @param integer $pid Post ID
     */
    public function reply($pid) {
        if ($this->session->userdata('username') != '') {
            $this->form_validation->set_rules('content', 'Content', 'required');

            if ($this->form_validation->run() == FALSE) {
                $data['loggedIn'] = $this->session->userdata('loggedIn');
                $data['pid'] = $pid;
                $this->load->view('includes/header', $data);
                $this->load->view('post/reply', $data);
                $this->load->view('includes/footer');
            } else {
                $this->load->model('postmodel');
                $username = $this->session->userdata('username');
                $content = $this->input->post('content');
                $result = $this->postmodel->reply($pid, $content, $username);
                if ($result == TRUE) {
                    redirect(site_url('post/' . $pid));
                }
            }
        } else {
            redirect(site_url('user/login'));
        }
    }

}

?>