<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Unduh extends MY_Controller {

    public function __construct(){
        parent::__construct();
		$this->initFtp2();
	}
	
	public function index()
	{
        $data['title'] = "Unduh Surat Pernyataan";
        $data['num'] = 4;
		$data['type'] = "student";
		$data['img'] = base_url().'img/gambar.jpg';
/* 		$this->ftp->mkdir('data3');
		var_dump($this->ftp->list_files());
		$listFolder = $this->ftp->list_files();
		foreach($listFolder as $folder){
			if($folder == "data"){
				echo "Folder Sudah ada";
			}else{
				
			}
		} */
		/* $this->ftp->upload(getcwd().'/img/gambar.jpg', '/data/gambar.jpg'); */

		$this->ftp->download('/data/gambar.jpg' ,getcwd().'/img/gambar2.jpg','auto');

		// ganti '/image/pc-android-1jutaan.jpg' dibawah
/* 		// sesuai yang di storage FreeNAS
		$this->ftp->download('/image/pc-android-1jutaan.jpg' ,getcwd().'/img/gambar.jpg','auto');
		$this->blade->render('unduh/student', $data);
		$this->ftp->close(); */
		//unlink(getcwd().'/img/gambar.jpg');
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
	public function initFtp2()
    {
        $this->load->library('ftp');
        $config['hostname'] = '192.168.43.191'; //ganti ini
        $config['username'] = 'mahendra'; //ganti ini
        $config['password'] = '123456'; //ganti ini
        $config['debug']    = TRUE;
        $this->ftp->connect($config);
    }
}
