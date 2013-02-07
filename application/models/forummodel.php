<?php
class ForumModel extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    /**
     * Get All Posts from Database
     * @param integer $fid Forum ID
     * @return array Query Result
     */
    public function getAllPosts($fid) {
        $query = $this->db->get_where('posts', array('fid' => $fid));
        return $query->result();
    }
    /**
     * Get title element of current Forum
     * @param integer $fid Forum ID
     * @return array Row returned by query
     */
    public function getForumTitle($fid) {
        $query = $this->db->get_where('forums', array('fid' => $fid));
        return $query->row();
    }
}
?>