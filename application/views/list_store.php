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
					<td style="display: table-cell;"><img style="width:100px; height:100px;"
							src="<?php echo base_url();?>store_img/<?php echo $store_name_2;?>/images/<?php echo $store_logo;?>"
							alt=""></td>
					<td style="display: table-cell;"><?php echo $store_name;?></td>
					<td>
						<a href="javascript:;" class="btn btn-success btn-sm btn-block">Manage Store</a>
					</td>
					<td>
						<a href="#edit_store_<?php echo $id;?>" class="btn btn-info btn-sm" data-toggle="modal">Edit</a>
						<a href="javascript:;" class="btn btn-danger btn-sm" id="delete_store_<?php echo $id;?>"
							data-store_id="<?php echo $id;?>">Delete</a>
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
							<form id="uploadFormStoreName_<?php echo $id;?>" enctype="multipart/form-data">
								<div class="modal-body">

									<div class="form-group row">
										<label class="col-sm-2 col-form-label">New Store Name</label>
										<div class="col-sm-10">
											<input type="text" name="new_store_name" class="form-control">
										</div>
									</div>
                                    <input type="hidden" name="store_id" value="<?php echo $id;?>" />
								</div>

								<div class="modal-footer">
									<button type="button" class="btn btn-default waves-effect "
										data-dismiss="modal">Close</button>

									<input type="submit" class="btn btn-primary waves-effect waves-light"
										value="Change Store Name">
								</div>
							</form>
						</div>
					</div>
				</div>
                

                  <!--change store Logo-->
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
							<form id="uploadFormStoreLogo_<?php echo $id;?>" enctype="multipart/form-data">
								<div class="modal-body">

									<div class="form-group row">
										<label class="col-sm-2 col-form-label">New Store Name</label>
										<div class="col-sm-10">
											<input type="text" name="new_store_name" class="form-control">
										</div>
									</div>
                                    <!-- <input type="hidden" name="store_id" value="<?php echo $id;?>" /> -->
								</div>

								<div class="modal-footer">
									<button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
									<input type="submit" class="btn btn-primary waves-effect waves-light" value="Change Store Name">
								</div>
							</form>
						</div>
					</div>
				</div>


				<script type="text/javascript"
					src="<?php echo base_url();?>files/bower_components/jquery/dist/jquery.min.js"></script>
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
													$('#slideshow').load(
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
