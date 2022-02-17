<?php
class Sales_report extends My_Controller{
    public function __construct(){
        parent::__construct();
    }

    public function index($id=NULL,$sub_email=NULL){
        $this->session_checker->auto_logout();
         
        // Load the list page view 
        $data['alert']			        =$this->session->flashdata('alert');

        $data['phone_no']         		=$this->session->userdata('phone_no');
		$data['user_id']         		=$this->session->userdata('user_id');
		$data['user_name']         		=$this->session->userdata('user_name');
        $data['email']                  =$this->session->userdata('email');
        $data['store_id']               =$this->session->userdata('store_id');
        $data['store_name']             =$this->session->userdata('store_name');
        $data['branch_id']              =$this->session->userdata('branch_id');
        $data['store_owner_id']         =$this->session->userdata('store_owner_id');
        $data['user_status']            =$this->session->userdata('user_status');
        
        $data['sub_email']              =urldecode($sub_email);
        
		$data['type']	  				='default';
        $data['content']    ='sales_report';
        $this->load->view($this->layout, $data); 
    }

    public function index_ajax(){
        $data['store_id']               =$this->session->userdata('store_id');
        $data['branch_id']              =$this->session->userdata('branch_id');
		$data['store_owner_id']         =$this->session->userdata('store_owner_id');
        $data['user_status']            =$this->session->userdata('user_status');


        $search = array(
			'keyword' => trim($this->input->post('search_key')),
            'sort_by'  => $this->input->post('sortBy'),
		);

	
		$this->load->library('pagination');
		
		$limit = 100;
		$offset = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		
		$config['base_url'] = site_url('Sales_report/index_ajax/');
		$config['total_rows'] = $this->Action->count_today_transaction_history($data['store_id'], $data['branch_id'], $search);
		$config['per_page'] = $limit;
		$config['uri_segment'] = 3;
		$config['num_links'] = 3;
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li><a href="" class="current_page">';
		$config['cur_tag_close'] = '</a></li>';
		$config['next_link'] = 'Next';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['prev_link'] = 'Previous';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		
		$this->pagination->initialize($config);

		$data['get_info'] = $this->Action->get_my_today_transaction_history($data['store_id'], $data['branch_id'], $search, $limit, $offset);
	
		$data['pagelinks'] = $this->pagination->create_links();
		
		$this->load->view('transaction_history_ajax', $data);
    }

	public function dt(){
		//if($this->input->post('submit')){	
			$this->form_validation->set_rules('start_date','search term','required');
			$this->form_validation->set_rules('end_date','search term','required');
			$start_date			=$this->input->post('start_date');
			$end_date			=$this->input->post('end_date');
		
			if($this->form_validation->run() == FALSE){
				$data['alert']	='<p class="alert alert-danger" role="alert">Some Filled Were Not filled</p>';
				$this->session->set_flashdata('alert',$data['alert']);
                redirect('Sales_report/filter_by_date');
			}else{
               $this->sess_start_date($start_date);
               $this->sess_end_date($end_date);
               redirect('Sales_report/filter_by_date');
			}
		/*}else{
			echo $data['alert']	='<p class="alert alert-danger" role="alert">Please The search Form</p>';
			$this->session->set_flashdata('alert',$data['alert']);
            //redirect('Welcome/search_query');
		}*/
	}
	public function sess_start_date($qs){
		if($qs){
			$this->session->set_userdata('start_date',$qs);
			return $qs;
		}elseif($this->session->userdata('start_date')){
			$qs	=$this->session->userdata('start_date');
			return $qs;
		}elseif($this->session->userdata('start_date') != $qs){
			$qs	=$this->session->set_userdata('start_date',$qs);
			return $qs;
		}else{
			$qs	=" ";
			return $qs;
		}
	}
	public function sess_end_date($qs){
		if($qs){
			$this->session->set_userdata('end_date',$qs);
			return $qs;
		}elseif($this->session->userdata('end_date')){
			$qs	=$this->session->userdata('end_date');
			return $qs;
		}elseif($this->session->userdata('end_date') != $qs){
			$qs	=$this->session->set_userdata('end_date',$qs);
			return $qs;
		}else{
			$qs	=" ";
			return $qs;
		}
	}
	

	public function filter_by_date(){
        $this->session_checker->auto_logout();
         
        // Load the list page view 
        $data['alert']			        =$this->session->flashdata('alert');

        $data['phone_no']         		=$this->session->userdata('phone_no');
		$data['user_id']         		=$this->session->userdata('user_id');
		$data['user_name']         		=$this->session->userdata('user_name');
        $data['email']                  =$this->session->userdata('email');
        $data['store_id']               =$this->session->userdata('store_id');
        $data['store_name']             =$this->session->userdata('store_name');
        $data['branch_id']              =$this->session->userdata('branch_id');
        $data['store_owner_id']         =$this->session->userdata('store_owner_id');
        $data['user_status']            =$this->session->userdata('user_status');
        
        
		$data['type']	  				='filter_by_date';
        $data['content']    			='sales_report_by_date';
        $this->load->view($this->layout, $data); 
    }

	public function filter_by_date_ajax(){
        $data['store_id']               =$this->session->userdata('store_id');
        $data['branch_id']              =$this->session->userdata('branch_id');
		$data['store_owner_id']         =$this->session->userdata('store_owner_id');
        $data['user_status']            =$this->session->userdata('user_status');


        $search = array(
			'keyword' => trim($this->input->post('search_key')),
            'sort_by'  => $this->input->post('sortBy'),
		);


		$start_date		        			=$this->session->userdata('start_date');
		$end_date		        			=$this->session->userdata('end_date');
	
		$this->load->library('pagination');
		
		$limit = 100;
		$offset = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		
		$config['base_url'] = site_url('Sales_report/filter_by_date_ajax/');
		$config['total_rows'] = $this->Action->count_transaction_history_by_date($data['store_id'], $data['branch_id'], $search,$start_date,$end_date);
		$config['per_page'] = $limit;
		$config['uri_segment'] = 3;
		$config['num_links'] = 3;
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li><a href="" class="current_page">';
		$config['cur_tag_close'] = '</a></li>';
		$config['next_link'] = 'Next';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['prev_link'] = 'Previous';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		
		$this->pagination->initialize($config);

		
		$data['get_info'] = $this->Action->get_transaction_history_by_date($data['store_id'], $data['branch_id'],$start_date,$end_date, $search, $limit, $offset);
	
		$data['pagelinks'] = $this->pagination->create_links();
		
		$this->load->view('transaction_history_ajax', $data);
    }

	public function generate_report($report_format=NULL,$report_type=NULL,$store_id=NULL,$branch_id=NULL){
		if($report_format == 'csv'){
			$this->generate_report_supervisor_csv();
			//$this->generate_report_sales_rep_csv();

		}elseif($report_format =='excel'){

		}
		

		exit;

		//List Managers, List of Sales Rep, List of Product in stock, list of Product of of stock, list of all transaction
	}

	public function generate_report_supervisor_csv(){
		$user_id			=$this->session->userdata('user_id');
		$user_status		=$this->session->userdata('user_status');
		$branch_id 			=$this->session->userdata('branch_id');
		$store_id 			=$this->session->userdata('store_id');

		($user_status =='store_owner') ? 
			$store_owner_id = $this->session->userdata('user_id') : 
			$store_owner_id  =$this->session->userdata('store_owner_id');


		if($user_status		=='store_owner'){
			$action 			=$this->Action->get_my_store_supervisor($user_id);

			$delimiter = ","; 
			$filename = "list_of_supervisor_" . date('Y-m-d') . ".csv"; 
			
			// Create a file pointer 
			$f = fopen('php://memory', 'w'); 
			
			// Set column headers 
			$fields = array('FULL NAME', 'PHONE NUMBER', 'EMAIL', 'STORE', 'BRANCH ASSIGN', 'CREATED'); 
			fputcsv($f, $fields, $delimiter); 
			if(is_array($action)){
				foreach($action as $row){
					$id				        =$row['id'];
					$store_id		        =$row['store_id'];
					$store_owner_id	        =$row['store_owner_id'];
									
					$store_name 	        =$row['store_name'];
					$branch_name            =$row['branch_store_name'];
					$branch_store_id        =$row['branch_store_id'];

					$sub_email      		=$row['email'];
					$sub_name       		=$row['name'];
					$sub_phone      		=$row['phone_no'];

					$date					=$row['date_created'];
					$time					=$row['time'];

					$lineData = array($sub_name, $sub_phone, $sub_email, $store_name, $branch_name, $date); 
					fputcsv($f, $lineData, $delimiter); 
				}
			}else{
				$lineData = array('No data is available at the moment'); 
				fputcsv($f, $lineData, $delimiter); 
			}

			

			fseek($f, 0); 
     
		// Set headers to download file rather than displayed 
		header('Content-Type: text/csv'); 
		header('Content-Disposition: attachment; filename="' . $filename . '";'); 
		
		//output all remaining data on a file pointer 
		fpassthru($f); 
		}
		exit;
	}

	public function generate_report_sales_rep_csv(){
		$user_id			=$this->session->userdata('user_id');
		$user_status		=$this->session->userdata('user_status');
		$branch_id 			=$this->session->userdata('branch_id');
		$store_id 			=$this->session->userdata('store_id');


		($user_status =='store_owner') ? 
			$store_owner_id = $this->session->userdata('user_id') : 
			$store_owner_id  =$this->session->userdata('store_owner_id');

		if($user_status		=='store_owner'){

			($user_status =='store_owner') ? 
			$action 	= $this->Action->get_my_store_sales_rep($user_id) : 
			$action  	=$this->Action->get_my_store_sales_rep_filter_by_branch_id($store_owner_id,$branch_id);

			$delimiter = ","; 
			$filename = "list_of_sales_rep_" . date('Y-m-d') . ".csv"; 
			
			// Create a file pointer 
			$f = fopen('php://memory', 'w'); 

			// Set column headers 
			$fields = array('FULL NAME', 'PHONE NUMBER', 'EMAIL', 'STORE', 'BRANCH ASSIGN', 'CREATED'); 
			fputcsv($f, $fields, $delimiter); 
			if(is_array($action)){
				foreach($action as $row){
					$id				        =$row['id'];
					$store_id		        =$row['store_id'];
					$store_owner_id	        =$row['store_owner_id'];
									
					$store_name 	        =$row['store_name'];
					$branch_name            =$row['branch_store_name'];
					$branch_store_id        =$row['branch_store_id'];

					$sub_email      		=$row['email'];
					$sub_name       		=$row['name'];
					$sub_phone      		=$row['phone_no'];

					$date					=$row['date_created'];
					$time					=$row['time'];

					$lineData = array($sub_name, $sub_phone, $sub_email, $store_name, $branch_name, $date); 
					fputcsv($f, $lineData, $delimiter); 
				}
			}else{
				$lineData = array('No data is available at the moment'); 
				fputcsv($f, $lineData, $delimiter); 
			}

			
			

			fseek($f, 0); 

	

			
     
		// Set headers to download file rather than displayed 
		header('Content-Type: text/csv'); 
		header('Content-Disposition: attachment; filename="' . $filename . '";'); 
		
		//output all remaining data on a file pointer 
		fpassthru($f); 
		}
		exit;
	}

	public function generate_report_customer_csv(){
		$user_id			=$this->session->userdata('user_id');
		$user_status		=$this->session->userdata('user_status');
		$branch_id 			=$this->session->userdata('branch_id');
		$store_id 			=$this->session->userdata('store_id');


		($user_status =='store_owner') ? 
			$store_owner_id = $this->session->userdata('user_id') : 
			$store_owner_id  =$this->session->userdata('store_owner_id');

		if($user_status		=='store_owner'){

			($user_status =='store_owner') ? 
			$action 	= $this->Action->get_all_store_owner_customer($user_id) : 
			$action  	=$this->Action->get_my_store_customer_by_branch_id($store_owner_id,$branch_id);

			$delimiter = ","; 
			$filename = "list_of_customer_" . date('Y-m-d') . ".csv"; 
			
			// Create a file pointer 
			$f = fopen('php://memory', 'w'); 

			// Set column headers 
			$fields = array('FULL NAME', 'PHONE NUMBER', 'EMAIL', 'STORE', 'BRANCH ASSIGN', 'CREATED'); 
			fputcsv($f, $fields, $delimiter); 
			if(is_array($action)){
				foreach($action as $row){
					$id				        =$row['id'];
					$store_id		        =$row['store_id'];
					$store_owner_id	        =$row['store_owner_id'];
									
					$store_name 	        =$row['store_name'];
					$branch_name            =$row['branch_store_name'];
					$branch_store_id        =$row['branch_store_id'];

					$sub_email      		=$row['email'];
					$sub_name       		=$row['name'];
					$sub_phone      		=$row['phone'];

					$date					=$row['date_created'];
					$time					=$row['time'];

					$lineData = array($sub_name, $sub_phone, $sub_email, $store_name, $branch_name, $date); 
					fputcsv($f, $lineData, $delimiter); 
				}
			}else{
				$lineData = array('No data is available at the moment'); 
				fputcsv($f, $lineData, $delimiter); 
			}

			
			

			fseek($f, 0); 

	

			
     
		// Set headers to download file rather than displayed 
		header('Content-Type: text/csv'); 
		header('Content-Disposition: attachment; filename="' . $filename . '";'); 
		
		//output all remaining data on a file pointer 
		fpassthru($f); 
		}
		exit;
	}

	public function generate_report_supplier_csv(){
		$user_id			=$this->session->userdata('user_id');
		$user_status		=$this->session->userdata('user_status');
		$branch_id 			=$this->session->userdata('branch_id');
		$store_id 			=$this->session->userdata('store_id');


		($user_status =='store_owner') ? 
			$store_owner_id = $this->session->userdata('user_id') : 
			$store_owner_id  =$this->session->userdata('store_owner_id');

		if($user_status		=='store_owner'){

			($user_status =='store_owner') ? 
			$action 	= $this->Action->get_all_store_owner_supplier($user_id) : 
			$action  	=$this->Action->get_my_store_supplier_by_branch_id($store_owner_id,$branch_id);

			$delimiter = ","; 
			$filename = "list_of_supplier_" . date('Y-m-d') . ".csv"; 
			
			// Create a file pointer 
			$f = fopen('php://memory', 'w'); 

			// Set column headers 
			$fields = array('FULL NAME', 'PHONE NUMBER', 'EMAIL', 'STORE', 'BRANCH ASSIGN', 'CREATED'); 
			fputcsv($f, $fields, $delimiter); 
			
			if(is_array($action)){
				foreach($action as $row){
					$id				        =$row['id'];
					$store_id		        =$row['store_id'];
					$store_owner_id	        =$row['store_owner_id'];
									
					$store_name 	        =$row['store_name'];
					$branch_name            =$row['branch_store_name'];
					$branch_store_id        =$row['branch_store_id'];

					$sub_email      		=$row['email'];
					$sub_name       		=$row['name'];
					$sub_phone      		=$row['phone'];

					$date					=$row['date_created'];
					$time					=$row['time'];

					$lineData = array($sub_name, $sub_phone, $sub_email, $store_name, $branch_name, $date); 
					fputcsv($f, $lineData, $delimiter); 
				}
			}else{
				$lineData = array('No data is available at the moment'); 
				fputcsv($f, $lineData, $delimiter); 
			}

			
			

			fseek($f, 0); 

	

			
     
		// Set headers to download file rather than displayed 
		header('Content-Type: text/csv'); 
		header('Content-Disposition: attachment; filename="' . $filename . '";'); 
		
		//output all remaining data on a file pointer 
		fpassthru($f); 
		}
		exit;
	}

	public function generate_report_product_in_stock_csv(){
		$user_id			=$this->session->userdata('user_id');
		$user_status		=$this->session->userdata('user_status');
		$branch_id 			=$this->session->userdata('branch_id');
		$store_id 			=$this->session->userdata('store_id');


		($user_status =='store_owner') ? 
			$store_owner_id = $this->session->userdata('user_id') : 
			$store_owner_id  =$this->session->userdata('store_owner_id');

		if($user_status		=='store_owner'){

			($user_status =='store_owner') ? 
			$action 	= $this->Action->get_all_store_owner_product_in_stock($user_id) : 
			$action  	=$this->Action->get_my_store_product_in_by_branch_id($store_owner_id,$branch_id);

			$delimiter = ","; 
			$filename = "list_of_product_in_stock_" . date('Y-m-d') . ".csv"; 
			
			// Create a file pointer 
			$f = fopen('php://memory', 'w'); 

			// Set column headers 
			$fields = array('PRODUCT NAME', 'INVENTORY', 'COST PRICE','SELLING PRICE'); 
			fputcsv($f, $fields, $delimiter); 
			if(is_array($action)){
				foreach($action as $row){
					$prod_name              =$row['prod_name'];
					$prod_bunk              =$row['prod_bunk'];
					$prod_cost              =$row['prod_cost'];
					$prod_price             =$row['prod_price'];

					$lineData = array($prod_name, $prod_bunk, $prod_cost, $prod_price); 
					fputcsv($f, $lineData, $delimiter); 
				}
			}else{
				$lineData = array('No data is available at the moment'); 
				fputcsv($f, $lineData, $delimiter); 
			}

			
			

			fseek($f, 0); 

	

			
     
		// Set headers to download file rather than displayed 
		header('Content-Type: text/csv'); 
		header('Content-Disposition: attachment; filename="' . $filename . '";'); 
		
		//output all remaining data on a file pointer 
		fpassthru($f); 
		}
		exit;
	}

	public function generate_report_product_out_stock_csv(){
		$user_id			=$this->session->userdata('user_id');
		$user_status		=$this->session->userdata('user_status');
		$branch_id 			=$this->session->userdata('branch_id');
		$store_id 			=$this->session->userdata('store_id');


		($user_status =='store_owner') ? 
			$store_owner_id = $this->session->userdata('user_id') : 
			$store_owner_id  =$this->session->userdata('store_owner_id');

		if($user_status		=='store_owner'){

			($user_status =='store_owner') ? 
			$action 	= $this->Action->get_all_store_owner_product_out_stock($user_id) : 
			$action  	=$this->Action->get_my_store_product_out_by_branch_id($store_owner_id,$branch_id);

			$delimiter = ","; 
			$filename = "list_of_product_out_stock_" . date('Y-m-d') . ".csv"; 
			
			// Create a file pointer 
			$f = fopen('php://memory', 'w'); 

			// Set column headers 
			$fields = array('PRODUCT NAME', 'INVENTORY', 'COST PRICE','SELLING PRICE'); 
			fputcsv($f, $fields, $delimiter); 
			if(is_array($action)){
				foreach($action as $row){
					$prod_name              =$row['prod_name'];
					$prod_bunk              =$row['prod_bunk'];
					$prod_cost              =$row['prod_cost'];
					$prod_price             =$row['prod_price'];
	
					$lineData = array($prod_name, $prod_bunk, $prod_cost, $prod_price); 
					fputcsv($f, $lineData, $delimiter); 
				}
			}else{
				$lineData = array('No data is available at the moment'); 
				fputcsv($f, $lineData, $delimiter); 
			}
			

			
			

			fseek($f, 0); 

	

			
     
		// Set headers to download file rather than displayed 
		header('Content-Type: text/csv'); 
		header('Content-Disposition: attachment; filename="' . $filename . '";'); 
		
		//output all remaining data on a file pointer 
		fpassthru($f); 
		}
		exit;
	}

	public function generate_report_transaction_csv(){
		$user_id			=$this->session->userdata('user_id');
		$user_status		=$this->session->userdata('user_status');
		$branch_id 			=$this->session->userdata('branch_id');
		$store_id 			=$this->session->userdata('store_id');


		($user_status =='store_owner') ? 
			$store_owner_id = $this->session->userdata('user_id') : 
			$store_owner_id  =$this->session->userdata('store_owner_id');

		if($user_status		=='store_owner'){

			($user_status =='store_owner') ? 
			$action 	= $this->Action->get_all_store_owner_transaction_history($user_id) : 
			$action  	=$this->Action->get_my_store_transaction_history_by_branch_id($store_owner_id,$branch_id);

			$delimiter = ","; 
			$filename = "list_of_transaction_history_" . date('Y-m-d') . ".csv"; 
			
			// Create a file pointer 
			$f = fopen('php://memory', 'w'); 

			// Set column headers 
			$fields = array('PRODUCT NAME', 'CUSTOMER NAME', 'QUANTITY','SUB TOTAL','TRANSACTION TYPE','PAYMENT METHOD','DATE CREATED','STORE','BRANCH'); 
			fputcsv($f, $fields, $delimiter); 
			if(is_array($action)){
				foreach($action as $row){
					$prod_name              =$row['prod_name'];
					
					$sub_total          	=$row['sub_total'];

					$qty                	=$row['quantity'];
					$invoice_no             =$row['invoice'];

					$store_id           	=$row['store_id'];
                    $branch_id          	=$row['branch_id'];
					$date			        =$row['date_created'];
					$customer_name      	=$row['customer_name'];

					$trans_type         =$row['transaction_type'];
					$trans_method       =$row['payment_method'];

					$store_name			=$this->Action->get_store_name_by_store_id($store_id);
					$branch_name		=$this->Action->get_branch_name_by_branch_id($branch_id);
	
					$lineData = array($prod_name, $customer_name, $qty, $sub_total,$trans_type,$trans_method,$date, $store_name, $branch_name); 
					fputcsv($f, $lineData, $delimiter); 
				}
			}else{
				$lineData = array('No data is available at the moment'); 
				fputcsv($f, $lineData, $delimiter); 
			}
			

			
			

			fseek($f, 0); 

	

			
     
		// Set headers to download file rather than displayed 
		header('Content-Type: text/csv'); 
		header('Content-Disposition: attachment; filename="' . $filename . '";'); 
		
		//output all remaining data on a file pointer 
		fpassthru($f); 
		}
		exit;
	}

	public function generate_report_product_in_params_stock_csv($type=NULL,$id=NULL){

		$user_id			=$this->session->userdata('user_id');
		$user_status		=$this->session->userdata('user_status');
		$branch_id 			=$this->session->userdata('branch_id');
		$store_id 			=$this->session->userdata('store_id');


		($user_status =='store_owner') ? 
			$store_owner_id = $this->session->userdata('user_id') : 
			$store_owner_id  =$this->session->userdata('store_owner_id');

		if($user_status		=='store_owner'){

			$action 	= $this->Action->generate_product_in_stock_by_params($type,$id);
		

			$delimiter = ","; 
			$filename = "list_of_product_in_stock_" . date('Y-m-d') . ".csv"; 
			
			// Create a file pointer 
			$f = fopen('php://memory', 'w'); 

			// Set column headers 
			$fields = array('PRODUCT NAME', 'INVENTORY', 'COST PRICE','SELLING PRICE'); 
			fputcsv($f, $fields, $delimiter); 
			if(is_array($action)){
				foreach($action as $row){
					$prod_name              =$row['prod_name'];
					$prod_bunk              =$row['prod_bunk'];
					$prod_cost              =$row['prod_cost'];
					$prod_price             =$row['prod_price'];

					$lineData = array($prod_name, $prod_bunk, $prod_cost, $prod_price); 
					fputcsv($f, $lineData, $delimiter); 
				}
			}else{
				$lineData = array('No data is available at the moment'); 
				fputcsv($f, $lineData, $delimiter); 
			}

			
			

			fseek($f, 0); 

	

			
     
		// Set headers to download file rather than displayed 
		header('Content-Type: text/csv'); 
		header('Content-Disposition: attachment; filename="' . $filename . '";'); 
		
		//output all remaining data on a file pointer 
		fpassthru($f); 
		}
		exit;
	}

	public function generate_report_product_out_params_stock_csv($type=NULL,$id=NULL){

		$user_id			=$this->session->userdata('user_id');
		$user_status		=$this->session->userdata('user_status');
		$branch_id 			=$this->session->userdata('branch_id');
		$store_id 			=$this->session->userdata('store_id');


		($user_status =='store_owner') ? 
			$store_owner_id = $this->session->userdata('user_id') : 
			$store_owner_id  =$this->session->userdata('store_owner_id');

		if($user_status		=='store_owner'){

			$action 	= $this->Action->generate_product_out_stock_by_params($type,$id);
		

			$delimiter = ","; 
			$filename = "list_of_product_in_stock_" . date('Y-m-d') . ".csv"; 
			
			// Create a file pointer 
			$f = fopen('php://memory', 'w'); 

			// Set column headers 
			$fields = array('PRODUCT NAME', 'INVENTORY', 'COST PRICE','SELLING PRICE'); 
			fputcsv($f, $fields, $delimiter); 
			if(is_array($action)){
				foreach($action as $row){
					$prod_name              =$row['prod_name'];
					$prod_bunk              =$row['prod_bunk'];
					$prod_cost              =$row['prod_cost'];
					$prod_price             =$row['prod_price'];

					$lineData = array($prod_name, $prod_bunk, $prod_cost, $prod_price); 
					fputcsv($f, $lineData, $delimiter); 
				}
			}else{
				$lineData = array('No data is available at the moment'); 
				fputcsv($f, $lineData, $delimiter); 
			}

			
			

			fseek($f, 0); 

	

			
     
		// Set headers to download file rather than displayed 
		header('Content-Type: text/csv'); 
		header('Content-Disposition: attachment; filename="' . $filename . '";'); 
		
		//output all remaining data on a file pointer 
		fpassthru($f); 
		}
		exit;
	}

	public function generate_report_customer_by_params_csv($type=NULL,$id=NULL){
		$user_id			=$this->session->userdata('user_id');
		$user_status		=$this->session->userdata('user_status');
		$branch_id 			=$this->session->userdata('branch_id');
		$store_id 			=$this->session->userdata('store_id');


		($user_status =='store_owner') ? 
			$store_owner_id = $this->session->userdata('user_id') : 
			$store_owner_id  =$this->session->userdata('store_owner_id');

		if($user_status		=='store_owner'){

			$action 	= $this->Action->generate_customer_by_params($type,$id);

			$delimiter = ","; 
			$filename = "list_of_customer_" . date('Y-m-d') . ".csv"; 
			
			// Create a file pointer 
			$f = fopen('php://memory', 'w'); 

			// Set column headers 
			$fields = array('FULL NAME', 'PHONE NUMBER', 'EMAIL', 'STORE', 'BRANCH ASSIGN', 'CREATED'); 
			fputcsv($f, $fields, $delimiter); 
			if(is_array($action)){
				foreach($action as $row){
					$id				        =$row['id'];
					$store_id		        =$row['store_id'];
					$store_owner_id	        =$row['store_owner_id'];
									
					$store_name 	        =$row['store_name'];
					$branch_name            =$row['branch_store_name'];
					$branch_store_id        =$row['branch_store_id'];

					$sub_email      		=$row['email'];
					$sub_name       		=$row['name'];
					$sub_phone      		=$row['phone'];

					$date					=$row['date_created'];
					$time					=$row['time'];

					$lineData = array($sub_name, $sub_phone, $sub_email, $store_name, $branch_name, $date); 
					fputcsv($f, $lineData, $delimiter); 
				}
			}else{
				$lineData = array('No data is available at the moment'); 
				fputcsv($f, $lineData, $delimiter); 
			}

			
			

			fseek($f, 0); 

	

			
     
		// Set headers to download file rather than displayed 
		header('Content-Type: text/csv'); 
		header('Content-Disposition: attachment; filename="' . $filename . '";'); 
		
		//output all remaining data on a file pointer 
		fpassthru($f); 
		}
		exit;
	}

	public function generate_report_supplier_by_params_csv($type=NULL,$id=NULL){
		$user_id			=$this->session->userdata('user_id');
		$user_status		=$this->session->userdata('user_status');
		$branch_id 			=$this->session->userdata('branch_id');
		$store_id 			=$this->session->userdata('store_id');


		($user_status =='store_owner') ? 
			$store_owner_id = $this->session->userdata('user_id') : 
			$store_owner_id  =$this->session->userdata('store_owner_id');

		if($user_status		=='store_owner'){

			$action 	= $this->Action->generate_supplier_by_params($type,$id); 

			$delimiter = ","; 
			$filename = "list_of_supplier_" . date('Y-m-d') . ".csv"; 
			
			// Create a file pointer 
			$f = fopen('php://memory', 'w'); 

			// Set column headers 
			$fields = array('FULL NAME', 'PHONE NUMBER', 'EMAIL', 'STORE', 'BRANCH ASSIGN', 'CREATED'); 
			fputcsv($f, $fields, $delimiter); 
			
			if(is_array($action)){
				foreach($action as $row){
					$id				        =$row['id'];
					$store_id		        =$row['store_id'];
					$store_owner_id	        =$row['store_owner_id'];
									
					$store_name 	        =$row['store_name'];
					$branch_name            =$row['branch_store_name'];
					$branch_store_id        =$row['branch_store_id'];

					$sub_email      		=$row['email'];
					$sub_name       		=$row['name'];
					$sub_phone      		=$row['phone'];

					$date					=$row['date_created'];
					$time					=$row['time'];

					$lineData = array($sub_name, $sub_phone, $sub_email, $store_name, $branch_name, $date); 
					fputcsv($f, $lineData, $delimiter); 
				}
			}else{
				$lineData = array('No data is available at the moment'); 
				fputcsv($f, $lineData, $delimiter); 
			}

			
			

			fseek($f, 0); 

	

			
     
		// Set headers to download file rather than displayed 
		header('Content-Type: text/csv'); 
		header('Content-Disposition: attachment; filename="' . $filename . '";'); 
		
		//output all remaining data on a file pointer 
		fpassthru($f); 
		}
		exit;
	}


	//Escel
	public function filterData(&$str){ 
		$str = preg_replace("/\t/", "\\t", $str); 
		$str = preg_replace("/\r?\n/", "\\n", $str); 
		if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"'; 
	} 

	public function generate_report_supervisor_excel(){
		$user_id			=$this->session->userdata('user_id');
		$user_status		=$this->session->userdata('user_status');
		$branch_id 			=$this->session->userdata('branch_id');
		$store_id 			=$this->session->userdata('store_id');

		($user_status =='store_owner') ? 
			$store_owner_id = $this->session->userdata('user_id') : 
			$store_owner_id  =$this->session->userdata('store_owner_id');


		if($user_status		=='store_owner'){
			$action 			=$this->Action->get_my_store_supervisor($user_id);

			$fileName = "list_of_supervisor_" . date('Y-m-d') . ".xls"; 
			$fields = array('FULL NAME', 'PHONE NUMBER', 'EMAIL', 'STORE', 'BRANCH ASSIGN', 'CREATED'); 
			$excelData = implode("\t", array_values($fields)) . "\n"; 

			if(is_array($action)){
				foreach($action as $row){
					$id				        =$row['id'];
					$store_id		        =$row['store_id'];
					$store_owner_id	        =$row['store_owner_id'];
									
					$store_name 	        =$row['store_name'];
					$branch_name            =$row['branch_store_name'];
					$branch_store_id        =$row['branch_store_id'];

					$sub_email      		=$row['email'];
					$sub_name       		=$row['name'];
					$sub_phone      		=$row['phone_no'];

					$date					=$row['date_created'];
					$time					=$row['time'];

					$lineData = array($sub_name, $sub_phone, $sub_email, $store_name, $branch_name, $date); 
					array_walk($lineData, array($this, 'filterData'));
        			$excelData .= implode("\t", array_values($lineData)) . "\n"; 
				}
			}else{
				$excelData .= 'No records found...'. "\n"; 
			}

			

     
			header("Content-Type: application/vnd.ms-excel"); 
			header("Content-Disposition: attachment; filename=\"$fileName\""); 
			 
			// Render excel data 
			echo $excelData; 
		}
		exit;
	}

	public function generate_report_sales_rep_excel(){
		$user_id			=$this->session->userdata('user_id');
		$user_status		=$this->session->userdata('user_status');
		$branch_id 			=$this->session->userdata('branch_id');
		$store_id 			=$this->session->userdata('store_id');


		($user_status =='store_owner') ? 
			$store_owner_id = $this->session->userdata('user_id') : 
			$store_owner_id  =$this->session->userdata('store_owner_id');

		if($user_status		=='store_owner'){

			($user_status =='store_owner') ? 
			$action 	= $this->Action->get_my_store_sales_rep($user_id) : 
			$action  	=$this->Action->get_my_store_sales_rep_filter_by_branch_id($store_owner_id,$branch_id);

			$fileName = "list_of_sales_rep" . date('Y-m-d') . ".xls"; 

			// Set column headers 
			$fields = array('FULL NAME', 'PHONE NUMBER', 'EMAIL', 'STORE', 'BRANCH ASSIGN', 'CREATED'); 
			$excelData = implode("\t", array_values($fields)) . "\n"; 

			if(is_array($action)){
				foreach($action as $row){
					$id				        =$row['id'];
					$store_id		        =$row['store_id'];
					$store_owner_id	        =$row['store_owner_id'];
									
					$store_name 	        =$row['store_name'];
					$branch_name            =$row['branch_store_name'];
					$branch_store_id        =$row['branch_store_id'];

					$sub_email      		=$row['email'];
					$sub_name       		=$row['name'];
					$sub_phone      		=$row['phone_no'];

					$date					=$row['date_created'];
					$time					=$row['time'];

					$lineData = array($sub_name, $sub_phone, $sub_email, $store_name, $branch_name, $date); 
					array_walk($lineData, array($this, 'filterData'));
        			$excelData .= implode("\t", array_values($lineData)) . "\n"; 
				}
			}else{
				$excelData .= 'No records found...'. "\n"; 
			}

			
			

			header("Content-Type: application/vnd.ms-excel"); 
			header("Content-Disposition: attachment; filename=\"$fileName\""); 
			
			// Render excel data 
			echo $excelData; 
		}
		exit;
	}

	public function generate_report_customer_excel(){
		$user_id			=$this->session->userdata('user_id');
		$user_status		=$this->session->userdata('user_status');
		$branch_id 			=$this->session->userdata('branch_id');
		$store_id 			=$this->session->userdata('store_id');


		($user_status =='store_owner') ? 
			$store_owner_id = $this->session->userdata('user_id') : 
			$store_owner_id  =$this->session->userdata('store_owner_id');

		if($user_status		=='store_owner'){

			($user_status =='store_owner') ? 
			$action 	= $this->Action->get_all_store_owner_customer($user_id) : 
			$action  	=$this->Action->get_my_store_customer_by_branch_id($store_owner_id,$branch_id);

			$fileName = "list_customer_" . date('Y-m-d') . ".xls"; 

			// Set column headers 
			$fields = array('FULL NAME', 'PHONE NUMBER', 'EMAIL', 'STORE', 'BRANCH ASSIGN', 'CREATED'); 
			$excelData = implode("\t", array_values($fields)) . "\n"; 
			if(is_array($action)){
				foreach($action as $row){
					$id				        =$row['id'];
					$store_id		        =$row['store_id'];
					$store_owner_id	        =$row['store_owner_id'];
									
					$store_name 	        =$row['store_name'];
					$branch_name            =$row['branch_store_name'];
					$branch_store_id        =$row['branch_store_id'];

					$sub_email      		=$row['email'];
					$sub_name       		=$row['name'];
					$sub_phone      		=$row['phone'];

					$date					=$row['date_created'];
					$time					=$row['time'];

					$lineData = array($sub_name, $sub_phone, $sub_email, $store_name, $branch_name, $date); 
					array_walk($lineData, array($this,'filterData')); 
        			$excelData .= implode("\t", array_values($lineData)) . "\n"; 
				}
			}else{
				$excelData .= 'No records found...'. "\n"; 
			}

			
			

			header("Content-Type: application/vnd.ms-excel"); 
			header("Content-Disposition: attachment; filename=\"$fileName\""); 
			
			// Render excel data 
			echo $excelData; 
		}
		exit;
	}

	public function generate_report_supplier_excel(){
		$user_id			=$this->session->userdata('user_id');
		$user_status		=$this->session->userdata('user_status');
		$branch_id 			=$this->session->userdata('branch_id');
		$store_id 			=$this->session->userdata('store_id');


		($user_status =='store_owner') ? 
			$store_owner_id = $this->session->userdata('user_id') : 
			$store_owner_id  =$this->session->userdata('store_owner_id');

		if($user_status		=='store_owner'){

			($user_status =='store_owner') ? 
			$action 	= $this->Action->get_all_store_owner_supplier($user_id) : 
			$action  	=$this->Action->get_my_store_supplier_by_branch_id($store_owner_id,$branch_id);

			$fileName = "list_supplier_" . date('Y-m-d') . ".xls"; 

			// Set column headers 
			$fields = array('FULL NAME', 'PHONE NUMBER', 'EMAIL', 'STORE', 'BRANCH ASSIGN', 'CREATED'); 
			$excelData = implode("\t", array_values($fields)) . "\n"; 
			
			if(is_array($action)){
				foreach($action as $row){
					$id				        =$row['id'];
					$store_id		        =$row['store_id'];
					$store_owner_id	        =$row['store_owner_id'];
									
					$store_name 	        =$row['store_name'];
					$branch_name            =$row['branch_store_name'];
					$branch_store_id        =$row['branch_store_id'];

					$sub_email      		=$row['email'];
					$sub_name       		=$row['name'];
					$sub_phone      		=$row['phone'];

					$date					=$row['date_created'];
					$time					=$row['time'];

					$lineData = array($sub_name, $sub_phone, $sub_email, $store_name, $branch_name, $date); 
					array_walk($lineData, array($this,'filterData')); 
       			 	$excelData .= implode("\t", array_values($lineData)) . "\n"; 
				}
			}else{
				$excelData .= 'No records found...'. "\n"; 
			}

			
			

			header("Content-Type: application/vnd.ms-excel"); 
			header("Content-Disposition: attachment; filename=\"$fileName\""); 
			
			// Render excel data 
			echo $excelData; 
		}
		exit;
	}

	public function generate_report_product_in_stock_excel(){
		$user_id			=$this->session->userdata('user_id');
		$user_status		=$this->session->userdata('user_status');
		$branch_id 			=$this->session->userdata('branch_id');
		$store_id 			=$this->session->userdata('store_id');


		($user_status =='store_owner') ? 
			$store_owner_id = $this->session->userdata('user_id') : 
			$store_owner_id  =$this->session->userdata('store_owner_id');

		if($user_status		=='store_owner'){

			($user_status =='store_owner') ? 
			$action 	= $this->Action->get_all_store_owner_product_in_stock($user_id) : 
			$action  	=$this->Action->get_my_store_product_in_by_branch_id($store_owner_id,$branch_id);

			$fileName = "List_product_in_stock_" . date('Y-m-d') . ".xls"; 

			// Set column headers 
			$fields = array('PRODUCT NAME', 'INVENTORY', 'COST PRICE','SELLING PRICE'); 
			$excelData = implode("\t", array_values($fields)) . "\n";
			if(is_array($action)){
				foreach($action as $row){
					$prod_name              =$row['prod_name'];
					$prod_bunk              =$row['prod_bunk'];
					$prod_cost              =$row['prod_cost'];
					$prod_price             =$row['prod_price'];

					$lineData = array($prod_name, $prod_bunk, $prod_cost, $prod_price); 
					array_walk($lineData, array($this,'filterData')); 
        			$excelData .= implode("\t", array_values($lineData)) . "\n"; 
				}
			}else{
				$excelData .= 'No records found...'. "\n";
			}

			
			

			header("Content-Type: application/vnd.ms-excel"); 
			header("Content-Disposition: attachment; filename=\"$fileName\""); 
			
			// Render excel data 
			echo $excelData; 
		}
		exit;
	}

	public function generate_report_product_out_stock_excel(){
		$user_id			=$this->session->userdata('user_id');
		$user_status		=$this->session->userdata('user_status');
		$branch_id 			=$this->session->userdata('branch_id');
		$store_id 			=$this->session->userdata('store_id');


		($user_status =='store_owner') ? 
			$store_owner_id = $this->session->userdata('user_id') : 
			$store_owner_id  =$this->session->userdata('store_owner_id');

		if($user_status		=='store_owner'){

			($user_status =='store_owner') ? 
			$action 	= $this->Action->get_all_store_owner_product_out_stock($user_id) : 
			$action  	=$this->Action->get_my_store_product_out_by_branch_id($store_owner_id,$branch_id);

			$fileName = "list_product_out_of_stock_" . date('Y-m-d') . ".xls"; 

			// Set column headers 
			$fields = array('PRODUCT NAME', 'INVENTORY', 'COST PRICE','SELLING PRICE'); 
			$excelData = implode("\t", array_values($fields)) . "\n"; 
			if(is_array($action)){
				foreach($action as $row){
					$prod_name              =$row['prod_name'];
					$prod_bunk              =$row['prod_bunk'];
					$prod_cost              =$row['prod_cost'];
					$prod_price             =$row['prod_price'];
	
					$lineData = array($prod_name, $prod_bunk, $prod_cost, $prod_price); 
					array_walk($lineData, array($this,'filterData')); 
        			$excelData .= implode("\t", array_values($lineData)) . "\n"; 
				}
			}else{
				$excelData .= 'No records found...'. "\n"; 
			}
			

			
			header("Content-Type: application/vnd.ms-excel"); 
			header("Content-Disposition: attachment; filename=\"$fileName\""); 
			
			// Render excel data 
			echo $excelData; 
		}
		exit;
	}

	public function generate_report_transaction_excel(){
		$user_id			=$this->session->userdata('user_id');
		$user_status		=$this->session->userdata('user_status');
		$branch_id 			=$this->session->userdata('branch_id');
		$store_id 			=$this->session->userdata('store_id');


		($user_status =='store_owner') ? 
			$store_owner_id = $this->session->userdata('user_id') : 
			$store_owner_id  =$this->session->userdata('store_owner_id');

		if($user_status		=='store_owner'){

			($user_status =='store_owner') ? 
			$action 	= $this->Action->get_all_store_owner_transaction_history($user_id) : 
			$action  	=$this->Action->get_my_store_transaction_history_by_branch_id($store_owner_id,$branch_id);

			$fileName = "list_transaction_" . date('Y-m-d') . ".xls"; 
		
			// Set column headers 
			$fields = array('PRODUCT NAME', 'CUSTOMER NAME', 'QUANTITY','SUB TOTAL','TRANSACTION TYPE','PAYMENT METHOD','DATE CREATED','STORE','BRANCH'); 
			$excelData = implode("\t", array_values($fields)) . "\n"; 

			if(is_array($action)){
				foreach($action as $row){
					$prod_name              =$row['prod_name'];
					
					$sub_total          	=$row['sub_total'];

					$qty                	=$row['quantity'];
					$invoice_no             =$row['invoice'];

					$store_id           	=$row['store_id'];
                    $branch_id          	=$row['branch_id'];
					$date			        =$row['date_created'];
					$customer_name      	=$row['customer_name'];

					$trans_type         =$row['transaction_type'];
					$trans_method       =$row['payment_method'];

					$store_name			=$this->Action->get_store_name_by_store_id($store_id);
					$branch_name		=$this->Action->get_branch_name_by_branch_id($branch_id);
	
					$lineData = array($prod_name, $customer_name, $qty, $sub_total,$trans_type,$trans_method,$date, $store_name, $branch_name); 
					array_walk($lineData, array($this,'filterData')); 
        			$excelData .= implode("\t", array_values($lineData)) . "\n"; 
				}
			}else{
				$excelData .= 'No records found...'. "\n";  
			}
			

			
			header("Content-Type: application/vnd.ms-excel"); 
			header("Content-Disposition: attachment; filename=\"$fileName\""); 
			
			// Render excel data 
			echo $excelData; 
		}
		exit;
	}

	public function generate_report_product_in_params_stock_excel($type=NULL,$id=NULL){

		$user_id			=$this->session->userdata('user_id');
		$user_status		=$this->session->userdata('user_status');
		$branch_id 			=$this->session->userdata('branch_id');
		$store_id 			=$this->session->userdata('store_id');


		($user_status =='store_owner') ? 
			$store_owner_id = $this->session->userdata('user_id') : 
			$store_owner_id  =$this->session->userdata('store_owner_id');

		if($user_status		=='store_owner'){

			$action 	= $this->Action->generate_product_in_stock_by_params($type,$id);
		

			$fileName = "list_of_product_in_stock_by_click_filter" . date('Y-m-d') . ".xls"; 

			// Set column headers 
			$fields = array('PRODUCT NAME', 'INVENTORY', 'COST PRICE','SELLING PRICE'); 
			$excelData = implode("\t", array_values($fields)) . "\n"; 
			if(is_array($action)){
				foreach($action as $row){
					$prod_name              =$row['prod_name'];
					$prod_bunk              =$row['prod_bunk'];
					$prod_cost              =$row['prod_cost'];
					$prod_price             =$row['prod_price'];

					$lineData = array($prod_name, $prod_bunk, $prod_cost, $prod_price); 
					array_walk($lineData, array($this,'filterData')); 
        			$excelData .= implode("\t", array_values($lineData)) . "\n"; 
				}
			}else{
				$excelData .= 'No records found...'. "\n"; 
			}

			header("Content-Type: application/vnd.ms-excel"); 
			header("Content-Disposition: attachment; filename=\"$fileName\""); 
			
			// Render excel data 
			echo $excelData;
		}
		exit;
	}

	public function generate_report_product_out_params_stock_excel($type=NULL,$id=NULL){

		$user_id			=$this->session->userdata('user_id');
		$user_status		=$this->session->userdata('user_status');
		$branch_id 			=$this->session->userdata('branch_id');
		$store_id 			=$this->session->userdata('store_id');


		($user_status =='store_owner') ? 
			$store_owner_id = $this->session->userdata('user_id') : 
			$store_owner_id  =$this->session->userdata('store_owner_id');

		if($user_status		=='store_owner'){

			$action 	= $this->Action->generate_product_out_stock_by_params($type,$id);
		

			$fileName = "list_of_product_out_stock_by_click_filter" . date('Y-m-d') . ".xls"; 
			// Set column headers 
			$fields = array('PRODUCT NAME', 'INVENTORY', 'COST PRICE','SELLING PRICE'); 
			$excelData = implode("\t", array_values($fields)) . "\n"; 
			if(is_array($action)){
				foreach($action as $row){
					$prod_name              =$row['prod_name'];
					$prod_bunk              =$row['prod_bunk'];
					$prod_cost              =$row['prod_cost'];
					$prod_price             =$row['prod_price'];

					$lineData = array($prod_name, $prod_bunk, $prod_cost, $prod_price); 
					array_walk($lineData, array($this,'filterData')); 
        			$excelData .= implode("\t", array_values($lineData)) . "\n"; 
				}
			}else{
				$excelData .= 'No records found...'. "\n"; 
			}

			
			header("Content-Type: application/vnd.ms-excel"); 
			header("Content-Disposition: attachment; filename=\"$fileName\""); 
			
			// Render excel data 
			echo $excelData;
		}
		exit;
	}

	public function generate_report_customer_by_params_excel($type=NULL,$id=NULL){
		$user_id			=$this->session->userdata('user_id');
		$user_status		=$this->session->userdata('user_status');
		$branch_id 			=$this->session->userdata('branch_id');
		$store_id 			=$this->session->userdata('store_id');


		($user_status =='store_owner') ? 
			$store_owner_id = $this->session->userdata('user_id') : 
			$store_owner_id  =$this->session->userdata('store_owner_id');

		if($user_status		=='store_owner'){

			$action 	= $this->Action->generate_customer_by_params($type,$id);

			$fileName = "list_of_customer_by_filter" . date('Y-m-d') . ".xls";

			// Set column headers 
			$fields = array('FULL NAME', 'PHONE NUMBER', 'EMAIL', 'STORE', 'BRANCH ASSIGN', 'CREATED'); 
			$excelData = implode("\t", array_values($fields)) . "\n"; 
			if(is_array($action)){
				foreach($action as $row){
					$id				        =$row['id'];
					$store_id		        =$row['store_id'];
					$store_owner_id	        =$row['store_owner_id'];
									
					$store_name 	        =$row['store_name'];
					$branch_name            =$row['branch_store_name'];
					$branch_store_id        =$row['branch_store_id'];

					$sub_email      		=$row['email'];
					$sub_name       		=$row['name'];
					$sub_phone      		=$row['phone'];

					$date					=$row['date_created'];
					$time					=$row['time'];

					$lineData = array($sub_name, $sub_phone, $sub_email, $store_name, $branch_name, $date); 
					array_walk($lineData, array($this,'filterData')); 
        			$excelData .= implode("\t", array_values($lineData)) . "\n";
				}
			}else{
				$excelData .= 'No records found...'. "\n";
			}

			
			header("Content-Type: application/vnd.ms-excel"); 
			header("Content-Disposition: attachment; filename=\"$fileName\""); 
			
			// Render excel data 
			echo $excelData; 
		}
		exit;
	}
	public function generate_report_supplier_by_params_excel($type=NULL,$id=NULL){
		$user_id			=$this->session->userdata('user_id');
		$user_status		=$this->session->userdata('user_status');
		$branch_id 			=$this->session->userdata('branch_id');
		$store_id 			=$this->session->userdata('store_id');


		($user_status =='store_owner') ? 
			$store_owner_id = $this->session->userdata('user_id') : 
			$store_owner_id  =$this->session->userdata('store_owner_id');

		if($user_status		=='store_owner'){

			$action 	= $this->Action->generate_supplier_by_params($type,$id); 

			$fileName = "list_of_supplier_by_filter" . date('Y-m-d') . ".xls"; 
			// Set column headers 
			$fields = array('FULL NAME', 'PHONE NUMBER', 'EMAIL', 'STORE', 'BRANCH ASSIGN', 'CREATED'); 
			$excelData = implode("\t", array_values($fields)) . "\n"; 
			
			if(is_array($action)){
				foreach($action as $row){
					$id				        =$row['id'];
					$store_id		        =$row['store_id'];
					$store_owner_id	        =$row['store_owner_id'];
									
					$store_name 	        =$row['store_name'];
					$branch_name            =$row['branch_store_name'];
					$branch_store_id        =$row['branch_store_id'];

					$sub_email      		=$row['email'];
					$sub_name       		=$row['name'];
					$sub_phone      		=$row['phone'];

					$date					=$row['date_created'];
					$time					=$row['time'];

					$lineData = array($sub_name, $sub_phone, $sub_email, $store_name, $branch_name, $date); 
					array_walk($lineData, array($this, 'filterData')); 
        			$excelData .= implode("\t", array_values($lineData)) . "\n"; 
				}
			}else{
				$excelData .= 'No records found...'. "\n"; 
			}

			
			header("Content-Type: application/vnd.ms-excel"); 
			header("Content-Disposition: attachment; filename=\"$fileName\""); 
			 
			// Render excel data 
			echo $excelData; 
		}
		exit;
	}



}