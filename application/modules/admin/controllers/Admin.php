<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Controller {

	public function index()
	{
		$data['title'] = "Dashboard";
		$data['num'] = 1;
		$data['type'] = "admin";
		$this->blade->render('admin', $data);
	}
}
