
<?php
$site_name      =$this->Admin_db->get_site_name();
$site_logo      =$this->Admin_db->get_site_logo();

?>
<nav class="navbar header-navbar pcoded-header">
	<div class="navbar-wrapper">

		<div class="navbar-logo">
			<a class="mobile-menu" id="mobile-collapse" href="#!">
				<i class="feather icon-menu"></i>
			</a>
			<a href="index.html">
				<img class="img-fluid" src="<?php echo base_url();?>files/site_logo/<?php echo $site_logo;?>" alt="<?php echo $site_name;?>" style ="width: 220px; height:75px;" />
			</a>
			<a class="mobile-options">
				<i class="feather icon-more-horizontal"></i>
			</a>
		</div>

		<div class="navbar-container">
			<ul class="nav-left">
				
				<li>
					<a href="#!" onclick="javascript:toggleFullScreen()">
						<i class="feather icon-maximize full-screen"></i>
					</a>
				</li>
			</ul>
			<ul class="nav-right">
				<!-- <li class="header-notification">
					<div class="dropdown-primary dropdown">
						<div class="dropdown-toggle" data-toggle="dropdown">
							<i class="feather icon-bell"></i>
							<span class="badge bg-c-pink">5</span>
						</div>
						<ul class="show-notification notification-view dropdown-menu" data-dropdown-in="fadeIn"
							data-dropdown-out="fadeOut">
							<li>
								<h6>Notifications</h6>
								<label class="label label-danger">New</label>
							</li>
							<li>
								<div class="media">
									<img class="d-flex align-self-center img-radius"
										src="files/assets/images/avatar-4.jpg" alt="Generic placeholder image">
									<div class="media-body">
										<h5 class="notification-user">John Doe</h5>
										<p class="notification-msg">Lorem ipsum dolor sit amet, consectetuer
											elit.</p>
										<span class="notification-time">30 minutes ago</span>
									</div>
								</div>
							</li>
							<li>
								<div class="media">
									<img class="d-flex align-self-center img-radius"
										src="<?php echo base_url();?>files/avatar.png" alt="Generic placeholder image">
									<div class="media-body">
										<h5 class="notification-user">Joseph William</h5>
										<p class="notification-msg">Lorem ipsum dolor sit amet, consectetuer
											elit.</p>
										<span class="notification-time">30 minutes ago</span>
									</div>
								</div>
							</li>
							<li>
								<div class="media">
									<img class="d-flex align-self-center img-radius"
										src="files/assets/images/avatar-4.jpg" alt="Generic placeholder image">
									<div class="media-body">
										<h5 class="notification-user">Sara Soudein</h5>
										<p class="notification-msg">Lorem ipsum dolor sit amet, consectetuer
											elit.</p>
										<span class="notification-time">30 minutes ago</span>
									</div>
								</div>
							</li>
						</ul>
					</div>
				</li> -->
				
				<li class="user-profile header-notification">
					<div class="dropdown-primary dropdown">
						<div class="dropdown-toggle" data-toggle="dropdown">
							<img src="<?php echo base_url();?>files/avatar.png" class="img-radius" alt="User-Profile-Image">
							<span><?php echo $user_name;?></span>
							<i class="feather icon-chevron-down"></i>
						</div>
						<ul class="show-notification profile-notification dropdown-menu" data-dropdown-in="fadeIn"
							data-dropdown-out="fadeOut">
							<!-- <li>
								<a href="#!">
									<i class="feather icon-settings"></i> Settings
								</a> 
							</li>
							<li>
								<a href="default/user-profile.html">
									<i class="feather icon-user"></i> Profile
								</a>
							</li>
							<li>
								<a href="default/email-inbox.html">
									<i class="feather icon-mail"></i> My Messages
								</a>
							</li> -->
							

							<li>
								<a href="<?php echo base_url();?>ChangePassword">
									<i class="feather icon-lock"></i> Change Password
								</a>
							</li>
							<?php
								$user_status	=$this->session->userdata('user_status');
								if($user_status =='admin'){
							?>
								
								<li>
									<a href="<?php echo base_url();?>Logout/admin_logout">
										<i class="feather icon-log-out"></i> Logout
									</a>
								</li>
							<?php 
								}elseif($user_status =='store_owner'){
							?>
								
								<li>
									<a href="<?php echo base_url();?>Logout/owner_logout">
										<i class="feather icon-log-out"></i> Logout
									</a>
								</li>
							<?php
								}else if($user_status =='manager'){
							?>
								
								<li>
									<a href="<?php echo base_url();?>Logout/manager_logout">
										<i class="feather icon-log-out"></i> Logout
									</a>
								</li>
							<?php
								}else if($user_status =='sales_rep'){
							?>

								
								<li>
									<a href="<?php echo base_url();?>Logout/sales_logout">
										<i class="feather icon-log-out"></i> Logout
									</a>
								</li>
							
							<?php
								}
							?>
						</ul>

					</div>
				</li>
			</ul>
		</div>
	</div>
</nav>




