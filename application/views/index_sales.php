<?php 
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

	$most_purchase 						=$this->Action->get_the_most_purchase_product();

?>
<div class="main-body">
	<div class="page-wrapper">

		<div class="page-body">
			<div class="row">
				<!-- task, page, download counter  start -->
			
				<div class="col-xl-6 col-md-6">
					<a href="<?php echo base_url();?>Pos/add_sales" style="color:white;">
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
						<a href="<?php echo base_url();?>Pos/add_sales" class="download-icon"><i class="feather icon-arrow-down"></i></a>
					</div>
					</a>
				</div>
				
				<div class="col-xl-6 col-md-6">
					<a href="<?php echo base_url();?>Pos/history" style="color:white;">
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
						<a href="<?php echo base_url();?>Pos/history" class="download-icon"><i class="feather icon-arrow-down"></i></a>
					</div>
					</a>
				</div>
				<!-- social download  end -->

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

				<div class="col-xl-12 col-md-12">
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
