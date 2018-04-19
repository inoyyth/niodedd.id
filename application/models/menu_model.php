<?php
class Menu_model extends CI_Model {

	public function all()
	{
		return $this->db->get_where("menu",array('menu_status'=>'Y'))->result_array();
	}

}