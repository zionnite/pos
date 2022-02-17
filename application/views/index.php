<?php
	$currency               			='&#8358;';
	$count_product_in_stock 			=$this->Action->count_total_product_in_stock();
	$count_product_out_stock 			=$this->Action->count_total_product_out_of_stock();
	$count_total_transaction			=$this->Action->count_total_transaction();
	$count_total_sales	    			=$this->Action->count_total_sales();
	$count_total_item_sold    			=$this->Action->count_total_item_sold();
	$count_total_customer    			=$this->Action->count_total_customers();
	//

	$draw_chart_month					=$this->Action->draw_transaction_by_month();
	$draw_product_chart					=$this->Action->draw_product_by_month();

	$recent_activity 					=$this->Action->get_my_recent_activity($email);

	$total_product_bunk					=$this->Action->get_all_total_product_bunk();
	$total_product_in_bunk				=$this->Action->get_all_total_product_in_bunk();
	$total_product_out_bunk				=$this->Action->get_all_total_product_out_bunk();

	$per_prod_in_stock					=round($this->Admin_db->calculate_percentage($total_product_in_bunk,$total_product_bunk));
	$per_prod_out_stock					=round($this->Admin_db->calculate_percentage($total_product_out_bunk,$total_product_bunk));

	$in_stock 							=$this->Admin_db->get_comparison_number($per_prod_in_stock);
	$out_stock 							=$this->Admin_db->get_comparison_number($per_prod_out_stock);

	/*TODO*/
	$most_purchase 						=$this->Action->get_the_most_purchase_product();

	$total_category						=$this->Action->get_total_category();
	


	//overall transaction
	$overall_monthly_trans 				=$this->Action->overall_monthly_transaction();
	$overall_weekly_trans 				=$this->Action->overall_weekly_transaction();
	$overall_dailly_trans 				=$this->Action->overall_dailly_transaction();

	//overall invoices
	$overall_montly_inv					=$this->Action->overall_monthly_invoice();
	$overall_weekly_inv					=$this->Action->overall_weekly_inovice();
	$overall_daily_inv					=$this->Action->overall_dailly_invoice();

	//overal activity
	$overall_monthly_act				=$this->Action->overall_monthly_activity();
	$overall_weekly_act 				=$this->Action->overall_weekly_activity();
	$overall_daily_act					=$this->Action->overall_dailly_activity();
	

	?>
<div class="main-body">
	<div class="page-wrapper">

		<div class="page-body">
			<?php echo isset($main_alert)?$main_alert:NULL;?>
			<div class="row">
				<!-- task, page, download counter  start -->

				<!-- <div class="col-xl-6 col-md-6">
					<a href="<?php echo base_url();?>Sales_rep" style="color:white;">
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
							<a href="<?php echo base_url();?>Sales_rep" class="download-icon"><i
									class="feather icon-arrow-down"></i></a>
						</div>
					</a>
				</div> -->

				<!-- <div class="col-xl-4 col-md-4">
					<a href="<?php echo base_url();?>Transaction_history" style="color:white;">
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
							<a href="<?php echo base_url();?>Transaction_history" class="download-icon"><i
									class="feather icon-arrow-down"></i></a>
						</div>
					</a>
				</div> -->


				<!-- <div class="col-xl-4 col-md-4">
					<a href="<?php echo base_url();?>Office/view_product_in" style="color:white;">
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
							<a href="<?php echo base_url();?>Office/view_product_in" class="download-icon"><i
									class="feather icon-arrow-down"></i></a>
						</div>
					</a>
				</div>

				<div class="col-xl-4 col-md-4">
					<a href="<?php echo base_url();?>Office/view_product_out" style="color:white;">
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
							<a href="<?php echo base_url();?>Office/view_product_out" class="download-icon"><i
									class="feather icon-arrow-down"></i></a>
						</div>
					</a>
				</div> -->

				<!--total Sales-->
				<!-- <div class="col-sm-4">
					<div class="card bg-c-blue text-white widget-visitor-card">
						<div class="card-block-small text-center">
							<h2><?php echo $this->cart->format_number($count_total_transaction);?></h2>
							<h6>Total Tranasaction</h6>
							<i class="feather icon-user"></i>
						</div>
					</div>
				</div>

				<div class="col-sm-4">
					<div class="card bg-c-yellow text-white widget-visitor-card">
						<div class="card-block-small text-center">
							<h2><?php echo $currency.$this->cart->format_number($count_total_sales);?></h2>
							<h6>Total Sales</h6>
							<i class="fa fa-money-check"></i>
						</div>
					</div>
				</div>

				<div class="col-sm-4">
					<div class="card bg-c-pink text-white widget-visitor-card">
						<div class="card-block-small text-center">
							<h2><?php echo $this->cart->format_number($count_total_item_sold);?></h2>
							<h6>Total Item Sold</h6>
							<i class="fa fa-shopping-cart"></i>
						</div>
					</div>
				</div> -->

			</div>



			<div class="row">



				<div class="col-xl-3 col-md-6">
					<div class="card bg-c-green text-white">
						<div class="card-block">
							<div class="row align-items-center">
								<div class="col">
									<p class="m-b-5">Total Tranasaction</p>
									<h4 class="m-b-0"><?php echo $count_total_transaction;?>
									</h4>
								</div>
								<div class="col col-auto text-right">
									<i class="feather icon-credit-card f-50 text-c-green"></i>
								</div>
							</div>
						</div>
					</div>
				</div>


				<div class="col-xl-3 col-md-6">
					<div class="card bg-c-pink text-white">
						<div class="card-block">
							<div class="row align-items-center">
								<div class="col">
									<p class="m-b-5">Total Sales</p>
									<h4 class="m-b-0">
										<?php echo $currency.$this->cart->format_number($count_total_sales);?></h4>
								</div>
								<div class="col col-auto text-right">
									<i class="feather icon-book f-50 text-c-pink"></i>
								</div>
							</div>
						</div>
					</div>
				</div>




				<div class="col-xl-3 col-md-6">
					<div class="card bg-c-blue text-white">
						<div class="card-block">
							<div class="row align-items-center">
								<div class="col">
									<p class="m-b-5">Total Item Sold</p>
									<h4 class="m-b-0"><?php echo $this->cart->format_number($count_total_item_sold);?>
									</h4>
								</div>
								<div class="col col-auto text-right">
									<i class="feather icon-shopping-cart f-50 text-c-blue"></i>
								</div>
							</div>
						</div>
					</div>
				</div>


				<div class="col-xl-3 col-md-6">
					<div class="card bg-c-yellow text-white">
						<div class="card-block">
							<div class="row align-items-center">
								<div class="col">
									<p class="m-b-5">Customer</p>
									<h4 class="m-b-0"><?php echo $count_total_customer;?></h4>
								</div>
								<div class="col col-auto text-right">
									<i class="feather icon-user f-50 text-c-yellow"></i>
								</div>
							</div>
						</div>
					</div>
				</div>



			</div>

			

			<div class="row">
				<div class="col-xl-8 col-md-12">
					<div class="card">
						<div class="card-header">
							<div class="card-header-left ">
								<h5>Monthly View</h5>
							</div>
						</div>
						<div class="card-block-big">
							<div id="top_x_div" style="width: 900px; height: 300px;"></div>
						</div>
					</div>
				</div>

				<div class="col-xl-4 col-md-12">
					<div class="card">
						<div class="card-header">Prouduct</div>
						<div class="card-block-big">
							<div id="piechart" style="width: 200px; height: 300px;"></div>
						</div>
					</div>
				</div>
			</div>


			<!--Insight Analtyic-->
			<div class="row">

				<div class="col-md-4">
					<div class="card bg-c-pink text-white">
						<div class="card-block">
							<p class="text-white f-w-500"><i class="feather icon-chevrons-up m-r-5"></i> Transaction generated this month</p>
							<div class="row">
								<div class="col-4 b-r-default">
									<p class="text- m-b-5">Overall</p>
									<h5><?php echo $overall_monthly_trans;?>%</h5>
								</div>
								<div class="col-4 b-r-default">
									<p class="text m-b-5">Weekly</p>
									<h5><?php echo $overall_weekly_trans;?>%</h5>
								</div>
								<div class="col-4">
									<p class="text m-b-5">Day</p>
									<h5><?php echo $overall_dailly_trans;?>%</h5>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="col-md-4">
					<div class="card bg-c-yellow text-white">
						<div class="card-block">
							<p class="text-white f-w-500"><i class="feather icon-chevrons-up m-r-5"></i> Invoice generated this Month</p>
							<div class="row">
								<div class="col-4 b-r-default">
									<p class="text- m-b-5">Overall</p>
									<h5><?php echo $overall_montly_inv;?>%</h5>
								</div>
								<div class="col-4 b-r-default">
									<p class="text m-b-5">Weekly</p>
									<h5><?php echo $overall_weekly_inv;?>%</h5>
								</div>
								<div class="col-4">
									<p class="text m-b-5">Day</p>
									<h5><?php echo $overall_daily_inv;?>%</h5>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="col-md-4">
					<div class="card bg-c-green text-white">
						<div class="card-block">
							<p class="text-white f-w-500"><i class="feather icon-chevrons-up m-r-5"></i> User Activity On Store this month</p>
							<div class="row">
								<div class="col-4 b-r-default">
									<p class="text- m-b-5">Overall</p>
									<h5><?php echo $overall_monthly_act;?>%</h5>
								</div>
								<div class="col-4 b-r-default">
									<p class="text m-b-5">Weekly</p>
									<h5><?php echo $overall_weekly_act;?>%</h5>
								</div>
								<div class="col-4">
									<p class="text m-b-5">Day</p>
									<h5><?php echo $overall_daily_act;?>%</h5>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>

			<div class="row">
				<div class="col-xl-8 col-md-12">
					<div class="card feed-card">
						<div class="card-header">
							<h5>Your Recent Activity</h5>
						</div>
						<?php
							if(is_array($recent_activity)){
						?>
						<div class="card-block">
							<?php
								foreach($recent_activity as $row){
									$id						=$row['id'];
									$dis_email 				=$row['email'];
									$user_status 			=$row['user_status'];
									$path 					=$row['path'];
									$type					=$row['type'];
									$time 					=$row['time'];
									$date					=$row['date'];
									$day 					=$row['day'];
									$month					=$row['month'];
									$year					=$row['year'];

							?>
							<div class="row m-b-30">
								<div class="col-auto p-r-0">
									<?php 
												if($type =='normal'){
													echo '<i class="fa fa-check bg-simple-c-green feed-icon"></i>';
												}else if($type =='inactivity'){
													echo '<i class="fa fa-bacon bg-simple-c-yellow feed-icon"></i>';
												}else if($type =='logout'){
													echo '<i class="fa fa-sign-out-alt bg-simple-c-pink feed-icon"></i>';
												}
											?>
								</div>
								<div class="col">
									<?php
												if($type =='normal'){?>
									<h6 class="m-b-5">You visited <?php echo $path;?></h6>
									<?php
												}else if($type =='inactivity'){?>
									<h6 class="m-b-5">You were Auto-logout within 15mins of inactiveness</h6>
									<?php 
												}else if($type =='logout'){?>
									<h6 class="m-b-5">You Logout </h6>
									<?php 
												}
											?>
									<h6 class="text-muted f-left f-13"><?php $this->Admin_db->time_stamp($time);?></h6>
								</div>
							</div>
							<?php 
								}
							?>

						</div>
						<?php
							}else{
								echo '<div class="alert alert-warning">Your Activity is not yet record</div>';
							}
						?>
					</div>
				</div>

				<div class="col-xl-4 col-md-12">
					<div class="card per-task-card">
						<div class="card-header">
							<h5>Product Insight</h5>
						</div>
						<div class="card-block">
							<div class="row per-task-block text-center">
								<div class="col-6">
									<div data-label="<?php echo $per_prod_in_stock;?>%"
										class="radial-bar radial-bar-<?php echo $in_stock;?> radial-bar-lg radial-bar-primary">
									</div>
									<h6 class="text-muted">Product Instock</h6>
									<p class="text-muted"><?php echo $total_product_in_bunk;?></p>
									<a href="<?php echo base_url();?>Store_Owner/product_in" class="btn btn-primary btn-round btn-sm">Manage</a>
								</div>


								<div class="col-6">
									
									<div data-label="<?php echo $per_prod_out_stock;?>%" class="radial-bar radial-bar-<?php echo $out_stock;?> radial-bar-lg radial-bar-primary">
                                    </div>

									<h6 class="text-muted">Product Out of Stuck</h6>
									<p class="text-muted"><?php echo $total_product_out_bunk;?></p>
									<a href="<?php echo base_url();?>Store_Owner/product_out" class="btn btn-primary btn-outline-primary btn-round btn-sm">Manage</a>
								</div>
							</div>

						</div>

						

						
					</div>

					<div class="card bg-c-pink text-white" style="padding:5%; padding-bottom:13%; margin-top:8%;">
						<div class="card-block">
							<div class="row align-items-center">
								<div class="col">
									<p class="m-b-5">Total Category</p>
									<h4 class="m-b-0">
										<?php echo $total_category;?></h4>
								</div>
								<div class="col col-auto text-right">
									<i class="fa fa-sitemap f-50 text-c-pink"></i>
								</div>
							</div>
						</div>
					</div>

				</div>

			</div>



		</div>
	</div>

</div>



<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script type="text/javascript">
	google.charts.load('current', {
		'packages': ['bar']
	});
	google.charts.setOnLoadCallback(drawStuff);

	function drawStuff() {
		var data = new google.visualization.arrayToDataTable([
			['Sales Chart', 'Transaction'],
			<?php
			if (is_array($draw_chart_month)) {
				foreach($draw_chart_month as $row) {
					$month = $row['month'];
					$total_trans = $row['total_transaction'];

					echo "['".$month.
					"', '".$total_trans.
					"'],";
					// echo "['".$month."', ".$total_trans.",".$total_qty.",],";
				}
			} ?>
		]);

		var options = {
			title: 'Sales Chart',
			width: 750,
			legend: {
				position: 'none'
			},
			chart: {
				title: 'Monthly Transaction',
				subtitle: 'Sale Chart Overview'
			},
			bars: 'vertical', // Required for Material Bar Charts.
			axes: {
				x: {
					0: {
						side: 'bottom',
						label: 'Total Transaction'
					} // Top x-axis.
				}
			},
			bar: {
				groupWidth: "90%"
			}
		};

		var chart = new google.charts.Bar(document.getElementById('top_x_div'));
		chart.draw(data, options);
	};

</script>


<script type="text/javascript">
	google.charts.load('current', {
		'packages': ['corechart']
	});
	google.charts.setOnLoadCallback(drawChart);

	function drawChart() {

		var data = google.visualization.arrayToDataTable([
			['Product Name', 'In Stock'],
			<?php
			if (is_array($draw_product_chart)) {
				foreach($draw_product_chart as $row) {
					$prod_name = $row['prod_name'];
					$total_bunk = $row['prod_bunk'];

					$prod_name = preg_replace("/\s+/", "_", $prod_name);
					$prod_name = preg_replace("/\s+/", "'", $prod_name);
					$prod_name = preg_replace('/[^A-Za-z0-9\_]/', '', $prod_name);
					if($total_bunk <= '0'){
						$total_bunk = '0';
					}

					echo "['$prod_name', $total_bunk],";
				}
			} ?>
		]);

		var options = {
			title: 'Product Stock Overview',
			width: 500,
			//   is3D: true,
			pieHole: 0.4,
		};

		var chart = new google.visualization.PieChart(document.getElementById('piechart'));

		chart.draw(data, options);
	}

</script>
