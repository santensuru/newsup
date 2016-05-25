<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Command extends CI_Controller {

	/**
	 * Command
	 * 
	 * Untuk mengeksekusi semua hal yang berkaitan dengan komentar berita
	 * Insert, Read
	 */
	public function index($news_id=0)
	{
		$this->load->model('command_model');
		
		if ($news_id !== 0)
		{
			$total_posts = $this->command_model->count_rows();
			$command = $this->command_model->where('NEWS_ID',$news_id)->order_by('DATE', 'ASC')->get_all();
			
			if (!$command)
			{
				$command = [];
			}

			// var_dump($command);

			$return["_data"] = json_encode($command);
			echo json_encode($return);
		}
		else
		{
			redirect('/berita');
		}
	}
}