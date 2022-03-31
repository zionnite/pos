
<?php
$site_name      =$this->Admin_db->get_site_name();
$site_logo      =$this->Admin_db->get_site_logo();

$phone_no         		=$this->session->userdata('phone_no');
$user_id        		=$this->session->userdata('user_id');
$user_name         		=$this->session->userdata('user_name');
$email                  =$this->session->userdata('email');
$store_id               =$this->session->userdata('store_id');
$store_name             =$this->session->userdata('store_name');
$branch_id              =$this->session->userdata('branch_id');
$store_owner_id         =$this->session->userdata('store_owner_id');
$user_status            =$this->session->userdata('user_status');

?>
<nav class="navbar header-navbar pcoded-header">
	<div class="navbar-wrapper">

		<div class="navbar-logo">
			<a class="mobile-menu" id="mobile-collapse" href="#!">
				<i class="feather icon-menu"></i>
			</a>
			<a href="javascript:;">
				<img class="img-fluid" src="<?php echo $site_logo;?>" alt="<?php echo $site_name;?>" style ="width: 220px; height:55px;" />
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

				<li class="header-notification">
					
					<?php
						if($user_status =='manager'){?>
							<a href="<?php echo base_url();?>Manager/add_sale"><i class="fa fa-cart-plus"></i></a>
							
						<?php }elseif($user_status =='sales_rep'){?>
							<a href="<?php echo base_url();?>Pos/add_sales"><i class="fa fa-cart-plus"></i></a>
						<?php
						}
					?>
					
				</li>

				<li class="header-notification">
					<?php
						//if($user_status =='manager'  || $user_status =='store_owner'){?>
					<a href="<?php echo base_url();?>Sales_report"><i class="fa fa-receipt"></i></a>
					<?php 
						//}
					?>
				</li>
				
				<li class="header-notification">
					<?php
						//if($user_status =='manager'  || $user_status =='store_owner'){?>
					<a id="toggle_cal" href="javascript:;"><i class="fa fa-calculator"></i></a>
					<?php 
						//}
					?>
				</li>
				

				<li class="header-notification">
					<?php
						$count_message		=$this->Admin_db->count_my_messages($email);
					?>
					<div class="dropdown-primary dropdown">
						
						<div class="dropdown-toggle" data-toggle="dropdown">
							
								<i class="feather icon-bell"></i>
								<?php
									if($count_message > 0){
								?>
								<span class="badge bg-c-pink">
								<?php 
									
									echo $count_message;
									
								?>
								</span>
							<?php } ?>
						</div>
						
						<ul class="show-notification notification-view dropdown-menu" data-dropdown-in="fadeIn"
							data-dropdown-out="fadeOut">
							<li>
								<h6>Notifications</h6>
								<a href="<?php echo base_url();?>Messages/read_message" class="label label-danger" style="float:right; padding:1%; font-size:12px;">View All</a>
							</li>
							<?php
										$get_msg		=$this->Admin_db->get_my_messages_limit_by_5($email);
										if(is_array($get_msg)){
											foreach($get_msg as $row){

												$id              =$row['id'];
												$sender          =$row['sender'];
												$reciever        =$row['reciever'];
												$title           =$row['title'];
												$message         =$row['message'];
												$date            =$row['date_created'];
												$time            =$row['time'];
	
												$encode_email    =urlencode($sender);
												$encode_rec      =urlencode($reciever);
												
												$sender_name	 =$this->Admin_db->get_user_name($sender);

												if(strlen($message) > 25) {
													$message = $message.' ';
													$message = substr($message, 0, 50);
													$message = substr($message, 0, strrpos($message ,' '));
													$message = $message.'...';
												}
							?>
								<li>
									<div class="media">
										
										
										<div class="media-body">
											<h5 class="notification-user"><?php echo $sender_name;?></h5>
											<p class="notification-msg"><?php echo $message;?></p>
											<span class="notification-time"><?php echo $this->Admin_db->time_stamp($time);?></span>
										</div>
									</div>
								</li>
							<?php 
								}
							}else{?>
								<li>
									<div class="media">
										
										
										<div class="media-body">
											<h5 class="notification-user">No message to display</h5>
											
										</div>
									</div>
								</li>
							<?php
							}
							?>
							
						</ul>
					</div>
				</li>
				
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

							<li>
								<a href="<?php echo base_url();?>Logout">
									<i class="feather icon-log-out"></i> Logout
								</a>
							</li>
							
						</ul>

					</div>
				</li>
			</ul>
		</div>
	</div>
</nav>




