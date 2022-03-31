<?php
class Calculate extends CI_Controller{
    private $CI;
	public function __construct(){
        parent::__construct();
		$this->CI	=& get_instance();
        $this->CI->load->model('Action');
        $this->CI->load->model('Admin_db');
	}
    public function system_auto_calculate(){
       $result      =$this->Action->get_current_plan_details();
       if(is_array($result)){
           foreach($result as $row){
                $id              =$row['id'];
                $plan_id         =$row['plan_id'];
                $user_id         =$row['user_id'];
                $status          =$row['status'];
                $date_created    =$row['date_created'];
                $expire_date     =$row['expire_date'];
                $time            =$row['time'];
                $ref             =$row['ref'];
                $trans_id        =$row['trans_id'];
                $amount          =$row['amount'];

                $new_status;

                if(strtotime(date("Y-m-d H:i:sa")) < strtotime($expire_date)){
                    $new_status     ='active';
                }else{
                    $new_status     ='expire';
                }

                if($new_status      =='expire'){
                    //update the db
                    $this->Action->update_user_plan_details($id,$user_id,$plan_id,$new_status);
                }
                
           }
       }
    }
   ///usr/bin/curl https://legitcrypto.bigzhosting.website/v1/Calculate/system_auto_calculate
}