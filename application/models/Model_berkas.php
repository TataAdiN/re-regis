<?php
class Model_berkas extends CI_Model
{
    private $tabelBerkas = "berkas";
    private $tabelBerkasStudent = "student_berkas";
    function tambahBerkas($data)
    {
        $result = $this->db->insert($this->tabelBerkas, $data);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    function ambilBerkas(){
        $this->db->select("berkas_id, nama_berkas");
        $this->db->from($this->tabelBerkas);
        $this->db->order_by('created_at', 'ASC');
        return $this->db->get(); 
    }

    function uploadStudent($data){
        $result = $this->db->insert($this->tabelBerkasStudent, $data);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    function updateStudent($url, $student_id_berkas){
        $this->db->where('student_berkas_id', $student_id_berkas);
        $result = $this->db->update($this->tabelBerkasStudent, $url);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    function ambilBerkasTerupload($id_student){
        $this->db->select("student_berkas_id, berkas_id, nama_berkas, url_berkas");
        $this->db->from($this->tabelBerkasStudent);
        $this->db->join($this->tabelBerkas, 'berkas_id', 'left');
        $this->db->where('student_id', $id_student);
        $this->db->order_by('created_at', 'ASC');
        return $this->db->get(); 
    }
}