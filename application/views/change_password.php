<div class="main-body">
	<div class="page-wrapper">

		<div class="page-header">
			<div class="row align-items-end">
				<div class="col-lg-8">
					<div class="page-header-title">
						<div class="d-inline">
							<h4>Change Password</h4>
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
							<li class="breadcrumb-item" style="float: left;"><a href="javascript:;">Change Password</a> </li>
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

							<form id="uploadFormr" method="post" action="<?php echo base_url();?>ChangePassword/update_password">
                                <?php echo isset($aalert)?$aalert:NULL;?>
								<div class="form-group row">
									<label class="col-sm-2 col-form-label">Old Password</label>
									<div class="col-sm-10">
										<input type="text" name="old" id="old" class="form-control">
									</div>
								</div>
								
								<div class="form-group row">
									<label class="col-sm-2 col-form-label">New Password</label>
									<div class="col-sm-10">
										<input type="text" name="new" id="new" class="form-control">
									</div>
								</div>
								<!-- <div class="form-group row">
									<label class="col-sm-2 col-form-label">Confirm New Password</label>
									<div class="col-sm-10">
										<input type="text" name="renew" id="renew" class="form-control">
									</div>
								</div> -->
								



								<input type="submit" name="submit" class="btn btn-primary waves-effect waves-light"
									value="Change Password">
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
            var private         =$('#private').val();
            var public          =$('#public').val();
			$.ajax({
				
				type: 'POST',
				url: '<?php echo base_url();?>ChangePassword/update_password',
				data: {'private':private,'public':public},
				
				success: function (resp) {

					if (resp == 'ok') {
						$('#uploadForm')[0].reset();
						$('#slideshow').load('<?php echo base_url();?>Dashboard/set_payment_api_2').fadeIn(1000);
						swal({
							title: "Success",
							text: "Password sucessfully changed",
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


		
	});

</script>