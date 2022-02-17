<div class="main-body">
	<div class="page-wrapper">

		<div class="page-body">
			<div class="row">
				<!-- task, page, download counter  start -->
				<?php $this->load->view('short_statics');?>
				<!-- task, page, download counter  end -->


				<?php
                    $store_name       =$this->Action->get_store_name_by_store_id($store_id);
                    $store_name_2     =$this->Action->get_store_name_2_by_store_id($store_id);
                    $store_logo       =$this->Action->get_store_logo_by_store_id($store_id);
                ?>
				<div class="col-md-12" id="slideshow">
                    <?php
                        if(!empty($store_name)){
                    ?>
					<div class="card" id="slide_show">
						<div class="card-header">
							<h5>Manage Store (<?php echo $store_name;?>)</h5>

						</div>
						<div class="card-block">
							<table id="demo-foo-filtering"
								class="table table-striped footable footable-1 footable-paging footable-paging-center breakpoint-lg"
								style="">
								<thead>
									<tr class="footable-header">


										<th data-breakpoints="xs" class="footable-sortable"
											style="display: table-cell;">
											Store Logo<span class="fooicon fooicon-sort"></span></th>

										<th data-breakpoints="xs" class="footable-sortable"
											style="display: table-cell;"></th>
								
									</tr>
								</thead>
								<tbody>
									<td>
										<img style="width:50px; height:50px;"
											src="<?php echo base_url();?>store_img/<?php echo $store_name_2;?>/images/<?php echo $store_logo;?>"
											alt=""> <br> <?php echo $store_name;?>
									</td>

									<td>
										<a href="<?php echo base_url();?>Store_Owner/open_branch_store/<?php echo $store_id;?>" class="label label-inverse"><i class="fa fa-boxes"></i> Manage
											Store Branch</a>
									
										<a href="#edit_store" class="label label-info" data-toggle="modal"><i class="fa fa-pen"></i> Edit
											Store</a>
								
										<a href="javascript:;" class="label label-danger" id="delete_store"
											data-store_id="<?php echo $store_id;?>"><i class="fa fa-trash"></i> Delete</a>

										<a href="<?php echo base_url();?>Store_Owner/view_stat/store/<?php echo $store_id;?>" class="label label-warning" >
											<i class="fa fa-bar-chart-o"></i> View Statistics </a>

										<!-- <div class="dropdown-inverse dropdown open">
											<a class="label label-inverse dropdown-toggle waves-effect waves-light "
												type="button" id="dropdown-7" data-toggle="dropdown"
												aria-haspopup="true" aria-expanded="false">Export</a>
											<div class="dropdown-menu" aria-labelledby="dropdown-7"
												data-dropdown-in="fadeIn" data-dropdown-out="fadeOut"
												style="will-change: transform;">
												

												<a id="filter_by_store" class="dropdown-item waves-light waves-effect" href="<?php echo base_url();?>Sales_report/generate_report/excel/store/<?php echo $store_id;?>/0">Excel</a>
												<a id="filter_by_store" class="dropdown-item waves-light waves-effect" href="<?php echo base_url();?>Sales_report/generate_report/csv/store/<?php echo $store_id;?>/0">CSV</a>
											</div>
										</div> -->

									</td>
								</tbody>
						</div>

					</div>
                    <?php
                        }else{?>
                        
                            <div class="card-block">
                                <div class="alert alert-danger">No data to display</div>
                            </div>
                    <?php 
                        }
                    ?>
				</div>
			</div>

			<div>

			</div>
		</div>






		<div class="modal fade" id="edit_store" tabindex="-1" role="dialog" style="z-index: 1050; display: none;"
			aria-hidden="true">
			<div class="modal-dialog modal-sm" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">Edit Store</h4>


						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">×</span>
						</button>
					</div>
					<form id="" enctype="multipart/form-data">
						<div class="modal-body">

							<div class="row">
								<div class="col-md-6">
									<a href="#edit_store_name" data-toggle="modal"
										class="btn btn-danger btn-block">Change Store
										Name</a>
								</div>
								<div class="col-md-6">
									<a href="#edit_store_logo" data-toggle="modal"
										class="btn btn-success btn-block">Change Store
										Logo</a>
								</div>
							</div>

						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default waves-effect "
								data-dismiss="modal">Close</button>

						</div>
					</form>
				</div>
			</div>
		</div>

		<!--change store name-->
		<div class="modal fade" id="edit_store_name" tabindex="-1" role="dialog" style="z-index: 1050; display: none;"
			aria-hidden="true">
			<div class="modal-dialog modal-lgx" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">Edit Store</h4>


						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">×</span>
						</button>
					</div>
					<form id="change_store_name" enctype="multipart/form-data">
						<div class="modal-body">

							<div class="form-group row">
								<label class="col-sm-2 col-form-label">New Store Name</label>
								<div class="col-sm-10">
									<input type="text" name="new_store_name" id="store_name" class="form-control">
								</div>
							</div>
							<input type="hidden" name="store_id" id="store_id" value="<?php echo $store_id;?>" />
						</div>

						<div class="modal-footer">
							<button type="button" class="btn btn-default waves-effect "
								data-dismiss="modal">Close</button>

							<button class="btn btn-primary waves-effect waves-light" id="change_name">Change Store
								Name</button>
						</div>
					</form>
				</div>
			</div>
		</div>


		<!--change store Logo-->
		<div class="modal fade" id="edit_store_logo" tabindex="-1" role="dialog" style="z-index: 1050; display: none;"
			aria-hidden="true">
			<div class="modal-dialog modal-lgx" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">Edit Store</h4>


						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">×</span>
						</button>
					</div>
					<form id="uploadFormStoreLogo" method="post">
						<div class="modal-body">

							<div class="form-group row">
								<label class="col-sm-2 col-form-label">New Store Logo</label>
								<div class="col-sm-10">
									<input type="file" name="file" id="file" class="form-control">
								</div>
							</div>
							<input type="hidden" name="store_id" id="store_id" value="<?php echo $store_id;?>" />
							<input type="hidden" name="store_name" id="dis_store_name"
								value="<?php echo $store_name_2;?>" />
						</div>

						<div class="modal-footer">
							<button type="button" class="btn btn-default waves-effect"
								data-dismiss="modal">Close</button>
							<input type="submit" class="btn btn-primary waves-effect waves-light"
								value="Change Store Logo" id="change_logo">
						</div>
					</form>
				</div>
			</div>
		</div>

		<script type="text/javascript" src="<?php echo base_url();?>files/bower_components/jquery/dist/jquery.min.js">
		</script>

		<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> -->

		<script type="text/javascript">
			$(document).ready(function () {

				$('#change_store_name').submit(function (e) {
					e.preventDefault();

					$("#edit_store").modal('hide');
					$("#edit_store_name").modal('hide');

					$.ajax({
						url: '<?php echo base_url();?>Office/change_store_name',
						type: "post",
						data: new FormData(this),
						processData: false,
						contentType: false,
						cache: false,
						async: false,
						success: function (data) {
							
							if (data == 'ok') {
								$('#slide_show').load(
												'<?php echo base_url();?>Office/manage_store_2/<?php echo $store_id;?>'
											).fadeIn(1000);
								swal({
									title: "Success",
									text: "Store name has been rename, reloading browser for system to take effect",
									icon: "success",
									closeOnClickOutside: false,
								});



								setInterval(function () {
									location.reload();
								}, 4000);

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

		<script type="text/javascript">
			$(document).ready(function () {

				$('#uploadFormStoreLogo').submit(function (e) {
					e.preventDefault();

					$.ajax({
						url: '<?php echo base_url();?>Office/change_store_logo',
						type: "post",
						data: new FormData(this),
						processData: false,
						contentType: false,
						cache: false,
						async: false,
						success: function (data) {
							if (data == 'ok') {
								$('#slide_show').load(
												'<?php echo base_url();?>Office/manage_store_2/<?php echo $store_id;?>'
											).fadeIn(1000);
								swal({
									title: "Success",
									text: "Store Logo has been replace, reloading browser for system to take effect",
									icon: "success",
									closeOnClickOutside: false,
								});



								setInterval(function () {
									location.reload();
								}, 4000);

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



				$("#file").change(function () {
					var allowedTypes = ['image/jpeg', 'image/png', 'image/jpg', 'image/gif'];
					var file = this.files[0];
					var fileType = file.type;
					if (!allowedTypes.includes(fileType)) {
						//                alert('Please select a valid file (JPEG/JPG/PNG/GIF).');

						swal({
							title: "Oops!",
							text: "Please select a valid file (JPEG/JPG/PNG/GIF.",
							icon: "error",
							closeOnClickOutside: false,

						});
						$("#file").val('');
						return false;
					}
				});


			});

		</script>

		<script>
			$(document).ready(function () {
				$('#delete_store').click(function (e) {
					e.preventDefault();

					var id = $(this).data('store_id');
					swal({
							title: "Are you sure you want to DELETE this Store?",
							text: "Once deleted, you will not be able to recover data relating to this store",
							icon: "warning",
							buttons: true,
							dangerMode: true,
						})
						.then((willDelete) => {
							if (willDelete) {

								$.ajax({
									type: 'POST',
									url: '<?php echo base_url();?>Office/delete_store/' + id,

									success: function (resp) {
										if (resp == 'ok') {
											$('#slide_show').load(
												'<?php echo base_url();?>Office/manage_store_2/<?php echo $store_id;?>'
											).fadeIn(1000);

											swal({
												title: "Success",
												text: "Store has been Deleted successfully!",
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

	</div>
</div>
