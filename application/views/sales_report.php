<?php
	$currency               			='&#8358;';
	$count_product_in_stock 			=$this->Action->count_total_product_in_stock();
	$count_product_out_stock 			=$this->Action->count_total_product_out_of_stock();
	$count_total_transaction			=$this->Action->count_total_transaction();
	$count_total_sales	    			=$this->Action->count_total_sales();
	$count_today_sales	    			=$this->Action->count_today_sales();
	$count_total_item_sold    			=$this->Action->count_total_item_sold();
	$count_total_customer    			=$this->Action->count_total_customers();
	$total_invoice_generated    		=$this->Action->total_invoice_generated();
    $count_product_out_stock 			=$this->Action->count_total_product_out_of_stock();
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
	$most_customer 						=$this->Action->get_the_most_purchase_customer();
    print_r($most_purchase);
    // print_r($most_customer);

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
					<div class="card bg-c-green text-white">
						<div class="card-block">
							<div class="row align-items-center">
								<div class="col">
									<p class="m-b-5">Today Sales</p>
									<h4 class="m-b-0">
                                        <?php echo $currency.$this->cart->format_number($count_today_sales);?></h4>
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
					<div class="card bg-c-blue text-white">
						<div class="card-block">
							<div class="row align-items-center">
								<div class="col">
									<p class="m-b-5">Total Invoice issued</p>
									<h4 class="m-b-0"><?php echo $total_invoice_generated;?>
									</h4>
								</div>
								<div class="col col-auto text-right">
									<i class="fa fa-receipt f-50 text-c-blue"></i>
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
									<p class="m-b-5">Stock Alert</p>
									<h4 class="m-b-0"><?php echo $count_product_out_stock;?></h4>
								</div>
								<div class="col col-auto text-right">
									<i class="feather icon-layers f-50 text-c-yellow"></i>
								</div>
							</div>
						</div>
					</div>
				</div>



			</div>

			<div class="row">



				<div class="col-md-12">
					<div class="card">
						<div class="card-block">
							<form>
								<input type="text" class="form-control" name="keywords" id="keywords"
									onkeyup="searchFilter();" />
								<small style="color:red;"><b>search with invoice number, Product name, customer name</b></small>
							</form>
						</div>
					</div>
				</div>

				<div class="col-md-12" id="slideshow">
					<div class="card" id="slide_show">
						<div class="card-header">
							<h5>Today Transaction </h5>

						</div>

						<?php
					
							($user_status =='store_owner') ? 
                                $get_store          =$this->Action->get_store($user_id)
								:
								$get_store			=$this->Action->get_store($store_owner_id);

							($user_status =='store_owner') ? 
								$get_store_branch		=$this->Action->get_store_branches_by_owner_id($user_id)
								:
								$get_store_branch		=$this->Action->get_store_branches_by_owner_id($store_owner_id);
							
							
						?>

						<div class="card-block">
							

							<div class="my_filter" style="margin-bottom:1%; float:right;">


								<div class="row">
									<div class="<?php if($user_status =='sales_rep'){ echo 'col-md-12 col-sm-12'; }else{ echo 'col-md-4 col-sm-12';}?>">
										<select class="form-select form-control" id="sortBy" onchange="searchFilter();">
											<option selected>Sort By</option>

											<option value="asc">Ascending</option>
											<option value="desc">Descending</option>
										</select>
									</div>
									<?php
										if($user_status !='sales_rep'){
									?>
									<div class="col-md-3 col-sm-12">
										<div class="dropdown-inverse dropdown open">
											<button class="btn btn-inverse dropdown-toggle waves-effect waves-light "
												type="button" id="dropdown-7" data-toggle="dropdown"
												aria-haspopup="true" aria-expanded="false">Filter by Store</button>
											<div class="dropdown-menu" aria-labelledby="dropdown-7"
												data-dropdown-in="fadeIn" data-dropdown-out="fadeOut"
												style="will-change: transform;">
												<?php
											
											if(is_array($get_store)){
														
											    foreach($get_store as $row){
                                                    $store_id		=$row['id'];
													$store_name		=$row['store_name'];
												
										?>

													<?php
														if($user_status =='manager'){?>
															<a id="filter_by_store" data-store_id="<?php echo $store_id;?>" class="dropdown-item waves-light waves-effect"
																href="<?php echo base_url();?>Manager/filter_transaction/store/<?php echo $store_id;?>">
																<?php echo $store_name;?></a>
													<?php	
														}elseif($user_status =='store_owner'){?>
															<a id="filter_by_store" data-store_id="<?php echo $store_id;?>" class="dropdown-item waves-light waves-effect"
																href="<?php echo base_url();?>Store_Owner/filter_transaction/store/<?php echo $store_id;?>">
																<?php echo $store_name;?></a>
													<?php 
														}
													?>
												
												<?php
												}
											}
										?>
											</div>
										</div>
									</div>

									

									<div class="col-md-4 col-sm-12">
										<div class="dropdown-inverse dropdown open">
											<button class="btn btn-primary dropdown-toggle waves-effect waves-light "
												type="button" id="dropdown-7" data-toggle="dropdown"
												aria-haspopup="true" aria-expanded="false">Filter By Store
												Branch</button>
											<div class="dropdown-menu" aria-labelledby="dropdown-7"
												data-dropdown-in="fadeIn" data-dropdown-out="fadeOut"
												style="will-change: transform;">
												<?php
											
											if(is_array($get_store_branch)){
												foreach($get_store_branch as $row){
													$branch_name		=$row['branch_name'];
													$branch_id			=$row['id'];

													$get_store_name		=$this->Action->get_store_name_by_branch_id($branch_id);
												
										?>
													<?php
														if($user_status =='manager'){?>
															<a id="filter_by_branch" data-branch_id="<?php echo $branch_id;?>" class="dropdown-item waves-light waves-effect"
																href="<?php echo base_url();?>Manager/filter_transaction/branch/<?php echo $branch_id;?>"><?php echo $get_store_name;?>
																(<?php echo $branch_name;?> Branch)</a>
													<?php 
														}elseif($user_status =='store_owner'){?>
															<a id="filter_by_branch" data-branch_id="<?php echo $branch_id;?>" class="dropdown-item waves-light waves-effect"
																href="<?php echo base_url();?>Store_Owner/filter_transaction/branch/<?php echo $branch_id;?>"><?php echo $get_store_name;?>
																(<?php echo $branch_name;?> Branch)</a>
													<?php 
														}
													?>
												
												<?php
												}
											}
										?>
											</div>
										</div>
									</div>

									<?php 
										}
									?>
								</div>





							</div>
                           
                            <div id="dataList">
                                
                            </div>

							
						</div>
                        
					</div>
                        
				</div>
				
			</div>
           

			

		</div>
	</div>

</div>



<script type="text/javascript" src="<?php echo base_url();?>files/bower_components/jquery/dist/jquery.min.js"></script>

<script>
	
	$(function() {
		
		/*--first time load--*/
		ajaxlist(page_url=false);
		
		/*-- Search keyword--*/
		$(document).keyup("#keywords", function(event) {
			ajaxlist(page_url=false);
			event.preventDefault();
		});
		

		/*-- Reset Search--*/
		$(document).on('change', "#sortBy", function(event) {
			ajaxlist(page_url=false);
			event.preventDefault();
		});
		
		/*-- Page click --*/
		$(document).on('click', ".pagination li a", function(event) {
			var page_url = $(this).attr('href');
			ajaxlist(page_url);
			event.preventDefault();
		});
		
		/*-- create function ajaxlist --*/
		function ajaxlist(page_url = false)
		{
			var search_key = $("#keywords").val();
            var sortBy = $('#sortBy').val();

			
			var dataString = 'search_key=' + search_key + '&sortBy=' + sortBy;
          
			var base_url = '<?php echo site_url('Sales_report/index_ajax/') ?>';
			
			if(page_url == false) {
				var page_url = base_url;
			}

			
			$.ajax({
				type: "POST",
				url: page_url,
				data: dataString,
				success: function(response) {
                    // alert(response);
					console.log(response);
					$("#dataList").html(response);
				}
			});
		}

      
	});

</script>