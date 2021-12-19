<?php
class Action extends My_Model{
	public function __construct(){
		parent::__construct();
	}
	

	public function create_store($img_file_name,$store,$store_name,$user_id,$user_name){
		$data		=array('store_name'=>$store,
						   'store_name_2'=>$store_name,
						   'store_img'=>$img_file_name,
						   'time'=>time(),
						   'date_created'=>date('Y-m-d'),
						   'store_owner_id'=>$user_id,
						   'store_owner_user_name'=>$user_name
						);


		$this->db->set($data);
		$this->db->insert('office_store');
		if($this->db->affected_rows() > 0){
			return true;
		}
		return false;
	}

	public function get_store($user_id){
		//$this->db->where('store_owner_id',$user_id);
		$query		=$this->db->get('office_store');
		if($query->num_rows() > 0){
			return $query->result_array();
		}
		return false;
	}

	public function delete_store($id){
		$this->db->where('id',$id);
		$this->db->delete('office_store');
		if($this->db->affected_rows() > 0){
			return true;
		}
		return false;
	}
}