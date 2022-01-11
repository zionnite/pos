<?php
	$count_product_out_stock 			=$this->Action->count_total_product_out_of_stock();
?>
<nav class="pcoded-navbar">
	<div class="pcoded-inner-navbar main-menu">
		<div class="pcoded-navigatio-lavel">Navigation</div>
		<ul class="pcoded-item pcoded-left-item">

			<li class="active pcoded-trigger">
				<a href="<?php echo base_url();?>Dashboard">
					<span class="pcoded-micon"><i class="feather icon-home"></i></span>
					<span class="pcoded-mtext">Dashboard</span>
				</a>
				
			</li>

			<li class="">
				<a href="<?php echo base_url();?>Dashboard/view_plan">
					<span class="pcoded-micon"><i class="fa fa-cart-plus"></i></span>
					<span class="pcoded-mtext">Plan</span></span>
					<!-- <span class="pcoded-badge label label-warning">NEW</span> -->
				</a>
			</li>

			<li class="">
				<a href="<?php echo base_url();?>Dashboard/manage_store">
					<span class="pcoded-micon"><i class="fa fa-store"></i></span>
					<span class="pcoded-mtext">Manage Store</span>
				</a>
			</li>
			<li class="">
				<a href="<?php echo base_url();?>Dashboard/settings">
					<span class="pcoded-micon"><i class="fa fa-cogs"></i></span>
					<!-- <span class="pcoded-micon"><i class="fa fa-money-check"></i></span> -->
					<span class="pcoded-mtext">Setttings</span>
				</a>
			</li>

			
					
					

				</ul>
			</li>
		
		</ul>

		

	</div>
</nav>
