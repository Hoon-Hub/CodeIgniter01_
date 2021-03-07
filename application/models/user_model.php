<?php
class User_model extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    function gets(){
        return $this->db->query("SELECT * FROM user")->result();
    }
    //저장 기능
    function add($option){

        $this->db->set('email',$option['email']);
        $this->db->set('password',$option['password']);
        $this->db->set('created','NOW()',false);
        $this->db->insert('user');
        $result = $this->db->insert_id();
        return $result;
    }

    //이메일로 회원정보 가져오기 $option  = array : 인자
    function getByEmail($option){
        $result = $this->db->get_where('user',array('email'=>$option['email']))->row();
        return $result;
    }
}


?>
