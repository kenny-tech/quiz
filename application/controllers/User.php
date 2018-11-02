<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model("User_model");
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
	}

	public function index()
	{
		$user_id = $this->session->userdata('user_id');
		$data['quiz_results'] = $this->User_model->get_quiz_results($user_id);
		$this->load->view('home',$data);
	}

	public function register()
	{
		$this->load->library('form_validation');

		if($this->input->post())
		{
  		$this->form_validation->set_rules('name', 'Name', 'trim|required|xss_clean');
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]|xss_clean');
  		$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|required');

			if($this->form_validation->run() != false)
			{
			  $this->load->view('register');
			}
			else
			{
			  $data = array(
			    'name'=>$this->input->post('name'),
			    'email'=>$this->input->post('email'),
			    'password'=>md5($this->input->post('password')),
			  );
				$insert_data = $this->User_model->_insert($data);
        if($insert_data)
        {
 					$this->session->set_flashdata('successMessage','You have successfully registered. Please login to take the quiz.');
          redirect('user/login');
        }
			}
		}
		else
		{
			$this->load->view('register');
		}
  }

	public function login()
	{
		if($this->input->post())
		{
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email|xss_clean');
			$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|required');

			if($this->form_validation->run() != false)
			{
				$this->load->view('login');
			}
			else
			{
				//get input
				$email = $this->input->post('email');
				$password = md5($this->input->post('password'));

				//verify user
				$verify = $this->User_model->verify_user($email,$password);

				if($verify!=false)
				{
					foreach($verify as $row)
					{
						$userSessionData = array(
							'user_id' => $row->id,
							'name' => $row->name,
							'email' => $row->email,
							'isLoggedIn' => 1,
						);
						$this->session->set_userdata($userSessionData);
						$this->session->set_flashdata('successMessage','Welcome! Start taking the quiz now');
						redirect('questions');
					}
				}
				else
				{
					$this->session->set_flashdata('errorMessage','Invalid Username/Password');
					redirect('user/login');
				}
			}
		}
		else
		{
			$this->load->view('login');
		}
	}

}
