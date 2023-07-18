<?php include 'includes/header.php'; ?>
<section class="our-services-area ptb-100">
			<div class="container">    
			
    			<div class="row justify-content-center">
					<?php foreach($providerData as $provider) { ?>
					<div class="col-lg-4 col-md-6">
						<div class="single-services">
							<a href="<?=base_url();?>Client/showproviderdetails/<?= $provider['providerIDPK'];?>">
								<img src="<?=base_url().$provider['image'];?>" width="500px" height="500px" alt="provider">
							</a>
							
							<div class="services-content">
								<h3>
									<a href="<?=base_url();?>Client/showproviderdetails/<?= $provider['providerIDPK'];?>"><?= $provider['providerName'];?></a>
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