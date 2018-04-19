<?php
class M_product extends CI_Model{
    function select_all($table){
        $this->db->select('*');
        $this->db->from($table);
        return $this->db->get();
    }
    
    function select_where($table,$where,$id){
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($where,$id);
        return $this->db->get();
    }
    
    function insert($table,$data){
        $this->db->insert($table,$data);
        return true;
    }
    
    function update($table,$where,$id,$data){
        $this->db->where($where,$id);
        $this->db->update($table,$data);
    }
    
    function delete($table,$where,$id){
        $this->db->where($where,$id);
        $this->db->delete($table);
    }
    
    public function search_record_count($id_sr,$name_sr,$status_sr)
	{
		return $this->db->query("select * from categorys where id LIKE '%$id_sr%' and categorys_name LIKE '%$name_sr%' and status LIKE '%$status_sr%'")->num_rows();
		
	}
	
	public function search($id_sr,$name_sr,$status_sr,$limit)
	{
		return $this->db->query("select * from categorys where id LIKE '%$id_sr%' and categorys_name LIKE '%$name_sr%' and status LIKE '%$status_sr%' limit ".$limit.",2")->result();
		
	}
        
        public function handler0($searchterm)
	{
            if($searchterm)
            {
                    $this->session->set_userdata('page_sr', $searchterm);
                    return $searchterm;
            }
            elseif($this->session->userdata('page_sr'))
            {
                    $searchterm = $this->session->userdata('page_sr');
                    return $searchterm;
            }
            else
            {
                    $searchterm ="";
                    return $searchterm;
            }
	}
        
        public function handler1($searchterm)
	{
            if($searchterm)
            {
                    $this->session->set_userdata('id_sr', $searchterm);
                    return $searchterm;
            }
            elseif($this->session->userdata('id_sr'))
            {
                    $searchterm = $this->session->userdata('id_sr');
                    return $searchterm;
            }
            else
            {
                    $searchterm ="";
                    return $searchterm;
            }
	}
        
        public function handler2($searchterm)
	{
            if($searchterm)
            {
                    $this->session->set_userdata('name_sr', $searchterm);
                    return $searchterm;
            }
            elseif($this->session->userdata('name_sr'))
            {
                    $searchterm = $this->session->userdata('name_sr');
                    return $searchterm;
            }
            else
            {
                    $searchterm ="";
                    return $searchterm;
            }
	}
        
        public function handler3($searchterm)
	{
            if($searchterm)
            {
                    $this->session->set_userdata('abbrevation_sr', $searchterm);
                    return $searchterm;
            }
            elseif($this->session->userdata('abbrevation_sr'))
            {
                    $searchterm = $this->session->userdata('abbrevation_sr');
                    return $searchterm;
            }
            else
            {
                    $searchterm ="";
                    return $searchterm;
            }
	}
        
        public function handler4($searchterm)
	{
            if($searchterm)
            {
                    $this->session->set_userdata('child_sr', $searchterm);
                    return $searchterm;
            }
            elseif($this->session->userdata('child_sr'))
            {
                    $searchterm = $this->session->userdata('child_sr');
                    return $searchterm;
            }
            else
            {
                    $searchterm ="";
                    return $searchterm;
            }
	}
        
        public function handler5($searchterm)
	{
            if($searchterm)
            {
                    $this->session->set_userdata('product_sr', $searchterm);
                    return $searchterm;
            }
            elseif($this->session->userdata('product_sr'))
            {
                    $searchterm = $this->session->userdata('product_sr');
                    return $searchterm;
            }
            else
            {
                    $searchterm ="";
                    return $searchterm;
            }
	}
}

