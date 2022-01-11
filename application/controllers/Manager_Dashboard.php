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

}
