<div class="main-body">
	<div class="page-wrapper">

		<div class="page-header">
			<div class="row align-items-end">
				<div class="col-lg-8">
					<div class="page-header-title">
						<div class="d-inline">
							<h4>Update Payment API</h4>
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
							<li class="breadcrumb-item" style="float: left;"><a href="javascript:;">Update Payment API</a> </li>
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

						$public_key        =$this->Admin_db->get_public_live_key();
						$private_key       =$this->Admin_db->get_private_live_key();
						//$full_name         =str_replace(" ","_",$full_name);
						$token  =time();
							
						?>

							<form id="uploadForm" enctype="multipart/form-data">
								
								<div class="form-group row">
									<label class="col-sm-2 col-form-label">Public Live Key</label>
									<div class="col-sm-10">
										<input type="text" name="public" id="public" class="form-control" value="<?php echo $public_key;?>">
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-2 col-form-label">Prive or Seceret Live Key</label>
									<div class="col-sm-10">
										<input type="text" name="private" id="private" class="form-control" value="<?php echo $private_key;?>">
									</div>
								</div>
								

								<div class="form-group row">
									<div class="col-sm-2">&nbsp;</div>
									<div class="col-sm-10">
										<input type="submit" class="btn btn-primary waves-effect waves-light"
										value="Update Payment API">
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
            var private         =$('#private').val();
            var public          =$('#public').val();
			$.ajax({
				
				type: 'POST',
				url: '<?php echo base_url();?>Dashboard/update_payment_api',
				data: {'private':private,'public':public},
				
				success: function (resp) {

					if (resp == 'ok') {
						$('#uploadForm')[0].reset();
						$('#slideshow').load('<?php echo base_url();?>Dashboard/set_payment_api_2').fadeIn(1000);
						swal({
							title: "Success",
							text: "Payment API'\s Updated!",
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