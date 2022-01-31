<div class="main-body">
	<div class="page-wrapper">

		<div class="page-body">
			<div class="row">
				<!-- task, page, download counter  start -->
				<?php $this->load->view('short_statics');?>
				<!-- task, page, download counter  end -->

				<a data-toggle="modal" href="#large-Modal" class="btn btn-danger"
					style="margin:1%;"><i class="fa fa-plus"></i>Add Plan</a>

				<div class="col-md-12" id="slideshow">
					<div class="card" id="slide_show">
						<div class="card-header">
							<h5>View All Plan</h5>

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
											style="display: table-cell;">Title<span
												class="fooicon fooicon-sort"></span></th>

										<th data-breakpoints="xs" class="footable-sortable"
											style="display: table-cell;">Number of Store<span
												class="fooicon fooicon-sort"></span></th>


										<th data-breakpoints="xs" class="footable-sortable"
											style="display: table-cell;">Amount<span
												class="fooicon fooicon-sort"></span></th>
										
										<th data-breakpoints="xs" class="footable-sortable"
											style="display: table-cell;"></th>
									</tr>
								</thead>

								<tbody>
									<?php
										
									$get_plan			    =$this->Action->get_plan();
											
									
						
						$i=1;
						if(is_array($get_plan)){
							foreach($get_plan as $row){
								$id				        =$row['id'];
								$title 					=$row['title'];
								$store_num				=$row['store_num'];
								$amount					=$row['amount'];
								$store_desc				=$row['store_desc'];

								$currency               			='&#8358;';
					?>

									<tr>
										<td><?php echo $i++;?></td>
										<td>
											<?php echo $title;?>
										</td>
										<td><?php echo $store_num;?></td>
										<td><?php echo $currency.$this->cart->format_number($amount);?></td>
										
										<td>
											<a href="<?php echo base_url();?>Dashboard/edit_plan/<?php echo $id;?>" class="label label-primary"><i class="fa fa-pen"></i>  Edit</a>
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
														title: "Are you sure you want to DELETE this Payment Plan?",
														icon: "warning",
														buttons: true,
														dangerMode: true,
													})
													.then((willDelete) => {
														if (willDelete) {

															$.ajax({
																type: 'POST',
																url: '<?php echo base_url();?>Dashboard/delete_payment_plan/' +
																	id,

																success: function (resp) {
																	if (resp == 'ok') {

																		swal({
																			title: "Success",
																			text: "Payment Plan Removed from List!",
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
									<div class="alert alert-warning" style="margin-top:4%;">No Information Available yet!</div>
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
				<h4 class="modal-title">Create Payment Plan</h4>


				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<form id="create_supervisor" enctype="multipart/form-data">
				<div class="modal-body">

					<div class="form-group row">
						<label class="col-sm-2 col-form-label">Plan Name</label>
						<div class="col-sm-10">
							<input type="text" id="name" name="name" class="form-control" required>
						</div>
					</div>

					<div class="form-group row">
						<label class="col-sm-2 col-form-label">Number Of Store</label>
						<div class="col-sm-10">
							<input type="number" id="num_store" name="num_store" class="form-control" required>
						</div>
					</div>

					<div class="form-group row">
						<label class="col-sm-2 col-form-label">Amount</label>
						<div class="col-sm-10">
							<input type="number" id="amount" name="amount" class="form-control" required>
						</div>
					</div>

					<div class="form-group row">
						<label class="col-sm-2 col-form-label">Plan Image</label>
						<div class="col-sm-10">
							<input type="file" name="file" id="fileInput" class="form-control">
						</div>
					</div>

					




				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default waves-effect " data-dismiss="modal">Close</button>
					<input type="submit" class="btn btn-primary waves-effect waves-light"
						value="Add Payment Plan">
				</div>
			</form>
		</div>
	</div>
</div>





<script type="text/javascript" src="<?php echo base_url();?>files/bower_components/jquery/dist/jquery.min.js"></script>

<!-- <script type="text/javascript">
	$(document).ready(function () {

		$('#create_supervisor').submit(function (e) {
			e.preventDefault();

			$.ajax({
				url: '<?php echo base_url();?>Dashboard/create_payment_plan',
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

					}
				}
			});
		});


	});

</script> -->


<!-- <script>
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

</script> -->


<script type="text/javascript">
	$(document).ready(function () {
		$("#create_supervisor").on('submit', function (e) {
			e.preventDefault();
			$.ajax({
				xhr: function () {
					var xhr = new window.XMLHttpRequest();
					xhr.upload.addEventListener("progress", function (evt) {
						if (evt.lengthComputable) {
							var percentComplete = Math.round((evt.loaded / evt.total) *
								100);
							$(".progress-bar").width(percentComplete + '%');
							$(".progress-bar").html(percentComplete + '%');
						}
					}, false);
					return xhr;
				},
				type: 'POST',
				url: '<?php echo base_url();?>Dashboard/create_payment_plan',
				data: new FormData(this),
				contentType: false,
				cache: false,
				timeout: 1000 * 100,
				processData: false,
				beforeSend: function () {
					$(".progress-bar").width('0%');
					$('#uploadStatus').html(
						'<img src="<?php echo base_url();?>logo/loading_icon.gif" style="width: 200px; height: 100px;" />'
					);
				},
				error: function () {
					$('#uploadStatus').html(
						'<div class="alert alert-danger"></div>'
					);
					swal({
						title: "Oops!",
						text: "fail to perform operation, please try again.",
						icon: "error",
						closeOnClickOutside: false,

					});
				},
				success: function (resp) {
					if (resp == 'ok') {
						$('#create_supervisor')[0].reset();
						swal({
							title: "Success",
							text: "Payment Plan added to list",
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

					} else {


						swal({
							title: "Oops!",
							text: resp,
							icon: "warning",
							closeOnClickOutside: false,

						});
					}
				}
			});
		});


		$("#fileInput").change(function () {
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
				$("#fileInput").val('');
				return false;
			}
		});
	});

</script>
