<?php
class MY_Controller extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->database();

        //config -> autoload.php 의 array('session')항목을 대체함. 
            //전역적으로 사용하던  session 라이브러리를 취소. 필요한 부분에서만 사용.
        if(!$this->input->is_cli_request())
            $this->load->library('session');
    }
    function _head(){
        // var_dump($this->session->userdata('session_test'));
        // $this->session->set_userdata('session_test','egoing');
        //var_dump($this->session->all_userdata());
 
         $this->load->config('opentutorials');   //opentutorials.php 파일 로드
         $this->load->view('head');
        
     }
     function _sidebar(){
         $topics = $this->topic_model->gets(); // gets라는 메소드를 가져온다.
         $this->load->view('topic_list', array('topics'=>$topics));
     }
    // topic.php & auth.php의 공통적인 부분을 상속시켜주는 역할을 한다.
    function _footer(){
        $this->load->view('footer');
    }

}
?>