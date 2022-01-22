
<div class="table-responsive">
<table class="table table-striped footable footable-1 footable-paging footable-paging-center breakpoint-lg" style="">
	<thead>
		<tr class="footable-header">
			<th class="footable-sortable footable-first-visible" style="display: table-cell;">
				S/N<span class="fooicon fooicon-sort"></span></th>

			<th class="footable-sortable footable-first-visible" style="display: table-cell;">Product Image
				<span class="fooicon fooicon-sort"></span></th>

			<th class="footable-sortable footable-first-visible" style="display: table-cell;">Product Name
				<span class="fooicon fooicon-sort"></span></th>



			<th data-breakpoints="xs" class="footable-sortable" style="display: table-cell;">Cost Price<span
					class="fooicon fooicon-sort"></span></th>

			<th data-breakpoints="xs" class="footable-sortable" style="display: table-cell;">Selling Price<span
					class="fooicon fooicon-sort"></span></th>

			<th data-breakpoints="xs" class="footable-sortable" style="display: table-cell;">Category<span
					class="fooicon fooicon-sort"></span></th>

			<th data-breakpoints="xs" class="footable-sortable" style="display: table-cell;">Inventory<span
					class="fooicon fooicon-sort"></span></th>

			<th data-breakpoints="xs" class="footable-sortable" style="display: table-cell;">Date Created</th>
			<th data-breakpoints="xs" class="footable-sortable" style="display: table-cell;"></th>
		</tr>
	</thead>

	<tbody>
		<?php	
                                            $i=1;
                                            
                                            if(is_array($get_info)){
                                                foreach($get_info as $row){
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
				<img style="height:50px;width:50pxp"
					src="<?php echo base_url();?>store_img/<?php echo $store_name_2;?>/product/<?php echo $prod_image;?>"
					alt="">
				<br /><?php //echo $prod_name;?>
			</td>
			<td><?php echo $prod_name;?></td>
			<td><?php echo $currency.$this->cart->format_number($prod_cost);?></td>
			<td><?php echo $currency.$this->cart->format_number($prod_price);?></td>
			<td><?php echo $cat_name;?><br /> <small style="color:red;"><?php echo $sub_cat_name;?></small></td>
			<td><?php echo $prod_bunk;?></td>
			<td><?php echo $date;?></td>
			<td>
				<a href="javascript:;" id="open_stock_field_<?php echo $prod_id;?>" 
					class="label label-success"><i class="fa fa-cart-plus"></i> Refill</a>

				<a href="javascript:;" id="delete_branch_<?php echo $prod_id;?>" data-id="<?php echo $prod_id;?>"
					class="label label-danger"><i class="fa fa-trash"></i> Delete</a>
					

				<div id="add_stock_div_<?php echo $prod_id;?>" style="display:none;">
					<br style="margin-top:1.5%;" />
					<form>
						<input type="number" name="qty" id="qty_<?php echo $prod_id;?>" /><br/>
						<input type="hidden" name="prod_id" value="<?php echo $prod_id;?>" id="prod_id_<?php echo $prod_id;?>">
						<input type="submit" name="submit" id="add_stock_<?php echo $prod_id;?>" value="Add" class="label label-inverse" />
					</form>
				</div>
				

			</td>
		</tr>

	




		


		<script>
			$(document).ready(function () {
				$('#delete_branch_<?php echo $prod_id;?>').click(function (e) {
					e.preventDefault();
					e.stopPropagation();

					var id = $(this).data('id');
					swal({
							title: "Are you sure you want to DELETE this Product?",
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

		<script>
			$(document).ready(function (){
				$('#open_stock_field_<?php echo $prod_id;?>').click(function(e){
					e.preventDefault();
					e.stopPropagation();

					$('#add_stock_div_<?php echo $prod_id;?>').toggle();
				});
			});
		</script>

		<script type="text/javascript">
			$(document).ready(function () {
				$("#add_stock_<?php echo $prod_id;?>").click(function (e) {
					e.preventDefault();
					e.stopPropagation();

					var prod_id 		= $('#prod_id_<?php echo $prod_id;?>').val();
					var qty      		= $('#qty_<?php echo $prod_id;?>').val();

					var dataString 		={'prod_id': prod_id,'qty':qty};

					$.ajax({
						
						type: 'POST',
						url: '<?php echo base_url();?>Office/re_stock_product',
						data: dataString,
					
						success: function (resp) {
							if (resp == 'ok') {
								swal({
									title: "Success",
									text: "Product Stock updated!",
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


		<?php
                                            }
                                        }
                                        ?>
	</tbody>

	
</table>
</div>

<?php 
    if(!is_array($get_info)){
?>
    <div class="alert alert-warning" style="margin-top:1%;">No data found yet!</div>
<?php
    }
?>

<ul class="pagination">
	<?php echo $pagelinks ?>
</ul>