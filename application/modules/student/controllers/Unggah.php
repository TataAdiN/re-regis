<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Unggah extends MY_Controller {

	public function index()
	{
		if($this->input->post()){
			$ekstensi_diperbolehkan	= array('png','jpg');
			$nama = $_FILES['file']['name'];
			$x = explode('.', $nama);
			$ekstensi = strtolower(end($x));
			$ukuran	= $_FILES['file']['size'];
			$file_tmp = $_FILES['file']['tmp_name'];	
			if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
				if($ukuran < 1044070){		
					$link = getcwd();
					if (!file_exists($link.'/image/berkas/'.$id)) {
						mkdir($link.'/image/berkas/'.$id , 0777, true);
					}
					move_uploaded_file($file_tmp, 'image/berkas/'.$id.'/'.$form['id_master_berkas'].'.'.$ekstensi);
				}else{
					echo 'UKURAN FILE TERLALU BESAR';
				}
			}
		}
        $data['title'] = "Unggah Berkas";
        $data['num'] = 3;
		$data['type'] = "student";
		$this->blade->render('unggah/student', $data);
	}
}
