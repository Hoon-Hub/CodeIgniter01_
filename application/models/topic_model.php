<?php
class Topic_model extends CI_Model{
    function __construct(){
        parent::__construct(); //=초기화
    }

    public function gets(){
        return $this->db->query('SELECT * FROM topic')->result();  //객체 형태로 result에 데이터가 담긴다.
    }
    
    public function get($topic_id){
        $this->db->select('id');
        $this->db->select('title');
        $this->db->select('description');
        $this->db->select('UNIX_TIMESTAMP(created) AS created'); //시간 변환
        return $this->db->get_where('topic', array('id'=>$topic_id))->row(); //active : 이식성이 좋음
        // = return $this->db->query('SELECT * FROM topic WHERE id='.$topic_id);
    }


    function add($title, $description){
        $this->db->set('created','NOW()', false); //false => now()가 문자가 아니라 함수로 저장

        $this->db->insert('topic',array(
            'title'=>$title,
            'description'=>$description
        ));
        return $this->db->insert_id(); //추가된 id값을 return

        //쿼리 확인문
        //echo $this->db->last_query(); 
        
    }
}

?>