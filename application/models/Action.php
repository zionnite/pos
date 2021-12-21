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
		$this->db->where('store_owner_id',$user_id);
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

	public function change_store_name($store_id,$new_store_name){
		$data	=array('store_name'=>$new_store_name);
		$this->db->set($data);
		$this->db->where('id',$store_id);
		$this->db->update('office_store');
		if($this->db->affected_rows() > 0){
			return true;
		}
		return false;
	}

	public function get_store_name_by_store_id($store_id){
		$this->db->where('id',$store_id);
		$query		=$this->db->get('office_store');
		if($query->num_rows() > 0){
			foreach($query->result_array() as $row){
				return $row['store_name'];
			}
		}
		return false;
	}
	public function get_store_name_2_by_store_id($store_id){
		$this->db->where('id',$store_id);
		$query		=$this->db->get('office_store');
		if($query->num_rows() > 0){
			foreach($query->result_array() as $row){
				return $row['store_name_2'];
			}
		}
		return false;
	}
	public function get_store_logo_by_store_id($store_id){
		$this->db->where('id',$store_id);
		$query		=$this->db->get('office_store');
		if($query->num_rows() > 0){
			foreach($query->result_array() as $row){
				return $row['store_img'];
			}
		}
		return false;
	}

	public function edit_store_logo($img_file_name,$store_id){
		$data	= array('store_img'=>$img_file_name);
		$this->db->set($data);
		$this->db->where('id',$store_id);
		$this->db->update('office_store');
		if($this->db->affected_rows() > 0){
			return true;
		}
		return false;
	}


	public function get_my_store_name($user_id){
		$this->db->where('store_owner_id',$user_id);
		$query		=$this->db->get('office_store');

		if($query->num_rows() > 0){
			return $query->result_array();
		}
		return false;
	}


	public function create_branch_store($store_id,$branch_name,$user_id){

		// echo $store_id.br().$branch_name.br().$user_id;

		$data		=array('store_id'=>$store_id,'branch_name'=>$branch_name,'date_created'=>date('Y-m-d'), 'time'=>time(),'store_owner_id'=>$user_id);

		$this->db->set($data);
		$this->db->insert('branch_office');
		if($this->db->affected_rows() > 0){
			return true;
		}
		return false;
	}

	public function get_store_branches($store_id,$user_id){
		$this->db->where(array('store_id'=>$store_id,'store_owner_id'=>$user_id));
		$query	=$this->db->get('branch_office');
		if($query->num_rows() > 0){
			return $query->result_array();
		}
		return false;
	}
	
	public function delete_branch_store($id){
		$this->db->where('id',$id);
		$this->db->delete('branch_office');
		if($this->db->affected_rows() > 0){
			return true;
		}
		return false;
	}

	public function get_my_store_supervisor($user_id){
		$this->db->where('store_owner_id',$user_id);
		$query		=$this->db->get('supervisor');
		if($query->num_rows() > 0){
			return $query->result_array();
		}
		return false;
	}
}