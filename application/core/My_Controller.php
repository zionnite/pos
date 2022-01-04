<?php
class My_Controller extends CI_Controller{
	public $layout;
	public $layout2;
    public $admin_layout;
    public $user_layout;
	public $auth_master;
	public function __construct(){
		parent::__construct();
		
        
		$this->layout	='master';
		$this->layout_2	='master_2';
		$this->auth_master	='auth/auth_master';
        
		$this->load->model('Action');
		$this->load->model('Admin_db');
		$this->load->model('Login_user');

		$this->load->library('ajax_pagination'); 
	}
	
}
