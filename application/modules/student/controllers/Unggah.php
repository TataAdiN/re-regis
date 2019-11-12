<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Unggah extends MY_Controller {

	public function index()
	{
        $data['title'] = "Unggah Berkas";
        $data['num'] = 3;
		$data['type'] = "student";
		$this->blade->render('unggah/student', $data);
	}
}
