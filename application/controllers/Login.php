<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends My_Controller {
    private $u_name;
    private $pass;
	public function __construct(){
		parent::__construct();
	}

	public function index(){
		$data['alert']			=$this->session->flashdata('alert');
		$data['content']	='auth/login';
		$this->load->view($this->auth_master,$data);
	}

    public function login_user(){
		if($this->input->post('login')){	
			$this->form_validation->set_rules('email','Email','required');
			$this->form_validation->set_rules('password','Password','required');
		
			$this->u_name	=$this->input->post('email');
			$this->pass		=$this->input->post('password');
		
			if($this->form_validation->run() == FALSE){
				$data['alert']	='<div class="alert alert-danger" role="alert">Email Or Password not Filled</div>';
				$this->session->set_flashdata('alert',$data['alert']);
                redirect('Login');
			}else{
				$login	=$this->Login_user->login_user($this->u_name,$this->pass);
					if($login	== FALSE){	
						$data['alert']	='<div class="alert alert-danger" role="alert">Invalid Login Input,Use Sign Up button to register Or Click Forget Password</div>';
						$this->session->set_flashdata('alert',$data['alert']);
                        redirect('Login');
					}else{
						/*retrieve Session data*/
						$data['phone_no']         		=$this->session->userdata('phone_no');
						$data['user_id']         		=$this->session->userdata('user_id');
						$data['user_name']         		=$this->session->userdata('user_name');
                        $data['email']                  =$this->session->userdata('email');
                        $data['store_id']               =$this->session->userdata('store_id');
                        $data['store_name']             =$this->session->userdata('store_name');
                        $data['branch_id']              =$this->session->userdata('branch_id');
                        $data['store_owner_id']         =$this->session->userdata('store_owner_id');
                        $data['user_status']            =$this->session->userdata('user_status');
						

						$data['alert']	='<div class="alert alert-success" role="alert">Welcome Again</div>';
						$this->session->set_flashdata('alert',$data['alert']);
						
						$last_activity_existed		=$this->Admin_db->check_if_user_exist_in_activity_tbl($data['email']);
						$last_activity_path			=$this->Admin_db->get_last_activity_path($data['email']);
						$last_activity_type			=$this->Admin_db->get_last_activity_type($data['email']);

						$site_email					=$this->Admin_db->get_site_email();
						if($this->Login_user->check_if_store_is_suspended($data['store_id'])){
							

							if($data['user_status']	=='store_owner'){
								$data['alert']	='<div class="alert alert-success" role="alert">';
								$data['alert']	.='One of Your Store is place under suspension,please check with the Store Admin by contacting the official email to resolve this';
								$data['alert']	.='<div><br />Offcial Email : <b style="color:red;">'.$site_email.'</b></div>';
								$data['alert']	.='</div>';
								$this->session->set_flashdata('main_alert',$data['alert']);
								redirect('Store_Owner');

							}else if($data['user_status']	=='manager'){
								$data['alert']	='<div class="alert alert-warning" role="alert">The Store you are set to manage have some complication, please contact Store-Owner to help fix it.</div>';
								$this->session->set_flashdata('alert',$data['alert']);
								redirect('Login');

							}else if($data['user_status']	=='sales_rep'){
								$data['alert']	='<div class="alert alert-warning" role="alert">Your account have some complication, please contact your manager to help fix it</div>';
								$this->session->set_flashdata('alert',$data['alert']);
								redirect('Login');
							}
							
						}else{

							if($last_activity_existed){
								if($last_activity_type =='inactivity'){
									redirect($last_activity_path);
								}else{
									if($data['user_status']	=='store_owner'){
										redirect('Store_Owner');
									}else if($data['user_status']	=='manager'){
										redirect('Manager');
									}else if($data['user_status']	=='sales_rep'){
										redirect('Pos');
									}else if($data['user_status']	=='admin'){
										redirect('Dashboard');
									}
								}
							}else{
								if($data['user_status']	=='store_owner'){
									redirect('Store_Owner');
								}else if($data['user_status']	=='manager'){
									redirect('Manager');
								}else if($data['user_status']	=='sales_rep'){
									redirect('Pos');
								}else if($data['user_status']	=='admin'){
									redirect('Dashboard');
								}
							}
						}

						
						
                        
					}
			}
		}else{
			$data['alert']	='<div class="alert alert-danger" role="alert">Please Use the button to login</div>';
			$this->session->set_flashdata('alert',$data['alert']);
            redirect('Login');
		}
		
	}


	public function forgot_password(){
		$data['alert']			=$this->session->flashdata('alert');
		$data['content']	='auth/forgot_password';
		$this->load->view($this->auth_master,$data);
	}

	public function reset_password(){
		if($this->input->post('login')){	
			$this->form_validation->set_rules('email','Email','required');
		      
			$email	=$this->input->post('email');
		
			if($this->form_validation->run() == FALSE){
				$data['alert']	='<div class="alert alert-danger" role="alert">Email Address not Entered</div>';
				$this->session->set_flashdata('alert',$data['alert']);
                redirect('Login/forgot_password');
			}else{
				
                if($this->Login_user->check_if_email_exist_request_password_tbl($email) == FALSE){
					$user_status	=$this->Login_user->get_user_status($email);

					if($user_status !=false){

					
						$user_id 		=$this->Login_user->get_user_id($email,$user_status);
						$user_name 		=$this->Login_user->get_user_name($email,$user_status);

						$current_domain 		= $_SERVER['SERVER_NAME'];
						$encode_email			= urldecode($email);
						$link           		= $current_domain.'/Login/confirm_reset_password/'.$user_id.'/'.$encode_email;
								
						/*==========================SEND EMAIL TO RESET PASSWORD==================*/
						$message    ='Hello, '.$user_name.' You Requested to reset your Password, Click the Link or Copy it '.$link.'  if this is not you, please Kindly Ignore';

						$get_site_name      	=$this->Admin_db->get_site_name();
						$get_site_g_name        =$this->Admin_db->get_site_g_name();
						$get_site_g_pass        =$this->Admin_db->get_site_g_pass();

						$current_domain 		= $_SERVER['SERVER_NAME'];

						$subject    =$get_site_name.' | Confirm Password Reset';
						$to         =$email;

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

						$this->email->message($message);  

						if($this->email->send()){
							$data['alert']	='<div class="alert alert-success" role="alert">An Email has been Sent to '.$email.'</div>';
							$this->session->set_flashdata('alert',$data['alert']);
							$this->Login_user->request_password($email,$user_id);
							redirect('login/forgot_password');
						}else{
							$data['alert']	='<div class="alert alert-danger" role="alert">Email not Responding...</div>';
							$this->session->set_flashdata('alert',$data['alert']);
							$this->Login_user->request_password($email,$user_id);
							redirect('login/forgot_password');
						}
					}else{
						$data['alert']	='<div class="alert alert-danger" role="alert">User not found, make sure you are entering the correct email address</div>';
						$this->session->set_flashdata('alert',$data['alert']);
						redirect('Login/forgot_password');
					}
                }else{
                    $data['alert']	='<div class="alert alert-warning" role="alert">You Have already Requested for Password Reset</div>';
			        $this->session->set_flashdata('alert',$data['alert']);
                    redirect('Login/forgot_password');
                }
			}
		}else{
			$data['alert']	='<div class="alert alert-danger" role="alert">Please Use the button to login</div>';
			$this->session->set_flashdata('alert',$data['alert']);
            redirect('Login/forgot_password');
		}
		//redirect('welcome');
	}
    
    public function confirm_reset_password($user_id = NULL,$email=NULL){
		$email					=urldecode($email);
        $data['alert']			=$this->session->flashdata('alert');
		$data['content']		='auth/confirm_reset_password';
		$data['alert']		=	$this->session->flashdata('alert');
        $data['reset_password'] =$this->Login_user->getRestPassword_Permission($user_id,$email);
        if($data['reset_password'] != TRUE){
            $data['alert']	='<div class="alert alert-danger" role="alert">Oops! You did not request for password Reset</div>';
			$this->session->set_flashdata('alert',$data['alert']);
            redirect('Login/forgot_password');
        }

        $data['user_id']  		=$user_id;
		$data['email'] 			=$email;
		$data['user_status'] 	=$this->Login_user->get_user_status($email);
		$this->load->view($this->auth_master,$data);
	}
    public function confirm_reset_password2(){
		if($this->input->post('login')){	

			$this->form_validation->set_rules('pass','Password', array('required','min_length[5]','max_length[12]','alpha_numeric'));
			$this->form_validation->set_rules('repass','Confirm Password',
            array('required','matches[pass]','min_length[5]','max_length[12]','alpha_numeric'));
		      
			$pass	=$this->input->post('pass');
            $user_id      =$this->input->post('user_id');
			$email		  =$this->input->post('email');
			$user_status 	=$this->input->post('user_status');
		
			if($this->form_validation->run() == FALSE){
				$data['alert']	='<div class="alert alert-danger" role="alert">Both Field are Important<br /> Both Field MUst be Thesame</div>';
				$this->session->set_flashdata('alert',$data['alert']);
                redirect('Login/confirm_reset_password/'.$user_id);
			}else{
				$login	=$this->Login_user->confirm_reset_password($pass,$user_id,$email,$user_status);
					if($login	== FALSE){	
						$data['alert']	='<div class="alert alert-danger" role="alert">Sorry, Try Another Password Or come Back Late</div>';
						$this->session->set_flashdata('alert',$data['alert']);
                        redirect('Login/confirm_reset_password/'.$user_id);
					}else{

						
						$user_name 		=$this->Login_user->get_user_name($email,$user_status);
                        
                            /*==========================SEND EMAIL TO RESET PASSWORD==================*/

                        $message    ='Hello, '.$user_name.' You Password has been Reset successfully';

						$get_site_name      	=$this->Admin_db->get_site_name();
						$get_site_g_name        =$this->Admin_db->get_site_g_name();
						$get_site_g_pass        =$this->Admin_db->get_site_g_pass();

						$current_domain 		= $_SERVER['SERVER_NAME'];

                        $subject    =$get_site_name.' | Password Change';
                        $to         =$email;
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
                        $this->email->message($message);  

                        if($this->email->send()){
                            $data['alert']	='<div class="alert alert-success" role="alert">You Password has been Reset successfully</div>';
 				            $this->session->set_flashdata('alert',$data['alert']);

							 redirect('Login');
                        }else{
                            $data['alert']	='<div class="alert alert-danger" role="alert">You Password has been Reset successfully</div>';
				            $this->session->set_flashdata('alert',$data['alert']);

							redirect('Login');
                        }
					}
			}
		}else{
			$data['alert']	='<div class="alert alert-danger" role="alert">Please Use the button</div>';
			$this->session->set_flashdata('alert',$data['alert']);
            redirect('Login/confirm_reset_password/'.$user_id);
		}
		//redirect('welcome');
	}
    public function check_if_email_exist_request_password_tbl($email){
        $check      =$this->Login_user->check_if_email_exist_request_password_tbl($email);
        return $check;
    }
}
