
<?php
$site_name      =$this->Admin_db->get_site_name();
$site_logo      =$this->Admin_db->get_site_logo();
$active ='active';

?>

<nav class="pcoded-navbar">
	<div class="pcoded-inner-navbar main-menu">
		<div class="pcoded-navigatio-lavel">Navigation</div>
		<ul class="pcoded-item pcoded-left-item">

			<li class="<?php if($this->uri->segment(1) =='Sales_Dashboard'){echo $active; }?> pcoded-trigger">
				<a href="<?php echo base_url();?>Sales_Dashboard">
					<span class="pcoded-micon"><i class="feather icon-home"></i></span>
					<span class="pcoded-mtext">Dashboard</span>
				</a>
				
			</li>

			<li class="<?php if($this->uri->segment(1) =='Sales_rep'){echo $active; }?>">
				<a href="<?php echo base_url();?>Sales_rep/index">
					<span class="pcoded-micon"><i class="fa fa-cart-plus"></i></span>
					<span class="pcoded-mtext">New Transaction</span>
					<!-- <span class="pcoded-badge label label-warning">NEW</span> -->
				</a>
			</li>

			<li class="<?php if($this->uri->segment(1) =='Transaction_history'){echo $active; }?>">
				<a href="<?php echo base_url();?>Transaction_history/index">
					<span class="pcoded-micon"><i class="feather icon-menu"></i></span>
					<span class="pcoded-mtext">Transaction History</span>
				</a>
			</li>

			<!-- <li class="">
				<a href="<?php echo base_url();?>Logout/sales_logout">
					<span class="pcoded-micon"><i class="fa fa-user-plus"></i></span>
					<span class="pcoded-mtext">Customers</span>
				</a>
			</li> -->

			<li class="">
				<a href="<?php echo base_url();?>Logout/sales_logout">
					<span class="pcoded-micon"><i class="fa fa-sign-out-alt"></i></span>
					<span class="pcoded-mtext">Logout</span>
				</a>
			</li>

			


			

			
		</ul>

		

	</div>
</nav>
