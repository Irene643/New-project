<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

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
		$data['projects'] = $this->project->getProjects();
		$data['open'] = $this->project->getOpenProjects();
		$data['completed'] = $this->project->getCompletedProjects();
		$this->load->view('template/index', $data);
	}
	
	public function create(){
		// $data['page_title'] = 'Create New Project';
		$data['project_categories'] = $this->project->getProjectCategory();
		$data['project_references'] = $this->project->getProjectReferenceType();
		$data['project_status'] = $this->project->getProjectStatus();
 
        $this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('category', 'Category', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');
		$this->form_validation->set_rules('size', 'Words/Pages', 'required');
		$this->form_validation->set_rules('reference_type', 'Reference Type', 'required');
		$this->form_validation->set_rules('due_date', 'Due Date', 'required');
		$this->form_validation->set_rules('description', 'Description', 'required');
		$this->form_validation->set_rules('attached_files', 'Attach Files', 'required');
		$this->form_validation->set_rules('budget', 'Budget', 'required');
		$this->form_validation->set_rules('customer_billing', 'Customer Billing', 'required');
		if ($this->form_validation->run() == FALSE)
		{
			echo('please try again');
			$this->load->view('template/create', $data);
		}else{
			echo('success');
			$this->load->view('template/create', $data);
		
		}
		
	}
	public function saveProject(){
		$this->load->view('template/create');

		// var_dump($this->input->post());die;
	
		/*Check submit button */
		$title=$this->input->post('title');
		$category=$this->input->post('category');
		$status=$this->input->post('status');
		$size=$this->input->post('size');
		$reference_type=$this->input->post('reference_type');
		$due_date=$this->input->post('due_date');
		$description=$this->input->post('description');
		$attached_files=$this->input->post('attached_files');
		$budget=$this->input->post('budget');
		$customer_billing=$this->input->post('customer_billing');

		$data = array(
			'title'=>$title,
			'category_id'=>$category,
			'status_id'=>$status,
			'size'=>$size,
			'reference_id'=>$reference_type,
			'due_date'=>$due_date,
			'description'=>$description,
			'attached_files'=>$attached_files,
			'budget'=>$budget, 
			'customer_billing'=>$customer_billing
		);
		$this->project->saveProject($data);	
		echo "Records Saved Successfully";
		
	}
	public function view_all()
	{	$data = array(
			'all_projects_title' => 'All Projects',
			'open_projects_title' => 'Open Projects',
			'completed_projects_title' => 'Completed Projects'
		);
		$data['projects'] = $this->project->getProjects();
		$data['open'] = $this->project->getOpenProjects();
		$data['completed'] = $this->project->getCompletedProjects();
		$this->load->view('template/view', $data);
	}
	public function edit()
    {
        $id = $this->uri->segment(3);
        
        if (empty($id))
        {
            show_404();
		}
		$data = array(
			'all_projects_title' => 'All Projects',
			'open_projects_title' => 'Open Projects',
			'completed_projects_title' => 'Completed Projects'
		);
		$data['id'] = $this->uri->segment(3);
		$data['projects'] = $this->project->getProjects();
		$data['open'] = $this->project->getOpenProjects();
		$data['completed'] = $this->project->getCompletedProjects();
        $data['title'] = 'Edit Project';        
        $data['single_project'] = $this->project->get_project_by_id($id);
        
        $this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('category', 'Category', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');
		$this->form_validation->set_rules('size', 'Words/Pages', 'required');
		$this->form_validation->set_rules('reference_type', 'Reference Type', 'required');
		$this->form_validation->set_rules('due_date', 'Due Date', 'required');
		$this->form_validation->set_rules('description', 'Description', 'required');
		$this->form_validation->set_rules('attached_files', 'Attach Files', 'required');
		$this->form_validation->set_rules('budget', 'Budget', 'required');
		$this->form_validation->set_rules('customer_billing', 'Customer Billing', 'required');

		if ($this->form_validation->run() === FALSE)
		{
			echo('please try again');
			$this->load->view('template/edit', $data);
		}
        else
        {
			$post_data = array(
				'title'=>$title,
				'category_id'=>$category,
				'status_id'=>$status,
				'size'=>$size,
				'reference_id'=>$reference_type,
				'due_date'=>$due_date,
				'description'=>$description,
				'attached_files'=>$attached_files,
				'budget'=>$budget, 
				'customer_billing'=>$customer_billing
			);

            $this->project->set_project($id, $post_data);
            //$this->load->view('news/success');
            redirect( base_url() . 'index.php/news');
        }
    }
    
}
