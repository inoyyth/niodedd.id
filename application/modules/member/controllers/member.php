<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Member extends MX_Controller{

    public function __construct() {
        parent::__construct();
        
        $this->load->model('main_model');
        $this->load->model('m_member');
        $this->load->library('email');
        $this->load->library('session');
        $this->load->library('My_encrypt');
    }
        
    function register() {
        $data['view'] = 'member/register';
        $this->load->view('template',$data);
    }

    function save_register() {
        if ($_POST) {
            if(!$this->m_member->duplicate_email()) {
                $response = array('code' => 409, 'message' => 'Email is registered');
            } else {
                if ($this->m_member->save_register()) {
                    $response = array('code' => 200, 'message' => 'Register is success, please check your email for activation');
                    $data = array('email' => $this->input->post('email'),'name' => $this->input->post('first_name'));
                    $this->__sendMail($data);
                } else {
                    $response = array('code' => 500, 'message' => 'Register is failed, try again later');
                }
            }
            echo json_encode($response);
        } else {
            show_404();
        }
    }

    private function __sendMail($data) {
        $data['encrypt'] = $this->my_encrypt->encode($data['email']);
        $msg = $this->load->view('member/email_activation',$data,true);
        $this->email->from('inoycms1@gmail.com', 'Law Website');
        $this->email->to($data['email']); 

        $this->email->subject('Activation Account');
        $this->email->message($msg);  

        $this->email->send();
    }

    public function login() {
        if ($_POST) {
            $dataLog = $this->m_member->login();
            if ($dataLog) {
                $sess_array = array();
                foreach($dataLog as $row) {
                    //create the session
                    $sess_arrayx = array(
                        'id_login' => $row['id'],
                        'firstname_login' => $row['firstname_custdetail'],
                        'lastname_login' => $row['lastname_custdetail'],
                        'email_login'=>$row['email_custdetail']
                    );
                 //set session with value from database
                 $this->session->set_userdata('logged_in_front',$sess_arrayx);
                 }
                $response = array('code' => 200, 'message' => 'Login is success, you will redirect in a moment');
        } else {
            $response = array('code' => 500, 'message' => 'Login is failed, username or password invalid!');
        }
        echo json_encode($response);
        } else {
            show_404();
        }
    }

    function logout() {
        $this->session->unset_userdata('logged_in_front');
        //$this->session->destroy();
        redirect('home');
    }

    function activation($key) {
        $email = $this->my_encrypt->decode($key);
        if ($this->m_member->activation($email)) {
            $data['status'] = 'success';
            $data['message'] = 'Activation success, maybe activation time is close';
        } else {
            $data['status'] = 'error';
            $data['message'] = 'Activation failed, maybe activation time is close';
        }
        $data['view'] = 'member/activation_page';
        $this->load->view('template',$data);
    }

}