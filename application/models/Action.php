<?php
class Action extends My_Model{
	public function __construct(){
		parent::__construct();
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
		$this->db->where(array('store_owner_id'=>$owner_id));
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
	public function get_my_store_sales_rep_filter_by_branch_id($user_id,$dis_branch_id){
		$this->db->where(array('store_owner_id'=>$user_id,'branch_store_id'=>$dis_branch_id));
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


	/*Customer*/
	public function count_customers($search){

		$keyword = $search['keyword'];
		$sort_by = $search['sort_by'];

		$this->db->like('name',$this->db->escape_like_str($keyword,'both'));
		$this->db->or_like('email', $this->db->escape_like_str($keyword,'both'));
    	$this->db->or_like('phone',$this->db->escape_like_str($keyword,'both'));
        $this->db->or_like('store_name', $this->db->escape_like_str($keyword,'both'));
        $this->db->or_like('branch_store_name', $this->db->escape_like_str($keyword,'both'));
		return $this->db->from('customers_tbl')->count_all_results();
	}

	public function get_my_customer($search,$limit, $offset){
		$keyword = $search['keyword'];
		$sort_by = $search['sort_by'];

		$this->db->like('name',$this->db->escape_like_str($keyword,'both'));
		$this->db->or_like('email', $this->db->escape_like_str($keyword,'both'));
    	$this->db->or_like('phone',$this->db->escape_like_str($keyword,'both'));
        $this->db->or_like('store_name', $this->db->escape_like_str($keyword,'both'));
        $this->db->or_like('branch_store_name', $this->db->escape_like_str($keyword,'both'));
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

	/*Supplier*/

	public function count_supplier($search){

		$keyword = $search['keyword'];
		$sort_by = $search['sort_by'];

		$this->db->like('name',$this->db->escape_like_str($keyword,'both'));
		$this->db->or_like('email', $this->db->escape_like_str($keyword,'both'));
    	$this->db->or_like('phone',$this->db->escape_like_str($keyword,'both'));
        $this->db->or_like('store_name', $this->db->escape_like_str($keyword,'both'));
        $this->db->or_like('branch_store_name', $this->db->escape_like_str($keyword,'both'));
		return $this->db->from('suppliers_tbl')->count_all_results();
	}

	public function get_my_supplier($search,$limit, $offset){
		$keyword = $search['keyword'];
		$sort_by = $search['sort_by'];

		$this->db->like('name',$this->db->escape_like_str($keyword,'both'));
		$this->db->or_like('email', $this->db->escape_like_str($keyword,'both'));
    	$this->db->or_like('phone',$this->db->escape_like_str($keyword,'both'));
        $this->db->or_like('store_name', $this->db->escape_like_str($keyword,'both'));
        $this->db->or_like('branch_store_name', $this->db->escape_like_str($keyword,'both'));
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

	/*Creaate Product*/
	public function create_product($img_file_name,$store_id,$store_name,$branch_id,$branch_name,$store_owner_id,$prod_name,$prod_size,$prod_bunk,$prod_cat,$prod_sub_cat,$prod_color,$prod_sup,/*$prod_brand,*/$prod_desc,$prod_cost,$prod_price,
	$prod_whole,$prod_weight,$prod_discount,$metal_title,$metal_key,$metal_desc){

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
						   'prod_whole'=>$prod_whole,
						   'prod_weight'=>$prod_weight,
						   'prod_discount'=>$prod_discount,
						   'prod_image'=>$img_file_name,
						   'meta_title'=>$metal_title,
						   'meta_key'=>$metal_key,
						   'meta_desc'=>$metal_key,
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

	public function count_products($search){

		$keyword = $search['keyword'];
		$sort_by = $search['sort_by'];

		$this->db->like('prod_name',$this->db->escape_like_str($keyword,'both'));
		$this->db->or_like('meta_title', $this->db->escape_like_str($keyword,'both'));
    	$this->db->or_like('meta_key',$this->db->escape_like_str($keyword,'both'));
    	$this->db->or_like('meta_desc',$this->db->escape_like_str($keyword,'both'));
        $this->db->or_like('store_name', $this->db->escape_like_str($keyword,'both'));
        $this->db->or_like('branch_name', $this->db->escape_like_str($keyword,'both'));
		return $this->db->from('product_tbl')->count_all_results();
	}

	public function get_products($search,$limit, $offset){
		$keyword = $search['keyword'];
		$sort_by = $search['sort_by'];

		$this->db->like('prod_name',$this->db->escape_like_str($keyword,'both'));
		$this->db->or_like('meta_title', $this->db->escape_like_str($keyword,'both'));
    	$this->db->or_like('meta_key',$this->db->escape_like_str($keyword,'both'));
    	$this->db->or_like('meta_desc',$this->db->escape_like_str($keyword,'both'));
        $this->db->or_like('store_name', $this->db->escape_like_str($keyword,'both'));
        $this->db->or_like('branch_name', $this->db->escape_like_str($keyword,'both'));
		$this->db->limit($limit, $offset);
		$this->db->order_by('prod_name',$sort_by);
		$query		=$this->db->get('product_tbl');
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

		

		if($type =='store'){

			$this->db->where('store_id',$store_id);
		}else if($type =='branch'){

			$this->db->where('branch_id', $store_id);
		}

		
		if(!empty($keyword)){
			$this->db->like('prod_name',$this->db->escape_like_str($keyword,'both'));
			$this->db->or_like('meta_title', $this->db->escape_like_str($keyword,'both'));
			$this->db->or_like('meta_key',$this->db->escape_like_str($keyword,'both'));
			$this->db->or_like('meta_desc',$this->db->escape_like_str($keyword,'both'));
			$this->db->or_like('store_name', $this->db->escape_like_str($keyword,'both'));
			$this->db->or_like('branch_name', $this->db->escape_like_str($keyword,'both'));
		}
	
		return $this->db->from('product_tbl')->count_all_results();
	}

	public function get_filter_product($search, $store_id, $type, $limit, $offset){
		$keyword = $search['keyword'];
		$sort_by = $search['sort_by'];

		if($type =='store'){

			$this->db->where('store_id',$store_id);
		}else if($type =='branch'){

			$this->db->where('branch_id', $store_id);
		}

		if(!empty($keyword)){
			$this->db->like('prod_name',$this->db->escape_like_str($keyword,'both'));
			$this->db->or_like('meta_title', $this->db->escape_like_str($keyword,'both'));
			$this->db->or_like('meta_key',$this->db->escape_like_str($keyword,'both'));
			$this->db->or_like('meta_desc',$this->db->escape_like_str($keyword,'both'));
			$this->db->or_like('store_name', $this->db->escape_like_str($keyword,'both'));
			$this->db->or_like('branch_name', $this->db->escape_like_str($keyword,'both'));
		}

		
		
		$this->db->limit($limit, $offset);
		$this->db->order_by('prod_name',$sort_by);
		$query		=$this->db->get('product_tbl');
		if($query->num_rows() > 0){
			return $query->result_array();
		}

		return false;
	}
}