<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sales_rep extends My_Controller {
	public function __construct(){
		parent::__construct();
	}

	public function index(){
        $this->session_checker->my_session_2();
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


		$data['content']	='add_sales';
		$this->load->view($this->layout,$data);
	}

	public function add_sales_cart_ajax(){
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

		$search_term	='';

		
		if($this->input->post('search_term')){
			$search_term	=$this->input->post('search_term');
		}
		$data['get_product']		=$this->Action->search_product_N_add_to_cart($data['store_id'],$data['branch_id'],$data['store_owner_id'],$search_term);
		

		$data['content']	='add_sales_cart_ajax';
		$this->load->view($data['content'],$data);
	}


	public function add(){
        $prod_id        =$this->input->post('prod_id');
        $prod_price     =$this->input->post('prod_price');
        $prod_name      =$this->Action->get_prod_name_by_prod_id($prod_id);
		$prod_name		=preg_replace("/[^a-zA-Z0-9\s]/", "", $prod_name);
        $quantity       =$this->input->post('prod_qty');
        $color          =$this->input->post('prod_color');
        $size           =$this->input->post('prod_size');
        
        $data   =array(
            'id'    =>$prod_id,
            'name'  =>$prod_name,
            'qty'   =>$quantity,
            'price' =>$prod_price,
            'option' =>array('color'=>$color,'size'=>$size)
        );
        if($this->cart->insert($data)){
			echo 'ok';
		}else{
			echo 'err';
		}
    }
    public function load_cart_item(){
        echo $output ='';
        echo $output    .='
                <button type="button" class="btn dropdown-toggle count_cart_item" 
                data-toggle="dropdown" id="count_cart_item"><i class="fa fa-shopping-cart"></i> Cart ('.$this->cart->total_items().')</button>
                        <ul class="dropdown-menu dropdown-menu-right dropdown-animation cart">
                            <li>
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th class="quantity">QTY</th>
                                            <th class="product">Product</th>
                                            <th class="product">Color</th>
                                            <th class="product">Size</th>
                                            <th class="amount">Subtotal</th>
                                        </tr>
                                    </thead>
                                    <tbody>';
                                        foreach($this->cart->contents() as $items){
                                            $name       =$items['name'];
                                            $price      =$items['price'];
                                            $qty        =$items['qty'];
                                            $prod_id    =$items['id'];
                                            $rowid      =$items['rowid'];
                                            $option     =$items['option'];
                                            $subtotal   =$items['subtotal'];
                                            $currency   =$this->Product_db->get_site_currency();
                                            $cat_id     =$this->Product_db->get_cat_id_by_prod_id($prod_id);
                                        echo $output= '<tr>
                                                <td class="quantity">'.$qty.'</td>
                                                <td class="product"><a href="'.base_url().'Product_ctrl/view_p/'.$prod_id.'/'.$cat_id.'">'.$name.'</a></td>
                                                <td>'.$option["color"].'</td>
                                                <td>'.$option["size"].'</td>
                                                <td class="amount">'.$currency.$this->cart->format_number($subtotal).'</td>
                                             </tr>';
                                        }
                    echo $output= '</tbody>
                                </table>
                                <div class="panel-body text-right"> <a href="'.base_url().'Product_ctrl/view_cart" class="btn btn-group btn-default btn-sm">View Cart</a> <a href="'.base_url().'Product_ctrl/check_out" class="btn btn-group btn-default btn-sm">Checkout</a> </div>
                            </li>
                        </ul>';

    }
    public function count_cart_items(){
        echo $output ='';
        echo $output    .='<i class="fa fa-shopping-cart"></i> Cart ('.$this->cart->total_items().')';
		

    }
	public function count_cart_item_detail(){
		$output	='';
		$output	.='
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th class="quantity">QTY</th>
                                            <th class="product">Product</th>
                                            <th class="product">Color</th>
                                            <th class="product">Size</th>
                                            <th class="amount">Subtotal</th>
                                        </tr>
                                    </thead>
                                    <tbody>';
                                        foreach($this->cart->contents() as $items){
                                            $name       =$items['name'];
                                            $price      =$items['price'];
                                            $qty        =$items['qty'];
                                            $prod_id    =$items['id'];
                                            $rowid      =$items['rowid'];
                                            $option     =$items['option'];
                                            $subtotal   =$items['subtotal'];
                                            $currency   =$this->Product_db->get_site_currency();
                                            $cat_id     =$this->Product_db->get_cat_id_by_prod_id($prod_id);
                                         $output= '<tr>
                                                <td class="quantity">'.$qty.'</td>
                                                <td class="product"><a href="'.base_url().'Product_ctrl/view_p/'.$prod_id.'/'.$cat_id.'">'.$name.'</a></td>
                                                <td>'.$option["color"].'</td>
                                                <td>'.$option["size"].'</td>
                                                <td class="amount">'.$currency.$this->cart->format_number($subtotal).'</td>
                                             </tr>';
                                        }
                     $output= '</tbody>
                                </table>
                                <div class="panel-body text-right"> <a href="'.base_url().'Product_ctrl/view_cart" class="btn btn-group btn-default btn-sm">View Cart</a> <a href="'.base_url().'Product_ctrl/check_out" class="btn btn-group btn-default btn-sm">Checkout</a> </div>
                            </li>
                        </ul>';//356052045262327
		echo $output;
    }

	public function load_sales_cart(){
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

		$data['content']	='load_sales_cart';
		$this->load->view($this->layout,$data);
	}

	public function load_sales_cart_ajax(){
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

		$data['content']	='load_sales_cart';
		$this->load->view($data['content'],$data);
	}
    public function clear_cart(){
        $this->cart->destroy();
    }
    public function view_cart(){
        $data['alert']					=$this->session->flashdata('alert');
        $data['related_product']       =$this->Product_db->list_product_2();
        $data['content']   ='shop-cart';
		$this->load->view($this->layout_2,$data);
    }
    public function remove_cart(){
        $row_id =$this->input->post('row_id');
        $data   =array(
                       'rowid'=>$row_id,
                       'qty' =>0
                    );
        if($this->cart->update($data)){
			echo 'ok';
		}else{
			echo 'err';
		}
    }
    public function update_cart(){
        $row_id =$this->input->post('row_id');
        $qty    =$this->input->post('qty');
        $data   =array(
                       'rowid'=>$row_id,
                       'qty' =>$qty
                    );
        if($this->cart->update($data)){
			echo 'ok';
		}else{
			echo 'err';
		}
    }
    public function check_out(){
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


		$result	='';
		$invoice_no					= random_string('alnum', 8);
		$invoice_no					= $invoice_no.date('d');
	
		$store_id 					=$data['store_id'];
		$branch_id					=$data['branch_id'];
		$trans_type					=$this->input->post('trans_type');
		$trans_method				=$this->input->post('trans_method');
		$trans_customer				=$this->input->post('trans_customer');
		$trans_note					=$this->input->post('trans_note');

		$cart_content				=$this->cart->contents();
		// print_r($cart_content);
		if(is_array($cart_content)){
			foreach($cart_content as $items){
				$name       =$items['name'];
                $price      =$items['price'];
                $qty        =$items['qty'];
                $prod_id    =$items['id'];
                $rowid      =$items['rowid'];
                $option     =$items['option'];
                $subtotal   =$items['subtotal'];
				$color		=$option['color'];
				$size		=$option['size'];
				



				$action				=$this->Action->add_transaction($name,$prod_id,$price,$qty,$subtotal,$color,$size,$trans_type,$trans_method,
									 $trans_customer,$trans_note,$data['user_status'],$data['user_id'],$invoice_no,$store_id,$branch_id);
				if($action){
					$result ='ok';
				}else{
					$result ='err';
				}
			}
		}else{
			$result ='err';
		}

		if($result =='ok'){
			$this->clear_cart();
		}
		
		echo $result;
    }

}