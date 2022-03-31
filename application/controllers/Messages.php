<?php
class Messages extends My_Controller{
    public function __construct(){
        parent::__construct();
    }

    public function compose_mail($sender=NULL,$sub_email=NULL){
        $this->session_checker->auto_logout();
         
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
        
        $data['sub_email']              =urldecode($sub_email);
		$data['sender']					=$sender;
        
        $data['content']    ='compose_message';
        $this->load->view($this->layout, $data); 
    }
    

    public function send_message(){		

        $email                  =$this->input->post('email');
        $message                =$this->input->post('msg');
        $title                  =$this->input->post('title');
		$sender                 =$this->input->post('sender');
        

		$get_site_name      	=$this->Admin_db->get_site_name();
		$get_site_g_name        =$this->Admin_db->get_site_g_name();
		$get_site_g_pass        =$this->Admin_db->get_site_g_pass();

		$current_domain 		= $_SERVER['SERVER_NAME'];

		$subject    =$get_site_name.' | '.$title;
		$to         =$email;


		

		$data['title']			=$title;
		$data['message']		=$message;
		// $data['link']			=$link;
		// $data['link_title']		=$link_title;

		$this->load->library('email');
		$config =array(
			'protocol'=> 'ssmtp',
			'smtp_host'    => 'ssl://ssmtp.googlemail.com',
			'smtp_port'    => '465',
			'smtp_timeout' => '7',
			'smtp_user'    => $get_site_g_name,
			'smtp_pass'    => $get_site_g_pass,
			'charset'    => 'utf-8',
			'newline'    => "\r\n",
			'mailtype' => 'html', // or html
			'validation' => FALSE); // bool whether to validate email or not      

		$this->load->initialize($config);

		$this->email->from("no-reply@$current_domain", $get_site_name);
		$this->email->to($to); 


		$this->email->subject($subject);

		$body   =$this->load->view($this->layout_4,$data,TRUE);
		$this->email->message($body);  
        if(@$this->email->send()){
            echo 'ok';
        }else{
            echo   'err';
        }
	}



	public function compose_message($sender=NULL,$sub_email=NULL){
        $this->session_checker->auto_logout();
         
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
        
        $data['sub_email']              =urldecode($sub_email);
		$data['sender']					=$sender;
        
        $data['content']    ='compose_message';
        $this->load->view($this->layout, $data); 
    }
	
    public function send_msg(){		

        $email                  =urldecode($this->input->post('email'));
        $message                =$this->input->post('msg');
        $title                  =$this->input->post('title');
        $sender                 =urldecode($this->input->post('sender'));
        


        $insert         =$this->Admin_db->insert_message($sender,$email,$message,$title);

        if($insert){
            echo 'ok';
        }else{
            echo   'err';
        }
	}

    public function read_message(){
        $this->session_checker->auto_logout();
         
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
        


        $data['get_message']			=$this->Admin_db->get_my_messages($data['email']);
        
        $data['content']    ='read_message';
        $this->load->view($this->layout, $data); 
    }
    
    public function delete_msg($id=NULL){
        $action      =$this->Admin_db->delete_msg($id);
        if($action){
            echo 'ok';
        }else{
            echo 'err';
        }
    }
}