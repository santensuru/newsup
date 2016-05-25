<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Question extends CI_Controller {

	/**
	 * Question
	 * 
	 * Untuk mengeksekusi semua hal yang berkaitan dengan kuisioner berita
	 * Insert, Read
	 */
	public function index($news_id=0)
	{
		$this->load->model('question_model');
		
		if ($news_id !== 0)
		{
			$total_posts = $this->question_model->count_rows();
			$command = $this->question_model->where('NEWS_ID',$news_id)->order_by('DATE', 'ASC')->get_all();
			
			if (!$command)
			{
				$command = [];
			}

			var_dump($command);
		}
		else
		{
			redirect('/berita');
		}
	}
}