<div class="main-body">
	<div class="page-wrapper">

		<div class="page-body">
			<div class="row">
				<!-- task, page, download counter  start -->
				<?php $this->load->view('short_statics');?>
				<!-- task, page, download counter  end -->

				<?php
					$max_store 			=$this->Action->get_my_plan_store($user_id);
					$count_store 		=$this->Action->count_my_store($user_id);

					if($count_store <= $max_store){
				?>
				<a data-toggle="modal" href="#large-Modal" class="col-md-12 btn btn-danger btn-block"
					style="margin:1%;">Create Store</a>

				<?php
					}
				?>

				<div class="col-md-12" id="slideshow">Loading....</div>

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
				<h4 class="modal-title">Create Store</h4>


				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<form id="uploadForm" enctype="multipart/form-data">
				<div class="modal-body">
					<!-- <div class="progress" style="margin-top:1.5%;">
                        <div class="progress-bar"></div>
                    </div> -->
					<!-- <div id="uploadStatus" style="margin-top:1.5%;"></div> -->
					<div class="form-group row">
						<label class="col-sm-2 col-form-label">Store Name</label>
						<div class="col-sm-10">
							<input type="text" name="store_name" class="form-control">
						</div>
					</div>

					<div class="form-group row">
						<label class="col-sm-2 col-form-label">Store Logo</label>
						<div class="col-sm-10">
							<input type="file" name="file" id="fileInput" class="form-control">
						</div>
					</div>

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default waves-effect " data-dismiss="modal">Close</button>
					<input type="submit" class="btn btn-primary waves-effect waves-light" value="Create Store">
				</div>
			</form>
		</div>
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
				url: '<?php echo base_url();?>Office/create_store',
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
						$('#slideshow').load('<?php echo base_url();?>Office/list_store').fadeIn(1000);
						swal({
							title: "Success",
							text: "Office Store has been created successfully!",
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


<script>
	$(document).ready(function () {
		//setInterval(function() { 
		$('#slideshow').load('<?php echo base_url();?>Office/list_store')
			.fadeIn(1000);
		//},3000);
	});

</script>


