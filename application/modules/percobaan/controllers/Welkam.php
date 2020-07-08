<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Welkam extends MX_Controller {

	public function index()
	{
		$this->load->view('welkam_page');
	}

	public function test_run($param = NULL)
	{
		if(is_null($param)) {
			$param = 'NULL';
		}
		echo 'test_run($param) = '. $param;
	}
}

/* Welkam.php */