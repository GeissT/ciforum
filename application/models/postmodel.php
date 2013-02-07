<?php
class PostModel extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    
    /**
     * Get a Post by it's ID
     * @param integer $pid Post ID
     * @return array Result of query
     */
    public function getPost($pid) {
        $query = $this->db->get_where('posts', array('pid' => $pid));
        return $query->result();
    }
    
    /**
     * Gets the Post's title
     * @param integer $pid Post ID
     * @return array Query's row
     */
    public function getPostTitle($pid) {
        $query = $this->db->get_where('posts', array('pid' => $pid));
        return $query->row();
    }
    
    public function createPost($fid, $details) {
        $query = $this->db->insert('posts', array('fid' => $fid, 'postTitle' => $details['postTitle'], 'postContent' => $details['postContent'], 'postAuthor' => $details['postAuthor'], ));
        $postId = $this->db->get_where('posts', array('postTitle' => $details['postTitle'], 'postContent' => $details['postContent']));
        if($query == TRUE) {
            return $postId->result();
        } else {
            return false;
        }
    }
    
    /**
     * Reply to a Post
     * @param integer $pid Post ID to reply to
     * @param string $content Reply text
     * @param string $author Post Author
     * @return boolean True on query success, false if not.
     */
    public function reply($pid, $content, $author) {
        $query = $this->db->insert('replies', array('pid' => $pid, 'content' => $content, 'author' => $author));
        if($query == TRUE) {
            return true;
        } else {
            return false;
        }
    }
    
    /**
     * Get all replies to a post
     * @param integer $pid Post ID
     * @return boolean Returns result if there are replies in database, false if not.
     */
    public function getReplies($pid) {
        $query = $this->db->get_where('replies', array('pid' => $pid));
        
        if($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
}
?>