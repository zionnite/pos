<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends My_Controller {
	public function __construct(){
		parent::__construct();
	}

	public function index(){
		$data['content']	='index';
		$this->load->view($this->layout,$data);
	}
}
