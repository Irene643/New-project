<?php
// defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	// "global" items
    var $data;

    function __construct(){
        parent::__construct(); // needed when adding a constructor to a controller
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
	public function index()
	{	
		$data = $this->data;
		$this->load->view('template/home', $data);
	}
	
	public function create(){
		$data = $this->data;
 
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
			// echo('please try again');
			$this->load->view('template/create', $data);
		}else{
			// echo('success');
			$this->load->view('template/create', $data);
		
		}
		
	}
	public function saveProject(){
		$data = $this->data;
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
		$this->project->saveProject($post_data);
		$this->load->view('template/create', $data);
		echo "Records Saved Successfully";
		
	}
	public function view_all()
	{
		$data = $this->data;	
		$this->load->view('template/view', $data);
	}

	public function unassigned(){
		$data = $this->data;
		$unassigned = $data['unassigned'];
		$json_req = array(

            "sEcho"    =>1,
            "aaData" => $unassigned
		);
		
		echo json_encode($json_req);
	}
	
	public function in_progress(){
		$data = $this->data;
		$open = $data['open'];
		$json_req = array(

            "sEcho"    =>1,
            "aaData" => $open
		);
		
		echo json_encode($json_req);
	}

	public function waiting_for_client(){
		$data = $this->data;
		$waiting = $data['waiting_for_client'];
		$json_req = array(

            "sEcho"    =>1,
            "aaData" => $waiting
		);
		
		echo json_encode($json_req);
	}
	public function completed(){
		$data = $this->data;
		$completed = $data['completed'];
		$json_req = array(

            "sEcho"    =>1,
            "aaData" => $completed
		);
		
		echo json_encode($json_req);
	}

	public function all(){
		$data = $this->data;
		// $CI =& get_instance();
		// $csrf_name = $CI->security->get_csrf_token_name();;
		// $csrf_hash = $CI->security->get_csrf_hash();
		$all = $data['projects'];
		// print_r(json_encode($all));die;
		$json_req = array(

            "sEcho"    =>1,
            "aaData" => $all
		);
		
		echo json_encode($json_req);
	}
	public function view_single(){
		$id = $this->uri->segment(3);
		$data = $this->data;
		$data['project'] = $this->project->get_single_project($id);
 
		$this->load->view('template/viewsingle', $data);
		return true;
	}

	public function edit()
    {
		$data = $this->data;
		
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
        $id = $this->uri->segment(3);
        
        if (empty($id))
        {
            show_404();
		}

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
			echo('Please try again');
			redirect( base_url() . 'index.php/projects#all');
		}else{
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
            redirect( base_url() . 'index.php/projects');
        }
	}
	public function delete()
    {
        $id = $this->uri->segment(3);
        
        if (empty($id))
        {
            show_404();
        }
                
        $project = $this->project->get_project_by_id($id);
        
        $this->project->delete_project($id);        
        redirect( base_url() . 'index.php/projects');        
    }
    
}
