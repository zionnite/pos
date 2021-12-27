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
				<td class="update"><a class="btn btn-update btn-default update_cart_<?php echo $prod_id;?>"
						id="<?php echo $rowid;?>">Update</a>
				</td>

				<td class="remove"><a class="btn btn-remove btn-default remove_cart"
						id="<?php echo $rowid;?>">Remove</a></td>

				<td class="amount"><?php echo $currency.$this->cart->format_number($subtotal);?> </td>
			</tr>
			<script type="text/javascript" src="<?php echo base_url();?>files/bower_components/jquery/dist/jquery.min.js"></script>
			<script>
				$(document).on('click', '.update_cart_<?php echo $prod_id;?>', function () {
					var row_id = $(this).attr('id');
					var qty = $('#qty_<?php echo $prod_id;?>').val();
					if (confirm("Are you sure you want to Update this Product?")) {
						$.ajax({
							url: '<?php echo base_url();?>Sales_rep/update_cart',
							method: 'POST',
							data: {
								row_id: row_id,
								qty: qty
							},
							success: function (data) {
								alert("Cart Updated");
							}
						});
					} else {
						return false;
					}
				});

			</script>
			<?php
                            }
                    }else{echo 'nothing here';}
                        ?>
			<!--<tr>
                        <td colspan="4">Discount Coupon</td>
                        <td colspan="2">
                            <div class="form-group">
                                <input type="text" class="form-control"> </div>
                        </td>
                    </tr>-->
			<tr>
				<td class="total-quantity" colspan="7">Total <?php echo $this->cart->total_items();?> Items</td>
				<td class="total-amount"><?php echo $currency.$this->cart->format_number($this->cart->total());?></td>
			</tr>
		</tbody>
	</table>
	<div class="text-right"><a href="<?php echo base_url();?>Product_ctrl/check_out"
			class="btn btn-group btn-default btn-sm">Checkout</a> </div>


<script>
$(document).on('click','.remove_cart',function(){
    var row_id      =$(this).attr('id');
    if(confirm("Are you sure you want to remove this?")){
        $.ajax({
            url:'<?php echo base_url();?>Sales_rep/remove_cart',
            method:'POST',
            data:{row_id:row_id},
            success:function(data){
                alert("Product Removed from Cart");
            }
        });
    }else{
        return false;
    }
});
</script>