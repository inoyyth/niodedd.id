<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Customers_report extends MX_Controller{
    public function __construct() {
        parent::__construct();
        if($this->session->userdata('logged_in_admin')==false){
            redirect('login');    
        }
        $this->load->model('m_customers_report');
        $this->load->model('main_model');
    }
        
    function index(){
        $this->session->unset_userdata('page_sr');
        $this->session->unset_userdata('id_sr');
        $this->session->unset_userdata('firstname_sr');
        $this->session->unset_userdata('lastname_sr');
        $this->session->unset_userdata('email_sr');
        $this->session->unset_userdata('mobile_sr');
        $config['base_url'] = base_url().'customers_report/index/';
        $config['total_rows'] = $this->db->query("SELECT id,firstname_custdetail,lastname_custdetail,email_custdetail,mobile_custdetail
                                                 FROM cust_detail ORDER BY sys_create_date DESC")->num_rows();
        $config['per_page'] = 10;
        $config['num_links'] = 2;
        $config['uri_segment'] = 3;
        $config['first_page'] = 'Awal';
        $config['last_page'] = 'Akhir';
        $config['next_page'] = '&laquo;';
        $config['prev_page'] = '&raquo;';
        $pg = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0 ;
        //inisialisasi config
        $this->pagination->initialize($config);
        //buat pagination
        $data['halaman'] = $this->pagination->create_links();
        //tamplikan data
        $data['total_data']=$this->db->query("SELECT id,firstname_custdetail,lastname_custdetail,email_custdetail,mobile_custdetail
                                              FROM cust_detail ORDER BY sys_create_date DESC")->num_rows();
        $data['data'] = $this->db->query("SELECT id,firstname_custdetail,lastname_custdetail,email_custdetail,mobile_custdetail
                                          FROM cust_detail ORDER BY sys_create_date DESC LIMIT ".$pg.",".$config['per_page']."")->result();
        $data['view']='main';
        $this->load->view('template',$data);
    }
    
    function search(){
        if($_POST){
            $page_sr = ($this->input->get_post('page_sr')==""?$this->session->unset_userdata('page_sr'):$this->main_model->handler0('page_sr',$this->input->get_post('page_sr', TRUE)));
            $id_sr = ($this->input->get_post('id_sr')==""?$this->session->unset_userdata('id_sr'):$this->main_model->handler0('id_sr',$this->input->get_post('id_sr', TRUE)));
            $firstname_sr = ($this->input->get_post('firstname_sr')==""?$this->session->unset_userdata('firstname_sr'):$this->main_model->handler0('firstname_sr',$this->input->get_post('firstname_sr', TRUE)));
            $lastname_sr = ($this->input->get_post('lastname_sr')==""?$this->session->unset_userdata('lastname_sr'):$this->main_model->handler0('lastname_sr',$this->input->get_post('lastname_sr', TRUE)));
            $email_sr = ($this->input->get_post('email_sr')==""?$this->session->unset_userdata('email_sr'):$this->main_model->handler0('email_sr',$this->input->get_post('email_sr', TRUE)));
            $mobile_sr = ($this->input->get_post('mobile_sr')==""?$this->session->unset_userdata('mobile_sr'):$this->main_model->handler0('mobile_sr',$this->input->get_post('mobile_sr', TRUE)));
        }else{
            $page_sr = $this->main_model->handler0('page_sr',$this->input->get_post('page_sr', TRUE));
            $id_sr = $this->main_model->handler0('id_sr',$this->input->get_post('id_sr', TRUE));
            $firstname_sr = $this->main_model->handler0('id_sr',$this->input->get_post('firstname_sr', TRUE));
            $lastname_sr = $this->main_model->handler0('name_sr',$this->input->get_post('lastname_sr', TRUE));
            $email_sr = $this->main_model->handler0('status_sr',$this->input->get_post('email_sr', TRUE));
            $mobile_sr = $this->main_model->handler0('category_sr',$this->input->get_post('mobile_sr', TRUE));
        }

        $limit = ($this->uri->segment(3) > 0)?$this->uri->segment(3):0;

        $config['base_url'] = base_url() .'customers_report/search';
        $config['total_rows'] = $this->db->query("SELECT id,firstname_custdetail,lastname_custdetail,email_custdetail,mobile_custdetail
                                                  FROM cust_detail 
                                                  WHERE id LIKE '%$id_sr%' AND firstname_custdetail LIKE '%$firstname_sr%' AND lastname_custdetail LIKE '%$lastname_sr%' 
                                                  AND email_custdetail LIKE '%$email_sr%' AND mobile_custdetail LIKE '%$mobile_sr%'
                                                  ORDER BY sys_create_date DESC")->num_rows();
        $config['per_page'] = ($page_sr > 0)?$page_sr:10;
        $config['uri_segment'] = 3;
        $choice = $config['total_rows']/$config['per_page'];
        $config['num_links'] = 2;		
        $this->pagination->initialize($config);

        $data['data'] = $this->db->query("SELECT id,firstname_custdetail,lastname_custdetail,email_custdetail,mobile_custdetail
                                          FROM cust_detail 
                                          WHERE id LIKE '%$id_sr%' AND firstname_custdetail LIKE '%$firstname_sr%' AND lastname_custdetail LIKE '%$lastname_sr%' 
                                          AND email_custdetail LIKE '%$email_sr%' AND mobile_custdetail LIKE '%$mobile_sr%'
                                          ORDER BY sys_create_date DESC LIMIT ".$limit.",".$config['per_page']."")->result();
        $data['halaman'] = $this->pagination->create_links();
        $data['total_data']= $this->db->query("SELECT id,firstname_custdetail,lastname_custdetail,email_custdetail,mobile_custdetail
                                               FROM cust_detail 
                                               WHERE id LIKE '%$id_sr%' AND firstname_custdetail LIKE '%$firstname_sr%' AND lastname_custdetail LIKE '%$lastname_sr%' 
                                               AND email_custdetail LIKE '%$email_sr%' AND mobile_custdetail LIKE '%$mobile_sr%'
                                               ORDER BY sys_create_date DESC")->num_rows();
        $data['page_sr'] = $page_sr;
        $data['id_sr'] = $id_sr;
        $data['firstname_sr'] = $firstname_sr;
        $data['lastname_sr'] = $lastname_sr;
        $data['email_sr'] = $email_sr;
        $data['mobile_sr'] = $mobile_sr;
        $data['view']='search';
        $this->load->view('template',$data);
    }
        
    function update($id,$cust){
        $data['detail']=$this->db->query("select a.*,a.id as idx,b.product_name,c.product_category_name,d.brand_name,e.product_image1,f.*
                                        from transaksi_oke a
                                        INNER JOIN product_general b on a.id_product=b.id
                                        INNER JOIN product_category c on b.product_category=c.id
                                        INNER JOIN brand d on b.product_brand=d.id
                                        INNER JOIN product_images e on e.product_general_id=b.id
                                        INNER JOIN product_detail f on f.product_general_id=b.id
                                        where a.number_order='$id'")->result();
        $data['jum_brg']=$this->db->query("select sum(qty) as jum from transaksi_oke where number_order='$id'")->row();
        $data['jum_hrg']=$this->db->query("select sum(if(b.special_price != 0, b.special_price, b.normal_price) * a.qty) as jum from transaksi_oke a left join product_detail b on a.id_product=b.product_general_id where a.number_order='$id'")->row();
        $data['cust']=$this->db->query("select * from cust_detail where id='$cust'")->row();
        $data['view']="edit";
        $this->load->view("template",$data);
    }
    
    function update_proses(){
        $number_order = $this->input->post('order_number');
        $status = $this->input->post('status');
        $data=array('status_order'=>$status);
        $this->db->query("update transaksi_oke set status_order='$status' where number_order='$number_order'");
        redirect('order/index');
    }
    
    function invoice($id){
        $data['invoice']=$this->db->query("select a.*,b.normal_price,special_price,sum(a.qty) as jumx, sum(if(b.special_price != 0, b.special_price, b.normal_price) * a.qty)  as jum from transaksi_oke a left join product_detail b on a.id_product=b.product_general_id where a.id_cust='$id' group by number_invoice")->result();
        $data['cust']=$this->db->query("select * from cust_detail where id='$id'")->row();
        $data['view']='detail_invoice';
        $this->load->view("template",$data);
    }
    
    function detail_order($id){
        $data['detail']=$this->db->query("select a.*,a.id as idx,b.product_name,c.product_category_name,d.brand_name,e.product_image1,f.*
                                        from transaksi_oke a
                                        INNER JOIN product_general b on a.id_product=b.id
                                        INNER JOIN product_category c on b.product_category=c.id
                                        INNER JOIN brand d on b.product_brand=d.id
                                        INNER JOIN product_images e on e.product_general_id=b.id
                                        INNER JOIN product_detail f on f.product_general_id=b.id
                                        where a.number_order='$id'")->result();
        $data['jum_brg']=$this->db->query("select sum(qty) as jum from transaksi_oke where number_order='$id'")->row();
        $data['jum_hrg']=$this->db->query("select sum(if(b.special_price != 0, b.special_price, b.normal_price) * a.qty) as jum from transaksi_oke a left join product_detail b on a.id_product=b.product_general_id where a.number_order='$id'")->row();
        $data['disc']=$this->db->query("select a.*,b.* from voucher_oke a INNER JOIN coupon b on a.id_voucher=b.id where a.number_order ='$id'")->row();
        $data['view']="detail_order";
        $this->load->view("template",$data);
    }
        
}