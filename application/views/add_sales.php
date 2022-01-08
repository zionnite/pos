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

                    <a href="<?php echo base_url();?>Sales_rep/load_sales_cart" class="btn btn-sm btn-danger">Go to Cart page</a>
				</div>
				
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
        		$('#cart_item_detail').load('<?php echo base_url();?>Sales_rep/load_sales_cart');
			}, 
		5000); // refresh every 9000 milliseconds
    });
</script>


