<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Office extends My_Controller {
	public function __construct(){
		parent::__construct();

        $this->perPage  =2;
	}

	public function index(){
        $data['alert']			        =$this->session->flashdata('alert');

        $data['phone_no']         		=$this->session->userdata('phone_no');
		$data['user_id']         		=$this->session->userdata('user_id');
		$data['user_name']         		=$this->session->userdata('user_name');
        $data['email']                  =$this->session->userdata('email');
        $data['user_status']            =$this->session->userdata('user_status');

		$data['content']	='index';
		$this->load->view($this->layout,$data);
	}

    public function open_store(){

        $data['alert']			        =$this->session->flashdata('alert');

        $data['phone_no']         		=$this->session->userdata('phone_no');
		$data['user_id']         		=$this->session->userdata('user_id');
		$data['user_name']         		=$this->session->userdata('user_name');
        $data['email']                  =$this->session->userdata('email');
        $data['user_status']            =$this->session->userdata('user_status');



        $data['content']	='open_store';
		$this->load->view($this->layout,$data);
    }

    public function list_store(){
      
        $data['alert']			        =$this->session->flashdata('alert');

        $data['phone_no']         		=$this->session->userdata('phone_no');
		$data['user_id']         		=$this->session->userdata('user_id');
		$data['user_name']         		=$this->session->userdata('user_name');
        $data['email']                  =$this->session->userdata('email');
        $data['user_status']            =$this->session->userdata('user_status');

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
        $data['alert']			        =$this->session->flashdata('alert');

        $data['phone_no']         		=$this->session->userdata('phone_no');
		$data['user_id']         		=$this->session->userdata('user_id');
		$data['user_name']         		=$this->session->userdata('user_name');
        $data['email']                  =$this->session->userdata('email');
        $data['user_status']            =$this->session->userdata('user_status');

        $data['store_id']      =$store_id;

        $data['content']	='manage_store';
		$this->load->view($this->layout,$data);
    }

    public function manage_store_2($store_id=NULL){
        $data['alert']			        =$this->session->flashdata('alert');

        $data['phone_no']         		=$this->session->userdata('phone_no');
		$data['user_id']         		=$this->session->userdata('user_id');
		$data['user_name']         		=$this->session->userdata('user_name');
        $data['email']                  =$this->session->userdata('email');
        $data['user_status']            =$this->session->userdata('user_status');


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
        $data['alert']			        =$this->session->flashdata('alert');

        $data['phone_no']         		=$this->session->userdata('phone_no');
		$data['user_id']         		=$this->session->userdata('user_id');
		$data['user_name']         		=$this->session->userdata('user_name');
        $data['email']                  =$this->session->userdata('email');
        $data['user_status']            =$this->session->userdata('user_status');


        $data['store_id']               =$store_id;
        $data['content']	='open_branch_store';
		$this->load->view($this->layout, $data);
    }


    public function create_branch_store()
    {
        $store_id            =$this->input->post('store_id');
        $branch_name        =$this->input->post('branch_name');


		$data['user_id']         		=$this->session->userdata('user_id');

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
        $data['alert']			        =$this->session->flashdata('alert');

        $data['phone_no']         		=$this->session->userdata('phone_no');
		$data['user_id']         		=$this->session->userdata('user_id');
		$data['user_name']         		=$this->session->userdata('user_name');
        $data['email']                  =$this->session->userdata('email');
        $data['user_status']            =$this->session->userdata('user_status');


        $data['type']                   ='default';

        $data['content']	            ='view_supervisor';
		$this->load->view($this->layout, $data);
    }

    public function get_supervisor_by_store_id($store_id=NULL){
        $data['alert']			        =$this->session->flashdata('alert');

        $data['phone_no']         		=$this->session->userdata('phone_no');
		$data['user_id']         		=$this->session->userdata('user_id');
		$data['user_name']         		=$this->session->userdata('user_name');
        $data['email']                  =$this->session->userdata('email');
        $data['user_status']            =$this->session->userdata('user_status');


        $data['type']                   ='store';

        $data['dis_store_id']               =$store_id;

        $data['content']	            ='view_supervisor';
		$this->load->view($this->layout, $data);
    }

    public function get_supervisor_by_store_branch_id($branch_id=NULL){
        $data['alert']			        =$this->session->flashdata('alert');

        $data['phone_no']         		=$this->session->userdata('phone_no');
		$data['user_id']         		=$this->session->userdata('user_id');
		$data['user_name']         		=$this->session->userdata('user_name');
        $data['email']                  =$this->session->userdata('email');
        $data['user_status']            =$this->session->userdata('user_status');


        $data['type']                   ='branch';

        $data['dis_branch_id']               =$branch_id;

        $data['content']	            ='view_supervisor';
		$this->load->view($this->layout, $data);
    }

    public function get_store_branch_name(){
		$store_id	=$this->input->post('store_id');
        //$output     ='';
        //$output     .='<option>Select</option>';
		$get_sub_cat_name	=$this->Action->get_store_branches_by_store_id($store_id);
		if(is_array($get_sub_cat_name)){
			foreach($get_sub_cat_name as $row){
				$branch_id	    =$row['id'];
				$branch_name	=$row['branch_name'];
				echo $output    ='<option value="'.$branch_id.'">'.$branch_name.'</option>';
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
        $data['alert']			        =$this->session->flashdata('alert');

        $data['phone_no']         		=$this->session->userdata('phone_no');
		$data['user_id']         		=$this->session->userdata('user_id');
		$data['user_name']         		=$this->session->userdata('user_name');
        $data['email']                  =$this->session->userdata('email');
        $data['user_status']            =$this->session->userdata('user_status');
        $data['store_owner_id']         =$this->session->userdata('store_owner_id');


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

    public function get_sales_rep_by_store_id($store_id=NULL){
        $data['alert']			        =$this->session->flashdata('alert');

        $data['phone_no']         		=$this->session->userdata('phone_no');
		$data['user_id']         		=$this->session->userdata('user_id');
		$data['user_name']         		=$this->session->userdata('user_name');
        $data['email']                  =$this->session->userdata('email');
        $data['user_status']            =$this->session->userdata('user_status');
        $data['store_owner_id']         =$this->session->userdata('store_owner_id');


        $data['type']                   ='store';

        $data['dis_store_id']               =$store_id;

        $data['content']	            ='view_sale_rep';
		$this->load->view($this->layout, $data);
    }

    public function get_sales_rep_by_store_branch_id($branch_id=NULL){
        $data['alert']			        =$this->session->flashdata('alert');

        $data['phone_no']         		=$this->session->userdata('phone_no');
		$data['user_id']         		=$this->session->userdata('user_id');
		$data['user_name']         		=$this->session->userdata('user_name');
        $data['email']                  =$this->session->userdata('email');
        $data['user_status']            =$this->session->userdata('user_status');
        $data['store_owner_id']         =$this->session->userdata('store_owner_id');


        $data['type']                   ='branch';

        $data['dis_branch_id']               =$branch_id;

        $data['content']	            ='view_sale_rep';
		$this->load->view($this->layout, $data);
    }

    /*Customer*/
 

    public function view_my_customer(){
        $data['alert']			        =$this->session->flashdata('alert');

        $data['phone_no']         		=$this->session->userdata('phone_no');
		$data['user_id']         		=$this->session->userdata('user_id');
		$data['user_name']         		=$this->session->userdata('user_name');
        $data['email']                  =$this->session->userdata('email');
        $data['user_status']            =$this->session->userdata('user_status');
        $data['store_owner_id']         =$this->session->userdata('store_owner_id');

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
        $data['alert']			        =$this->session->flashdata('alert');

        $data['phone_no']         		=$this->session->userdata('phone_no');
		$data['user_id']         		=$this->session->userdata('user_id');
		$data['user_name']         		=$this->session->userdata('user_name');
        $data['email']                  =$this->session->userdata('email');
        $data['user_status']            =$this->session->userdata('user_status');
        $data['store_owner_id']         =$this->session->userdata('store_owner_id');


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

    /*View My Supplier*/

    public function view_my_supplier(){
         
        $data['alert']			        =$this->session->flashdata('alert');

        $data['phone_no']         		=$this->session->userdata('phone_no');
		$data['user_id']         		=$this->session->userdata('user_id');
		$data['user_name']         		=$this->session->userdata('user_name');
        $data['email']                  =$this->session->userdata('email');
        $data['user_status']            =$this->session->userdata('user_status');
        $data['store_owner_id']         =$this->session->userdata('store_owner_id');

        $data['content']    ='view_my_supplier';

        
        $this->load->view($this->layout, $data); 
    }



    public function view_my_supplier_ajax($offset=null)
	{
		$search = array(
			'keyword' => trim($this->input->post('search_key')),
            'sort_by'  => $this->input->post('sortBy'),
		);

		
		$this->load->library('pagination');
		
		$limit = 100;
		$offset = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		
		$config['base_url'] = site_url('Office/view_my_supplier_ajax/');
		$config['total_rows'] = $this->Action->count_supplier($search);
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

		$data['get_info'] = $this->Action->get_my_supplier($search, $limit, $offset);
	
		$data['pagelinks'] = $this->pagination->create_links();
		
		$this->load->view('my_supplier_ajax', $data);
	}

    public function delete_supplier($id){
        $action    =$this->Action->delete_supplier($id);
        if($action){
            echo 'ok';
        }else{
            echo 'err';
        }
    }

    public function filter_supplier($type =NULL,$store_id =NULL){
        $data['alert']			        =$this->session->flashdata('alert');

        $data['phone_no']         		=$this->session->userdata('phone_no');
		$data['user_id']         		=$this->session->userdata('user_id');
		$data['user_name']         		=$this->session->userdata('user_name');
        $data['email']                  =$this->session->userdata('email');
        $data['user_status']            =$this->session->userdata('user_status');
        $data['store_owner_id']         =$this->session->userdata('store_owner_id');

        $data['content']    ='filter_supplier';

        $data['dis_store_id']   =$store_id;
        $data['type']           =$type;
        $this->load->view($this->layout, $data); 
    }

    public function filter_supplier_ajax($offset=null)
	{
		$search = array(
			'keyword' => trim($this->input->post('search_key')),
            'sort_by'  => $this->input->post('sortBy'),
		);

        $store_id   = $this->input->post('store_id');
        $type       = $this->input->post('type');
		
		$this->load->library('pagination');
		
		$limit = 100;
		$offset = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		
		$config['base_url'] = site_url('Office/filter_supplier_ajax/');
		$config['total_rows'] = $this->Action->count_filter_supplier($search, $store_id, $type);
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

		$data['get_info'] = $this->Action->get_filter_supplier($search, $store_id, $type, $limit, $offset);
	
		$data['pagelinks'] = $this->pagination->create_links();
		
		$this->load->view('filter_supplier_ajax', $data);
	}

    public function create_supplier(){
        $store_id               =$this->input->post('store_id');
        $branch_id              =$this->input->post('branch_name');
        $name                   =$this->input->post('name');
        $email                  =$this->input->post('email');
        $phone                  =$this->input->post('phone');

        $action    =$this->Action->create_supplier($store_id,$branch_id,$name,$email,$phone);
        if($action){
            echo 'ok';
        }else{
            echo 'err';
        }

    }


    /*View My Category*/
    public function view_my_category(){
         
        $data['alert']			        =$this->session->flashdata('alert');

        $data['phone_no']         		=$this->session->userdata('phone_no');
		$data['user_id']         		=$this->session->userdata('user_id');
		$data['user_name']         		=$this->session->userdata('user_name');
        $data['email']                  =$this->session->userdata('email');
        $data['user_status']            =$this->session->userdata('user_status');
        $data['store_owner_id']         =$this->session->userdata('store_owner_id');

        $data['content']    ='view_my_category';

        
        $this->load->view($this->layout, $data); 
    }

    public function create_category(){
        $store_id               =$this->input->post('store_id');
        $branch_id              =$this->input->post('branch_name');
        $name                   =$this->input->post('name');

        $action    =$this->Action->create_category($store_id,$branch_id,$name);
        if($action){
            echo 'ok';
        }else{
            echo 'err';
        }

    }

    public function create_sub_category(){
        $store_id               =$this->input->post('store_id');
        $branch_id              =$this->input->post('branch_id');
        $cat_id                   =$this->input->post('cat_id');
        $name                   =$this->input->post('name');
        $action    =$this->Action->create_sub_category($store_id,$branch_id,$name,$cat_id);
        if($action){
            echo 'ok';
        }else{
            echo 'err';
        }

    }

    public function delete_category($id){
        $action    =$this->Action->delete_category($id);
        if($action){
            echo 'ok';
        }else{
            echo 'err';
        }
    }

    public function delete_sub_category($id){
        $action    =$this->Action->delete_sub_category($id);
        if($action){
            echo 'ok';
        }else{
            echo 'err';
        }
    }




    /*Stock Product*/
    public function add_stock(){
        $data['alert']			        =$this->session->flashdata('alert');

        $data['phone_no']         		=$this->session->userdata('phone_no');
		$data['user_id']         		=$this->session->userdata('user_id');
		$data['user_name']         		=$this->session->userdata('user_name');
        $data['email']                  =$this->session->userdata('email');
        $data['user_status']            =$this->session->userdata('user_status');
        $data['store_owner_id']         =$this->session->userdata('store_owner_id');


        $data['type']                   ='default';

        $data['content']	            ='add_stock';
		$this->load->view($this->layout_2, $data);
    }


    public function create_product(){
        if(isset($_FILES["file"]["name"]))  {  

            $user_id        		=$this->session->userdata('user_id');
            $user_name         		=$this->session->userdata('user_name');
            
            $store_id       	=$this->input->post('store_id');
            $branch_id      	=$this->input->post('branch_id');

            $prod_name              =$this->input->post('prod_name');
            $prod_size              =$this->input->post('prod_size');
            $prod_bunk              =$this->input->post('prod_bunk');
            $prod_cat               =$this->input->post('prod_cat');
            $prod_sub_cat               =$this->input->post('prod_sub_cat');
            $prod_color               =$this->input->post('prod_color');
            $prod_sup                =$this->input->post('prod_sup');
            // $prod_brand                =$this->input->post('prod_brand');
            $prod_desc                =$this->input->post('prod_desc');
            $prod_cost                =$this->input->post('prod_cost');
            $prod_price                =$this->input->post('prod_price');
            $prod_whole                =$this->input->post('prod_whole');
            $prod_weight                =$this->input->post('prod_weight');
            $prod_discount                =$this->input->post('prod_discount');
            // $prod_image                =$this->input->post('prod_image');
            $metal_title                =$this->input->post('metal_title');
            $metal_key                =$this->input->post('metal_key');
            $metal_desc                =$this->input->post('metal_desc');

            
            // $store_id       ='101';
            $store_name         =$this->Action->get_store_name_by_store_id($store_id);
            $store_name_2       =$this->Action->get_store_name_2_by_store_id($store_id);
            //$branch_id      ='9';
            $branch_name    =$this->Action->get_branch_name_by_branch_id($branch_id);
            $store_owner_id     = $this->Action->get_store_owner_id_by_store_id($store_id);


            $prod_name  = preg_replace("/\s+/", "_", $prod_name);
            $prod_name  = preg_replace('/[^A-Za-z0-9\_]/', '', $prod_name);

           
            
            @mkdir('store_img');
            @mkdir('store_img/'.$store_name_2);
            @mkdir('store_img/'.$store_name_2.'/product');
            // @mkdir('store_img/'.$store_name_2.'/images');

			$config['upload_path'] = './store_img/'.$store_name_2.'/product';
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
                
                
                // echo $img_file_name.br().$store_id.br().$store_name.br().$branch_id.br().$branch_name.br().$store_owner_id.br().$prod_name.br().$prod_size.br().$prod_bunk.br().$prod_cat.br().$prod_sub_cat.br().$prod_color.br().$prod_sup.br().$prod_brand.br().$prod_desc.br().$prod_cost.br().$prod_price.br().
                // $prod_whole.br().$prod_weight.br().$prod_discount.br().$metal_title.br().$metal_key.br().$metal_desc;
               

                $result =   $this->Action->create_product($img_file_name,$store_id,$store_name,$branch_id,$branch_name,$store_owner_id,$prod_name,$prod_size,$prod_bunk,$prod_cat,$prod_sub_cat,$prod_color,$prod_sup/*,$prod_brand*/,$prod_desc,$prod_cost,$prod_price,
                $prod_whole,$prod_weight,$prod_discount,$metal_title,$metal_key,$metal_desc);

                if($result == TRUE){
                echo 'ok';
                }else{
                echo 'err';
                }
            }  
        }
    }

    public function get_store_supplier(){
		$branch_id	=$this->input->post('branch_id');
		$get_sub_cat_name	=$this->Action->get_store_supplier_by_branch_store_id($branch_id);
		if(is_array($get_sub_cat_name)){
			foreach($get_sub_cat_name as $row){
				$supplier_id	    =$row['id'];
				$supplier_name	    =$row['name'];
				echo '<option value="'.$supplier_id.'">'.$supplier_name.'</option>';
			}
		}else{
            echo '<option>This store does not have a Supplier Yet!</option>';
        }
	}

    public function get_product_category(){
		$store_id	=$this->input->post('store_id');
		$branch_id	=$this->input->post('branch_id');
		$get_sub_cat_name	=$this->Action->get_product_category_by_store_N_branch_store_id($store_id,$branch_id);
		if(is_array($get_sub_cat_name)){
			foreach($get_sub_cat_name as $row){
				$cat_id    	    =$row['id'];
				$cat_name	    =$row['cat_name'];
				echo '<option value="'.$cat_id.'">'.$cat_name.'</option>';
			}
		}else{
            echo '<option>This store does not have Product Category set yet!</option>';
        }
	}
    public function get_product_sub_category(){
		$cat_id	=$this->input->post('cat_id');

        $get_sub_cat_name	=$this->Action->get_product_sub_category_by_cat_id($cat_id);
		if(is_array($get_sub_cat_name)){
			foreach($get_sub_cat_name as $row){
				$sub_cat_id    	    =$row['id'];
				$sub_cat_name	    =$row['sub_cat_name'];
				echo '<option value="'.$cat_id.'">'.$sub_cat_name.'</option>';
			}
		}else{
            echo '<option>This store does not have Product Sub Category selected!</option>';
        }
	}


    public function view_product(){
         
        // Load the list page view 
        $data['alert']			        =$this->session->flashdata('alert');

        $data['phone_no']         		=$this->session->userdata('phone_no');
		$data['user_id']         		=$this->session->userdata('user_id');
		$data['user_name']         		=$this->session->userdata('user_name');
        $data['email']                  =$this->session->userdata('email');
        $data['store_id']               =$this->session->userdata('store_id');
        $data['store_name']             =$this->session->userdata('store_name');
        $data['branch_id']              =$this->session->userdata('branch_id');
        $data['store_owner_id']         =$this->session->userdata('store_owner_id');
        $data['user_status']            =$this->session->userdata('user_status');
        
        
        $data['content']    ='view_product';
        $this->load->view($this->layout, $data); 
    }



    public function view_product_ajax($offset=null)
	{
		$search = array(
			'keyword' => trim($this->input->post('search_key')),
            'sort_by'  => $this->input->post('sortBy'),
		);

		
		$this->load->library('pagination');
		
		$limit = 100;
		$offset = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		
		$config['base_url'] = site_url('Office/view_product_ajax/');
		$config['total_rows'] = $this->Action->count_products($search);
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

		$data['get_info'] = $this->Action->get_products($search, $limit, $offset);
	
		$data['pagelinks'] = $this->pagination->create_links();
		
		$this->load->view('view_product_ajax', $data);
	}

    public function delete_product($id){
        $action    =$this->Action->delete_product($id);
        if($action){
            echo 'ok';
        }else{
            echo 'err';
        }
    }

    public function filter_product($type =NULL,$store_id =NULL){
         
        // Load the list page view 
        $data['alert']			        =$this->session->flashdata('alert');

        $data['phone_no']         		=$this->session->userdata('phone_no');
		$data['user_id']         		=$this->session->userdata('user_id');
		$data['user_name']         		=$this->session->userdata('user_name');
        $data['email']                  =$this->session->userdata('email');
        $data['store_id']               =$this->session->userdata('store_id');
        $data['store_name']             =$this->session->userdata('store_name');
        $data['branch_id']              =$this->session->userdata('branch_id');
        $data['store_owner_id']         =$this->session->userdata('store_owner_id');
        $data['user_status']            =$this->session->userdata('user_status');
        $data['content']    ='filter_product';

        $data['dis_store_id']   =$store_id;
        $data['type']           =$type;
        $this->load->view($this->layout, $data); 
    }

    public function filter_product_ajax($offset=null)
	{
		$search = array(
			'keyword' => trim($this->input->post('search_key')),
            'sort_by'  => $this->input->post('sortBy'),
		);

        $store_id   = $this->input->post('store_id');
        $type       = $this->input->post('type');
		
		$this->load->library('pagination');
		
		$limit = 100;
		$offset = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		
		$config['base_url'] = site_url('Office/filter_product_ajax/');
		$config['total_rows'] = $this->Action->count_filter_product($search, $store_id, $type);
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

		$data['get_info'] = $this->Action->get_filter_product($search, $store_id, $type, $limit, $offset);
	
		$data['pagelinks'] = $this->pagination->create_links();
		
		$this->load->view('filter_product_ajax', $data);
	}

}
