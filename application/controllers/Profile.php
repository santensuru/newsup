<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

	/**
	 * Profile
	 * 
	 * Untuk mengeksekusi semua hal yang berkaitan dengan prfile user
	 * Insert, Read
	 */
	public function index()
	{
		redirect('/');
	}

	public function set()
	{
		if ( $this->session->userdata('logged_in') === TRUE )
		{
			$this->form_validation->set_rules('name', 'Nama Lengkap', 'required|trim|xss_clean|max_length[50]');

			if ($this->form_validation->run() === FALSE)
			{
				$data['error'] = validation_errors();
				$this->load->view('profile', $data);

			}
			else
			{
				$name = $this->input->post('name');
				
				$this->load->model('user_model');
				$user = $this->user_model->where('USERNAME',$this->session->userdata('user'))->get();
				$user_id = $user['USER_ID'];

				$this->load->model('profile_model');
				$insert_data = array('USER_ID'=>$user_id,'NAME'=>$name,'STATUS'=>0); // 0 - basic
				$this->profile_model->insert($insert_data);

				redirect('/');
			}
		}
		else
		{
			redirect('/');
		}
	}
}