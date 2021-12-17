<?php
class My_Controller extends CI_Controller{
	public $layout;
	public $layout2;
    public $admin_layout;
    public $user_layout;
	public function __construct(){
		parent::__construct();
		
        
		$this->layout	='master';
		$this->layout_2	='master_2';
        
		$this->load->model('Action');
		$this->load->model('Admin_db');
		$this->load->model('Login_user');
	}
	
}
