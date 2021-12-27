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
								<small style="color:red;"><b>search with product name, meta title, meta keywords, meta desc.</b></small>
							</form>
						</div>
					</div>
				</div>

				<div class="col-md-12" id="dataList">
					
                        
				</div>
				<div class="col-md-12" id="">
					<!-- <h4>Cart</h4>
                    <div id="cart_item_detail">

                    </div> -->

                    <a href="<?php echo base_url();?>Sales_rep/load_sales_cart" class="btn btn-sm btn-danger">Go to Checkout page</a>
				</div>
				
			</div>
		</div>
	</div>

</div>



<div class="modal fade" id="large-Modal" tabindex="-1" role="dialog" style="z-index: 1050; display: none;"
	aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Add Customer To List</h4>


				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<form id="create_customer" enctype="multipart/form-data">
				<div class="modal-body">



					<div class="form-group row">
						<label class="col-sm-2 col-form-label">Select Store</label>
						<div class="col-sm-10">
							<select type="text" id="store_id" name="store_id" class="form-control">
								<option>Select Store</option>
								<?php
                                    $get_store          =$this->Action->get_store($user_id);
                                    if(is_array($get_store)){
                                        foreach($get_store as $row){
                                            $store_id           =$row['id'];
                                            $store_name         =$row['store_name'];
                                            $store_name_2       =$row['store_name_2'];
                                    ?>


								?>
								<option value="<?php echo $store_id;?>"><?php echo $store_name;?></option>
								<?php 
                                        }
                                    }
                                ?>
							</select>
						</div>
					</div>


					<div class="form-group row">
						<label class="col-sm-2 col-form-label">Select Branch Store</label>
						<div class="col-sm-10">
							<select type="text" id="branch_name" name="branch_name" class="form-control">
								<option>Select Branch Store</option>

							</select>
						</div>
					</div>


					<div class="form-group row">
						<label class="col-sm-2 col-form-label">Customer Name</label>
						<div class="col-sm-10">
							<input type="text" id="name" name="name" class="form-control" required>
						</div>
					</div>

					<div class="form-group row">
						<label class="col-sm-2 col-form-label">Customer Email</label>
						<div class="col-sm-10">
							<input type="email" id="email" name="email" class="form-control" required>
						</div>
					</div>

					<div class="form-group row">
						<label class="col-sm-2 col-form-label">Customer Phone</label>
						<div class="col-sm-10">
							<input type="number" id="phone" name="phone" class="form-control" required>
						</div>
					</div>


				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default waves-effect " data-dismiss="modal">Close</button>
					<input type="submit" class="btn btn-primary waves-effect waves-light"
						value="Add Customer">
				</div>
			</form>
		</div>
	</div>
</div>





<script type="text/javascript" src="<?php echo base_url();?>files/bower_components/jquery/dist/jquery.min.js"></script>

<script type="text/javascript">
	$(document).ready(function () {

		$('#create_customer').submit(function (e) {
			e.preventDefault();

			
			$.ajax({
				url: '<?php echo base_url();?>Office/create_customer',
				type: "post",
				data: new FormData(this),
				processData: false,
				contentType: false,
				cache: false,
				async: false,
				success: function (data) {
					$('#large-Modal').modal('hide');
					if (data == 'ok') {


						swal({
							title: "Success",
							text: "Sales Rep. Added to List",
							icon: "success",
							closeOnClickOutside: false,
						});

					} else if (data == 'err') {

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
        		$('#cart_item_detail').load('<?php echo base_url();?>Sales_rep/load_sales_cart');
			}, 
		5000); // refresh every 9000 milliseconds
    });
</script>


