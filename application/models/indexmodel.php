<?php

class IndexModel extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    
    /**
     * Get's all forums for display on Index.
     * @return array Result of Query.
     */
    public function getAllForums() {
        $query = $this->db->get('forums');
        return $query->result();
    }
}

?>