<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ChangePassword extends My_Controller {
	public function __construct(){
		parent::__construct();
	}



    public function index(){
		$this->session_checker->auto_logout();
        $data['aalert']			        =$this->session->flashdata('aalert');
		$data['user_id']         		=$this->session->userdata('user_id');
		$data['user_name']         		=$this->session->userdata('user_name');
        $data['user_status']            =$this->session->userdata('user_status');


    
		$data['content']	='change_password';
		$this->load->view($this->layout,$data);
	}

    public function update_password(){
		if($this->input->post('submit')){	
			$this->form_validation->set_rules('old','Password','required');
			$this->form_validation->set_rules('new','Password','required');

            $old	            	=$this->input->post('old');
            $new		        	=$this->input->post('new');
			
			if($this->form_validation->run() == FALSE){
				$data['alert']	='<div class="alert alert-danger" role="alert">All Field must be filled</div>';
				$this->session->set_flashdata('aalert',$data['alert']);
                redirect('ChangePassword');
			}else{
				$action             =$this->Admin_db->change_password($old,$new);
                if($action =='ok'){
                    $data['alert']	='<div class="alert alert-success" role="alert">Password Sucessfully Changed!</div>';
                    $this->session->set_flashdata('aalert',$data['alert']);
                    redirect('ChangePassword');
                }else{
                    $data['alert']	='<div class="alert alert-danger" role="alert">'.$action.'</div>';
                    $this->session->set_flashdata('aalert',$data['alert']);
                    redirect('ChangePassword');
                }

                

			}
		}else{
			$data['alert']	='<div class="alert alert-danger" role="alert">Please Use the button to Submit Question</div>';
			$this->session->set_flashdata('aalert',$data['alert']);
            redirect('ChangePassword');
		}
	}

}
