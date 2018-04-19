<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MX_Controller{
    public function __construct() {
        parent::__construct();
        
        $this->load->model('main_model');
        $this->load->model('m_home');
    }
        
    function index(){
		$data['section1'] = $this->m_home->getData('article',array('status'=>'Y','id_category'=>9,'id_subcategory'=>33),'sys_create_date','asc',3)->result_array();
		$data['section2'] = $this->m_home->getData('article',array('status'=>'Y','id_category'=>9,'id_subcategory'=>39),'sys_create_date','asc',3)->result_array();
        $data['slider']=$this->m_home->getData('slider',array('status'=>'Y'),'sys_create_date','desc',10)->result_array();
		$data['index_article']=$this->m_home->getData('article',array('index_article'=>'1'),'sys_create_date','desc',1)->row_array();
		$data['contact'] = $this->db->get('contact')->row_array();
		$data['view']="main"; 
        $this->load->view('template',$data);
    }
	
	public function save_inquiry() {
		$data = array(
			'inquiry_name'=>$this->input->post('name'),
			'inquiry_email'=>$this->input->post('email'),
			'inquiry_phone'=>$this->input->post('handphone'),
			'inquiry_address'=>$this->input->post('address'),
			'inquiry_message'=>$this->input->post('message')
		);
		
		if($this->db->insert('customer_inquiry',$data)){
			echo json_encode(array('code'=>200,'message'=>'success'));
		} else {
			echo json_encode(array('code'=>201,'message'=>'failed'));
		}
	}

	function save_free_consultation() {
		$data = array(
			'inquiry_name' => $this->input->post('name'),
			'inquiry_email' => $this->input->post('email'),
			'inquiry_phone' => $this->input->post('phone'),
			'inquiry_message' => 'CONSULTATION ' . strtoupper($this->input->post('law')),
			'description' => $this->input->post('message'),
			'inquiry_address' => 'CONSULTATION',
			'sys_create_date' => date('Y-m-d H:i:s')
		);

		if($this->db->insert('customer_inquiry',$data)){
			$this->session->set_flashdata('success', 'Thanks for submit !');
		} else {
			$this->session->set_flashdata('error', 'Submit is failed !');
		}
		redirect("home");
	}

	function save_email_subscribe() {
		$data = array(
			'email' => $this->input->post('email'),
			'subscribe_date' => date('Y-m-d H:i:s')
		);

		if($this->db->insert('subscribe_email',$data)){
			$this->session->set_flashdata('success_subscribe', 'Thanks for subscribe !');
		} else {
			$this->session->set_flashdata('error_subscribe', 'Subscribe request is failed !');
		}
		redirect("home");
	}
}