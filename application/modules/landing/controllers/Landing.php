<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Landing extends MY_Controller {

    function __construct()
    {
        parent::__construct();
		$this->load->model('Model_student', 'm_student');
		$this->load->model('Model_berkas', 'm_berkas');
		$this->load->model('Model_login', 'm_login');
	}

	public function index()
	{
		$data['berkas'] = $this->m_berkas->ambilBerkas()->result();
		$this->blade->render('welcome', $data);
	}

	public function auth(){
		if($this->input->post()){
			$result = $this->m_login->login($this->input->post('username'), $this->input->post('password'));
            if ($result['status'] == 1) {
                redirect(base_url('student'));
            }
        }	
		$this->blade->render('login');
	}

	public function logout(){
		$this->m_login->logout();
		redirect(base_url(''));
	}
}
