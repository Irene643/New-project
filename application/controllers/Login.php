<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	var $data;
	var $is_logged_in;

    function __construct(){
		parent::__construct(); // needed when adding a constructor to a controller
		//start user session
		// session_start();
		// Load form helper library
		$this->load->model('login_database');
        $this->data = array(
			'projects' => $this->project->getAllProjects(),
			'open' => $this->project->getOpenProjects(),
			'completed' => $this->project->getCompletedProjects(),
			'unassigned' => $this->project->get_unassigned_projects(),
			'waiting_for_client' => $this->project->get_waiting_for_client_projects(),
			'project_categories' => $this->project->getProjectCategory(),
			'project_references' => $this->project->getProjectReferenceType(),
			'project_status' => $this->project->getProjectStatus(),
			'proficiencies' => $this->project->getProjectCategory(),
			'writer_projects' => $this->project->getWriterProjects(),
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
		$data = $this->data;
		// $this-> login_user();
		// $this->load->view('template/view', $data);
	}

	// 
	function login_user(){ 
		// print_r($_POST);die;
		$data = $this->data;
		// $username=$this->input->post('password');
		// $user_login=array(
		// 	'username'=>$this->input->post('username'),
		// 	'password'=>md5($this->input->post('password'))
		// ); 
		// Load the model
		$username = $this->security->xss_clean($this->input->post('username'));
		$password = $this->security->xss_clean($this->input->post('password'));
		// $password = $this->security->xss_clean($this->input->md5(post('password')));
		if($username&&$password){
			// print_r($username.' '. $password);die;
			$login_data = $this->login_database->validate($username, $password);
			// print_r($login_data);die;
			// print_r($login_data[0]->id);
			if(isset($login_data[0])){
				// echo($login_data[0]->id);
				// If there is a user, then create session data
				$session_data = array(
					'id' => $login_data[0]->id,
					'username' => $login_data[0]->username,
					'firstname'=> $login_data[0]->firstname,
					'lastname'=> $login_data[0]->lastname,
					'user_role'=>$login_data[0]->user_role,
					'is_logged_in'=>TRUE
				);
				$this->session->set_userdata($session_data);

				if ($this->session->userdata('is_logged_in')) {
					// redirect('', 'refresh');
					if($_SESSION['user_role'] == 1){
						redirect('index.php/admin-dashboard');
					}
					redirect('index.php/writer-dashboard');
					// print_r($this->session->userdata('is_logged_in'));die;
				}
				// if (isset($_SESSION['username']) && ($_SESSION['username'] == $username)) {

				// 	print_r($_SESSION['is_logged_in']);
					
					// echo '<font color="#00FF00">OK</font>';  
					// $this->load->view('template/index', $data);
				// }
				
			}else{
				
				redirect('', 'refresh');
				echo('wrong login');
			}
		}else{
			echo('Please enter username and password');	
			redirect('', 'refresh');
			
		}
	   
	  }
	  public function sign_up(){
		print_r($_POST);
		$this->form_validation->set_rules('firstname', 'First name', 'required');
		$this->form_validation->set_rules('lastname', 'Last Name', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required');
		$this->form_validation->set_rules('experience_length', 'Experience length', 'required');
		$this->form_validation->set_rules('proficiency', 'Proficiency Area(s)', 'required');
		// if($this->form_validation->run() != false){
			if($_POST){
				$firstname = $this->input->post('firstname');
				$lastname = $this->input->post('lastname');
				$email = $this->input->post('email');
				$username = $this->input->post('username');
				$password = $this->input->post('password');
				$confirm_password = $this->input->post('confirm_password');
				$experience_length = $this->input->post('experience_length');
				$proficiency = implode(',',$this->input->post('proficiency'));
			}
			$post_data = array(
				'firstname'=>$firstname,
				'lastname'=>$lastname,
				'email'=>$email,
				'username'=>$username,
				'password'=>$password,
				'confirm_password'=>$confirm_password,
				'experience_length'=>$experience_length,
				'proficiency'=>$proficiency
			);
			print_r($post_data);
			$this->login_database->registration_insert($post_data);
		// }else{
		// 	echo("form validation false");
		// }
	  }
	   
	  function user_profile(){
	   
	  $this->load->view('user_profile.php');
	   
	  }
	  public function user_logout(){
	   
		session_destroy();
		// echo $_SESSION['username'];die;
		redirect('', 'refresh');
	  }
	   
}
