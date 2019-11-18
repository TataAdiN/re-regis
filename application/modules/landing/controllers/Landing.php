<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Landing extends MY_Controller {

    function __construct()
    {
        parent::__construct();
		$this->load->model('Model_student', 'm_student');
		$this->load->model('Model_login', 'm_login');
	}

	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function auth(){
		if($this->input->post()){
			$result = $this->m_login->login($this->input->post('username'), $this->input->post('password'));
			echo var_dump($result);
            if ($result['status'] == 1) {
                redirect(base_url('student/bio'));
            }
        }	
		$this->blade->render('login');
	}

	public function logout(){
		$this->m_login->logout();
		redirect(base_url(''));
	}
}
