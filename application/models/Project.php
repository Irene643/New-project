<?php

class Project extends CI_Model {
    // public function __construct() {
    //     parent::__construct();
    //     $this->load->database();
    // }
    public function getProjects(){
        $query = $this->db->get('project');
        return $query->result();
    }
}
?>