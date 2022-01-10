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
}