<?php
class Login_user extends My_Model{
	public function __construct(){
		parent::__construct();
	}
	public function login_user($u_name,$pass){

			$query	=$this->db->get_where('login_tbl',array(
														'email'=>$u_name,
														'password'=>md5($pass))
														);
            if($query->num_rows() == 1){
                $row	=$query->row();
                
                $id		        	=$row->id;
                $email				=$row->email;
                $user_status        =$row->user_status;

				if($user_status == 'store_owner'){
					$query	=$this->db->get_where('store_owner',array('email'=>$email));
					if($query->num_rows() == 1){
						$row	=$query->row();

						$user_id        			=$row->id;
						$user_name 					=$row->user_name;
						$email 						=$row->email;
						$phone_no					=$row->phone;
						$full_name					=$row->full_name;



						$data4= array(
						'phone_no'			=>$phone_no,
						'user_id'			=>$user_id,
						'user_name'			=>$user_name,
						'email'				=>$email,
						'full_name'			=>$full_name,
						'user_status'		=>'store_owner',
						'validation'		=>TRUE,
						'last_login_timestamp' 	=> time(),


						);
						$this->session->set_userdata($data4);
						return	$data4;
					}else{
						return 	FALSE;
					}

				}else if($user_status =='manager'){

					$query	=$this->db->get_where('supervisor',array('email'=>$email));
						if($query->num_rows() == 1){
							$row	=$query->row();

							$user_id        			=$row->id;
							$store_owner_id 			=$row->store_owner_id;
							$store_id       			=$row->store_id;
							$store_name					=$row->store_name;
							$branch_store_id 			=$row->branch_store_id;
							$user_name 					=$row->name;
							$email 						=$row->email;
							$phone_no					=$row->phone_no;



							$data4= array(
							'phone_no'			=>$phone_no,
							'user_id'			=>$user_id,
							'user_name'			=>$user_name,
							'email'				=>$email,
							'store_id'			=>$store_id,
							'store_name'		=>$store_name,
							'branch_id'			=>$branch_store_id,
							'store_owner_id'	=>$store_owner_id,
							'user_status'		=>'manager',
							'validation'		=>TRUE,
							'last_login_timestamp' 	=> time(),


							);
							$this->session->set_userdata($data4);
							return	$data4;
						}else{
							return 	FALSE;
						}
				}else if($user_status =='sales_rep'){
					
					$query	=$this->db->get_where('sales_rep',array('email'=>$email));
					if($query->num_rows() == 1){
						$row	=$query->row();

						$user_id        			=$row->id;
						$store_owner_id 			=$row->store_owner_id;
						$store_id       			=$row->store_id;
						$store_name					=$row->store_name;
						$branch_store_id 			=$row->branch_store_id;
						$user_name 					=$row->name;
						$email 						=$row->email;
						$phone_no					=$row->phone_no;



						$data4= array(
						'phone_no'			=>$phone_no,
						'user_id'			=>$user_id,
						'user_name'			=>$user_name,
						'email'				=>$email,
						'store_id'			=>$store_id,
						'store_name'		=>$store_name,
						'branch_id'			=>$branch_store_id,
						'store_owner_id'	=>$store_owner_id,
						'user_status'		=>'sales_rep',
						'validation'		=>TRUE,
						'last_login_timestamp' 	=> time(),


						);
						$this->session->set_userdata($data4);
						return	$data4;
					}else{
						return 	FALSE;
					}
				}
            }else{
                return 	FALSE;
            }
	}
	public function login_manager($u_name,$pass){

		$query	=$this->db->get_where('supervisor',array(
													'email'=>$u_name,
													'password'=>md5($pass))
													);
		if($query->num_rows() == 1){
			$row	=$query->row();
			
			$user_id        			=$row->id;
			$store_owner_id 			=$row->store_owner_id;
			$store_id       			=$row->store_id;
			$store_name					=$row->store_name;
			$branch_store_id 			=$row->branch_store_id;
			$user_name 					=$row->name;
			$email 						=$row->email;
			$phone_no					=$row->phone_no;
			
			
			
			$data4= array(
				'phone_no'			=>$phone_no,
				'user_id'			=>$user_id,
				'user_name'			=>$user_name,
				'email'				=>$email,
				'store_id'			=>$store_id,
				'store_name'		=>$store_name,
				'branch_id'			=>$branch_store_id,
				'store_owner_id'	=>$store_owner_id,
				'user_status'		=>'manager',
				'validation'		=>TRUE,
				'last_login_timestamp' 	=> time(),
				
				
			);
			$this->session->set_userdata($data4);
			return	$data4;
		}else{
			return 	FALSE;
		}
	}

	public function login_sales_rep($u_name,$pass){

		$query	=$this->db->get_where('sales_rep',array(
													'email'=>$u_name,
													'password'=>md5($pass))
													);
		if($query->num_rows() == 1){
			$row	=$query->row();
			
			$user_id        			=$row->id;
			$store_owner_id 			=$row->store_owner_id;
			$store_id       			=$row->store_id;
			$store_name					=$row->store_name;
			$branch_store_id 			=$row->branch_store_id;
			$user_name 					=$row->name;
			$email 						=$row->email;
			$phone_no					=$row->phone_no;
			
			
			
			$data4= array(
				'phone_no'			=>$phone_no,
				'user_id'			=>$user_id,
				'user_name'			=>$user_name,
				'email'				=>$email,
				'store_id'			=>$store_id,
				'store_name'		=>$store_name,
				'branch_id'			=>$branch_store_id,
				'store_owner_id'	=>$store_owner_id,
				'user_status'		=>'sales_rep',
				'validation'		=>TRUE,
				'last_login_timestamp' 	=> time(),
				
				
			);
			$this->session->set_userdata($data4);
			return	$data4;
		}else{
			return 	FALSE;
		}
	}

	public function login_owner($u_name,$pass){

		$query	=$this->db->get_where('store_owner',array(
													'email'=>$u_name,
													'password'=>md5($pass))
													);
		if($query->num_rows() == 1){
			$row	=$query->row();
			
			$user_id        			=$row->id;
			$user_name 					=$row->user_name;
			$email 						=$row->email;
			$phone_no					=$row->phone;
			$full_name					=$row->full_name;
			
			
			
			$data4= array(
				'phone_no'			=>$phone_no,
				'user_id'			=>$user_id,
				'user_name'			=>$user_name,
				'email'				=>$email,
				'full_name'			=>$full_name,
				'user_status'		=>'store_owner',
				'validation'		=>TRUE,
				'last_login_timestamp' 	=> time(),
				
				
			);
			$this->session->set_userdata($data4);
			return	$data4;
		}else{
			return 	FALSE;
		}
	}

	public function login_admin($u_name,$pass){
			$this->db->where('user_name',$u_name);
			$this->db->where('password',md5($pass));
		
			$query	=$this->db->get('admin');
            if($query->num_rows() == 1){
                $row	=$query->row();
                
                $user_id        	=$row->id;
                $user_name	        =$row->user_name;
				$email				=$row->email;
				
                $data4=array(
                	'user_id'=>$user_id,
					'email'	=>$email,
                	'user_name'=>$user_name,
					'user_status'=>'admin',
                	'validation'=>TRUE,
					'admin_status'=>TRUE,
					'last_login_timestamp' 	=> time(),
				);
                $this->session->set_userdata($data4);
                return	$data4;
            }else{
                return 	FALSE;
            }
	}
	public function re_update($ip_address,$user_agent){
		$this->db->where('ip_address',$ip_address);
		$this->db->where('browser',$user_agent);
		$data2	=array('login_status'=>'offline');
		$this->db->set($data2);
		$this->db->update('user_detail');
		if($this->db->affected_rows() > 0){
			return TRUE;
		}else{
			return FALSE;
		}
	}
	public function email_to_all_detail($email){
		$query	=$this->db->get_where('user_detail',array('email'=>$email));
		if($query->num_rows() > 0){
			return $query->result_array();
		}else{
			return FALSE;
		}
	}
    public function email_to_user_name($email){
		$query	=$this->db->get_where('user_detail',array('email'=>$email));
		if($query->num_rows() > 0){
            foreach($query->result_array() as $row){
                return $row['user_name'];
            }
		}else{
			return FALSE;
		}
	}
    public function request_password($email){
        /*==============set request Password on ==========*/
        $user_name      =$this->email_to_user_name($email);
        $data           =array('user_name'=>$user_name,'request_password'=>'Yes');
        $this->db->set($data);
        $this->db->insert('request_passord');
        /*==============End set request Password on ==========*/
    }
    public function reset_request_password($email){
        /*==============set request Password off by deleting it ==========*/
        $user_name      =$this->email_to_user_name($email);
        $this->db->where('user_name',$user_name);
        $this->db->delete('request_passord');
        /*==============End set request Password on ==========*/
    }
    public function getRestPassword_Permission($user_name){
		$query	=$this->db->get_where('request_passord',array('user_name'=>$user_name,'request_password'=>'Yes'));
		if($query->num_rows() > 0){
			return $query->result_array();
		}else{
			return FALSE;
		}
	}
    public function confirm_reset_password($password,$user_name){
        $data	=array('password'=>md5($password));
		$this->db->set($data);
        $this->db->where('user_name',$user_name);
		$this->db->update('user_detail');
		if($this->db->affected_rows() > 0){
            $this->db->where('user_name',$user_name);
		    $this->db->delete('request_passord');
			return TRUE;
		}else{
			return FALSE;
		}
    }
    public function check_if_email_exist_request_password_tbl($email){
        $user_name      =$this->email_to_user_name($email);
        $this->db->where('user_name',$user_name);
        $this->db->get('request_passord');
        if($this->db->affected_rows() > 0){
            return TRUE;
        }else{
            return FALSE;
        }
    }


	public function register($user_name,$pass,$email,$phone,$full_name){
		$data  			=array('user_name'=>$user_name,'password'=>md5($pass),'email'=>$email,'phone'=>$phone,'full_name'=>$full_name);
		$this->db->set($data);
		$this->db->insert('store_owner');
		if($this->db->affected_rows() > 0){

			$data			=array('email'=>$email,'password'=>md5($pass),'user_status'=>'store_owner');
			$this->db->set($data);
			$this->db->insert('login_tbl');
			return true;
		}
		return false;
	}

	public function check_if_user_exist_in_login_tbl($email){
		$this->db->where('email',$email);
		$this->db->get('login_tbl');
		if($this->db->affected_rows() > 0){
			return true;
		}
		return false;
	}
}
