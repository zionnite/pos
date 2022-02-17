<?php
    if(is_array($get_info)){
        foreach($get_info as $row){
            // $trans_id           =$row['id'];
            // $prod_id            =$row['prod_id'];
            // $prod_name          =$row['prod_name'];
            // $price              =$row['price'];
            // $color              =$row['color'];
            // $size               =$row['size'];
            // $sub_toal           =$row['sub_total'];
            // $qty                =$row['quantity'];
            // $trans_type         =$row['transaction_type'];
            // $trans_method       =$row['payment_method'];
            // $status             =$row['status'];
            // $customer_name      =$row['customer_name'];
            // $customer_id        =$row['customer_id'];
            // $u_user_status      =$row['user_status'];
            // $u_user_id          =$row['user_id'];
            // $date               =$row['date_created'];
            // $time               =$row['time'];
            // $store_id           =$row['store_id'];
            // $branch_id          =$row['branch_id'];
            // $invoice            =$row['invoice'];

            $id				        =$row['id'];
            $invoice_no				=$row['invoice_number'];

            $date			=$row['date_created'];
            $time			=$row['time'];

			$currency               ='&#8358;';

            $store_name             =$this->Action->get_store_name_by_store_id($store_id);
            $store_logo             =$this->Action->get_store_logo_by_store_id($store_id);
            $store_name_2           =$this->Action->get_store_name_2_by_store_id($store_id);

			
			// $qty					=$this->Action->get_qty_with_invoice_no($invoice_no);
			// $sub_total				=$this->Action->get_sub_total_with_invoice_no($invoice_no);
			$grand_total			=$this->Action->get_grand_total_with_invoice_no($invoice_no);
			// $transaction_type		=$this->Action->get_transaction_type_with_invoice_no($invoice_no);
			// $transaction_method		=$this->Action->get_transaction_method_with_invoice_no($invoice_no);
			// $status					=$this->Action->get_status_with_invoice_no($invoice_no);

            $branch_address         =$this->Action->get_branch_store_address($branch_id);
            $branch_email           =$this->Action->get_branch_store_email($branch_id);
            $branch_phone           =$this->Action->get_branch_store_phone($branch_id);


            $customer_name			=$this->Action->get_customer_name_with_invoice_no($invoice_no);
            $customer_id            =$this->Action->get_customer_id_with_invoice_no($invoice_no);
            $customer_phone         =$this->Action->get_customer_phone_with_customer_id($customer_id);
            $customer_email         =$this->Action->get_customer_email_with_customer_id($customer_id);
            //$customer_address       =$this->Action->get_customer_email_with_customer_id($customer_id);
            $prod_id                =$this->Action->get_prod_id_by_invoice_no($invoice_no);
            $prod_name              =$this->Action->get_prod_name_by_prod_id($prod_id);
            $prod_desc              =$this->Action->get_prod_desc_by_prod_id($prod_id);
            $prod_price             =$this->Action->get_prod_price_by_prod_id($prod_id);

?>
<div class="main-body">
    <div class="page-wrapper">
        <div class="page-body">
            <div class="container">
<div class="card">
    <div class="row invoice-contact">
        <div class="col-md-8">
            <div class="invoice-box row">
                <div class="col-sm-12">
                    <table class="table table-responsive invoice-table table-borderless">
                        <tbody>
                            <tr>
                                <td>
                                    <img style="width:100px; height:100px;"
											src="<?php echo base_url();?>store_img/<?php echo $store_name_2;?>/images/<?php echo $store_logo;?>"
											alt=""> 
                                </td>
                            </tr>
                            <tr>
                                <td><?php echo $store_name;?></td>
                            </tr>
                            <tr>
                                <td><?php echo $branch_address;?></td>
                            </tr>
                            <tr>
                                <td><a href="mailto:<?php echo $branch_email;?>" target="_top"><?php echo $branch_email;?></a>
                                </td>
                            </tr>
                            <tr>
                                <td><?php echo $branch_phone;?></td>
                            </tr>
                            <!-- <tr>
                                                            <td><a href="#" target="_blank">www.demo.com</a>
                                                            </td>
                                                        </tr> -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-4">
        </div>
    </div>
    <div class="card-block">
        <div class="row invoive-info">
            <div class="col-md-4   invoice-client-info">
                <h6>Client Information :</h6>
                <!-- <h6 class="m-0">Josephin Villa</h6>
                <p class="m-0 m-t-10">123 6th St. Melbourne, FL 32904
                    West Chicago, IL 60185</p> -->
                <p class="m-0"><?php echo $customer_phone;?></p>
                <p><?php echo $customer_email;?></p>
            </div>
            <div class="col-md-4 col-sm-6">
                <h6>Order Information :</h6>
                <table class="table table-responsive invoice-table invoice-order table-borderless">
                    <tbody>
                        <tr>
                            <th>Date :</th>
                            <td><?php echo $date;?></td>
                        </tr>
                        <!-- <tr>
                            <th>Status :</th>
                            <td>
                                <span class="label label-warning">Pending</span>
                            </td>
                        </tr> -->
                        <!-- <tr>
                            <th>Id :</th>
                            <td>
                                #<?php echo $invoice_no;?>
                            </td>
                        </tr> -->
                    </tbody>
                </table>
            </div>
            <div class="col-md-4 col-sm-6">
                <h6 class="m-b-20">Invoice Number
                    <span>#<?php echo $invoice_no;?></span></h6>
                <h6 class="text-uppercase text-primary">Total Due :
                    <span><?php echo $currency.$this->cart->format_number($grand_total);?></span>
                </h6>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="table-responsive">
                    <table class="table  invoice-detail-table">
                        <thead>
                            <tr class="thead-default">
                                <th>Product Name</th>
                                <th>Quantity</th>
                                <th>Amount</th>
                                <th>Sub Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $order_detail       =$this->Action->get_transaction_details_by_inovice($invoice_no);
                                if(is_array($order_detail)){
                                    foreach($order_detail as $row){

                                        $trans_id           =$row['id'];
                                        $prod_id            =$row['prod_id'];
                                        $prod_name          =$row['prod_name'];
                                        $price              =$row['price'];
                                        $color              =$row['color'];
                                        $size               =$row['size'];
                                        $sub_total           =$row['sub_total'];
                                        $qty                =$row['quantity'];
                                        $trans_type         =$row['transaction_type'];
                                        $trans_method       =$row['payment_method'];
                                        $status             =$row['status'];
                                        $customer_name      =$row['customer_name'];
                                        $customer_id        =$row['customer_id'];
                                        $u_user_status      =$row['user_status'];
                                        $u_user_id          =$row['user_id'];
                                        $date               =$row['date_created'];
                                        $time               =$row['time'];
                                        $store_id           =$row['store_id'];
                                        $branch_id          =$row['branch_id'];
                                        $invoice            =$row['invoice'];
                                    
                            ?>
                            <tr>
                                <td>
                                    <h6><?php echo  $prod_name;?></h6>
                                    <!-- <p>lorem ipsum dolor sit amet,
                                        consectetur adipisicing elit,
                                        sed do eiusmod tempor incididunt
                                    </p> -->
                                </td>
                                <td><?php echo $qty;?></td>
                                <td><?php echo $currency.$this->cart->format_number($price);?></td>
                                <td><?php echo $currency.$this->cart->format_number($sub_total);?></td>
                            </tr>
                            <?php 
                                    }
                                }
                            ?>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <table class="table table-responsive invoice-table invoice-total">
                    <tbody>
                        
                        <!-- <tr>
                            <th>Sub Total :</th>
                            <td>$4725.00</td>
                        </tr>
                        <tr>
                            <th>Taxes (10%) :</th>
                            <td>$57.00</td>
                        </tr>
                        <tr>
                            <th>Discount (5%) :</th>
                            <td>$45.00</td>
                        </tr> -->

                        <tr class="text-info">
                            <td>
                                <hr>
                                <h5 class="text-primary">Total :</h5>
                            </td>
                            <td>
                                <hr>
                                <h5 class="text-primary"><?php echo $currency.$this->cart->format_number($grand_total)?></h5>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        
    </div>
</div>

            </div>
        </div>
    </div>
</div>

<?php
        }
    }
?>

<!-- <a href="javascript:;" class="btn btn-sm btn-danger text-center" onclick="PrintDiv();">Print</a> -->

<script type="text/javascript">     
    function PrintDiv() {    
       var divToPrint = document.getElementById('divToPrint');
       var popupWin = window.open('', '_blank');
       popupWin.document.open();
       popupWin.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
        popupWin.document.close();
            }
 </script>