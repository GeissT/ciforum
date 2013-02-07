<?php

class AdminModel extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    // USER MANIPULATION //

    /**
     * Add a User
     * @param array $details User Details
     * @return boolean True if query succeeded False if not
     */
    public function addUser($details = array()) {
        $query = $this->db->insert('users', array('username' => $details['username'], 'password' => $details['password'],
            'email' => $details['email'], 'role' => $details['role']));

        if ($query == TRUE) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Update/Edit user details
     * @param integer $id User ID
     * @param array $details User's new details
     * @return boolean True if query success, false if not.
     */
    public function editUser($id, $details = array()) {
        // This is a really sloppy way of doing this but it will have to do...
        $toupdate = null;

        if (isset($details['username'])) {
            $toupdate['username'] = $details['username'];
        }
        if (isset($details['password'])) {
            $toupdate['password'] = $details['password'];
        }
        if (isset($details['role'])) {
            $toupdate['role'] = $details['role'];
        }
        if (isset($details['email'])) {
            $toupdate['email'] = $details['email'];
        }
        $this->db->where('id', $id);
        $query = $this->db->update('users', $toupdate);

        if ($query == true) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Delete a user.
     * @param integer $id User ID
     * @return boolean True if query success, false if not.
     */
    public function delUser($id) {
        $query = $this->db->delete('user', array('id' => $id));

        if ($query == TRUE) {
            return true;
        } else {
            return false;
        }
    }

    // POST MANIPULATION //

    /**
     * Edit a Post
     * @param integer $id Post ID
     * @param array $details Details to update
     * @return boolean True if query success, false if not
     */
    public function editPost($id, $details = array()) {
        // This is a really sloppy way of doing this but it will have to do...
        $toupdate = null;

        if (isset($details['fid'])) {
            $toupdate['fid'] = $details['fid'];
        }
        if (isset($details['pid'])) {
            $toupdate['pid'] = $details['pid'];
        }
        if (isset($details['postTitle'])) {
            $toupdate['postTitle'] = $details['postTitle'];
        }
        if (isset($details['postContent'])) {
            $toupdate['postContent'] = $details['postContent'];
        }
        $this->db->where('id', $id);
        $query = $this->db->update('posts', $toupdate);

        if ($query == true) {
            return true;
        } else {
            return false;
        }
    }
    
    /**
     * Delete a Post
     * @param integer $id Post ID
     * @return boolean True if query success, false if not
     */
    public function delPost($id) {
        $query = $this->db->delete('posts', array('id' => $id));
        
        if ($query == true) {
            return true;
        } else {
            return false;
        }
    }

    // FORUM/CATEGORY MANIPULATION //
    
    /**
     * Add a forum
     * @param array $details
     * @return boolean True on query success, false if not.
     */
    public function addForum($details = array()) {
        $query = $this->db->insert('forums', array('title' => $details['title'], 
                                                   'description' => $details['description']));

        if ($query == TRUE) {
            return true;
        } else {
            return false;
        }
    }
    
    /**
     * Edit a Forum
     * @param integer $id Forum ID
     * @param array $details Details to update
     * @return boolean True on query success, false if not.
     */
    public function editForum($id, $details = array()) {
        // This is a really sloppy way of doing this but it will have to do...
        $toupdate = null;

        if (isset($details['title'])) {
            $toupdate['title'] = $details['title'];
        }
        if (isset($details['description'])) {
            $toupdate['description'] = $details['description'];
        }
        
        $this->db->where('id', $id);
        $query = $this->db->update('forums', $toupdate);

        if ($query == true) {
            return true;
        } else {
            return false;
        }
    }
    
    /**
     * Delete a forum
     * @param integer $id Forum ID
     * @return boolean True on query success, false if not.
     */
    public function delForum($id) {
        $query = $this->db->delete('forums', array('id' => $id));
        
        if ($query == true) {
            return true;
        } else {
            return false;
        }
    }
        
}

?>