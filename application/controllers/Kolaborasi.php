<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kolaborasi extends CI_Controller {

	/**
	 * Kolaborasi
	 * 
	 * Untuk mengeksekusi semua hal yang berkaitan dengan kolaborasi seperti artikel bersambung
	 * Insert, Read
	 */

	public function index(){
		$this->load->view('template/header');
		$login = array();
		$login['is_login'] = FALSE;
		if ( $this->session->userdata('logged_in') === TRUE ) {
			$login['is_login'] = TRUE;
		}
		$this->load->view('template/navbar',$login);
		
		$this->load->model('berita_model');

		$total_posts = $this->berita_model->count_rows();
		$berita = $this->berita_model->where(array('PARENT_ID'=>0,'IS_NEWS'=>0))->order_by('DATE', 'DESC')->paginate(10,$total_posts);
		
		if (!$berita)
		{
			$berita = array();
		}

		$data['berita'] = $berita;

		
		$this->load->view('artikel',$data);
		
		$footer['js_footer'] = $this->load->view('script/artikel_script','',TRUE);
		$this->load->view('template/footer',$footer);

	}	

	// public function index($news_id=0)
	// {
	// 	$this->load->model('berita_model');
		
	// 	if ($news_id === 0)
	// 	{
	// 		$total_posts = $this->berita_model->count_rows();
	// 		$berita = $this->berita_model->where(array('PARENT_ID'=>0,'IS_NEWS'=>0))->order_by('DATE', 'DESC')->paginate(10,$total_posts);
			
	// 		if (!$berita)
	// 		{
	// 			$berita = array();
	// 		}

	// 		$data['berita'] = $berita;
	// 		$data['paginasi'] = $this->berita_model->all_pages;
	// 		$data['main'] = TRUE;
	// 		$this->load->view('kolaborasi/berita', $data);
	// 	}
	// 	else
	// 	{
	// 		$berita = $this->berita_model->where(array('NEWS_ID'=>$news_id,'IS_NEWS'=>0))->get();
	// 		$sub_berita = $this->berita_model->where(array('PARENT_ID'=>$news_id,'IS_NEWS'=>0))->order_by('DATE', 'ASC')->get_all();

	// 		if (!$sub_berita)
	// 		{
	// 			$sub_berita = array();
	// 		}

	// 		$berita_ = array();
	// 		array_push($berita_, $berita);

	// 		$berita_ = array_merge($berita_, $sub_berita);

	// 		$data['berita'] = $berita_;
	// 		$data['paginasi'] = null;
	// 		$data['main'] = FALSE;
	// 		$data['news_id'] = $news_id;
	// 		$this->load->view('kolaborasi/berita', $data);
	// 	}
	// }

	public function create_artikel(){
		$this->load->model('category_model');

		$category = $this->category_model->where('PARENT_ID',2)->get_all();
		// $category_id = $category[0]['CATEGORY_ID'];
		// $sub_category = $this->category_model->where('PARENT_ID',$category_id)->get_all();

		if (!$category)
		{
			$category = array();
		}

		// if (!$sub_category)
		// {
		// 	$sub_category = array();
		// }

		$data['category'] = $category;
		// $data['sub_category'] = $sub_category;

		$this->form_validation->set_rules('news', 'Artikel', 'required|trim|xss_clean');
		$this->form_validation->set_rules('judul', 'Judul', 'required|trim|xss_clean');

		if ($this->form_validation->run() === FALSE)
		{
			$this->load->view('template/header');
			$login = array();
			$login['is_login'] = FALSE;
			if ( $this->session->userdata('logged_in') === TRUE ) {
				$login['is_login'] = TRUE;
			}
			$this->load->view('template/navbar',$login);

			$this->load->view('create_artikel',$data);
		
			$footer['js_footer'] = $this->load->view('script/artikel_script','',TRUE);
			$this->load->view('template/footer',$footer);

		}
		else
		{
			$news = $this->input->post('news');
			$header = $this->input->post('judul');
			$sub_header = $header;
			$category_id = $this->input->post('sub_category');
			$karya = $this->input->post('karya');

			// echo $karya;
			// die();

			// $config['upload_path'] = './uploads/';
			// $config['allowed_types'] = 'jpg|jpeg|png|gif|JPG|JPEG|PNG|GIF';
			// $config['max_size']	= '2048';
			
			// $this->load->helper('gambar');
			// $new_name = get_name( $header, $sub_header, 0 );
			// $config['file_name'] = $new_name;

			// $this->load->library( 'upload', $config );

			// if ( ! $this->upload->do_upload( 'fileGambar' ) )
			// {
			// 	// $data['error'] = 'Foto tidak dapat diunggah '.$this->upload->display_errors();
			// 	$this->load->view('template/header');
			// 	$login = array();
			// 	$login['is_login'] = FALSE;
			// 	if ( $this->session->userdata('logged_in') === TRUE ) {
			// 		$login['is_login'] = TRUE;
			// 	}
			// 	$this->load->view('template/navbar',$login);

			// 	$this->load->view('create_artikel',$data);
		
			// 	$footer['js_footer'] = $this->load->view('script/artikel_script','',TRUE);
			// 	$this->load->view('template/footer',$footer);
			// }
			// else
			// {

				$this->load->model('user_model');
				$user = $this->user_model->where('USERNAME',$this->session->userdata('user'))->get();
				$user_id = $user['USER_ID'];

				$this->load->model('berita_model');
				// $header = $sub_header;
				
				// if ($parent_id !== 0) {
				// 	$berita = $this->berita_model->where('NEWS_ID',$parent_id)->get();
				// 	$header = $berita['HEADER'];
				// }

				$insert_data = array('USER_ID'=>$user_id,'NEWS'=>$news,'PARENT_ID'=>0,'CATEGORY_ID'=>$category_id,'HEADER'=>$header,'SUB_HEADER'=>$sub_header,'IS_NEWS'=>0,'PERMISSION'=>$karya);
				$this->berita_model->insert($insert_data);

				// if ($parent_id === 0) {
				$berita = $this->berita_model->where('IMAGE',$new_name)->get();
				$parent_id = $berita['NEWS_ID'];

				// 	redirect('/berita/');
				// }

				redirect('/kolaborasi/detail_artikel/'.$parent_id);
			// }				
		}
	}	

	public function detail_artikel($news_id=0)
	{
		$this->load->view('template/header');
		$login = array();
		$login['is_login'] = FALSE;
		if ( $this->session->userdata('logged_in') === TRUE ) {
			$login['is_login'] = TRUE;
		}
		$this->load->view('template/navbar',$login);

		$this->load->model('berita_model');
		$berita = $this->berita_model->where(array('NEWS_ID'=>$news_id,'IS_NEWS'=>0))->get();
		$parent = $this->berita_model->where(array('NEWS_ID'=>$berita['PARENT_ID'],'IS_NEWS'=>0))->get();

		if (!$parent)
		{
			$parent = null;
		}

		$sub_berita = $this->berita_model->where(array('PARENT_ID'=>$news_id,'IS_NEWS'=>0))->order_by('DATE', 'ASC')->get_all();

		if (!$sub_berita)
		{
			$sub_berita = array();
		}

		$berita_ = array();
		array_push($berita_, $berita);

		$berita_ = array_merge($berita_, $sub_berita);

		$my_berita = array();
		foreach ($berita_ as $row) {
			$this->load->model('user_model');
			$user = $this->user_model->where('USER_ID',$row['USER_ID'])->get();

			$row['USERNAME']=$user['USERNAME'];

			array_push($my_berita, $row);
		}

		if (!!$parent) {
			$this->load->model('user_model');
			$user = $this->user_model->where('USER_ID',$parent['USER_ID'])->get();

			$parent['USERNAME'] = $user['USERNAME'];
		}
		
		// var_dump($parent);
		// die();

		$data['berita'] = $my_berita;
		// $data['paginasi'] = null;
		// $data['main'] = FALSE;
		$data['news_id'] = $news_id;
		$data['parent'] = $parent;

		$this->load->view('detail_artikel',$data);
		
		$footer['js_footer'] = $this->load->view('script/detail_artikel_script','',TRUE);
		$this->load->view('template/footer',$footer);
	}

	// sambung
	public function kolaborasi_artikel($parent_id=0){
		$data['parent_id'] = $parent_id;
		$this->load->model('berita_model');
		$berita = $this->berita_model->where('NEWS_ID',$parent_id)->get();
		
		$this->load->model('user_model');
		$user = $this->user_model->where('USER_ID',$berita['USER_ID'])->get();
		$berita['USERNAME'] = $user['USERNAME'];

		$data['berita'] = $berita;
		
		$this->form_validation->set_rules('news', 'Berita', 'required|trim|xss_clean');

		if ($this->form_validation->run() === FALSE)
		{
			$this->load->view('template/header');
			$login = array();
			$login['is_login'] = FALSE;
			if ( $this->session->userdata('logged_in') === TRUE ) {
				$login['is_login'] = TRUE;
			}
			$this->load->view('template/navbar',$login);

			$this->load->view('kolaborasi_artikel',$data);
		
			$footer['js_footer'] = $this->load->view('script/artikel_script','',TRUE);
			$this->load->view('template/footer',$footer);

		}
		else
		{
			$news = $this->input->post('news');
			$parent_id = $this->input->post('parent_id');

			// echo $sub_header;
			// die();

			$this->load->model('user_model');
			$user = $this->user_model->where('USERNAME',$this->session->userdata('user'))->get();
			$user_id = $user['USER_ID'];

			// $this->load->model('berita_model');
			$berita = $this->berita_model->where('NEWS_ID',$parent_id)->get();
			$category_id = $berita['CATEGORY_ID'];
			$sub_header = $berita['HEADER'];
			$karya = 2;
			$header = $sub_header;

			$insert_data = array('USER_ID'=>$user_id,'NEWS'=>$news,'PARENT_ID'=>$parent_id,'CATEGORY_ID'=>$category_id,'HEADER'=>$header,'SUB_HEADER'=>$sub_header,'IS_NEWS'=>0,'PERMISSION'=>$karya);
			$this->berita_model->insert($insert_data);

			redirect('/kolaborasi/detail_artikel/'.$parent_id);
		}
	}

	// kontribusi / edit
	public function kontribusi_artikel($parent_id=0){
		$data['parent_id'] = $parent_id;
		$this->load->model('berita_model');
		$berita = $this->berita_model->where('NEWS_ID',$parent_id)->get();
		$data['berita'] = $berita;
		
		$this->form_validation->set_rules('news', 'Berita', 'required|trim|xss_clean');

		if ($this->form_validation->run() === FALSE)
		{
			$this->load->view('template/header');
			$login = array();
			$login['is_login'] = FALSE;
			if ( $this->session->userdata('logged_in') === TRUE ) {
				$login['is_login'] = TRUE;
			}
			$this->load->view('template/navbar',$login);

			$this->load->view('kontribusi_artikel',$data);
		
			$footer['js_footer'] = $this->load->view('script/artikel_script','',TRUE);
			$this->load->view('template/footer',$footer);

		}
		else
		{
			$news = $this->input->post('news');
			$sub_header = $this->input->post('judul');
			$parent_id = $this->input->post('parent_id');

			$this->load->model('user_model');
			$user = $this->user_model->where('USERNAME',$this->session->userdata('user'))->get();
			$user_id = $user['USER_ID'];

			// $this->load->model('berita_model');
			$berita = $this->berita_model->where('NEWS_ID',$parent_id)->get();
			$header = $sub_header;
			$category_id = $berita['CATEGORY_ID'];
			$karya = 1;

			$insert_data = array('USER_ID'=>$user_id,'NEWS'=>$news,'PARENT_ID'=>$parent_id,'CATEGORY_ID'=>$category_id,'HEADER'=>$header,'SUB_HEADER'=>$sub_header,'IS_NEWS'=>0,'PERMISSION'=>$karya);
			$this->berita_model->insert($insert_data);

			redirect('/kolaborasi/detail_artikel/'.$parent_id);
		}
	}

	// public function create($parent_id=0)
	// {
	// 	if ( $this->session->userdata('logged_in') === TRUE )
	// 	{

	// 		$this->load->model('category_model');

	// 		$category = $this->category_model->where('PARENT_ID',2)->get_all();
	// 		$category_id = $category[0]['CATEGORY_ID'];
	// 		$sub_category = $this->category_model->where('PARENT_ID',$category_id)->get_all();

	// 		if (!$category)
	// 		{
	// 			$category = array();
	// 		}

	// 		if (!$sub_category)
	// 		{
	// 			$sub_category = array();
	// 		}

	// 		$data['category'] = $category;
	// 		$data['sub_category'] = $sub_category;
	// 		$data['header'] = '';

	// 		$this->load->model('berita_model');
	// 		if ($parent_id !== 0) {
	// 			$berita = $this->berita_model->where('NEWS_ID',$parent_id)->get();
	// 			$data['header'] = $berita['HEADER'];
	// 		} else {
	// 			$data['header'] = $this->input->post('header');
	// 		}

	// 		$this->form_validation->set_rules('news', 'Berita', 'required|trim|xss_clean');
	// 		$this->form_validation->set_rules('header', 'Judul', 'required|trim|xss_clean');
	// 		$this->form_validation->set_rules('sub_header', 'Sub Judul', 'required|trim|xss_clean');

	// 		$data['parent_id'] = $parent_id;

	// 		if ($this->form_validation->run() === FALSE)
	// 		{
	// 			$data['error'] = validation_errors();
	// 			$this->load->view('kolaborasi/create', $data);

	// 		}
	// 		else
	// 		{
	// 			$news = $this->input->post('news');
	// 			$header = $this->input->post('header');
	// 			$sub_header = $this->input->post('sub_header');
	// 			$category_id = $this->input->post('sub_category');

	// 			$parent_id = $this->input->post('parent_id');
				
	// 			$config['upload_path'] = './uploads/';
	// 			$config['allowed_types'] = 'jpg|jpeg|png|gif|JPG|JPEG|PNG|GIF';
	// 			$config['max_size']	= '2048';

	// 			$this->load->helper('gambar');
	// 			$new_name = get_name( $header, $sub_header, $parent_id );
	// 			$config['file_name'] = $new_name;

	// 			$this->load->library( 'upload', $config );

	// 			if ( ! $this->upload->do_upload( 'fileGambar' ) )
	// 			{
	// 				$data['error'] = 'Foto tidak dapat diunggah '.$this->upload->display_errors();
	// 				$this->load->view('kolaborasi/create', $data);
	// 			}
	// 			else
	// 			{

	// 				$this->load->model('user_model');
	// 				$user = $this->user_model->where('USERNAME',$this->session->userdata('user'))->get();
	// 				$user_id = $user['USER_ID'];

	// 				// $this->load->model('berita_model');
	// 				// $header = $sub_header;
					
	// 				// if ($parent_id !== 0) {
	// 				// 	$berita = $this->berita_model->where('NEWS_ID',$parent_id)->get();
	// 				// 	$header = $berita['HEADER'];
	// 				// }

	// 				$insert_data = array('USER_ID'=>$user_id,'NEWS'=>$news,'PARENT_ID'=>$parent_id,'CATEGORY_ID'=>$category_id,'HEADER'=>$header,'SUB_HEADER'=>$sub_header,'IS_NEWS'=>0,'IMAGE'=>$new_name);
	// 				$this->berita_model->insert($insert_data);

	// 				// if ($parent_id === 0) {
	// 				// 	$berita = $this->berita_model->where(array('HEADER'=>$header,'USER_ID'=>$user_id,'CATEGORY_ID'=>$category_id,'PARENT_ID'=>$parent_id))->get();
	// 				// 	$parent_id = $berita['NEWS_ID'];

	// 				// 	redirect('/berita/');
	// 				// }

	// 				redirect('/kolaborasi/index/'.$parent_id);
	// 			}				
	// 		}
	// 	}
	// 	else
	// 	{
	// 		redirect('/kolaborasi');
	// 	}
	// }

	public function command($news_id=0)
	{
		if ( $this->session->userdata('logged_in') === TRUE )
		{
			$this->load->model('berita_model');
			$parent_id = '';
			if ($news_id !== 0) {
				$berita = $this->berita_model->where('NEWS_ID',$news_id)->get();
				$data['news_id'] = $berita['NEWS_ID'];
				
				$parent_id = $berita['PARENT_ID'];
				$data['parent_id'] = $parent_id;
			}
			else
			{
				$parent_id = $news_id;
			}

			$this->form_validation->set_rules('aspirasi_masyarakat', 'Komentar', 'required|trim|xss_clean');

			$data['news_id'] = $news_id;

			if ($this->form_validation->run() === FALSE)
			{
				redirect('/kolaborasi/detail_artikel/'.$parent_id);

			}
			else
			{
				$command = $this->input->post('aspirasi_masyarakat');
				$news_id = $this->input->post('news_id');
				$parent_id = $this->input->post('parent_id');
				
				$this->load->model('user_model');
				$user = $this->user_model->where('USERNAME',$this->session->userdata('user'))->get();
				$user_id = $user['USER_ID'];

				$this->load->model('command_model');
				$insert_data = array('USER_ID'=>$user_id,'COMMAND'=>$command,'NEWS_ID'=>$news_id);
				$this->command_model->insert($insert_data);

				if ($parent_id == 0) {
					$parent_id = $news_id;
				}

				redirect('/kolaborasi/detail_artikel/'.$parent_id);
			
			}
		}
		else
		{
			redirect('/kolaborasi');
		}
	}
}
