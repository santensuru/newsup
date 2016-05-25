<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	
	function get_name( $header, $sub_header, $parent_id )
	{
		return sha1( $header.'-'.$sub_header.'-'.$parent_id.'-'.date("Y-m-d h:i:sa") );
	}