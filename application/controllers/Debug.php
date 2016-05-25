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
			echo true;
		}
		else {
			echo false;
		}
	}
}
