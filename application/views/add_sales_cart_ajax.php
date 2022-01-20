<?php
 if(is_array($get_product)){
?>
<div id="dataItem">
<table class="table table-striped footable footable-1 footable-paging footable-paging-center breakpoint-lg" style="">
	<thead>
		<tr class="footable-header">
		
			<th class="footable-sortable footable-first-visible" style="display: table-cell;">
				<span class="fooicon fooicon-sort"></span></th>

			<th class="footable-sortable footable-first-visible" style="display: table-cell;">Product Name
				<span class="fooicon fooicon-sort"></span></th>

			<th data-breakpoints="xs" class="footable-sortable" style="display: table-cell;">Cost Price<span
					class="fooicon fooicon-sort"></span></th>

			<th data-breakpoints="xs" class="footable-sortable" style="display: table-cell;">Selling Price<span
					class="fooicon fooicon-sort"></span></th>

			<th data-breakpoints="xs" class="footable-sortable" style="display: table-cell;">Qty<span
					class="fooicon fooicon-sort"></span></th>
			<th data-breakpoints="xs" class="footable-sortable" style="display: table-cell;">Color<span
					class="fooicon fooicon-sort"></span></th>
			<th data-breakpoints="xs" class="footable-sortable" style="display: table-cell;">Size<span
					class="fooicon fooicon-sort"></span></th>

			<th data-breakpoints="xs" class="footable-sortable" style="display: table-cell;"></th>
		</tr>
	</thead>

	<tbody>
		<?php	
                                            $i=1;
                                            
                                            if(is_array($get_product)){
                                                foreach($get_product as $row){
                                                    $prod_id 		        =$row['prod_id'];

                                                    $store_id		        =$row['store_id'];
                                                    $store_name 	        =$row['store_name'];
                                                    $branch_id              =$row['branch_id'];
                                                    $branch_name            =$row['branch_name'];
                                                    $store_owner_id	        =$row['store_owner_id'];
                                                    $prod_name              =$row['prod_name'];
                                                    $prod_size              =$row['prod_size'];
                                                    $prod_bunk              =$row['prod_bunk'];
                                                    $prod_cat               =$row['prod_cat'];
                                                    $prod_sub_cat           =$row['prod_sub_cat'];
                                                    $prod_color             =$row['prod_color'];
                                                    $prod_supplier          =$row['prod_supplier'];
                                                    $prod_brand             =$row['prod_brand'];
                                                    $prod_desc              =$row['prod_desc'];
                                                    $prod_cost              =$row['prod_cost'];
                                                    $prod_price             =$row['prod_price'];
                                                    $prod_whole             =$row['prod_whole'];
                                                    $prod_weight            =$row['prod_weight'];
                                                    $prod_discount          =$row['prod_discount'];
                                                    $prod_image             =$row['prod_image'];
                                                    $meta_title             =$row['meta_title'];
                                                    $meta_key               =$row['meta_key'];
                                                    $meta_desc              =$row['meta_desc'];
                                                    $date                   =$row['date_created'];
                                                    $time                   =$row['time'];
                                                    
                                                    $currency               =$row['currency'];

                                                    $store_logo             =$this->Action->get_store_logo_by_store_id($store_id);
                                                    $store_name_2           =$this->Action->get_store_name_2_by_store_id($store_id);
                                                    $cat_name               =$this->Action->get_category_name_by_cat_id($prod_cat);
                                                    $sub_cat_name           =$this->Action->get_sub_category_name_by_sub_cat_id($prod_sub_cat);
                                        ?>

		<tr>
			
			<td>
				<img style="height:50px;width:50px"
					src="<?php echo base_url();?>store_img/<?php echo $store_name_2;?>/product/<?php echo $prod_image;?>"
					alt="">
			</td>
			<td><?php echo $prod_name;?></td>
			<td><?php echo $currency.$this->cart->format_number($prod_cost);?></td>
			<td><?php echo $currency.$this->cart->format_number($prod_price);?></td>
			<td><input class="form-control" type="number" name="qty" value="1" id="prod_qty_<?php echo $prod_id;?>" /></td>
            <td>
                <select class="form-control color" name="color" id="prod_color_<?php echo $prod_id;?>">
                    <!-- <option value=""></option> -->
                <?php
                    $color  =explode(",",$prod_color);;
                    $i=0;
                    for($i; $i<count($color); $i++){
                ?>
                        <option value="<?php echo $color[$i];?>"><?php echo $color[$i];?></option>
                    <?php
                    }
                    ?>
                </select>
            </td>
            <td>
                <select class="form-control size" name="size" id="prod_size_<?php echo $prod_id;?>">
                    <!-- <option value=""></option> -->
                <?php
                    $size  =explode(",",$prod_size);;
                    $i=0;
                    for($i; $i<count($size); $i++){
                ?>
                        <option value="<?php echo $size[$i];?>"><?php echo $size[$i];?></option>
                <?php
                    }
                ?>
                </select>
            </td>
			<td>
				<!-- <a href="javascript:;" id="delete_cart_<?php echo $prod_id;?>" data-id="<?php echo $prod_id;?>"
					class="btn btn-danger btn-sm">Remove from Cart</a> -->

				<a href="javascript:;" id="add_to_cart_<?php echo $prod_id;?>" data-id="<?php echo $prod_id;?>"
					class="label label-success" 
                    data-id="<?php echo $prod_id;?>"
                    data-selling_price="<?php echo $prod_price;?>"
                    data-product_name="<?php echo $prod_name;?>"
                    ><i class="fa fa-plus"></i> Add To Cart</a>
			</td>
		</tr>

		<script type="text/javascript" src="<?php echo base_url();?>files/bower_components/jquery/dist/jquery.min.js">
		</script>

        <script>
            $(document).ready(function(){
                $('#add_to_cart_<?php echo $prod_id;?>').click(function(){
                    var prod_id     =$(this).data('id');
                    var prod_name   =$(this).data('product_name');
                    var prod_price  =$(this).data('selling_price');

                    var prod_color    =$('#prod_color_<?php echo $prod_id;?>').val();
                    var prod_size     =$('#prod_size_<?php echo $prod_id;?>').val();
                    var prod_qty      =$('#prod_qty_<?php echo $prod_id;?>').val();

                    

                    $.ajax({
                        url:"<?php echo base_url();?>Sales_rep/add",
                        method:"POST",
                        data:{prod_id:prod_id, prod_price:prod_price, prod_name:prod_name, prod_qty:prod_qty, prod_color:prod_color, prod_size:prod_size},
                        success:function(data){
                            $('#dataItem').load('<?php echo base_url();?>Sales_rep/add_sales_cart_ajax');

                            swal({
								title: "Success",
								text: "Product has been been added to cart!",
								icon: "success",

							});
                        }
                            
                    });
                });
            });
        </script>

		<script>
			$(document).ready(function () {
				$('#delete_cart_<?php echo $prod_id;?>').click(function (e) {
					e.preventDefault();
					var id = $(this).data('id');
					swal({
							title: "Remove from cart?",
							icon: "warning",
							buttons: true,
							dangerMode: true,
						})
						.then((willDelete) => {
							if (willDelete) {

								$.ajax({
									type: 'POST',
									url: '<?php echo base_url();?>Office/delete_product/' +
										id,

									success: function (resp) {
										if (resp == 'ok') {

											swal({
												title: "Success",
												text: "Product has been been removed from List!",
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
<?php 
}
?>
<?php 
    // if(!is_array($get_product)){
?>
    <!-- <div class="alert alert-warning" style="margin-top:1%;">Search Item not available at the moment!</div> -->
<?php
    // }
?>



<div class="col-md-12d" style="margin-top:5%;">
	<h4>Cart Items</h4>
</div>

                <div class="col-md-1fr2">
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
                                                                        $('#dataItem').load('<?php echo base_url();?>Sales_rep/add_sales_cart_ajax');

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
				</div>

</div>

<script>
	$(document).on('click', '.remove_cart', function () {
		var row_id = $(this).attr('id');


		swal({
				title: "Remove from Cart?",
				icon: "warning",
				buttons: true,
				dangerMode: true,
			})
			.then((willDelete) => {
				if (willDelete) {
					$.ajax({
						type: 'POST',
						url: '<?php echo base_url();?>Sales_rep/remove_cart/',
						data: {
							row_id: row_id
						},

						success: function (resp) {
							if (resp == 'ok') {
                                $('#dataItem').load('<?php echo base_url();?>Sales_rep/add_sales_cart_ajax');

                                    
								swal({
									title: "Success",
									text: "Product Removed from Cart",
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


<script>
    $(document).ready(function(){
        $('#checkout_cart').click(function(){
            var trans_type          =$('#trans_type').val();
            var trans_method        =$('#trans_method').val();
            var trans_customer      =$('#trans_customer').val();
            var trans_note          =$('#trans_note').val();


            $.ajax({
                type: 'POST',
                url: '<?php echo base_url();?>Sales_rep/check_out/',
                data: {
                    trans_type      :   trans_type,
                    trans_method    :   trans_method,
                    trans_customer  :   trans_customer,
                    trans_note      :   trans_note

                },

                success: function (resp) {
                    // alert(resp);
                    if (resp == 'ok') {
                        $('#dataItem').load('<?php echo base_url();?>Sales_rep/add_sales_cart_ajax');

                        swal({
                            title: "Success",
                            text: "Transaction added to Transaction History",
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
        });
    });
</script>

<script>
    $(document).ready(function(){
        $('#clear_cart').click(function(){
            swal({
                title: "Are you sure you want to Clear Cart?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url();?>Sales_rep/clear_cart/',
                    

                    success: function (resp) {
                        $('#dataItem').load('<?php echo base_url();?>Sales_rep/add_sales_cart_ajax');

                        swal({
                            title: "Success",
                            text: "Cart Cleared!",
                            icon: "success",
                            closeOnClickOutside: false,

                        });

                        
                    }
                });
            });
        });
    });
</script>