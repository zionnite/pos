<?php
class Action extends My_Model{
	public function __construct(){
		parent::__construct();

		$this->load->model('Admin_db');
	}
	

	/*Store & Branch*/
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
		$user_status            =$this->session->userdata('user_status');
		$branch_id              =$this->session->userdata('branch_id');
		$store_id               =$this->session->userdata('store_id');
		
		$this->db->where('store_owner_id',$user_id);
		if($user_status !='store_owner'){
			$this->db->where('id',$store_id);
		}
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
	public function get_store_owner_id_by_store_id($store_id){
		$this->db->where('id',$store_id);
		$query		=$this->db->get('office_store');
		if($query->num_rows() > 0){
			foreach($query->result_array() as $row){
				return $row['store_owner_id'];
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

	public function get_store_branches_by_store_id($store_id){
		$this->db->where(array('store_id'=>$store_id));
		$query	=$this->db->get('branch_office');
		if($query->num_rows() > 0){
			return $query->result_array();
		}
		return false;
	}

	public function get_store_branches_by_owner_id($owner_id){
		$user_status            =$this->session->userdata('user_status');
		$branch_id              =$this->session->userdata('branch_id');
		$store_id               =$this->session->userdata('store_id');
		
		$this->db->where(array('store_owner_id'=>$owner_id));
		if($user_status !='store_owner'){
			$this->db->where('id',$branch_id);
		}
		$query	=$this->db->get('branch_office');
		if($query->num_rows() > 0){
			return $query->result_array();
		}
		return false;
	}
	public function get_branch_name_by_branch_id($branch_id){
		$this->db->where(array('id'=>$branch_id));
		$query	=$this->db->get('branch_office');
		if($query->num_rows() > 0){
			foreach($query->result_array() as $row){
				return $row['branch_name'];
			}
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

	/*Supervisor*/

	public function get_my_store_supervisor($user_id){
		$this->db->where('store_owner_id',$user_id);
		$query		=$this->db->get('supervisor');
		if($query->num_rows() > 0){
			return $query->result_array();
		}
		return false;
	}
	
	public function get_my_store_supervisor_filter_by_store_id($user_id,$store_id){
		$this->db->where(array('store_owner_id'=>$user_id,'store_id'=>$store_id));
		$query		=$this->db->get('supervisor');
		if($query->num_rows() > 0){
			return $query->result_array();
		}
		return false;
	}
	public function get_my_store_supervisor_filter_by_branch_id($user_id,$dis_branch_id){
		$this->db->where(array('store_owner_id'=>$user_id,'branch_store_id'=>$dis_branch_id));
		$query		=$this->db->get('supervisor');
		if($query->num_rows() > 0){
			return $query->result_array();
		}
		return false;
	}

	public function create_supervisor($store_id,$branch_id,$name,$email,$phone,$password){
		$store_owner_id 			=$this->get_store_owner_id_by_store_id($store_id);
		$store_name					=$this->get_store_name_by_store_id($store_id);
		$branch_name				=$this->get_branch_name_by_branch_id($branch_id);
		$data	=array('store_id'=>$store_id,
					   'store_owner_id'=>$store_owner_id,
					   'store_name'=>$store_name,
					   'branch_store_id'=>$branch_id,
					   'branch_store_name'=>$branch_name,
					   'name'=>$name,
					   'email'=>$email,
					   'phone_no'=>$phone,
					   'date_created'=>date('Y-m-d'),
					   'time'=>time(),
					   'password'=>md5($password),
					);
		$this->db->set($data);
		$this->db->insert('supervisor');
		if($this->db->affected_rows() > 0){

			$data			=array('email'=>$email,'password'=>md5($password),'user_status'=>'manager');
			$this->db->set($data);
			$this->db->insert('login_tbl');
			return true;
		}
		return false;
	}
	

	public function delete_supervisor($id){
		$this->db->where('id',$id);
		$this->db->delete('supervisor');
		if($this->db->affected_rows() > 0){
			return true;
		}
		return false;
	}


	public function get_store_name_by_branch_id($branch_id){
		$this->db->where('id',$branch_id);
		$query		=$this->db->get('branch_office');
		if($query->num_rows() > 0){
			foreach($query->result_array() as $row){
				$store_id		=$row['store_id'];
				return $this->get_store_name_by_store_id($store_id);
			}
		}
		return false;
	}

	
	public function get_my_store_supervisor_by_store_id($store_id){
		$this->db->where(array('store_id'=>$store_id));
		$query		=$this->db->get('supervisor');
		if($query->num_rows() > 0){
			return $query->result_array();
		}
		return false;
	}

	/*Sales Rep*/
	public function create_sales_rep($store_id,$branch_id,$name,$email,$phone,$password){
		$store_owner_id 			=$this->get_store_owner_id_by_store_id($store_id);
		$store_name					=$this->get_store_name_by_store_id($store_id);
		$branch_name				=$this->get_branch_name_by_branch_id($branch_id);
		$data	=array('store_id'=>$store_id,
					   'store_owner_id'=>$store_owner_id,
					   'store_name'=>$store_name,
					   'branch_store_id'=>$branch_id,
					   'branch_store_name'=>$branch_name,
					   'name'=>$name,
					   'email'=>$email,
					   'phone_no'=>$phone,
					   'date_created'=>date('Y-m-d'),
					   'time'=>time(),
					   'password'=>md5($password),
					);
		$this->db->set($data);
		$this->db->insert('sales_rep');
		if($this->db->affected_rows() > 0){

			$data			=array('email'=>$email,'password'=>md5($password),'user_status'=>'sales_rep');
			$this->db->set($data);
			$this->db->insert('login_tbl');

			return true;
		}
		return false;
	}

	public function get_my_store_sales_rep($user_id){
		$this->db->where('store_owner_id',$user_id);
		$query		=$this->db->get('sales_rep');
		if($query->num_rows() > 0){
			return $query->result_array();
		}
		return false;
	}
	
	public function get_my_store_sales_rep_filter_by_store_id($user_id,$store_id){
		$this->db->where(array('store_owner_id'=>$user_id,'store_id'=>$store_id));
		$query		=$this->db->get('sales_rep');
		if($query->num_rows() > 0){
			return $query->result_array();
		}
		return false;
	}
	public function get_my_store_sales_rep_filter_by_branch_id($store_id,$dis_branch_id){
		$this->db->where(array('store_id'=>$store_id,'branch_store_id'=>$dis_branch_id));
		$query		=$this->db->get('sales_rep');
		if($query->num_rows() > 0){
			return $query->result_array();
		}
		return false;
	}

	public function delete_sales_rep($id){
		$this->db->where('id',$id);
		$this->db->delete('sales_rep');
		if($this->db->affected_rows() > 0){
			return true;
		}
		return false;
	}

	
	public function get_my_store_sales_rep_by_store_id($store_id){
		$this->db->where(array('store_id'=>$store_id));
		$query		=$this->db->get('sales_rep');
		if($query->num_rows() > 0){
			return $query->result_array();
		}
		return false;
	}

	public function get_my_branch_sales_rep_by_branch_id($branch_id){
		$this->db->where(array('branch_store_id'=>$branch_id));
		$query		=$this->db->get('sales_rep');
		if($query->num_rows() > 0){
			return $query->result_array();
		}
		return false;
	}

	/*Customer*/
	public function count_customers($search){

		$user_status            =$this->session->userdata('user_status');
		$store_id               =$this->session->userdata('store_id');
		$branch_id              =$this->session->userdata('branch_id');

		($user_status =='store_owner') ? 
			$store_owner_id = $this->session->userdata('user_id') : 
			$store_owner_id  =$this->session->userdata('store_owner_id');

		$keyword = $search['keyword'];
		$sort_by = $search['sort_by'];

		if($user_status =='store_owner'){
			$this->db->like('name',$this->db->escape_like_str($keyword,'both'));
			$this->db->where('store_owner_id',$store_owner_id);
			$this->db->or_like('email', $this->db->escape_like_str($keyword,'both'));
			$this->db->where('store_owner_id',$store_owner_id);
			$this->db->or_like('phone',$this->db->escape_like_str($keyword,'both'));
			$this->db->where('store_owner_id',$store_owner_id);
			$this->db->or_like('store_name', $this->db->escape_like_str($keyword,'both'));
			$this->db->where('store_owner_id',$store_owner_id);
			$this->db->or_like('branch_store_name', $this->db->escape_like_str($keyword,'both'));
			$this->db->where('store_owner_id',$store_owner_id);
			return $this->db->from('customers_tbl')->count_all_results();
		}else{
			$this->db->like('name',$this->db->escape_like_str($keyword,'both'));
			$this->db->where('branch_store_id',$branch_id);
			$this->db->or_like('email', $this->db->escape_like_str($keyword,'both'));
			$this->db->where('branch_store_id',$branch_id);
			$this->db->or_like('phone',$this->db->escape_like_str($keyword,'both'));
			$this->db->where('branch_store_id',$branch_id);
			$this->db->or_like('store_name', $this->db->escape_like_str($keyword,'both'));
			$this->db->where('branch_store_id',$branch_id);
			$this->db->or_like('branch_store_name', $this->db->escape_like_str($keyword,'both'));
			$this->db->where('branch_store_id',$branch_id);
			return $this->db->from('customers_tbl')->count_all_results();
		}
		
	}

	public function get_my_customer($search,$limit, $offset){
		$user_status            =$this->session->userdata('user_status');
		$store_id               =$this->session->userdata('store_id');
		$branch_id              =$this->session->userdata('branch_id');

		($user_status =='store_owner') ? 
			$store_owner_id = $this->session->userdata('user_id') : 
			$store_owner_id  =$this->session->userdata('store_owner_id');

		$keyword = $search['keyword'];
		$sort_by = $search['sort_by'];

		if($user_status =='store_owner'){
			$this->db->like('name',$this->db->escape_like_str($keyword,'both'));
			$this->db->where('store_owner_id',$store_owner_id);
			$this->db->or_like('email', $this->db->escape_like_str($keyword,'both'));
			$this->db->where('store_owner_id',$store_owner_id);
			$this->db->or_like('phone',$this->db->escape_like_str($keyword,'both'));
			$this->db->where('store_owner_id',$store_owner_id);
			$this->db->or_like('store_name', $this->db->escape_like_str($keyword,'both'));
			$this->db->where('store_owner_id',$store_owner_id);
			$this->db->or_like('branch_store_name', $this->db->escape_like_str($keyword,'both'));
			$this->db->where('store_owner_id',$store_owner_id);
		}else{
			$this->db->like('name',$this->db->escape_like_str($keyword,'both'));
			$this->db->where('branch_store_id',$branch_id);
			$this->db->or_like('email', $this->db->escape_like_str($keyword,'both'));
			$this->db->where('branch_store_id',$branch_id);
			$this->db->or_like('phone',$this->db->escape_like_str($keyword,'both'));
			$this->db->where('branch_store_id',$branch_id);
			$this->db->or_like('store_name', $this->db->escape_like_str($keyword,'both'));
			$this->db->where('branch_store_id',$branch_id);
			$this->db->or_like('branch_store_name', $this->db->escape_like_str($keyword,'both'));
			$this->db->where('branch_store_id',$branch_id);
		}

		
		$this->db->limit($limit, $offset);
		$this->db->order_by('name',$sort_by);
		$query		=$this->db->get('customers_tbl');
		if($query->num_rows() > 0){
			return $query->result_array();
		}

		return false;
	}

	public function delete_customer($id){
		# code...
		$this->db->where('id',$id);
		$this->db->delete('customers_tbl');
		if($this->db->affected_rows() > 0){
			return true;
		}
		return false;
	}

	public function count_filter_customers($search, $store_id, $type){

		$keyword = $search['keyword'];
		$sort_by = $search['sort_by'];

		

		if($type =='store'){

			$this->db->where('store_id',$store_id);
		}else if($type =='branch'){

			$this->db->where('branch_store_id', $store_id);
		}

		
		if(!empty($keyword)){
			$this->db->like('name',$this->db->escape_like_str($keyword,'both'));
			$this->db->or_like('email', $this->db->escape_like_str($keyword,'both'));
			$this->db->or_like('phone',$this->db->escape_like_str($keyword,'both'));
			$this->db->or_like('store_name', $this->db->escape_like_str($keyword,'both'));
			$this->db->or_like('branch_store_name', $this->db->escape_like_str($keyword,'both'));
		}
	
		return $this->db->from('customers_tbl')->count_all_results();
	}

	public function get_filter_customer($search, $store_id, $type, $limit, $offset){
		$keyword = $search['keyword'];
		$sort_by = $search['sort_by'];

		if($type =='store'){

			$this->db->where('store_id',$store_id);
		}else if($type =='branch'){

			$this->db->where('branch_store_id', $store_id);
		}

		if(!empty($keyword)){
			$this->db->like('name',$this->db->escape_like_str($keyword,'both'));
			$this->db->or_like('email', $this->db->escape_like_str($keyword,'both'));
			$this->db->or_like('phone',$this->db->escape_like_str($keyword,'both'));
			$this->db->or_like('store_name', $this->db->escape_like_str($keyword,'both'));
			$this->db->or_like('branch_store_name', $this->db->escape_like_str($keyword,'both'));
		}

		
		
		$this->db->limit($limit, $offset);
		$this->db->order_by('name',$sort_by);
		$query		=$this->db->get('customers_tbl');
		if($query->num_rows() > 0){
			return $query->result_array();
		}

		return false;
	}

	public function get_store_or_branch_name($type,$id){
		if($type =='store'){
			return $this->get_store_name_by_store_id($id);
		}else if($type =='branch'){
			return $this->get_branch_name_by_branch_id($id);
		}
	}

	public function create_customer($store_id,$branch_id,$name,$email,$phone){
		$store_owner_id 			=$this->get_store_owner_id_by_store_id($store_id);
		$store_name					=$this->get_store_name_by_store_id($store_id);
		$branch_name				=$this->get_branch_name_by_branch_id($branch_id);
		$data	=array('store_id'=>$store_id,
					   'store_owner_id'=>$store_owner_id,
					   'store_name'=>$store_name,
					   'branch_store_id'=>$branch_id,
					   'branch_store_name'=>$branch_name,
					   'name'=>$name,
					   'email'=>$email,
					   'phone'=>$phone,
					   'date_created'=>date('Y-m-d'),
					   'time'=>time(),
					);
		$this->db->set($data);
		$this->db->insert('customers_tbl');
		if($this->db->affected_rows() > 0){
			return true;
		}
		return false;
	}

	public function get_customer_name_by_customer_id($id){
		$this->db->where('id',$id);
		$query		=$this->db->get('customers_tbl');
		if($query->num_rows() > 0){
			foreach($query->result_array() as $row){
				return $row['name'];
			}
		}
		return false;
	}
	public function get_all_store_owner_customer($store_owner_id){
		$this->db->where('store_owner_id',$store_owner_id);
		$query		=$this->db->get('customers_tbl');
		if($query->num_rows() > 0){
			return $query->result_array();
		}
		return false;
	}

	public function get_store_branch_customer($store_id,$branch_id){
		$this->db->where('store_id',$store_id);
		$this->db->where('branch_store_id',$branch_id);
		$query		= $this->db->get('customers_tbl');
		if($query->num_rows() > 0){
			return $query->result_array();
		}
		return false;
	}

	public function get_my_store_customer_by_branch_id($store_owner_id,$branch_id){
		$this->db->where('store_owner_id',$store_owner_id);
		$this->db->where('branch_store_id',$branch_id);
		$query		= $this->db->get('customers_tbl');
		if($query->num_rows() > 0){
			return $query->result_array();
		}
		return false;
	}

	/*Supplier*/

	public function count_supplier($search){
		$user_status            =$this->session->userdata('user_status');
		$store_id               =$this->session->userdata('store_id');
		$branch_id              =$this->session->userdata('branch_id');

		($user_status =='store_owner') ? 
				$store_owner_id = $this->session->userdata('user_id') : 
				$store_owner_id  =$this->session->userdata('store_owner_id');

		$keyword = $search['keyword'];
		$sort_by = $search['sort_by'];
	
		if($user_status =='store_owner'){
			
			

			$this->db->like('name',$this->db->escape_like_str($keyword,'both'));
			$this->db->where('store_owner_id',$store_owner_id);
			$this->db->or_like('email', $this->db->escape_like_str($keyword,'both'));
			$this->db->where('store_owner_id',$store_owner_id);
			$this->db->or_like('phone',$this->db->escape_like_str($keyword,'both'));
			$this->db->where('store_owner_id',$store_owner_id);
			$this->db->or_like('store_name', $this->db->escape_like_str($keyword,'both'));
			$this->db->where('store_owner_id',$store_owner_id);
			$this->db->or_like('branch_store_name', $this->db->escape_like_str($keyword,'both'));
			$this->db->where('store_owner_id',$store_owner_id);
			return $this->db->from('suppliers_tbl')->count_all_results();
		}else{

			$this->db->like('name',$this->db->escape_like_str($keyword,'both'));
			$this->db->where('branch_store_id',$branch_id);
			$this->db->or_like('email', $this->db->escape_like_str($keyword,'both'));
			$this->db->where('branch_store_id',$branch_id);
			$this->db->or_like('phone',$this->db->escape_like_str($keyword,'both'));
			$this->db->where('branch_store_id',$branch_id);
			$this->db->or_like('store_name', $this->db->escape_like_str($keyword,'both'));
			$this->db->where('branch_store_id',$branch_id);
			$this->db->or_like('branch_store_name', $this->db->escape_like_str($keyword,'both'));
			$this->db->where('branch_store_id',$branch_id);
			return $this->db->from('suppliers_tbl')->count_all_results();
		}
	}

	public function get_my_supplier($search,$limit, $offset){

		$user_status            =$this->session->userdata('user_status');
		$store_id               =$this->session->userdata('store_id');
		$branch_id              =$this->session->userdata('branch_id');

		($user_status =='store_owner') ? 
				$store_owner_id = $this->session->userdata('user_id') : 
				$store_owner_id  =$this->session->userdata('store_owner_id');

		$keyword = $search['keyword'];
		$sort_by = $search['sort_by'];
	

		if($user_status =='store_owner'){
			
			

			$this->db->like('name',$this->db->escape_like_str($keyword,'both'));
			$this->db->where('store_owner_id',$store_owner_id);
			$this->db->or_like('email', $this->db->escape_like_str($keyword,'both'));
			$this->db->where('store_owner_id',$store_owner_id);
			$this->db->or_like('phone',$this->db->escape_like_str($keyword,'both'));
			$this->db->where('store_owner_id',$store_owner_id);
			$this->db->or_like('store_name', $this->db->escape_like_str($keyword,'both'));
			$this->db->where('store_owner_id',$store_owner_id);
			$this->db->or_like('branch_store_name', $this->db->escape_like_str($keyword,'both'));
			$this->db->where('store_owner_id',$store_owner_id);
		}else{

			$this->db->like('name',$this->db->escape_like_str($keyword,'both'));
			$this->db->where('branch_store_id',$branch_id);
			$this->db->or_like('email', $this->db->escape_like_str($keyword,'both'));
			$this->db->where('branch_store_id',$branch_id);
			$this->db->or_like('phone',$this->db->escape_like_str($keyword,'both'));
			$this->db->where('branch_store_id',$branch_id);
			$this->db->or_like('store_name', $this->db->escape_like_str($keyword,'both'));
			$this->db->where('branch_store_id',$branch_id);
			$this->db->or_like('branch_store_name', $this->db->escape_like_str($keyword,'both'));
			$this->db->where('branch_store_id',$branch_id);
		}

		$this->db->limit($limit, $offset);
		$this->db->order_by('name',$sort_by);
		$query		=$this->db->get('suppliers_tbl');
		if($query->num_rows() > 0){
			return $query->result_array();
		}

		return false;
	}

	public function delete_supplier($id){
		# code...
		$this->db->where('id',$id);
		$this->db->delete('suppliers_tbl');
		if($this->db->affected_rows() > 0){
			return true;
		}
		return false;
	}

	public function count_filter_supplier($search, $store_id, $type){

		$keyword = $search['keyword'];
		$sort_by = $search['sort_by'];

		

		if($type =='store'){

			$this->db->where('store_id',$store_id);
		}else if($type =='branch'){

			$this->db->where('branch_store_id', $store_id);
		}

		
		if(!empty($keyword)){
			$this->db->like('name',$this->db->escape_like_str($keyword,'both'));
			$this->db->or_like('email', $this->db->escape_like_str($keyword,'both'));
			$this->db->or_like('phone',$this->db->escape_like_str($keyword,'both'));
			$this->db->or_like('store_name', $this->db->escape_like_str($keyword,'both'));
			$this->db->or_like('branch_store_name', $this->db->escape_like_str($keyword,'both'));
		}
	
		return $this->db->from('suppliers_tbl')->count_all_results();
	}

	public function get_filter_supplier($search, $store_id, $type, $limit, $offset){
		$keyword = $search['keyword'];
		$sort_by = $search['sort_by'];

		if($type =='store'){

			$this->db->where('store_id',$store_id);
		}else if($type =='branch'){

			$this->db->where('branch_store_id', $store_id);
		}

		if(!empty($keyword)){
			$this->db->like('name',$this->db->escape_like_str($keyword,'both'));
			$this->db->or_like('email', $this->db->escape_like_str($keyword,'both'));
			$this->db->or_like('phone',$this->db->escape_like_str($keyword,'both'));
			$this->db->or_like('store_name', $this->db->escape_like_str($keyword,'both'));
			$this->db->or_like('branch_store_name', $this->db->escape_like_str($keyword,'both'));
		}

		
		
		$this->db->limit($limit, $offset);
		$this->db->order_by('name',$sort_by);
		$query		=$this->db->get('suppliers_tbl');
		if($query->num_rows() > 0){
			return $query->result_array();
		}

		return false;
	}



	public function create_supplier($store_id,$branch_id,$name,$email,$phone){
		$store_owner_id 			=$this->get_store_owner_id_by_store_id($store_id);
		$store_name					=$this->get_store_name_by_store_id($store_id);
		$branch_name				=$this->get_branch_name_by_branch_id($branch_id);
		$data	=array('store_id'=>$store_id,
					   'store_owner_id'=>$store_owner_id,
					   'store_name'=>$store_name,
					   'branch_store_id'=>$branch_id,
					   'branch_store_name'=>$branch_name,
					   'name'=>$name,
					   'email'=>$email,
					   'phone'=>$phone,
					   'date_created'=>date('Y-m-d'),
					   'time'=>time(),
					);
		$this->db->set($data);
		$this->db->insert('suppliers_tbl');
		if($this->db->affected_rows() > 0){
			return true;
		}
		return false;
	}

	public function get_all_store_owner_supplier($store_owner_id){
		$this->db->where('store_owner_id',$store_owner_id);
		$query		=$this->db->get('suppliers_tbl');
		if($query->num_rows() > 0){
			return $query->result_array();
		}
		return false;
	}

	public function get_my_store_supplier_by_branch_id($store_owner_id,$branch_id){
		$this->db->where('store_owner_id',$store_owner_id);
		$this->db->where('branch_store_id',$branch_id);
		$query		= $this->db->get('suppliers_tbl');
		if($query->num_rows() > 0){
			return $query->result_array();
		}
		return false;
	}


	/*Creaate Product*/
	public function create_product($img_file_name,$store_id,$store_name,$branch_id,$branch_name,$store_owner_id,$prod_name,$prod_size,$prod_bunk,$prod_cat,$prod_sub_cat,$prod_color,$prod_sup,/*$prod_brand,*/$prod_desc,$prod_cost,$prod_price/*,
	$prod_whole,$prod_weight,$prod_discount ,$metal_title,$metal_key,$metal_desc*/){

		$data		=array('store_id'=>$store_id,
			  			   'store_name'=>$store_name,
						   'branch_id'=>$branch_id,
						   'branch_name'=>$branch_name,
						   'store_owner_id'=>$store_owner_id,
						   'prod_name'=>$prod_name,
						   'prod_size'=>$prod_size,
						   'prod_bunk'=>$prod_bunk,
						   'prod_cat'=>$prod_cat,
						   'prod_sub_cat'=>$prod_sub_cat,
						   'prod_color'=>$prod_color,
						   'prod_supplier'=>$prod_sup,
						//    'prod_brand'=>$prod_brand,
						   'prod_desc'=>$prod_desc,
						   'prod_cost'=>$prod_cost,
						   'prod_price'=>$prod_price,
						//    'prod_whole'=>$prod_whole,
						//    'prod_weight'=>$prod_weight,
						//    'prod_discount'=>$prod_discount,
						   'prod_image'=>$img_file_name,
						//    'meta_title'=>$metal_title,
						//    'meta_key'=>$metal_key,
						//    'meta_desc'=>$metal_key,
						   'date_created'=>date('Y-m-d'),
						   'time'=>time(),
						);

		$this->db->set($data);
		$this->db->insert('product_tbl');
		if($this->db->affected_rows() > 0){
			return true;
		}
		return false;
	}

	public function current_stock($prod_id){
		$this->db->where('prod_id',$prod_id);
		$query			=$this->db->get('product_tbl');
		if($query->num_rows() > 0){
			foreach($query->result_array() as $row){
				return $row['prod_bunk'];
			}
		}
		return false;
	}
	public function re_stock_product($prod_id,$qty){
		$current_stock 		=$this->current_stock($prod_id);
		$new_stock 	=$qty+$current_stock;
		$data =array('prod_bunk'=>$new_stock);
		$this->db->set($data);
		$this->db->where('prod_id',$prod_id);
		$this->db->update('product_tbl');
		if($this->db->affected_rows() > 0){
			return true;
		}
		return false;
	}

	public function get_store_supplier_by_branch_store_id($branch_id){
		$this->db->where('branch_store_id',$branch_id);
		$query		=$this->db->get('suppliers_tbl');
		if($query->num_rows() > 0){
			return $query->result_array();
		}
		return false;
	}

	public function get_product_category_by_store_N_branch_store_id($store_id,$branch_id){
		$this->db->where('store_id',$store_id);
		$this->db->where('branch_store_id',$branch_id);
		$query		=$this->db->get('product_category');
		if($query->num_rows() > 0){
			return $query->result_array();
		}
		return false;
	}

	public function get_product_sub_category_by_cat_id($cat_id){
		$this->db->where('cat_id',$cat_id);
		$query		=$this->db->get('product_sub_category');
		if($query->num_rows() > 0){
			return $query->result_array();
		}
		return false;
	}

	public function create_category($store_id,$branch_id,$name){
		$store_owner_id 			=$this->get_store_owner_id_by_store_id($store_id);
		$store_name					=$this->get_store_name_by_store_id($store_id);
		$branch_name				=$this->get_branch_name_by_branch_id($branch_id);
		$data	=array('store_id'=>$store_id,
					   'store_owner_id'=>$store_owner_id,
					   'branch_store_id'=>$branch_id,
					   'cat_name'=>$name,
					   
					);
		$this->db->set($data);
		$this->db->insert('product_category');
		if($this->db->affected_rows() > 0){
			return true;
		}
		return false;
	}

	public function create_sub_category($store_id,$branch_id,$name,$cat_id){
		$store_owner_id 			=$this->get_store_owner_id_by_store_id($store_id);
		$store_name					=$this->get_store_name_by_store_id($store_id);
		$branch_name				=$this->get_branch_name_by_branch_id($branch_id);
		$data	=array('store_id'=>$store_id,
					   'store_owner_id'=>$store_owner_id,
					   'branch_store_id'=>$branch_id,
					   'sub_cat_name'=>$name,
					   'cat_id'=>$cat_id,
					   
					);
		$this->db->set($data);
		$this->db->insert('product_sub_category');
		if($this->db->affected_rows() > 0){
			return true;
		}
		return false;
	}

	public function count_products($search){

		$keyword = $search['keyword'];
		$sort_by = $search['sort_by'];

		$user_status            =$this->session->userdata('user_status');
		($user_status =='store_owner') ? 
			$store_owner_id = $this->session->userdata('user_id') : 
			$store_owner_id  =$this->session->userdata('store_owner_id');

		$this->db->like('prod_name',$this->db->escape_like_str($keyword,'both'));
		$this->db->where('store_owner_id',$store_owner_id);
		$this->db->or_like('meta_title', $this->db->escape_like_str($keyword,'both'));
		$this->db->where('store_owner_id',$store_owner_id);
    	$this->db->or_like('meta_key',$this->db->escape_like_str($keyword,'both'));
		$this->db->where('store_owner_id',$store_owner_id);
    	$this->db->or_like('meta_desc',$this->db->escape_like_str($keyword,'both'));
		$this->db->where('store_owner_id',$store_owner_id);
        $this->db->or_like('store_name', $this->db->escape_like_str($keyword,'both'));
		$this->db->where('store_owner_id',$store_owner_id);
        $this->db->or_like('branch_name', $this->db->escape_like_str($keyword,'both'));
		$this->db->where('store_owner_id',$store_owner_id);
		return $this->db->from('product_tbl')->count_all_results();
	}

	public function get_products($search,$limit, $offset){
		$keyword = $search['keyword'];
		$sort_by = $search['sort_by'];

		$user_status            =$this->session->userdata('user_status');
		($user_status =='store_owner') ? 
			$store_owner_id = $this->session->userdata('user_id') : 
			$store_owner_id  =$this->session->userdata('store_owner_id');

		$this->db->like('prod_name',$this->db->escape_like_str($keyword,'both'));
		$this->db->where('store_owner_id',$store_owner_id);
		$this->db->or_like('meta_title', $this->db->escape_like_str($keyword,'both'));
		$this->db->where('store_owner_id',$store_owner_id);
    	$this->db->or_like('meta_key',$this->db->escape_like_str($keyword,'both'));
		$this->db->where('store_owner_id',$store_owner_id);
    	$this->db->or_like('meta_desc',$this->db->escape_like_str($keyword,'both'));
		$this->db->where('store_owner_id',$store_owner_id);
        $this->db->or_like('store_name', $this->db->escape_like_str($keyword,'both'));
		$this->db->where('store_owner_id',$store_owner_id);
        $this->db->or_like('branch_name', $this->db->escape_like_str($keyword,'both'));
		$this->db->where('store_owner_id',$store_owner_id);
		$this->db->limit($limit, $offset);
		$this->db->order_by('prod_name',$sort_by);
		$query		=$this->db->get('product_tbl');
		if($query->num_rows() > 0){
			return $query->result_array();
		}

		return false;
	}

	public function count_products_in($search){

		$keyword = $search['keyword'];
		$sort_by = $search['sort_by'];

		$user_status            =$this->session->userdata('user_status');
		($user_status =='store_owner') ? 
			$store_owner_id = $this->session->userdata('user_id') : 
			$store_owner_id  =$this->session->userdata('store_owner_id');

		$this->db->like('prod_name',$this->db->escape_like_str($keyword,'both'));
		$this->db->where('store_owner_id',$store_owner_id);
		$this->db->where('prod_bunk >', 0);
		$this->db->or_like('meta_title', $this->db->escape_like_str($keyword,'both'));
		$this->db->where('store_owner_id',$store_owner_id);
		$this->db->where('prod_bunk >', 0);
    	$this->db->or_like('meta_key',$this->db->escape_like_str($keyword,'both'));
		$this->db->where('store_owner_id',$store_owner_id);
		$this->db->where('prod_bunk >', 0);
    	$this->db->or_like('meta_desc',$this->db->escape_like_str($keyword,'both'));
		$this->db->where('store_owner_id',$store_owner_id);
		$this->db->where('prod_bunk >', 0);
        $this->db->or_like('store_name', $this->db->escape_like_str($keyword,'both'));
		$this->db->where('store_owner_id',$store_owner_id);
		$this->db->where('prod_bunk >', 0);
        $this->db->or_like('branch_name', $this->db->escape_like_str($keyword,'both'));
		$this->db->where('store_owner_id',$store_owner_id);
		$this->db->where('prod_bunk >', 0);
		return $this->db->from('product_tbl')->count_all_results();
	}

	public function get_products_in($search,$limit, $offset){
		$keyword = $search['keyword'];
		$sort_by = $search['sort_by'];

		$user_status            =$this->session->userdata('user_status');
		($user_status =='store_owner') ? 
			$store_owner_id = $this->session->userdata('user_id') : 
			$store_owner_id  =$this->session->userdata('store_owner_id');

		$this->db->like('prod_name',$this->db->escape_like_str($keyword,'both'));
		$this->db->where('store_owner_id',$store_owner_id);
		$this->db->where('prod_bunk >', 0);
		$this->db->or_like('meta_title', $this->db->escape_like_str($keyword,'both'));
		$this->db->where('store_owner_id',$store_owner_id);
		$this->db->where('prod_bunk >', 0);
    	$this->db->or_like('meta_key',$this->db->escape_like_str($keyword,'both'));
		$this->db->where('store_owner_id',$store_owner_id);
		$this->db->where('prod_bunk >', 0);
    	$this->db->or_like('meta_desc',$this->db->escape_like_str($keyword,'both'));
		$this->db->where('store_owner_id',$store_owner_id);
		$this->db->where('prod_bunk >', 0);
        $this->db->or_like('store_name', $this->db->escape_like_str($keyword,'both'));
		$this->db->where('store_owner_id',$store_owner_id);
		$this->db->where('prod_bunk >', 0);
        $this->db->or_like('branch_name', $this->db->escape_like_str($keyword,'both'));
		$this->db->where('store_owner_id',$store_owner_id);
		$this->db->where('prod_bunk >', 0);
		$this->db->limit($limit, $offset);
		$this->db->order_by('prod_name',$sort_by);
		$query		=$this->db->get('product_tbl');
		if($query->num_rows() > 0){
			return $query->result_array();
		}

		return false;
	}


	public function count_products_out($search){

		$keyword = $search['keyword'];
		$sort_by = $search['sort_by'];

		$user_status            =$this->session->userdata('user_status');
		($user_status =='store_owner') ? 
			$store_owner_id = $this->session->userdata('user_id') : 
			$store_owner_id  =$this->session->userdata('store_owner_id');

		$this->db->like('prod_name',$this->db->escape_like_str($keyword,'both'));
		$this->db->where('store_owner_id',$store_owner_id);
		$this->db->where('prod_bunk <=', 0);
		$this->db->or_like('meta_title', $this->db->escape_like_str($keyword,'both'));
		$this->db->where('store_owner_id',$store_owner_id);
		$this->db->where('prod_bunk <=', 0);
    	$this->db->or_like('meta_key',$this->db->escape_like_str($keyword,'both'));
		$this->db->where('store_owner_id',$store_owner_id);
		$this->db->where('prod_bunk <=', 0);
    	$this->db->or_like('meta_desc',$this->db->escape_like_str($keyword,'both'));
		$this->db->where('store_owner_id',$store_owner_id);
		$this->db->where('prod_bunk <=', 0);
        $this->db->or_like('store_name', $this->db->escape_like_str($keyword,'both'));
		$this->db->where('store_owner_id',$store_owner_id);
		$this->db->where('prod_bunk <=', 0);
        $this->db->or_like('branch_name', $this->db->escape_like_str($keyword,'both'));
		$this->db->where('store_owner_id',$store_owner_id);
		$this->db->where('prod_bunk <=', 0);
		return $this->db->from('product_tbl')->count_all_results();
	}

	public function get_products_out($search,$limit, $offset){
		$keyword = $search['keyword'];
		$sort_by = $search['sort_by'];

		$user_status            =$this->session->userdata('user_status');
		($user_status =='store_owner') ? 
			$store_owner_id = $this->session->userdata('user_id') : 
			$store_owner_id  =$this->session->userdata('store_owner_id');

		$this->db->like('prod_name',$this->db->escape_like_str($keyword,'both'));
		$this->db->where('store_owner_id',$store_owner_id);
		$this->db->where('prod_bunk <=', 0);
		$this->db->or_like('meta_title', $this->db->escape_like_str($keyword,'both'));
		$this->db->where('store_owner_id',$store_owner_id);
		$this->db->where('prod_bunk <=', 0);
    	$this->db->or_like('meta_key',$this->db->escape_like_str($keyword,'both'));
		$this->db->where('store_owner_id',$store_owner_id);
		$this->db->where('prod_bunk <=', 0);
    	$this->db->or_like('meta_desc',$this->db->escape_like_str($keyword,'both'));
		$this->db->where('store_owner_id',$store_owner_id);
		$this->db->where('prod_bunk <=', 0);
        $this->db->or_like('store_name', $this->db->escape_like_str($keyword,'both'));
		$this->db->where('store_owner_id',$store_owner_id);
		$this->db->where('prod_bunk <=', 0);
        $this->db->or_like('branch_name', $this->db->escape_like_str($keyword,'both'));
		$this->db->where('store_owner_id',$store_owner_id);
		$this->db->where('prod_bunk <=', 0);
		$this->db->limit($limit, $offset);

		$this->db->order_by('prod_name',$sort_by);
		$query		=$this->db->get('product_tbl');
		if($query->num_rows() > 0){
			return $query->result_array();
		}

		return false;
	}


	public function get_product_category($store_owner_id){
		$this->db->where('store_owner_id',$store_owner_id);
		$query		=$this->db->get('product_category');
		if($query->num_rows() > 0){
			return $query->result_array();
		}
		return false;
	}

	public function get_sub_category_by_cat_id($prod_cat_id, $store_owner_id){
		$this->db->where('cat_id',$prod_cat_id);
		$this->db->where('store_owner_id',$store_owner_id);
		$query		=$this->db->get('product_sub_category');
		if($query->num_rows() > 0){
			return $query->result_array();
		}
		return false;
	}
	public function get_category_name_by_cat_id($cat_id){
		$this->db->where('id',$cat_id);
		$query		=$this->db->get('product_category');
		if($query->num_rows() > 0){
			foreach($query->result_array() as $row){
				return $row['cat_name'];
			}
		}
		return false;
	}


	public function get_sub_category_name_by_sub_cat_id($prod_sub_cat){
		$this->db->where('id',$prod_sub_cat);
		$query		=$this->db->get('product_sub_category');
		if($query->num_rows() > 0){
			foreach($query->result_array() as $row){
				return $row['sub_cat_name'];
			}
		}
		return false;
	}
	public function delete_category($id){
		# code...
		$this->db->where('id',$id);
		$this->db->delete('product_category');
		if($this->db->affected_rows() > 0){
			return true;
		}
		return false;
	}
	public function delete_sub_category($id){
		# code...
		$this->db->where('id',$id);
		$this->db->delete('product_sub_category');
		if($this->db->affected_rows() > 0){
			return true;
		}
		return false;
	}

	public function get_supplier_name_by_id($id){
		$this->db->where('id',$id);
		$query		=$this->db->get('suppliers_tbl');
		if($query->num_rows() > 0){
			foreach($query->result_array() as $row){
				return $row['name'];
			}
		}
		return false;
	}
	public function delete_product($id){
		# code...
		$this->db->where('prod_id',$id);
		$this->db->delete('product_tbl');
		if($this->db->affected_rows() > 0){
			return true;
		}
		return false;
	}

	public function count_filter_product($search, $store_id, $type){

		$keyword = $search['keyword'];
		$sort_by = $search['sort_by'];

		$user_status            =$this->session->userdata('user_status');
		($user_status =='store_owner') ? 
			$store_owner_id = $this->session->userdata('user_id') : 
			$store_owner_id  =$this->session->userdata('store_owner_id');

		

		if($type =='store'){

			$this->db->where('store_id',$store_id);
		}else if($type =='branch'){

			$this->db->where('branch_id', $store_id);
		}

		
		if(!empty($keyword)){
			$this->db->like('prod_name',$this->db->escape_like_str($keyword,'both'));
			$this->db->where('store_owner_id',$store_owner_id);
			$this->db->or_like('meta_title', $this->db->escape_like_str($keyword,'both'));
			$this->db->where('store_owner_id',$store_owner_id);
			$this->db->or_like('meta_key',$this->db->escape_like_str($keyword,'both'));
			$this->db->where('store_owner_id',$store_owner_id);
			$this->db->or_like('meta_desc',$this->db->escape_like_str($keyword,'both'));
			$this->db->where('store_owner_id',$store_owner_id);
			$this->db->or_like('store_name', $this->db->escape_like_str($keyword,'both'));
			$this->db->where('store_owner_id',$store_owner_id);
			$this->db->or_like('branch_name', $this->db->escape_like_str($keyword,'both'));
			$this->db->where('store_owner_id',$store_owner_id);
		}
	
		return $this->db->from('product_tbl')->count_all_results();
	}

	public function get_filter_product($search, $store_id, $type, $limit, $offset){
		$keyword = $search['keyword'];
		$sort_by = $search['sort_by'];

		$user_status            =$this->session->userdata('user_status');
		($user_status =='store_owner') ? 
			$store_owner_id = $this->session->userdata('user_id') : 
			$store_owner_id  =$this->session->userdata('store_owner_id');

		if($type =='store'){

			$this->db->where('store_id',$store_id);
		}else if($type =='branch'){

			$this->db->where('branch_id', $store_id);
		}

		if(!empty($keyword)){
			$this->db->like('prod_name',$this->db->escape_like_str($keyword,'both'));
			$this->db->where('store_owner_id',$store_owner_id);
			$this->db->or_like('meta_title', $this->db->escape_like_str($keyword,'both'));
			$this->db->where('store_owner_id',$store_owner_id);
			$this->db->or_like('meta_key',$this->db->escape_like_str($keyword,'both'));
			$this->db->where('store_owner_id',$store_owner_id);
			$this->db->or_like('meta_desc',$this->db->escape_like_str($keyword,'both'));
			$this->db->where('store_owner_id',$store_owner_id);
			$this->db->or_like('store_name', $this->db->escape_like_str($keyword,'both'));
			$this->db->where('store_owner_id',$store_owner_id);
			$this->db->or_like('branch_name', $this->db->escape_like_str($keyword,'both'));
			$this->db->where('store_owner_id',$store_owner_id);
		}

		
		
		$this->db->limit($limit, $offset);
		$this->db->order_by('prod_name',$sort_by);
		$query		=$this->db->get('product_tbl');
		if($query->num_rows() > 0){
			return $query->result_array();
		}

		return false;
	}

	public function count_filter_product_in($search, $store_id, $type){

		$keyword = $search['keyword'];
		$sort_by = $search['sort_by'];

		$user_status            =$this->session->userdata('user_status');
		($user_status =='store_owner') ? 
			$store_owner_id = $this->session->userdata('user_id') : 
			$store_owner_id  =$this->session->userdata('store_owner_id');

		

		if($type =='store'){

			$this->db->where('store_id',$store_id);
			$this->db->where('prod_bunk >', 0);
		}else if($type =='branch'){

			$this->db->where('branch_id', $store_id);
			$this->db->where('prod_bunk >', 0);
		}

		
		if(!empty($keyword)){
			$this->db->like('prod_name',$this->db->escape_like_str($keyword,'both'));
			$this->db->where('store_owner_id',$store_owner_id);
			$this->db->where('prod_bunk >', 0);
			$this->db->or_like('meta_title', $this->db->escape_like_str($keyword,'both'));
			$this->db->where('store_owner_id',$store_owner_id);
			$this->db->where('prod_bunk >', 0);
			$this->db->or_like('meta_key',$this->db->escape_like_str($keyword,'both'));
			$this->db->where('store_owner_id',$store_owner_id);
			$this->db->where('prod_bunk >', 0);
			$this->db->or_like('meta_desc',$this->db->escape_like_str($keyword,'both'));
			$this->db->where('store_owner_id',$store_owner_id);
			$this->db->where('prod_bunk >', 0);
			$this->db->or_like('store_name', $this->db->escape_like_str($keyword,'both'));
			$this->db->where('store_owner_id',$store_owner_id);
			$this->db->where('prod_bunk >', 0);
			$this->db->or_like('branch_name', $this->db->escape_like_str($keyword,'both'));
			$this->db->where('store_owner_id',$store_owner_id);
			$this->db->where('prod_bunk >', 0);
		}
	
		return $this->db->from('product_tbl')->count_all_results();
	}

	public function get_filter_product_in($search, $store_id, $type, $limit, $offset){
		$keyword = $search['keyword'];
		$sort_by = $search['sort_by'];

		$user_status            =$this->session->userdata('user_status');
		($user_status =='store_owner') ? 
			$store_owner_id = $this->session->userdata('user_id') : 
			$store_owner_id  =$this->session->userdata('store_owner_id');

		if($type =='store'){

			$this->db->where('store_id',$store_id);
			$this->db->where('prod_bunk >', 0);
		}else if($type =='branch'){

			$this->db->where('branch_id', $store_id);
			$this->db->where('prod_bunk >', 0);
		}

		if(!empty($keyword)){
			$this->db->like('prod_name',$this->db->escape_like_str($keyword,'both'));
			$this->db->where('store_owner_id',$store_owner_id);
			$this->db->where('prod_bunk >', 0);
			$this->db->or_like('meta_title', $this->db->escape_like_str($keyword,'both'));
			$this->db->where('store_owner_id',$store_owner_id);
			$this->db->where('prod_bunk >', 0);
			$this->db->or_like('meta_key',$this->db->escape_like_str($keyword,'both'));
			$this->db->where('store_owner_id',$store_owner_id);
			$this->db->where('prod_bunk >', 0);
			$this->db->or_like('meta_desc',$this->db->escape_like_str($keyword,'both'));
			$this->db->where('store_owner_id',$store_owner_id);
			$this->db->where('prod_bunk >', 0);
			$this->db->or_like('store_name', $this->db->escape_like_str($keyword,'both'));
			$this->db->where('store_owner_id',$store_owner_id);
			$this->db->where('prod_bunk >', 0);
			$this->db->or_like('branch_name', $this->db->escape_like_str($keyword,'both'));
			$this->db->where('store_owner_id',$store_owner_id);
			$this->db->where('prod_bunk >', 0);
		}

		
		
		$this->db->limit($limit, $offset);
		$this->db->order_by('prod_name',$sort_by);
		$query		=$this->db->get('product_tbl');
		if($query->num_rows() > 0){
			return $query->result_array();
		}

		return false;
	}

	public function count_filter_product_out($search, $store_id, $type){

		$keyword = $search['keyword'];
		$sort_by = $search['sort_by'];

		$user_status            =$this->session->userdata('user_status');
		($user_status =='store_owner') ? 
			$store_owner_id = $this->session->userdata('user_id') : 
			$store_owner_id  =$this->session->userdata('store_owner_id');

		

		if($type =='store'){

			$this->db->where('store_id',$store_id);
			$this->db->where('prod_bunk <=', 0);
		}else if($type =='branch'){

			$this->db->where('branch_id', $store_id);
			$this->db->where('prod_bunk <=', 0);
		}

		
		if(!empty($keyword)){
			$this->db->like('prod_name',$this->db->escape_like_str($keyword,'both'));
			$this->db->where('store_owner_id',$store_owner_id);
			$this->db->where('prod_bunk <=', 0);
			$this->db->or_like('meta_title', $this->db->escape_like_str($keyword,'both'));
			$this->db->where('store_owner_id',$store_owner_id);
			$this->db->where('prod_bunk <=', 0);
			$this->db->or_like('meta_key',$this->db->escape_like_str($keyword,'both'));
			$this->db->where('store_owner_id',$store_owner_id);
			$this->db->where('prod_bunk <=', 0);
			$this->db->or_like('meta_desc',$this->db->escape_like_str($keyword,'both'));
			$this->db->where('store_owner_id',$store_owner_id);
			$this->db->where('prod_bunk <=', 0);
			$this->db->or_like('store_name', $this->db->escape_like_str($keyword,'both'));
			$this->db->where('store_owner_id',$store_owner_id);
			$this->db->where('prod_bunk <=', 0);
			$this->db->or_like('branch_name', $this->db->escape_like_str($keyword,'both'));
			$this->db->where('store_owner_id',$store_owner_id);
			$this->db->where('prod_bunk <=', 0);
		}
	
		return $this->db->from('product_tbl')->count_all_results();
	}

	public function get_filter_product_out($search, $store_id, $type, $limit, $offset){
		$keyword = $search['keyword'];
		$sort_by = $search['sort_by'];

		$user_status            =$this->session->userdata('user_status');
		($user_status =='store_owner') ? 
			$store_owner_id = $this->session->userdata('user_id') : 
			$store_owner_id  =$this->session->userdata('store_owner_id');

		if($type =='store'){

			$this->db->where('store_id',$store_id);
			$this->db->where('prod_bunk <=', 0);
		}else if($type =='branch'){

			$this->db->where('branch_id', $store_id);
			$this->db->where('prod_bunk <=', 0);
		}

		if(!empty($keyword)){
			$this->db->like('prod_name',$this->db->escape_like_str($keyword,'both'));
			$this->db->where('store_owner_id',$store_owner_id);
			$this->db->where('prod_bunk <=', 0);
			$this->db->or_like('meta_title', $this->db->escape_like_str($keyword,'both'));
			$this->db->where('store_owner_id',$store_owner_id);
			$this->db->where('prod_bunk <=', 0);
			$this->db->or_like('meta_key',$this->db->escape_like_str($keyword,'both'));
			$this->db->where('store_owner_id',$store_owner_id);
			$this->db->where('prod_bunk <=', 0);
			$this->db->or_like('meta_desc',$this->db->escape_like_str($keyword,'both'));
			$this->db->where('store_owner_id',$store_owner_id);
			$this->db->where('prod_bunk <=', 0);
			$this->db->or_like('store_name', $this->db->escape_like_str($keyword,'both'));
			$this->db->where('store_owner_id',$store_owner_id);
			$this->db->where('prod_bunk <=', 0);
			$this->db->or_like('branch_name', $this->db->escape_like_str($keyword,'both'));
			$this->db->where('store_owner_id',$store_owner_id);
			$this->db->where('prod_bunk <=', 0);
		}

		
		
		$this->db->limit($limit, $offset);
		$this->db->order_by('prod_name',$sort_by);
		$query		=$this->db->get('product_tbl');
		if($query->num_rows() > 0){
			return $query->result_array();
		}

		return false;
	}

	/*Sales Rep*/
	/*Search Product and Add to cart*/

	public function search_product_N_add_to_cart($store_id,$branch_id,$store_owner_id,$search_term){

		if($search_term != ''){

			$this->db->where('store_id',$store_id);
			$this->db->where('branch_id',$branch_id);
			$this->db->where('store_owner_id',$store_owner_id);
			$this->db->where('prod_bunk >', 0);
			$this->db->like('prod_name',$this->db->escape_like_str($search_term,'both'));

			$this->db->order_by('prod_name','desc');
			$query			=$this->db->get('product_tbl');
			if($query->num_rows() > 0){
				return $query->result_array();
			}
		}
		
		return false;
	}

	public function get_prod_name_by_prod_id($prod_id){
		$this->db->where('prod_id',$prod_id);
		$query		=$this->db->get('product_tbl');
		if($query->num_rows() > 0){
			foreach($query->result_array() as $row){
				return $row['prod_name'];
			}
		}
		return false;
	}

	public function get_prod_desc_by_prod_id($prod_id){
		$this->db->where('prod_id',$prod_id);
		$query		=$this->db->get('product_tbl');
		if($query->num_rows() > 0){
			foreach($query->result_array() as $row){
				return $row['prod_desc'];
			}
		}
		return false;
	}
	public function get_prod_price_by_prod_id($prod_id){
		$this->db->where('prod_id',$prod_id);
		$query		=$this->db->get('product_tbl');
		if($query->num_rows() > 0){
			foreach($query->result_array() as $row){
				return $row['prod_price'];
			}
		}
		return false;
	}

	public function get_cat_id_by_prod_id($prod_id){
		$this->db->where('prod_id',$prod_id);
		$query		=$this->db->get('product_tbl');
		if($query->num_rows() > 0){
			foreach($query->result_array() as $row){
				return $row['prod_cat'];
			}
		}
		return false;
	}

	/*Transaction*/

	public function add_transaction($name,$prod_id,$price,$qty,$subtotal,$color,$size,$trans_type,$trans_method,$trans_customer,$trans_note,$user_status,$user_id,
	$invoice_no,$store_id,$branch_id){

		// echo $name.br().$prod_id.br().$price.br().$qty.br().$subtotal.br().$color.br().$size.br().$trans_type.br().$trans_method.br().br().$trans_customer.br().$trans_note.br().$user_status.br().$user_id.br().$invoice_no.br().$store_id.br().$branch_id;
		//insert invoice
		$this->create_invoice($invoice_no,$store_id,$branch_id);
		$customer_name		=$this->get_customer_name_by_customer_id($trans_customer);
		$store_owner_id		=$this->get_store_owner_id_by_store_id($store_id);

		$data			= array('prod_name' 		=> $name,
							    'prod_id'			=> $prod_id,
								'price'				=> $price,
								'color'				=> $color,
								'size'				=> $size,	
								'sub_total'			=> $subtotal,
								'quantity'			=> $qty,
								'transaction_type'	=> $trans_type,
								'payment_method'	=> $trans_method,
								'optional_note'		=> $trans_note,
								'customer_id'		=> $trans_customer,
								'customer_name'		=> $customer_name,
								'user_status'		=> $user_status,
								'user_id'			=> $user_id,
								'date_created'		=> date('Y-m-d H:i:sa'),
								'time'				=> time(),
								'store_id'			=> $store_id,
								'branch_id'			=> $branch_id,
								'invoice'			=> $invoice_no,
								'store_owner_id'	=> $store_owner_id,
								'day'				=> date('d'),
								'month'				=> date('M'),
								'year'				=> date('Y'),

						);
		$this->db->set($data);
		$this->db->insert('transaction_history');
		if($this->db->affected_rows() > 0){
			$this->subtract_qty_from_product_invtory($prod_id,$qty);
			return true;
		}
		return false;
	}
	public function get_product_current_inventory($prod_id){
		$this->db->where('prod_id',$prod_id);
		$query		=$this->db->get('product_tbl');
		if($query->num_rows() > 0){
			foreach($query->result_array() as $row){
				return $row['prod_bunk'];
			}
		}
		return false;
	}
	public function subtract_qty_from_product_invtory($prod_id,$qty){
		$current_inventory 		=$this->get_product_current_inventory($prod_id);
		$new_inventory			= $current_inventory-$qty;
		$data					=array('prod_bunk'=>$new_inventory);
		$this->db->set($data);
		$this->db->where('prod_id',$prod_id);
		$this->db->update('product_tbl');
		if($this->db->affected_rows() > 0){
			return true;
		}
		return false;
	}

	public function create_invoice($invoice_no,$store_id,$branch_id){
		$store_owner_id		=$this->get_store_owner_id_by_store_id($store_id);
		if(!$this->check_if_invoice_exist($invoice_no)){
			$data		= array('invoice_number'	=>$invoice_no,
								'store_id'			=>$store_id,
								'branch_id'			=>$branch_id,
								'date_created'		=>date('Y-m-d H:i:sa'),
								'time'				=>time(),
								'store_owner_id'	=>$store_owner_id,
								'month'				=>date('M'),
								'day' 				=>date('d'),
								'year'				=>date('Y'),
							);
			$this->db->set($data);
			$this->db->insert('invoice_tbl');
			if($this->db->affected_rows() > 0){
				return true;
			}
		}
		return false;
	}

	public function check_if_invoice_exist($invoice_no){
		$this->db->where('invoice_number',$invoice_no);
		$this->db->get('invoice_tbl');
		if($this->db->affected_rows() > 0){
			return true;
		}
		return false;
	}

	// public function count_invoice($store_id,$branch_id,$search){

	// 	$keyword = $search['keyword'];
	// 	$sort_by = $search['sort_by'];

	// 	if(!empty($keyword)){
	// 		$this->db->like('name',$this->db->escape_like_str($keyword,'both'));
	// 		$this->db->or_like('email', $this->db->escape_like_str($keyword,'both'));
    // 		$this->db->or_like('phone',$this->db->escape_like_str($keyword,'both'));
    //     	$this->db->or_like('store_name', $this->db->escape_like_str($keyword,'both'));
    //     	$this->db->or_like('branch_store_name', $this->db->escape_like_str($keyword,'both'));
	// 	}else{
	// 		$this->db->where('store_id',$store_id);
	// 		$this->db->where('branch_store_id',$branch_id);
	// 	}

		
	// 	return $this->db->from('customers_tbl')->count_all_results();
	// }

	// public function get_my_invoice($store_id,$branch_id,$search,$limit, $offset){
	// 	$keyword = $search['keyword'];
	// 	$sort_by = $search['sort_by'];

	// 	if(!empty($keyword)){
		// $this->db->like('name',$this->db->escape_like_str($keyword,'both'));
		// $this->db->where('store_id',$store_id);
		// $this->db->where('branch_store_id',$branch_id);
		// $this->db->or_like('email', $this->db->escape_like_str($keyword,'both'));
		// $this->db->where('store_id',$store_id);
		// $this->db->where('branch_store_id',$branch_id);
		// $this->db->or_like('phone',$this->db->escape_like_str($keyword,'both'));
		// $this->db->where('store_id',$store_id);
		// $this->db->where('branch_store_id',$branch_id);
		// $this->db->or_like('store_name', $this->db->escape_like_str($keyword,'both'));
		// $this->db->where('store_id',$store_id);
		// $this->db->where('branch_store_id',$branch_id);
		// $this->db->or_like('branch_store_name', $this->db->escape_like_str($keyword,'both'));
		// $this->db->where('store_id',$store_id);
		// $this->db->where('branch_store_id',$branch_id);
	// 	}else{
	// 		$this->db->where('store_id',$store_id);
	// 		$this->db->where('branch_store_id',$branch_id);
	// 	}

	// 	$this->db->limit($limit, $offset);
	// 	$this->db->order_by('name',$sort_by);
	// 	$query		=$this->db->get('customers_tbl');
	// 	if($query->num_rows() > 0){
	// 		return $query->result_array();
	// 	}

	// 	return false;
	// }


	public function count_invoice($store_id,$branch_id,$search){

		$user_status            =$this->session->userdata('user_status');
		$store_id               =$this->session->userdata('store_id');
		$branch_id              =$this->session->userdata('branch_id');

		($user_status =='store_owner') ? 
			$store_owner_id = $this->session->userdata('user_id') : 
			$store_owner_id  =$this->session->userdata('store_owner_id');

		$keyword = $search['keyword'];
		$sort_by = $search['sort_by'];

		if($user_status =='store_owner'){
			if(!empty($keyword)){
				$this->db->like('invoice_number',$this->db->escape_like_str($keyword,'both'));
				$this->db->where('store_id',$store_id);
				// $this->db->where('branch_id',$branch_id);
			}else{
				$this->db->where('store_id',$store_id);
				// $this->db->where('branch_id',$branch_id);
			}
			return $this->db->from('invoice_tbl')->count_all_results();
		}else{
			if(!empty($keyword)){
				$this->db->like('invoice_number',$this->db->escape_like_str($keyword,'both'));
				$this->db->where('store_id',$store_id);
				$this->db->where('branch_id',$branch_id);
			}else{
				$this->db->where('store_id',$store_id);
				$this->db->where('branch_id',$branch_id);
			}
			return $this->db->from('invoice_tbl')->count_all_results();
		}
		
	}

	public function get_my_invoice($store_id,$branch_id,$search,$limit, $offset){

		$user_status            =$this->session->userdata('user_status');
		$store_id               =$this->session->userdata('store_id');
		$branch_id              =$this->session->userdata('branch_id');

		($user_status =='store_owner') ? 
			$store_owner_id = $this->session->userdata('user_id') : 
			$store_owner_id  =$this->session->userdata('store_owner_id');

		$keyword = $search['keyword'];
		$sort_by = $search['sort_by'];

		if($user_status =='store_owner'){
			if(!empty($keyword)){
				$this->db->like('invoice_number',$this->db->escape_like_str($keyword,'both'));
				$this->db->where('store_id',$store_id);
				// $this->db->where('branch_id',$branch_id);
				
			}else{
				$this->db->where('store_id',$store_id);
				// $this->db->where('branch_id',$branch_id);
			}
		}else{
			if(!empty($keyword)){
				$this->db->like('invoice_number',$this->db->escape_like_str($keyword,'both'));
				$this->db->where('store_id',$store_id);
				$this->db->where('branch_id',$branch_id);
				
			}else{
				$this->db->where('store_id',$store_id);
				$this->db->where('branch_id',$branch_id);
			}
		}

		

		$this->db->limit($limit, $offset);
		$this->db->order_by('id',$sort_by);
		$query		=$this->db->get('invoice_tbl');
		if($query->num_rows() > 0){
			return $query->result_array();
		}

		return false;
	}

	public function get_customer_name_with_invoice_no($invoice_no){
		$this->db->where('invoice',$invoice_no);
		$query		=$this->db->get('transaction_history');
		if($query->num_rows() > 0){
			foreach($query->result_array() as $row){
				return $row['customer_name'];
			}
		}
		return false;
	}
	public function get_customer_id_with_invoice_no($invoice_no){
		$this->db->where('invoice',$invoice_no);
		$query		=$this->db->get('transaction_history');
		if($query->num_rows() > 0){
			foreach($query->result_array() as $row){
				return $row['customer_id'];
			}
		}
		return false;
	}

	public function get_qty_with_invoice_no($invoice_no){
		$this->db->where('invoice',$invoice_no);
		return $this->db->from('transaction_history')->count_all_results();
	}
	public function get_sub_total_with_invoice_no($invoice_no){
		$this->db->where('invoice',$invoice_no);
		$query		=$this->db->get('transaction_history');
		if($query->num_rows() > 0){
			foreach($query->result_array() as $row){
				return $row['sub_total'];
			}
		}
		return false;
	}
	public function get_grand_total_with_invoice_no($invoice_no){
		$this->db->where('invoice',$invoice_no);
		$this->db->select_sum('sub_total');
		$query		=$this->db->get('transaction_history');
		if($query->num_rows() > 0){
			foreach($query->result_array() as $row){
				return $row['sub_total'];
			}
		}
		return false;
	}
	public function get_transaction_type_with_invoice_no($invoice_no){
		$this->db->where('invoice',$invoice_no);
		$query		=$this->db->get('transaction_history');
		if($query->num_rows() > 0){
			foreach($query->result_array() as $row){
				return $row['transaction_type'];
			}
		}
		return false;
	}
	public function get_transaction_method_with_invoice_no($invoice_no){
		$this->db->where('invoice',$invoice_no);
		$query		=$this->db->get('transaction_history');
		if($query->num_rows() > 0){
			foreach($query->result_array() as $row){
				return $row['payment_method'];
			}
		}
		return false;
	}
	public function get_status_with_invoice_no($invoice_no){
		$this->db->where('invoice',$invoice_no);
		$query		=$this->db->get('transaction_history');
		if($query->num_rows() > 0){
			foreach($query->result_array() as $row){
				return $row['status'];
			}
		}
		return false;
	}
	public function get_prod_id_by_invoice_no($invoice_no){
		$this->db->where('invoice',$invoice_no);
		$query		=$this->db->get('transaction_history');
		if($query->num_rows() > 0){
			foreach($query->result_array() as $row){
				return $row['prod_id'];
			}
		}
		return false;
	}

	public function get_invoice_details_by_inovice_no($invoice_no){
		$this->db->where('invoice_number',$invoice_no);
		$query		=$this->db->get('invoice_tbl');
		if($query->num_rows() > 0){
			return $query->result_array();
		}
		return false;
	}
	public function get_transaction_details_by_inovice($invoice_no){
		$this->db->where('invoice',$invoice_no);
		$query		=$this->db->get('transaction_history');
		if($query->num_rows() > 0){
			return $query->result_array();
		}
		return false;
	}

	public function get_branch_store_address($branch_id){
		$this->db->where('id',$branch_id);
		$query  	=$this->db->get('branch_office');
		if($query->num_rows() > 0){
			foreach($query->result_array() as $row){
				return $row['address'];
			}
		}
		return false;
	}
	public function get_branch_store_email($branch_id){
		$this->db->where('id',$branch_id);
		$query  	=$this->db->get('branch_office');
		if($query->num_rows() > 0){
			foreach($query->result_array() as $row){
				return $row['email'];
			}
		}
		return false;
	}
	public function get_branch_store_phone($branch_id){
		$this->db->where('id',$branch_id);
		$query  	=$this->db->get('branch_office');
		if($query->num_rows() > 0){
			foreach($query->result_array() as $row){
				return $row['phone'];
			}
		}
		return false;
	}

	public function get_customer_phone_with_customer_id($customer_id){
		$this->db->where('id',$customer_id);
		$query  	=$this->db->get('customers_tbl');
		if($query->num_rows() > 0){
			foreach($query->result_array() as $row){
				return $row['phone'];
			}
		}
		return false;
	}

	public function get_customer_email_with_customer_id($customer_id){
		$this->db->where('id',$customer_id);
		$query  	=$this->db->get('customers_tbl');
		if($query->num_rows() > 0){
			foreach($query->result_array() as $row){
				return $row['email'];
			}
		}
		return false;
	}

	public function delete_invoice($id){
		$this->db->where('id',$id);
		$this->db->delete('invoice_tbl');
		if($this->db->affected_rows() > 0){
			return true;
		}
		return false;
	}

	public function count_filter_invoice($search, $store_id, $type){

		$keyword = $search['keyword'];
		$sort_by = $search['sort_by'];


		if($type =='store'){

			if(!empty($keyword)){
				$this->db->like('invoice_number',$this->db->escape_like_str($keyword,'both'));
				$this->db->where('store_id',$store_id);
			}else{
				$this->db->where('store_id',$store_id);
			}
			
		}else if($type =='branch'){

			if(!empty($keyword)){
				$this->db->like('invoice_number',$this->db->escape_like_str($keyword,'both'));
				$this->db->where('branch_id', $store_id);
			}else{
				$this->db->where('branch_id', $store_id);
			}
		}
		
		return $this->db->from('invoice_tbl')->count_all_results();
	
	}

	public function get_filter_invoice($search, $store_id, $type, $limit, $offset){
		$keyword = $search['keyword'];
		$sort_by = $search['sort_by'];

		if($type =='store'){

			if(!empty($keyword)){
				$this->db->like('invoice_number',$this->db->escape_like_str($keyword,'both'));
				$this->db->where('store_id',$store_id);
			}else{
				$this->db->where('store_id',$store_id);
			}
			
		}else if($type =='branch'){

			if(!empty($keyword)){
				$this->db->like('invoice_number',$this->db->escape_like_str($keyword,'both'));
				$this->db->where('branch_id', $store_id);
			}else{
				$this->db->where('branch_id', $store_id);
			}
		}

		
		
		$this->db->limit($limit, $offset);
		$this->db->order_by('id',$sort_by);
		$query		=$this->db->get('invoice_tbl');
		if($query->num_rows() > 0){
			return $query->result_array();
		}

		return false;
	}


	public function count_transaction_history($store_id,$branch_id,$search){
		$user_status 		=$this->session->userdata('user_status');
		$user_id 			=$this->session->userdata('user_id');
		

		($user_status =='store_owner') ? 
			$store_owner_id = $this->session->userdata('user_id') : 
			$store_owner_id  =$this->session->userdata('store_owner_id');

		$keyword = $search['keyword'];
		$sort_by = $search['sort_by'];

		if($user_status == 'store_owner'){

			if(!empty($keyword)){
				$this->db->like('invoice', $this->db->escape_like_str($keyword,'both'));
				$this->db->where('store_id',$store_id);
				$this->db->or_like('prod_name', $this->db->escape_like_str($keyword,'both'));
				$this->db->where('store_id',$store_id);
				$this->db->or_like('customer_name', $this->db->escape_like_str($keyword,'both'));
				$this->db->where('store_id',$store_id);
			}else{
				$this->db->where('store_id',$store_id);
				// $this->db->where('branch_id',$branch_id);
			}
			return $this->db->from('transaction_history')->count_all_results();

		}elseif($user_status	=='managger'){
			
			if(!empty($keyword)){
				$this->db->like('invoice', $this->db->escape_like_str($keyword,'both'));
				$this->db->where('branch_id',$branch_id);

				$this->db->or_like('prod_name', $this->db->escape_like_str($keyword,'both'));
				$this->db->where('branch_id',$branch_id);

				$this->db->or_like('customer_name', $this->db->escape_like_str($keyword,'both'));
				$this->db->where('branch_id',$branch_id);
				
			}else{
				$this->db->where('branch_id',$branch_id);
			}
			return $this->db->from('transaction_history')->count_all_results();
		}else{	

			if(!empty($keyword)){
				$this->db->like('invoice', $this->db->escape_like_str($keyword,'both'));
				$this->db->where('user_id',$user_id);
				$this->db->where('branch_id',$branch_id);
				$this->db->where('user_status',$user_status);

				$this->db->or_like('prod_name', $this->db->escape_like_str($keyword,'both'));
				$this->db->where('user_id',$user_id);
				$this->db->where('branch_id',$branch_id);
				$this->db->where('user_status',$user_status);

				$this->db->or_like('customer_name', $this->db->escape_like_str($keyword,'both'));
				$this->db->where('user_id',$user_id);
				$this->db->where('branch_id',$branch_id);
				$this->db->where('user_status',$user_status);
				
			}else{
				$this->db->where('user_id',$user_id);
				$this->db->where('branch_id',$branch_id);
				$this->db->where('user_status',$user_status);
			}
			return $this->db->from('transaction_history')->count_all_results();
		}
		

		
	}

	//COME HERE FOR LATER CHANGES
	public function get_my_transaction_history($store_id,$branch_id,$search,$limit, $offset){
		$user_status 		=$this->session->userdata('user_status');
		$user_id 			=$this->session->userdata('user_id');
		

		($user_status =='store_owner') ? 
			$store_owner_id = $this->session->userdata('user_id') : 
			$store_owner_id  =$this->session->userdata('store_owner_id');

		$keyword = $search['keyword'];
		$sort_by = $search['sort_by'];


		if($user_status == 'store_owner'){
			if(!empty($keyword)){
				$this->db->like('invoice', $this->db->escape_like_str($keyword,'both'));
				$this->db->where('store_id',$store_id);
				$this->db->or_like('prod_name', $this->db->escape_like_str($keyword,'both'));
				$this->db->where('store_id',$store_id);
				$this->db->or_like('customer_name', $this->db->escape_like_str($keyword,'both'));
				$this->db->where('store_id',$store_id);
			}else{
				$this->db->where('store_id',$store_id);
				// $this->db->where('branch_id',$branch_id);
			}
		}elseif($user_status == 'manager'){
			if(!empty($keyword)){
				$this->db->like('invoice', $this->db->escape_like_str($keyword,'both'));
				$this->db->where('branch_id',$branch_id);

				$this->db->or_like('prod_name', $this->db->escape_like_str($keyword,'both'));
				$this->db->where('branch_id',$branch_id);

				$this->db->or_like('customer_name', $this->db->escape_like_str($keyword,'both'));
				$this->db->where('branch_id',$branch_id);
				
			}else{
				$this->db->where('branch_id',$branch_id);
			}
		}
		else{
			if(!empty($keyword)){
				$this->db->like('invoice', $this->db->escape_like_str($keyword,'both'));
				$this->db->where('user_id',$user_id);
				$this->db->where('branch_id',$branch_id);
				$this->db->where('user_status',$user_status);

				$this->db->or_like('prod_name', $this->db->escape_like_str($keyword,'both'));
				$this->db->where('user_id',$user_id);
				$this->db->where('branch_id',$branch_id);
				$this->db->where('user_status',$user_status);

				$this->db->or_like('customer_name', $this->db->escape_like_str($keyword,'both'));
				$this->db->where('user_id',$user_id);
				$this->db->where('branch_id',$branch_id);
				$this->db->where('user_status',$user_status);
				
			}else{
				$this->db->where('user_id',$user_id);
				$this->db->where('branch_id',$branch_id);
				$this->db->where('user_status',$user_status);
			}
		}

		

		$this->db->limit($limit, $offset);
		$this->db->order_by('id',$sort_by);
		$query		=$this->db->get('transaction_history');
		if($query->num_rows() > 0){
			return $query->result_array();
		}

		return false;
	}

	public function delete_transaction($id){
		$this->db->where('id',$id);
		$this->db->delete('transaction_history');
		if($this->db->affected_rows() > 0){
			return true;
		}
		return false;
	}


	public function count_filter_transaction($search, $store_id, $type){

		$keyword = $search['keyword'];
		$sort_by = $search['sort_by'];


		if($type =='store'){

			if(!empty($keyword)){
				$this->db->like('invoice',$this->db->escape_like_str($keyword,'both'));
				$this->db->where('store_id',$store_id);

				$this->db->or_like('customer_name',$this->db->escape_like_str($keyword,'both'));
				$this->db->where('store_id',$store_id);

				$this->db->or_like('prod_name',$this->db->escape_like_str($keyword,'both'));
				$this->db->where('store_id',$store_id);

			}else{
				$this->db->where('store_id',$store_id);
			}
			
		}else if($type =='branch'){

			if(!empty($keyword)){
				$this->db->like('invoice',$this->db->escape_like_str($keyword,'both'));
				$this->db->where('branch_id', $store_id);

				$this->db->or_like('customer_name',$this->db->escape_like_str($keyword,'both'));
				$this->db->where('branch_id',$store_id);

				$this->db->or_like('prod_name',$this->db->escape_like_str($keyword,'both'));
				$this->db->where('branch_id',$store_id);

			}else{
				$this->db->where('branch_id', $store_id);
			}
		}
		
		return $this->db->from('transaction_history')->count_all_results();
	
	}

	public function get_filter_transaction($search, $store_id, $type, $limit, $offset){
		$keyword = $search['keyword'];
		$sort_by = $search['sort_by'];

		if($type =='store'){

			if(!empty($keyword)){
				$this->db->like('invoice',$this->db->escape_like_str($keyword,'both'));
				$this->db->where('store_id',$store_id);

				$this->db->or_like('customer_name',$this->db->escape_like_str($keyword,'both'));
				$this->db->where('store_id',$store_id);

				$this->db->or_like('prod_name',$this->db->escape_like_str($keyword,'both'));
				$this->db->where('store_id',$store_id);

			}else{
				$this->db->where('store_id',$store_id);
			}
			
		}else if($type =='branch'){

			if(!empty($keyword)){
				$this->db->like('invoice',$this->db->escape_like_str($keyword,'both'));
				$this->db->where('branch_id', $store_id);

				$this->db->or_like('customer_name',$this->db->escape_like_str($keyword,'both'));
				$this->db->where('branch_id',$store_id);

				$this->db->or_like('prod_name',$this->db->escape_like_str($keyword,'both'));
				$this->db->where('branch_id',$store_id);

			}else{
				$this->db->where('branch_id', $store_id);
			}
		}

		
		
		$this->db->limit($limit, $offset);
		$this->db->order_by('id',$sort_by);
		$query		=$this->db->get('transaction_history');
		if($query->num_rows() > 0){
			return $query->result_array();
		}

		return false;
	}

	public function get_store_name_by_supervisor_id($user_id){
		$this->db->where('id',$user_id);
		$query		=$this->db->get('supervisor');
		if($query->num_rows() > 0){
			foreach($query->result_array() as $row){
				return $row['store_name'];
			}
		}
		return false;
	}

	public function get_store_id_by_supervisor_id($user_id){
		$this->db->where('id',$user_id);
		$query		=$this->db->get('supervisor');
		if($query->num_rows() > 0){
			foreach($query->result_array() as $row){
				return $row['store_id'];
			}
		}
		return false;
	}

	public function get_branch_name_by_supervisor_id($user_id){
		$this->db->where('id',$user_id);
		$query		=$this->db->get('supervisor');
		if($query->num_rows() > 0){
			foreach($query->result_array() as $row){
				return $row['branch_store_name'];
			}
		}
		return false;
	}

	public function get_branch_id_by_supervisor_id($user_id){
		$this->db->where('id',$user_id);
		$query		=$this->db->get('supervisor');
		if($query->num_rows() > 0){
			foreach($query->result_array() as $row){
				return $row['branch_store_id'];
			}
		}
		return false;
	}

	public function get_prod_category_by_store_owner_id($store_owner_id){
		$this->db->where('store_owner_id',$store_owner_id);
		$query 	=$this->db->get('product_category');
		if($query->num_rows() > 0){
			return $query->result_array();
		}
		return false;
	}

	public function get_supplier_by_store_owner_id($store_owner_id){
		$this->db->where('store_owner_id',$store_owner_id);
		$query 	=$this->db->get('suppliers_tbl');
		if($query->num_rows() > 0){
			return $query->result_array();
		}
		return false;
	}

	/*Counting*/


	public function count_total_product_in_stock(){
		$user_id		         		=$this->session->userdata('user_id');
        $store_id		                =$this->session->userdata('store_id');
        $store_name			            =$this->session->userdata('store_name');
        $branch_id			            =$this->session->userdata('branch_id');
        $store_owner_id			        =$this->session->userdata('store_owner_id');
        $user_status		            =$this->session->userdata('user_status');


		($user_status =='store_owner') ? 
			$store_owner_id = $this->session->userdata('user_id') : 
			$store_owner_id  =$this->session->userdata('store_owner_id');


		if($user_status == 'store_owner'){
			$this->db->where('store_owner_id',$store_owner_id);
			$this->db->where('prod_bunk >', 0);
			return $this->db->from('product_tbl')->count_all_results();
		}else{
			$this->db->where('branch_id',$branch_id);
			$this->db->where('prod_bunk >', 0);
			return $this->db->from('product_tbl')->count_all_results();
		}
	}

	public function count_total_product_out_of_stock(){
		$user_id		         		=$this->session->userdata('user_id');
        $store_id		                =$this->session->userdata('store_id');
        $store_name			            =$this->session->userdata('store_name');
        $branch_id			            =$this->session->userdata('branch_id');
        $store_owner_id			        =$this->session->userdata('store_owner_id');
        $user_status		            =$this->session->userdata('user_status');


		($user_status =='store_owner') ? 
			$store_owner_id = $this->session->userdata('user_id') : 
			$store_owner_id  =$this->session->userdata('store_owner_id');

		
		if($user_status == 'store_owner'){
			$this->db->where('store_owner_id',$store_owner_id);
			$this->db->where('prod_bunk <=', 0);
			return $this->db->from('product_tbl')->count_all_results();
		}else{
			$this->db->where('branch_id',$branch_id);
			$this->db->where('prod_bunk <=', 0);
			return $this->db->from('product_tbl')->count_all_results();
		}
		
	}
	
	public function count_total_transaction(){
		$user_id		         		=$this->session->userdata('user_id');
        $store_id		                =$this->session->userdata('store_id');
        $store_name			            =$this->session->userdata('store_name');
        $branch_id			            =$this->session->userdata('branch_id');
        $store_owner_id			        =$this->session->userdata('store_owner_id');
        $user_status		            =$this->session->userdata('user_status');


		($user_status =='store_owner') ? 
			$store_owner_id = $this->session->userdata('user_id') : 
			$store_owner_id  =$this->session->userdata('store_owner_id');

			
		if($user_status == 'store_owner'){
			$this->db->where('store_owner_id',$store_owner_id);
			return $this->db->from('transaction_history')->count_all_results();
		}else{
			$this->db->where('user_id',$user_id);
			$this->db->where('user_status',$user_status);
			$this->db->where('branch_id',$branch_id);
			return $this->db->from('transaction_history')->count_all_results();
		}
		
	}

	public function count_total_sales(){
		$user_id		         		=$this->session->userdata('user_id');
        $store_id		                =$this->session->userdata('store_id');
        $store_name			            =$this->session->userdata('store_name');
        $branch_id			            =$this->session->userdata('branch_id');
        $store_owner_id			        =$this->session->userdata('store_owner_id');
        $user_status		            =$this->session->userdata('user_status');


		($user_status =='store_owner') ? 
			$store_owner_id = $this->session->userdata('user_id') : 
			$store_owner_id  =$this->session->userdata('store_owner_id');

			
		if($user_status == 'store_owner'){
			$this->db->where('store_owner_id',$store_owner_id);
		}elseif($user_status =='manager'){
			
			$this->db->where('branch_id',$branch_id);
		}else{
			$this->db->where('user_id',$user_id);
			$this->db->where('user_status',$user_status);
			$this->db->where('branch_id',$branch_id);
		}
		

		$this->db->select_sum('sub_total');
		$query		=$this->db->get('transaction_history');
		if($query->num_rows() > 0){
			foreach($query->result_array() as $row){
				return $row['sub_total'];
			}
		}
		return false;
	}

	public function count_today_sales(){
		$user_id		         		=$this->session->userdata('user_id');
        $store_id		                =$this->session->userdata('store_id');
        $store_name			            =$this->session->userdata('store_name');
        $branch_id			            =$this->session->userdata('branch_id');
        $store_owner_id			        =$this->session->userdata('store_owner_id');
        $user_status		            =$this->session->userdata('user_status');


		($user_status =='store_owner') ? 
			$store_owner_id = $this->session->userdata('user_id') : 
			$store_owner_id  =$this->session->userdata('store_owner_id');

			
		if($user_status == 'store_owner'){
			$this->db->where('store_owner_id',$store_owner_id);
			$this->db->where('day',date('d'));
			$this->db->where('month',date('M'));
			$this->db->where('year',date('Y'));
		}elseif($user_status =='manager'){
			
			$this->db->where('branch_id',$branch_id);
			$this->db->where('day',date('d'));
			$this->db->where('month',date('M'));
			$this->db->where('year',date('Y'));
		}else{
			$this->db->where('user_id',$user_id);
			$this->db->where('user_status',$user_status);
			$this->db->where('branch_id',$branch_id);
			$this->db->where('day',date('d'));
			$this->db->where('month',date('M'));
			$this->db->where('year',date('Y'));
		}
		

		$this->db->select_sum('sub_total');
		$query		=$this->db->get('transaction_history');
		if($query->num_rows() > 0){
			foreach($query->result_array() as $row){
				return $row['sub_total'];
			}
		}
		return false;
	}

	public function count_total_item_sold(){
		$user_id		         		=$this->session->userdata('user_id');
        $store_id		                =$this->session->userdata('store_id');
        $store_name			            =$this->session->userdata('store_name');
        $branch_id			            =$this->session->userdata('branch_id');
        $store_owner_id			        =$this->session->userdata('store_owner_id');
        $user_status		            =$this->session->userdata('user_status');


		($user_status =='store_owner') ? 
			$store_owner_id = $this->session->userdata('user_id') : 
			$store_owner_id  =$this->session->userdata('store_owner_id');

			
		if($user_status == 'store_owner'){
			$this->db->where('store_owner_id',$store_owner_id);

		}elseif($user_status =='manager'){
			
			$this->db->where('branch_id',$branch_id);
		}else{
			$this->db->where('user_id',$user_id);
			$this->db->where('user_status',$user_status);
			$this->db->where('branch_id',$branch_id);
		}
		

		$this->db->select_sum('quantity');
		$query		=$this->db->get('transaction_history');
		if($query->num_rows() > 0){
			foreach($query->result_array() as $row){
				return $row['quantity'];
			}
		}
		return false;
	}

	public function check_if_user_select_plan($user_id){
		$this->db->where('user_id',$user_id);
		$this->db->where('status','active');
		$this->db->get('my_plan');
		if($this->db->affected_rows() > 0){
			return true;
		}
		return false;
	}


	public function get_my_plan_store($user_id){
		$this->db->where('user_id',$user_id);
		$this->db->where('status','active');
		$query		=$this->db->get('my_plan');
		if($query->num_rows() > 0){
			foreach($query->result_array() as $row){
				$plan_id 		=$row['plan_id'];

				$this->db->where('id',$plan_id);
				$query			=$this->db->get('plan');
				if($query->num_rows() > 0){
					foreach($query->result_array() as $row){
						return $row['store_num'];
					}
				}
			}
		}
		return 0;
	}
	public function count_my_store($user_id){
		$this->db->where('store_owner_id',$user_id);
		return $this->db->from('office_store')->count_all_results();
	}

	public function count_all_store(){
		return $this->db->from('office_store')->count_all_results();
	}
	public function count_store_owners(){
		return $this->db->from('store_owner')->count_all_results();
	}

	public function get_plan(){
		$query			=$this->db->get('plan');
		if($query->num_rows() > 0){
			return $query->result_array();
		}
		return false;
	}
	public function get_store_by_admin(){

		$query		=$this->db->get('office_store');
		if($query->num_rows() > 0){
			return $query->result_array();
		}
		return false;
	}

	
	public function get_store_branches_by_admin(){
		
		$query	=$this->db->get('branch_office');
		if($query->num_rows() > 0){
			return $query->result_array();
		}
		return false;
	}

	public function delete_payment_plan($id){
		$this->db->where('id',$id);
		$this->db->delete('plan');
		if($this->db->affected_rows() > 0){
			return true;
		}
		return false;
	}

	public function create_payment_plan($name,$num_store,$amount){
		
		$data	=array('title'=>$name,
					   'store_num'=>$num_store,
					   'amount'=>$amount,
					);
		$this->db->set($data);
		$this->db->insert('plan');
		if($this->db->affected_rows() > 0){
			return true;
		}
		return false;
	}

	public function get_store_owner(){
		$query	=$this->db->get('store_owner');
		if($query->num_rows() > 0){
			return $query->result_array();
		}
		return false;
	}

	public function delete_store_owner($id){
		$this->db->where('id',$id);
		$this->db->delete('store_owner');
		if($this->db->affected_rows() > 0){
			return true;
		}
		return false;
	}

	public function get_store_by_admin_with_store_owner_id($user_id){
	
		$this->db->where('store_owner_id',$user_id);
		$query		=$this->db->get('office_store');
		if($query->num_rows() > 0){
			return $query->result_array();
		}
		return false;
	}

	public function count_total_transaction_by_admin($store_id){		
		$this->db->where('store_id',$store_id);
		return $this->db->from('transaction_history')->count_all_results();
	}

	public function count_total_transaction_by_admin_branch($store_id){		
		$this->db->where('branch_id',$store_id);
		return $this->db->from('transaction_history')->count_all_results();
	}

	public function count_total_item_sold_by_admin($store_id){
		
		$this->db->where('store_id',$store_id);
	
		$this->db->select_sum('quantity');
		$query		=$this->db->get('transaction_history');
		if($query->num_rows() > 0){
			foreach($query->result_array() as $row){
				return $row['quantity'];
			}
		}
		return 0;
	}

	public function count_total_item_sold_by_admin_branch($store_id){
		
		$this->db->where('branch_id',$store_id);
	
		$this->db->select_sum('quantity');
		$query		=$this->db->get('transaction_history');
		if($query->num_rows() > 0){
			foreach($query->result_array() as $row){
				return $row['quantity'];
			}
		}
		return 0;
	}

	public function count_store_branch_by_admin($store_id){
		$this->db->where('store_id',$store_id);
		return $this->db->from('branch_office')->count_all_results();
	}

	public function count_store_supervisor_by_admin($store_id){
		$this->db->where('store_id',$store_id);
		return $this->db->from('supervisor')->count_all_results();
	}

	public function count_store_supervisor_by_admin_branch($store_id){
		$this->db->where('branch_id',$store_id);
		return $this->db->from('invoice_tbl')->count_all_results();
	}

	public function count_store_staff_by_admin($store_id){
		$this->db->where('store_id',$store_id);
		return $this->db->from('sales_rep')->count_all_results();
	}
	public function count_branch_product_out_of_stock_branch($store_id){
		$this->db->where('branch_id',$store_id);
		$this->db->where('prod_bunk <=', 0);
		return $this->db->from('product_tbl')->count_all_results();
	}

	public function count_total_customers(){
		$user_id		         		=$this->session->userdata('user_id');
        $store_id		                =$this->session->userdata('store_id');
        $store_name			            =$this->session->userdata('store_name');
        $branch_id			            =$this->session->userdata('branch_id');
        $store_owner_id			        =$this->session->userdata('store_owner_id');
        $user_status		            =$this->session->userdata('user_status');


		($user_status =='store_owner') ? 
			$store_owner_id = $this->session->userdata('user_id') : 
			$store_owner_id  =$this->session->userdata('store_owner_id');

			
		if($user_status == 'store_owner'){
			$this->db->where('store_owner_id',$store_owner_id);
			return $this->db->from('customers_tbl')->count_all_results();
		}else{
			$this->db->where('branch_store_id',$branch_id);
			return $this->db->from('customers_tbl')->count_all_results();
		}


	}

	//Count Store Owner Params
	public function count_store_by_store_owner_id($store_owner_id){}
	public function count_branch_by_store_owner_id($store_owner_id){}
	public function count_item_sold_by_store_owner_id($store_owner_id){}
	public function count_transaction_by_store_owner_id($store_owner_id){}


	public function get_my_recent_activity($email){
		$this->db->where('email',$email);
		$this->db->order_by('id','desc');
		$this->db->limit(7);
		$query			=$this->db->get('user_activity');
		if($query->num_rows() > 0){
			return $query->result_array();
		}
		return false;
	}

	//drawing Chart Details

	public function draw_transaction_by_month(){
		$user_status		=$this->session->userdata('user_status');
		$store_id           =$this->session->userdata('store_id');
		$branch_id          =$this->session->userdata('branch_id');
		$user_id 			=$this->session->userdata('user_id');


		($user_status =='store_owner') ? 
			$store_owner_id = $this->session->userdata('user_id') : 
			$store_owner_id  =$this->session->userdata('store_owner_id');

		if($user_status =='store_owner'){

			$this->db->select('month, COUNT("month") AS total_transaction,');
			$this->db->group_by("month");
			$this->db->where('year',date('Y'));
			$this->db->order_by('id','asc');

			$this->db->where('store_owner_id',$store_owner_id);
			$query		=$this->db->get('transaction_history');
			if($query->num_rows() > 0){
				return $query->result_array();
			}
			return false;
		}else if($user_status =='manager'){

			$this->db->select('month, COUNT("month") AS total_transaction');
			$this->db->group_by("month");
			$this->db->where('year',date('Y'));
			$this->db->order_by('id','asc');

			$this->db->where('store_id',$store_id);
			$this->db->where('branch_id',$branch_id);
			$query		=$this->db->get('transaction_history');
			if($query->num_rows() > 0){
				return $query->result_array();
			}
			return false;
		}else if($user_status =='sales_rep'){

			$this->db->select('month, COUNT("month") AS total_transaction');
			$this->db->group_by("month");
			$this->db->where('year',date('Y'));
			$this->db->order_by('id','asc');

			$this->db->where('user_id',$user_id);
			$this->db->where('branch_id',$branch_id);
			$this->db->where('user_status',$user_status);
			$query		=$this->db->get('transaction_history');
			if($query->num_rows() > 0){
				return $query->result_array();
			}
			return false;
		}else{

			$this->db->select('month, COUNT("month") AS total_transaction');
			$this->db->group_by("month");
			$this->db->where('year',date('Y'));
			$this->db->order_by('id','asc');
			
			$query		=$this->db->get('transaction_history');
			if($query->num_rows() > 0){
				return $query->result_array();
			}
			return false;
		}
		
	}

	public function draw_product_by_month(){
		$user_status		=$this->session->userdata('user_status');
		$store_id           =$this->session->userdata('store_id');
		$branch_id          =$this->session->userdata('branch_id');
		$user_id 			=$this->session->userdata('user_id');


		($user_status =='store_owner') ? 
			$store_owner_id = $this->session->userdata('user_id') : 
			$store_owner_id  =$this->session->userdata('store_owner_id');

		if($user_status =='store_owner'){

			$this->db->select('prod_name, prod_bunk');
			$this->db->group_by("prod_name");
			$this->db->order_by('prod_id','asc');

			$this->db->where('store_owner_id',$store_owner_id);
			$query		=$this->db->get('product_tbl');
			if($query->num_rows() > 0){
				return $query->result_array();
			}
			return false;
		}else if($user_status =='manager'){

			$this->db->select('prod_name, prod_bunk');
			$this->db->group_by("prod_name");
			$this->db->order_by('prod_id','asc');

			$this->db->where('store_id',$store_id);
			$this->db->where('branch_id',$branch_id);
			$query		=$this->db->get('product_tbl');
			if($query->num_rows() > 0){
				return $query->result_array();
			}
			return false;
		}else if($user_status =='sales_rep'){

			$this->db->select('prod_name, prod_bunk');
			$this->db->group_by("prod_name");
			$this->db->order_by('prod_id','asc');

			$this->db->where('store_owner_id',$store_owner_id);
			$this->db->where('branch_id',$branch_id);
			//$this->db->where('user_status',$user_status);
			$query		=$this->db->get('product_tbl');
			if($query->num_rows() > 0){
				return $query->result_array();
			}
			return false;
		}else{

			$this->db->select('prod_name, prod_bunk');
			$this->db->group_by("prod_name");
			$this->db->order_by('prod_id','asc');
			
			$query		=$this->db->get('product_tbl');
			if($query->num_rows() > 0){
				return $query->result_array();
			}
			return false;
		}
		
	}

	public function get_all_total_product_bunk(){
		$user_status		=$this->session->userdata('user_status');
		$store_id           =$this->session->userdata('store_id');
		$branch_id          =$this->session->userdata('branch_id');
		$user_id 			=$this->session->userdata('user_id');


		($user_status =='store_owner') ? 
			$store_owner_id = $this->session->userdata('user_id') : 
			$store_owner_id  =$this->session->userdata('store_owner_id');

		if($user_status =='store_owner'){

			$this->db->select('COUNT("prod_bunk") AS prod_bunk,');
			$this->db->group_by("store_owner_id");

			$this->db->where('store_owner_id',$store_owner_id);
			$query		=$this->db->get('product_tbl');
			if($query->num_rows() > 0){
				foreach($query->result_array() as $row){
					return $row['prod_bunk'];
				}
			}
			return false;
		}elseif($user_status =='manager'){

			$this->db->select('COUNT("prod_bunk") AS prod_bunk,');
			$this->db->group_by("store_owner_id");

			$this->db->where('store_id',$store_id);
			$this->db->where('branch_id',$branch_id);
			$query		=$this->db->get('product_tbl');
			if($query->num_rows() > 0){
				foreach($query->result_array() as $row){
					return $row['prod_bunk'];
				}
			}
			return false;
		}elseif($user_status =='sales_rep'){

			$this->db->select('COUNT("prod_bunk") AS prod_bunk,');
			$this->db->group_by("store_owner_id");

			$this->db->where('store_owner_id',$store_owner_id);
			$this->db->where('branch_id',$branch_id);
			$query		=$this->db->get('product_tbl');
			if($query->num_rows() > 0){
				foreach($query->result_array() as $row){
					return $row['prod_bunk'];
				}
			}
			return false;
		}else{
			$this->db->select('COUNT("prod_bunk") AS prod_bunk,');
			//$this->db->group_by("store_owner_id");

			$query		=$this->db->get('product_tbl');
			if($query->num_rows() > 0){
				foreach($query->result_array() as $row){
					return $row['prod_bunk'];
				}
			}
			return false;
		}
		
	}

	public function get_all_total_product_in_bunk(){
		$user_status		=$this->session->userdata('user_status');
		$store_id           =$this->session->userdata('store_id');
		$branch_id          =$this->session->userdata('branch_id');
		$user_id 			=$this->session->userdata('user_id');


		($user_status =='store_owner') ? 
			$store_owner_id = $this->session->userdata('user_id') : 
			$store_owner_id  =$this->session->userdata('store_owner_id');

		if($user_status =='store_owner'){

			$this->db->select('COUNT("prod_bunk") AS prod_bunk,');
			$this->db->group_by("store_owner_id");
			$this->db->where('prod_bunk >', 0);

			$this->db->where('store_owner_id',$store_owner_id);
			$query		=$this->db->get('product_tbl');
			if($query->num_rows() > 0){
				foreach($query->result_array() as $row){
					return $row['prod_bunk'];
				}
			}
			return false;
		}elseif($user_status =='manager'){

			$this->db->select('COUNT("prod_bunk") AS prod_bunk,');
			$this->db->group_by("store_owner_id");
			$this->db->where('prod_bunk >', 0);

			$this->db->where('store_id',$store_id);
			$this->db->where('branch_id',$branch_id);
			$query		=$this->db->get('product_tbl');
			if($query->num_rows() > 0){
				foreach($query->result_array() as $row){
					return $row['prod_bunk'];
				}
			}
			return false;
		}elseif($user_status =='sales_rep'){

			$this->db->select('COUNT("prod_bunk") AS prod_bunk,');
			$this->db->group_by("store_owner_id");
			$this->db->where('prod_bunk >', 0);

			$this->db->where('store_owner_id',$store_owner_id);
			$this->db->where('branch_id',$branch_id);
			$query		=$this->db->get('product_tbl');
			if($query->num_rows() > 0){
				foreach($query->result_array() as $row){
					return $row['prod_bunk'];
				}
			}
			return false;
		}else{
			$this->db->select('COUNT("prod_bunk") AS prod_bunk,');
			//$this->db->group_by("store_owner_id");
			$this->db->where('prod_bunk >', 0);

			$query		=$this->db->get('product_tbl');
			if($query->num_rows() > 0){
				foreach($query->result_array() as $row){
					return $row['prod_bunk'];
				}
			}
			return false;
		}
		
	}

	public function get_all_total_product_out_bunk(){
		$user_status		=$this->session->userdata('user_status');
		$store_id           =$this->session->userdata('store_id');
		$branch_id          =$this->session->userdata('branch_id');
		$user_id 			=$this->session->userdata('user_id');


		($user_status =='store_owner') ? 
			$store_owner_id = $this->session->userdata('user_id') : 
			$store_owner_id  =$this->session->userdata('store_owner_id');

		if($user_status =='store_owner'){

			$this->db->select('COUNT("prod_bunk") AS prod_bunk,');
			$this->db->group_by("store_owner_id");
			$this->db->where('prod_bunk <=', 0);

			$this->db->where('store_owner_id',$store_owner_id);
			$query		=$this->db->get('product_tbl');
			if($query->num_rows() > 0){
				foreach($query->result_array() as $row){
					return $row['prod_bunk'];
				}
			}
			return 0;
		}elseif($user_status =='manager'){

			$this->db->select('COUNT("prod_bunk") AS prod_bunk,');
			$this->db->group_by("store_owner_id");
			$this->db->where('prod_bunk <=', 0);

			$this->db->where('store_id',$store_id);
			$this->db->where('branch_id',$branch_id);
			$query		=$this->db->get('product_tbl');
			if($query->num_rows() > 0){
				foreach($query->result_array() as $row){
					return $row['prod_bunk'];
				}
			}
			return false;
		}elseif($user_status =='sales_rep'){

			$this->db->select('COUNT("prod_bunk") AS prod_bunk,');
			$this->db->group_by("store_owner_id");
			$this->db->where('prod_bunk <=', 0);

			$this->db->where('store_owner_id',$store_owner_id);
			$this->db->where('branch_id',$branch_id);
			$query		=$this->db->get('product_tbl');
			if($query->num_rows() > 0){
				foreach($query->result_array() as $row){
					return $row['prod_bunk'];
				}
			}
			return false;
		}else{
			$this->db->select('COUNT("prod_bunk") AS prod_bunk,');
			//$this->db->group_by("store_owner_id");
			$this->db->where('prod_bunk <=', 0);

			$query		=$this->db->get('product_tbl');
			if($query->num_rows() > 0){
				foreach($query->result_array() as $row){
					return $row['prod_bunk'];
				}
			}
			return false;
		}
		
	}



	/*TODO*/


	public function get_the_most_purchase_product(){
		$user_status		=$this->session->userdata('user_status');
		$store_id           =$this->session->userdata('store_id');
		$branch_id          =$this->session->userdata('branch_id');
		$user_id 			=$this->session->userdata('user_id');


		($user_status =='store_owner') ? 
			$store_owner_id = $this->session->userdata('user_id') : 
			$store_owner_id  =$this->session->userdata('store_owner_id');

		// $this->db->select_max('quantity');

		if($user_status =='store_owner'){

			$this->db->select_sum('price');
			$this->db->select_sum('sub_total');
			$this->db->select('COUNT("quantity") AS quantity, id, prod_id, prod_name');
		
			$this->db->group_by('prod_id');
			$this->db->where('store_owner_id',$store_owner_id);
			$this->db->order_by('COUNT("quantity")','desc');
		}elseif($user_status =='manager'){

			$this->db->select_sum('price');
			$this->db->select_sum('sub_total');
			$this->db->select('COUNT("quantity") AS quantity, id, prod_id, prod_name');
		
			$this->db->group_by('prod_id');
			$this->db->where('store_owner_id',$store_owner_id);
			$this->db->where('store_id',$store_id);
			$this->db->where('branch_id',$branch_id);
			$this->db->order_by('COUNT("quantity")','desc');

		}else if($user_status =='sales_rep'){
			$this->db->select_sum('price');
			$this->db->select_sum('sub_total');
			$this->db->select('COUNT("quantity") AS quantity, id, prod_id, prod_name');
		
			$this->db->group_by('prod_id');
			$this->db->where('store_owner_id',$store_owner_id);
			$this->db->where('store_id',$store_id);
			$this->db->where('branch_id',$branch_id);
			$this->db->order_by('COUNT("quantity")','desc');
		}
		
		$this->db->limit('5');
		$query		=$this->db->get('transaction_history');
		if($query->num_rows() > 0){
			return $query->result_array();
			
		}
		return false;
	}

	public function get_the_most_purchase_customer(){
		$user_status		=$this->session->userdata('user_status');
		$store_id           =$this->session->userdata('store_id');
		$branch_id          =$this->session->userdata('branch_id');
		$user_id 			=$this->session->userdata('user_id');


		($user_status =='store_owner') ? 
			$store_owner_id = $this->session->userdata('user_id') : 
			$store_owner_id  =$this->session->userdata('store_owner_id');

		// $this->db->select_max('quantity');

		if($user_status =='store_owner'){

			$this->db->select_sum('price');
			$this->db->select_sum('sub_total');
			$this->db->select('COUNT("quantity") AS quantity, id, prod_id, prod_name,customer_name,customer_id');
			
			$this->db->group_by('customer_id');
			$this->db->where('store_owner_id',$store_owner_id);
			$this->db->order_by('COUNT("quantity")','desc');
		}elseif($user_status =='manager'){

			$this->db->select_sum('price');
			$this->db->select_sum('sub_total');
			$this->db->select('COUNT("quantity") AS quantity, id, prod_id, prod_name,customer_name,customer_id');
			
			$this->db->group_by('customer_id');
			$this->db->where('store_owner_id',$store_owner_id);
			$this->db->where('store_id',$store_id);
			$this->db->where('branch_id',$branch_id);
			$this->db->order_by('COUNT("quantity")','desc');

		}else if($user_status =='sales_rep'){
			$this->db->select_sum('price');
			$this->db->select_sum('sub_total');
			$this->db->select('COUNT("quantity") AS quantity, id, prod_id, prod_name,customer_name,customer_id');
			
			$this->db->group_by('customer_id');
			$this->db->where('store_owner_id',$store_owner_id);
			$this->db->where('store_id',$store_id);
			$this->db->where('branch_id',$branch_id);
			$this->db->order_by('COUNT("quantity")','desc');
		}
		
		$this->db->limit('5');
		$query		=$this->db->get('transaction_history');
		if($query->num_rows() > 0){
			return $query->result_array();
			
		}
		return false;
	}

	public function get_total_category(){
		$user_status		=$this->session->userdata('user_status');
		$store_id           =$this->session->userdata('store_id');
		$branch_id          =$this->session->userdata('branch_id');
		$user_id 			=$this->session->userdata('user_id');


		($user_status =='store_owner') ? 
			$store_owner_id = $this->session->userdata('user_id') : 
			$store_owner_id  =$this->session->userdata('store_owner_id');

		if($user_status =='store_owner'){

			$this->db->where('store_owner_id',$store_owner_id);
			return $this->db->from('product_category')->count_all_results();
		}elseif($user_status =='manager'){

			$this->db->where('store_id',$store_id);
			$this->db->where('branch_store_id',$branch_id);
			return $this->db->from('product_category')->count_all_results();
		}elseif($user_status =='sales_rep'){

			$this->db->where('store_id',$store_id);
			$this->db->where('branch_store_id',$branch_id);
			return $this->db->from('product_category')->count_all_results();
		}else{

			return $this->db->from('product_category')->count_all_results();
		}
	}

	public function get_total_supplier(){
		$user_status		=$this->session->userdata('user_status');
		$store_id           =$this->session->userdata('store_id');
		$branch_id          =$this->session->userdata('branch_id');
		$user_id 			=$this->session->userdata('user_id');


		($user_status =='store_owner') ? 
			$store_owner_id = $this->session->userdata('user_id') : 
			$store_owner_id  =$this->session->userdata('store_owner_id');

		if($user_status =='store_owner'){

			$this->db->where('store_owner_id',$store_owner_id);
			return $this->db->from('suppliers_tbl')->count_all_results();
		}elseif($user_status =='manager'){

			$this->db->where('store_id',$store_id);
			$this->db->where('branch_store_id',$branch_id);
			return $this->db->from('suppliers_tbl')->count_all_results();
		}elseif($user_status =='sales_rep'){

			$this->db->where('store_id',$store_id);
			$this->db->where('branch_store_id',$branch_id);
			return $this->db->from('suppliers_tbl')->count_all_results();
		}else{

			return $this->db->from('suppliers_tbl')->count_all_results();
		}
	}


	//Insight Transaction analyst
	public function total_transaction_generated(){
		$user_status		=$this->session->userdata('user_status');
		$store_id           =$this->session->userdata('store_id');
		$branch_id          =$this->session->userdata('branch_id');
		$user_id 			=$this->session->userdata('user_id');


		($user_status =='store_owner') ? 
			$store_owner_id = $this->session->userdata('user_id') : 
			$store_owner_id  =$this->session->userdata('store_owner_id');

		if($user_status =='store_owner'){

			$this->db->where('store_owner_id',$store_owner_id);
			return $this->db->from('transaction_history')->count_all_results();
		}elseif($user_status =='manager'){

			$this->db->where('store_id',$store_id);
			$this->db->where('branch_id',$branch_id);
			return $this->db->from('transaction_history')->count_all_results();
		}elseif($user_status =='sales_rep'){

			$this->db->where('store_id',$store_id);
			$this->db->where('branch_id',$branch_id);
			$this->db->where('user_id',$user_id);
			$this->db->where('user_status',$user_status);

			return $this->db->from('transaction_history')->count_all_results();
		}else{

			return $this->db->from('transaction_history')->count_all_results();
		}
	}

	public function transaction_generated_this_month(){
		$user_status		=$this->session->userdata('user_status');
		$store_id           =$this->session->userdata('store_id');
		$branch_id          =$this->session->userdata('branch_id');
		$user_id 			=$this->session->userdata('user_id');


		($user_status =='store_owner') ? 
			$store_owner_id = $this->session->userdata('user_id') : 
			$store_owner_id  =$this->session->userdata('store_owner_id');

		if($user_status =='store_owner'){

			$this->db->where('store_owner_id',$store_owner_id);
			$this->db->where('month',date('M'));
			return $this->db->from('transaction_history')->count_all_results();
		}elseif($user_status =='manager'){

			$this->db->where('store_id',$store_id);
			$this->db->where('branch_id',$branch_id);
			$this->db->where('month',date('M'));
			return $this->db->from('transaction_history')->count_all_results();
		}elseif($user_status =='sales_rep'){

			$this->db->where('store_id',$store_id);
			$this->db->where('branch_id',$branch_id);
			$this->db->where('user_id',$user_id);
			$this->db->where('user_status',$user_status);
			$this->db->where('month',date('M'));

			return $this->db->from('transaction_history')->count_all_results();
		}else{

			$this->db->where('month',date('M'));
			return $this->db->from('transaction_history')->count_all_results();
		}
	}

	public function transaction_generated_this_week(){
		$user_status		=$this->session->userdata('user_status');
		$store_id           =$this->session->userdata('store_id');
		$branch_id          =$this->session->userdata('branch_id');
		$user_id 			=$this->session->userdata('user_id');

		$week_start	=date('Y-m-d H:i:sa',strtotime('last sunday'));
        $week_end	=date('Y-m-d H:i:sa',strtotime('next sunday'));


		($user_status =='store_owner') ? 
			$store_owner_id = $this->session->userdata('user_id') : 
			$store_owner_id  =$this->session->userdata('store_owner_id');

		if($user_status =='store_owner'){

			$this->db->where('store_owner_id',$store_owner_id);

			$this->db->where('date_created >', $week_start);
        	$this->db->where('date_created <', $week_end);

			return $this->db->from('transaction_history')->count_all_results();
		}elseif($user_status =='manager'){

			$this->db->where('store_id',$store_id);
			$this->db->where('branch_id',$branch_id);

			$this->db->where('date_created >', $week_start);
        	$this->db->where('date_created <', $week_end);

			return $this->db->from('transaction_history')->count_all_results();
		}elseif($user_status =='sales_rep'){

			$this->db->where('store_id',$store_id);
			$this->db->where('branch_id',$branch_id);
			$this->db->where('user_id',$user_id);
			$this->db->where('user_status',$user_status);

			$this->db->where('date_created >', $week_start);
        	$this->db->where('date_created <', $week_end);

			return $this->db->from('transaction_history')->count_all_results();
		}else{

			$this->db->where('date_created >', $week_start);
        	$this->db->where('date_created <', $week_end);

			return $this->db->from('transaction_history')->count_all_results();
		}
	}
	
	public function transaction_generated_today(){
		$user_status		=$this->session->userdata('user_status');
		$store_id           =$this->session->userdata('store_id');
		$branch_id          =$this->session->userdata('branch_id');
		$user_id 			=$this->session->userdata('user_id');


		($user_status =='store_owner') ? 
			$store_owner_id = $this->session->userdata('user_id') : 
			$store_owner_id  =$this->session->userdata('store_owner_id');

		if($user_status =='store_owner'){

			$this->db->where('store_owner_id',$store_owner_id);
			$this->db->where('day',date('d'));
			return $this->db->from('transaction_history')->count_all_results();
		}elseif($user_status =='manager'){

			$this->db->where('store_id',$store_id);
			$this->db->where('branch_id',$branch_id);
			$this->db->where('day',date('d'));
			return $this->db->from('transaction_history')->count_all_results();
		}elseif($user_status =='sales_rep'){

			$this->db->where('store_id',$store_id);
			$this->db->where('branch_id',$branch_id);
			$this->db->where('user_id',$user_id);
			$this->db->where('user_status',$user_status);
			$this->db->where('day',date('d'));

			return $this->db->from('transaction_history')->count_all_results();
		}else{

			$this->db->where('day',date('d'));
			return $this->db->from('transaction_history')->count_all_results();
		}
	}

	public function overall_monthly_transaction(){
		
		return round($this->Admin_db->calculate_percentage($this->transaction_generated_this_month(),$this->total_transaction_generated()));
	}

	public function overall_weekly_transaction(){

		return round($this->Admin_db->calculate_percentage($this->transaction_generated_this_week(),$this->total_transaction_generated()));
	}
	public function overall_dailly_transaction(){
		// return $this->transaction_generated_today();
		// return $this->total_transaction_generated();

		return round($this->Admin_db->calculate_percentage($this->transaction_generated_today(),$this->total_transaction_generated()));
	}
	


	//Insight Transaction analyst
	public function total_invoice_generated(){
		$user_status		=$this->session->userdata('user_status');
		$store_id           =$this->session->userdata('store_id');
		$branch_id          =$this->session->userdata('branch_id');
		$user_id 			=$this->session->userdata('user_id');


		($user_status =='store_owner') ? 
			$store_owner_id = $this->session->userdata('user_id') : 
			$store_owner_id  =$this->session->userdata('store_owner_id');

		if($user_status =='store_owner'){

			$this->db->where('store_owner_id',$store_owner_id);
			return $this->db->from('invoice_tbl')->count_all_results();
		}elseif($user_status =='manager'){

			$this->db->where('store_id',$store_id);
			$this->db->where('branch_id',$branch_id);
			return $this->db->from('invoice_tbl')->count_all_results();
		}elseif($user_status =='sales_rep'){

			$this->db->where('store_id',$store_id);
			$this->db->where('branch_id',$branch_id);
			
			return $this->db->from('invoice_tbl')->count_all_results();
		}else{

			return $this->db->from('invoice_tbl')->count_all_results();
		}
	}

	public function invoice_generated_this_month(){
		$user_status		=$this->session->userdata('user_status');
		$store_id           =$this->session->userdata('store_id');
		$branch_id          =$this->session->userdata('branch_id');
		$user_id 			=$this->session->userdata('user_id');


		($user_status =='store_owner') ? 
			$store_owner_id = $this->session->userdata('user_id') : 
			$store_owner_id  =$this->session->userdata('store_owner_id');

		if($user_status =='store_owner'){

			$this->db->where('store_owner_id',$store_owner_id);
			$this->db->where('month',date('M'));
			return $this->db->from('invoice_tbl')->count_all_results();
		}elseif($user_status =='manager'){

			$this->db->where('store_id',$store_id);
			$this->db->where('branch_id',$branch_id);
			$this->db->where('month',date('M'));
			return $this->db->from('invoice_tbl')->count_all_results();
		}elseif($user_status =='sales_rep'){

			$this->db->where('store_id',$store_id);
			$this->db->where('branch_id',$branch_id);
			$this->db->where('month',date('M'));

			return $this->db->from('invoice_tbl')->count_all_results();
		}else{

			$this->db->where('month',date('M'));
			return $this->db->from('invoice_tbl')->count_all_results();
		}
	}

	public function invoice_generated_this_week(){
		$user_status		=$this->session->userdata('user_status');
		$store_id           =$this->session->userdata('store_id');
		$branch_id          =$this->session->userdata('branch_id');
		$user_id 			=$this->session->userdata('user_id');

		$week_start	=date('Y-m-d H:i:sa',strtotime('last sunday'));
        $week_end	=date('Y-m-d H:i:sa',strtotime('next sunday'));


		($user_status =='store_owner') ? 
			$store_owner_id = $this->session->userdata('user_id') : 
			$store_owner_id  =$this->session->userdata('store_owner_id');

		if($user_status =='store_owner'){

			$this->db->where('store_owner_id',$store_owner_id);

			$this->db->where('date_created >', $week_start);
        	$this->db->where('date_created <', $week_end);

			return $this->db->from('invoice_tbl')->count_all_results();
		}elseif($user_status =='manager'){

			$this->db->where('store_id',$store_id);
			$this->db->where('branch_id',$branch_id);

			$this->db->where('date_created >', $week_start);
        	$this->db->where('date_created <', $week_end);

			return $this->db->from('invoice_tbl')->count_all_results();
		}elseif($user_status =='sales_rep'){

			$this->db->where('store_id',$store_id);
			$this->db->where('branch_id',$branch_id);

			$this->db->where('date_created >', $week_start);
        	$this->db->where('date_created <', $week_end);

			return $this->db->from('invoice_tbl')->count_all_results();
		}else{

			$this->db->where('date_created >', $week_start);
        	$this->db->where('date_created <', $week_end);

			return $this->db->from('invoice_tbl')->count_all_results();
		}
	}
	
	public function invoice_generated_today(){
		$user_status		=$this->session->userdata('user_status');
		$store_id           =$this->session->userdata('store_id');
		$branch_id          =$this->session->userdata('branch_id');
		$user_id 			=$this->session->userdata('user_id');


		($user_status =='store_owner') ? 
			$store_owner_id = $this->session->userdata('user_id') : 
			$store_owner_id  =$this->session->userdata('store_owner_id');

		if($user_status =='store_owner'){

			$this->db->where('store_owner_id',$store_owner_id);
			$this->db->where('day',date('d'));
			return $this->db->from('invoice_tbl')->count_all_results();
		}elseif($user_status =='manager'){

			$this->db->where('store_id',$store_id);
			$this->db->where('branch_id',$branch_id);
			$this->db->where('day',date('d'));
			return $this->db->from('invoice_tbl')->count_all_results();
		}elseif($user_status =='sales_rep'){

			$this->db->where('store_id',$store_id);
			$this->db->where('branch_id',$branch_id);
			$this->db->where('day',date('d'));

			return $this->db->from('invoice_tbl')->count_all_results();
		}else{

			$this->db->where('day',date('d'));
			return $this->db->from('invoice_tbl')->count_all_results();
		}
	}

	public function overall_monthly_invoice(){
		
		return round($this->Admin_db->calculate_percentage($this->invoice_generated_this_month(),$this->total_invoice_generated()));
	}

	public function overall_weekly_inovice(){

		return round($this->Admin_db->calculate_percentage($this->invoice_generated_this_week(),$this->total_invoice_generated()));
	}
	public function overall_dailly_invoice(){
		// return $this->transaction_generated_today();
		// return $this->total_transaction_generated();

		return round($this->Admin_db->calculate_percentage($this->invoice_generated_today(),$this->total_invoice_generated()));
	}
	


	//Insight Activity analyst
	public function total_activity_generated(){
		$user_status		=$this->session->userdata('user_status');
		$store_id           =$this->session->userdata('store_id');
		$branch_id          =$this->session->userdata('branch_id');
		$user_id 			=$this->session->userdata('user_id');


		($user_status =='store_owner') ? 
			$store_owner_id = $this->session->userdata('user_id') : 
			$store_owner_id  =$this->session->userdata('store_owner_id');

		if($user_status =='store_owner'){

			$this->db->where('store_owner_id',$store_owner_id);
			return $this->db->from('user_activity')->count_all_results();
		}elseif($user_status =='manager'){

			$this->db->where('store_id',$store_id);
			$this->db->where('branch_id',$branch_id);
			return $this->db->from('user_activity')->count_all_results();
		}elseif($user_status =='sales_rep'){

			$this->db->where('store_id',$store_id);
			$this->db->where('branch_id',$branch_id);
			
			return $this->db->from('user_activity')->count_all_results();
		}else{

			return $this->db->from('user_activity')->count_all_results();
		}
	}

	public function activity_generated_this_month(){
		$user_status		=$this->session->userdata('user_status');
		$store_id           =$this->session->userdata('store_id');
		$branch_id          =$this->session->userdata('branch_id');
		$user_id 			=$this->session->userdata('user_id');


		($user_status =='store_owner') ? 
			$store_owner_id = $this->session->userdata('user_id') : 
			$store_owner_id  =$this->session->userdata('store_owner_id');

		if($user_status =='store_owner'){

			$this->db->where('store_owner_id',$store_owner_id);
			$this->db->where('month',date('M'));
			return $this->db->from('user_activity')->count_all_results();
		}elseif($user_status =='manager'){

			$this->db->where('store_id',$store_id);
			$this->db->where('branch_id',$branch_id);
			$this->db->where('month',date('M'));
			return $this->db->from('user_activity')->count_all_results();
		}elseif($user_status =='sales_rep'){

			$this->db->where('store_id',$store_id);
			$this->db->where('branch_id',$branch_id);
			$this->db->where('month',date('M'));

			return $this->db->from('user_activity')->count_all_results();
		}else{

			$this->db->where('month',date('M'));
			return $this->db->from('user_activity')->count_all_results();
		}
	}

	public function activity_generated_this_week(){
		$user_status		=$this->session->userdata('user_status');
		$store_id           =$this->session->userdata('store_id');
		$branch_id          =$this->session->userdata('branch_id');
		$user_id 			=$this->session->userdata('user_id');

		$week_start	=date('Y-m-d H:i:sa',strtotime('last sunday'));
        $week_end	=date('Y-m-d H:i:sa',strtotime('next sunday'));


		($user_status =='store_owner') ? 
			$store_owner_id = $this->session->userdata('user_id') : 
			$store_owner_id  =$this->session->userdata('store_owner_id');

		if($user_status =='store_owner'){

			$this->db->where('store_owner_id',$store_owner_id);

			$this->db->where('date >', $week_start);
        	$this->db->where('date <', $week_end);

			return $this->db->from('user_activity')->count_all_results();
		}elseif($user_status =='manager'){

			$this->db->where('store_id',$store_id);
			$this->db->where('branch_id',$branch_id);

			$this->db->where('date >', $week_start);
        	$this->db->where('date <', $week_end);

			return $this->db->from('user_activity')->count_all_results();
		}elseif($user_status =='sales_rep'){

			$this->db->where('store_id',$store_id);
			$this->db->where('branch_id',$branch_id);

			$this->db->where('date >', $week_start);
        	$this->db->where('date <', $week_end);

			return $this->db->from('user_activity')->count_all_results();
		}else{

			$this->db->where('date >', $week_start);
        	$this->db->where('date <', $week_end);

			return $this->db->from('user_activity')->count_all_results();
		}
	}
	
	public function activity_generated_today(){
		$user_status		=$this->session->userdata('user_status');
		$store_id           =$this->session->userdata('store_id');
		$branch_id          =$this->session->userdata('branch_id');
		$user_id 			=$this->session->userdata('user_id');


		($user_status =='store_owner') ? 
			$store_owner_id = $this->session->userdata('user_id') : 
			$store_owner_id  =$this->session->userdata('store_owner_id');

		if($user_status =='store_owner'){

			$this->db->where('store_owner_id',$store_owner_id);
			$this->db->where('day',date('d'));
			return $this->db->from('user_activity')->count_all_results();
		}elseif($user_status =='manager'){

			$this->db->where('store_id',$store_id);
			$this->db->where('branch_id',$branch_id);
			$this->db->where('day',date('d'));
			return $this->db->from('user_activity')->count_all_results();
		}elseif($user_status =='sales_rep'){

			$this->db->where('store_id',$store_id);
			$this->db->where('branch_id',$branch_id);
			$this->db->where('day',date('d'));

			return $this->db->from('user_activity')->count_all_results();
		}else{

			$this->db->where('day',date('d'));
			return $this->db->from('user_activity')->count_all_results();
		}
	}

	public function overall_monthly_activity(){
		// return $this->activity_generated_this_month();
		// return $this->total_activity_generated();
		
		return round($this->Admin_db->calculate_percentage($this->activity_generated_this_month(),$this->total_activity_generated()));
	}

	public function overall_weekly_activity(){

		return round($this->Admin_db->calculate_percentage($this->activity_generated_this_week(),$this->total_activity_generated()));
	}

	public function overall_dailly_activity(){

		return round($this->Admin_db->calculate_percentage($this->activity_generated_today(),$this->total_activity_generated()));
	}



	public function get_product_by_prod_id($prod_id){
		$this->db->where('prod_id',$prod_id);
		$query		=$this->db->get('product_tbl');
		if($query->num_rows() > 0){
			return $query->result_array();
		}
		return false;
	}

	public function update_login_tbl($email,$user_status){

		$data 	=array('user_status'=>$user_status);
		$this->db->set($data);
		$this->db->where('email',$email);
		$this->db->update('login_tbl');
		if($this->db->affected_rows() > 0){
			return true;
		}
		return false;

	}
	public function donwngrade_supervisor($id){
		$this->db->where('id',$id);
		$query 			=$this->db->get('supervisor');
		if($query->num_rows() > 0){
			foreach($query->result_array() as $row){
				// $id				        =$row['id'];
				$store_id		        =$row['store_id'];
				$store_owner_id	        =$row['store_owner_id'];
                                
				$store_name 	        =$row['store_name'];
                $branch_name            =$row['branch_store_name'];
                $branch_store_id        =$row['branch_store_id'];

                $sub_email      =$row['email'];
                $sub_name       =$row['name'];
                $sub_phone      =$row['phone_no'];

				$date			=$row['date_created'];
				$time			=$row['time'];
				$password		=$row['password'];

				$data	= array('store_id'=>$store_id,
								'store_owner_id'=>$store_owner_id,
								'store_name'=>$store_name,
								'branch_store_id'=>$branch_store_id,
								'branch_store_name'=>$branch_name,
								'name'=>$sub_name,
								'email'=>$sub_email,
								'password'=>md5($password),
								'phone_no'=>$sub_phone,
								'date_created'=>$date,
								'time'=>$time,
							);
				
				$this->db->set($data);
				$this->db->insert('sales_rep');
				if($this->db->affected_rows() > 0){
					$this->delete_supervisor($id);
					$this->update_login_tbl($sub_email,'sales_rep');
					return true;
				}
			}
		}
		return false;
	}

	public function upgrade_sales_rep($id){
		$this->db->where('id',$id);
		$query 			=$this->db->get('sales_rep');
		if($query->num_rows() > 0){
			foreach($query->result_array() as $row){
				// $id				        =$row['id'];
				$store_id		        =$row['store_id'];
				$store_owner_id	        =$row['store_owner_id'];
                                
				$store_name 	        =$row['store_name'];
                $branch_name            =$row['branch_store_name'];
                $branch_store_id        =$row['branch_store_id'];

                $sub_email      =$row['email'];
                $sub_name       =$row['name'];
                $sub_phone      =$row['phone_no'];

				$date			=$row['date_created'];
				$time			=$row['time'];
				$password		=$row['password'];

				$data	= array('store_id'=>$store_id,
								'store_owner_id'=>$store_owner_id,
								'store_name'=>$store_name,
								'branch_store_id'=>$branch_store_id,
								'branch_store_name'=>$branch_name,
								'name'=>$sub_name,
								'email'=>$sub_email,
								'password'=>md5($password),
								'phone_no'=>$sub_phone,
								'date_created'=>$date,
								'time'=>$time,
							);
				
				$this->db->set($data);
				$this->db->insert('supervisor');
				if($this->db->affected_rows() > 0){
					$this->delete_sales_rep($id);
					$this->update_login_tbl($sub_email,'manager');
					return true;
				}
			}
		}
		return false;
	}

	public function check_login_access($email){
		$this->db->where('email',$email);
		$this->db->where('login_access','unban');
		$query		=$this->db->get('login_tbl');
		if($query->num_rows() > 0){
			return true;
		}
		return false;
	}

	public function deny_user_access($email){
		$data	=array('login_access'=>'ban');
		$this->db->set($data);
		$this->db->where('email',$email);
		$this->db->update('login_tbl');
		if($this->db->affected_rows() > 0){
			return true;
		}
		return false;
	}

	public function undeny_user_access($email){
		$data	=array('login_access'=>'unban');
		$this->db->set($data);
		$this->db->where('email',$email);
		$this->db->update('login_tbl');
		if($this->db->affected_rows() > 0){
			return true;
		}
		return false;
	}

	public function edit_supervisor($store_id,$branch_id,$name,$email,$phone,$id){
		$store_owner_id 			=$this->get_store_owner_id_by_store_id($store_id);
		$store_name					=$this->get_store_name_by_store_id($store_id);
		$branch_name				=$this->get_branch_name_by_branch_id($branch_id);
		$data	=array('store_id'=>$store_id,
					   'store_owner_id'=>$store_owner_id,
					   'store_name'=>$store_name,
					   'branch_store_id'=>$branch_id,
					   'branch_store_name'=>$branch_name,
					   'name'=>$name,
					   'phone_no'=>$phone,
					);
		$this->db->set($data);
		$this->db->where('id',$id);
		$this->db->update('supervisor');
		if($this->db->affected_rows() > 0){

			
			return true;
		}
		return false;
	}

	public function edit_sales_rep($store_id,$branch_id,$name,$email,$phone,$id){
		$store_owner_id 			=$this->get_store_owner_id_by_store_id($store_id);
		$store_name					=$this->get_store_name_by_store_id($store_id);
		$branch_name				=$this->get_branch_name_by_branch_id($branch_id);
		$data	=array('store_id'=>$store_id,
					   'store_owner_id'=>$store_owner_id,
					   'store_name'=>$store_name,
					   'branch_store_id'=>$branch_id,
					   'branch_store_name'=>$branch_name,
					   'name'=>$name,
					   'phone_no'=>$phone,
					);
		$this->db->set($data);
		$this->db->where('id',$id);
		$this->db->update('sales_rep');
		if($this->db->affected_rows() > 0){

			return true;
		}
		return false;
	}


	public function count_today_transaction_history($store_id,$branch_id,$search){
		$user_status 		=$this->session->userdata('user_status');
		$user_id 			=$this->session->userdata('user_id');
		

		($user_status =='store_owner') ? 
			$store_owner_id = $this->session->userdata('user_id') : 
			$store_owner_id  =$this->session->userdata('store_owner_id');

		$keyword = $search['keyword'];
		$sort_by = $search['sort_by'];

		if($user_status == 'store_owner'){

			if(!empty($keyword)){
				$this->db->like('invoice', $this->db->escape_like_str($keyword,'both'));
				$this->db->where('store_owner_id',$store_owner_id);
				$this->db->where('year',date('Y'));
				$this->db->where('month',date('M'));
				$this->db->where('day',date('d'));

				$this->db->or_like('prod_name', $this->db->escape_like_str($keyword,'both'));
				$this->db->where('store_owner_id',$store_owner_id);
				$this->db->where('year',date('Y'));
				$this->db->where('month',date('M'));
				$this->db->where('day',date('d'));

				$this->db->or_like('customer_name', $this->db->escape_like_str($keyword,'both'));
				$this->db->where('store_owner_id',$store_owner_id);
				$this->db->where('year',date('Y'));
				$this->db->where('month',date('M'));
				$this->db->where('day',date('d'));
			}else{
				$this->db->where('store_owner_id',$store_owner_id);
				$this->db->where('year',date('Y'));
				$this->db->where('month',date('M'));
				$this->db->where('day',date('d'));
			}
			return $this->db->from('transaction_history')->count_all_results();

		}else{

			if(!empty($keyword)){
				$this->db->like('invoice', $this->db->escape_like_str($keyword,'both'));
				$this->db->where('user_id',$user_id);
				$this->db->where('branch_id',$branch_id);
				$this->db->where('user_status',$user_status);
				$this->db->where('year',date('Y'));
				$this->db->where('month',date('M'));
				$this->db->where('day',date('d'));

				$this->db->or_like('prod_name', $this->db->escape_like_str($keyword,'both'));
				$this->db->where('user_id',$user_id);
				$this->db->where('branch_id',$branch_id);
				$this->db->where('user_status',$user_status);
				$this->db->where('year',date('Y'));
				$this->db->where('month',date('M'));
				$this->db->where('day',date('d'));

				$this->db->or_like('customer_name', $this->db->escape_like_str($keyword,'both'));
				$this->db->where('user_id',$user_id);
				$this->db->where('branch_id',$branch_id);
				$this->db->where('user_status',$user_status);
				$this->db->where('year',date('Y'));
				$this->db->where('month',date('M'));
				$this->db->where('day',date('d'));
				
			}else{
				$this->db->where('user_id',$user_id);
				$this->db->where('branch_id',$branch_id);
				$this->db->where('user_status',$user_status);
				$this->db->where('year',date('Y'));
				$this->db->where('month',date('M'));
				$this->db->where('day',date('d'));
			}


			return $this->db->from('transaction_history')->count_all_results();
		}
		

		
	}

	//COME HERE FOR LATER CHANGES
	public function get_my_today_transaction_history($store_id,$branch_id,$search,$limit, $offset){
		$user_status 		=$this->session->userdata('user_status');
		$user_id 			=$this->session->userdata('user_id');
		

		($user_status =='store_owner') ? 
			$store_owner_id = $this->session->userdata('user_id') : 
			$store_owner_id  =$this->session->userdata('store_owner_id');

		$keyword = $search['keyword'];
		$sort_by = $search['sort_by'];


		if($user_status == 'store_owner'){
			if(!empty($keyword)){
				$this->db->like('invoice', $this->db->escape_like_str($keyword,'both'));
				$this->db->where('store_owner_id',$store_owner_id);
				$this->db->where('year',date('Y'));
				$this->db->where('month',date('M'));
				$this->db->where('day',date('d'));

				$this->db->or_like('prod_name', $this->db->escape_like_str($keyword,'both'));
				$this->db->where('store_owner_id',$store_owner_id);
				$this->db->where('year',date('Y'));
				$this->db->where('month',date('M'));
				$this->db->where('day',date('d'));

				$this->db->or_like('customer_name', $this->db->escape_like_str($keyword,'both'));
				$this->db->where('store_owner_id',$store_owner_id);
				$this->db->where('year',date('Y'));
				$this->db->where('month',date('M'));
				$this->db->where('day',date('d'));

			}else{
				$this->db->where('store_owner_id',$store_owner_id);
				$this->db->where('year',date('Y'));
				$this->db->where('month',date('M'));
				$this->db->where('day',date('d'));
			}
		}else{
			if(!empty($keyword)){
				$this->db->like('invoice', $this->db->escape_like_str($keyword,'both'));
				// $this->db->where('user_id',$user_id);
				$this->db->where('branch_id',$branch_id);
				$this->db->where('user_status',$user_status);
				$this->db->where('year',date('Y'));
				$this->db->where('month',date('M'));
				$this->db->where('day',date('d'));			

				$this->db->or_like('prod_name', $this->db->escape_like_str($keyword,'both'));
				// $this->db->where('user_id',$user_id);
				$this->db->where('branch_id',$branch_id);
				$this->db->where('user_status',$user_status);
				$this->db->where('year',date('Y'));
				$this->db->where('month',date('M'));
				$this->db->where('day',date('d'));

				$this->db->or_like('customer_name', $this->db->escape_like_str($keyword,'both'));
				// $this->db->where('user_id',$user_id);
				$this->db->where('branch_id',$branch_id);
				$this->db->where('user_status',$user_status);
				$this->db->where('year',date('Y'));
				$this->db->where('month',date('M'));
				$this->db->where('day',date('d'));
				
			}else{
				// $this->db->where('user_id',$user_id);
				$this->db->where('branch_id',$branch_id);
				$this->db->where('user_status',$user_status);
				$this->db->where('year',date('Y'));
				$this->db->where('month',date('M'));
				$this->db->where('day',date('d'));
			}
		}

		

		$this->db->limit($limit, $offset);
		$this->db->order_by('id',$sort_by);
		$query		=$this->db->get('transaction_history');
		if($query->num_rows() > 0){
			return $query->result_array();
		}

		return false;
	}

	public function count_transaction_history_by_date($store_id,$branch_id,$search,$start_date,$end_date){
		$user_status 		=$this->session->userdata('user_status');
		$user_id 			=$this->session->userdata('user_id');
		

		($user_status =='store_owner') ? 
			$store_owner_id = $this->session->userdata('user_id') : 
			$store_owner_id  =$this->session->userdata('store_owner_id');

		$keyword = $search['keyword'];
		$sort_by = $search['sort_by'];

		if($user_status == 'store_owner'){

			if(!empty($keyword)){
				$this->db->like('invoice', $this->db->escape_like_str($keyword,'both'));
				$this->db->where('store_owner_id',$store_owner_id);
				$this->db->where('date_created >=', date('Y-m-d',strtotime($start_date)));
				$this->db->where('date_created <=', date('Y-m-d',strtotime($end_date)));

				$this->db->or_like('prod_name', $this->db->escape_like_str($keyword,'both'));
				$this->db->where('store_owner_id',$store_owner_id);
				$this->db->where('date_created >=', date('Y-m-d',strtotime($start_date)));
				$this->db->where('date_created <=', date('Y-m-d',strtotime($end_date)));

				$this->db->or_like('customer_name', $this->db->escape_like_str($keyword,'both'));
				$this->db->where('store_owner_id',$store_owner_id);
				$this->db->where('date_created >=', date('Y-m-d',strtotime($start_date)));
				$this->db->where('date_created <=', date('Y-m-d',strtotime($end_date)));
			}else{
				$this->db->where('store_owner_id',$store_owner_id);
				$this->db->where('date_created >=', date('Y-m-d',strtotime($start_date)));
				$this->db->where('date_created <=', date('Y-m-d',strtotime($end_date)));
			}
			return $this->db->from('transaction_history')->count_all_results();

		}else{

			if(!empty($keyword)){
				$this->db->like('invoice', $this->db->escape_like_str($keyword,'both'));
				// $this->db->where('user_id',$user_id);
				$this->db->where('branch_id',$branch_id);
				$this->db->where('user_status',$user_status);
				$this->db->where('date_created >=', date('Y-m-d',strtotime($start_date)));
				$this->db->where('date_created <=', date('Y-m-d',strtotime($end_date)));

				$this->db->or_like('prod_name', $this->db->escape_like_str($keyword,'both'));
				// $this->db->where('user_id',$user_id);
				$this->db->where('branch_id',$branch_id);
				$this->db->where('user_status',$user_status);
				$this->db->where('date_created >=', date('Y-m-d',strtotime($start_date)));
				$this->db->where('date_created <=', date('Y-m-d',strtotime($end_date)));

				$this->db->or_like('customer_name', $this->db->escape_like_str($keyword,'both'));
				// $this->db->where('user_id',$user_id);
				$this->db->where('branch_id',$branch_id);
				$this->db->where('user_status',$user_status);
				$this->db->where('date_created >=', date('Y-m-d',strtotime($start_date)));
				$this->db->where('date_created <=', date('Y-m-d',strtotime($end_date)));
				
			}else{
				// $this->db->where('user_id',$user_id);
				$this->db->where('branch_id',$branch_id);
				$this->db->where('user_status',$user_status);
				$this->db->where('date_created >=', date('Y-m-d',strtotime($start_date)));
				$this->db->where('date_created <=', date('Y-m-d',strtotime($end_date)));
			}
			return $this->db->from('transaction_history')->count_all_results();
		}
		

		
	}

	public function get_transaction_history_by_date($store_id,$branch_id,$start_date, $end_date, $search,$limit, $offset){
		$user_status 		=$this->session->userdata('user_status');
		$user_id 			=$this->session->userdata('user_id');
		

		($user_status =='store_owner') ? 
			$store_owner_id = $this->session->userdata('user_id') : 
			$store_owner_id  =$this->session->userdata('store_owner_id');

		$keyword = $search['keyword'];
		$sort_by = $search['sort_by'];


		if($user_status == 'store_owner'){
			if(!empty($keyword)){
				$this->db->like('invoice', $this->db->escape_like_str($keyword,'both'));
				$this->db->where('store_owner_id',$store_owner_id);
				$this->db->where('date_created >=', date('Y-m-d',strtotime($start_date)));
				$this->db->where('date_created <=', date('Y-m-d',strtotime($end_date)));

				$this->db->or_like('prod_name', $this->db->escape_like_str($keyword,'both'));
				$this->db->where('store_owner_id',$store_owner_id);
				$this->db->where('date_created >=', date('Y-m-d',strtotime($start_date)));
				$this->db->where('date_created <=', date('Y-m-d',strtotime($end_date)));

				$this->db->or_like('customer_name', $this->db->escape_like_str($keyword,'both'));
				$this->db->where('store_owner_id',$store_owner_id);
				$this->db->where('date_created >=', date('Y-m-d',strtotime($start_date)));
				$this->db->where('date_created <=', date('Y-m-d',strtotime($end_date)));

			}else{
				$this->db->where('store_owner_id',$store_owner_id);
				$this->db->where('date_created >=', date('Y-m-d',strtotime($start_date)));
				$this->db->where('date_created <=', date('Y-m-d',strtotime($end_date)));
			}
		}else{
			if(!empty($keyword)){
				$this->db->like('invoice', $this->db->escape_like_str($keyword,'both'));
				// $this->db->where('user_id',$user_id);
				$this->db->where('branch_id',$branch_id);
				$this->db->where('user_status',$user_status);
				$this->db->where('date_created >=', date('Y-m-d',strtotime($start_date)));
				$this->db->where('date_created <=', date('Y-m-d',strtotime($end_date)));		

				$this->db->or_like('prod_name', $this->db->escape_like_str($keyword,'both'));
				// $this->db->where('user_id',$user_id);
				$this->db->where('branch_id',$branch_id);
				$this->db->where('user_status',$user_status);
				$this->db->where('date_created >=', date('Y-m-d',strtotime($start_date)));
				$this->db->where('date_created <=', date('Y-m-d',strtotime($end_date)));

				$this->db->or_like('customer_name', $this->db->escape_like_str($keyword,'both'));
				// $this->db->where('user_id',$user_id);
				$this->db->where('branch_id',$branch_id);
				$this->db->where('user_status',$user_status);
				$this->db->where('date_created >=', date('Y-m-d',strtotime($start_date)));
				$this->db->where('date_created <=', date('Y-m-d',strtotime($end_date)));
				
			}else{
				// $this->db->where('user_id',$user_id);
				$this->db->where('branch_id',$branch_id);
				$this->db->where('user_status',$user_status);
				$this->db->where('date_created >=', date('Y-m-d',strtotime($start_date)));
				$this->db->where('date_created <=', date('Y-m-d',strtotime($end_date)));
			}
		}

		

		$this->db->limit($limit, $offset);
		$this->db->order_by('id',$sort_by);
		$query		=$this->db->get('transaction_history');
		if($query->num_rows() > 0){
			return $query->result_array();
		}

		return false;
	}

	public function get_current_plan(){
		$user_status		=$this->session->userdata('user_status');

		($user_status =='store_owner') ? 
			$store_owner_id = $this->session->userdata('user_id') : 
			$store_owner_id  =$this->session->userdata('store_owner_id');

		$this->db->where('user_id',$store_owner_id);
		$query			=$this->db->get('my_plan');
		if($query->num_rows() > 0){
			foreach($query->result_array() as $row){
				$plan_id 		=$row['plan_id'];

				$this->db->where('id',$plan_id);
				$query		=$this->db->get('plan');
				if($query->num_rows() > 0){
					foreach($query->result_array() as $row){
						return $row['title'];
					}
				}
			}
		}
		return false;
	}

	public function check_if_my_plan_expire(){
		$user_status		=$this->session->userdata('user_status');

		($user_status =='store_owner') ? 
			$store_owner_id = $this->session->userdata('user_id') : 
			$store_owner_id  =$this->session->userdata('store_owner_id');

		$this->db->where('user_id',$store_owner_id);
		$query			=$this->db->get('my_plan');
		if($query->num_rows() > 0){
			foreach($query->result_array() as $row){
				return	$row['status'];
			}
		}
		return false;
	}

	public function get_current_plan_expiry_date(){
		$user_status		=$this->session->userdata('user_status');

		($user_status =='store_owner') ? 
			$store_owner_id = $this->session->userdata('user_id') : 
			$store_owner_id  =$this->session->userdata('store_owner_id');

		$this->db->where('user_id',$store_owner_id);
		$query			=$this->db->get('my_plan');
		if($query->num_rows() > 0){
			foreach($query->result_array() as $row){
				return	$row['expire_date'];
			}
		}
		return false;
	}

	public function get_current_plan_details(){
		
		$query			=$this->db->get('my_plan');
		if($query->num_rows() > 0){
			return $query->result_array();
		}
		return false;
	}

	public function update_user_plan_details($id,$user_id,$plan_id,$new_status){
		$data	=array('status'=>$new_status);
		$this->db->set($data);

		$this->db->where('id',$id);
		$this->db->where('user_id',$user_id);
		$this->db->where('plan_id',$plan_id);
		$this->db->update('my_plan');
		if($this->db->affected_rows() > 0){
			return true;
		}
		return false;
	}

	public function get_all_store_owner_product_in_stock($store_owner_id){
		$this->db->where('store_owner_id',$store_owner_id);
		$this->db->where('prod_bunk >', 0);
		$query		=$this->db->get('product_tbl');
		if($query->num_rows() > 0){
			return $query->result_array();
		}
		return false;
	}

	public function get_my_store_product_in_by_branch_id($store_owner_id,$branch_id){
		$this->db->where('store_owner_id',$store_owner_id);
		$this->db->where('prod_bunk >', 0);
		$query		=$this->db->get('product_tbl');
		if($query->num_rows() > 0){
			return $query->result_array();
		}
		return false;
	}

	public function get_all_store_owner_product_out_stock($store_owner_id){
		$this->db->where('store_owner_id',$store_owner_id);
		$this->db->where('prod_bunk <=', 0);
		$query		=$this->db->get('product_tbl');
		if($query->num_rows() > 0){
			return $query->result_array();
		}
		return false;
	}

	public function get_my_store_product_out_by_branch_id($store_owner_id,$branch_id){
		$this->db->where('store_owner_id',$store_owner_id);
		$this->db->where('prod_bunk <=', 0);
		$query		=$this->db->get('product_tbl');
		if($query->num_rows() > 0){
			return $query->result_array();
		}
		return false;
	}
	
	public function get_all_store_owner_transaction_history($store_owner_id){
		$this->db->where('store_owner_id',$store_owner_id);
		$query		=$this->db->get('transaction_history');
		if($query->num_rows() > 0){
			return $query->result_array();
		}
		return false;
	}

	public function get_my_store_transaction_history_by_branch_id($store_owner_id,$branch_id){
		$this->db->where('store_owner_id',$store_owner_id);
		$this->db->where('branch_id', $branch_id);
		$query		=$this->db->get('transaction_history');
		if($query->num_rows() > 0){
			return $query->result_array();
		}
		return false;
	}

	public function generate_product_in_stock_by_params($type,$id){
		if($type =='store'){
			$this->db->where('store_id',$id);
			$this->db->where('prod_bunk >', 0);

			$this->db->order_by('prod_name','desc');
			$query		=$this->db->get('product_tbl');
			if($query->num_rows() > 0){
				return $query->result_array();
			}

			return false;
		}elseif($type =='branch'){
			$this->db->where('branch_id',$id);
			$this->db->where('prod_bunk >', 0);

			$this->db->order_by('prod_name','desc');
			$query		=$this->db->get('product_tbl');
			if($query->num_rows() > 0){
				return $query->result_array();
			}

			return false;
		}
	}
	public function generate_product_out_stock_by_params($type,$id){
		if($type =='store'){
			$this->db->where('store_id',$id);
			$this->db->where('prod_bunk <=', 0);

			$this->db->order_by('prod_name','desc');
			$query		=$this->db->get('product_tbl');
			if($query->num_rows() > 0){
				return $query->result_array();
			}

			return false;
		}elseif($type =='branch'){
			$this->db->where('branch_id',$id);
			$this->db->where('prod_bunk <=', 0);

			$this->db->order_by('prod_name','desc');
			$query		=$this->db->get('product_tbl');
			if($query->num_rows() > 0){
				return $query->result_array();
			}

			return false;
		}
	}

	public function generate_supplier_by_params($type,$id){
		if($type=='store'){
			$this->db->where('store_id',$id);
			$query		=$this->db->get('suppliers_tbl');
			if($query->num_rows() > 0){
				return $query->result_array();
			}
			return false;
		}elseif($type =='branch'){
			$this->db->where('branch_store_id',$id);
			$query		=$this->db->get('suppliers_tbl');
			if($query->num_rows() > 0){
				return $query->result_array();
			}
			return false;
		}
	}

	public function generate_customer_by_params($type,$id){		

		if($type=='store'){
			$this->db->where('store_id',$id);
			$query		=$this->db->get('customers_tbl');
			if($query->num_rows() > 0){
				return $query->result_array();
			}
			return false;
		}elseif($type =='branch'){
			$this->db->where('branch_store_id',$id);
			$query		=$this->db->get('customers_tbl');
			if($query->num_rows() > 0){
				return $query->result_array();
			}
			return false;
		}
	}
}