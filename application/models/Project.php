<?php

class Project extends CI_Model {
    // public function __construct() {
    //     parent::__construct();
    //     $this->load->database();
    // }
    public function getAllProjects(){
        $query = $this->db->get('project');
        return $query->result();
    }
    public function getOpenProjects(){
        $query = $this->db->get_where('project', array('status' => 'open'));
        return $query->result();
    }
    public function getCompletedProjects(){
        $query = $this->db->get_where('project', array('status' => 'completed'));
        return $query->result();
    }
}
?>