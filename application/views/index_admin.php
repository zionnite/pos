<?php
	$currency               			='&#8358;';
	$count_store             			=$this->Action->count_all_store();
	$count_product_out_stock 			=$this->Action->count_total_product_out_of_stock();
	$count_total_transaction			=$this->Action->count_total_transaction();
	$count_total_sales	    			=$this->Action->count_total_sales();
	$count_total_item_sold    			=$this->Action->count_total_item_sold();
?>
<div class="main-body">
	<div class="page-wrapper">

		<div class="page-body">
			<div class="row">
				<!-- task, page, download counter  start -->

				<div class="col-xl-6 col-md-6">
					<a href="<?php echo base_url();?>Dashboard/view_plan" style="color:white;">
						<div class="card social-card bg-simple-c-blue">
							<div class="card-block">
								<div class="row align-items-center">
									<div class="col-auto">
										<i class="fa fa-radiation-alt f-34 text-c-blue social-icon"></i>
									</div>
									<div class="col">
										<h3 class="m-b-0">&nbsp;</h3>
                                        <h3>View</h3>
										<h4>Payment Plan</h4>

									</div>
								</div>
							</div>
							<a href="<?php echo base_url();?>Dashboard/view_plan" class="download-icon"><i
									class="feather icon-arrow-down"></i></a>
						</div>
					</a>
				</div>

				<div class="col-xl-6 col-md-6">
					<a href="<?php echo base_url();?>Dashboard/manage_store" style="color:white;">
						<div class="card social-card bg-simple-c-pink">
							<div class="card-block">
								<div class="row align-items-center">
									<div class="col-auto">
										<i class="fa fa-store f-34 text-c-pink social-icon"></i>
									</div>
									<div class="col">
										<h3 class="m-b-0">Number</h3>
										<p>Store</p>
										<h4><?php echo $count_store;?></h3>

									</div>
								</div>
							</div>
							<a href="<?php echo base_url();?>Dashboard/manage_store" class="download-icon"><i
									class="feather icon-arrow-down"></i></a>
						</div>
					</a>
				</div>

				<div class="col-xl-6 col-md-6">
					<a href="<?php echo base_url();?>Dashboard/set_payment_api" style="color:white;">
						<div class="card social-card bg-simple-c-yellow">
							<div class="card-block">
								<div class="row align-items-center">
									<div class="col-auto">
										<i class="fa fa-money-check f-34 text-c-yellow social-icon"></i>
									</div>
									<div class="col">
										<h3 class="m-b-0">&nbsp;</h3>
										<h3>Payment</h3>
										<h4>Method</h3>

									</div>
								</div>
							</div>
							<a href="<?php echo base_url();?>Dashboard/set_payment_api" class="download-icon"><i
									class="feather icon-arrow-down"></i></a>
						</div>
					</a>
				</div>


				
				<!--total Sales-->
				<!-- <div class="col-sm-4">
					<div class="card bg-c-blue text-white widget-visitor-card">
						<div class="card-block-small text-center">
							<h2><?php echo $this->cart->format_number($count_store);?></h2>
							<h6>Total Tranasaction</h6>
							<i class="feather icon-user"></i>
						</div>
					</div>
				</div> -->

				

			</div>
		</div>
	</div>

</div>
