<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sales_rep extends My_Controller {
	public function __construct(){
		parent::__construct();
	}

	public function index(){
		$data['content']	='add_sales';
		$this->load->view($this->layout,$data);
	}

	public function add_sales_cart_ajax(){
		$data['store_id']		='101';
		$data['branch_id']		='8';
		$data['store_owner_id']	='1';
		$data['user_id']		='1';

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
		$data['store_id']		='101';
		$data['branch_id']		='8';
		$data['store_owner_id']	='1';
		$data['user_id']		='1';

		$data['content']	='load_sales_cart';
		$this->load->view($this->layout,$data);
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
        $this->cart->update($data);
    }
    public function update_cart(){
        $row_id =$this->input->post('row_id');
        $qty    =$this->input->post('qty');
        $data   =array(
                       'rowid'=>$row_id,
                       'qty' =>$qty
                    );
        $this->cart->update($data);
    }
    public function check_out(){
        $data['alert']					=$this->session->flashdata('alert');
        $data['related_product']       =$this->Product_db->list_product_2();
        $data['content']   ='shop-checkout';
		$this->load->view($this->layout_2,$data);
    }

}
