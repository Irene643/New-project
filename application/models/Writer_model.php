<?php

class Writer_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        // session_start();
    }
    public function add_bid($data){
    	$query = $this->db->insert('bid', $data);
    	redirect('');
    }
}