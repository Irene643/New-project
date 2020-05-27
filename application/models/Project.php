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
    public function getUnassignedProjects(){
        $query = $this->db->get_where('project', array('status_id' => '1'));
        return $query->result();
    }
    public function getOpenProjects(){
        $query = $this->db->get_where('project', array('status_id' => '2'));
        return $query->result();
    }
    public function getCompletedProjects(){
        $query = $this->db->get_where('project', array('status_id' => '3'));
        return $query->result();
    }
    public function get_waiting_for_client_projects(){
        $query = $this->db->get_where('project', array('status_id' => '4'));
        return $query->result();
    }
    public function get_unassigned_projects(){
        $this->db->select('project.*, category.name as category, reference.name as reference, status.name as status');    
        $this->db->from('project');
        $this->db->join('category', 'category.id = project.category_id','left');
        $this->db->join('reference', 'reference.id = project.reference_id','left');
        $this->db->join('status', 'status.id = project.status_id');
        $this->db->where('status_id = 1');

        $query = $this->db->get();
        return $query->result();;
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
    public function getProjects(){
        $this->db->select('project.id, project.title, project.size, project.budget, category.name as category, reference.name as reference, status.name as status');    
        $this->db->from('project');
        $this->db->join('category', 'category.id = project.category_id','left');
        $this->db->join('reference', 'reference.id = project.reference_id','left');
        $this->db->join('status', 'status.id = project.status_id');
        $query = $this->db->get();
        return $query->result ();
    }
    public function get_project_by_id($id = 0){

        if ($id === 0)
        {
            $query = $this->db->get('project');
            return $query->result_array();
        }

        $query = $this->db->get_where('project', array('id' => $id));
        return $query->row_array();
    }
    public function get_single_project($id = 0){

        $this->db->select('project.*, category.name as category, reference.name as reference, status.name as status');    
        $this->db->from('project');
        $this->db->join('category', 'category.id = project.category_id','left');
        $this->db->join('reference', 'reference.id = project.reference_id','left');
        $this->db->join('status', 'status.id = project.status_id');
        $this->db->where('project.id =',$id);

        $query = $this->db->get();
        return $query->result();
    }
    
    public function set_project($id = 0, $data)
    {
        if ($id == 0) {
            return $this->db->insert('project', $data);
        } else {
            $this->db->where('id', $id);
            return $this->db->update('project', $data);
        }
    }
    public function delete_project($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('project');
    }
}
?>