<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Command extends CI_Controller {

	/**
	 * Command
	 * 
	 * Untuk mengeksekusi semua hal yang berkaitan dengan komentar berita / artikel
	 * Insert, Read
	 */
	public function index()
	{
		$news_id = $this->input->post('news_id');

		$this->load->model('command_model');
		
		if ($news_id !== 0)
		{
			$command = $this->command_model->where('NEWS_ID',$news_id)->order_by('DATE', 'ASC')->get_all();
			
			if (!$command)
			{
				$command = array();
			}

			// var_dump($command);

			// $return["_data"] = json_encode($command);

			$my_command = array();
			foreach ($command as $row) {
				$this->load->model('user_model');
				$user = $this->user_model->where('USER_ID',$row['USER_ID'])->get();

				$row['USERNAME']=$user['USERNAME'];

				array_push($my_command, $row);
			}

			echo json_encode($my_command);
		}
		else
		{
			redirect('/berita');
		}
	}
}