<?php
	$currency               			='&#8358;';
	$count_store             			=$this->Action->count_all_store();
	$count_store_owner        			=$this->Action->count_store_owners();


?>
<div class="main-body">
	<div class="page-wrapper">

		<div class="page-body">
			<div class="row">
				<!-- task, page, download counter  start -->
				
                <div class="col-sm-6">
					<div class="card bg-c-yellow text-white widget-visitor-card">
						<div class="card-block-small text-center">
							<h2><?php echo $count_store;?></h2>
							<h6>Total Store</h6>
							<i class="fa fa-shopping-cart"></i>
						</div>
					</div>
				</div>

                <div class="col-sm-6">
					<div class="card bg-c-blue text-white widget-visitor-card">
						<div class="card-block-small text-center">
							<h2><?php echo $count_store_owner;?></h2>
							<h6>Total Store Owner</h6>
							<i class="feather icon-user"></i>
						</div>
					</div>
				</div>

				<!-- task, page, download counter  end -->

			
				<div class="col-md-12" id="slideshow">
					<div class="card" id="slide_show">
						<div class="card-header">
							<h5>List Of Store Owner</h5>

						</div>

						<?php
								$get_store			    =$this->Action->get_store_by_admin();
								$get_store_branch		=$this->Action->get_store_branches_by_admin();
						?>

						

						<div class="card-block">
							
							<table id="demo-foo-filtering"
								class="table table-striped footable footable-1 footable-paging footable-paging-center breakpoint-lg"
								style="">
								<thead>
									<tr class="footable-header">





										<th class="footable-sortable footable-first-visible"
											style="display: table-cell;">
											S/N<span class="fooicon fooicon-sort"></span></th>

										
										<th data-breakpoints="xs" class="footable-sortable"
											style="display: table-cell;">Store Owner Full Name<span
												class="fooicon fooicon-sort"></span></th>


										<th data-breakpoints="xs" class="footable-sortable"
											style="display: table-cell;">Store Owner Email<span
												class="fooicon fooicon-sort"></span></th>

										<th data-breakpoints="xs" class="footable-sortable"
											style="display: table-cell;">Store Owner Phone<span
												class="fooicon fooicon-sort"></span></th>

										<th data-breakpoints="xs" class="footable-sortable"
											style="display: table-cell;">Num Of Store<span
												class="fooicon fooicon-sort"></span></th>

										<!-- <th data-breakpoints="xs" class="footable-sortable"
											style="display: table-cell;">Date Joined</th> -->
										<th data-breakpoints="xs" class="footable-sortable"
											style="display: table-cell;"></th>
									</tr>
								</thead>

								<tbody>
									<?php

                                        $get_store_owner        =$this->Action->get_store_owner();
										
										// $get_store			    =$this->Action->get_store_by_admin();											
										// $get_store			=$this->Action->get_my_store_sales_rep_filter_by_store_id($user_id,$dis_store_id);
										// $get_store			=$this->Action->get_my_store_sales_rep_filter_by_branch_id($store_owner_id,$dis_branch_id);
									
						
						$i=1;
						if(is_array($get_store_owner)){
							foreach($get_store_owner as $row){
								$id		     		        =$row['id'];
								$dis_user_name		        =$row['user_name'];
								$dis_phone        	        =$row['phone'];
								$dis_full_name     	        =$row['full_name'];
								$dis_email      	        =$row['email'];	
                                
                                $count_dis_user_number_of_store             =$this->Action->count_my_store($id);

                            
					?>

									<tr>
										<td><?php echo $i++;?></td>
										
										<td><?php echo $dis_full_name;?><br><small><b style="color:red;"><?php echo $dis_user_name;?></b></small></td>
										<td><?php echo $dis_email;?></td>
										<td><?php echo $dis_phone;?></td>
										<td><?php echo $count_dis_user_number_of_store;?></td>
										<td>
											<a href="<?php echo base_url();?>Dashboard/more_about_store_owner/<?php echo $id;?>"
											 class="label label-success"><i class="fa fa-door-open"></i> View More</a>
											<a href="javascript:;" id="delete_branch_<?php echo $id;?>"
												data-id="<?php echo $id;?>" class="label label-danger"><i class="fa fa-trash"></i> Delete</a>
										</td>
									</tr>

									<script type="text/javascript"
										src="<?php echo base_url();?>files/bower_components/jquery/dist/jquery.min.js">
									</script>

									<script>
										$(document).ready(function () {
											$('#delete_branch_<?php echo $id;?>').click(function (e) {
												e.preventDefault();
												var id = $(this).data('id');
												swal({
														title: "Are you sure you want to DELETE this STORE OWNER?",
                                                        text:"Once deleted, data can'\t be recovered",
														icon: "warning",
														buttons: true,
														dangerMode: true,
													})
													.then((willDelete) => {
														if (willDelete) {

															$.ajax({
																type: 'POST',
																url: '<?php echo base_url();?>Dashboard/delete_store_owner/' +
																	id,

																success: function (resp) {
																	if (resp == 'ok') {

																		swal({
																			title: "Success",
																			text: "Store Owner has been been removed from List!",
																			icon: "success",
																			closeOnClickOutside: false,

																		});

																	} else if (resp == 'err') {

																		swal({
																			title: "Oops!",
																			text: "Database Could not connect to server!",
																			icon: "info",
																			closeOnClickOutside: false,

																		});

																	}
																}
															});

														} 
													});
											});

										});

									</script>

									<?php
							}
						}else{?>
									<div class="alert alert-warning" style="margin-top:4%;">No Information to Display yet!</div>
									<?php
						}
					?>
								</tbody>
						</div>
					</div>

				</div>

			</div>
		</div>
	</div>

	<div>

	</div>
</div>







