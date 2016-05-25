<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	
	function get_name( $news, $sub_header, $parent_id )
	{
		return $news.'-'.$sub_header.'-'.$parent_id;
	}