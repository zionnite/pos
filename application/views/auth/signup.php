
<section class="login-block">
	<!-- Container-fluid starts -->
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<!-- Authentication card start -->

				<form class="md-float-material form-material" method="POST" action="<?php echo base_url();?>Register/register">
                
					<div class="auth-box card">
						<div class="card-block">
							<div class="row m-b-20">
								<div class="col-md-12">
									<h3 class="text-center">Register (Store Owner)</h3>
                                    <?php echo isset($alert)?$alert:NULL;?>
								</div>
							</div>
							<div class="form-group form-primary">
								<input type="text" name="full_name" class="form-control" required=""
									placeholder="Your Full Name" value="<?php echo set_value('full_name');?>">
								<?php echo form_error('full_name'); ?>
							</div>
							<div class="form-group form-primary">
                                <b style="color:red;">Username must not contain any special <br />character(e.g: +, @,#,$,%,^,&,*,~, etc)</b>
								<input type="text" name="user_name" class="form-control" required=""
									placeholder="Your Username" value="<?php echo set_value('user_name');?>">
								<?php echo form_error('user_name'); ?>
							</div>
							<div class="form-group form-primary">
								<input type="text" name="phone" class="form-control" required=""
									placeholder="Your Phone Number" value="<?php echo set_value('phone');?>">
								<?php echo form_error('phone'); ?>
							</div>
							<div class="form-group form-primary">
								<input type="text" name="email" class="form-control" required=""
									placeholder="Your Email Address" value="<?php echo set_value('email');?>">
								<?php echo form_error('email'); ?>
							</div>
							<div class="form-group form-primary">
								<input type="password" name="password" class="form-control" required=""
									placeholder="Password"  value="<?php echo set_value('password');?>">
								<?php echo form_error('password'); ?>
							</div>
							
							<div class="row m-t-30">
								<div class="col-md-12">
									<input type="submit" name="login" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20" value="Sign Up" />
								</div>
							</div>

							<p class="text-inverse text-left">Already have an account?<a href="<?php echo base_url();?>Login"> <b class="f-w-600">Login here </b></a></p>
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
