<?php

// session_start(); //we need to start session in order to access it through CI

Class User_Authentication extends CI_Controller {
    // public function __construct(){
    //     parent::__construct(); // needed when adding a constructor to a controller
	// 		// Load form helper library
	// 	$this->load->model('login_database');
    //     $this->data = array(
	// 		'projects' => $this->project->getProjects(),
	// 		'open' => $this->project->getOpenProjects(),
	// 		'completed' => $this->project->getCompletedProjects(),
	// 		'unassigned' => $this->project->get_unassigned_projects(),
	// 		'waiting_for_client' => $this->project->get_waiting_for_client_projects(),
	// 		'project_categories' => $this->project->getProjectCategory(),
	// 		'project_references' => $this->project->getProjectReferenceType(),
	// 		'project_status' => $this->project->getProjectStatus(),
	// 		'all_projects_title' => 'All Projects',
	// 		'open_projects_title' => 'Open Projects',
	// 		'completed_projects_title' => 'Completed Projects'
    //     );
        // $th

    // public function __construct() {
    //     parent::__construct();

    //     // Load form helper library
    //     $this->load->helper('form');

    //     // Load form validation library
    //     $this->load->library('form_validation');

    //     // Load session library
    //     $this->load->library('session');

    //     // Load database
    //     $this->load->model('login_database');
    // }

// Show login page
    public function index() {
        $this->load->view('template/login_form');
    }

    // // Show registration page
    // public function user_registration_show() {
    //     $this->load->view('template/registration_form');
    // }

    // // Validate and store registration data in database
    // public function new_user_registration() {

    // // Check validation for user input in SignUp form
    //     $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
    //     $this->form_validation->set_rules('email_value', 'Email', 'trim|required|xss_clean');
    //     $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
    //     if ($this->form_validation->run() == FALSE) {
    //         $this->load->view('template/registration_form');
    //     } else {
    //         $data = array(
    //             'user_name' => $this->input->post('username'),
    //             'user_email' => $this->input->post('email_value'),
    //             'user_password' => $this->input->post('password')
    //         );
    //         $result = $this->login_database->registration_insert($data);
    //         if ($result == TRUE) {
    //             $data['message_display'] = 'Registration Successfully !';
    //             $this->load->view('login_form', $data);
    //         } else {
    //             $data['message_display'] = 'Username already exist!';
    //             $this->load->view('template/registration_form', $data);
    //         }
    //     }
    // }

    // // Check for user login process
    // // public function user_login_process() {

    // //     $data = $this->data;

    // //     $this->form_validation->set_rules('username', 'Username', 'trim|required');
    // //     $this->form_validation->set_rules('password', 'Password', 'trim|required');

    // //     if ($this->form_validation->run() == FALSE) {
    // //         // if(isset($this->session->userdata['logged_in'])){
    // //         //     $this->load->view('admin_page');
    // //         // }else{
    // //             $this->load->view('template/login_form');
    // //         // }
    // //     } else {

    // //         // $username = $password = "";

    // //         // if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // //         //     $username = test_input($_POST["username"]);
    // //         //     $password = test_input($_POST["password"]);
    // //         // }

    // //         // function test_input($input_data) {
    // //         //     $data = trim($input_data);
    // //         //     $data = stripslashes($input_data);
    // //         //     $data = htmlspecialchars($input_data);
    // //         //     return $input_data;
    // //         // }

    // //         $post_data = array(
    // //             'username' => $this->input->post('username') ,
    // //             'password' => $this->input->post('password')
    // //         );

    // //         $result = $this->login_database->login($post_data);
    // //         if ($result == TRUE) {

    // //             $username = $this->input->post('username');
    // //             $result = $this->login_database->read_user_information($username);
    // //             if ($result != false) {
    // //                 $session_data = array(
    // //                     'username' => $result[0]->username,
    // //                     'password' => $result[0]->password,
    // //                 );
    // //                 // Add user data in session
    // //                 $this->session->set_userdata('logged_in', $session_data);
    // //                 $this->load->view('template/view', $data);
    // //             }
    // //         } else {
    // //             $data = array(
    // //                 'error_message' => 'Invalid Username or Password'
    // //             );
    // //             $this->load->view('login_form', $data);
    // //         }
    // //     }
    // // }

    // // Logout from admin page
    // public function logout() {

    //     // Removing session data
    //     $sess_array = array(
    //         'username' => ''
    //     );
    //     $this->session->unset_userdata('logged_in', $sess_array);
    //     $data['message_display'] = 'Successfully Logout';
    //     $this->load->view('login_form', $data);
    // }

}

?>