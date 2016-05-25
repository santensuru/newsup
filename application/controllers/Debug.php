<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Debug extends CI_Controller {

	/**
	 * Debug
	 * 
	 * Untuk mengeksekusi semua hal yang berkaitan dengan debug sistem
	 * Insert, Read
	 */
	public function index()
	{
		redirect('/');
	}

	public function get_session()
	{
		if ( $this->session->userdata('logged_in') === TRUE ) {
			$return["_data"] = json_encode(TRUE);
			echo json_encode($return);
		}
		else {
			$return["_data"] = json_encode(FALSE);
			echo json_encode($return);
		}
	}
}
