<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_contact_us extends CI_Model{

    public function save_inquiry(){
        $data = array(
            'inquiry_name' => $this->input->post('name'),
            'inquiry_email' => $this->input->post('email'),
            'inquiry_message' => $this->input->post('subject'),
            'description' => $this->input->post('message'),
            'inquiry_phone' => 0,
            'inquiry_address' => 'INQUIRY',
            'sys_create_date' => date('Y-m-d H:i:s')
        );
        
        if ($this->db->insert('customer_inquiry',$data)) {
            return true;
        }
        
        return false;
    }
 
}