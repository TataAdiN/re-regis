<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends MY_Controller {

    function __construct()
    {
        parent::__construct();
		$this->load->model('Model_berkas', 'm_berkas');
	}

	public function index()
	{
		$data['title'] = "Pengumuman";
		$data['num'] = 1;
		$data['type'] = "student";
		$data['berkas'] = $this->m_berkas->ambilBerkas()->result();
		$this->blade->render('student', $data);
	}
}
