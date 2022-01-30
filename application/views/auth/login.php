
<section class="login-block">
	<!-- Container-fluid starts -->
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<!-- Authentication card start -->

				<form class="md-float-material form-material" method="POST" action="<?php echo base_url();?>Login/login_user">
                
					<div class="auth-box card">
						<div class="card-block">
							<div class="row m-b-20">
								<div class="col-md-12">
									<h3 class="text-center">Sign In</h3>
                                    <?php echo isset($alert)?$alert:NULL;?>
								</div>
							</div>
							<div class="form-group form-primary">
								<input type="text" name="email" class="form-control" required=""
									placeholder="Your Email Address" name="email">
								<span class="form-bar"></span>
							</div>
							<div class="form-group form-primary">
								<input type="password" name="password" class="form-control" required=""
									placeholder="Password" name="password">
								<span class="form-bar"></span>
							</div>

							<div class="row m-t-25 text-left">
                                <div class="col-12">
                                    <div class="checkbox-fade fade-in-primary d-">
                                        
                                        </div>
                                        <div class="forgot-phone text-right f-right">
                                            <a href="<?php echo base_url();?>Login/forgot_password" class="text-right f-w-600"> Forgot
                                                Password?</a>
                                        </div>
                                </div>
                        	</div>
							
							<div class="row m-t-30">
								<div class="col-md-12">
									<input type="submit" name="login" class="btn btn-primary text-center" value="Sign in" />
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
