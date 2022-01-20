<style>
.pagination {
  display: inline-block;
}

.pagination a {
  color: black;
  float: left;
  padding: 8px 16px;
  text-decoration: none;
  transition: background-color .3s;
  border: 1px solid #ddd;
  margin: 0 4px;
}

.pagination a.active {
  background-color: #4CAF50;
  color: white;
  border: 1px solid #4CAF50;
}

.pagination a:hover:not(.active) {background-color: #ddd;}
</style>
<div class="main-body">
	<div class="page-wrapper">

		<div class="page-body">
			<div class="row">
				


				<div class="col-md-12">
					<div class="card">
						<div class="card-block">
							<form>
								<input type="text" class="form-control" name="search_term" id="search_term"
									onkeyup="searchFilter();" />
								<small style="color:red;"><b>search with product name</b></small>
							</form>
						</div>
					</div>
				</div>

				<div class="col-md-12" id="dataList">
					
                        
				</div>
				
				

                <div class="col-md-12" id="carddrt_item_detadfil"></div>
				<!-- <div class="col-md-12">
					<div class="card">
						<div class="card-block">
							<div>
								<table class="table cart table-hover table-striped">
									<thead>
										<tr>
											<th>Product </th>
											<th>Price </th>
											<th>Quantity</th>
											<th>Color</th>
											<th>Size</th>
											<th>Update </th>
											<th>Remove </th>
											<th class="amount">Total </th>
										</tr>
									</thead>
									<tbody>
										<?php
												$currency   ="&#8358;";
												if(is_array($this->cart->contents())){
														foreach($this->cart->contents() as $items){
															$name       =$items['name'];
															$price      =$items['price'];
															$qty        =$items['qty'];
															$prod_id    =$items['id'];
															$rowid      =$items['rowid'];
															$option     =$items['option'];
															$subtotal   =$items['subtotal'];
															$currency   ="&#8358;";
															$cat_id     =$this->Action->get_cat_id_by_prod_id($prod_id);
													?>
										<tr class="remove-data">
											<td class="product"><a
													href="<?php echo base_url();?>Product_ctrl/view_p/<?php echo $prod_id;?>/<?php echo $cat_id;?>"><?php echo $name;?></a>
											</td>
											<td class="price"><?php echo $currency.$this->cart->format_number($price);?></td>
											<td class="quantity">
												<div class="form-group">
													<input type="number" id="qty_<?php echo $prod_id;?>" class="form-control"
														value="<?php echo $qty;?>">
													<input type="hidden" id="row_id" value="<?php echo $rowid;?>">
												</div>
											</td>
											<td class="price"><?php echo $option['color'];?></td>
											<td class="price"><?php echo $option['size'];?></td>
											<td class="update"><a href="javascript:;" class="label label-success update_cart_<?php echo $prod_id;?>"
													id="<?php echo $rowid;?>"><i class="fa fa-shopping-basket"></i> Update</a>
											</td>

											<td class="remove"><a href="javascript:;" class="label label-danger remove_cart" id="<?php echo $rowid;?>"><i class="fa fa-trash"></i> Remove</a>
											</td>

											<td class="amount"><?php echo $currency.$this->cart->format_number($subtotal);?> </td>
										</tr>
										<script type="text/javascript"
											src="<?php echo base_url();?>files/bower_components/jquery/dist/jquery.min.js"></script>
										<script>
											$(document).on('click', '.update_cart_<?php echo $prod_id;?>', function () {
												var row_id = $(this).attr('id');
												var qty = $('#qty_<?php echo $prod_id;?>').val();

												swal({
														title: "Are you sure you want to Update this Product?",
														icon: "warning",
														buttons: true,
														dangerMode: true,
													})
													.then((willDelete) => {
														if (willDelete) {
															$.ajax({
																type: 'POST',
																url: '<?php echo base_url();?>Sales_rep/update_cart/',
																data: {
																	row_id: row_id,
																	qty: qty
																},

																success: function (resp) {
																	if (resp == 'ok') {
																		$('#dataItem').load(
																			'<?php echo base_url();?>Sales_rep/load_sales_cart_ajax'
																			);

																		swal({
																			title: "Success",
																			text: "Cart Updated!",
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

										</script>
										<?php
														}
												}
													?>
							
										<tr>
											<td class="total-quantity" colspan="7">Total <?php echo $this->cart->total_items();?> Items</td>
											<td class="total-amount"><?php echo $currency.$this->cart->format_number($this->cart->total());?></td>
										</tr>
										<tr>
											<td colspan="8">

											</td>
										</tr>
									</tbody>
								</table>

								<div class="text-center">

									<form>
										<div class="col-md-12">
										<div class="row">
											<div class="col-md-3 col-sm-12">
												<div class="form-group row">
													<label class="col-sm-12 col-form-label">Transaction Type</label>
													<select name="trans_type" id="trans_type" class="form-control">
														<option value="deposit" selected>Deposit</option>
														<option value="installment">Installment</option>
													</select>
												</div>
											</div>

											<div class="col-md-3 col-sm-12">
												<div class="form-group row">
													<label class="col-sm-12 col-form-label">Payment Method</label>
													<select name="trans_method" id="trans_method" class="form-control">
														<option value="cash" selected>Cash</option>
														<option value="pos">Pos</option>
														<option value="transfer">Transfer</option>
													</select>
												</div>
											</div>

											<div class="col-md-3 col-sm-12">
												<div class="form-group row">
													<label class="col-sm-12 col-form-label">Select Customer </label>
													<select name="trans_customer" id="trans_customer" class="form-control">
														<?php
															$get_customer       =$this->Action->get_store_branch_customer($store_id,$branch_id);
															if(is_array($get_customer)){
																foreach($get_customer as $row){
																	$cus_id       = $row['id'];
																	$cus_name     = $row['name'];
															?>
																<option value="<?php echo $cus_id;?>"><?php echo $cus_name;?></option>
															<?php
																}
															}
														?>
													</select>
												</div>
											</div>
											<div class="col-md-3 col-sm-12">
												<div class="form-group row">
													<label class="col-sm-12 col-form-label">Optional Note</label>
													<input type="text" name="trans_note" id="trans_note" placeholder="Optional Note"
														class="form-control" />
												</div>
											</div>
										</div>
										</div>
										
									</form>

									<a href="javascript:;"
											class="btn btn-primary btn-sm" id="clear_cart">Clear Cart</a>
										<a href="javascript:;"
											class="btn btn-danger btn-sm" id="checkout_cart">Checkout</a>
								</div>
							</div>

						</div>
					</div>
				</div> -->


				
				
			</div>
		</div>
	</div>

</div>








<script type="text/javascript" src="<?php echo base_url();?>files/bower_components/jquery/dist/jquery.min.js"></script>





<script>
	$(document).ready(function () {
		
		$("#search_term").keyup(function () {
            // alert('helo');
			var search_term = $('#search_term').val();
			var dataString = 'search_term=' + search_term;
			// alert(dataString);
			$.ajax({
				type: "POST",
				url: "<?php echo base_url();?>Sales_rep/add_sales_cart_ajax",
				data: dataString,
				cache: false,
				success: function (html) {
					$("#dataList").html(html);

				}
			});
		});

        
	});

</script>



<script>
    $(document).ready(function(){
        // alert('yes'); 
		var auto_refresh = setInterval(
    		function (){
        		$('#cart_item_detail').load('<?php echo base_url();?>Sales_rep/load_sales_cart_ajax');
			}, 
		3000); // refresh every 9000 milliseconds
    });
</script>




