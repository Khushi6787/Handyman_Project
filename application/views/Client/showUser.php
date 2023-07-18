<?php include 'includes/header.php'; ?>
<br>
<br>
<br>
<br>
<!-- Start Page Title Area -->
<div class="page-title-area bg-10">
			<div class="container">
				<div class="page-title-content">
					<h2>My account</h2>

					<ul>
						<li>
							<a href="<?=base_url();?>Client/index/">
								Home 
							</a>
						</li>

						<li class="active">My account</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- End Page Title Area -->

		<!-- Start User Area -->
		<section class="user-area ptb-100">
			<div class="container">
				<div class="row">
					<div class="col-lg-6">
						<div class="user-form-content log-in-50">
							<h3>Log in</h3>
						
							<form class="user-form" action="<?= base_url();?>Client/login" method="post">
								<div class="row">
									<div class="col-12">
										<div class="form-group">
											<label>Email</label>
											<input class="form-control" type="text" name="email" required data-validation-required-message="This field is required">
										</div>
									</div>
		
									<div class="col-12">
										<div class="form-group">
											<label>Password</label>
											<input class="form-control" type="password" name="password" required data-validation-required-message="This field is required">
										</div>
									</div>
		
									<div class="col-12">
										<button class="default-btn" type="submit">
											Sign In
										</button>
										<?php if(isset($invalid)){
              							if($invalid != null) { ?>
              							<div class = ""><span style = "color:red;">
                    						<b>*<?php echo $invalid; ?></b></span>
              							</div>
           								<?php } } ?>
									</div>
								</div>
							</form>
						</div>
					</div>

					<div class="col-lg-6">
						<div class="user-form-content">
							<h3>Registration</h3>

							<form class="user-form" action="<?= base_url();?>Client/insertregister" method="post">
								<div class="row">
									<div class="col-12">
										<div class="form-group">
											<label>Name</label>
											<input class="form-control" type="text" name="userName" required data-validation-required-message="This field is required">
										</div>
									</div>

									<div class="col-12">
										<div class="form-group">
											<label>Email</label>
											<input class="form-control" type="email" name="email" required data-validation-required-message="This field is required">
										</div>
									</div>

									<div class="col-12">
										<div class="form-group">
											<label>Password</label>
											<input class="form-control" type="password" name="password" required data-validation-required-message="This field is required">
										</div>
									</div>
		
									<div class="col-12">
										<div class="form-group">
											<label>Mobile No</label>
											<input class="form-control" type="mobileno" name="mobileno" required data-validation-required-message="This field is required">
										</div>
									</div>

									<div class="col-12">
										<div class="form-group">
											<label>Gender</label><br>
											<input class="radio" type="radio" name="gender" value="Male">Male<br>
											<input class="radio" type="radio" name="gender" value="Female">Female
										</div>
									</div>

									<div class="col-12">
										<div class="form-group">
											<label>Address</label>
											<input class="form-control" type="address" name="address" required data-validation-required-message="This field is required">
										</div>
									</div>

									<div class="col-12">
										<button class="default-btn register" type="submit">
											Sign Up
										</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- End User Area -->
		
<?php include 'includes/footer.php'; ?>