<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Monitor extends MY_Controller {

	function __construct()
    {
        parent::__construct();
		$this->load->model('Model_student', 'm_student');
		$this->load->model('Model_berkas', 'm_berkas');
    }

	public function index()
	{
		$data['title'] = "Monitor Mahasiswa";
		$data['num'] = 4;
		$data['type'] = "admin";
		$data['student'] = $this->m_student->ambilStudentFull()->result();
		$this->blade->render('monitor/admin', $data);
    }
    
    public function berkas($id_student)
	{
		$data['title'] = "Berkas ".$this->m_student->ambilBioData($id_student)->result()[0]->student_nama;
		$data['num'] = 4;
		$data['type'] = "admin";
		$data['student'] = $this->m_student->ambilStudentFull()->result();
		$data['berkas'] =$this->m_berkas->ambilBerkasTerupload($id_student)->result();
		$this->blade->render('monitor/berkas', $data);
	}

	public function unduh($id_student, $id_berkas){
		$this->initFtp();
		$url_berkas = "/".$id_student."/".$id_berkas;
		header('Content-Type: application/vnd.jpg');
		header('Content-Disposition: attachment;filename='.$id_berkas.''); 
		header('Cache-Control: max-age=0');
	   $this->ftp->download('/image'.$url_berkas, 'php://output','auto');
	}

	public function initFtp()
    {
        $this->load->library('ftp');
        $config['hostname'] = 'files.000webhost.com'; //ganti ini
        $config['username'] = 'cobaftp'; //ganti ini
        $config['password'] = '123123123'; //ganti ini
        $config['debug']    = TRUE;
        $this->ftp->connect($config);
	}
}