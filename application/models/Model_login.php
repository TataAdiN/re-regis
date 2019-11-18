<?php

class Model_login extends CI_Model
{
    private $tableStudent = 'student';
    function login($student_id , $password)
    {
        $this->db->select("student_id, student_no_daftar, student_password");
        $this->db->from($this->tableStudent);
        $this->db->where('is_active', 1);
        $this->db->where('student_no_daftar', $student_id);

        $result = $this->db->get()->result();
        if(count($result) == 0){
            $login['status'] = 0;
            return $login;
        }else{
            if(password_verify($password, $result[0]->student_password)){
                $login['status'] = 1;
                unset($result[0]->student_password);
                $login['data'] = $result[0];
                $this->session->set_userdata((array)$login['data'] );
                $this->session->set_userdata( ['login' => TRUE ] );
                return $login;
            }else{
                $login['status'] = 2;
                return $login;
            }
        }
    }

    function logout() {
        $this->session->sess_destroy();
    }

    function getIDAkun(){
        return $this->session->userdata()['student_id'];
    }

    function getNoDaftar(){
        return $this->session->userdata()['student_no_daftar'];
    }

    function getTipeUser(){
       return $this->session->userdata()['tipe'];
    }
    
/*     function updateStep($step){
        $this->session->set_userdata( ['step' => $step ] );
    }

    function getStep(){
        return $this->session->userdata()['step'];
    } */

    function isLogin()
    {
      if( count( $this->session->userdata() ) == 0 ) return FALSE;
      if( ! isset( $this->session->userdata['login'] ) ) return FALSE;
      if( $this->session->userdata['login']  ) return TRUE;
    }
}
