<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aspirasi extends CI_Controller {

	/**
	 * Aspirasi
	 * 
	 * Untuk mengeksekusi semua hal yang berkaitan dengan aspirasi
	 * Insert, Read
	 */
	public function index()
	{
		$this->load->model('aspirasi_model');
		$total_posts = $this->aspirasi_model->count_rows();
		$aspirasi = $this->aspirasi_model->order_by('DATE', 'DESC')->paginate(10,$total_posts); // as_array()->get_all();

		if (!$aspirasi)
		{
			$aspirasi = [];
		}

		$data['aspirasi'] = $aspirasi;
		$data['paginasi'] = $this->aspirasi_model->all_pages;
		$this->load->view('aspirasi', $data);
	}

	public function create()
	{
		$this->form_validation->set_rules('aspirasi', 'Aspirasi', 'required|trim|xss_clean');

		if ($this->form_validation->run() === FALSE)
		{
			redirect('/aspirasi');

		}
		else
		{
			$aspirasi = $this->input->post('aspirasi');
			$user_id = 0;
			if ( $this->session->userdata('logged_in') === TRUE ) {
				$this->load->model('user_model');
				$user = $this->user_model->where('USERNAME',$this->session->userdata('user'))->get();
				$user_id = $user['USER_ID'];
			}
			$insert_data = array('USER_ID'=>$user_id,'ASPIRASI'=>$aspirasi);
			$this->load->model('aspirasi_model');
			$this->aspirasi_model->insert($insert_data);

			redirect('/aspirasi');
		}
	}
}
