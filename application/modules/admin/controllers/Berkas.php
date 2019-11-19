<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berkas extends MY_Controller {

	function __construct()
    {
        parent::__construct();
		$this->load->model('Model_berkas', 'm_berkas');
	}

	public function index()
	{
		if($this->input->post()){
        	$result = $this->m_berkas->tambahBerkas($this->input->post());
            if ($result) {
                redirect(base_url('admin/berkas'));
            } 
        }	
		$data['title'] = "Master Berkas";
		$data['num'] = 2;
		$data['type'] = "admin";
		$data['berkas'] = $this->m_berkas->ambilBerkas()->result();
		$this->blade->render('berkas/admin', $data);
	}
}
