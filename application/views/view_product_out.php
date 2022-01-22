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

.pagination a:hover:not(.active) {background-color: #ddd;}
</style>
<div class="main-body">
	<div class="page-wrapper">

		<div class="page-body">
			<div class="row">
				<!-- task, page, download counter  start -->
				<?php $this->load->view('short_statics');?>
				<!-- task, page, download counter  end -->



				<div class="col-md-12">
					<div class="card">
						<div class="card-block">
							<form>
								<input type="text" class="form-control" name="keywords" id="keywords"
									onkeyup="searchFilter();" />
								<small style="color:red;"><b>search with product name, meta title, meta keywords, meta desc.</b></small>
							</form>
						</div>
					</div>
				</div>

				<div class="col-md-12" id="slideshow">
					<div class="card" id="slide_show">
						<div class="card-header">
							<h5>List All Product Out-of-Stock</h5>

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
									<div class="col-md-4 col-sm-12">
										<select class="form-select form-control" id="sortBy" onchange="searchFilter();">
											<option selected>Sort By</option>

											<option value="asc">Ascending</option>
											<option value="desc">Descending</option>
										</select>
									</div>
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

													if($user_status =='manager'){
												
										?>
														<a id="filter_by_store" data-store_id="<?php echo $store_id;?>" class="dropdown-item waves-light waves-effect"
															href="<?php echo base_url();?>Manager/filter_product_out/store/<?php echo $store_id;?>">
															<?php echo $store_name;?></a>
													<?php
													}elseif($user_status =='store_owner'){?>
														<a id="filter_by_store" data-store_id="<?php echo $store_id;?>" class="dropdown-item waves-light waves-effect"
															href="<?php echo base_url();?>Store_Owner/filter_product_out/store/<?php echo $store_id;?>">
															<?php echo $store_name;?></a>
													<?php
													}
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

													if($user_status =='manager'){
												
										?>
														<a id="filter_by_branch" data-branch_id="<?php echo $branch_id;?>" class="dropdown-item waves-light waves-effect"
															href="<?php echo base_url();?>Manager/filter_product_out/branch/<?php echo $branch_id;?>"><?php echo $get_store_name;?>
															(<?php echo $branch_name;?> Branch)</a>
													<?php
													}elseif($user_status =='store_owner'){?>
														<a id="filter_by_branch" data-branch_id="<?php echo $branch_id;?>" class="dropdown-item waves-light waves-effect"
															href="<?php echo base_url();?>Store_Owner/filter_product_out/branch/<?php echo $branch_id;?>"><?php echo $get_store_name;?>
															(<?php echo $branch_name;?> Branch)</a>
													<?php
													}
												}
											}
										?>
											</div>
										</div>
									</div>
									
								</div>





							</div>
                            
                            <?php
								if($user_status =='manager'){
							?>
								<a href="<?php echo base_url();?>Manager_Dashboard/add_stock" class="btn btn-danger"
									style="margin-bottom:1%; float:left;"><i class="fa fa-plus"></i> Add Product</a>
							<?php
								}else{
							?>
								<a href="<?php echo base_url();?>Office/add_stock" class="btn btn-danger"
								style="margin-bottom:1%; float:left;"><i class="fa fa-plus"></i> Add Product</a>
							<?php
								}
							?>
                            <div id="mega"></div>

							
						</div>
                        
					</div>
                        
				</div>
				
			</div>
		</div>
	</div>

</div>




<script type="text/javascript" src="<?php echo base_url();?>files/bower_components/jquery/dist/jquery.min.js"></script>


<script>
	$(document).ready(function () {
		$("#store_id").change(function (e) {
					e.preventDefault();
					e.stopPropagation();
					
			var store_id = $('#store_id').val();
			var dataString = 'store_id=' + store_id;
			//alert(dataString);
			$.ajax({
				type: "POST",
				url: "<?php echo base_url();?>Office/get_store_branch_name",
				data: dataString,
				cache: false,
				success: function (html) {
					$("#branch_name").html(html);

				}
			});
		});
	});

</script>




<script>
	$(function() {
		
		// /*--first time load--*/
		ajaxlist(page_url=false);
		
		// /*-- Search keyword--*/
		$(document).on('keyup', "#keywords", function(e) {
					e.preventDefault();
					e.stopPropagation();
			ajaxlist(page_url=false);
		});
		

		/*-- Reset Search--*/
		$(document).on('change', "#sortBy", function(e) {
					e.preventDefault();
					e.stopPropagation();
			ajaxlist(page_url=false);
		});
		
		/*-- Page click --*/
		$(document).on('click', ".pagination li a", function(e) {
					e.preventDefault();
					e.stopPropagation();

			var page_url = $(this).attr('href');
			ajaxlist(page_url);
		});
		
		/*-- create function ajaxlist --*/
		function ajaxlist(page_url = false)
		{
			var search_key = $("#keywords").val();
            var sortBy = $('#sortBy').val();
			
			var dataString = 'search_key=' + search_key + '&sortBy=' + sortBy;
          
			var base_url = '<?php echo site_url('Office/view_product_out_ajax/') ?>';
			
			if (page_url == false) {
				var page_url = base_url;
			}

			
			$.ajax({
				type: "POST",
				url: page_url,
				data: dataString,
				success: function(response) {
                    // alert(response);
					console.log(response);
					$("#mega").html(response);
				}
			});
		}
	});

</script>




