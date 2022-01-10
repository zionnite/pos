<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaction_history extends My_Controller {
	public function __construct(){
		parent::__construct();
	}

	public function index(){
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


		$data['content']	='transaction_history';
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


		$data['content']	='transaction_history';
		$this->load->view($data['content'],$data);
	}

    public function index_ajax(){
        $data['store_id']               =$this->session->userdata('store_id');
        $data['branch_id']              =$this->session->userdata('branch_id');
		$data['store_owner_id']         =$this->session->userdata('store_owner_id');
        $data['user_status']            =$this->session->userdata('user_status');


        $search = array(
			'keyword' => trim($this->input->post('search_key')),
            'sort_by'  => $this->input->post('sortBy'),
		);

	
		$this->load->library('pagination');
		
		$limit = 100;
		$offset = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		
		$config['base_url'] = site_url('Transaction_history/index_ajax/');
		$config['total_rows'] = $this->Action->count_transaction_history($data['store_id'], $data['branch_id'], $search);
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

		$data['get_info'] = $this->Action->get_my_transaction_history($data['store_id'], $data['branch_id'], $search, $limit, $offset);
	
		$data['pagelinks'] = $this->pagination->create_links();
		
		$this->load->view('transaction_history_ajax', $data);
    }

    public function delete_transaction($id){
        $action    =$this->Action->delete_transaction($id);
        if($action){
            echo 'ok';
        }else{
            echo 'err';
        }
    }

    public function filter_transaction($type =NULL,$store_id =NULL){
         
		$data['user_id']         		=$this->session->userdata('user_id');
		$data['user_name']         		=$this->session->userdata('user_name');
		$data['store_owner_id']         =$this->session->userdata('store_owner_id');
        $data['user_status']            =$this->session->userdata('user_status');

		

        

        $data['dis_store_id']   =$store_id;
        $data['type']           =$type;
		$data['content']    ='filter_transaction';
        $this->load->view($this->layout, $data); 
    }

    public function filter_transaction_ajax($offset=null){
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
		
		$config['base_url'] = site_url('Transaction_history/filter_transaction_ajax/');
		$config['total_rows'] = $this->Action->count_filter_transaction($search, $store_id, $type);
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

		$data['get_info'] = $this->Action->get_filter_transaction($search, $store_id, $type, $limit, $offset);
	
		$data['pagelinks'] = $this->pagination->create_links();
		
		$this->load->view('filter_transaction_ajax', $data);
	}


}
