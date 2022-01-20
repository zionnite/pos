<table class="table table-striped footable footable-1 footable-paging footable-paging-center breakpoint-lg" style="">
	<thead>
		<tr class="footable-header">
			<th class="footable-sortable footable-first-visible" style="display: table-cell;">
				S/N<span class="fooicon fooicon-sort"></span></th>
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
			<td><?php echo $i++;?></td>
			<td>
				<img style="height:100px;width:100px"
					src="<?php echo base_url();?>store_img/<?php echo $store_name_2;?>/product/<?php echo $prod_image;?>"
					alt="">
			</td>
			<td><?php echo $prod_name;?></td>
			<td><?php echo $currency.$this->cart->format_number($prod_cost);?></td>
			<td><?php echo $currency.$this->cart->format_number($prod_price);?></td>
			<td><input class="form-control" type="number" name="qty" value="1" id="prod_qty" /></td>
            <td>
                <select class="form-control color" name="color" id="prod_color">
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
                <select class="form-control size" name="size" id="prod_size">
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
					class="btn btn-success btn-sm" 
                    data-id="<?php echo $prod_id;?>"
                    data-selling_price="<?php echo $prod_price;?>"
                    data-product_name="<?php echo $prod_name;?>"
                    >Add To Cart</a>
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

                    var prod_color    =$('#prod_color').val();
                    var prod_size     =$('#prod_size').val();
                    var prod_qty      =$('#prod_qty').val();

                    $.ajax({
                        url:"<?php echo base_url();?>Sales_rep/add",
                        method:"POST",
                        data:{prod_id:prod_id, prod_price:prod_price, prod_name:prod_name, prod_qty:prod_qty, prod_color:prod_color, prod_size:prod_size},
                        success:function(data){
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

							} else {
								swal("Delete Cancelled");
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
    if(!is_array($get_product)){
?>
    <div class="alert alert-warning" style="margin-top:1%;">Search Item not available at the moment!</div>
<?php
    }
?>
