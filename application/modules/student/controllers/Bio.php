<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bio extends MY_Controller {

    function __construct()
    {
        parent::__construct();
		$this->load->model('Model_student', 'm_student');
		$this->load->model('Model_login', 'm_login');
	}
	
	public function index()
	{
		if($this->input->post()){
            $result = $this->m_student->simpanBiodata($this->input->post(), $this->m_login->getIDAkun());
            if ($result) {
                //redirect(base_url('student/bio'));
            }
        }	
        $data['title'] = "Biodata";
        $data['num'] = 2;
        $data['type'] = "student";
        $data['biodata'] = $this->m_student->ambilBioData($this->m_login->getIDAkun())->result()[0];
		$this->blade->render('bio/student', $data);
	}
}
