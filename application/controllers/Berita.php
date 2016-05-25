<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita extends CI_Controller {

	/**
	 * Aspirasi
	 * 
	 * Untuk mengeksekusi semua hal yang berkaitan dengan aspirasi
	 * Insert, Read
	 */
	public function index($news_id=0)
	{
		$this->load->model('berita_model');
		
		if ($news_id === 0)
		{
			$total_posts = $this->berita_model->count_rows();
			$berita = $this->berita_model->where('PARENT_ID',0)->order_by('DATE', 'DESC')->paginate(10,$total_posts);
			
			if (!$berita)
			{
				$berita = [];
			}

			$data['berita'] = $berita;
			$data['paginasi'] = $this->berita_model->all_pages;
			$data['main'] = TRUE;
			$this->load->view('berita/berita', $data);
		}
		else
		{
			$berita = $this->berita_model->where('NEWS_ID',$news_id)->get();
			$sub_berita = $this->berita_model->where('PARENT_ID',$news_id)->order_by('DATE', 'ASC')->get_all();

			if (!$sub_berita)
			{
				$sub_berita = [];
			}

			$berita_ = array();
			array_push($berita_, $berita);

			$berita_ = array_merge($berita_, $sub_berita);

			$data['berita'] = $berita_;
			$data['paginasi'] = null;
			$data['main'] = FALSE;
			$data['news_id'] = $news_id;
			$this->load->view('berita/berita', $data);
		}
	}

	public function create($parent_id=0)
	{
		if ( $this->session->userdata('logged_in') === TRUE )
		{

			$this->load->model('category_model');
			$category = $this->category_model->get_all();

			if (!$category)
			{
				$category = [];
			}

			$data['category'] = $category;
			$data['header'] = '';
			
			$this->load->model('berita_model');
			if ($parent_id !== 0) {
				$berita = $this->berita_model->where('NEWS_ID',$parent_id)->get();
				$data['header'] = $berita['HEADER'];
			}

			$this->form_validation->set_rules('news', 'Berita', 'required|trim|xss_clean');
			$this->form_validation->set_rules('header', 'Judul', 'required|trim|xss_clean');
			$this->form_validation->set_rules('sub_header', 'Sub Judul', 'required|trim|xss_clean');

			$data['parent_id'] = $parent_id;

			if ($this->form_validation->run() === FALSE)
			{
				$data['error'] = validation_errors();
				$this->load->view('berita/create', $data);

			}
			else
			{
				$news = $this->input->post('news');
				$header = $this->input->post('header');
				$sub_header = $this->input->post('sub_header');
				$category_id = $this->input->post('category');

				$parent_id = $this->input->post('parent_id');
				
				$config['upload_path'] = './uploads/';
				$config['allowed_types'] = 'jpg|jpeg|png|gif|JPG|JPEG|PNG|GIF';
				$config['max_size']	= '2048';
				$this->load->library( 'upload', $config );

				// $this->load->helper('gambar');

				if ( ! $this->upload->do_upload( 'fileGambar' ) )
				{
					$data['error'] = 'Foto tidak dapat diunggah '.$this->upload->display_errors();
					$this->load->view('berita/create', $data);
				}
				else
				{
					// rename get_name( $news, $sub_header, $parent_id )

					$this->load->model('user_model');
					$user = $this->user_model->where('USERNAME',$this->session->userdata('user'))->get();
					$user_id = $user['USER_ID'];

					// $this->load->model('berita_model');
					// $header = $sub_header;
					
					// if ($parent_id !== 0) {
					// 	$berita = $this->berita_model->where('NEWS_ID',$parent_id)->get();
					// 	$header = $berita['HEADER'];
					// }

					$insert_data = array('USER_ID'=>$user_id,'NEWS'=>$news,'PARENT_ID'=>$parent_id,'CATEGORY_ID'=>$category_id,'HEADER'=>$header,'SUB_HEADER'=>$sub_header);
					$this->berita_model->insert($insert_data);

					// if ($parent_id === 0) {
					// 	$berita = $this->berita_model->where(array('HEADER'=>$header,'USER_ID'=>$user_id,'CATEGORY_ID'=>$category_id,'PARENT_ID'=>$parent_id))->get();
					// 	$parent_id = $berita['NEWS_ID'];

					// 	redirect('/berita/');
					// }

					redirect('/berita/index/'.$parent_id);
				}				
			}
		}
		else
		{
			redirect('/berita');
		}
	}
}
