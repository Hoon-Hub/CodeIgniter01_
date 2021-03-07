<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends MY_Controller{
    function __construct(){
        parent::__construct();
    }
    function login(){
        var_dump($this->session->all_userdata());
        $this->load->config('opentutorials');
        $this->_head();

        $this->load->view('login');
        $this->_footer();

    }
    function logout(){
        $this->session->sess_destroy();
        $this->load->helper('url');
        redirect('/auth/login');
    }

    //회원가입
    function register(){
        $this->_head();

        $this->load->library('form_validation');    //유효성 라이브러리 입력
        $this->form_validation->set_rules('email','이메일주소','required|valid_email|is_unique[user.email'); //유효성 조건 설정
        $this->form_validation->set_rules('nickname', '닉네임', 'required|min_length[5]|max_length[20]');
        $this->form_validation->set_rules('password', '비밀번호', 'required|min_length[6]|max_length[30]|matches[re_password]');
        $this->form_validation->set_rules('re_password', '비밀번호 확인', 'required');

        if($this->form_validation->run() === false){    //실패시
            $this->load->view('register');
        }else{ //성공시 + 암호화
            $this->load->model('user_model');
            $this->user_model->add(array(
                'email'=>$this->input->post('email'),
                'password'=>$this->input->post('password'),
                'nickname'=>$this->input->post('nickname')
            ));
        }

        $this->_footer();
    }

    function authentication(){
        $this->load->model('user_model');
        $user = $this->user_model->getByEmail(array('email'=>$this->input->post('email')));
        if(
            $this->input->post('email') == $user->email &&
            password_verify($this->input->post('password'), $user->password)    //비밀번호 복호화
        ){
            //로그인 성공
            $this->session->set_userdata('is_login',true);
            $this->load->helper('url');
            redirect("/");
        }else if(
            $this->input->post('id') !== $authentication['id']

        ){
            echo "아이디 불일치";
            $this->session->set_flashdata('message','로그인에 실패하였습니다.');
            $this->load->helper('url');
            redirect("/auth/login");

        }else if(
            $this->input->post('password') !== $authentication['password']
        ){
            echo "비밀번호 불일치";
        }else{
            echo "사용자 정보가 존재하지 않습니다.";
        }

    }

}


?>