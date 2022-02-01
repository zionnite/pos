<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Invoice extends My_Controller {
	public function __construct(){
		parent::__construct();
	}

	public function index(){
		$this->session_checker->auto_logout();

		$data['alert']			        =$this->session->flashdata('alert');

        $data['phone_no']         		=$this->session->userdata('phone_no');
		$data['user_id']         		=$this->session->userdata('user_id');
		$data['user_name']         		=$this->session->userdata('user_name');
        $data['email']                  =$this->session->userdata('email');
        $data['store_id']               =$this->session->userdata('store_id');
        $data['store_name']             =$this->session->userdata('store_name');
        $data['branch_id']              =$this->session->userdata('branch_id');
        $data['store_owner_id']         =$this->session->userdata('store_owner_id');
        $data['user_status']            =$this->session->userdata('user_status');



        $data['content']	='view_my_invoice';
		$this->load->view($this->layout,$data);
	}
	public function index_2(){

		$data['alert']			        =$this->session->flashdata('alert');

        $data['phone_no']         		=$this->session->userdata('phone_no');
		$data['user_id']         		=$this->session->userdata('user_id');
		$data['user_name']         		=$this->session->userdata('user_name');
        $data['email']                  =$this->session->userdata('email');
        $data['store_id']               =$this->session->userdata('store_id');
        $data['store_name']             =$this->session->userdata('store_name');
        $data['branch_id']              =$this->session->userdata('branch_id');
        $data['store_owner_id']         =$this->session->userdata('store_owner_id');
        $data['user_status']            =$this->session->userdata('user_status');



        $data['content']	='view_my_invoice_2';
		$this->load->view($data['content'],$data);
	}

    public function index_ajax(){

		$data['store_id']               =$this->session->userdata('store_id');
        $data['branch_id']              =$this->session->userdata('branch_id');


        $search = array(
			'keyword' => trim($this->input->post('search_key')),
            'sort_by'  => $this->input->post('sortBy'),
		);

	
		$this->load->library('pagination');
		
		$limit = 100;
		$offset = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		
		$config['base_url'] = site_url('Invoice/index_ajax/');
		$config['total_rows'] = $this->Action->count_invoice($data['store_id'], $data['branch_id'], $search);
		$config['per_page'] = $limit;
		$config['uri_segment'] = 3;
		$config['num_links'] = 3;
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li><a href="" class="current_page">';
		$config['cur_tag_close'] = '</a></li>';
		$config['next_link'] = 'Next';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['prev_link'] = 'Previous';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		
		$this->pagination->initialize($config);

		$data['get_info'] = $this->Action->get_my_invoice($data['store_id'], $data['branch_id'], $search, $limit, $offset);
	
		$data['pagelinks'] = $this->pagination->create_links();
		
		$this->load->view('my_invoice_ajax', $data);
    }


	public function view_invoice($invoice_no =NULL){
		$this->session_checker->auto_logout();

		$data['alert']			        =$this->session->flashdata('alert');

        $data['phone_no']         		=$this->session->userdata('phone_no');
		$data['user_id']         		=$this->session->userdata('user_id');
		$data['user_name']         		=$this->session->userdata('user_name');
        $data['email']                  =$this->session->userdata('email');
        $data['store_id']               =$this->session->userdata('store_id');
        $data['store_name']             =$this->session->userdata('store_name');
        $data['branch_id']              =$this->session->userdata('branch_id');
        $data['store_owner_id']         =$this->session->userdata('store_owner_id');
        $data['user_status']            =$this->session->userdata('user_status');



		$data['get_info']		=$this->Action->get_invoice_details_by_inovice_no($invoice_no);
        $data['content']	='view_invoice';
		$this->load->view($this->layout,$data);
	}


	public function delete_invoice($id){
		$action    =$this->Action->delete_invoice($id);
        if($action){
            echo 'ok';
        }else{
            echo 'err';
        }
	}

	public function filter_invoice($type =NULL,$store_id =NULL){
		$this->session_checker->auto_logout();
    
		$data['user_id']         		=$this->session->userdata('user_id');
		$data['user_name']         		=$this->session->userdata('user_name');
        $data['store_owner_id']         =$this->session->userdata('store_owner_id');
        $data['user_status']            =$this->session->userdata('user_status');

        $data['dis_store_id']   =$store_id;
        $data['type']           =$type;
		$data['content']    ='filter_invoice';
        $this->load->view($this->layout, $data); 
    }

    public function filter_invoice_ajax($offset=null){
		$store_id   = $this->input->post('store_id');
        $type       = $this->input->post('type');
		$data['store_id']		=$store_id;


		$search = array(
			'keyword' => trim($this->input->post('search_key')),
            'sort_by'  => $this->input->post('sortBy'),
		);

       
		
		$this->load->library('pagination');
		
		$limit = 100;
		$offset = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		
		$config['base_url'] = site_url('Office/filter_invoice_ajax/');
		$config['total_rows'] = $this->Action->count_filter_invoice($search, $store_id, $type);
		$config['per_page'] = $limit;
		$config['uri_segment'] = 3;
		$config['num_links'] = 3;
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li><a href="" class="current_page">';
		$config['cur_tag_close'] = '</a></li>';
		$config['next_link'] = 'Next';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['prev_link'] = 'Previous';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		
		$this->pagination->initialize($config);
        $this->pagination->cur_page = $offset;

		$data['get_info'] = $this->Action->get_filter_invoice($search, $store_id, $type, $limit, $offset);
	
		$data['pagelinks'] = $this->pagination->create_links();
		
		$this->load->view('filter_invoice_ajax', $data);
	}

	public function print_invoice(){
		$this->session_checker->auto_logout();

		$data['alert']			        =$this->session->flashdata('alert');

        $data['phone_no']         		=$this->session->userdata('phone_no');
		$data['user_id']         		=$this->session->userdata('user_id');
		$data['user_name']         		=$this->session->userdata('user_name');
        $data['email']                  =$this->session->userdata('email');
        $data['store_id']               =$this->session->userdata('store_id');
        $data['store_name']             =$this->session->userdata('store_name');
        $data['branch_id']              =$this->session->userdata('branch_id');
        $data['store_owner_id']         =$this->session->userdata('store_owner_id');
        $data['user_status']            =$this->session->userdata('user_status');

		
		$this->load->view('print_invoice',$data);
	}


}
