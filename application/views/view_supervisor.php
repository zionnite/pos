<div class="main-body">
	<div class="page-wrapper">

		<div class="page-body">
			<div class="row">
				<!-- task, page, download counter  start -->
				<?php $this->load->view('short_statics');?>
				<!-- task, page, download counter  end -->

				<a data-toggle="modal" href="#large-Modal" class="col-md-12 btn btn-danger btn-block"
					style="margin:1%;">Create Branch Supervisor</a>

				<div class="col-md-12" id="slideshow">
					<div class="card" id="slide_show">
						<div class="card-header">
							<h5>List Off All Supervisor</h5>

						</div>
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
											style="display: table-cell;">Store Name<span
												class="fooicon fooicon-sort"></span></th>

										<th data-breakpoints="xs" class="footable-sortable"
											style="display: table-cell;">Branch Name<span
												class="fooicon fooicon-sort"></span></th>


										<th data-breakpoints="xs" class="footable-sortable"
											style="display: table-cell;">Supervisor Name<span
												class="fooicon fooicon-sort"></span></th>

										<th data-breakpoints="xs" class="footable-sortable"
											style="display: table-cell;">Supervisor Email<span
												class="fooicon fooicon-sort"></span></th>

										<th data-breakpoints="xs" class="footable-sortable"
											style="display: table-cell;">Supervisor Phone No<span
												class="fooicon fooicon-sort"></span></th>

										<th data-breakpoints="xs" class="footable-sortable"
											style="display: table-cell;">Date Created</th>
										<th data-breakpoints="xs" class="footable-sortable"
											style="display: table-cell;"></th>
									</tr>
								</thead>

								<tbody>
									<?php 
						$get_branch			=$this->Action->get_my_store_supervisor($user_id);
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
                                            <img style="height:100px;width:100px" src="<?php echo base_url();?>store_img/<?php echo $store_name_2;?>/images/<?php echo $store_logo;?>" alt="">
                                            <br /><?php echo $store_name;?>
                                        </td>
										<td><?php echo $branch_name;?></td>
										<td><?php echo $sub_name;?></td>
										<td><?php echo $sub_email;?></td>
										<td><?php echo $sub_phone;?></td>
										<td><?php echo $date;?></td>
										<td>
											<a href="javascript:;" id="delete_branch_<?php echo $id;?>"
												data-id="<?php echo $id;?>"
												class="btn btn-danger btn-sm">Delete</a>
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
														title: "Are you sure you want to DELETE this Supervisor?",
														icon: "warning",
														buttons: true,
														dangerMode: true,
													})
													.then((willDelete) => {
														if (willDelete) {

															$.ajax({
																type: 'POST',
																url: '<?php echo base_url();?>Office/delete_supervisor/' +
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
									<div class="alert alert-warning">No Supervisor has been added to Database yet!</div>
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
				<h4 class="modal-title">Create Branch Supervisor</h4>


				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<form id="create_supervisor" enctype="multipart/form-data">
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
						<label class="col-sm-2 col-form-label">Supervisor Name</label>
						<div class="col-sm-10">
							<input type="text" id="name" name="name" class="form-control" required>
						</div>
					</div>

					<div class="form-group row">
						<label class="col-sm-2 col-form-label">Supervisor Email</label>
						<div class="col-sm-10">
							<input type="email" id="email" name="email" class="form-control" required>
						</div>
					</div>

					<div class="form-group row">
						<label class="col-sm-2 col-form-label">Supervisor Phone</label>
						<div class="col-sm-10">
							<input type="text" id="phone" name="phone" class="form-control" required>
						</div>
					</div>




				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default waves-effect " data-dismiss="modal">Close</button>
					<input type="submit" class="btn btn-primary waves-effect waves-light" value="Add Suprversor To Branch Store">
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
				url: '<?php echo base_url();?>Office/create_supervisor',
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
							text: "Supervisor Added to List",
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
					type: "POST"
					, url: "<?php echo base_url();?>Office/get_store_branch_name"
					, data: dataString
					, cache: false
					, success: function (html) {
						$("#branch_name").html(html);
                        
					}
				});
			});
		});
	</script>	