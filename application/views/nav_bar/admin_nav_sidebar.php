<?php
	$count_product_out_stock 			=$this->Action->count_total_product_out_of_stock();
?>
<nav class="pcoded-navbar">
	<div class="pcoded-inner-navbar main-menu">
		<div class="pcoded-navigatio-lavel">Navigation</div>
		<ul class="pcoded-item pcoded-left-item">

			<li class="active pcoded-trigger">
				<a href="javascript:void(0)">
					<span class="pcoded-micon"><i class="feather icon-home"></i></span>
					<span class="pcoded-mtext">Dashboard</span>
				</a>
				
			</li>

			<li class="">
				<a href="<?php echo base_url();?>Sales_rep/index">
					<span class="pcoded-micon"><i class="fa fa-cart-plus"></i></span>
					<span class="pcoded-mtext">Create Plan</span></span>
					<!-- <span class="pcoded-badge label label-warning">NEW</span> -->
				</a>
			</li>

			<li class="">
				<a href="<?php echo base_url();?>Dashboard/payment_method">
					<span class="pcoded-micon"><i class="feather icon-menu"></i></span>
					<span class="pcoded-mtext">Set Payment API</span>
				</a>
			</li>

			
					
					

				</ul>
			</li>
		
		</ul>

		

	</div>
</nav>
