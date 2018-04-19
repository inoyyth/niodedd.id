<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_member extends CI_Model{

    public function save_register() {

        $data = array(
            'firstname_custdetail' => $this->input->post('first_name'),
            'lastname_custdetail' => $this->input->post('last_name'),
            'email_custdetail' => $this->input->post('email'),
            'mobile_custdetail' => $this->input->post('phone'),
            'password_custdetail' => md5($this->input->post('password')),
            'sys_create_date' => date('Y-m-d H:i:s')
        );

        if ($this->db->insert('cust_detail', $data)) {
            return true;
        }

        return false;

    }

    public function duplicate_email() {
        $where = array(
            'email_custdetail' => $this->input->post('email')
        );
        $this->db->where($where);
        $this->db->from('cust_detail');
        $count = $this->db->count_all_results();
        if ($count > 0) {
            return false;
        }
        return true;
    }

    public function login() {
        $where = array(
            'email_custdetail' => $this->input->post('username'),
            'password_custdetail' => md5($this->input->post('password')),
            'activation_custdetail' => 1,
            'status' => 'Y'
        );
        $this->db->select('*');
        $this->db->from('cust_detail');
        $this->db->where($where);
        $sql = $this->db->get()->result_array();

        if (count($sql) >= 1) {
            return $sql;
        }
        return false;
    }

    public function activation($email) {
        $where = array(
            'email_custdetail' => $email,
            'activation_custdetail' => 0,
            'status' => 'Y'
        );
        $this->db->where($where);
        $this->db->from('cust_detail');
        $count = $this->db->count_all_results();
        if ($count > 0) {
            $this->db->update('cust_detail',array('activation_custdetail' => 1),array('email_custdetail' => $email));
            return true;
        }
        return false;
    }

}