<style>
	/* .wizard > .content {
    background: #eee;
    display: block;
    margin: 0.5em;
    min-height: auto;
    overflow: hidden;
    position: relative;
    width: auto;
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    border-radius: 5px; } */

	/* 
.content {
    background: #eee;
    display: block;
    margin: 0.5em;
    overflow: hidden;
    position: relative;
    width: auto;
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    border-radius: 5px;
} */

</style>

<!-- <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet"> -->

<div class="main-body">
	<div class="page-wrapper">
		<!-- Page-header start -->
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
		<!-- Page-header end -->

		<!-- Page body start -->
		<div class="page-body">
			<form class="" action="#">
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
													class=" form-control">
											</div>
										</div>
										<div class="form-group row">
											<div class="col-sm-12">
												<label for="prod_size" class="block">Product Available Sizes/
													Resolution
													*</label>
											</div>
											<div class="col-sm-12">


												<input type="text" name="prod_size" id="prod_size" class="form-control"
													value="S,M, L, XXL, XXXL" data-role="tagsinput"
													style="display: none;">
                                                    <br /> 
                                                    <small style="color:red;">Enter size by comma (,)</small>
											</div>
										</div>
										<div class="form-group row">
											<div class="col-sm-12">
												<label for="prod_bunk" class="block">Available Quantity
													*</label>
											</div>
											<div class="col-sm-12">
												<input id="prod_bunk" name="prod_bunk" type="number"
													class="form-control ">
											</div>
										</div>

										<div class="form-group row">
											<div class="col-sm-12">
												<label for="prod_cat" class="block">Product category *</label>
											</div>
											<div class="col-sm-12">
												<select id="prod_cat" name="prod_cat" class="form-control">
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
												<select id="prod_sub_cat" name="prod_sub_cat" class="form-control">
													<option>Select Category</option>
												</select>
											</div>
										</div>

										<div class="form-group row">
											<div class="col-sm-12">
												<label for="prod_color" class="block">Available in Colors *</label>
											</div>
											<div class="col-sm-12">
												<input type="text" name="prod_color" id="prod_color"
													class="form-control" value="red,green" data-role="tagsinput"
													style="display: none;">
                                                    <br /> 
                                                    <small style="color:red;">Enter color by comma (,)</small>
											</div>
										</div>

									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="col-sm-12" id="second">
						<div class="card">
							<div class="card-header">
								<h5>Brand Infomation</h5>
								<span style="color:red;">Please fill all information</span>

								<div class="form-group row">
									<div class="col-sm-12">
										<label for="prod_cat" class="block">Supplier*</label>
									</div>
									<div class="col-sm-12">
										<select id="prod_cat" name="prod_cat" class="form-control">
											<option>Select Supplier</option>
										</select>
									</div>
								</div>

								<div class="form-group row">
									<div class="col-sm-12">
										<label for="prod_cat" class="block">Product Brand *</label>
									</div>
									<div class="col-sm-12">
										<select id="prod_cat" name="prod_cat" class="form-control">
											<option>Select Product Brand</option>
										</select>
									</div>
								</div>
								<div class="form-group row">
									<div class="col-sm-12">
										<div id="summernote">
											<p>Hello Summernote</p>
										</div>
									</div>

								</div>
								<div class="card-block">
									<div class="row">
										<div class="col-md-12"></div>
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
													class="form-control">
											</div>
										</div>

										<div class="form-group row">
											<div class="col-sm-12">
												<label for="prod_price" class="block">Selling Price *</label>
											</div>
											<div class="col-sm-12">
												<input type="number" id="prod_price" name="prod_price"
													class="form-control">
											</div>
										</div>

										<div class="form-group row">
											<div class="col-sm-12">
												<label for="prod_whole" class="block">Whosale Price *</label>
											</div>
											<div class="col-sm-12">
												<input type="number" id="prod_whole" name="prod_whole"
													class="form-control">
											</div>
										</div>

										<div class="form-group row">
											<div class="col-sm-12">
												<label for="prod_weight" class="block">Weight [Kg.]</label>
											</div>
											<div class="col-sm-12">
												<input type="number" id="prod_weight" name="prod_weight"
													class="form-control">
											</div>
										</div>

										<div class="form-group row">
											<div class="col-sm-12">
												<label for="prod_discount" class="block">Discount [0%]</label>
											</div>
											<div class="col-sm-12">
												<input type="number" id="prod_discount" name="prod_discount"
													class="form-control">
											</div>
										</div>

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
										<input type="file" class="form-control" id="prod_image" name="prod_image">
										<small style="color:red;">You can add multiple image later</small>

									</div>


								</div>
							</div>
						</div>
					</div>


					<div class="col-sm-12" id="fifth">
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
													class="form-control">
											</div>
										</div>

										<div class="form-group row">
											<div class="col-sm-12">
												<label for="metal_key" class="block">Metal Keyword</label>
											</div>
											<div class="col-sm-12">
												<input type="text" id="metal_key" name="metal_key" class="form-control">
												<small>Enter keywords separated with comma (,)</small>
											</div>
										</div>

										<div class="form-group row">
											<div class="col-sm-12">
												<label for="metal_desc" class="block">Metal Description</label>
											</div>
											<div class="col-sm-12">
												<textarea id="metal_desc" name="metal_desc"
													class="form-control"></textarea>
												<small>Enter keywords separated with comma (,)</small>
											</div>
										</div>

									</div>
								</div>
							</div>
						</div>

					</div>


				</div>

			</form>
		</div>
	</div>
	<!-- Page body end -->
</div>










<script type="text/javascript" src="<?php echo base_url();?>files/bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script> -->
<script>
    $(document).ready(function(){
        alert('hello');
        $('#first').show();
        $('#second').hide();
        $('#third').hide();
        $('#forth').hide();
        $('#fifth').hide();

    });
</script>

<script type="text/javascript">
	$(document).ready(function () {

		$('#create_customer').submit(function (e) {
			e.preventDefault();



			$.ajax({
				url: '<?php echo base_url();?>Office/create_supplier',
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


<!-- <script>
	function searchFilter(page_num) {
		page_num = page_num ? page_num : 0;
		var keywords = $('#keywords').val();
		var sortBy = $('#sortBy').val();

		$.ajax({
			type: 'POST',
			url: '<?php echo base_url('Office/customerPaginationData/'); ?>'+page_num,
			data: 'page=' + page_num + '&keywords=' + keywords + '&sortBy=' + sortBy,
			beforeSend: function () {
				$('.loading').show();
			},
			success: function (html) {
				$('#dataList').html(html);
				$('.loading').fadeOut("slow");
			}
		});
	}

</script> -->

<script>
	$(function () {

		/*--first time load--*/
		ajaxlist(page_url = false);

		/*-- Search keyword--*/
		$(document).keyup("#keywords", function (event) {
			ajaxlist(page_url = false);
			event.preventDefault();
		});


		/*-- Reset Search--*/
		$(document).on('change', "#sortBy", function (event) {
			ajaxlist(page_url = false);
			event.preventDefault();
		});

		/*-- Page click --*/
		$(document).on('click', ".pagination li a", function (event) {
			var page_url = $(this).attr('href');
			ajaxlist(page_url);
			event.preventDefault();
		});

		/*-- create function ajaxlist --*/
		function ajaxlist(page_url = false) {
			var search_key = $("#keywords").val();
			var sortBy = $('#sortBy').val();


			var dataString = 'search_key=' + search_key + '&sortBy=' + sortBy;

			var base_url = '<?php echo site_url('
			Office / view_my_supplier_ajax / ') ?>';

			if (page_url == false) {
				var page_url = base_url;
			}


			$.ajax({
				type: "POST",
				url: page_url,
				data: dataString,
				success: function (response) {
					// alert(response);
					console.log(response);
					$("#dataList").html(response);
				}
			});
		}


	});

</script>

<script>
	$(document).ready(function () {
		$('#summernote').summernote();
	});

</script>
