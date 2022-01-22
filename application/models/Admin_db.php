<?php
class Admin_db extends My_Model{
    public function __construct(){
        parent::__construct();
    }
    

    public function time_stamp($session_time) {
        $time_difference = time() - $session_time ;
        $seconds = $time_difference ;
        $minutes = round($time_difference / 60 );
        $hours = round($time_difference / 3600 );
        $days = round($time_difference / 86400 );
        $weeks = round($time_difference / 604800 );
        $months = round($time_difference / 2419200 );
        $years = round($time_difference / 29030400 );

        if($seconds <= 60){
            echo"$seconds seconds ago";
        }elseif($minutes <=60){
            if($minutes==1){
                echo"one minute ago";
            }else{
                echo"$minutes minutes ago";
            }
        }else if($hours <=24){
            if($hours==1){
                echo"one hour ago";
            }else{
                echo"$hours hours ago";
            }
        }else if($days <=7){
            if($days==1){
                echo"one day ago";
            }else{
                echo"$days days ago";
            }
        }else if($weeks <=4){
            if($weeks==1){
                echo"one week ago";
            }else{
                echo"$weeks weeks ago";
            }
        }else if($months <=12){
            if($months==1){
                echo"one month ago";
            }else{
                echo"$months months ago";
            }
        }else{
            if($years==1){
                echo"one year ago";
            }else{
                echo"$years years ago";
            }
        }
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

    public function update_user_activity($email,$status,$current_path,$type){
		$store_id           =$this->session->userdata('store_id');
		$branch_id          =$this->session->userdata('branch_id');


		($status =='store_owner') ? 
			$store_owner_id = $this->session->userdata('user_id') : 
			$store_owner_id  =$this->session->userdata('store_owner_id');


        if($status =='admin'){
            $data          =array(
                'email'=>$email,
                'user_status'=>$status,
                'path'=>$current_path,
                'type'=>$type,
                'time'=>time(),
                'date'=>date('Y-m-d H:i:sa'),
                'day' =>date('d'),
                'month'=>date('M'),
                'year'=>date('Y'),
            );
            $this->db->set($data);
        }
        else if($status == 'store_owner'){
            $data          =array(
                'email'=>$email,
                'user_status'=>$status,
                'path'=>$current_path,
                'type'=>$type,
                'time'=>time(),
                'date'=>date('Y-m-d H:i:sa'),
                'day' =>date('d'),
                'month'=>date('M'),
                'year'=>date('Y'),
                'store_owner_id'=>$store_owner_id,
            );
            $this->db->set($data);
        }else{
            $data          =array(
                'email'=>$email,
                'user_status'=>$status,
                'path'=>$current_path,
                'type'=>$type,
                'time'=>time(),
                'date'=>date('Y-m-d H:i:sa'),
                'day' =>date('d'),
                'month'=>date('M'),
                'year'=>date('Y'),
                'store_owner_id'=>$store_owner_id,
                'branch_id'     =>$branch_id,
                'store_id'      =>$store_id,
            );
            $this->db->set($data);
        }

        
        $this->db->insert('user_activity');
        if($this->db->affected_rows() > 0){
            return true;
        }
        return false;
    }

    public function check_if_user_exist_in_activity_tbl($email){
        $this->db->where('email',$email);
        $this->db->limit(1);
        $this->db->order_by('id','desc');
        $query      =$this->db->get('user_activity');
        if($query->num_rows() > 0){
            return true;
        }
        return false;
    }
    public function get_last_activity_path($email){
        $this->db->where('email',$email);
        $this->db->limit(1);
        $this->db->order_by('id','desc');
        $query      =$this->db->get('user_activity');
        if($query->num_rows() > 0){
            foreach($query->result_array() as $row){
                return $row['path'];
            }
        }
        return false;
    }

    public function get_last_activity_type($email){
        $this->db->where('email',$email);
        $this->db->limit(1);
        $this->db->order_by('id','desc');
        $query      =$this->db->get('user_activity');
        if($query->num_rows() > 0){
            foreach($query->result_array() as $row){
                return $row['type'];
            }
        }
        return false;
    }

    public function suspend_store($id){
        $data       =array('store_status'=>'suspend');
        $this->db->set($data);
        $this->db->where('id',$id);
        $this->db->update('office_store');
        if($this->db->affected_rows() > 0){
            return true;
        }
        return false;
    }
    public function unsuspend_store($id){
        $data       =array('store_status'=>'normal');
        $this->db->set($data);
        $this->db->where('id',$id);
        $this->db->update('office_store');
        if($this->db->affected_rows() > 0){
            return true;
        }
        return false;
    }


    public function calculate_percentage($number, $total) {

        if ($total == 0) {
            return 0;
        }
    
        return ($number / $total) * 100;
    }

    public function get_comparison_number($number){

        if($number == '100'){
            return $number = '100';
    
        }
        elseif($number > '95'){
            return $number ='95';
    
        }
        elseif($number > '85'){
    
            return $number ='85';
        }
        elseif($number > '75' ){
    
            return  $number ='75';
        }
        elseif($number > '65' ){
    
            return $number ='65';
        }
        elseif($number > '55'){
    
            return $number ='55';
        }
        elseif($number > '45'){
    
            return $number ='45';
        }
        elseif($number > '35'){
    
            return $number ='35';
        }
        elseif($number > '25'){
    
            return $number ='25';
        }
        elseif($number > '15'){
    
            return $number ='15';
        }
        elseif($number > '10'){
    
            return $number ='10';
        }
        elseif($number <='9'){
    
            return $number ='5';
        }
    }
}