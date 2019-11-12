<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bio extends MY_Controller {

	public function index()
	{
        $data['title'] = "Biodata";
        $data['num'] = 2;
		$data['type'] = "student";
		$this->blade->render('bio/student', $data);
	}
}
