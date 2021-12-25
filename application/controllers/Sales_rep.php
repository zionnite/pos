<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sales_rep extends My_Controller {
	public function __construct(){
		parent::__construct();
	}

	public function index(){
		$data['content']	='add_sales';
		$this->load->view($this->layout,$data);
	}

}
