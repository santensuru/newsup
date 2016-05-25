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
		$this->load->view('template/header');

		$login = array();
		$login['is_login'] = FALSE;
		if ( $this->session->userdata('logged_in') === TRUE ) {
			$login['is_login'] = TRUE;
		}
		$this->load->view('template/navbar',$login);

		$data = array();
		$this->load->view('index', $data);

		$footer['js_footer'] = $this->load->view('script/index_script','',TRUE);
		$this->load->view('template/footer',$footer);
	}

	public function register()
	{
		$this->form_validation->set_rules('username', 'Username', 'required|min_length[2]|max_length[50]|trim|xss_clean');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|xss_clean|valid_email|is_unique[user.EMAIL]');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[2]|trim|xss_clean');
		// $this->form_validation->set_rules('confirmation', 'Password Confirmation', 'trim|required|matches[password]|xss_clean');

		if ($this->form_validation->run() === FALSE)
		{
			$data['error'] = validation_errors();
			var_dump($data);
			// $this->load->view('register', $data);
		}
		else
		{
			$username = $this->input->post('username');
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			$status = $this->input->post('typeuser');

			$insert_data = array('USERNAME'=> $username,'EMAIL'=>$email,'PASSWORD'=>md5($password.'SALT'.$username), 'STATUS'=>$status);
			$this->load->model('user_model');
			$this->user_model->insert($insert_data);

			redirect('/home/login');
		}
	}

	public function login()
	{
		$this->form_validation->set_rules('username', 'Username', 'required|min_length[2]|max_length[50]|trim|xss_clean');
		$this->form_validation->set_rules('pwd', 'Password', 'required|min_length[2]|trim|xss_clean');

		// var_dump($this->input->post());
		// die();

		if ($this->form_validation->run() === FALSE)
		{
			// $data['error'] = validation_errors();
			// $this->load->view('login', $data);

			redirect('/');


		}
		else
		{
			$username = $this->input->post('username');
			$password = $this->input->post('pwd');

			$this->load->model('user_model');
			$user = $this->user_model->where('USERNAME',$username)->get();

			if ( $user['PASSWORD'] == md5($password.'SALT'.$username) ) {
			
				$user_data = array('user' => $username, 'logged_in' => TRUE);
					
				$this->session->set_userdata($user_data);

				redirect('/');
			}
			else
			{
				// $data['error'] = 'Username dan/atau Password salah';
				// $this->load->view('login', $data);

				redirect('/');
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
