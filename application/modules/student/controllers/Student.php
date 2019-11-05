<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends MY_Controller {

	public function index()
	{
		$data['title'] = "Dashboard";
		$data['type'] = "student";
		$this->blade->render('student', $data);
	}
}
