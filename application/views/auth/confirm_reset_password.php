
<section class="login-block">
	<!-- Container-fluid starts -->
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<!-- Authentication card start -->

				<form class="md-float-material form-material" method="POST" action="<?php echo base_url();?>Login/confirm_reset_password2">
                
					<div class="auth-box card">
						<div class="card-block">
							<div class="row m-b-20">
								<div class="col-md-12">
									<h3 class="text-center">Confirm Password Reset</h3>
									
                                    <?php echo isset($alert)?$alert:NULL;?>
								</div>
							</div>
							<div class="form-group form-primary">
								<input type="text" name="pass" class="form-control" required=""
									placeholder="New Password">
								<span class="form-bar"></span>
							</div>

							<div class="form-group form-primary">
								<input type="password" name="repass" class="form-control" required=""
									placeholder="Confirm Reset Password">
								<span class="form-bar"></span>
							</div>
							
							
							<div class="row m-t-30">
								<div class="col-md-12">
                                    <input type="hidden" name="user_id" value="<?php echo $user_id;?>">
                                    <input type="hidden" name="email" value="<?php echo $email;?>">
                                    <input type="hidden" name="user_status" value="<?php echo $user_status;?>">
									<input type="submit" name="login" class="btn btn-primary text-center" value="Confirm Password" />
								</div>
							</div>
							<hr>
							
						</div>
					</div>
				</form>
				<!-- end of form -->
			</div>
			<!-- end of col-sm-12 -->
		</div>
		<!-- end of row -->
	</div>
	<!-- end of container-fluid -->
</section>
