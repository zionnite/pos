<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Office extends My_Controller {
	public function __construct(){
		parent::__construct();

        $this->perPage  =2;
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

        $data['type']                   ='default';

        $data['content']	            ='view_supervisor';
		$this->load->view($this->layout, $data);
    }

    public function get_supervisor_by_store_id($store_id=NULL){
        $user_id        		        =$this->session->userdata('user_id');
        $user_name         		        =$this->session->userdata('user_name');

        $data['user_id'] 	            = 1;
        $data['user_name']	            ='zionnite';

        $data['type']                   ='store';

        $data['dis_store_id']               =$store_id;

        $data['content']	            ='view_supervisor';
		$this->load->view($this->layout, $data);
    }

    public function get_supervisor_by_store_branch_id($branch_id=NULL){
        $user_id        		        =$this->session->userdata('user_id');
        $user_name         		        =$this->session->userdata('user_name');

        $data['user_id'] 	            = 1;
        $data['user_name']	            ='zionnite';

        $data['type']                   ='branch';

        $data['dis_branch_id']               =$branch_id;

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
        $password                  =$this->input->post('password');

        $action    =$this->Action->create_supervisor($store_id,$branch_id,$name,$email,$phone,$password);
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


    /*Create Supervisor*/
    public function view_sale_rep(){
        $user_id        		        =$this->session->userdata('user_id');
        $user_name         		        =$this->session->userdata('user_name');

        $data['user_id'] 	            = 1;
        $data['user_name']	            ='zionnite';

        $data['type']                   ='default';

        $data['content']	            ='view_sale_rep';
		$this->load->view($this->layout, $data);
    }

    public function create_sales_rep(){
        $store_id               =$this->input->post('store_id');
        $branch_id              =$this->input->post('branch_name');
        $name                   =$this->input->post('name');
        $email                  =$this->input->post('email');
        $phone                  =$this->input->post('phone');
        $password                  =$this->input->post('password');

        $action    =$this->Action->create_sales_rep($store_id,$branch_id,$name,$email,$phone,$password);
        if($action){
            echo 'ok';
        }else{
            echo 'err';
        }

    }

    public function delete_sales_rep($id){
        $action    =$this->Action->delete_sales_rep($id);
        if($action){
            echo 'ok';
        }else{
            echo 'err';
        }
    }

    /*Customer*/
 

    public function view_my_customer(){
         
        // Load the list page view 
        $data['user_id']    =1;
        $data['user_name']  ='zionnite';
        $data['content']    ='view_my_customer';

        
        $this->load->view($this->layout, $data); 
    }



    public function view_my_contact_ajax($offset=null)
	{
		$search = array(
			'keyword' => trim($this->input->post('search_key')),
            'sort_by'  => $this->input->post('sortBy'),
		);

		
		$this->load->library('pagination');
		
		$limit = 100;
		$offset = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		
		$config['base_url'] = site_url('Office/view_my_contact_ajax/');
		$config['total_rows'] = $this->Action->count_customers($search);
		$config['per_page'] = $limit;
		$config['uri_segment'] = 3;
		$config['num_links'] = 3;
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li><a href="" class="current_page">';
		$config['cur_tag_close'] = '</a></li>';
		$config['next_link'] = 'Next';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['prev_link'] = 'Previous';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		
		$this->pagination->initialize($config);

		$data['get_info'] = $this->Action->get_my_customer($search, $limit, $offset);
	
		$data['pagelinks'] = $this->pagination->create_links();
		
		$this->load->view('my_customer_ajax', $data);
	}

    public function delete_customer($id){
        $action    =$this->Action->delete_customer($id);
        if($action){
            echo 'ok';
        }else{
            echo 'err';
        }
    }

    public function filter_customer($type =NULL,$store_id =NULL){
         
        // Load the list page view 
        $data['user_id']    =1;
        $data['user_name']  ='zionnite';
        $data['content']    ='filter_customer';

        $data['dis_store_id']   =$store_id;
        $data['type']           =$type;
        $this->load->view($this->layout, $data); 
    }

    public function filter_customer_ajax($offset=null)
	{
		$search = array(
			'keyword' => trim($this->input->post('search_key')),
            'sort_by'  => $this->input->post('sortBy'),
		);

        $store_id   = $this->input->post('store_id');
        $type       = $this->input->post('type');

        // $type='store';
        // $store_id ='101';

		
		$this->load->library('pagination');
		
		$limit = 100;
		$offset = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		
		$config['base_url'] = site_url('Office/filter_customer_ajax/');
		$config['total_rows'] = $this->Action->count_filter_customers($search, $store_id, $type);
		$config['per_page'] = $limit;
		$config['uri_segment'] = 3;
		$config['num_links'] = 3;
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li><a href="" class="current_page">';
		$config['cur_tag_close'] = '</a></li>';
		$config['next_link'] = 'Next';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['prev_link'] = 'Previous';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		
		$this->pagination->initialize($config);
        $this->pagination->cur_page = $offset;

		$data['get_info'] = $this->Action->get_filter_customer($search, $store_id, $type, $limit, $offset);
	
		$data['pagelinks'] = $this->pagination->create_links();
		
		$this->load->view('filter_customer_ajax', $data);
	}

    public function create_customer(){
        $store_id               =$this->input->post('store_id');
        $branch_id              =$this->input->post('branch_name');
        $name                   =$this->input->post('name');
        $email                  =$this->input->post('email');
        $phone                  =$this->input->post('phone');

        $action    =$this->Action->create_customer($store_id,$branch_id,$name,$email,$phone);
        if($action){
            echo 'ok';
        }else{
            echo 'err';
        }

    }
}
