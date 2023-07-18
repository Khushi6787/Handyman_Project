<?php include 'includes/header.php'; ?>
<br>
<br>
<br>
<br>

<!-- Start Page Title Area -->
<div class="page-title-area bg-7">
			<div class="container">
				<div class="page-title-content">
					<h2>Profile</h2>

					<ul>
						<li>
							<a href="<?= base_url();?>Client/index">
								Home 
							</a>
						</li>

						<li class="active">Profile</li>
                        <li >
                            <a href="<?= base_url();?>Client/logout">
                                Log out
                            </a>
                        </li>
                    </ul>
				</div>
			</div>
		</div>
		<!-- End Page Title Area -->

		<!-- Start Product Details Area -->
		<section class="product-details-area ptb-100">
			<div class="container">
				<div class="row align-items-center">
					<div class="col-lg-6 col-md-12">
						
					</div>

					<div class="container">
		
                    <?php $userData = $this->userModel->searchuser($_SESSION['userID']); ?>
				<form action="<?php echo base_url(); ?>Client/updateuser" method="post">
				
					<div class="row">
						<div class="col-lg-8">
							<h3>Update Profile</h3>
							
							<div class="row">
								<div class="col-lg-6 col-sm-6">
									<div class="form-group">
										<label>Name</label>
										<input type="text" name="userName" id="userName" class="form-control" value="<?= $_SESSION['userName']?>">
										<div class="help-block with-errors"></div>
									</div>
								</div>

                                <div class="col-lg-6 col-sm-6">
									<div class="form-group">
										<label>Email</label>
										<input type="email" name="email" id="email" class="form-control" value="<?= $_SESSION['email']?>">
										<div class="help-block with-errors"></div>
									</div>
								</div>
		
                                <div class="col-lg-6 col-sm-6">
									<div class="form-group">
										<label>Address</label>
										<input type="address" name="address" id="address" class="form-control">
										<div class="help-block with-errors"></div>
									</div>
								</div>
		                              	
								
								<div class="col-lg-6 col-sm-6">
									<div class="form-group">
										<label>Phone No</label>
										<input type="text" name="mobileno" id="mobileno" class="form-control">
										<div class="help-block with-errors"></div>
									</div>
								</div>
			
                                <div class="col-lg-6 col-sm-6">
									<div class="form-group">
										<label>Gender</label>
										<input type="gender" name="gender" id="gender" class="form-control">
										<div class="help-block with-errors"></div>
									</div>
								</div>
							<div class="col-lg-12 col-md-12">
								<br/>
									<button type="submit" class="default-btn" href="<?= base_url();?>Client/showThanks/">
										<span>Update</span>
									</button>
									
									<div class="clearfix"></div>
								</div>
							</div>
						</div>
						
                    </div>
				</form>
			</div>

					<div class="col-lg-12 col-md-12">
						<div class="tab product-details-tab">
							<div class="row">
								<div class="col-lg-12 col-md-12">
									<ul class="tabs">
										<li>
											Booking

										</li>
                                            
                                        <li>
											Service Request
										</li>
										<li>
											Feedback
										</li>
									</ul>
								</div>

								<div class="col-lg-12 col-md-12">
									<div class="tab_content">
										<div class="tabs_item">
											<div class="product-details-tab-content">
							                        <div class="cart-table table-responsive">
								                    <table class="table table-bordered">
								                    	<thead>
									                        	<tr>

											                        <th scope="col">Request Name</th>
											                        <th scope="col">Status</th>
										                        	<th scope="col">Date</th>
									                        		<th scope="col">Time</th>
																	<th scope="col">Action</th>
											
									                        	</tr>
									                    </thead> 
                                    		    		<tbody>
                                    <?php $bookingData = $this->bookingModel->showbookingbyUser($_SESSION['userID']);
                                        foreach($bookingData as $booking) { $request = $this->requestModel->searchrequest($booking['requestIDFK']); ?>
                                        <tr>
                                            
                                           
                                            <td><?php echo $booking['requestName']; ?></td>
                                            <td>  <?php if ($booking['status']=="0"){
                                                    echo "Booked";
                                                }else if ($booking['status']=="1"){
                                                    echo "Completed";
                                                }?></td>
                                            
                                            <td><?php echo $booking['date']; ?></td>
                                            <td><?php echo $booking['time']; ?></td>
                                            
                                            <td>
												<?php if($booking['status'] == "0") { ?>
													<form method="POST" action="<?php echo base_url(); ?>Client/submit">
														<input type="hidden" value="<?php echo $request['request']; ?>"
                             							<input type="hidden" name="amount" value="<?php echo $request['estimate']; ?>" />
                             							 <input type="hidden" name="bookingID" value="<?php echo $booking['bookingIDPK']; ?>" />
                              							 <input type="hidden" name="requestID" value="<?php echo $booking['requestIDFK']; ?>" />
							 							 <button type="submit" class="default-btn">Pay By Cash</button>
                             						 </form>
							  					<?php } ?>
											</td>
                                        </tr>
                                    <?php } ?>
            										</tbody>
								                    </table>
							                        </div>
    
                                            </div>

    									</div>
                                        <div class="tabs_item">
											<div class="product-details-tab-content">
												<div class="product-review-form">
												<form class="cart-controller mr-15">
													<div class="cart-table table-responsive">
														<table class="table table-bordered">
														<thead>
															<tr>
																<th scope="col">Provider Name</th>
																<th scope="col">Request</th>
																
																<th scope="col">Area Name</th>
																<th scope="col">Payment</th>
																<th scope="col">Estimate</th>											
																<th scope="col">Action</th>											
																
															</tr>
														</thead> 
																			
														<tbody>
									
														<?php $requestData = $this->requestModel->showrequestbyUser($_SESSION['userID']);
                                        foreach($requestData as $request) { ?>
                                        <tr>
                                            
                                            <td><?php echo $request['providerName']; ?></td>
                                            <td><?php echo $request['request']; ?></td>                                                                                    
                                            <td><?php echo $request['areaName']; ?></td>
                                            <td><?php echo $request['payment']; ?></td>
											
											<td><?php if ($request['status']=="0") {
                                    								echo "Not Estimated";  }
                                    								else if ($request['status']=="1"){
                                     								echo  $request['estimate']; ?>
																<br>
                                    							<a href="<?php echo base_url();?>Client/update_service_request_status/<?php echo $request['requestIDPK']; ?>/2">
																	Accept Price
																</a>
																<br>
                                    							<a href="<?php echo base_url();?>Client/update_service_request_status/<?php echo $request['requestIDPK']; ?>/3">
																	Reject Price
                                    		                    </a>
                                    							<?php   }else{
                                        							echo  $request['estimate']; 
                                    							} ?>
											</td>
											
                                            
											
											<td>
															<a href="<?php echo base_url(); ?>Client/deleteservice/<?php echo $request['requestIDPK']; ?>"
								            					title='Delete User' data-toggle='tooltip'>Delete</a>
											</td>
                                            
                                        </tr>
                                    <?php } ?>
										
														</tbody>
														</table>
													</div>
												</form>	
												</div>
											</div>
										</div>
										<div class="tabs_item">
											<div class="product-details-tab-content">
												<div class="product-review-form">
												<div class="review-form">
													

												<form class="cart-controller mr-15">
													<div class="cart-table table-responsive">
														<table class="table table-bordered">
														<thead>
															<tr>
																<th scope="col">Rating</th>
																<th scope="col">Provider Name</th>
																<th scope="col">Comment</th>
																										
															</tr>
														</thead> 
																			
														<tbody>
														<?php $feedbackData = $this->feedbackModel->showfeedbackbyUser($_SESSION['userID']);
														foreach($feedbackData as $feedback) { ?>
														<tr>
															<td><?php echo $feedback['ratings']; ?></td>
															<td><?php echo $feedback['providerName']; ?></td>
															<td><?php echo $feedback['comment']; ?></td>
															
                                            			</tr>
														<?php } ?>	
														</tbody>
														</table>
													</div>
													</form>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- End Profile Area -->

<?php include 'includes/footer.php'; ?>