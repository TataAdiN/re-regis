<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Landing extends MY_Controller {
	public function index()
	{
		$this->load->view('welcome_message');
	}
	public function auth(){
		$data['title'] = "Dashboard";
		$data['type'] = "student";
		$this->blade->render('login', $data);
	}
}
