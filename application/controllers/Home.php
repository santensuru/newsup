<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	/**
	 * Home
	 * 
	 * halaman utama, login, dll
	 */
	public function index()
	{
		$data = [];
		$data['is_login'] = FALSE;
		if ( $this->session->userdata('logged_in') === TRUE ) {
			$data['is_login'] = TRUE;
		}

		$this->load->view('home', $data);
	}

	public function register()
	{
		$this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|max_length[50]|trim|xss_clean');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|xss_clean|valid_email|is_unique[user.EMAIL]');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[5]|trim|xss_clean');
		$this->form_validation->set_rules('confirmation', 'Password Confirmation', 'trim|required|matches[password]|xss_clean');

		if ($this->form_validation->run() === FALSE)
		{
			$data['error'] = validation_errors();
			$this->load->view('register', $data);
		}
		else
		{
			$username = $this->input->post('username');
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			$status = $this->input->post('status');

			$insert_data = array('USERNAME'=>$username,'EMAIL'=>$email,'PASSWORD'=>md5($password.'SALT'.$username), 'STATUS'=>$status);
			$this->load->model('user_model');
			$this->user_model->insert($insert_data);

			redirect('/home/login');
		}
	}

	public function login()
	{
		$this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|max_length[50]|trim|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[5]|trim|xss_clean');

		if ($this->form_validation->run() === FALSE)
		{
			$data['error'] = validation_errors();
			$this->load->view('login', $data);

		}
		else
		{
			$username = $this->input->post('username');
			$password = $this->input->post('password');

			$this->load->model('user_model');
			$user = $this->user_model->where('USERNAME',$username)->get();

			if ( $user['PASSWORD'] == md5($password.'SALT'.$username) ) {
			
				$user_data = array('user' => $username, 'logged_in' => TRUE);
					
				$this->session->set_userdata($user_data);

				redirect('/home');
			}
			else
			{
				$data['error'] = 'Username dan/atau Password salah';
				$this->load->view('login', $data);
			}
		}
	}

	public function logout()
	{
		if ( $this->session->userdata('logged_in') === TRUE ) {
			$this->session->unset_userdata('user');
			$this->session->unset_userdata('logged_in');
			$this->session->sess_destroy();
		}
		redirect('/home');
	}
}
