<?php include 'includes/header.php'; ?>

		<!-- Start Hero Slider Area -->
		<div class="hero-slider-area">
			<div class="hero-slider owl-carousel owl-theme">
				<div class="hero-slider-item slider-item-bg-1">
					<div class="d-table">
						<div class="d-table-cell">
							<div class="container-fluid">
								<div class="row align-items-center">
									<div class="col-lg-6">
										<div class="hero-slider-content">
											<h1>Need any type of Handyman services like <span>Plumber</span></h1>
										</div>
									</div>

									<div class="col-lg-6 pr-0">
										<div class="hero-slider-img">
											<img src="<?=CLIENT_ASSETS_PATH?>assets/images/hero-slider/hero-slider-img.jpg" alt="Image">
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="hero-slider-item slider-item-bg-1">
					<div class="d-table">
						<div class="d-table-cell">
							<div class="container-fluid">
								<div class="row align-items-center">
									<div class="col-lg-6">
										<div class="hero-slider-content">
											<h1>Need any type of Handyman services like <span>Electrician</span></h1>
										</div>
									</div>

									<div class="col-lg-6 pr-0">
										<div class="hero-slider-img">
											<img src="<?=CLIENT_ASSETS_PATH?>assets/images/hero-slider/hero-slider-img-2.jpg" alt="Image">
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="hero-slider-item slider-item-bg-1">
					<div class="d-table">
						<div class="d-table-cell">
							<div class="container-fluid">
								<div class="row align-items-center">
									<div class="col-lg-6">
										<div class="hero-slider-content">
											<h1>Need any type of Handyman services like <span>Carpenter</span></h1>
										</div>
									</div>

									<div class="col-lg-6 pr-0">
										<div class="hero-slider-img">
											<img src="<?=CLIENT_ASSETS_PATH?>assets/images/hero-slider/hero-slider-img-3.jpg" alt="Image">
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Hero Slider Area -->

		<!-- End Features Area -->
		<section class="features-area pb-100">
			<div class="container">
				<div class="features-bg">
					<div class="row justify-content-center">
						<div class="col-lg-4 col-sm-6 pl-0">
							<div class="single-features">
								<i class="flaticon-transparency"></i>
								<h3>Transparent</h3>
							</div>
						</div>

						<div class="col-lg-4 col-sm-6 pl-0">
							<div class="single-features active">
								<i class="flaticon-loyalty"></i>
								<h3>Loyalty</h3>
								<img src="<?=CLIENT_ASSETS_PATH?>assets/images/features-shape.png" class="features-shape" alt="Image">
							</div>
						</div>

						<div class="col-lg-4 col-sm-6 pl-0">
							<div class="single-features">
								<i class="flaticon-reliability"></i>
								<h3>Reliable</h3>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section> 
		<!-- End Features Area -->
		
		<!-- Start Our Services Area -->
		<section class="our-services-area pb-70">
			<div class="container">
				<div class="section-title">
					<span class="top-title">Our Category</span>
					<h2>The main priority is our services  through which our clients get 100% quality of work</h2>
				</div>

				<div class="row justify-content-center">
				
					<?php foreach($catData as $category) { ?>
					<div class="col-lg-4 col-md-6">
						<div class="single-services">
						<a href="<?=base_url();?>Client/showprovider/<?= $category['categoryIDPK'];?>">
								<img src="<?= base_url().$category['image']; ?>" width="500px" height="500px" alt="Image">
							</a>
							
							<div class="services-content">
								<h3>
									<a href="<?=base_url();?>Client/showprovider/<?= $category['categoryIDPK'];?>"><?= $category['categoryName'];?></a>
								</h3>
							</div>
						</div>
					</div>
					<?php } ?>
					
				</div>
			</div>
		</section>
		<!-- End Our Services Area -->

<?php include 'includes/footer.php'; ?>