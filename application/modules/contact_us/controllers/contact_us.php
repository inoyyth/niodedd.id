<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact_us extends MX_Controller{
    public function __construct() {
        parent::__construct();
        
        $this->load->model('main_model');
        $this->load->model('m_contact_us');
    }
        
    function index(){
        $data['data']=$this->db->query("select * from contact")->row_array();
        $data['view']="main";
        $this->load->view('template',$data);
    }

    function save_inquiry() {
        if ($_POST) {
            if ($this->m_contact_us->save_inquiry()) {
                $response = array('code' => 200, 'message' => 'Thanks, your message has been submit');
            } else {
                $response = array('code' => 500, 'message' => 'Sorry message is failed, try again later');
            }
            echo json_encode($response);
        } else {
            show_404();
        }
    }

}