<div class="main-body">
	<div class="page-wrapper">

		<div class="page-header">
			<div class="row align-items-end">
				<div class="col-lg-8">
					<div class="page-header-title">
						<div class="d-inline">
							<h4>Update Site Details</h4>
						</div>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="page-header-breadcrumb">
						<ul class="breadcrumb-title">
							<li class="breadcrumb-item" style="float: left;">
								<a href="javascript:;"> <i class="feather icon-home"></i> </a>
							</li>
							<li class="breadcrumb-item" style="float: left;"><a href="javascript:;">Site Setting</a>
							</li>
							<li class="breadcrumb-item" style="float: left;"><a href="javascript:;">Update Site
									Details</a> </li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="page-body">
			<div class="row">

				<div class="col-md-12" id="">
					<div class="card" id="">
						<div class="card-block">
							<?php
								$site_name 			=$this->Admin_db->get_site_name();
								$site_logo			=$this->Admin_db->get_site_logo();
								$site_phone 		=$this->Admin_db->get_site_phone();
								$site_email 		=$this->Admin_db->get_site_email();
								$site_gName 		=$this->Admin_db->get_site_g_name();
								$site_gPass 		=$this->Admin_db->get_site_g_pass();
							?>

							<form id="uploadForm" enctype="multipart/form-data">
								
								<div class="form-group row">
									<label class="col-sm-2 col-form-label">Site Name</label>
									<div class="col-sm-10">
										<input type="text" name="site_name" id="site_name" class="form-control" value="<?php echo $site_name;?>">
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-2 col-form-label">Site Phone</label>
									<div class="col-sm-10">
										<input type="text" name="phone" id="phone" class="form-control" value="<?php echo $site_phone;?>">
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-2 col-form-label">Site Email</label>
									<div class="col-sm-10">
										<input type="text" name="email" id="email" class="form-control" value="<?php echo $site_email;?>">
									</div>
								</div>

								<div class="form-group row">
									<label class="col-sm-2 col-form-label">Site Logo</label>
									<div class="col-sm-10">
										<input type="file" name="file" id="fileInput" class="form-control">
										<!-- <small><b style="color:red;">Note: Width must be 150px and Height must 30px</b></small> -->
										<small><b style="color:red;">Note: Width must be 220px and Height must 75px</b></small>
									</div>
								</div>

								<div class="form-group row">

									<label class="col-sm-2 col-form-label">&nbsp;</label>
									<div class="col-sm-10">
										<?php
											if(isset($site_logo)){?>
												<img class="" style="width:220px; height:75px;" src="<?php echo base_url();?>files/site_logo/<?php echo $site_logo;?>" alt="">
										<?php
											}

										?>
									</div>
									
								</div>

								<!-- <div class="form-group row">
									<label class="col-sm-2 col-form-label">&nbsp;</label>
									<div class="col-sm-10">
										
										<small><b style="color:red;">Please fill this Information</b></small>
									</div>
								</div> -->

								<div class="form-group row">
									<label class="col-sm-2 col-form-label">Gmail Email Address</label>
									<div class="col-sm-10">
										<input type="text" name="gname" id="gname" class="form-control" value="<?php echo $site_gName;?>">
									</div>
								</div>

								<div class="form-group row">
									<label class="col-sm-2 col-form-label">Gmail Password</label>
									<div class="col-sm-10">
										<input type="text" name="gpass" id="gpass" class="form-control" value="<?php echo $site_gPass;?>">
									</div>
								</div>

								<div class="form-group row">

									<label class="col-sm-2 col-form-label">&nbsp;</label>
									<div class="col-sm-10">
										<input type="submit" class="btn btn-primary waves-effect waves-light"
										value="Update Site Details">
									</div>
									
								</div>
								
							</form>
						</div>
					</div>

				</div>

			</div>
		</div>
	</div>

	<div id="styleSelector">

	</div>
</div>



<script type="text/javascript" src="<?php echo base_url();?>files/bower_components/jquery/dist/jquery.min.js"></script>

<script type="text/javascript">
	$(document).ready(function () {
		$("#uploadForm").on('submit', function (e) {
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
				url: '<?php echo base_url();?>Dashboard/update_site_details',
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
						$('#uploadForm')[0].reset();
						$('#slideshow').load('<?php echo base_url();?>Dashboard/settings_2').fadeIn(1000);
						swal({
							title: "Success",
							text: "Site Details Updated!",
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