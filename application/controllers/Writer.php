<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Writer extends CI_Controller {
	
	var $data;

    function __construct(){
		parent::__construct(); // needed when adding a constructor to a controller
			// Load form helper library
		$this->load->model('login_database');
        $this->data = array(
			'projects' => $this->project->getAllProjects(),
			'open' => $this->project->getOpenProjects(),
			'completed' => $this->project->getCompletedProjects(),
			'unassigned' => $this->project->get_unassigned_projects(),
			'waiting_for_client' => $this->project->get_waiting_for_client_projects(),
			'writer_projects' => $this->writer_model->getAllProjects(),
			'writer_open' => $this->writer_model->getOpenProjects(),
			'writer_completed' => $this->writer_model->getCompletedProjects(),
			'writer_unassigned' => $this->writer_model->get_unassigned_projects(),
			'writer_waiting_for_client' => $this->writer_model->get_waiting_for_client_projects(),
			'project_categories' => $this->project->getProjectCategory(),
			'project_references' => $this->project->getProjectReferenceType(),
			'project_status' => $this->project->getProjectStatus(),
			'proficiencies' => $this->project->getProjectCategory(),
			'get_bids' => $this->writer_model->getBids(),
			'all_projects_title' => 'All Projects',
			'open_projects_title' => 'Open Projects',
			'completed_projects_title' => 'Completed Projects'
		);
	}
	//index function
	public function index()
	{
		$data = $this->data;
		$data['no_results'] = 2;	
		$this->load->view('writer/index', $data);
	}

	public function bid(){
		// print_r($_POST);die;
		$user_id = $this->input->post('user_id');
		$project_id = $this->input->post('project_id');
		$data = array(
			'user_id' => $user_id,
			'project_id' => $project_id
		);
		$this->writer_model->add_bid($data);
	}
	public function get_user_bids(){
		$data = $this->data;
		print_r($this->writer_model->getBids());
	}

	public function unassigned(){
		$data = $this->data;

		$writer_unassigned = $data['writer_unassigned'];
		$json_req = array(

            "sEcho"    =>1,
            "aaData" => $writer_unassigned
		);
		
		echo json_encode($json_req);
	}
	
	public function in_progress(){
		$data = $this->data;
		$writer_open = $data['writer_open'];
		$json_req = array(

            "sEcho"    =>1,
            "aaData" => $writer_open
		);
		
		echo json_encode($json_req);
	}

	public function waiting_for_client(){
		$data = $this->data;
		$writer_waiting = $data['writer_waiting_for_client'];
		$json_req = array(

            "sEcho"    =>1,
            "aaData" => $writer_waiting
		);
		// print_r($writer_waiting);die;
		echo json_encode($json_req);
	}
	public function completed(){
		$data = $this->data;
		$writer_completed = $data['writer_completed'];
		$json_req = array(

            "sEcho"    =>1,
            "aaData" => $writer_completed
		);
		
		echo json_encode($json_req);
	}

	public function all(){
		$data = $this->data;
		// $CI =& get_instance();
		// $csrf_name = $CI->security->get_csrf_token_name();;
		// $csrf_hash = $CI->security->get_csrf_hash();
		$writer_all = $data['writer_projects'];
		// print_r(json_encode($all));die;
		$json_req = array(
			"sEcho"    =>1,
            "aaData" => $writer_all
		);
		// print_r(json_encode($json_req));die;
		
		echo json_encode($json_req);
	}

}