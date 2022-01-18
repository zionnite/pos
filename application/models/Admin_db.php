<?php
class Admin_db extends My_Model{
    public function __construct(){
        parent::__construct();
    }
    

    public function get_public_live_key(){
        $query	=$this->db->get('payment_method');
		if($query->num_rows() > 0){
			foreach($query->result_array() as $row){
                return $row['public_live_key'];
            }
		}else{
			return FALSE;
		}
    }
    
    public function get_private_live_key(){
        $query	=$this->db->get('payment_method');
		if($query->num_rows() > 0){
			foreach($query->result_array() as $row){
                return $row['private_live_key'];
            }
		}else{
			return FALSE;
		}
    }
    public function select_plan($v_id,$v_plan_id,$v_name,$v_phone,$v_email,$v_amount,$p_tx_ref,$p_trans_id){
        $data   =array('user_id'=>$v_id,
                       'plan_id'=>$v_plan_id,
                       'status'=>'active',
                       'time'=>time(),
                       'date_created'=>date('Y-m-d H:i:sa'),
                       'ref'=>$p_tx_ref,
                       'trans_id'=>$p_trans_id,
                       'amount'=>$v_amount,
                      );
        $this->db->set($data);
        $this->db->insert('my_plan');
        if($this->db->affected_rows() > 0){

            return true;
        }
        return false;
    }

    public function update_site_setting($img_file_name,$name,$phone,$email){
        $this->db->empty_table('site_setting'); 
        
		$data		=array('site_name'=>$name,
						   'site_email'=>$email,
						   'site_phone'=>$phone,
						   'site_logo'=>$img_file_name,
						   
						);


		$this->db->set($data);
		$this->db->insert('site_setting');
		if($this->db->affected_rows() > 0){
			return true;
		}
		return false;
	}

    public function update_payment_api($private,$public){
        $this->db->empty_table('payment_method'); 

		$data		=array('private_live_key'=>$private,
						   'public_live_key'=>$public,
						);


		$this->db->set($data);
		$this->db->insert('payment_method');
		if($this->db->affected_rows() > 0){
			return true;
		}
		return false;
	}

    public function get_site_logo(){
        $query      =$this->db->get('site_setting');
        if($query->num_rows() > 0){
            foreach($query->result_array() as $row){
                return $row['site_logo'];
            }
        }
        return false;
    }

    public function get_site_name(){
        $query      =$this->db->get('site_setting');
        if($query->num_rows() > 0){
            foreach($query->result_array() as $row){
                return $row['site_name'];
            }
        }
        return false;
    }

    public function get_site_phone(){
        $query      =$this->db->get('site_setting');
        if($query->num_rows() > 0){
            foreach($query->result_array() as $row){
                return $row['site_phone'];
            }
        }
        return false;
    }

    public function get_site_email(){
        $query      =$this->db->get('site_setting');
        if($query->num_rows() > 0){
            foreach($query->result_array() as $row){
                return $row['site_email'];
            }
        }
        return false;
    }

    public function change_password($old,$new){
        $user_name         		=$this->session->userdata('user_name');
        $user_status            =$this->session->userdata('user_status');
        $email                  =$this->session->userdata('email');

        $old_checker    =$this->Check_if_password_match($old);
        if($old_checker){
           

            if($user_status =='admin'){
                $data =array('password' => md5($new));
                $this->db->set($data);
                $this->db->where('user_name',$user_name);
                $this->db->update('admin');
                if($this->db->affected_rows() > 0){
                    return 'ok';
                }else{
                    return  'Could not perform operation, please try again later';
                }
                

            }else if($user_status =='store_owner'){

                $data =array('password' => md5($new));
                $this->db->set($data);
                $this->db->where('email',$email);
                $this->db->update('store_owner');
                if($this->db->affected_rows() > 0){
                    return 'ok';
                }else{
                    return 'Could not perform operation, please try again later';
                }
                
            }else if($user_status =='manager'){

                $data =array('password' => md5($new));
                $this->db->set($data);
                $this->db->where('email',$email);
                $this->db->update('supervisor');
                if($this->db->affected_rows() > 0){
                    return 'ok';
                }else{
                    return 'Could not perform operation, please try again later';
                }
                
    
            }else if($user_status =='sales_rep'){

                $data =array('password' => md5($new));
                $this->db->set($data);
                $this->db->where('email',$email);
                $this->db->update('sales_rep');
                if($this->db->affected_rows() > 0){
                    return 'ok';
                }else{
                    return 'Could not perform operation, please try again later';
                }
                

            }
        }else{
            return 'Your Old Password is incorrect';
        }
    }


    public function Check_if_password_match($old){
        $user_name         		=$this->session->userdata('user_name');
        $user_status            =$this->session->userdata('user_status');
        $email                  =$this->session->userdata('email');

		if($user_status =='admin'){
            $this->db->where('user_name',$user_name);
            $this->db->where('password',md5($old));
            $this->db->get('admin');
            if($this->db->affected_rows() > 0){
                return true;
            }
            return false;
		}else if($user_status =='store_owner'){
            $this->db->where('email',$email);
            $this->db->where('password',md5($old));
            $this->db->get('store_owner');
            if($this->db->affected_rows() > 0){
                return true;
            }
            return false;
		}else if($user_status =='manager'){
            $this->db->where('email',$email);
            $this->db->where('password',md5($old));
            $this->db->get('supervisor');
            if($this->db->affected_rows() > 0){
                return true;
            }
            return false;
		}else if($user_status =='sales_rep'){
			$this->db->where('email',$email);
            $this->db->where('password',md5($old));
            $this->db->get('sales_rep');
            if($this->db->affected_rows() > 0){
                return true;
            }
            return false;
		}
    }


    public function get_plan_name($plan_id){
        $this->db->where('id',$plan_id);
        $query      =$this->db->get('plan');
        if($query->num_rows() > 0){
            foreach($query->result_array() as $row){
                return $row['title'];
            }
        }
        return false;
    }

    public function get_plan_num_store($plan_id){
        $this->db->where('id',$plan_id);
        $query      =$this->db->get('plan');
        if($query->num_rows() > 0){
            foreach($query->result_array() as $row){
                return $row['store_num'];
            }
        }
        return false;
    }

    public function get_plan_amount($plan_id){
        $this->db->where('id',$plan_id);
        $query      =$this->db->get('plan');
        if($query->num_rows() > 0){
            foreach($query->result_array() as $row){
                return $row['amount'];
            }
        }
        return false;
    }

    public function update_plan($plan_name,$num_store,$amount,$plan_id){
        $data       =array('title'=>$plan_name,'store_num'=>$num_store,'amount'=>$amount);
        $this->db->set($data);
        $this->db->where('id',$plan_id);
        $this->db->update('plan');
        if($this->db->affected_rows() > 0){
            return true;
        }
        return false;
    }
}