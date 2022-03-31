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
							<li class="breadcrumb-item" style="float: left;"><a href="javascript:;">Read Message
									</a> </li>
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
                            <div class="table-responsive">
                                <table class="table table-striped footable footable-1 footable-paging footable-paging-center breakpoint-lg" style="">
                                    <thead>
                                        <tr class="footable-header">
                                            <th class="footable-sortable footable-first-visible" style="display: table-cell;">
                                                S/N<span class="fooicon fooicon-sort"></span></th>

                                            
                                            <th data-breakpoints="xs" class="footable-sortable" style="display: table-cell;">From</th>
                                            <th data-breakpoints="xs" class="footable-sortable" style="display: table-cell;">Title</th>
                                            <th data-breakpoints="xs" class="footable-sortable" style="display: table-cell;">Date Created</th>
                                            <th data-breakpoints="xs" class="footable-sortable" style="display: table-cell;"></th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php	
                                        if(is_array($get_message)){
                                            $i=1;
                                            foreach($get_message as $row){

                                            $id              =$row['id'];
                                            $sender          =$row['sender'];
                                            $reciever        =$row['reciever'];
                                            $title           =$row['title'];
                                            $message         =$row['message'];
                                            $date            =$row['date_created'];
                                            $time            =$row['time'];

                                            $encode_email    =urlencode($sender);
                                            $encode_rec      =urlencode($reciever);

                                            // if(strlen($message) > 25) {
                                            //     $message = $message.' ';
                                            //     $message = substr($message, 0, 150);
                                            //     $message = substr($message, 0, strrpos($message ,' '));
                                            //     $message = $message.'...';
                                            // }
                                        ?>

                                        <tr>
                                            <td><?php echo $i++;?></td>
                                            <td><?php echo $sender;?></td>
                                            <td>
                                                <?php echo $title;?><br>
                                                <a href=".read_more<?php echo $id;?>" data-toggle="modal" class="label label-info">Read More</a>
                                            </td>
                                            <td><?php echo $this->Admin_db->time_stamp($time);?></td>
                                            <td>
                                                <a href="<?php echo base_url();?>Messages/compose_message/<?php echo $encode_rec;?>/<?php echo $encode_email;?>"
                                                    class="label label-inverse"><i class="fa fa-envelope"></i> Message</a>

                                                <a href="javascript:;" id="delete_msg<?php echo $id;?>" data-id="<?php echo $id;?>"
                                                    class="label label-danger"><i class="fa fa-trash"></i> Mark As Read</a>
                                            </td>
                                            
                                        </tr>
                                        
                                        <!--Option Dialog-->
                                       

                                        <div class="modal fade read_more<?php echo $id;?>" tabindex="-1" role="dialog"
                                            aria-labelledby="mySmallModalLabel" aria-hidden="true" style="display: none;">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="mySmallModalLabel"><?php echo $title;?></h4>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-hidden="true">×</button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <?php echo $message;?>
                                                    </div>
                                                </div>
                                                <!-- /.modal-content -->
                                            </div>
                                            <!-- /.modal-dialog -->
                                        </div>
                                    

                                        <script type="text/javascript"
										src="<?php echo base_url();?>files/bower_components/jquery/dist/jquery.min.js">
                                        </script>

                                        <script>
                                            $(document).ready(function () {
                                                $('#delete_msg<?php echo $id;?>').click(function (e) {
                                                    e.preventDefault();
                                                    var id = $(this).data('id');
                                                    swal({
                                                            title: "Are you sure you want to DELETE this Message?",
                                                            text:"Once deleted, data can'\t be recovered",
                                                            icon: "warning",
                                                            buttons: true,
                                                            dangerMode: true,
                                                        })
                                                        .then((willDelete) => {
                                                            if (willDelete) {

                                                                $.ajax({
                                                                    type: 'POST',
                                                                    url: '<?php echo base_url();?>Messages/delete_msg/' +
                                                                        id,

                                                                    success: function (resp) {
                                                                        if (resp == 'ok') {

                                                                            swal({
                                                                                title: "Success",
                                                                                text: "Message Deleted!",
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
                                        }else{
                                            echo '<div class="alert alert-danger">No data is present at the moment<div>';
                                        }
                                        ?>
                                    </tbody>

                                    
                                </table>
                            </div>
						</div>

					</div>

				</div>

			</div>
		</div>
	</div>

	<div>

	</div>
</div>
