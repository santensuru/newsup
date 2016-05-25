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
			$question = $this->question_model->where('NEWS_ID',$news_id)->order_by('QUESTION_ID', 'ASC')->get_all();
			
			if (!$question)
			{
				$question = array();
			}

			// var_dump($question);

			$return["_data"] = json_encode($question);
			echo json_encode($return);
		}
		else
		{
			redirect('/berita');
		}
	}
}