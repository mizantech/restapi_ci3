<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Testrun extends MX_Controller {

	public function index()
	{
		echo 'percobaan pake modules::run()<br>';
		$var1 = modules::run('percobaan/welkam/test_run', $param = 'ucing...');
		echo $var1;
	}


	public function ambilNilai($var1 = NULL, $var2 = NULL)
	{
		$pesan1 = 'Respon 1: fungsi ambilNilai() via modules::run() ';
		$pesan2 = NULL;
		if (!is_null($var1)) {
			$pesan2 = $var1;
		}
		if (!is_null($var2)) {
			$pesan2 .= ' dan ' . $var2;
		}
		return $pesan1 . $pesan2;
	}

	
}

/* Testrun.php */