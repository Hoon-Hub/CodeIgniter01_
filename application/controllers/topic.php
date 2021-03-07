<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Topic extends MY_Controller {
    function __construct(){//=초기화
        parent::__construct(); 

        $this->load->database();
        $this->load->model('topic_model'); //model load.
        log_message('debug','topic초기화');

    }
    

    function index(){
        $this->_head();
        $this->_sidebar();
        $this->load->view('main');//array('topics'=>$data)
        $this->_footer();
    }
    function get($id){
        //log_message('debug','get호출');
        $this->_head();
        $this->_sidebar();
        $topic = $this->topic_model->get($id);
        //존재하지 않는 topic 값이 들어올때
        if(empty($topic)){
            log_message('error','topic의 값이 없습니다.');
            //show_error('topic의 값이 없습니다.'); //사용자에게 좀 더 정제된 기능을 제공.
        }
        
        $this->load->helper(array('url','HTML','korean'));
                                    // log_message('debug','get view loading');
        $this->load->view('get', array('topic'=>$topic));
                                    // log_message('info',var_export($topic,1)); 로그를 출력하는건데 작동을 안함. 
        $this->_footer();
    }
    function add(){ //보안 기능도 같이 구현.
        //로그인 기능 구현
        //로그인 필요

        //로그인 X -> 로그인 페이지로 redirection
        if(!$this->session->userdata('is_login')){
            $this->load->helper('url');
            redirect('/auth/login');
        }
        $this->_head();
        $this->_sidebar();
        //유효성 검사                    
        $this->load->library('form_validation');

        $this->form_validation->set_rules('title','제목','required');
        $this->form_validation->set_rules('description','본문','required');

        if($this->form_validation->run() == FALSE){
            $this->load->view('add');
        }else{
            //앞에서이미 로드함            $this->load->model('topic_model');
            $topic_id = $this->topic_model->add($this->input->post('title'), $this->input->post('description'));
            $this->load->model('user_model');
            $users = $this->user_model->gets();

            $this->load->library('email');
            $this->email->initialize(array('mailtype'=>'html'));

            foreach($users as $user){
                $this->email->from('gwi01304@naver.com','sanghoon');
                $this->email->to($user->email);
                $this->email->subject('새로운 글이 등록 되었습니다.');
                $this->email->message('<a href="'.site_url('/topic/get/'.$topic_id).'">'.$this->input->post('title').'</a>');
                $this->email->send();

                //이메일 기능 구현
            }

            $this->load->helper('url');         //헬퍼를 이용하여 url redirection이 가능하다.
            redirect('/topic/get/'.$topic_id);  //작성 완료한 페이지로 이동
        }

        $this->_footer();
    }

    //파일 업로드  메서드
    function upload_receive(){
        $config['upload_path'] = 'uploadfiles/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '100';
        $config['max_width'] = '1024';
        $config['max_height'] = '768';
        $this->load->library('upload',$config);
        if(! $this->upload->do_upload("user_upload_file")){   //do_upload method
                                            //  $error = array('error' => $this->upload->display_errors());  :view 에러 페이지를 출력
            echo $this->upload->display_errors();
        }else{
            $data = array('upload_data' => $this->upload->data());
            echo "성공";
            $this->load->helper('url');  
            redirect('topic/');
            var_dump($data);
        }
    }
    function upload_form(){
        $this->_head();
        $this->_sidebar();
        $this->load->view('upload_form');
        $this->_footer();
    }
}

