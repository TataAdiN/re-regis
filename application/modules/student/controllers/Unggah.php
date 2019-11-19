<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Unggah extends MY_Controller {
	function __construct()
    {
        parent::__construct();
		$this->load->model('Model_berkas', 'm_berkas');
		$this->load->model('Model_login', 'm_login');
		$this->initFtp();
	}

	public function checkfile(){
		$listFolder = $this->ftp->list_files('image');
		var_dump($listFolder);
 		foreach($listFolder as $folder){
			if($folder == "6570bd0a-0a0a-11ea-a357-d8cb8a1ebdc6"){
				echo "Folder Sudah ada";
			}else{
				
			}
		}
	}
	
	public function index()
	{
		if($this->input->post()){
			$student_id = $this->m_login->getIDAkun();
 			$ekstensi_diperbolehkan	= array('jpg');
			$nama = $_FILES['file']['name'];
			$x = explode('.', $nama);
			$ekstensi = strtolower(end($x));
			$ukuran	= $_FILES['file']['size'];
			$file_tmp = $_FILES['file']['tmp_name'];
			$url = $this->m_login->getIDAkun().'/'.$this->input->post('berkas_id').'.'.$ekstensi;
			if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
				if($ukuran < 1044070){		
					$link = getcwd();
					if (!file_exists($link.'/image/'.$student_id)) {
						mkdir($link.'/image/'.$student_id , 0777, true);
					}
					move_uploaded_file($file_tmp, 'image/'.$student_id.'/'.$this->input->post('berkas_id').'.'.$ekstensi);
				}else{
					echo 'UKURAN FILE TERLALU BESAR';
				}
			}
			if($this->input->post('aksi') == 1){
				$berkas['student_id'] = $this->m_login->getIDAkun();
				$berkas['berkas_id'] = $this->input->post('berkas_id');
				$berkas['url_berkas'] = $url;
				$result = $this->m_berkas->uploadStudent($berkas);
				if ($result) {
					$listFolder = $this->ftp->list_files('image');
					var_dump($listFolder);
					$ketemu = 0;
					 foreach($listFolder as $folder){
						if($folder == $berkas['student_id']){
							$ketemu = 1;
						}
					}
					if($ketemu == 0){
						$this->ftp->mkdir('image/'.$berkas['student_id']);
					}
					$mirror = $this->ftp->upload(getcwd().'/image/'.$url, '/image/'.$url);
					if($mirror){
						redirect(base_url('student/unggah'));
					}
				}
			}else{
				$berkas['url_berkas'] = $url;
				$result = $this->m_berkas->updateStudent($berkas, $this->input->post('student_berkas_id'));
				if ($result) {
					$mirror = $this->ftp->upload(getcwd().'/image/'.$url, '/image/'.$url);
					if($mirror){
						redirect(base_url('student/unggah'));
					}
				}
			}
		}
        $data['title'] = "Unggah Berkas";
        $data['num'] = 3;
		$data['type'] = "student";
		$data['berkas'] = $this->m_berkas->ambilBerkas()->result();
		$data['berkasStudent'] = $this->m_berkas->ambilBerkasTerupload($this->m_login->getIDAkun())->result();
		$this->blade->render('unggah/student', $data);
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
