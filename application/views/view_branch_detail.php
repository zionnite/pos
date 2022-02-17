<?php
	$currency               			='&#8358;';
	$total_transaction                  =$this->Action->count_total_transaction_by_admin_branch($dis_id);
    $total_item_sold                    =$this->Action->count_total_item_sold_by_admin_branch($dis_id);
    $total_invoice                      =$this->Action->count_store_supervisor_by_admin_branch($dis_id);
    $stock_alert                        =$this->Action->count_branch_product_out_of_stock_branch($dis_id);

?>
<div class="main-body">
	<div class="page-wrapper">

		<div class="page-body">
			<div class="row">
				<!-- task, page, download counter  start -->
				
                <div class="col-sm-3">
					<div class="card bg-c-yellow text-white widget-visitor-card">
						<div class="card-block-small text-center">
							<h2><?php echo $total_item_sold;?></h2>
							<h6>Total Sold</h6>
						</div>
					</div>
				</div>

                <div class="col-sm-3">
					<div class="card bg-c-blue text-white widget-visitor-card">
						<div class="card-block-small text-center">
							<h2><?php echo $total_invoice;?></h2>
							<h6>Total Invoice issued</h6>
						</div>
					</div>
				</div>

                <div class="col-sm-3">
					<div class="card bg-c-pink text-white widget-visitor-card">
						<div class="card-block-small text-center">
							<h2><?php echo $stock_alert;?></h2>
							<h6>Stock Alert</h6>
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

                                        $get_store_owner        =$this->Action->get_my_branch_sales_rep_by_branch_id($dis_id);
										
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







