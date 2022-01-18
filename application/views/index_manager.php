<?php
	$currency               			='&#8358;';
	$count_product_in_stock 			=$this->Action->count_total_product_in_stock();
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
					<a href="<?php echo base_url();?>Manager/add_sale" style="color:white;">
						<div class="card social-card bg-simple-c-blue">
							<div class="card-block">
								<div class="row align-items-center">
									<div class="col-auto">
										<i class="fa fa-cart-plus f-34 text-c-blue social-icon"></i>
									</div>
									<div class="col">
										<h3 class="m-b-0">New</h3>
										<p>Transaction</p>

									</div>
								</div>
							</div>
							<a href="<?php echo base_url();?>Manager/add_sale" class="download-icon"><i
									class="feather icon-arrow-down"></i></a>
						</div>
					</a>
				</div>

				<div class="col-xl-6 col-md-6">
					<a href="<?php echo base_url();?>Manager/history" style="color:white;">
						<div class="card social-card bg-simple-c-pink">
							<div class="card-block">
								<div class="row align-items-center">
									<div class="col-auto">
										<i class="fa fa-sort-amount-up-alt f-34 text-c-pink social-icon"></i>
									</div>
									<div class="col">
										<h3 class="m-b-0">History</h3>
										<p>Transaction History</p>

									</div>
								</div>
							</div>
							<a href="<?php echo base_url();?>Manager/history" class="download-icon"><i
									class="feather icon-arrow-down"></i></a>
						</div>
					</a>
				</div>


				<div class="col-xl-6 col-md-6">
					<a href="<?php echo base_url();?>Manager/product_in" style="color:white;">
						<div class="card social-card bg-simple-c-yellow">
							<div class="card-block">
								<div class="row align-items-center">
									<div class="col-auto">
										<i class="fa fa-store-alt f-34 text-c-yellow social-icon"></i>
									</div>
									<div class="col">
										<h3 class="m-b-0">Product</h3>
										<p>Product In-Stock</p>
										<h4><?php echo $this->cart->format_number($count_product_in_stock);?></h4>
									</div>
								</div>
							</div>
							<a href="<?php echo base_url();?>Manager/product_in" class="download-icon"><i
									class="feather icon-arrow-down"></i></a>
						</div>
					</a>
				</div>

				<div class="col-xl-6 col-md-6">
					<a href="<?php echo base_url();?>Manager/product_out" style="color:white;">
						<div class="card social-card bg-simple-c-green">
							<div class="card-block">
								<div class="row align-items-center">
									<div class="col-auto">
										<i class="fa fa-wind f-34 text-c-green social-icon"></i>
									</div>
									<div class="col">
										<h3 class="m-b-0">Product</h3>
										<p>Product Out-of-Stock</p>
										<h4><?php echo $this->cart->format_number($count_product_out_stock);?></h4>
									</div>
								</div>
							</div>
							<a href="<?php echo base_url();?>Manager/product_out" class="download-icon"><i
									class="feather icon-arrow-down"></i></a>
						</div>
					</a>
				</div>

				<!--total Sales-->
				<div class="col-sm-4">
					<div class="card bg-c-blue text-white widget-visitor-card">
						<div class="card-block-small text-center">
							<h2><?php echo $this->cart->format_number($count_total_transaction);?></h2>
							<h6>Total Tranasaction</h6>
							<i class="feather icon-usedr"></i>
						</div>
					</div>
				</div>

				<div class="col-sm-4">
					<div class="card bg-c-yellow text-white widget-visitor-card">
						<div class="card-block-small text-center">
							<h2><?php echo $currency.$this->cart->format_number($count_total_sales);?></h2>
							<h6>Total Sales</h6>
							<i class="feather icon-usedr"></i>
						</div>
					</div>
				</div>

				<div class="col-sm-4">
					<div class="card bg-c-pink text-white widget-visitor-card">
						<div class="card-block-small text-center">
							<h2><?php echo $this->cart->format_number($count_total_item_sold);?></h2>
							<h6>Total Item Sold</h6>
							<i class="feather icon-usder"></i>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>

</div>
