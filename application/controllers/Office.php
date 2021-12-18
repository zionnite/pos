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

    public function create_store(){
        if(isset($_FILES["file"]["name"]))  {  
            
            $store      	=$this->input->post('store_name');
            $store2     	=$this->input->post('store_name');

            $store_name  = preg_replace("/\s+/", "_", $store2);
            $store_name  = preg_replace('/[^A-Za-z0-9\_]/', '', $store_name);
            
            @mkdir('store_img');
            @mkdir('store_img/'.$store_name);
            @mkdir('store_img/'.$store_name.'/images');
            
			$config['upload_path'] = './books';
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
                
                
				$result	=$this->Admin_db->edit_book($img_file_name,$book_title,$book_desc,$book_id,$book_link);


                if($result == TRUE){
                echo 'ok';
                }else{
                echo 'err';
                }
            }  
        }
    }

}
