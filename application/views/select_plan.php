<?php

    $public_key        =$this->Admin_db->get_public_live_key();
    $private_key       =$this->Admin_db->get_private_live_key();
    //$full_name         =str_replace(" ","_",$full_name);
    $token  =time();
	$site_name      =$this->Admin_db->get_site_name();

?>
<style>
	.pagination {
		display: inline-block;
	}

	.pagination a {
		color: black;
		float: left;
		padding: 8px 16px;
		text-decoration: none;
		transition: background-color .3s;
		border: 1px solid #ddd;
		margin: 0 4px;
	}

	.pagination a.active {
		background-color: #4CAF50;
		color: white;
		border: 1px solid #4CAF50;
	}

	.pagination a:hover:not(.active) {
		background-color: #ddd;
	}

</style>
<div class="main-body">
	<div class="page-wrapper">
		<?php echo isset($main_alert)?$main_alert:NULL;?>
		<div class="page-body">
			<div class="row">


				<div class="card col-md-12">
					<div class="card-block">
						<div class="row" id="">

                        <?php
                            if(is_array($get_info)){
                                foreach($get_info as $row){

                                    $id             =$row['id'];
                                    $title          =$row['title'];
                                    $store_num      =$row['store_num'];
                                    $store_desc     =$row['store_desc'];
                                    $amount         =$row['amount'];
                                    $currency       ='&#8358;';
                            
                        ?>
							<div class="col-lg-12 col-xl-3"  style="margin-top:1.5%;">
								<div class="card-sub">
									<!-- <img class="card-img-top img-fluid"
										src="<?php echo base_url();?>files/assets/images/card-block/card1.jpg" alt="Card image cap"> -->
									<div class="card-block">
										<h4 class="card-title"><?php echo $title;?></h4>
                                        <div style="margin-top:1.5%;">
                                            <p>Number of Store: <b><strong><?php echo $store_num;?></strong></b></p>
                                            <p>Amount: <b><strong><?php echo $currency.$this->cart->format_number($amount);?></strong></b></p>
                                        </div>
										<!-- <p class="card-text"><?php echo $store_desc;?></p> -->
                                        <!-- <a href="<?php echo base_url();?>Plans/make_payment/<?php echo $id;?>" class="btn btn-danger btn-block">Select Plan</a> -->



										<!-- <form method="POST" action="https://checkout.flutterwave.com/v3/hosted/pay">
											 <input type="hidden" name="public_key" value="FLWPUBK_TEST-SANDBOXDEMOKEY-X" />
											<input type="hidden" name="public_key" value="<?php echo $public_key;?>" />
											<input type="hidden" name="customer[email]" value="<?php echo $email;?>" />
											<input type="hidden" name="customer[phone_number]" value="<?php echo $phone_no;?>" />
											<input type="hidden" name="customer[name]" value="<?php echo $full_name;?>" />
											<input type="hidden" name="meta[user_id]" value="<?php echo $user_id;?>" />
											<input type="hidden" name="meta[plan_id]" value="<?php echo $id;?>" />
											<input type="hidden" name="tx_ref" value="<?php echo time();?>" />
											<input type="hidden" name="amount" value="<?php echo $amount;?>" />
											<input type="hidden" name="currency" value="NGN" />
											<input type="hidden" name="meta[token]" value="<?php echo $token;?>" />
											<input type="hidden" name="redirect_url" value="<?php echo base_url();?>Plans/verify_payment" />

											<button type="submit" class="btn btn-danger btn-block" style="margin-top:1%;">Select Plan</button>
										</form> -->


										<form id="paymentForm_<?php echo $id;?>">
											<input type="hidden" id="email-address" required value="<?php echo $email;?>" />
											<input type="hidden" id="amount" required value="<?php echo $amount;?>" />
											<input type="hidden" id="first-name" value="<?php echo $full_name;?>" />
											<input type="hidden" id="last-name" value="<?php echo $user_name;?>" />

											<input class="btn btn-danger btn-block" id="pay" type="submit" value="Pay" />
											
										</form>

										<script type="text/javascript" src="<?php echo base_url();?>files/bower_components/jquery/dist/jquery.min.js"></script>
										<script src="https://js.paystack.co/v1/inline.js"></script> 
										<script>
											function payWithPayStack() {
												
												var reference = '<?php echo $token;?>';
												var customerName = '<?php echo $full_name;?>';
												var site_name = '<?php echo $site_name;?>';
												var pay_phone = <?php echo $phone_no;?>;
												var Pay_Amount = $('#amount').val();
												var payemail = '<?php echo $email;?>'; 
												var plan_id 	='<?php echo $id;?>';
												var user_id 	='<?php echo $user_id;?>';
												var handler = PaystackPop.setup({
															key: '<?php echo $public_key;?>',
															email: payemail,
															amount: Pay_Amount * 100,
															currency: 'NGN', 
															ref: reference,
															metadata: {
																"user_id":user_id,
																"plan_id": plan_id,
																// custom_fields: [
																// 	{
																// 		"user_id":user_id,
																// 		"plan_id": plan_id,
																// 	}
																// ]
															},
															async: false,
															callback: function(response) {
																var reference = response.reference;
     															// alert('Payment complete! Reference: ' + reference);
																window.location = "<?php echo base_url();?>Plans/verify_payment/" + response.reference;
															},
															onClose: function() {
																alert('transaction cancelled');
																return false;
															}
														});
												handler.openIframe();
											}


											$('#paymentForm_<?php echo $id;?>').click(function(e){
												e.preventDefault();
												payWithPayStack();
											});
										</script>

										
									</div>
								</div>
							</div>
							
                        <?php 
                                }
                            }
                        ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

</div>








<script type="text/javascript" src="<?php echo base_url();?>files/bower_components/jquery/dist/jquery.min.js"></script>

<script type="text/javascript">
	$(document).ready(function () {

		$('#create_customer').submit(function (e) {
			e.preventDefault();


			$.ajax({
				url: '<?php echo base_url();?>Office/create_customer',
				type: "post",
				data: new FormData(this),
				processData: false,
				contentType: false,
				cache: false,
				async: false,
				success: function (data) {
					$('#large-Modal').modal('hide');
					if (data == 'ok') {


						swal({
							title: "Success",
							text: "Sales Rep. Added to List",
							icon: "success",
							closeOnClickOutside: false,
						});

					} else if (data == 'err') {

						swal({
							title: "Oops!",
							text: "Database Could not connect to server!",
							icon: "info",
							closeOnClickOutside: false,
						});

					}
				}
			});
		});


	});

</script>
