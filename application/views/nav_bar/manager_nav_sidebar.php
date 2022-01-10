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
					<span class="pcoded-mtext">New Transaction</span>
					<!-- <span class="pcoded-badge label label-warning">NEW</span> -->
				</a>
			</li>

			<li class="">
				<a href="<?php echo base_url();?>Transaction_history/index">
					<span class="pcoded-micon"><i class="feather icon-menu"></i></span>
					<span class="pcoded-mtext">Transaction History</span>
				</a>
			</li>

			<li class="">
				<a href="<?php echo base_url();?>Invoice/index">
					<span class="pcoded-micon"><i class="fa fa-receipt"></i></span>
					<span class="pcoded-mtext">Invoices</span>
				</a>
			</li>

			<li class="">
				<a href="<?php echo base_url();?>Office/view_sale_rep">
					<span class="pcoded-micon"><i class="fa fa-people-carry"></i></span>
					<span class="pcoded-mtext">Manage Staff</span>
				</a>
			</li>

			<li class="">
				<a href="<?php echo base_url();?>Office/view_my_customer">
					<span class="pcoded-micon"><i class="fa fa-user-plus"></i></span>
					<span class="pcoded-mtext">Manage Customer</span>
				</a>
			</li>

			<li class="">
				<a href="<?php echo base_url();?>Office/view_my_supplier">
					<span class="pcoded-micon"><i class="fa fa-truck"></i></span>
					<span class="pcoded-mtext">Manage Supplier</span>
				</a>
			</li>


			<li class="">
				<a href="<?php echo base_url();?>Office/view_my_category">
					<span class="pcoded-micon"><i class="feather icon-menu"></i></span>
					<span class="pcoded-mtext">Manage Category</span>
				</a>
			</li>

			<div class="pcoded-navigatio-lavel">Stock</div>
			<li class="pcoded-hasmenu">
				<a href="javascript:void(0)">
					<span class="pcoded-micon"><i class="feather icon-layers"></i></span>
					<span class="pcoded-mtext">Manage Stock</span>
					<span class="pcoded-badge label label-danger">100+</span>
				</a>
				<ul class="pcoded-submenu">
					<li class=" ">
						<a href="<?php echo base_url();?>Office/add_stock">
							<span class="pcoded-mtext">Add Stock</span>
						</a>
					</li>
					<li class=" ">
						<a href="<?php echo base_url();?>Office/view_product">
							<span class="pcoded-mtext">View Product</span>
						</a>
					</li>
					

				</ul>
			</li>
		
		</ul>

		

	</div>
</nav>
