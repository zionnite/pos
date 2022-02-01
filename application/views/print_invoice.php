
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <style>
            * {
                font-size: 12px;
                font-family: 'Times New Roman';
            }

            td,
            th,
            tr,
            table {
                border-top: 1px solid black;
                border-collapse: collapse;
            }

            td.description,
            th.description {
                width: 75px;
                max-width: 75px;
                word-wrap: break-word;
            }

            td.quantity,
            th.quantity {
                width: 40px;
                max-width: 40px;
                word-break: break-all;
            }

            td.price,
            th.price {
                width: 40px;
                max-width: 40px;
                word-break: break-all;
            }

            .centered {
                text-align: center;
                align-content: center;
            }

            .ticket {
                width: 155px;
                max-width: 155px;
            }

            img {
                max-width: inherit;
                width: inherit;
                border-radius: 50%;
                width: 200px;
                height: 100px;
            }

            @media print {
                .hidden-print,
                .hidden-print * {
                    display: none !important;
                }
            }
        </style>
    </head>
    <body>
        <?php
            $currency               ='&#8358;';
            $invoice_no             =$this->session->userdata('invoice_no');

            $branch_address         =$this->Action->get_branch_store_address($branch_id);
            $branch_email           =$this->Action->get_branch_store_email($branch_id);
            $branch_phone           =$this->Action->get_branch_store_phone($branch_id);
            $store_logo             =$this->Action->get_store_logo_by_store_id($store_id);
            $store_name_2           =$this->Action->get_store_name_2_by_store_id($store_id);
        ?>
        <div class="ticket">
            <img src="<?php echo base_url();?>store_img/<?php echo $store_name_2;?>/images/<?php echo $store_logo;?>" alt="<?php echo $store_name;?>">
            <p class="centered"><?php echo $store_name;?>
                <br><?php echo $branch_address;?>
                <br><?php echo $branch_email;?></p>
            <table>
                <thead>
                    <tr>
                        <th class="quantity">Qty</th>
                        <th class="description">Description</th>
                        <th class="price"><?php echo $currency;?></th>
                    </tr>
                </thead>
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
                <tbody>
                    <tr>
                        <td class="quantity"><?php echo $qty;?></td>
                        <td class="description"><?php echo $prod_name;?></td>
                        <td class="price"><?php echo $currency.$this->cart->format_number($sub_total);?></td>
                        <!-- <td class="price"><?php // echo $currency.$this->cart->format_number($sub_total);?></td> -->
                        <!-- <td  colspan="3"><?php //echo $currency.$this->cart->format_number($sub_total);?></td> -->
                    </tr>
                <?php
                        }
                    }
                ?>
                   
                </tbody>
            </table>
            <p class="centered">Thanks for your purchase!</p>
        </div>
        <script>
            window.addEventListener("load", function(){
                window.print();
            });
        </script>
    </body>
</html>