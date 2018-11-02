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

	public function mark()
	{
		if($this->input->post())
		{
			$post_data = extract($_POST);//extracts the data posted
			$total_answer = 0;
			$num = 0;
			//loop through the questions answered
			for($i=1; $i<=count($ans); ++$i)
			{
				//process query so that the result can be displayed or used
				$result = $this->Questions_model->getquestions();
				++$num;
				$id_no = $id[$num];
				$question = $id[$i];
				$answer = $ans[$i];

				//get the questions the user answered and check it if the same with that in the database and score the user based on that
				$query2 = $this->Questions_model->get_valid_answers($question,$answer);
				if($query2)
				{
					$total_answer += 0;
        }
 				else
				{
        	$total_answer+=1;
				}
			}
					$user_id = $this->session->userdata('user_id');
					$data = array(
						'user_id' => $user_id,
						'score' => $total_answer
					);
					$this->Questions_model->store_result($data);
		}
	}
}
