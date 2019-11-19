<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends MY_Controller {

	function __construct()
    {
        parent::__construct();
		$this->load->model('Model_student', 'm_student');
	}

	public function index()
	{
		if($this->input->post()){
            $akun['student_no_daftar'] = $this->input->post('no_daftar');
            $akun['student_password'] = password_hash($this->input->post('password'), PASSWORD_DEFAULT);;
         	$result = $this->m_student->createUser($akun);
            if ($result) {
                redirect(base_url('admin/student'));
            }  
        }	
		$data['title'] = "Master Pengguna";
		$data['num'] = 3;
		$data['type'] = "admin";
		$data['student'] = $this->m_student->ambilStudent()->result();
		$this->blade->render('student/admin', $data);
	}
}