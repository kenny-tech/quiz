<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function index()
	{
		$this->load->view('login');
	}

	public function register()
	{
		$this->load->library('form_validation');

		if($this->input->post())
		{
			$this->load->helper(array('form', 'url'));
			$this->load->library('form_validation');
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
				$this->load->model("User_model");
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
		$this->load->view('login');
	}
}
