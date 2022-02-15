<?php
class Sales_report extends My_Controller{
    public function __construct(){
        parent::__construct();
    }

    public function index($id=NULL,$sub_email=NULL){
        $this->session_checker->auto_logout();
         
        // Load the list page view 
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
        
        $data['sub_email']              =urldecode($sub_email);
        
        $data['content']    ='sales_report';
        $this->load->view($this->layout, $data); 
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
		
		$config['base_url'] = site_url('Sales_report/index_ajax/');
		$config['total_rows'] = $this->Action->count_today_transaction_history($data['store_id'], $data['branch_id'], $search);
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

		$data['get_info'] = $this->Action->get_my_today_transaction_history($data['store_id'], $data['branch_id'], $search, $limit, $offset);
	
		$data['pagelinks'] = $this->pagination->create_links();
		
		$this->load->view('transaction_history_ajax', $data);
    }
}