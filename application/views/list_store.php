<html>

<head></head>

<body>


	<div class="card" id="slide_show">
		<div class="card-header">
			<h5>Stores</h5>
			<span>List of All Store</span>

		</div>
		<div class="card-block">
			<table id="demo-foo-filtering"
				class="table table-striped footable footable-1 footable-paging footable-paging-center breakpoint-lg"
				style="">
				<thead>
					<tr class="footable-header">





						<th class="footable-sortable footable-first-visible" style="display: table-cell;">
							S/N<span class="fooicon fooicon-sort"></span></th>
						<th data-breakpoints="xs" class="footable-sortable" style="display: table-cell;">
							Store Logo<span class="fooicon fooicon-sort"></span></th>
						<th data-breakpoints="xs" class="footable-sortable" style="display: table-cell;">Store Name<span
								class="fooicon fooicon-sort"></span></th>
						<th data-breakpoints="xs" class="footable-sortable" style="display: table-cell;"></th>
					</tr>
				</thead>
				<tbody>
					<?php
                    $list_store         =$this->Action->get_store($user_id);
                    if(is_array($list_store)){
                        $i=1;
                        foreach($list_store as $row){
                            $id             =$row['id'];
                            $store_logo     =$row['store_img'];
                            $store_name     =$row['store_name'];
                            $store_name_2     =$row['store_name_2'];
                            $date           =$row['date_created'];
                            $time           =$row['time'];
                    
                ?>
					<tr>

						<td class="footable-first-visible" style="display: table-cell;"><?php echo $i++;?></td>
						<td style="display: table-cell;"><img style="width:50px; height:50px;"
								src="<?php echo base_url();?>store_img/<?php echo $store_name_2;?>/images/<?php echo $store_logo;?>"
								alt=""></td>
						<td style="display: table-cell;"><?php echo $store_name;?></td>
						<td>
							<a href="<?php echo base_url();?>Office/manage_store/<?php echo $id;?>" class="label label-success"><i class="fa fa-store"></i> Manage Store</a>
					
							<a href="javascript:;" class="label label-danger" id="delete_store_<?php echo $id;?>"
								data-store_id="<?php echo $id;?>"><i class="fa fa-trash"></i> Delete</a>
						</td>
					</tr>

					<div class="modal fade" id="edit_store_<?php echo $id;?>" tabindex="-1" role="dialog"
						style="z-index: 1050; display: none;" aria-hidden="true">
						<div class="modal-dialog modal-sm" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h4 class="modal-title">Edit Store</h4>


									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">×</span>
									</button>
								</div>
								<form id="uploadForm" enctype="multipart/form-data">
									<div class="modal-body">

										<div class="row">
											<div class="col-md-6">
												<a href="#edit_store_name_<?php echo $id;?>" data-toggle="modal"
													class="btn btn-danger btn-block">Change Store
													Name</a>
											</div>
											<div class="col-md-6">
												<a href="#edit_store_logo_<?php echo $id;?>" data-toggle="modal"
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
					<div class="modal fade" id="edit_store_name_<?php echo $id;?>" tabindex="-1" role="dialog"
						style="z-index: 1050; display: none;" aria-hidden="true">
						<div class="modal-dialog modal-lgx" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h4 class="modal-title">Edit Store</h4>


									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">×</span>
									</button>
								</div>
								<form id="change_store_name_<?php echo $id;?>" enctype="multipart/form-data">
									<div class="modal-body">

										<div class="form-group row">
											<label class="col-sm-2 col-form-label">New Store Name</label>
											<div class="col-sm-10">
												<input type="text" name="new_store_name"
													id="store_name_<?php echo $id;?>" class="form-control">
											</div>
										</div>
										<input type="hidden" name="store_id" id="store_id_<?php echo $id;?>"
											value="<?php echo $id;?>" />
									</div>

									<div class="modal-footer">
										<button type="button" class="btn btn-default waves-effect "
											data-dismiss="modal">Close</button>

										<button class="btn btn-primary waves-effect waves-light"
											id="change_name_<?php echo $id;?>">Change Store Name</button>
									</div>
								</form>
							</div>
						</div>
					</div>


					<!--change store Logo-->
					<div class="modal fade" id="edit_store_logo_<?php echo $id;?>" tabindex="-1" role="dialog"
						style="z-index: 1050; display: none;" aria-hidden="true">
						<div class="modal-dialog modal-lgx" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h4 class="modal-title">Edit Store</h4>


									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">×</span>
									</button>
								</div>
								<form id="uploadFormStoreLogo_<?php echo $id;?>" method="post">
									<div class="modal-body">

										<div class="form-group row">
											<label class="col-sm-2 col-form-label">New Store Logo</label>
											<div class="col-sm-10">
												<input type="file" name="file" id="file_<?php echo $id;?>"
													class="form-control">
											</div>
										</div>
										<input type="hidden" name="store_id" id="store_id_<?php echo $id;?>"
											value="<?php echo $id;?>" />
										<input type="hidden" name="store_name" id="dis_store_name_<?php echo $id;?>"
											value="<?php echo $store_name_2;?>" />
									</div>

									<div class="modal-footer">
										<button type="button" class="btn btn-default waves-effect"
											data-dismiss="modal">Close</button>
										<input type="submit" class="btn btn-primary waves-effect waves-light"
											value="Change Store Logo" id="change_logo_<?php echo $id;?>">
									</div>
								</form>
							</div>
						</div>
					</div>



					<script>
						$(document).ready(function () {
							$('#delete_store_<?php echo $id;?>').click(function (e) {
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
															'<?php echo base_url();?>Office/list_store'
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

					<script>
						$(document).ready(function () {
							$("#change_name_<?php echo $id;?>").click(function (e) {
								e.preventDefault();

								var store_id = $('#store_id_<?php echo $id;?>').val();
								var store_name = $('#store_name_<?php echo $id;?>').val();
								$.ajax({

									type: 'POST',
									url: '<?php echo base_url();?>Office/change_store_name',
									data: {
										store_id: store_id,
										store_name: store_name
									},

									success: function (resp) {

										//

										if (resp == 'ok') {
											$('#slide_show').load('<?php echo base_url();?>Office/list_store')
												.fadeIn(1000);
											swal({
												title: "Success",
												text: "Store name has been rename, reloading browser for system to take effect",
												icon: "success",
												closeOnClickOutside: false,
											});



											setInterval(function () {

												$('#slide_show').load(
														'<?php echo base_url();?>Office/list_store')
													.fadeIn(1000);
												window.location.reload();
											}, 4000);

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


							});



						});

					</script>

					<script>
						

						$(document).ready(function () {

							$('#uploadFormStoreLogo_<?php echo $id;?>').submit(function (e) {
								e.preventDefault();

                                var store_id    =$('#store_id_<?php echo $id;?>').val();
                                var file_name    =$('#file_<?php echo $id;?>').val();
                                var store_name   =$('#dis_store_name_<?php echo $id;?>').val();

								$.ajax({
									url: '<?php echo base_url();?>Office/change_store_logo',
									type: "post",
									data:{store_id:store_id, file_name:file_name},
									processData: false,
									contentType: false,
									cache: false,
									async: false,
									success: function (data) {
                                        alert(data);
										//alert("Upload Image Successful.");
									}
								});
							});


						});

					</script>



					<?php 
                    }
                }else{?>
					<div class="alert alert-danger">No data to display</div>
					<?php
                    }
                ?>

				</tbody>
			</table>
		</div>
	</div>


	<script>
		function referesh() {


		};

	</script>

</body>
