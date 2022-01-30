<?php
	$count_product_out_stock 			=$this->Action->count_total_product_out_of_stock();

$site_name      =$this->Admin_db->get_site_name();
$site_logo      =$this->Admin_db->get_site_logo();
$active ='active';

?>
<nav class="pcoded-navbar">
	<div class="pcoded-inner-navbar main-menu">
		<div class="pcoded-navigatio-lavel">Navigation</div>
		<ul class="pcoded-item pcoded-left-item">

			<li class="<?php if($this->uri->segment(2) ==' '){echo $active; }?> pcoded-trigger">
				<a href="<?php echo base_url();?>Super-Admin">
					<span class="pcoded-micon"><i class="feather icon-home"></i></span>
					<span class="pcoded-mtext">Dashboard</span>
				</a>
				
			</li>

			<li class="<?php if($this->uri->segment(2) =='view_plan'){echo $active; }?>">
				<a href="<?php echo base_url();?>Super-Admin/view_plan">
					<span class="pcoded-micon"><i class="fa fa-cart-plus"></i></span>
					<span class="pcoded-mtext">Plan</span></span>
					<!-- <span class="pcoded-badge label label-warning">NEW</span> -->
				</a>
			</li>

			<li class="<?php if($this->uri->segment(2) =='manage_store'){echo $active; }?>">
				<a href="<?php echo base_url();?>Super-Admin/manage_store">
					<span class="pcoded-micon"><i class="fa fa-store"></i></span>
					<span class="pcoded-mtext">Manage Store</span>
				</a>
			</li>
			<li class="<?php if($this->uri->segment(2) =='settings' || $this->uri->segment(2) =='site_details' || $this->uri->segment(2) == 'set_payment_api'){echo $active; }?>">
				<a href="<?php echo base_url();?>Super-Admin/settings">
					<span class="pcoded-micon"><i class="fa fa-cogs"></i></span>
					<!-- <span class="pcoded-micon"><i class="fa fa-money-check"></i></span> -->
					<span class="pcoded-mtext">Setttings</span>
				</a>
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
