<?php

class Project extends CI_Model {

    public function __construct() {
        parent::__construct();
        // session_start();
    }
    // public function getUnassignedProjects(){
    //     $query = $this->db->get_where('project', array('status_id' => '1'));
    //     return $query->result();
    // }
    public function getOpenProjects(){
        $this->db->select('project.*, category.name as category, reference.name as reference, status.name as status');    
        $this->db->from('project');
        $this->db->join('category', 'category.id = project.category_id','left');
        $this->db->join('reference', 'reference.id = project.reference_id','left');
        $this->db->join('status', 'status.id = project.status_id');
        $this->db->where('status.id = 2');

        $query = $this->db->get();
        return $query->result();
    }
    public function getCompletedProjects(){
        $this->db->select('project.*, category.name as category, reference.name as reference, status.name as status');    
        $this->db->from('project');
        $this->db->join('category', 'category.id = project.category_id','left');
        $this->db->join('reference', 'reference.id = project.reference_id','left');
        $this->db->join('status', 'status.id = project.status_id');
        $this->db->where('status.id = 3');

        $query = $this->db->get();
        return $query->result();
    }
    public function get_waiting_for_client_projects(){
        $this->db->select('project.*, category.name as category, reference.name as reference, status.name as status');    
        $this->db->from('project');
        $this->db->join('category', 'category.id = project.category_id','left');
        $this->db->join('reference', 'reference.id = project.reference_id','left');
        $this->db->join('status', 'status.id = project.status_id');
        $this->db->where('status.id = 4');

        $query = $this->db->get();
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
        redirect('index.php/projects');
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
    public function getWriterProjects(){
        $this->db->select('project.*, category.name as category, reference.name as reference, status.name as status');    
        $this->db->from('project');
        $this->db->join('category', 'category.id = project.category_id','left');
        $this->db->join('reference', 'reference.id = project.reference_id','left');
        $this->db->join('status', 'status.id = project.status_id');
        if(isset($_SESSION["id"])):
        $this->db->where('assigned_to =', $_SESSION["id"]);
        endif;
        $query = $this->db->get();
        // print_r($_SESSION["id"]);
        return $query->result ();
        
    }
    public function getAllProjects(){
        $this->db->select('project.*, category.name as category, reference.name as reference, status.name as status');    
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
        // $this->db->order_by STR_TO_DATE(DateTime, created_at,101)  DESC;

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