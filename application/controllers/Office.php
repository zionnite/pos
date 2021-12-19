<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Office extends My_Controller {
	public function __construct(){
		parent::__construct();
	}

	public function index(){
		$data['content']	='index';
		$this->load->view($this->layout,$data);
	}

    public function open_store(){
        $data['content']	='open_store';
		$this->load->view($this->layout,$data);
    }

    public function list_store(){
        $user_id        		=$this->session->userdata('user_id');
        $user_name         		=$this->session->userdata('user_name');

        $data['user_id'] 	            = 1;
        $data['user_name']	            ='zionnite';

        $data['content']	    ='list_store';
		$this->load->view($data['content'], $data);
    }
    public function create_store(){
        if(isset($_FILES["file"]["name"]))  {  
            
            $store      	=$this->input->post('store_name');

            $store_name  = preg_replace("/\s+/", "_", $store);
            $store_name  = preg_replace('/[^A-Za-z0-9\_]/', '', $store_name);

            $user_id        		=$this->session->userdata('user_id');
            $user_name         		=$this->session->userdata('user_name');

            $user_id 	= 1;
            $user_name	='zionnite';
            
            @mkdir('store_img');
            @mkdir('store_img/'.$store_name);
            @mkdir('store_img/'.$store_name.'/images');

			$config['upload_path'] = './store_img/'.$store_name.'/images';
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
                
                
				$result	=$this->Action->create_store($img_file_name,$store,$store_name,$user_id,$user_name);


                if($result == TRUE){
                echo 'ok';
                }else{
                echo 'err';
                }
            }  
        }
    }

    public function delete_store($id=NULL){
        $action    =$this->Action->delete_store($id);
        if($action){
            echo 'ok';
        }else{
            echo 'err';
        }
    }

    public function change_store_name(){
        $new_store_name     =$this->input->post('new_store_name');
        $store_id           =$this->input->post('store_id');

        echo $new_store_name.br().$store_id;
    }

}
