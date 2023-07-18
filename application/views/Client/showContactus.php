<?php include 'includes/header.php'; ?>
<br>
<br>
<br>
<br>
<!-- Start Page Title Area -->
<div class="page-title-area bg-8">
	<div class="container">
		<div class="page-title-content">
			<h2>Contact us</h2>
			<ul>
				<li>
					<a href="<?=base_url();?>Client/index/">
						Home 
					</a>
				</li>
				<li class="active">Contact us</li>
            </ul>
		</div>
	</div>
</div>
<!-- End Page Title Area -->

		
<!-- Start Contact Area -->
<section class="main-contact-area pt-100 pb-100">
			<div class="container">			
				<form action="<?php echo base_url(); ?>Client/insertinquiry" method="post">
					<div class="row">
						<div class="col-lg-8">
							<h3>Contact Us</h3>
							
							<div class="row">
								<div class="col-lg-6 col-sm-6">
									<div class="form-group">
										<label>Your name</label>
										<input type="text" name="inquiryName" id="inquiryName" class="form-control" value="<?= isset($_SESSION['userName'])?$_SESSION['userName']:'' ?>">
										<div class="help-block with-errors"></div>
									</div>
								</div>
		
								<div class="col-lg-6 col-sm-6">
									<div class="form-group">
										<label>Your email</label>
										<input type="email" name="email" id="email" class="form-control" value="<?= isset($_SESSION['email'])?$_SESSION['email']:'' ?>">
										<div class="help-block with-errors"></div>
									</div>
								</div>
		
								<div class="col-lg-6 col-sm-6">
									<div class="form-group">
										<label>Your phone</label>
										<input type="text" name="mobileno" id="mobileno" class="form-control">
										<div class="help-block with-errors"></div>
									</div>
								</div>
		
								<div class="col-lg-6 col-sm-6">
									<div class="form-group">
										<label>Subject</label>
										<input type="text" name="subject" id="subject" class="form-control">
										<div class="help-block with-errors"></div>
									</div>
								</div>
		
								<div class="col-12">
									<div class="form-group">
										<label>Your message</label>
										<textarea name="message" class="form-control" id="message" cols="30" rows="8"></textarea>
										<div class="help-block with-errors"></div>
									</div>
								</div>
								
								<div class="col-lg-12 col-md-12">
									<button type="submit" class="default-btn">
										<span>Send message</span>
									</button>									
									<div class="clearfix"></div>
								</div>
							</div>
						</div>

						<div class="col-lg-4">
							<div class="single-contact-bg">
								<div class="single-contact-info">
									<h3>Contact information</h3>
		
									<ul class="address">
										<li class="location">
											<span>Address</span>
											H-10/11,Nav Mangalam complex,Above Reliance Fresh,City Light,Surat
										</li>
										<li>
											<span>Phone</span>
											<a href="tel:+91-(514)-312-5678">+91 (514) 312-5678</a>
										</li>
										<li>
											<span>Email</span>
											<a href="mail:">helypatel@gmail.com</a>
										</li>
									</ul>
								</div>
		
								<div class="single-contact-info follow-us">
									<h3>Working hours</h3>
		
									<ul class="works-hours">
										<li>
											Mon - Thu: 
											<span>9:00am - 8:00pm</span>
										</li>
										<li>
											Fri - Sat:  
											<span>9:00am - 5:00pm</span>
										</li>
										<li>
											Sun: 
											<span>Closed</span>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
		</section>
		<!-- End Contact Area -->

<?php include 'includes/footer.php'; ?>