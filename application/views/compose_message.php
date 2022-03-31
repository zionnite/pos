<div class="main-body">
	<div class="page-wrapper">

		<div class="page-header">
			<div class="row align-items-end">
				<div class="col-lg-8">
					<div class="page-header-title">
						<div class="d-inline">
							<h4>Message</h4>
						</div>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="page-header-breadcrumb">
						<ul class="breadcrumb-title">
							<li class="breadcrumb-item" style="float: left;">
								<a href="javascript:;"> <i class="feather icon-home"></i> </a>
							</li>
							<li class="breadcrumb-item" style="float: left;"><a href="javascript:;">Message</a>
							</li>
							<li class="breadcrumb-item" style="float: left;"><a href="javascript:;">Compose Message
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
                        <form id="perform_msg" enctype="multipart/form-data" action="<?php echo base_url();?>Office/send_message">
						<div class="modal-body">


                            <div class="form-group row">
								<label class="col-sm-2 col-form-label">To</label>
								<div class="col-sm-10">
									<input type="text" id="email" readonly class="form-control" required value="<?php echo $sub_email;?>">
									<input type="hidden" name="email" value="<?php echo $sub_email;?>">
									<input type="hidden" name="sender" value="<?php echo $sender;?>">
								</div>
							</div>

							<div class="form-group row">
								<label class="col-sm-2 col-form-label">Title</label>
								<div class="col-sm-10">
									<input type="text" id="title" name="title" class="form-control" required>
									
								</div>
							</div>

							

							<div class="form-group row">
								<label class="col-sm-2 col-form-label">Message</label>
								<div class="col-sm-10">
									<textarea  name="msg" id="msg" class="form-control" required rols="100"></textarea>
								</div>
							</div>

					


						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default waves-effect " data-dismiss="modal">Close</button>
							<input type="submit" id="send" class="btn btn-primary waves-effect waves-light"
								value="Send Message">
						</div>
					</form>
						</div>
					</div>

				</div>

			</div>
		</div>
	</div>

	<div>

	</div>
</div>



<script type="text/javascript" src="<?php echo base_url();?>files/bower_components/jquery/dist/jquery.min.js"></script>

<script type="text/javascript">
			$(document).ready(function () {

				$('#perform_msg').submit(function (e) {
					e.preventDefault();

					
					$.ajax({
						url: '<?php echo base_url();?>Messages/send_msg',
						type: "post",
						data: new FormData(this),
						processData: false,
						contentType: false,
						cache: false,
						async: false,
						success: function (data) {
                            // alert(data);
							// $('#large-Modal').modal('hide');
							if (data == 'ok') {


								swal({
									title: "Success",
									text: "Message Sent",
									icon: "success",
									closeOnClickOutside: false,
								});

							} else if (data == 'err') {

								swal({
									title: "Oops!",
									text: "Message not sent, please try again later!",
									icon: "info",
									closeOnClickOutside: false,
								});

							}
							
						}
					});
				});


			});

		</script>