<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends My_Controller {
	public function __construct(){
		parent::__construct();
	}

	public function index(){
		$this->session_checker->auto_logout();
		$data['user_id']         		=$this->session->userdata('user_id');
		$data['user_name']         		=$this->session->userdata('user_name');
		$data['email']         		=$this->session->userdata('email');
        $data['user_status']            =$this->session->userdata('user_status');

    
		$data['content']	='index_admin';
		$this->load->view($this->layout,$data);
	}

	public function view_plan(){
		$this->session_checker->auto_logout();
		$data['user_id']         		=$this->session->userdata('user_id');
		$data['user_name']         		=$this->session->userdata('user_name');
        $data['user_status']            =$this->session->userdata('user_status');

		$data['type']                   ='default';

    
		$data['content']	='view_plan';
		$this->load->view($this->layout,$data);
	}

	public function delete_payment_plan($id){
		$action    =$this->Action->delete_payment_plan($id);
        if($action){
            echo 'ok';
        }else{
            echo 'err';
        }
	}
	

	public function create_payment_plan(){
		if(isset($_FILES["file"]["name"]))  {  
			$name                   =$this->input->post('name');
			$num_store              =$this->input->post('num_store');
			$amount                 =$this->input->post('amount');

			
			@mkdir('files');
            @mkdir('files/plan');

            $config['upload_path'] = './files/plan/';
            $config['allowed_types'] = 'png|jpeg|jpg|gif';
            $config['overwrite'] = FALSE;
            $config['remove_spaces'] = TRUE;
            $config['encrypt_name'] = TRUE;
                
            $this->upload->initialize($config);
            $this->load->library('upload', $config);  
            if(!$this->upload->do_upload('file')){  
                echo $this->upload->display_errors();

            }else{  

                $data = array('upload_data' => $this->upload->data());
                $img_file_name  = $data['upload_data']['file_name'];

				$action    =$this->Action->create_payment_plan($name,$num_store,$amount,$img_file_name);
				if($action){
					echo 'ok';
				}else{
					echo 'err';
				}
            } 

		}else{
			echo 'Please select an image';
		}

    }

	public function manage_store(){

		$this->session_checker->auto_logout();
		$data['user_id']         		=$this->session->userdata('user_id');
		$data['user_name']         		=$this->session->userdata('user_name');
        $data['user_status']            =$this->session->userdata('user_status');

		$data['type']                   ='default';

    
		$data['content']	='view_store';
		$this->load->view($this->layout,$data);
	}

	public function delete_store_owner($id){
		$action    =$this->Action->delete_store_owner($id);
        if($action){
            echo 'ok';
        }else{
            echo 'err';
        }
	}

	public function settings(){
		$this->session_checker->auto_logout();
		$data['user_id']         		=$this->session->userdata('user_id');
		$data['user_name']         		=$this->session->userdata('user_name');
        $data['user_status']            =$this->session->userdata('user_status');


    
		$data['content']	='setting_menu';
		$this->load->view($this->layout,$data);
	}

	public function settings_2(){
		$this->session_checker->auto_logout();
		$data['user_id']         		=$this->session->userdata('user_id');
		$data['user_name']         		=$this->session->userdata('user_name');
        $data['user_status']            =$this->session->userdata('user_status');


    
		$data['content']	='setting_menu';
		$this->load->view($data['content'],$data);
	}

	public function site_details(){
		$this->session_checker->auto_logout();
		$data['user_id']         		=$this->session->userdata('user_id');
		$data['user_name']         		=$this->session->userdata('user_name');
        $data['user_status']            =$this->session->userdata('user_status');


    
		$data['content']	='site_details';
		$this->load->view($this->layout,$data);
	}

	public function update_site_details(){
        $site_name        		=$this->input->post('site_name');
        $email         			=$this->input->post('email');
        $phone         			=$this->input->post('phone');
		$g_name					=$this->input->post('gname');
		$g_pass					=$this->input->post('gpass');




        if(isset($_FILES["file"]["name"]))  {  
                
         

                

                
			@mkdir('files');
			@mkdir('files/site_logo');

			$config['upload_path'] = './files/site_logo';
			$config['allowed_types'] = 'png|jpeg|jpg|gif';
			$config['overwrite'] = FALSE;
			$config['remove_spaces'] = TRUE;
			$config['encrypt_name'] = TRUE;
			$config['max_width'] = '220';
			$config['max_height'] = '75';
			// $config['max_width'] = '150';
			// $config['max_height'] = '30';

					
			$this->upload->initialize($config);
			$this->load->library('upload', $config);  
			if(!$this->upload->do_upload('file')){  
				echo $this->upload->display_errors();
			}else{  
				$data = array('upload_data' => $this->upload->data());
				$img_file_name  = $data['upload_data']['file_name'];	
						
				$result	=$this->Admin_db->update_site_setting($img_file_name,$site_name,$phone,$email,$g_name,$g_pass);

				if($result == TRUE){

				
                
                	//File path at local server
                	$source = 'files/site_logo/'.$img_file_name;

					//File upload path of remote server
					$destination = '/files/site_logo/'.$img_file_name;

					//Load codeigniter FTP class
					$this->load->library('ftp');
                
					//FTP configuration
					$ftp_config['hostname'] = 'ftp.example.com'; 
					$ftp_config['username'] = 'ftp_username';
					$ftp_config['password'] = 'ftp_password';
					$ftp_config['debug']    = TRUE;
					
					//Connect to the remote server
					$this->ftp->connect($ftp_config);
					
					
					
					//Upload file to the remote server
					$this->ftp->upload($source, ".".$destination);
					
					//Close FTP connection
					$this->ftp->close();

					echo 'ok';
				}else{
					echo 'err';
				}
			}  
    	}else{
			echo 'failed';
		}
     
        
    }

	public function set_payment_api(){
		$this->session_checker->auto_logout();
		$data['user_id']         		=$this->session->userdata('user_id');
		$data['user_name']         		=$this->session->userdata('user_name');
        $data['user_status']            =$this->session->userdata('user_status');


    
		$data['content']	='set_payment_api';
		$this->load->view($this->layout,$data);
	}
	public function set_payment_api_2(){
		$data['user_id']         		=$this->session->userdata('user_id');
		$data['user_name']         		=$this->session->userdata('user_name');
        $data['user_status']            =$this->session->userdata('user_status');


    
		$data['content']	='set_payment_api';
		$this->load->view($data['content'],$data);
	}

	public function update_payment_api(){
		$private            	=$this->input->post('private');
        $public		        	=$this->input->post('public');



        $action             =$this->Admin_db->update_payment_api($private,$public);
        if($action){
            echo 'ok';
        }
        else{
            echo 'err';
        }
	}

	public function more_about_store_owner($store_owner_id =NULL){
		$this->session_checker->auto_logout();
		$data['user_id']         		=$this->session->userdata('user_id');
		$data['user_name']         		=$this->session->userdata('user_name');
        $data['user_status']            =$this->session->userdata('user_status');


    
		$data['store_owner_id']			=$store_owner_id;
		$data['content']	='more_about_store';
		$this->load->view($this->layout,$data);
	}
	public function more_about_store_owner_2($store_owner_id =NULL){
		$this->session_checker->auto_logout();
		$data['user_id']         		=$this->session->userdata('user_id');
		$data['user_name']         		=$this->session->userdata('user_name');
        $data['user_status']            =$this->session->userdata('user_status');


    
		$data['store_owner_id']			=$store_owner_id;
		$data['content']	='more_about_store_2';
		$this->load->view($data['content'],$data);
	}

	public function update_password(){
		$user_name         		=$this->session->userdata('user_name');
        $user_status            =$this->session->userdata('user_status');

		$old	            	=$this->input->post('old');
        $new		        	=$this->input->post('new');
        $renew		        	=$this->input->post('renew');



		if($user_status =='admin'){

		}else if($user_status =='store_owner'){

		}else if($user_status =='manager'){

		}else if($user_status =='sales_rep'){

		}
        $action             =$this->Admin_db->change_password($old,$new,$renew);
        if($action){
            echo 'ok';
        }
        else{
           echo $action;
        }
	}

	public function edit_plan($id =NULL){
		$this->session_checker->auto_logout();
		$data['user_id']         		=$this->session->userdata('user_id');
		$data['user_name']         		=$this->session->userdata('user_name');
        $data['user_status']            =$this->session->userdata('user_status');

		$data['plan_id']                     =$id;

    
		$data['content']	='edit_plan';
		$this->load->view($this->layout,$data);
	}

	public function update_plan(){
		$plan_name		=$this->input->post('plan_name');
		$num_store 		=$this->input->post('num_store');
		$amount			=$this->input->post('amount');
		$plan_id 		=$this->input->post('plan_id');

		$action 		=$this->Admin_db->update_plan($plan_name,$num_store,$amount,$plan_id);
		if($action){
			echo 'ok';
		}else{
			echo 'err';
		}

	}

	public function suspend_store($id=NULL){
		$action    =$this->Admin_db->suspend_store($id);
        if($action){
            echo 'ok';
        }else{
            echo 'err';
        }
	}
	public function unsuspend_store($id=NULL){
		$action    =$this->Admin_db->unsuspend_store($id);
        if($action){
            echo 'ok';
        }else{
            echo 'err';
        }
	}

	public function view_store_detail($store_id =NULL){
		$this->session_checker->auto_logout();
		$data['user_id']         		=$this->session->userdata('user_id');
		$data['user_name']         		=$this->session->userdata('user_name');
        $data['user_status']            =$this->session->userdata('user_status');


    
		$data['store_id']			=$store_id;
		$data['content']	='view_store_detail';
		$this->load->view($this->layout,$data);
	}
}
