<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    public function __construct() {
        parent::__construct();
		$this->load->model('project');
		$this->load->helper('url');
		$this->load->helper('form');
        $this->load->library('form_validation');
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
	public function index()
	{	$data = array(
			'all_projects_title' => 'All Projects',
			'open_projects_title' => 'Open Projects',
			'completed_projects_title' => 'Completed Projects'
		);
		$data['projects'] = $this->project->getAllProjects();
		$data['open'] = $this->project->getOpenProjects();
		$data['completed'] = $this->project->getCompletedProjects();
		$this->load->view('template/index', $data);
	}
	
	public function create(){
        $data['title'] = 'Create New Project';
 
        $this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('code', 'Code', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');
		
		$this->load->view('template/create', $data);
	}
}
