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
    public function saveProject($data){
        $query=$this->db->insert('project', $data);
    }
    public function getProjectCategory(){
        $query = $this->db->get('category');
        return $query->result();
    }
    public function getProjectReferenceType(){
        $query = $this->db->get('reference');
        return $query->result();
    }
    public function getProjectStatus(){
        $query = $this->db->get('status');
        return $query->result();
    }
}
?>