<?php
	$currency               			='&#8358;';
	$total_transaction                  =$this->Action->count_total_transaction_by_admin($store_id);
    $total_item_sold                    =$this->Action->count_total_item_sold_by_admin($store_id);
    $total_branch                       =$this->Action->count_store_branch_by_admin($store_id);
    $total_supervisor                   =$this->Action->count_store_supervisor_by_admin($store_id);
    $total_staff                        =$this->Action->count_store_staff_by_admin($store_id);
?>
<div class="main-body">
	<div class="page-wrapper">

		<div class="page-body">
			<div class="row">
				<!-- task, page, download counter  start -->
				
                <div class="col-sm-3">
					<div class="card bg-c-yellow text-white widget-visitor-card">
						<div class="card-block-small text-center">
							<h2><?php echo $total_branch;?></h2>
							<h6>Total Branch</h6>
						</div>
					</div>
				</div>

                <div class="col-sm-3">
					<div class="card bg-c-blue text-white widget-visitor-card">
						<div class="card-block-small text-center">
							<h2><?php echo $total_supervisor;?></h2>
							<h6>Total Supervisor</h6>
						</div>
					</div>
				</div>

                <div class="col-sm-3">
					<div class="card bg-c-pink text-white widget-visitor-card">
						<div class="card-block-small text-center">
							<h2><?php echo $total_staff;?></h2>
							<h6>Total Staff</h6>
						</div>
					</div>
				</div>

                <div class="col-sm-3">
					<div class="card bg-c-green text-white widget-visitor-card">
						<div class="card-block-small text-center">
							<h2><?php echo $total_transaction;?></h2>
							<h6>Total Transaction</h6>
						</div>
					</div>
				</div>

				<!-- task, page, download counter  end -->

			
				<div class="col-md-12" id="slideshow">
					<div class="card" id="slide_show">
						<div class="card-header">
							<h5>Viewing Store Branch</h5>

						</div>

						<?php
								$get_store			    =$this->Action->get_store_by_admin();
								$get_store_branch		=$this->Action->get_store_branches_by_admin();
						?>

						

						<div class="card-block">
							
							<table id="demo-foo-filtering"
								class="table table-striped footable footable-1 footable-paging footable-paging-center breakpoint-lg"
								style="">
								<thead>
									<tr class="footable-header">





										<th class="footable-sortable footable-first-visible"
											style="display: table-cell;">
											S/N<span class="fooicon fooicon-sort"></span></th>

										
										<th data-breakpoints="xs" class="footable-sortable"
											style="display: table-cell;">Branch Name<span
												class="fooicon fooicon-sort"></span></th>

										<th data-breakpoints="xs" class="footable-sortable"
											style="display: table-cell;">Date Created</th>
							
									</tr>
								</thead>

								<tbody>
									<?php

                                        $get_store_branches        =$this->Action->get_store_branches_by_store_id($store_id);
										
										// $get_store			    =$this->Action->get_store_by_admin();											
										// $get_store			=$this->Action->get_my_store_sales_rep_filter_by_store_id($user_id,$dis_store_id);
										// $get_store			=$this->Action->get_my_store_sales_rep_filter_by_branch_id($store_owner_id,$dis_branch_id);
									
						
                                        $i=1;
                                        if(is_array($get_store_branches)){
                                            foreach($get_store_branches as $row){
                                                $id		     		        =$row['id'];
                                                $branch_name		        =$row['branch_name'];
                                                $date                       =$row['date_created'];
                                                
                                                $count_dis_user_number_of_store             =$this->Action->count_my_store($id);

                                            
                                    ?>

									<tr>
										<td><?php echo $i++;?></td>
										
										<td><?php echo $branch_name;?></td>
										<td><?php echo $date;?></td>
										
									</tr>

									<script type="text/javascript"
										src="<?php echo base_url();?>files/bower_components/jquery/dist/jquery.min.js">
									</script>

									<script>
										$(document).ready(function () {
											$('#delete_branch_<?php echo $id;?>').click(function (e) {
												e.preventDefault();
												var id = $(this).data('id');
												swal({
														title: "Are you sure you want to DELETE this STORE OWNER?",
                                                        text:"Once deleted, data can'\t be recovered",
														icon: "warning",
														buttons: true,
														dangerMode: true,
													})
													.then((willDelete) => {
														if (willDelete) {

															$.ajax({
																type: 'POST',
																url: '<?php echo base_url();?>Dashboard/delete_store_owner/' +
																	id,

																success: function (resp) {
																	if (resp == 'ok') {

																		swal({
																			title: "Success",
																			text: "Store Owner has been been removed from List!",
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
                                        }else{?>
                                                    <div class="alert alert-warning" style="margin-top:4%;">No Information to Display yet!</div>
                                                    <?php
                                        }
                                    ?>
								</tbody>
                            </table>
						</div>
					</div>

				</div>


                <!--Store Supervisor-->
                <div class="col-md-12" id="slideshow">
					<div class="card" id="slide_show">
						<div class="card-header">
							<h5>Viewing Supervisor</h5>

						</div>

						<?php
								$get_store			    =$this->Action->get_store_by_admin();
								$get_store_branch		=$this->Action->get_store_branches_by_admin();
						?>

						

						<div class="card-block">
							
							<table id="demo-foo-filtering"
								class="table table-inverse table-striped footable footable-1 footable-paging footable-paging-center breakpoint-lg"
								style="">
								<thead>
									<tr class="footable-header">





										<th class="footable-sortable footable-first-visible"
											style="display: table-cell;">
											S/N<span class="fooicon fooicon-sort"></span></th>

										
										<th data-breakpoints="xs" class="footable-sortable"
											style="display: table-cell;">Name<span
												class="fooicon fooicon-sort"></span></th>


										<th data-breakpoints="xs" class="footable-sortable"
											style="display: table-cell;">Branch Managing<span
												class="fooicon fooicon-sort"></span></th>

										<th data-breakpoints="xs" class="footable-sortable"
											style="display: table-cell;">Phone<span
												class="fooicon fooicon-sort"></span></th>

										<th data-breakpoints="xs" class="footable-sortable"
											style="display: table-cell;">Email<span
												class="fooicon fooicon-sort"></span></th>

										<th data-breakpoints="xs" class="footable-sortable"
											style="display: table-cell;"></th>
									</tr>
								</thead>

								<tbody>
									<?php

                                        $get_store_sup        =$this->Action->get_my_store_supervisor_by_store_id($store_id);
									
						
                                        $i=1;
                                        if(is_array($get_store_sup)){
                                            foreach($get_store_sup as $row){
                                                $id                     =$row['id'];
                                                $store_name 	        =$row['store_name'];
                                                $branch_name            =$row['branch_store_name'];
                                                $branch_store_id        =$row['branch_store_id'];
                
                                                $sub_email      =$row['email'];
                                                $sub_name       =$row['name'];
                                                $sub_phone      =$row['phone_no'];
                
                                                $date			=$row['date_created'];

                                            
                                    ?>

									<tr>
										<td><?php echo $i++;?></td>
										
										<td><?php echo $sub_name;?></td>
										<td><?php echo $branch_name;?></td>
										<td><?php echo $sub_phone;?></td>
										<td><?php echo $sub_email;?></td>
										<td>
											<?php echo $date;?>
										</td>
									</tr>

									<script type="text/javascript"
										src="<?php echo base_url();?>files/bower_components/jquery/dist/jquery.min.js">
									</script>

									<script>
										$(document).ready(function () {
											$('#delete_branch_<?php echo $id;?>').click(function (e) {
												e.preventDefault();
												var id = $(this).data('id');
												swal({
														title: "Are you sure you want to DELETE this STORE OWNER?",
                                                        text:"Once deleted, data can'\t be recovered",
														icon: "warning",
														buttons: true,
														dangerMode: true,
													})
													.then((willDelete) => {
														if (willDelete) {

															$.ajax({
																type: 'POST',
																url: '<?php echo base_url();?>Dashboard/delete_store_owner/' +
																	id,

																success: function (resp) {
																	if (resp == 'ok') {

																		swal({
																			title: "Success",
																			text: "Store Owner has been been removed from List!",
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
                                        }else{?>
                                                    <div class="alert alert-warning" style="margin-top:4%;">No Information to Display yet!</div>
                                                    <?php
                                        }
                                    ?>
								</tbody>
                            </table>
						</div>
					</div>

				</div>


                <!--Store Sales Rep-->
                <div class="col-md-12" id="slideshow">
					<div class="card" id="slide_show">
						<div class="card-header">
							<h5>View Store Sales Rep (Staff)</h5>

						</div>

						<?php
								$get_store			    =$this->Action->get_store_by_admin();
								$get_store_branch		=$this->Action->get_store_branches_by_admin();
						?>

						

						<div class="card-block">
							
							<table id="demo-foo-filtering"
								class="table table-striped footable footable-1 footable-paging footable-paging-center breakpoint-lg"
								style="">
								<thead>
									<tr class="footable-header">





										<th class="footable-sortable footable-first-visible"
											style="display: table-cell;">
											S/N<span class="fooicon fooicon-sort"></span></th>

										
										<th data-breakpoints="xs" class="footable-sortable"
											style="display: table-cell;">Name<span
												class="fooicon fooicon-sort"></span></th>


										<th data-breakpoints="xs" class="footable-sortable"
											style="display: table-cell;">Branch Assign<span
												class="fooicon fooicon-sort"></span></th>

										<th data-breakpoints="xs" class="footable-sortable"
											style="display: table-cell;">Phone<span
												class="fooicon fooicon-sort"></span></th>

										<th data-breakpoints="xs" class="footable-sortable"
											style="display: table-cell;">Email<span
												class="fooicon fooicon-sort"></span></th>

										<th data-breakpoints="xs" class="footable-sortable"
											style="display: table-cell;"></th>
									</tr>
								</thead>

								<tbody>
									<?php

                                        $get_store_owner        =$this->Action->get_my_store_sales_rep_by_store_id($store_id);
										
										// $get_store			    =$this->Action->get_store_by_admin();											
										// $get_store			=$this->Action->get_my_store_sales_rep_filter_by_store_id($user_id,$dis_store_id);
										// $get_store			=$this->Action->get_my_store_sales_rep_filter_by_branch_id($store_owner_id,$dis_branch_id);
									
						
                                        $i=1;
                                        if(is_array($get_store_owner)){
                                            foreach($get_store_owner as $row){
                                                $id		     		        =$row['id'];
                                                $branch_name            =$row['branch_store_name'];
                                                $branch_store_id        =$row['branch_store_id'];

                                                $sub_email      =$row['email'];
                                                $sub_name       =$row['name'];
                                                $sub_phone      =$row['phone_no'];

                                                $date			=$row['date_created'];

                                                            
                                    ?>

									<tr>
										<td><?php echo $i++;?></td>
										
										<td><?php echo $sub_name;?></td>
										<td><?php echo $branch_name;?></td>
										<td><?php echo $sub_phone;?></td>
										<td><?php echo $sub_email;?></td>
										<td>
											<?php echo $date;?>
										</td>
									</tr>

									<script type="text/javascript"
										src="<?php echo base_url();?>files/bower_components/jquery/dist/jquery.min.js">
									</script>

									<script>
										$(document).ready(function () {
											$('#delete_branch_<?php echo $id;?>').click(function (e) {
												e.preventDefault();
												var id = $(this).data('id');
												swal({
														title: "Are you sure you want to DELETE this STORE OWNER?",
                                                        text:"Once deleted, data can'\t be recovered",
														icon: "warning",
														buttons: true,
														dangerMode: true,
													})
													.then((willDelete) => {
														if (willDelete) {

															$.ajax({
																type: 'POST',
																url: '<?php echo base_url();?>Dashboard/delete_store_owner/' +
																	id,

																success: function (resp) {
																	if (resp == 'ok') {

																		swal({
																			title: "Success",
																			text: "Store Owner has been been removed from List!",
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
                                        }else{?>
                                                    <div class="alert alert-warning" style="margin-top:4%;">No Information to Display yet!</div>
                                                    <?php
                                        }
                                    ?>
								</tbody>
                            </table>
						</div>
					</div>

				</div>

                <!--Store Custormer-->
                <div class="col-md-12" id="slideshow" style="display:none;">
					<div class="card" id="slide_show">
						<div class="card-header">
							<h5>Viewing Customer</h5>

						</div>

						<?php
								$get_store			    =$this->Action->get_store_by_admin();
								$get_store_branch		=$this->Action->get_store_branches_by_admin();
						?>

						

						<div class="card-block">
							
							<table id="demo-foo-filtering"
								class="table table-striped footable footable-1 footable-paging footable-paging-center breakpoint-lg"
								style="">
								<thead>
									<tr class="footable-header">





										<th class="footable-sortable footable-first-visible"
											style="display: table-cell;">
											S/N<span class="fooicon fooicon-sort"></span></th>

										
										<th data-breakpoints="xs" class="footable-sortable"
											style="display: table-cell;">Store Owner Full Name<span
												class="fooicon fooicon-sort"></span></th>


										<th data-breakpoints="xs" class="footable-sortable"
											style="display: table-cell;">Store Owner Email<span
												class="fooicon fooicon-sort"></span></th>

										<th data-breakpoints="xs" class="footable-sortable"
											style="display: table-cell;">Store Owner Phone<span
												class="fooicon fooicon-sort"></span></th>

										<th data-breakpoints="xs" class="footable-sortable"
											style="display: table-cell;">Num Of Store<span
												class="fooicon fooicon-sort"></span></th>

										<!-- <th data-breakpoints="xs" class="footable-sortable"
											style="display: table-cell;">Date Joined</th> -->
										<th data-breakpoints="xs" class="footable-sortable"
											style="display: table-cell;"></th>
									</tr>
								</thead>

								<tbody>
									<?php

                                        $get_store_owner        =$this->Action->get_store_owner();
										
										// $get_store			    =$this->Action->get_store_by_admin();											
										// $get_store			=$this->Action->get_my_store_sales_rep_filter_by_store_id($user_id,$dis_store_id);
										// $get_store			=$this->Action->get_my_store_sales_rep_filter_by_branch_id($store_owner_id,$dis_branch_id);
									
						
                                        $i=1;
                                        if(is_array($get_store_owner)){
                                            foreach($get_store_owner as $row){
                                                $id		     		        =$row['id'];
                                                $dis_user_name		        =$row['user_name'];
                                                $dis_phone        	        =$row['phone'];
                                                $dis_full_name     	        =$row['full_name'];
                                                $dis_email      	        =$row['email'];	
                                                
                                                $count_dis_user_number_of_store             =$this->Action->count_my_store($id);

                                            
                                    ?>

									<tr>
										<td><?php echo $i++;?></td>
										
										<td><?php echo $dis_full_name;?><br><small><b style="color:red;"><?php echo $dis_user_name;?></b></small></td>
										<td><?php echo $dis_email;?></td>
										<td><?php echo $dis_phone;?></td>
										<td><?php echo $count_dis_user_number_of_store;?></td>
										<td>
											<a href="<?php echo base_url();?>Dashboard/more_about_store_owner/<?php echo $id;?>"
											 class="label label-success"><i class="fa fa-door-open"></i> View More</a>
											<a href="javascript:;" id="delete_branch_<?php echo $id;?>"
												data-id="<?php echo $id;?>" class="label label-danger"><i class="fa fa-trash"></i> Delete</a>
										</td>
									</tr>

									<script type="text/javascript"
										src="<?php echo base_url();?>files/bower_components/jquery/dist/jquery.min.js">
									</script>

									<script>
										$(document).ready(function () {
											$('#delete_branch_<?php echo $id;?>').click(function (e) {
												e.preventDefault();
												var id = $(this).data('id');
												swal({
														title: "Are you sure you want to DELETE this STORE OWNER?",
                                                        text:"Once deleted, data can'\t be recovered",
														icon: "warning",
														buttons: true,
														dangerMode: true,
													})
													.then((willDelete) => {
														if (willDelete) {

															$.ajax({
																type: 'POST',
																url: '<?php echo base_url();?>Dashboard/delete_store_owner/' +
																	id,

																success: function (resp) {
																	if (resp == 'ok') {

																		swal({
																			title: "Success",
																			text: "Store Owner has been been removed from List!",
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
                                        }else{?>
                                                    <div class="alert alert-warning" style="margin-top:4%;">No Information to Display yet!</div>
                                                    <?php
                                        }
                                    ?>
								</tbody>
                            </table>
						</div>
					</div>

				</div>

                <!--Store Supplier-->
                <div class="col-md-12" id="slideshow" style="display:none;">
					<div class="card" id="slide_show">
						<div class="card-header">
							<h5>Viewing Supplier</h5>

						</div>

						<?php
								$get_store			    =$this->Action->get_store_by_admin();
								$get_store_branch		=$this->Action->get_store_branches_by_admin();
						?>

						

						<div class="card-block">
							
							<table id="demo-foo-filtering"
								class="table table-striped footable footable-1 footable-paging footable-paging-center breakpoint-lg"
								style="">
								<thead>
									<tr class="footable-header">





										<th class="footable-sortable footable-first-visible"
											style="display: table-cell;">
											S/N<span class="fooicon fooicon-sort"></span></th>

										
										<th data-breakpoints="xs" class="footable-sortable"
											style="display: table-cell;">Store Owner Full Name<span
												class="fooicon fooicon-sort"></span></th>


										<th data-breakpoints="xs" class="footable-sortable"
											style="display: table-cell;">Store Owner Email<span
												class="fooicon fooicon-sort"></span></th>

										<th data-breakpoints="xs" class="footable-sortable"
											style="display: table-cell;">Store Owner Phone<span
												class="fooicon fooicon-sort"></span></th>

										<th data-breakpoints="xs" class="footable-sortable"
											style="display: table-cell;">Num Of Store<span
												class="fooicon fooicon-sort"></span></th>

										<!-- <th data-breakpoints="xs" class="footable-sortable"
											style="display: table-cell;">Date Joined</th> -->
										<th data-breakpoints="xs" class="footable-sortable"
											style="display: table-cell;"></th>
									</tr>
								</thead>

								<tbody>
									<?php

                                        $get_store_owner        =$this->Action->get_store_owner();
										
										// $get_store			    =$this->Action->get_store_by_admin();											
										// $get_store			=$this->Action->get_my_store_sales_rep_filter_by_store_id($user_id,$dis_store_id);
										// $get_store			=$this->Action->get_my_store_sales_rep_filter_by_branch_id($store_owner_id,$dis_branch_id);
									
						
                                        $i=1;
                                        if(is_array($get_store_owner)){
                                            foreach($get_store_owner as $row){
                                                $id		     		        =$row['id'];
                                                $dis_user_name		        =$row['user_name'];
                                                $dis_phone        	        =$row['phone'];
                                                $dis_full_name     	        =$row['full_name'];
                                                $dis_email      	        =$row['email'];	
                                                
                                                $count_dis_user_number_of_store             =$this->Action->count_my_store($id);

                                            
                                    ?>

									<tr>
										<td><?php echo $i++;?></td>
										
										<td><?php echo $dis_full_name;?><br><small><b style="color:red;"><?php echo $dis_user_name;?></b></small></td>
										<td><?php echo $dis_email;?></td>
										<td><?php echo $dis_phone;?></td>
										<td><?php echo $count_dis_user_number_of_store;?></td>
										<td>
											<a href="<?php echo base_url();?>Dashboard/more_about_store_owner/<?php echo $id;?>"
											 class="label label-success"><i class="fa fa-door-open"></i> View More</a>
											<a href="javascript:;" id="delete_branch_<?php echo $id;?>"
												data-id="<?php echo $id;?>" class="label label-danger"><i class="fa fa-trash"></i> Delete</a>
										</td>
									</tr>

									<script type="text/javascript"
										src="<?php echo base_url();?>files/bower_components/jquery/dist/jquery.min.js">
									</script>

									<script>
										$(document).ready(function () {
											$('#delete_branch_<?php echo $id;?>').click(function (e) {
												e.preventDefault();
												var id = $(this).data('id');
												swal({
														title: "Are you sure you want to DELETE this STORE OWNER?",
                                                        text:"Once deleted, data can'\t be recovered",
														icon: "warning",
														buttons: true,
														dangerMode: true,
													})
													.then((willDelete) => {
														if (willDelete) {

															$.ajax({
																type: 'POST',
																url: '<?php echo base_url();?>Dashboard/delete_store_owner/' +
																	id,

																success: function (resp) {
																	if (resp == 'ok') {

																		swal({
																			title: "Success",
																			text: "Store Owner has been been removed from List!",
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
                                        }else{?>
                                                    <div class="alert alert-warning" style="margin-top:4%;">No Information to Display yet!</div>
                                                    <?php
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

	<div>

	</div>
</div>







