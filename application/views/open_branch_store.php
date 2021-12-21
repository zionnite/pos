<div class="main-body">
	<div class="page-wrapper">

		<div class="page-body">
			<div class="row">
				<!-- task, page, download counter  start -->
				<?php $this->load->view('short_statics');?>
				<!-- task, page, download counter  end -->

				<a data-toggle="modal" href="#large-Modal" class="col-md-12 btn btn-danger btn-block"
					style="margin:1%;">Create Branch Store</a>

				<div class="col-md-12" id="slideshow">
					<div class="card" id="slide_show">
						<div class="card-header">
							<h5>List Off All Branch Store</h5>

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
											style="display: table-cell;">Branch Name<span
												class="fooicon fooicon-sort"></span></th>
										<th data-breakpoints="xs" class="footable-sortable"
											style="display: table-cell;">Date Created</th>
										<th data-breakpoints="xs" class="footable-sortable"
											style="display: table-cell;"></th>
									</tr>
								</thead>

								<tbody>
									<?php 
						$get_branch			=$this->Action->get_store_branches($store_id,$user_id);
						$i=1;
						if(is_array($get_branch)){
							foreach($get_branch as $row){
								$id				=$row['id'];
								$store_id		=$row['store_id'];
								$store_owner_id	=$row['store_owner_id'];
								$branch_name	=$row['branch_name'];
								$date			=$row['date_created'];
								$time			=$row['time'];
					?>

									<tr>
										<td><?php echo $i++;?></td>
										<td><?php echo $branch_name;?></td>
										<td><?php echo $date;?></td>
										<td>
											<a href="javascript:;" id="delete_branch_<?php echo $id;?>" data-branch_id="<?php echo $id;?>" class="btn btn-danger btn-sm">Delete</a>
										</td>
									</tr>

									<script type="text/javascript" src="<?php echo base_url();?>files/bower_components/jquery/dist/jquery.min.js"></script>

									<script>
										$(document).ready(function () {
											$('#delete_branch_<?php echo $id;?>').click(function (e) {
												e.preventDefault();
												var id = $(this).data('branch_id');
												swal({
														title: "Are you sure you want to DELETE this Branch Store?",
														text: "Once deleted, you will not be able to recover data relating to this Branch store",
														icon: "warning",
														buttons: true,
														dangerMode: true,
													})
													.then((willDelete) => {
														if (willDelete) {

															$.ajax({
																type: 'POST',
																url: '<?php echo base_url();?>Office/delete_branch_store/' + id,

																success: function (resp) {
																	if (resp == 'ok') {
																	
																		swal({
																			title: "Success",
																			text: "Branch Store has been Deleted successfully!",
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
									<div class="alert alert-warning">No Branch Store has been created</div>
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
				<h4 class="modal-title">Create Branch Store</h4>


				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<form id="create_branch_store" enctype="multipart/form-data">
				<div class="modal-body">

					

					<div class="form-group row">
						<label class="col-sm-2 col-form-label">Branch Name</label>
						<div class="col-sm-10">
							<input type="text" id="branch_name" name="branch_name" class="form-control">
						</div>
					</div>



				</div>
				<div class="modal-footer">
					<input type="hidden" id="store_id" name="store_id" value="<?php echo $store_id;?>">
					<button type="button" class="btn btn-default waves-effect " data-dismiss="modal">Close</button>
					<input type="submit" class="btn btn-primary waves-effect waves-light" value="Create Branch Store">
				</div>
			</form>
		</div>
	</div>
</div>





<script type="text/javascript" src="<?php echo base_url();?>files/bower_components/jquery/dist/jquery.min.js"></script>

<script type="text/javascript">
	$(document).ready(function () {

		$('#create_branch_store').submit(function (e) {
			e.preventDefault();

			$.ajax({
				url: '<?php echo base_url();?>Office/create_branch_store',
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
							text: "Branch store created",
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
