<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Writer extends CI_Controller {
	//index function
	public function index(){

	}

	public function bid(){
		print_r($_POST);die;
		$user_id = $this->input->post('user_id');
		$project_id = $this->input->post('project_id');
		$data = array(
			'user_id' => $user_id,
			'project_id' => $project_id
		);
		$this->writer_model->add_bid($data);
	}

}