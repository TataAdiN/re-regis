<?php
class Model_student extends CI_Model
{
    private $tableStudent = "student";

    function simpanBiodata($data, $id_student)
    {
        $this->db->where('student_id', $id_student);
        $result = $this->db->update($this->tableStudent, $data);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    function ambilBioData($id_student){
        $this->db->select("student_no_daftar, student_nama, student_tmpt_lhr, student_tgl_lhr, student_alamat, agama, jenis_kelamin, asal_sekolah");
        $this->db->from($this->tableStudent);
        $this->db->where("student_id", $id_student);
        return $this->db->get(); 
    }

    function createUser($data){
        $result = $this->db->insert($this->tableStudent, $data);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    function ambilStudent(){
        $this->db->select("student_no_daftar, student_nama");
        $this->db->from($this->tableStudent);
        return $this->db->get(); 
    }
    function ambilStudentFull(){
        $this->db->select("student_id, student_no_daftar, student_nama, student_tmpt_lhr, student_tgl_lhr, agama, jenis_kelamin");
        $this->db->from($this->tableStudent);
        return $this->db->get(); 
    }
}