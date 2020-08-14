<?php

class Writer_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        // session_start();
    }
    public function add_bid($data){
        // print_r($data['project_id']);exit;
        $query = $this->db->get_where('bid',$data);
        if($query->num_rows() > 0){
            echo("Record exists");  
        }else{
           return $this->db->insert('bid', $data); 
        }
        redirect('/index.php/writer-dashboard');
        echo('you have already applied');
        
    }

    public function getBids(){
        $query = $this->db->get_where('bid','user_id = '.$_SESSION["id"]);
        if($query->num_rows() > 0)
        return $query->result();
    }

    public function getAllProjects(){
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
    public function getOpenProjects(){
        $this->db->select('project.*, category.name as category, reference.name as reference, status.name as status');    
        $this->db->from('project');
        $this->db->join('category', 'category.id = project.category_id','left');
        $this->db->join('reference', 'reference.id = project.reference_id','left');
        $this->db->join('status', 'status.id = project.status_id');
        $this->db->where('status.id = 2');
        if(isset($_SESSION["id"])):
            $this->db->where('assigned_to =', $_SESSION["id"]);
        endif;
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
        if(isset($_SESSION["id"])):
            $this->db->where('assigned_to =', $_SESSION["id"]);
        endif;
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
        if(isset($_SESSION["id"])):
            $this->db->where('assigned_to =', $_SESSION["id"]);
        endif;
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
}