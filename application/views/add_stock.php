<div class="main-body">
	<div class="page-wrapper">
		<div class="page-header">

			<div class="row align-items-end">

				<div class="col-lg-8">
					<div class="page-header-title">
						<div class="d-inline">
							<h4>Add Product</h4>
							<span>Insert new Product to Database</span>
						</div>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="page-header-breadcrumb">
						<ul class="breadcrumb-title">
							<li class="breadcrumb-item" style="float: left;">
								<a href="<?php echo base_url();?>Dashboard"> <i class="feather icon-home"></i> </a>
							</li>
							<li class="breadcrumb-item" style="float: left;"><a href="javascript:;">Add Product</a>
							</li>
						</ul>
					</div>
				</div>
			</div>

		</div>

		<div class="page-body">
			<div class="">



				<form id="create_product">
					<div class="row">

						<div class="col-sm-12" id="first">


							<div class="card">
								<div class="card-header">
									<h5>Product Infomation</h5>
									<span style="color:red;">Please fill all information</span>

								</div>
								<div class="card-block">
									<div class="row">
										<div class="col-md-12">
											<div class="form-group row">
												<div class="col-sm-12">
													<label for="prod_name" class="block">Product Name
														*</label>
												</div>

												<div class="col-sm-12">
													<input id="prod_name" name="prod_name" type="text"
														class=" form-control" required>
												</div>
											</div>
											<div class="form-group row">
												<div class="col-sm-12">
													<label for="prod_size" class="block">Product Available Sizes/
														Resolution
														*</label>
												</div>
												<div class="col-sm-12">


													<input type="text" name="prod_size" id="prod_size"
														class="form-control" placeholder="S,M, L, XXL, XXXL"
														data-role="tagsinput" style="display: none;" required>
													<br />
													<small style="color:red;">Enter size separated by comma (,)</small>
												</div>
											</div>
											<div class="form-group row">
												<div class="col-sm-12">
													<label for="prod_bunk" class="block">Available Quantity
														*</label>
												</div>
												<div class="col-sm-12">
													<input id="prod_bunk" name="prod_bunk" type="number"
														class="form-control " required>
												</div>
											</div>

											
											<div class="form-group row">
												<div class="col-sm-12">
													<label for="prod_color" class="block">Available in Colors *</label>
												</div>
												<div class="col-sm-12">
													<input type="text" name="prod_color" id="prod_color"
														class="form-control" placeholder="red,green" data-role="tagsinput"
														style="display: none;" required>
													<br />
													<small style="color:red;">Enter Colour separated by comma (,)</small>
												</div>
											</div>

                                            <div class="form-group row">
                                            <div class="col-sm-12">
													<label for="prod_color" class="block">Product Description *</label>
												</div>
												<div class="col-sm-12">
													<textarea id="summernote" name="prod_desc" class="form-control" required></textarea>
												</div>

											</div>

											<!-- <div class="col-sm-12"> -->
												<a href="javascript:;" id="moveToSecond" class="btn btn-danger">Move To Next</a>
											<!-- </div> -->
											
										</div>

                                        
									</div>
								</div>
							</div>
						</div>

						<div class="col-sm-12" id="second">
							<div class="card">
								<div class="card-header">
									<h5>Store, Product Category & Supplier Infomation</h5>
								</div>
								<div class="card-block">
									<div class="row">
										<div class="col-md-12">
											<span style="color:red;">Please fill all information</span>

											<?php
												if($user_status =='store_owner'){
											?>
                                            <div class="form-group row">
                                                <label class="col-sm-12 col-form-label">Select Store</label>
                                                <div class="col-sm-12">
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
                                                <label class="col-sm-12 col-form-label">Select Branch Store</label>
                                                <div class="col-sm-12">
                                                    <select type="text" id="branch_id" name="branch_id" class="form-control">
                                                        <option>Select Branch Store</option>

                                                    </select>
                                                </div>
                                            </div>

											<div class="form-group row">
												<div class="col-sm-12">
													<label for="prod_cat" class="block">Product category *</label>
												</div>
												<div class="col-sm-12">
													<select id="prod_cat" name="prod_cat" class="form-control" required>
														<option>Select Category</option>
													</select>
												</div>
											</div>

											<div class="form-group row">
												<div class="col-sm-12">
													<label for="prod_sub_cat" class="block">Product Sub category
														*</label>
												</div>
												<div class="col-sm-12">
													<select id="prod_sub_cat" name="prod_sub_cat" class="form-control" required>
														<option>Select Category</option>
													</select>
												</div>
											</div>


											<div class="form-group row">
												<div class="col-sm-12">
													<label for="prod_sup" class="block">Supplier*</label>
												</div>
												<div class="col-sm-12">
													<select id="prod_sup" name="prod_sup" class="form-control" required>
														<option>Select Supplier</option>
                                                        
													</select>
												</div>
											</div>

											<?php

											}else{
											?>
											<div class="form-group row">
                                                <label class="col-sm-12 col-form-label">Select Store</label>
                                                <div class="col-sm-12">
                                                    <select type="text" id="store_id" name="store_id" class="form-control">
														
                                                        <?php

															$my_store_name		=$this->Action->get_store_name_by_supervisor_id($user_id);
															$my_store_id		=$this->Action->get_store_id_by_supervisor_id($user_id);                                                            
                                                        ?>
                                                        <option value="<?php echo $my_store_id;?>"><?php echo $my_store_name;?></option>
                                                       
                                                    </select>
                                                </div>
                                            </div>


                                            <div class="form-group row">
                                                <label class="col-sm-12 col-form-label">Select Branch Store</label>
                                                <div class="col-sm-12">
													<?php

													$my_brach_name		=$this->Action->get_branch_name_by_supervisor_id($user_id);
													$my_brach__id		=$this->Action->get_branch_id_by_supervisor_id($user_id);                                                            
													?>
                                                    <select type="text" id="branch_id" name="branch_id" class="form-control">
														<option value="<?php echo $my_brach__id;?>"><?php echo $my_brach_name;?></option>

                                                    </select>
                                                </div>
                                            </div>

											<div class="form-group row">
												<div class="col-sm-12">
													<label for="prod_cat" class="block">Product category *</label>
												</div>
												<div class="col-sm-12">
													<select id="prod_cat" name="prod_cat" class="form-control" required>
														<option>Select Category</option>
														<?php
															$list_cat 		=$this->Action->get_prod_category_by_store_owner_id($store_owner_id);
															if(is_array($list_cat)){
																foreach($list_cat as $row){
																	$list_cat_id 			=$row['id'];
																	$list_cat_name 			=$row['cat_name'];
																
														?>
																<option value="<?php echo $list_cat_id;?>"><?php echo $list_cat_name;?></option>
														<?php 
																}
															}
														?>
													</select>
												</div>
											</div>

											<div class="form-group row">
												<div class="col-sm-12">
													<label for="prod_sub_cat" class="block">Product Sub category
														*</label>
												</div>
												<div class="col-sm-12">
													<select id="prod_sub_cat" name="prod_sub_cat" class="form-control" required>
														<option>Select Category</option>
													</select>
												</div>
											</div>


											<div class="form-group row">
												<div class="col-sm-12">
													<label for="prod_sup" class="block">Supplier*</label>
												</div>
												<div class="col-sm-12">
													<select id="prod_sup" name="prod_sup" class="form-control" required>
														<?php
															$list_sub 		=$this->Action->get_supplier_by_store_owner_id($store_owner_id);
															if(is_array($list_sub)){
																foreach($list_sub as $row){
																	$list_sub_id 			=$row['id'];
																	$list_sub_name 			=$row['name'];
																
														?>
																<option value="<?php echo $list_sub_id;?>"><?php echo $list_sub_name;?></option>
														<?php 
																}
															}
														?>
                                                        
													</select>
												</div>
											</div>

											<?php
											}
											?>

                                            

											<!-- <div class="form-group row">
												<div class="col-sm-12">
													<label for="prod_brand" class="block">Product Brand *</label>
												</div>
												<div class="col-sm-12">
													<select id="prod_brand" name="prod_brand" class="form-control" required>
														<option>Select Product Brand</option>
                                                        <option value="brand god">brand dogded</option>
                                                        <option value="brand brand">brand brand</option>
													</select>
												</div>
											</div> -->

											

										

											<a href="javascript:;" id="moveToThird" class="btn btn-danger">Move To Next</a>
										</div>
										
									</div>
								</div>


							</div>
						</div>


						<div class="col-sm-12" id="third">

							<div class="card">
								<div class="card-header">
									<h5>Billing Infomation</h5>
									<span style="color:red;">Please fill all information</span>

								</div>

								<div class="card-block">
									<div class="row">
										<div class="col-md-12">

											<div class="form-group row">
												<div class="col-sm-12">
													<label for="prod_cost" class="block">Cost Price *</label>
												</div>
												<div class="col-sm-12">
													<input type="number" id="prod_cost" name="prod_cost"
														class="form-control" required>
												</div>
											</div>

											<div class="form-group row">
												<div class="col-sm-12">
													<label for="prod_price" class="block">Selling Price *</label>
												</div>
												<div class="col-sm-12">
													<input type="number" id="prod_price" name="prod_price"
														class="form-control" required>
												</div>
											</div>

											<!-- <div class="form-group row">
												<div class="col-sm-12">
													<label for="prod_whole" class="block">Whosale Price *</label>
												</div>
												<div class="col-sm-12">
													<input type="number" id="prod_whole" name="prod_whole"
														class="form-control" required>
												</div>
											</div>

											<div class="form-group row">
												<div class="col-sm-12">
													<label for="prod_weight" class="block">Weight [Kg.]</label>
												</div>
												<div class="col-sm-12">
													<input type="number" id="prod_weight" name="prod_weight"
														class="form-control" required>
												</div>
											</div>

											<div class="form-group row">
												<div class="col-sm-12">
													<label for="prod_discount" class="block">Discount [0%]</label>
												</div>
												<div class="col-sm-12">
													<input type="number" id="prod_discount" name="prod_discount"
														class="form-control" required>
												</div>
											</div> -->


											<a href="javascript:;" id="moveToForth" class="btn btn-danger">Move To Next</a>
										</div>

										
									</div>
								</div>
							</div>

						</div>


						<div class="col-sm-12" id="forth">
							<div class="card">
								<div class="card-header">
									<h5>Product Images</h5>
									<span style="color:red;">Please fill all information</span>

								</div>
								<div class="card-block">
									<div class="row">
										<div class="col-md-12">
											<input type="file" class="form-control" id="file" name="file" required>
											<small style="color:red;">You can add multiple image later</small>


											
										</div>

										<div class="col-md-12" style="margin-top:1%;">
										<!-- <a href="javascript:;" id="moveToFifth" class="btn btn-danger">Move To Next</a> -->
											<input type="submit" class="btn btn-success" value="Submit Product" id="submit" name="submit">
										</div>
                                        
									</div>
								</div>
							</div>
						</div>


						<!-- <div class="col-sm-12" id="fifth">
							<div class="card">
								<div class="card-header">
									<h5>Meta Data Information</h5>
									<span style="color:red;">Please fill all information</span>

								</div>
								<div class="card-block">
									<div class="row">
										<div class="col-md-12">
											<div class="form-group row">
												<div class="col-sm-12">
													<label for="metal_title" class="block">Metal Title</label>
												</div>
												<div class="col-sm-12">
													<input type="text" id="metal_title" name="metal_title"
														class="form-control" required>
												</div>
											</div>

											<div class="form-group row">
												<div class="col-sm-12">
													<label for="metal_key" class="block">Metal Keyword</label>
												</div>
												<div class="col-sm-12">
													<input type="text" id="metal_key" name="metal_key"
														class="form-control" required>
													<small>Enter keywords separated with comma (,)</small>
												</div>
											</div>

											<div class="form-group row">
												<div class="col-sm-12">
													<label for="metal_desc" class="block">Metal Description</label>
												</div>
												<div class="col-sm-12">
													<textarea id="metal_desc" name="metal_desc"
														class="form-control" required></textarea>
													<small>Enter keywords separated with comma (,)</small>
												</div>
											</div>

											
										</div>


                                        
									</div>
								</div>
							</div>

						</div> -->


					</div>

				</form>

			</div>
		</div>
	</div>

</div>






<script type="text/javascript" src="<?php echo base_url();?>files/bower_components/jquery/dist/jquery.min.js"></script>



<script type="text/javascript">
	$(document).ready(function () {
		$('#second').hide();
		$('#third').hide();
		$('#forth').hide();
		$('#fifth').hide();

		$('#moveToSecond').click(function () {
			$('#second').fadeIn();
			document.getElementById('second').scrollIntoView();
		});

		$('#moveToThird').click(function () {
			$('#third').fadeIn();
			document.getElementById('third').scrollIntoView();
		});

		$('#moveToForth').click(function () {
			$('#forth').fadeIn();
			document.getElementById('forth').scrollIntoView();
		});

		$('#moveToFifth').click(function () {
			$('#fifth').fadeIn();
			document.getElementById('fifth').scrollIntoView();
		});

		$('#create_product').submit(function (e) {
			e.preventDefault();


			$.ajax({
				url: '<?php echo base_url();?>Office/create_product',
				type: "post",
				data: new FormData(this),
				processData: false,
				contentType: false,
				cache: false,
				async: false,
				success: function (data) {
					$('#large-Modal').modal('hide');
                    $('#create_product')[0].reset();
                    // alert(data);
					if (data == 'ok') {


						swal({
							title: "Success",
							text: "Product Added to List",
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


        $("#file").change(function () {
            
			var allowedTypes = ['image/jpeg', 'image/png', 'image/jpg', 'image/gif'];
			var file = this.files[0];
			var fileType = file.type;
			if (!allowedTypes.includes(fileType)) {
				            //    alert('Please select a valid file (JPEG/JPG/PNG/GIF).');

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
					$("#branch_id").append(html);

				}
			});
		});


		$("#branch_id").change(function () {
			var branch_id = $('#branch_id').val();
            var store_id    =$('#store_id').val();

            //alert('store id ='+ store_id + 'branch id ='+ branch_id);

			var dataString = 'branch_id=' + branch_id + '&store_id='+ store_id;
			//alert(dataString);
            //get supplier id
			$.ajax({
				type: "POST",
				url: "<?php echo base_url();?>Office/get_store_supplier",
				data: dataString,
				cache: false,
				success: function (html) {
					$("#prod_sup").append(html);

				}
			});

            $.ajax({
				type: "POST",
				url: "<?php echo base_url();?>Office/get_product_category",
				data: dataString,
				cache: false,
				success: function (html) {
					$("#prod_cat").append(html);

				}
			});
		});

        $("#prod_cat").change(function () {
			var cat_id = $('#prod_cat').val();
			var dataString = 'cat_id=' + cat_id;
			//alert(dataString);
			$.ajax({
				type: "POST",
				url: "<?php echo base_url();?>Office/get_product_sub_category",
				data: dataString,
				cache: false,
				success: function (html) {
					$("#prod_sub_cat").append(html);

				}
			});
		});
	});

</script>
