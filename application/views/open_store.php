<div class="main-body">
	<div class="page-wrapper">

		<div class="page-body">
			<div class="row">
				<!-- task, page, download counter  start -->
				<div class="col-xl-3 col-md-6">
					<div class="card bg-c-yellow update-card">
						<div class="card-block">
							<div class="row align-items-end">
								<div class="col-8">
									<h4 class="text-white">$30200</h4>
									<h6 class="text-white m-b-0">All Earnings</h6>
								</div>
								<div class="col-4 text-right">
									<canvas id="update-chart-1" height="50"></canvas>
								</div>
							</div>
						</div>
						<div class="card-footer">
							<p class="text-white m-b-0"><i class="feather icon-clock text-white f-14 m-r-10"></i>update
								: 2:15 am</p>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-md-6">
					<div class="card bg-c-green update-card">
						<div class="card-block">
							<div class="row align-items-end">
								<div class="col-8">
									<h4 class="text-white">290+</h4>
									<h6 class="text-white m-b-0">Page Views</h6>
								</div>
								<div class="col-4 text-right">
									<canvas id="update-chart-2" height="50"></canvas>
								</div>
							</div>
						</div>
						<div class="card-footer">
							<p class="text-white m-b-0"><i class="feather icon-clock text-white f-14 m-r-10"></i>update
								: 2:15 am</p>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-md-6">
					<div class="card bg-c-pink update-card">
						<div class="card-block">
							<div class="row align-items-end">
								<div class="col-8">
									<h4 class="text-white">145</h4>
									<h6 class="text-white m-b-0">Task Completed</h6>
								</div>
								<div class="col-4 text-right">
									<canvas id="update-chart-3" height="50"></canvas>
								</div>
							</div>
						</div>
						<div class="card-footer">
							<p class="text-white m-b-0"><i class="feather icon-clock text-white f-14 m-r-10"></i>update
								: 2:15 am</p>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-md-6">
					<div class="card bg-c-lite-green update-card">
						<div class="card-block">
							<div class="row align-items-end">
								<div class="col-8">
									<h4 class="text-white">500</h4>
									<h6 class="text-white m-b-0">Downloads</h6>
								</div>
								<div class="col-4 text-right">
									<canvas id="update-chart-4" height="50"></canvas>
								</div>
							</div>
						</div>
						<div class="card-footer">
							<p class="text-white m-b-0"><i class="feather icon-clock text-white f-14 m-r-10"></i>update
								: 2:15 am</p>
						</div>
					</div>
				</div>
				<!-- task, page, download counter  end -->

				<a data-toggle="modal" href="#large-Modal" class="col-md-12 btn btn-danger btn-block"
					style="margin:1%;">Create Store</a>

				<div class="card col-md-12" style="margin:1%;">
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
										First Name<span class="fooicon fooicon-sort"></span></th>
									<th data-breakpoints="xs" class="footable-sortable" style="display: table-cell;">
										Last Name<span class="fooicon fooicon-sort"></span></th>
									<th data-breakpoints="xs" class="footable-sortable" style="display: table-cell;">Job
										Title<span class="fooicon fooicon-sort"></span></th>
									<th data-breakpoints="xs" class="footable-sortable" style="display: table-cell;">
										BOB<span class="fooicon fooicon-sort"></span></th>
									<th class="footable-sortable footable-last-visible" style="display: table-cell;">
										Status<span class="fooicon fooicon-sort"></span></th>
								</tr>
							</thead>
							<tbody>
								<tr>

									<td class="footable-first-visible" style="display: table-cell;">Tiger Nixon</td>
									<td style="display: table-cell;">System Architect</td>
									<td style="display: table-cell;">Edinburgh</td>
									<td style="display: table-cell;">61</td>
									<td class="footable-last-visible" style="display: table-cell;"><span
											class="tag tag-danger"> Suspended</span>
									</td>
								</tr>
								<tr>

							</tbody>
						</table>
					</div>
				</div>

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
    $(document).ready(function() {
        $("#uploadForm").on('submit', function(e) {
            e.preventDefault();
            $.ajax({
                xhr: function() {
                    var xhr = new window.XMLHttpRequest();
                    xhr.upload.addEventListener("progress", function(evt) {
                        if (evt.lengthComputable) {
                            var percentComplete = Math.round((evt.loaded / evt.total) * 100);
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
                beforeSend: function() {
                    $(".progress-bar").width('0%');
                    $('#uploadStatus').html('<img src="<?php echo base_url();?>logo/loading_icon.gif" style="width: 200px; height: 100px;" />');
                },
                error: function() {
                    $('#uploadStatus').html('<div class="alert alert-danger">File upload failed, please try again.</div>');
                },
                success: function(resp) {
					alert(resp);
                    if (resp == 'ok') {
                        $('#uploadForm')[0].reset();
                        $('#uploadStatus').html('<div class="alert alert-success">File has uploaded successfully!</div>');
                    } else if (resp == 'err') {
                        $('#uploadStatus').html('<div class="alert alert-danger">Database Could not upload this Picture to server</div>');
                    } else {

                        $('#uploadStatus').html('<div class="alert alert-danger">' + resp + '</div>');
                    }
                }
            });
        });


        $("#fileInput").change(function() {
            var allowedTypes = ['image/jpeg', 'image/png', 'image/jpg', 'image/gif'];
            var file = this.files[0];
            var fileType = file.type;
            if (!allowedTypes.includes(fileType)) {
                //                alert('Please select a valid file (JPEG/JPG/PNG/GIF).');
                $('#uploadStatus').html('<div class="alert alert-danger">Please select a valid file (JPEG/JPG/PNG/GIF.</div>');
                $("#fileInput").val('');
                return false;
            }
        });
    });

</script>
