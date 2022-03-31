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

				<?php
					$check_if_plan_expired				=$this->Action->check_if_my_plan_expire();
					$expire_date						=$this->Action->get_current_plan_expiry_date();
					if($check_if_plan_expired !='active'){
				?>
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
										$image          =$row['image'];
										$currency       ='&#8358;';
								
							?>
								<div class="col-lg-12 col-xl-3"  style="margin-top:1.5%;">
									<div class="card-sub">
										<img class="card-img-top img-fluid"
											src="<?php echo $image;?>" alt="<?php echo $title;?>">
										<div class="card-block">
											<h4 class="card-title"><?php echo $title;?></h4>
											<div style="margin-top:1.5%;">
												<p>Number of Store: <b><strong><?php echo $store_num;?></strong></b></p>
												<p>Per Month: <b><strong><?php echo $currency.$this->cart->format_number($amount/12);?></strong></b></p>
												<p>Total Amount: <b><strong><?php echo $currency.$this->cart->format_number($amount);?></strong></b></p>
											</div>
								
											<form id="paymentForm_<?php echo $id;?>">
												<input type="hidden" id="email-address" required value="<?php echo $email;?>" />
												<input type="hidden" id="amount_<?php echo $id;?>" value="<?php echo $amount;?>" />
												<input type="hidden" id="first-name" value="<?php echo $full_name;?>" />
												<input type="hidden" id="last-name" value="<?php echo $user_name;?>" />

												<a href="javascript:;" class="btn btn-danger btn-block" id="makePayment_<?php echo $id;?>" data-amount="<?php echo $amount;?>">Pay</a>
												
											</form>

											<script type="text/javascript" src="<?php echo base_url();?>files/bower_components/jquery/dist/jquery.min.js"></script>
											<script src="https://js.paystack.co/v1/inline.js"></script> 
											<script>
												function payWithPayStack() {
													var amount		=$(this).data('amount');
													
													var reference = '<?php echo $token;?>';
													var customerName = '<?php echo $full_name;?>';
													var site_name = '<?php echo $site_name;?>';
													var pay_phone = <?php echo $phone_no;?>;
													var Pay_Amount = $('#amount_<?php echo $id;?>').val();
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


												$('#makePayment_<?php echo $id;?>').click(function(e){
													e.preventDefault();
													// payWithPayStack();

													
													var reference = '<?php echo $token;?>';
													var customerName = '<?php echo $full_name;?>';
													var site_name = '<?php echo $site_name;?>';
													var pay_phone = <?php echo $phone_no;?>;
													var Pay_Amount = $('#amount_<?php echo $id;?>').val();
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
				<?php }else{?>
					<div class="col-md-12">
						<div class="alert alert-success background-primary">
				
							<strong>Your Plan is Active and it will expire on <label class="label label-danger"><?php echo $expire_date;?></label>!</strong> 
							
						</div>
					</div>
				<?php

				} ?>
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
