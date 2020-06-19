<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	var $data;

    function __construct(){
		parent::__construct(); // needed when adding a constructor to a controller
			// Load form helper library
		$this->load->model('login_database');
        $this->data = array(
			'projects' => $this->project->getProjects(),
			'open' => $this->project->getOpenProjects(),
			'completed' => $this->project->getCompletedProjects(),
			'unassigned' => $this->project->get_unassigned_projects(),
			'waiting_for_client' => $this->project->get_waiting_for_client_projects(),
			'project_categories' => $this->project->getProjectCategory(),
			'project_references' => $this->project->getProjectReferenceType(),
			'project_status' => $this->project->getProjectStatus(),
			'all_projects_title' => 'All Projects',
			'open_projects_title' => 'Open Projects',
			'completed_projects_title' => 'Completed Projects'
        );
        // $this->data can be accessed from anywhere in the controller.
    } 

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index(){

			$this->load->view('template/login');
	}

	// 
	function login_user(){ 
		$data = $this->data;
		// $username=$this->input->post('password');
		// $user_login=array(
		// 	'username'=>$this->input->post('username'),
		// 	'password'=>md5($this->input->post('password'))
		// ); 
		// Load the model
		$username = $this->security->xss_clean($this->input->post('username'));
		$password = $this->security->xss_clean($this->input->post('password'));

		$login_data = $this->login_database->validate($username, $password);
		// print_r($login_data[0]->id);
		if(isset($login_data[0])){
			// echo($login_data[0]->id);
			// If there is a user, then create session data
			// $row = $query->row_data;
			$session_data = array(
				'id' => $login_data[0]->id,
				'username' => $login_data[0]->username
			);
			print_r($session_data);
			$this->session->set_userdata($session_data);
			// error_reporting(1);
			// redirect('index.php/projects');
		}else{
			echo('wrong login');
			$this->load->view('template/login');
		}
	   
	  }
	   
	  function user_profile(){
	   
	  $this->load->view('user_profile.php');
	   
	  }
	  public function user_logout(){
	   
		$this->session->sess_destroy();
		redirect('user/login_view', 'refresh');
	  }
	   
}
