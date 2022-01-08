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

	.pagination a:hover:not(.active) {
		background-color: #ddd;
	}

</style>
<script type="text/javascript" src="<?php echo base_url();?>files/bower_components/jquery/dist/jquery.min.js"></script>
<div class="main-body">
	<div class="page-wrapper">

		<div class="page-body">
			<div class="row">
				<!-- task, page, download counter  start -->
				<?php $this->load->view('short_statics');?>
				<!-- task, page, download counter  end -->





				<div class="col-md-12" id="slideshow">
					<div class="card" id="slide_show">
						<div class="card-header">
							<h5>List Of Category</h5>

						</div>

						<?php
                            ($user_status =='store_owner') ? 
							    $get_category		=$this->Action->get_product_category($user_id)
                                :
                                $get_category		=$this->Action->get_product_category($store_owner_id);
							
						?>

						<div class="card-block">


							<a data-toggle="modal" href="#large-Modal" class="btn btn-danger btn-block"
								style="margin-bottom:1%; float:left;">Add Category</a>

							<div id="dataList">
								<?php
                                    if(is_array($get_category)){
                                        foreach($get_category as $row){
                                            $cat_id             =$row['id'];
                                            $cat_name           =$row['cat_name'];
                                            $dis_store_id       =$row['store_id'];
                                            $dis_branch_store_id    =$row['branch_store_id'];
                                            $dis_store_owner        =$row['store_owner_id'];

                                            ($user_status =='store_owner') ? 
                                                $get_sub_category   =$this->Action->get_sub_category_by_cat_id($cat_id,$user_id)
                                                :
                                                $get_sub_category	=$this->Action->get_sub_category_by_cat_id($cat_id,$store_owner_id);

                                                
                                ?>

												<div style="margin-bottom:1.5%;">
													<span style="font-size:17px;font-weight:bold;color:blue;"><?php echo $cat_name;?></span>
													<small><a href="javascript:;" id="delete_<?php echo $cat_id;?>" data-cat_id="<?php echo $cat_id;?>">
													<i class="fa fa-trash"
																style="color:red;"></i>Delete</a></small>||


													<small><a data-toggle="modal" href="#add_sub_category_<?php echo $cat_id;?>" id="add_<?php echo $cat_id;?>"
															><i class="fa fa-pen" style="color:green;"></i>Add</a></small>
												</div>
												<ul style="margin-bottom:1.5%; margin-left:5%; list-style-type: circle;">
													<?php
																if(is_array($get_sub_category)){
																	foreach($get_sub_category as $row){
																		$sub_cat_id             =$row['id'];
																		$sub_cat_name           =$row['sub_cat_name'];
																?>
																		<li><?php echo $sub_cat_name;?> 
																		<small>
																			<a href="javascript:;" id="delete_sub_<?php echo $sub_cat_id;?>" data-sub_cat_id="<?php echo $sub_cat_id;?>">
																				<i class="fa fa-trash" style="color:red;"></i>Delete
																			</a>
																		</small>
																		</li>


																		<script>
																			$(document).ready(function () {
																				$('#delete_sub_<?php echo $sub_cat_id;?>').click(function (e) {
																					e.preventDefault();
																					// alert('hello');
																					var cat_id = $(this).data('sub_cat_id');
																					
																					swal({
																							title: "Are you sure you want to DELETE this Sub-Category?",
																							icon: "warning",
																							buttons: true,
																							dangerMode: true,
																						})
																						.then((willDelete) => {
																							if (willDelete) {

																								$.ajax({
																									type: 'POST',
																									url: '<?php echo base_url();?>Office/delete_sub_category/' +
																									cat_id,

																									success: function (resp) {
																										if (resp == 'ok') {

																											swal({
																												title: "Success",
																												text: "Sub-Category has been been removed from List!",
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
																}
															?>
												</ul>

                                <div class="modal fade" id="add_sub_category_<?php echo $cat_id;?>" tabindex="-1" role="dialog" style="z-index: 1050; display: none;"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Add Sub Category</h4>


                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <form id="add_<?php echo $cat_id;?>" enctype="multipart/form-data">
                                                <div class="modal-body">



                                                    

                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">Sub Category Name</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" id="name_<?php echo $cat_id;?>" name="name" class="form-control" required>
                                                            <input type="hidden" id="dis_store_id_<?php echo $cat_id;?>" name="store_id" value="<?php echo $dis_store_id;?>">
                                                            <input type="hidden" id="dis_branch_id_<?php echo $cat_id;?>" name="branch_id" value="<?php echo $dis_branch_store_id;?>">
                                                            <input type="hidden" id="cat_id_<?php echo $cat_id;?>" name="cat_id" value="<?php echo $cat_id;?>">
                                                        </div>
                                                    </div>


                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default waves-effect " data-dismiss="modal">Close</button>
                                                    <input type="submit" class="btn btn-primary waves-effect waves-light" id="submit_sub_cat_<?php echo $cat_id;?>" value="Add Category">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>


                                <script>
                                    $(document).ready(function () {
                                        $('#delete_<?php echo $cat_id;?>').click(function (e) {
                                            e.preventDefault();
                                            // alert('hello');
                                            var cat_id = $(this).data('cat_id');
                                            
                                            swal({
                                                    title: "Are you sure you want to DELETE this Category?",
                                                    icon: "warning",
                                                    buttons: true,
                                                    dangerMode: true,
                                                })
                                                .then((willDelete) => {
                                                    if (willDelete) {

                                                        $.ajax({
                                                            type: 'POST',
                                                            url: '<?php echo base_url();?>Office/delete_category/' +
                                                            cat_id,

                                                            success: function (resp) {
                                                                if (resp == 'ok') {

                                                                    swal({
                                                                        title: "Success",
                                                                        text: "Category has been been removed from List!",
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

                                <script>
                                    $(document).ready(function () {
										$("#submit_sub_cat_<?php echo $cat_id;?>").click(function (e) {
                                            e.preventDefault();
                                            // alert('hello');
                                            var cat_id 		= $('#cat_id_<?php echo $cat_id;?>').val();
                                            var store_id 	= $('#dis_store_id_<?php echo $cat_id;?>').val();
                                            var branch_id 	= $('#dis_branch_id_<?php echo $cat_id;?>').val();
                                            var name 		= $('#name_<?php echo $cat_id;?>').val();

                                            var dataString = {'store_id' : store_id, 'branch_id': branch_id, 'cat_id': cat_id, 'name': name };
                                            
                                            $.ajax({
                                                type: 'POST',
                                                url: '<?php echo base_url();?>Office/create_sub_category/',
                                                data: dataString,

                                                success: function (resp) {
													// alert(resp);
                                                    if (resp == 'ok') {

                                                        swal({
                                                            title: "Success",
                                                            text: "Category has been been removed from List!",
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

                                        });

                                    });

                                </script>


								<?php
                                        }
                                    }
                                ?>
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
				<h4 class="modal-title">Add Category To List</h4>


				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<form id="create_customer" enctype="multipart/form-data">
				<div class="modal-body">



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


					<div class="form-group row">
						<label class="col-sm-2 col-form-label">Category Name</label>
						<div class="col-sm-10">
							<input type="text" id="name" name="name" class="form-control" required>
						</div>
					</div>


				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default waves-effect " data-dismiss="modal">Close</button>
					<input type="submit" class="btn btn-primary waves-effect waves-light" value="Add Category">
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



			$.ajax({
				url: '<?php echo base_url();?>Office/create_category',
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
							text: "Category name Added to List",
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
			// alert(store_id);
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

