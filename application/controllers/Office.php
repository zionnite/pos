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

        $user_id        		=$this->session->userdata('user_id');
        $user_name         		=$this->session->userdata('user_name');

        $data['user_id'] 	            = 1;
        $data['user_name']	            ='zionnite';


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

    public function manage_store($store_id=NULL){
        $user_id        		=$this->session->userdata('user_id');
        $user_name         		=$this->session->userdata('user_name');

        $data['user_id'] 	            = 1;
        $data['user_name']	            ='zionnite';

        $data['store_id']      =$store_id;

        $data['content']	='manage_store';
		$this->load->view($this->layout,$data);
    }

    public function manage_store_2($store_id=NULL){
        $user_id        		=$this->session->userdata('user_id');
        $user_name         		=$this->session->userdata('user_name');

        $data['user_id'] 	            = 1;
        $data['user_name']	            ='zionnite';

        $data['store_id']      =$store_id;

        $data['content']	='manage_store_2';
		$this->load->view($data['content'],$data);
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

        $action    =$this->Action->change_store_name($store_id,$new_store_name);
        if($action){
            echo 'ok';
        }else{
            echo 'err';
        }

    }

    public function change_store_logo(){
        if(isset($_FILES["file"]["name"]))  {  
            
            $store_id           =$this->input->post('store_id');
            $store_name           =$this->Action->get_store_name_2_by_store_id($store_id);

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
                echo 'here'; 
                echo $this->upload->display_errors();
            }else{  
                $data = array('upload_data' => $this->upload->data());
                $img_file_name  = $data['upload_data']['file_name'];
                
                
				$result	=$this->Action->edit_store_logo($img_file_name,$store_id);


                if($result == TRUE){
                echo 'ok';
                }else{
                echo 'err';
                }
            }  
        }

    }

    /*Open Branch Stroe*/
    public function open_branch_store($store_id=NULL){
        $user_id        		        =$this->session->userdata('user_id');
        $user_name         		        =$this->session->userdata('user_name');

        $data['user_id'] 	            = 1;
        $data['user_name']	            ='zionnite';

        $data['store_id']               =$store_id;
        $data['content']	='open_branch_store';
		$this->load->view($this->layout, $data);
    }


    public function create_branch_store()
    {
        $store_id            =$this->input->post('store_id');
        $branch_name        =$this->input->post('branch_name');

        $user_id        		        =$this->session->userdata('user_id');
        $user_name         		        =$this->session->userdata('user_name');

        $data['user_id'] 	            = 1;
        $data['user_name']	            ='zionnite';

        $action             =$this->Action->create_branch_store($store_id,$branch_name,$data['user_id']);
        if($action){
            echo 'ok';
        }
        else{
            echo 'err';
        }
    }

    public function delete_branch_store($id){
        $action    =$this->Action->delete_branch_store($id);
        if($action){
            echo 'ok';
        }else{
            echo 'err';
        }
    }


    /*Create Supervisor*/
    public function view_supervisor(){
        $user_id        		        =$this->session->userdata('user_id');
        $user_name         		        =$this->session->userdata('user_name');

        $data['user_id'] 	            = 1;
        $data['user_name']	            ='zionnite';

        $data['content']	            ='view_supervisor';
		$this->load->view($this->layout, $data);
    }

    public function get_store_branch_name(){
		$store_id	=$this->input->post('store_id');
		$get_sub_cat_name	=$this->Action->get_store_branches_by_store_id($store_id);
		if(is_array($get_sub_cat_name)){
			foreach($get_sub_cat_name as $row){
				$branch_id	    =$row['id'];
				$branch_name	=$row['branch_name'];
				echo '<option value="'.$branch_id.'">'.$branch_name.'</option>';
			}
		}else{
            echo '<option>This store does not have a Branch Yet!</option>';
        }
	}

    public function create_supervisor(){
        $store_id               =$this->input->post('store_id');
        $branch_id              =$this->input->post('branch_name');
        $name                   =$this->input->post('name');
        $email                  =$this->input->post('email');
        $phone                  =$this->input->post('phone');

        $action    =$this->Action->create_supervisor($store_id,$branch_id,$name,$email,$phone);
        if($action){
            echo 'ok';
        }else{
            echo 'err';
        }

    }

    public function delete_supervisor($id){
        $action    =$this->Action->delete_supervisor($id);
        if($action){
            echo 'ok';
        }else{
            echo 'err';
        }
    }

}
