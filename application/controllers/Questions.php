<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Questions extends CI_Controller {

	function __construct() 
	{
		parent::__construct();
		$this->load->model("Questions_model");
	}

	public function index()
	{
		$questions = $this->Questions_model->get_questions();
		$data['result'] = $questions;
		$this->load->view('questions',$data);
	}
}
?>