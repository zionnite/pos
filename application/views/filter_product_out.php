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
								<small style="color:red;"><b>search with customer name, email or phone number</b></small>

								<input type="hidden" name="dis_store_id" id="dis_store_id" value="<?php echo $dis_store_id;?>" />
								<input type="hidden" name="type" id="type" value="<?php echo $type;?>" />
							</form>
						</div>
					</div>
				</div>

				<div class="col-md-12" id="slideshow">
					<div class="card" id="slide_show">
						<div class="card-header">
							<h5>List All Product Out-Of-Stock</h5>
							<?php $get_store_or_branch_name		=$this->Action->get_store_or_branch_name($type,$dis_store_id);?> 		
							<h6>Filtering By <?php echo $type;?> Name (<?php echo $get_store_or_branch_name;?>)</h6>

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
												
										?>
												<a id="filter_by_store" data-store_id="<?php echo $store_id;?>" class="dropdown-item waves-light waves-effect"
													href="<?php echo base_url();?>Office/filter_product_in/store/<?php echo $store_id;?>">
													<?php echo $store_name;?></a>

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
												<a id="filter_by_branch" data-branch_id="<?php echo $branch_id;?>" class="dropdown-item waves-light waves-effect"
													href="<?php echo base_url();?>Office/filter_product_in/branch/<?php echo $branch_id;?>"><?php echo $get_store_name;?>
													(<?php echo $branch_name;?> Branch)</a>


												<?php
												}
											}
										?>
											</div>
										</div>
									</div>
								</div>





							</div>
                            
                            <a data-toggle="modal" href="#large-Modal" class="btn btn-danger btn-block"
								style="margin-bottom:1%; float:left;">Add Customer</a>

                            <div id="dataList">
                                
                            </div>

							
						</div>
                        
					</div>
                        
				</div>
				
			</div>
		</div>
	</div>

</div>



<div class="modal fade" id="large-Modal" tabindex="-1" role="dialog" style="z-index: 1050; display: none;"
	aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Add Customer To List</h4>


				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<form id="create_customer" enctype="multipart/form-data">
				<div class="modal-body">



					<div class="form-group row">
						<label class="col-sm-2 col-form-label">Select Store</label>
						<div class="col-sm-10">
							<select type="text" id="store_id" name="store_id" class="form-control">
								<option>Select Store</option>
								<?php
                                    $get_store          =$this->Action->get_store($user_id);
                                    if(is_array($get_store)){
                                        foreach($get_store as $row){
                                            $store_id           =$row['id'];
                                            $store_name         =$row['store_name'];
                                            $store_name_2       =$row['store_name_2'];
                                    ?>


								?>
								<option value="<?php echo $store_id;?>"><?php echo $store_name;?></option>
								<?php 
                                        }
                                    }
                                ?>
							</select>
						</div>
					</div>


					<div class="form-group row">
						<label class="col-sm-2 col-form-label">Select Branch Store</label>
						<div class="col-sm-10">
							<select type="text" id="branch_name" name="branch_name" class="form-control">
								<option>Select Branch Store</option>

							</select>
						</div>
					</div>


					<div class="form-group row">
						<label class="col-sm-2 col-form-label">Customer Name</label>
						<div class="col-sm-10">
							<input type="text" id="name" name="name" class="form-control" required>
						</div>
					</div>

					<div class="form-group row">
						<label class="col-sm-2 col-form-label">Customer Email</label>
						<div class="col-sm-10">
							<input type="email" id="email" name="email" class="form-control" required>
						</div>
					</div>

					<div class="form-group row">
						<label class="col-sm-2 col-form-label">Customer Phone</label>
						<div class="col-sm-10">
							<input type="number" id="phone" name="phone" class="form-control" required>
						</div>
					</div>


				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default waves-effect " data-dismiss="modal">Close</button>
					<input type="submit" class="btn btn-primary waves-effect waves-light"
						value="Add Customer">
				</div>
			</form>
		</div>
	</div>
</div>





<script type="text/javascript" src="<?php echo base_url();?>files/bower_components/jquery/dist/jquery.min.js"></script>
<script type="text/javascript">
	$(document).ready(function () {

		$('#create_customer').submit(function (e) {
			e.preventDefault();

			// alert('let');
			
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
					// alert(data);
					console.log(data);
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


<script>
	$(document).ready(function () {
		$("#store_id").change(function () {
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
			var search_key  = $("#keywords").val();
            var sortBy      = $('#sortBy').val();
            var store_id      = $('#dis_store_id').val();
            var type      = $('#type').val();;

			
			// var dataString = 'search_key=' + search_key + '&sortBy=' + sortBy;

			var dataString = 'search_key=' + search_key + '&sortBy=' + sortBy +'&store_id=' + store_id + '&type=' + type;
          
			var base_url = '<?php echo site_url('Office/filter_product_out_ajax/') ?>';
			
			if(page_url == false) {
				var page_url = base_url;
			}

			
			$.ajax({
				type: "POST",
				url: page_url,
				data: dataString,
				success: function(response) {
					// alert(response);
					// console.log(response);
					$("#dataList").html(response);
				}
			});
		}

      
	});

</script>

