<?php
class My_Controller extends CI_Controller{
	public $layout;
	public $layout2;
	public $layout_3;
	public $layout_4;
    public $admin_layout;
    public $user_layout;
	public $auth_master;
	public function __construct(){
		parent::__construct();
		
        
		$this->layout	='master'; //default
		$this->layout_2	='master_2'; //add product
		$this->layout_3	='master_3'; //email Template
		$this->layout_4	='master_4'; //email Template for not users like supplier
		$this->auth_master	='auth/auth_master';
        
		$this->load->model('Action');
		$this->load->model('Admin_db');
		$this->load->model('Login_user');
		$this->load->model('Plan_db');

		$this->load->library('ajax_pagination'); 
		$this->load->library('session_checker'); 
	}
	
}
