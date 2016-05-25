<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {

	/**
	 * Category
	 * 
	 * Untuk mengeksekusi semua hal yang berkaitan dengan category berita / artikel
	 * Insert, Read
	 */
	public function index()
	{
		$category_id=$this->input->post("id");

		$this->load->model('category_model');
		
		if ($category_id !== 0)
		{
			$sub_category = $this->category_model->where('PARENT_ID',$category_id)->get_all();
			
			if (!$sub_category)
			{
				$sub_category = array();
			}

			// var_dump($sub_category);
			echo json_encode($sub_category);
		}
		else
		{
			redirect('/berita');
		}
	}
}