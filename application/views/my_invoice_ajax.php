<div class="table-responsive">
	<table class="table table-striped footable footable-1 footable-paging footable-paging-center breakpoint-lg" style="" id="dataItem">
		<thead>
			<tr class="footable-header">
				<th class="footable-sortable footable-first-visible" style="display: table-cell;">
					S/N<span class="fooicon fooicon-sort"></span></th>

				<th class="footable-sortable footable-first-visible" style="display: table-cell;">Invoice Number
					<span class="fooicon fooicon-sort"></span></th>

				<th class="footable-sortable footable-first-visible" style="display: table-cell;">Customer Name
					<span class="fooicon fooicon-sort"></span></th>

				<th class="footable-sortable footable-first-visible" style="display: table-cell;">Quantity
					<span class="fooicon fooicon-sort"></span></th>

				<th class="footable-sortable footable-first-visible" style="display: table-cell;">Grand total
					<span class="fooicon fooicon-sort"></span></th>

				<th class="footable-sortable footable-first-visible" style="display: table-cell;">Transaction Type
					<span class="fooicon fooicon-sort"></span></th>

				<th class="footable-sortable footable-first-visible" style="display: table-cell;">Payment Method
					<span class="fooicon fooicon-sort"></span></th>


				<th data-breakpoints="xs" class="footable-sortable" style="display: table-cell;">Date Created</th>
				<th data-breakpoints="xs" class="footable-sortable" style="display: table-cell;"></th>
				<th data-breakpoints="xs" class="footable-sortable" style="display: table-cell;"></th>
			</tr>
		</thead>

		<tbody>
			<?php	
												$i=1;
												
												if(is_array($get_info)){
													foreach($get_info as $row){
														$id				        =$row['id'];
														$invoice_no				=$row['invoice_number'];

														$date			=$row['date_created'];
														$time			=$row['time'];

														$currency               ='&#8358;';

														$store_logo             =$this->Action->get_store_logo_by_store_id($store_id);
														$store_name_2           =$this->Action->get_store_name_2_by_store_id($store_id);

														$customer_name			=$this->Action->get_customer_name_with_invoice_no($invoice_no);
														$qty					=$this->Action->get_qty_with_invoice_no($invoice_no);
														$sub_total				=$this->Action->get_sub_total_with_invoice_no($invoice_no);
														$grand_total			=$this->Action->get_grand_total_with_invoice_no($invoice_no);
														$transaction_type		=$this->Action->get_transaction_type_with_invoice_no($invoice_no);
														$transaction_method		=$this->Action->get_transaction_method_with_invoice_no($invoice_no);
														$status					=$this->Action->get_status_with_invoice_no($invoice_no);

											?>

			<tr>
				<td><?php echo $i++;?></td>
				
				<td><?php echo $invoice_no;?></td>
				<td><?php echo $customer_name;?></td>
				<td><?php echo $qty;?></td>
				<td><?php echo $currency.$this->cart->format_number($grand_total);?></td>
				<td><?php echo $transaction_type;?></td>
				<td><?php echo $transaction_method;?></td>
			
				<td><?php echo $date;?></td>
				<td>
					<a href="<?php echo base_url();?>Invoice/view_invoice/<?php echo $invoice_no;?>" class="btn btn-inverse btn-sm"><i class="fab fa-buffer"></i>Invoice</a>
				</td>
				<td>
					<a href="javascript:;" id="delete_branch_<?php echo $id;?>" data-id="<?php echo $id;?>"
						class="btn btn-danger btn-sm"> <i class="fas fa-trash"></i>Delete</a>
				</td>
			</tr>

			<script type="text/javascript" src="<?php echo base_url();?>files/bower_components/jquery/dist/jquery.min.js">
			</script>

			<script>
				$(document).ready(function () {
					$('#delete_branch_<?php echo $id;?>').click(function (e) {
						e.preventDefault();
						var id = $(this).data('id');
						swal({
								title: "Are you sure you want to DELETE this Invoice?",
								icon: "warning",
								buttons: true,
								dangerMode: true,
							})
							.then((willDelete) => {
								if (willDelete) {

									$.ajax({
										type: 'POST',
										url: '<?php echo base_url();?>Invoice/delete_invoice/' +
											id,

										success: function (resp) {
											if (resp == 'ok') {

												$('#dataItem').load('<?php echo base_url();?>Invoice/index_2');
												swal({
													title: "Success",
													text: "Invoice has been been removed from List!",
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
											}
											?>
		</tbody>
		<tfoot>
			
		</tfoot>
	</table>
</div>
<?php 
    if(!is_array($get_info)){
?>
    <div class="alert alert-warning" style="margin-top:1%;">No Invoice found!</div>
<?php
    }
?>

<ul class="pagination">
		<?php echo $pagelinks ?>
	</ul>