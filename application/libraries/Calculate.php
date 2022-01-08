<?php
class Calculate extends CI_Controller{
    private $CI;
	public function __construct(){
        parent::__construct();
		$this->CI	=& get_instance();
        $this->load->model('Matcher_db');
        $this->load->model('Action');
	}
    public function system_auto_calculate(){
        //get all plan tbl
        //get all investment plan by plan id
        //perfom calucation base on commission_duration but check if plan_duration still valid
        /**

        **/
        
        $all_plan   =$this->Matcher_db->get_subsciption_plan();
        if(is_array($all_plan)){
            foreach($all_plan as $row){
                $plan_id                    =$row['id'];
                $plan_name                  =$row['plan_name'];
                $plan_amount                =$row['amount'];
                $plan_commission            =$row['commission'];
                $plan_duration              =$row['plan_duration'];
                $plan_expected_amount       =$row['expected_amount'];
                $plan_commission_duration   =$row['commission_duration'];
                
                if($plan_duration == '1 week'){
                    $duration   ='-1 week';
                    $get_all_investment         =$this->Matcher_db->get_all_investment_by_plan_id($plan_id,$duration);
                    if(is_array($get_all_investment)){
                        foreach($get_all_investment as $row){
                            $u_ip_id		=$row['id'];
                            $u_user_id		=$row['user_id'];
                            $u_user_name	=$row['user_name'];
                            $u_time         =$row['time'];
                            $u_date_created =$row['date_created'];
                            $u_amount       =$row['amount'];
                            $u_plan_status  =$row['status'];

                            $u_full_name        =$this->Action->get_user_full_name($u_user_name).br();
                            $u_user_img         =$this->Action->get_user_img($u_user_name);
                            $u_file_path        =$this->Action->get_user_img_path($u_user_name);
                            $u_phone_no         =$this->Action->get_user_phone($u_user_name);
                            $u_user_sex         =$this->Action->get_user_sex($u_user_name);
                            $u_email            =$this->Action->get_user_email($u_user_name);
                            $u_city             =$this->Action->get_user_city($u_user_name);
                            $u_country          =$this->Action->get_user_country($u_user_name);

                            $charges            =100-$plan_commission;
                            $percent_charges    =($charges/100) * $u_amount;
                            $amount             = $u_amount - $percent_charges;

                            $date               =date('Y-m-d');
                            $date_checker   =$this->Matcher_db->check_if_today_calcualtion_exist($u_user_id);
                            //if(!$date_checker){
                                $data   =array('user_id'=>$u_user_id,'user_name'=>$u_user_name,'amount'=>$amount,'date'=>$date);
                                $this->db->set($data);
                                $this->db->insert('b_earning_history');
                                if($this->db->affected_rows() > 0){
                                    $this->Matcher_db->add_to_current_account_balance($u_user_id,$amount);
                                }
                            //}
                            //$this->Matcher_db->update_all_investment_by_plan_id($u_user_id,$plan_id,$u_ip_id,$duration);
                        }   
                    }
                    
                }elseif($plan_duration == '2 week'){
                    $duration   ='-2 week';
                    $get_all_investment         =$this->Matcher_db->get_all_investment_by_plan_id($plan_id,$duration);
                    if(is_array($get_all_investment)){
                        foreach($get_all_investment as $row){
                            $u_ip_id		=$row['id'];
                            $u_user_id		=$row['user_id'];
                            $u_user_name	=$row['user_name'];
                            $u_time         =$row['time'];
                            $u_date_created =$row['date_created'];
                            $u_amount       =$row['amount'];
                            $u_plan_status  =$row['status'];

                            $u_full_name        =$this->Action->get_user_full_name($u_user_name).br();
                            $u_user_img         =$this->Action->get_user_img($u_user_name);
                            $u_file_path        =$this->Action->get_user_img_path($u_user_name);
                            $u_phone_no         =$this->Action->get_user_phone($u_user_name);
                            $u_user_sex         =$this->Action->get_user_sex($u_user_name);
                            $u_email            =$this->Action->get_user_email($u_user_name);
                            $u_city             =$this->Action->get_user_city($u_user_name);
                            $u_country          =$this->Action->get_user_country($u_user_name);

                            $charges            =100-$plan_commission;
                            $percent_charges    =($charges/100) * $u_amount;
                            $amount             = $u_amount - $percent_charges;

                            $date               =date('Y-m-d');
                            $date_checker   =$this->Matcher_db->check_if_today_calcualtion_exist($u_user_id);
                            //if(!$date_checker){
                                $data   =array('user_id'=>$u_user_id,'user_name'=>$u_user_name,'amount'=>$amount,'date'=>$date);
                                $this->db->set($data);
                                $this->db->insert('b_earning_history');
                                if($this->db->affected_rows() > 0){
                                    $this->Matcher_db->add_to_current_account_balance($u_user_id,$amount);
                                }
                            //}
                            //$this->Matcher_db->update_all_investment_by_plan_id($u_user_id,$plan_id,$u_ip_id,$duration);
                        }   
                    }
                }elseif($plan_duration == '3 week'){
                    $duration   ='-3 week';
                    $get_all_investment         =$this->Matcher_db->get_all_investment_by_plan_id($plan_id,$duration);
                    if(is_array($get_all_investment)){
                        foreach($get_all_investment as $row){
                            $u_ip_id		=$row['id'];
                            $u_user_id		=$row['user_id'];
                            $u_user_name	=$row['user_name'];
                            $u_time         =$row['time'];
                            $u_date_created =$row['date_created'];
                            $u_amount       =$row['amount'];
                            $u_plan_status  =$row['status'];

                            $u_full_name        =$this->Action->get_user_full_name($u_user_name).br();
                            $u_user_img         =$this->Action->get_user_img($u_user_name);
                            $u_file_path        =$this->Action->get_user_img_path($u_user_name);
                            $u_phone_no         =$this->Action->get_user_phone($u_user_name);
                            $u_user_sex         =$this->Action->get_user_sex($u_user_name);
                            $u_email            =$this->Action->get_user_email($u_user_name);
                            $u_city             =$this->Action->get_user_city($u_user_name);
                            $u_country          =$this->Action->get_user_country($u_user_name);

                            $charges            =100-$plan_commission;
                            $percent_charges    =($charges/100) * $u_amount;
                            $amount             = $u_amount - $percent_charges;

                            $date               =date('Y-m-d');
                            $date_checker   =$this->Matcher_db->check_if_today_calcualtion_exist($u_user_id);
                            //if(!$date_checker){
                                $data   =array('user_id'=>$u_user_id,'user_name'=>$u_user_name,'amount'=>$amount,'date'=>$date);
                                $this->db->set($data);
                                $this->db->insert('b_earning_history');
                                if($this->db->affected_rows() > 0){
                                    $this->Matcher_db->add_to_current_account_balance($u_user_id,$amount);
                                }
                            //}
                            //$this->Matcher_db->update_all_investment_by_plan_id($u_user_id,$plan_id,$u_ip_id,$duration);
                        }   
                    }
                }elseif($plan_duration == '1 month'){
                    $duration   ='-1 month';
                    $get_all_investment         =$this->Matcher_db->get_all_investment_by_plan_id($plan_id,$duration);
                    if(is_array($get_all_investment)){
                        foreach($get_all_investment as $row){
                            $u_ip_id		=$row['id'];
                            $u_user_id		=$row['user_id'];
                            $u_user_name	=$row['user_name'];
                            $u_time         =$row['time'];
                            $u_date_created =$row['date_created'];
                            $u_amount       =$row['amount'];
                            $u_plan_status  =$row['status'];

                            $u_full_name        =$this->Action->get_user_full_name($u_user_name).br();
                            $u_user_img         =$this->Action->get_user_img($u_user_name);
                            $u_file_path        =$this->Action->get_user_img_path($u_user_name);
                            $u_phone_no         =$this->Action->get_user_phone($u_user_name);
                            $u_user_sex         =$this->Action->get_user_sex($u_user_name);
                            $u_email            =$this->Action->get_user_email($u_user_name);
                            $u_city             =$this->Action->get_user_city($u_user_name);
                            $u_country          =$this->Action->get_user_country($u_user_name);

                            $charges            =100-$plan_commission;
                            $percent_charges    =($charges/100) * $u_amount;
                            $amount             = $u_amount - $percent_charges;

                            $date               =date('Y-m-d');
                            $date_checker   =$this->Matcher_db->check_if_today_calcualtion_exist($u_user_id);
                            //if(!$date_checker){
                                $data   =array('user_id'=>$u_user_id,'user_name'=>$u_user_name,'amount'=>$amount,'date'=>$date);
                                $this->db->set($data);
                                $this->db->insert('b_earning_history');
                                if($this->db->affected_rows() > 0){
                                    $this->Matcher_db->add_to_current_account_balance($u_user_id,$amount);
                                }
                            //}
                            //$this->Matcher_db->update_all_investment_by_plan_id($u_user_id,$plan_id,$u_ip_id,$duration);
                        }   
                    }
                }elseif($plan_duration == '2 month'){
                    $duration   ='-2 month';
                    $get_all_investment         =$this->Matcher_db->get_all_investment_by_plan_id($plan_id,$duration);
                    if(is_array($get_all_investment)){
                        foreach($get_all_investment as $row){
                            $u_ip_id		=$row['id'];
                            $u_user_id		=$row['user_id'];
                            $u_user_name	=$row['user_name'];
                            $u_time         =$row['time'];
                            $u_date_created =$row['date_created'];
                            $u_amount       =$row['amount'];
                            $u_plan_status  =$row['status'];

                            $u_full_name        =$this->Action->get_user_full_name($u_user_name).br();
                            $u_user_img         =$this->Action->get_user_img($u_user_name);
                            $u_file_path        =$this->Action->get_user_img_path($u_user_name);
                            $u_phone_no         =$this->Action->get_user_phone($u_user_name);
                            $u_user_sex         =$this->Action->get_user_sex($u_user_name);
                            $u_email            =$this->Action->get_user_email($u_user_name);
                            $u_city             =$this->Action->get_user_city($u_user_name);
                            $u_country          =$this->Action->get_user_country($u_user_name);

                            $charges            =100-$plan_commission;
                            $percent_charges    =($charges/100) * $u_amount;
                            $amount             = $u_amount - $percent_charges;

                            $date               =date('Y-m-d');
                            $date_checker   =$this->Matcher_db->check_if_today_calcualtion_exist($u_user_id);
                            //if(!$date_checker){
                                $data   =array('user_id'=>$u_user_id,'user_name'=>$u_user_name,'amount'=>$amount,'date'=>$date);
                                $this->db->set($data);
                                $this->db->insert('b_earning_history');
                                if($this->db->affected_rows() > 0){
                                    $this->Matcher_db->add_to_current_account_balance($u_user_id,$amount);
                                }
                            //}
                            //$this->Matcher_db->update_all_investment_by_plan_id($u_user_id,$plan_id,$u_ip_id,$duration);
                        }   
                    }
                }elseif($plan_duration == '3 month'){
                    $duration   ='-3 month';
                    $get_all_investment         =$this->Matcher_db->get_all_investment_by_plan_id($plan_id,$duration);
                    if(is_array($get_all_investment)){
                        foreach($get_all_investment as $row){
                            $u_ip_id		=$row['id'];
                            $u_user_id		=$row['user_id'];
                            $u_user_name	=$row['user_name'];
                            $u_time         =$row['time'];
                            $u_date_created =$row['date_created'];
                            $u_amount       =$row['amount'];
                            $u_plan_status  =$row['status'];

                            $u_full_name        =$this->Action->get_user_full_name($u_user_name).br();
                            $u_user_img         =$this->Action->get_user_img($u_user_name);
                            $u_file_path        =$this->Action->get_user_img_path($u_user_name);
                            $u_phone_no         =$this->Action->get_user_phone($u_user_name);
                            $u_user_sex         =$this->Action->get_user_sex($u_user_name);
                            $u_email            =$this->Action->get_user_email($u_user_name);
                            $u_city             =$this->Action->get_user_city($u_user_name);
                            $u_country          =$this->Action->get_user_country($u_user_name);

                            $charges            =100-$plan_commission;
                            $percent_charges    =($charges/100) * $u_amount;
                            $amount             = $u_amount - $percent_charges;

                            $date               =date('Y-m-d');
                            $date_checker   =$this->Matcher_db->check_if_today_calcualtion_exist($u_user_id);
                            //if(!$date_checker){
                                $data   =array('user_id'=>$u_user_id,'user_name'=>$u_user_name,'amount'=>$amount,'date'=>$date);
                                $this->db->set($data);
                                $this->db->insert('b_earning_history');
                                if($this->db->affected_rows() > 0){
                                    $this->Matcher_db->add_to_current_account_balance($u_user_id,$amount);
                                }
                            //}
                            //$this->Matcher_db->update_all_investment_by_plan_id($u_user_id,$plan_id,$u_ip_id,$duration);
                        }   
                    }
                }elseif($plan_duration == '4 month'){
                    $duration   ='-4 month';
                    $get_all_investment         =$this->Matcher_db->get_all_investment_by_plan_id($plan_id,$duration);
                    if(is_array($get_all_investment)){
                        foreach($get_all_investment as $row){
                            $u_ip_id		=$row['id'];
                            $u_user_id		=$row['user_id'];
                            $u_user_name	=$row['user_name'];
                            $u_time         =$row['time'];
                            $u_date_created =$row['date_created'];
                            $u_amount       =$row['amount'];
                            $u_plan_status  =$row['status'];

                            $u_full_name        =$this->Action->get_user_full_name($u_user_name).br();
                            $u_user_img         =$this->Action->get_user_img($u_user_name);
                            $u_file_path        =$this->Action->get_user_img_path($u_user_name);
                            $u_phone_no         =$this->Action->get_user_phone($u_user_name);
                            $u_user_sex         =$this->Action->get_user_sex($u_user_name);
                            $u_email            =$this->Action->get_user_email($u_user_name);
                            $u_city             =$this->Action->get_user_city($u_user_name);
                            $u_country          =$this->Action->get_user_country($u_user_name);

                            $charges            =100-$plan_commission;
                            $percent_charges    =($charges/100) * $u_amount;
                            $amount             = $u_amount - $percent_charges;

                            $date               =date('Y-m-d');
                            $date_checker   =$this->Matcher_db->check_if_today_calcualtion_exist($u_user_id);
                            //if(!$date_checker){
                                $data   =array('user_id'=>$u_user_id,'user_name'=>$u_user_name,'amount'=>$amount,'date'=>$date);
                                $this->db->set($data);
                                $this->db->insert('b_earning_history');
                                if($this->db->affected_rows() > 0){
                                    $this->Matcher_db->add_to_current_account_balance($u_user_id,$amount);
                                }
                            //}
                            //$this->Matcher_db->update_all_investment_by_plan_id($u_user_id,$plan_id,$u_ip_id,$duration);
                        }   
                    }
                }elseif($plan_duration == '5 month'){
                    $duration   ='-5 month';
                    $get_all_investment         =$this->Matcher_db->get_all_investment_by_plan_id($plan_id,$duration);
                    if(is_array($get_all_investment)){
                        foreach($get_all_investment as $row){
                            $u_ip_id		=$row['id'];
                            $u_user_id		=$row['user_id'];
                            $u_user_name	=$row['user_name'];
                            $u_time         =$row['time'];
                            $u_date_created =$row['date_created'];
                            $u_amount       =$row['amount'];
                            $u_plan_status  =$row['status'];

                            $u_full_name        =$this->Action->get_user_full_name($u_user_name).br();
                            $u_user_img         =$this->Action->get_user_img($u_user_name);
                            $u_file_path        =$this->Action->get_user_img_path($u_user_name);
                            $u_phone_no         =$this->Action->get_user_phone($u_user_name);
                            $u_user_sex         =$this->Action->get_user_sex($u_user_name);
                            $u_email            =$this->Action->get_user_email($u_user_name);
                            $u_city             =$this->Action->get_user_city($u_user_name);
                            $u_country          =$this->Action->get_user_country($u_user_name);

                            $charges            =100-$plan_commission;
                            $percent_charges    =($charges/100) * $u_amount;
                            $amount             = $u_amount - $percent_charges;

                            $date               =date('Y-m-d');
                            $date_checker   =$this->Matcher_db->check_if_today_calcualtion_exist($u_user_id);
                            //if(!$date_checker){
                                $data   =array('user_id'=>$u_user_id,'user_name'=>$u_user_name,'amount'=>$amount,'date'=>$date);
                                $this->db->set($data);
                                $this->db->insert('b_earning_history');
                                if($this->db->affected_rows() > 0){
                                    $this->Matcher_db->add_to_current_account_balance($u_user_id,$amount);
                                }
                            //}
                            //$this->Matcher_db->update_all_investment_by_plan_id($u_user_id,$plan_id,$u_ip_id,$duration);
                        }   
                    }
                }elseif($plan_duration == '6 month'){
                    $duration   ='-6 month';
                    $get_all_investment         =$this->Matcher_db->get_all_investment_by_plan_id($plan_id,$duration);
                    if(is_array($get_all_investment)){
                        foreach($get_all_investment as $row){
                            $u_ip_id		=$row['id'];
                            $u_user_id		=$row['user_id'];
                            $u_user_name	=$row['user_name'];
                            $u_time         =$row['time'];
                            $u_date_created =$row['date_created'];
                            $u_amount       =$row['amount'];
                            $u_plan_status  =$row['status'];

                            $u_full_name        =$this->Action->get_user_full_name($u_user_name).br();
                            $u_user_img         =$this->Action->get_user_img($u_user_name);
                            $u_file_path        =$this->Action->get_user_img_path($u_user_name);
                            $u_phone_no         =$this->Action->get_user_phone($u_user_name);
                            $u_user_sex         =$this->Action->get_user_sex($u_user_name);
                            $u_email            =$this->Action->get_user_email($u_user_name);
                            $u_city             =$this->Action->get_user_city($u_user_name);
                            $u_country          =$this->Action->get_user_country($u_user_name);

                            $charges            =100-$plan_commission;
                            $percent_charges    =($charges/100) * $u_amount;
                            $amount             = $u_amount - $percent_charges;

                            $date               =date('Y-m-d');
                            $date_checker   =$this->Matcher_db->check_if_today_calcualtion_exist($u_user_id);
                            //if(!$date_checker){
                                $data   =array('user_id'=>$u_user_id,'user_name'=>$u_user_name,'amount'=>$amount,'date'=>$date);
                                $this->db->set($data);
                                $this->db->insert('b_earning_history');
                                if($this->db->affected_rows() > 0){
                                    $this->Matcher_db->add_to_current_account_balance($u_user_id,$amount);
                                }
                            //}
                            //$this->Matcher_db->update_all_investment_by_plan_id($u_user_id,$plan_id,$u_ip_id,$duration);
                        }   
                    }
                }elseif($plan_duration == '1 year'){
                    $duration   ='-1 year';
                    $get_all_investment         =$this->Matcher_db->get_all_investment_by_plan_id($plan_id,$duration);
                    if(is_array($get_all_investment)){
                        foreach($get_all_investment as $row){
                            $u_ip_id		=$row['id'];
                            $u_user_id		=$row['user_id'];
                            $u_user_name	=$row['user_name'];
                            $u_time         =$row['time'];
                            $u_date_created =$row['date_created'];
                            $u_amount       =$row['amount'];
                            $u_plan_status  =$row['status'];

                            $u_full_name        =$this->Action->get_user_full_name($u_user_name).br();
                            $u_user_img         =$this->Action->get_user_img($u_user_name);
                            $u_file_path        =$this->Action->get_user_img_path($u_user_name);
                            $u_phone_no         =$this->Action->get_user_phone($u_user_name);
                            $u_user_sex         =$this->Action->get_user_sex($u_user_name);
                            $u_email            =$this->Action->get_user_email($u_user_name);
                            $u_city             =$this->Action->get_user_city($u_user_name);
                            $u_country          =$this->Action->get_user_country($u_user_name);

                            $charges            =100-$plan_commission;
                            $percent_charges    =($charges/100) * $u_amount;
                            $amount             = $u_amount - $percent_charges;

                            $date               =date('Y-m-d');
                            $date_checker   =$this->Matcher_db->check_if_today_calcualtion_exist($u_user_id);
                            //if(!$date_checker){
                                $data   =array('user_id'=>$u_user_id,'user_name'=>$u_user_name,'amount'=>$amount,'date'=>$date);
                                $this->db->set($data);
                                $this->db->insert('b_earning_history');
                                if($this->db->affected_rows() > 0){
                                    $this->Matcher_db->add_to_current_account_balance($u_user_id,$amount);
                                }
                            //}
                            //$this->Matcher_db->update_all_investment_by_plan_id($u_user_id,$plan_id,$u_ip_id,$duration);
                        }   
                    }
                }
            }
        }
    }
   
}