<?php
class Login_user extends My_Model{
	public function __construct(){
		parent::__construct();
	}
	public function login_user($u_name,$pass){

			$query	=$this->db->get_where('user_detail',array(
														'phone_no'=>$u_name,
														'password'=>md5($pass))
														);
            if($query->num_rows() == 1){
                $row	=$query->row();
                
                $phone_no       	=$row->phone_no;
                $user_id        	=$row->user_id;
                $user_name	        =$row->user_name;
                $sex				=$row->sex;
                $age 				=$row->age;
                $ip_address			=$row->ip_address;
                $user_agent			=$row->browser;
                $email				=$row->email;
                $user_img			=$row->user_img;
                $online_status		=$row->online_status;
                $last_login_date	=$row->last_login_date;
                $date_register		=$row->date_register;
                $status         	=$row->status;
                $full_name			=$row->full_name;
				$ddress				=$row->address;
				$city				=$row->city;
				$country			=$row->country;
				$postal_code		=$row->postal_code;
                
				$data		=array('last_login_date'=>date('Y-m-d H:i:sa',now()),
						   'ip_address'=>$ip_address,'browser'=>$browser,'online_status'=>'online');
				$this->db->set($data);
				$this->db->where('user_id',$user_id);
				$this->db->update('user_detail');
				
                $data4=array(
                	'phone_no'=>$phone_no,
                	'user_id'=>$user_id,
                	'user_name'=>$user_name,
                	'user_img'=>$user_img,
                	'sex'=>$sex,
                	'age'=>$age,
                	'email'=>$email,
                	'ip_address'=>$ip_address,
                	'user_agent'=>$user_agent,
                	'full_name'=>$full_name,
                	'last_login_date'=>$last_login_date,
                	'date_register'=>$date_register,
                	'status'=>$status,
                	'validation'=>TRUE,
					'user_status'=>TRUE,
                	'online_status'=>'online',
					'address'=>$address,
					'city'=>$city,
					'country'=>$country,
					'postal_code'=>$postal_code
				);
                $this->session->set_userdata($data4);
                return	$data4;
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
				
				
			);
			$this->session->set_userdata($data4);
			return	$data4;
		}else{
			return 	FALSE;
		}
	}

	public function login_admin($u_name,$pass){
			$this->db->where('agent_phone_no',$u_name);
			$this->db->where('agent_pass',md5($pass));
			$this->db->or_where('agent_name',$u_name);
			$this->db->where('agent_pass',md5($pass));
		
			$query	=$this->db->get('agent');
            if($query->num_rows() == 1){
                $row	=$query->row();
                
                $phone_no       	=$row->agent_phone_no;
                $user_id        	=$row->agent_id;
                $user_name	        =$row->agent_name;
				$user_img			=$row->agent_image;
                $sex				=$row->agent_sex;
				$email				=$row->agent_email;
                $status         	=$row->agent_status;
                $full_name         	=$row->agent_full_name;
				
                $data4=array(
                	'phone_no'=>$phone_no,
                	'user_id'=>$user_id,
                	'user_name'=>$user_name,
                	'user_img'=>$user_img,
                	'sex'=>$sex,
                	'email'=>$email,
                	'full_name'=>$full_name,
                	'status'=>$status,
                	'validation'=>TRUE,
					'admin_status'=>TRUE
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
			return true;
		}
		return false;
	}
}
