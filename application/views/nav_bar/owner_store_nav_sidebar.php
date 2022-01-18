
<?php
$site_name      =$this->Admin_db->get_site_name();
$site_logo      =$this->Admin_db->get_site_logo();
$active ='active';
$count_product_out_stock 			=$this->Action->count_total_product_out_of_stock();

?>
<nav class="pcoded-navbar">
	<div class="pcoded-inner-navbar main-menu">
		<div class="pcoded-navigatio-lavel">Navigation</div>
		<ul class="pcoded-item pcoded-left-item">

			<li class="<?php if($this->uri->segment(2) ==' '){echo $active; }?> pcoded-trigger">
				<a href="<?php echo base_url();?>Office">
					<span class="pcoded-micon"><i class="feather icon-home"></i></span>
					<span class="pcoded-mtext">Dashboard</span>
				</a>
				
			</li>

			<li class="<?php if($this->uri->segment(2) =='open_store'){echo $active; }?>">
				<a href="<?php echo base_url();?>Office/open_store">
					<span class="pcoded-micon"><i class="feather icon-sidebar"></i></span>
					<span class="pcoded-mtext">Manage Store</span>
					<!-- <span class="pcoded-badge label label-warning">NEW</span> -->
				</a>
			</li>

			<li class="<?php if($this->uri->segment(2) =='view_supervisor'){echo $active; }?>">
				<a href="<?php echo base_url();?>Office/view_supervisor">
					<span class="pcoded-micon"><i class="fa fa-user-tie"></i></span>
					<span class="pcoded-mtext">Manage Supervisor</span>
				</a>
			</li>

			<li class="<?php if($this->uri->segment(2) =='view_sale_rep'){echo $active; }?>">
				<a href="<?php echo base_url();?>Office/view_sale_rep">
					<span class="pcoded-micon"><i class="fa fa-people-carry"></i></span>
					<span class="pcoded-mtext">Manage Sales Rep.</span>
				</a>
			</li>

			<li class="<?php if($this->uri->segment(2) =='view_my_customer'){echo $active; }?>">
				<a href="<?php echo base_url();?>Office/view_my_customer">
					<span class="pcoded-micon"><i class="fa fa-user-plus"></i></span>
					<span class="pcoded-mtext">Manage Customer</span>
				</a>
			</li>

			<li class="<?php if($this->uri->segment(2) =='view_my_supplier'){echo $active; }?>">
				<a href="<?php echo base_url();?>Office/view_my_supplier">
					<span class="pcoded-micon"><i class="fa fa-truck"></i></span>
					<span class="pcoded-mtext">Manage Supplier</span>
				</a>
			</li>


			<li class="<?php if($this->uri->segment(2) =='view_my_category'){echo $active; }?>">
				<a href="<?php echo base_url();?>Office/view_my_category">
					<span class="pcoded-micon"><i class="fa fa-sitemap"></i></span>
					<span class="pcoded-mtext">Manage Category</span>
				</a>
			</li>

			<div class="pcoded-navigatio-lavel">Stock</div>
			<li class="<?php if($this->uri->segment(2) =='add_stock' || $this->uri->segment(2) =='view_product' || $this->uri->segment(2) == 'view_product_in' || $this->uri->segment(2) == 'view_product_out'){echo $active; }?> pcoded-hasmenu">
				<a href="javascript:void(0)">
					<span class="pcoded-micon"><i class="feather icon-layers"></i></span>
					<span class="pcoded-mtext">Manage Stock</span>
					<?php
						if($count_product_out_stock > 0){
					?>
					<span class="pcoded-badge label label-danger"><?php echo $count_product_out_stock;?></span>
					<?php
						}
					?>
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
					<li class=" ">
						<a href="<?php echo base_url();?>Office/view_product_in">
							<span class="pcoded-mtext">In-Stock</span>
						</a>
					</li>
					<li class=" ">
						<a href="<?php echo base_url();?>Office/view_product_out">
							<span class="pcoded-mtext">Out Of Stock</span>
						</a>
					</li>
					
					

				</ul>
			</li>

			<li class="">
				<a href="<?php echo base_url();?>Logout">
					<span class="pcoded-micon"><i class="fa fa-sign-out-alt"></i></span>
					<span class="pcoded-mtext">Logout</span>
				</a>
			</li>

		
		</ul>

		

	</div>
</nav>
