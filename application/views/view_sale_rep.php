<div class="main-body">
	<div class="page-wrapper">

		<div class="page-body">
			<div class="row">
				<!-- task, page, download counter  start -->
				<?php $this->load->view('short_statics');?>
				<!-- task, page, download counter  end -->

				<div class="col-md-12">
					<a data-toggle="modal" href="#large-Modal" class="btn btn-danger" style="margin-bottom:1%;"><i class="fa fa-plus"></i>Create Sales Rep.</a>
				</div>

			

				<div class="col-md-12" id="slideshow">
					<div class="card" id="slide_show">
						<div class="card-header">
							<h5>List Off All Sales Rep.</h5>

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
								<div class="dropdown-inverse dropdown open">
									<button class="btn btn-inverse dropdown-toggle waves-effect waves-light "
										type="button" id="dropdown-7" data-toggle="dropdown" aria-haspopup="true"
										aria-expanded="false">Filter by Store</button>
									<div class="dropdown-menu" aria-labelledby="dropdown-7" data-dropdown-in="fadeIn"
										data-dropdown-out="fadeOut" style="will-change: transform;">
										<?php
											
											if(is_array($get_store)){
												foreach($get_store as $row){
													$store_name		=$row['store_name'];
													$store_id		=$row['id'];
													
										
										
												if($user_status =='manager'){
											?>
													<a class="dropdown-item waves-light waves-effect"
														href="<?php echo base_url();?>Manager/filter_staff_store/<?php echo $store_id;?>">
														<?php echo $store_name;?></a>

											<?php
												}elseif($user_status =='store_owner'){?>
														
													<a class="dropdown-item waves-light waves-effect"
														href="<?php echo base_url();?>Store_Owner/filter_staff_store/<?php echo $store_id;?>">
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

								<div class="dropdown-inverse dropdown open">
									<button class="btn btn-primary dropdown-toggle waves-effect waves-light "
										type="button" id="dropdown-7" data-toggle="dropdown" aria-haspopup="true"
										aria-expanded="false">Filter By Store Branch</button>
									<div class="dropdown-menu" aria-labelledby="dropdown-7" data-dropdown-in="fadeIn"
										data-dropdown-out="fadeOut" style="will-change: transform;">
										<?php
											
											if(is_array($get_store_branch)){
												foreach($get_store_branch as $row){
													$branch_name		=$row['branch_name'];
													$branch_id			=$row['id'];

													$get_store_name		=$this->Action->get_store_name_by_branch_id($branch_id);
												
										
													if($user_status =='manager'){
										?>
														<a class="dropdown-item waves-light waves-effect"
															href="<?php echo base_url();?>Manager/filter_staff_branch/<?php echo $branch_id;?>"><?php echo $get_store_name;?>
															(<?php echo $branch_name;?> Branch)</a>

												<?php 
													}elseif($user_status =='store_owner'){?>
														<a class="dropdown-item waves-light waves-effect"
															href="<?php echo base_url();?>Store_Owner/filter_staff_branch/<?php echo $branch_id;?>"><?php echo $get_store_name;?>
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

							
							<table id="demo-foo-filtering"
								class="table table-striped footable footable-1 footable-paging footable-paging-center breakpoint-lg"
								style="">
								<thead>
									<tr class="footable-header">





										<th class="footable-sortable footable-first-visible"
											style="display: table-cell;">
											S/N<span class="fooicon fooicon-sort"></span></th>

										<th data-breakpoints="xs" class="footable-sortable"
											style="display: table-cell;">Store Name<span
												class="fooicon fooicon-sort"></span></th>

										<th data-breakpoints="xs" class="footable-sortable"
											style="display: table-cell;">Branch Name<span
												class="fooicon fooicon-sort"></span></th>


										<th data-breakpoints="xs" class="footable-sortable"
											style="display: table-cell;">Rep. Name<span
												class="fooicon fooicon-sort"></span></th>

										<th data-breakpoints="xs" class="footable-sortable"
											style="display: table-cell;">Rep. Email<span
												class="fooicon fooicon-sort"></span></th>

										<th data-breakpoints="xs" class="footable-sortable"
											style="display: table-cell;">Rep Phone No<span
												class="fooicon fooicon-sort"></span></th>

										<th data-breakpoints="xs" class="footable-sortable"
											style="display: table-cell;">Date Created</th>
										<th data-breakpoints="xs" class="footable-sortable"
											style="display: table-cell;"></th>
									</tr>
								</thead>

								<tbody>
									<?php
										
									if($type =='default'){
										($user_status =='store_owner') ? 
											$get_branch			=$this->Action->get_my_store_sales_rep($user_id)
											:
											$get_branch			=$this->Action->get_my_store_sales_rep($store_owner_id);
									}elseif($type =='store'){
										($user_status =='store_owner') ? 
										$get_branch			=$this->Action->get_my_store_sales_rep_filter_by_store_id($user_id,$dis_store_id)
										:
										$get_branch			=$this->Action->get_my_store_sales_rep_filter_by_store_id($store_owner_id,$dis_store_id);

										
									}elseif($type =='branch'){
										($user_status =='store_owner') ? 
										$get_branch			=$this->Action->get_my_store_sales_rep_filter_by_branch_id($user_id,$dis_branch_id)
										:
										$get_branch			=$this->Action->get_my_store_sales_rep_filter_by_branch_id($store_owner_id,$dis_branch_id);
									}
						
						$i=1;
						if(is_array($get_branch)){
							foreach($get_branch as $row){
								$id				        =$row['id'];
								$store_id		        =$row['store_id'];
								$store_owner_id	        =$row['store_owner_id'];
                                
								$store_name 	        =$row['store_name'];
                                $branch_name            =$row['branch_store_name'];
                                $branch_store_id        =$row['branch_store_id'];

                                $sub_email      =$row['email'];
                                $sub_name       =$row['name'];
                                $sub_phone      =$row['phone_no'];

								$date			=$row['date_created'];
								$time			=$row['time'];


                                $store_logo             =$this->Action->get_store_logo_by_store_id($store_id);
                                $store_name_2           =$this->Action->get_store_name_2_by_store_id($store_id);
					?>

									<tr>
										<td><?php echo $i++;?></td>
										<td>
											<img style="height:100px;width:100px"
												src="<?php echo base_url();?>store_img/<?php echo $store_name_2;?>/images/<?php echo $store_logo;?>"
												alt="">
											<br /><?php echo $store_name;?>
										</td>
										<td><?php echo $branch_name;?></td>
										<td><?php echo $sub_name;?></td>
										<td><?php echo $sub_email;?></td>
										<td><?php echo $sub_phone;?></td>
										<td><?php echo $date;?></td>
										<td>
											<a href="javascript:;" id="delete_branch_<?php echo $id;?>"
												data-id="<?php echo $id;?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>Delete</a>
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
														title: "Are you sure you want to DELETE this SALE'S REP?",
														icon: "warning",
														buttons: true,
														dangerMode: true,
													})
													.then((willDelete) => {
														if (willDelete) {

															$.ajax({
																type: 'POST',
																url: '<?php echo base_url();?>Office/delete_sales_rep/' +
																	id,

																success: function (resp) {
																	if (resp == 'ok') {

																		swal({
																			title: "Success",
																			text: "Branch Supervisor has been been removed from List!",
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

														} else {
															swal("Delete Cancelled");
														}
													});
											});

										});

									</script>

									<?php
							}
						}else{?>
									<div class="alert alert-warning" style="margin-top:4%;">No Sales Rep. has been added to Database yet!</div>
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

	<div id="styleSelector">

	</div>
</div>



<div class="modal fade" id="large-Modal" tabindex="-1" role="dialog" style="z-index: 1050; display: none;"
	aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Create Sales Rep</h4>


				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<form id="create_supervisor" enctype="multipart/form-data">
				<div class="modal-body">



				<?php
					if($user_status =='store_owner'){
				?>
					<div class="form-group row">
						<label class="col-sm-2 col-form-label">Select Store</label>
						<div class="col-sm-10">
							<select id="store_id" name="store_id" class="form-control">
								<option>Select Store</option>
								<?php
									 ($user_status =='store_owner') ? 
                                    	$get_store          =$this->Action->get_store($user_id)
										:
										$get_store			=$this->Action->get_store($store_owner_id);
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
				<?php 
					}else{?>
						<div class="form-group row">
							<label class="col-sm-2 col-form-label">Select Store</label>
							<div class="col-sm-10">
								<select id="store_id" name="store_id" class="form-control">
									<?php

										$my_store_name		=$this->Action->get_store_name_by_supervisor_id($user_id);
										$my_store_id		=$this->Action->get_store_id_by_supervisor_id($user_id);                                                            
                                	?>
                                    <option value="<?php echo $my_store_id;?>"><?php echo $my_store_name;?></option>
								</select>
							</div>
						</div>


						<div class="form-group row">
							<label class="col-sm-2 col-form-label">Select Branch Store</label>
							<div class="col-sm-10">
							<?php

								$my_brach_name		=$this->Action->get_branch_name_by_supervisor_id($user_id);
								$my_brach__id		=$this->Action->get_branch_id_by_supervisor_id($user_id);                                                            
								?>
								<select type="text" id="branch_name" name="branch_name" class="form-control">
									<option value="<?php echo $my_brach__id;?>"><?php echo $my_brach_name;?></option>

								</select>
							</div>
						</div>

				<?php } ?>




					<div class="form-group row">
						<label class="col-sm-2 col-form-label">Rep. Name</label>
						<div class="col-sm-10">
							<input type="text" id="name" name="name" class="form-control" required>
						</div>
					</div>

					<div class="form-group row">
						<label class="col-sm-2 col-form-label">Rep. Email</label>
						<div class="col-sm-10">
							<input type="email" id="email" name="email" class="form-control" required>
						</div>
					</div>

					<div class="form-group row">
						<label class="col-sm-2 col-form-label">Rep. Phone</label>
						<div class="col-sm-10">
							<input type="number" id="phone" name="phone" class="form-control" required>
						</div>
					</div>

					<div class="form-group row">
						<label class="col-sm-2 col-form-label">Rep. Password</label>
						<div class="col-sm-10">
							<input type="text" id="password" name="password" class="form-control" required>
						</div>
					</div>




				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default waves-effect " data-dismiss="modal">Close</button>
					<input type="submit" class="btn btn-primary waves-effect waves-light"
						value="Add Sales Rep. To Branch Store">
				</div>
			</form>
		</div>
	</div>
</div>





<script type="text/javascript" src="<?php echo base_url();?>files/bower_components/jquery/dist/jquery.min.js"></script>

<script type="text/javascript">
	$(document).ready(function () {

		$('#create_supervisor').submit(function (e) {
			e.preventDefault();

			$.ajax({
				url: '<?php echo base_url();?>Office/create_sales_rep',
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



						// setInterval(function () {
						// 	location.reload();
						// }, 4000);

					} else if (data == 'err') {

						swal({
							title: "Oops!",
							text: "Database Could not connect to server!",
							icon: "info",
							closeOnClickOutside: false,
						});

					}else{
						swal({
							title: "Oops!",
							text: data,
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
