<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends My_Controller {
	public function __construct(){
		parent::__construct();
	}

	public function index(){
		$data['user_id']         		=$this->session->userdata('user_id');
		$data['user_name']         		=$this->session->userdata('user_name');
        $data['user_status']            =$this->session->userdata('user_status');

    
		$data['content']	='index_admin';
		$this->load->view($this->layout,$data);
	}

}
