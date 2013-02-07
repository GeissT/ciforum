<?php

class UserModel extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    
    /**
     * Get Current User Info.
     * @param int $id User ID
     * @return mixed False if no user, user data if user exists in database
     */
    public function getCurrentUser($id) {
        $query = $this->db->get_where('users', array('id' => $id));
        
        if($query->num_rows() < 1) {
            return false;
        } else {
            return $query->result();
        }
    }
    
    /**
     * Get a user whose info corresponds to $key and $value
     * @param int $key Column name
     * @param mixed $value Column Value
     * @return mixed User info or false if no user was found
     */
    public function getUserBy($key, $value) {
        $query = $this->db->get_where('users', array($key => $value));
        
        if($query->num_rows() < 1) {
            return false;
        } else {
            return $query->result();
        }
    }
    
    /**
     * Get all users
     * @return array All User's
     */
    public function getAllUsers() {
        $query = $this->db->get('users');
        return $query->result();
    }
    
    /**
     * Authenticate the user with the Database
     * @param array $credentials Username and Password (ussually)
     * @return boolean False if credentials were wrong, TRUE if correct
     */
    public function login($credentials = array()) {
        $query = $this->db->get_where('users', array('username' => $credentials['username'], 
                                                     'password' => $credentials['password']));
        
        if($query->num_rows() < 1) {
            return false;
        } else {
            return true;
        }
    }
    
    public function isAdmin($username) {
        $query = $this->db->get_where('users', array('username' => $username, 'role' => 'admin'));
        if($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
    
    public function isOwner($username) {
        $query = $this->db->get_where('users', array('username' => $username, 'role' => 'owner'));
        if($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
    
    /**
     * Register the user with the database.
     * @param array $credentials Username, Password, Email, Role
     * @return boolean TRUE if registration was successful, FALSE if not.
     */
    public function register($credentials = array()) {
        $query = $this->db->insert('users', array('username' => $credentials['username'],
                                                  'role' => $credentials['role'],
                                                  'password' => $credentials['password'],
                                                  'email' => $credentials['email']));
        
        if($query == TRUE) {
            return true;
        } else {
            return false;
        }
    }
}

?>