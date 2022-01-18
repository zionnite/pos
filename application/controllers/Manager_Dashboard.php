<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manager_Dashboard extends My_Controller {
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

		$data['content']	='index_manager';
		$this->load->view($this->layout,$data);
	}

	public function view_sale_rep(){
        $this->session_checker->auto_logout();

        $data['alert']			        =$this->session->flashdata('alert');

        $data['phone_no']         		=$this->session->userdata('phone_no');
		$data['user_id']         		=$this->session->userdata('user_id');
		$data['user_name']         		=$this->session->userdata('user_name');
        $data['email']                  =$this->session->userdata('email');
        $data['user_status']            =$this->session->userdata('user_status');
        $data['store_owner_id']         =$this->session->userdata('store_owner_id');


        $data['type']                   ='default';

        $data['content']	            ='view_sale_rep';
		$this->load->view($this->layout, $data);
    }

	public function get_sales_rep_by_store_id($store_id=NULL){
        $this->session_checker->auto_logout();
        $data['alert']			        =$this->session->flashdata('alert');

        $data['phone_no']         		=$this->session->userdata('phone_no');
		$data['user_id']         		=$this->session->userdata('user_id');
		$data['user_name']         		=$this->session->userdata('user_name');
        $data['email']                  =$this->session->userdata('email');
        $data['user_status']            =$this->session->userdata('user_status');
        $data['store_owner_id']         =$this->session->userdata('store_owner_id');


        $data['type']                   ='store';

        $data['dis_store_id']               =$store_id;

        $data['content']	            ='view_sale_rep';
		$this->load->view($this->layout, $data);
    }

    public function get_sales_rep_by_store_branch_id($branch_id=NULL){
        $this->session_checker->auto_logout();
        $data['alert']			        =$this->session->flashdata('alert');

        $data['phone_no']         		=$this->session->userdata('phone_no');
		$data['user_id']         		=$this->session->userdata('user_id');
		$data['user_name']         		=$this->session->userdata('user_name');
        $data['email']                  =$this->session->userdata('email');
        $data['user_status']            =$this->session->userdata('user_status');
        $data['store_owner_id']         =$this->session->userdata('store_owner_id');


        $data['type']                   ='branch';

        $data['dis_branch_id']               =$branch_id;

        $data['content']	            ='view_sale_rep';
		$this->load->view($this->layout, $data);
    }


	public function view_my_customer(){
        $this->session_checker->auto_logout();
        $data['alert']			        =$this->session->flashdata('alert');

        $data['phone_no']         		=$this->session->userdata('phone_no');
		$data['user_id']         		=$this->session->userdata('user_id');
		$data['user_name']         		=$this->session->userdata('user_name');
        $data['email']                  =$this->session->userdata('email');
        $data['user_status']            =$this->session->userdata('user_status');
        $data['store_owner_id']         =$this->session->userdata('store_owner_id');

        $data['content']    ='view_my_customer';
        $this->load->view($this->layout, $data); 
    }

	public function filter_customer($type =NULL,$store_id =NULL){
        $this->session_checker->auto_logout();
        $data['alert']			        =$this->session->flashdata('alert');

        $data['phone_no']         		=$this->session->userdata('phone_no');
		$data['user_id']         		=$this->session->userdata('user_id');
		$data['user_name']         		=$this->session->userdata('user_name');
        $data['email']                  =$this->session->userdata('email');
        $data['user_status']            =$this->session->userdata('user_status');
        $data['store_owner_id']         =$this->session->userdata('store_owner_id');


        $data['content']    ='filter_customer';

        $data['dis_store_id']   =$store_id;
        $data['type']           =$type;
        $this->load->view($this->layout, $data); 
    }

	public function view_my_supplier(){
        $this->session_checker->auto_logout();
         
        $data['alert']			        =$this->session->flashdata('alert');

        $data['phone_no']         		=$this->session->userdata('phone_no');
		$data['user_id']         		=$this->session->userdata('user_id');
		$data['user_name']         		=$this->session->userdata('user_name');
        $data['email']                  =$this->session->userdata('email');
        $data['user_status']            =$this->session->userdata('user_status');
        $data['store_owner_id']         =$this->session->userdata('store_owner_id');

        $data['content']    ='view_my_supplier';

        
        $this->load->view($this->layout, $data); 
    }

	public function filter_supplier($type =NULL,$store_id =NULL){
        $this->session_checker->auto_logout();
        $data['alert']			        =$this->session->flashdata('alert');

        $data['phone_no']         		=$this->session->userdata('phone_no');
		$data['user_id']         		=$this->session->userdata('user_id');
		$data['user_name']         		=$this->session->userdata('user_name');
        $data['email']                  =$this->session->userdata('email');
        $data['user_status']            =$this->session->userdata('user_status');
        $data['store_owner_id']         =$this->session->userdata('store_owner_id');

        $data['content']    ='filter_supplier';

        $data['dis_store_id']   =$store_id;
        $data['type']           =$type;
        $this->load->view($this->layout, $data); 
    }

	public function view_my_category(){
        $this->session_checker->auto_logout();
         
        $data['alert']			        =$this->session->flashdata('alert');

        $data['phone_no']         		=$this->session->userdata('phone_no');
		$data['user_id']         		=$this->session->userdata('user_id');
		$data['user_name']         		=$this->session->userdata('user_name');
        $data['email']                  =$this->session->userdata('email');
        $data['user_status']            =$this->session->userdata('user_status');
        $data['store_owner_id']         =$this->session->userdata('store_owner_id');

        $data['content']    ='view_my_category';

        
        $this->load->view($this->layout, $data); 
    }

	public function add_stock(){
        $this->session_checker->auto_logout();
        $data['alert']			        =$this->session->flashdata('alert');

        $data['phone_no']         		=$this->session->userdata('phone_no');
		$data['user_id']         		=$this->session->userdata('user_id');
		$data['user_name']         		=$this->session->userdata('user_name');
        $data['email']                  =$this->session->userdata('email');
        $data['user_status']            =$this->session->userdata('user_status');
        $data['store_owner_id']         =$this->session->userdata('store_owner_id');


        $data['type']                   ='default';

        $data['content']	            ='add_stock';
		$this->load->view($this->layout_2, $data);
    }

	public function view_product(){
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
        
        
        $data['content']    ='view_product';
        $this->load->view($this->layout, $data); 
    }

	public function filter_product($type =NULL,$store_id =NULL){
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
        $data['content']    ='filter_product';

        $data['dis_store_id']   =$store_id;
        $data['type']           =$type;
        $this->load->view($this->layout, $data); 
    }

	public function view_product_in(){
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
        
        
        $data['content']    ='view_product_in';
        $this->load->view($this->layout, $data); 
    }
    

	public function filter_product_in($type =NULL,$store_id =NULL){
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
        $data['content']    ='filter_product_in';

        $data['dis_store_id']   =$store_id;
        $data['type']           =$type;
        $this->load->view($this->layout, $data); 
    }

	
    public function view_product_out(){
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
        
        
        $data['content']    ='view_product_out';
        $this->load->view($this->layout, $data); 
    }

	public function filter_product_out($type =NULL,$store_id =NULL){
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
        $data['content']    ='filter_product_out';

        $data['dis_store_id']   =$store_id;
        $data['type']           =$type;
        $this->load->view($this->layout, $data); 
    }


}
