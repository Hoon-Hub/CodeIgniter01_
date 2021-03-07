<?php
class Batch extends CI_Controller{
   function __construct()
   {
       parent::__construct();
   }
   funnction process(){
       $this->load->model('user_model');
       $users = $this->user_model->gets();
       $this->load->library('email');
       $this->email->initialize(array('mailtype'=>'html'));
       foreach($users as $user){
            $this->email->from('gwi01304@naver.com','sanghoon');
            $this->email->to($user->email);
            $this->email->subject('testing');
            $this->email->message('test');
            $this->email->send();
            echo "{$user->email}로 전송을 성공하였습니다.\n";
       }
    }


}

?>