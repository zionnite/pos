<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Plans extends My_Controller {
	public function __construct(){
		parent::__construct();
	}

	public function index(){

        $data['get_info']           =$this->Plan_db->get_plans();


		$data['content']	='select_plan';
		$this->load->view($this->layout,$data);
	}

}
