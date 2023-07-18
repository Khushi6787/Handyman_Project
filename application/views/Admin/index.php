<?php include 'includes/header.php'; ?>

  <!--main content start-->
  <section id="main-content">
          <section class="wrapper">
              <!--state overview start-->              
              <div class="row state-overview">
              <?php if($_SESSION['usertype'] != "provider") { ?>
                  <div class="col-lg-6 col-sm-6">
                      <section class="card">
                          <div class="symbol blue">
                              <i class="fa fa-user"></i>
                          </div>
                          <div class="value">
                              <h1 class="count">
                                  <?= $worker_count?>
                              </h1>
                              <p>Providers</p>
                          </div>
                      </section>
                  </div>
                  <div class="col-lg-6 col-sm-6">
                      <section class="card">
                          <div class="symbol red">
                              <i class="fa fa-users"></i>
                          </div>
                          <div class="value">
                              <h1 class="count2">
                                  <?= $client_count; ?>
                              </h1>
                              <p>Users</p>
                          </div>
                      </section>
                  </div>                  
                  <?php } ?>
                  <div class="col-lg-6 col-sm-6">
                      <section class="card">
                          <div class="symbol yellow">
                              <i class="fa fa-book"></i>
                          </div>
                          <div class="value">
                              <h1 class=" count4">
                              <?= $booking_count; ?>
                              </h1>
                              <p>User Booking</p>
                          </div>
                      </section>
                  </div>
                  <div class="col-lg-6 col-sm-6">
                      <section class="card">
                          <div class="symbol blue">
                              <i class="fa fa-check-square-o"></i>
                          </div>
                          <div class="value">
                              <h1 class=" count4">
                              <?= $complete_count; ?>
                              </h1>
                              <p>Complete Booking</p>
                          </div>
                      </section>
                  </div>
                  <div class="col-lg-6 col-sm-6">
                      <section class="card">
                          <div class="symbol red">
                              <i class="fa fa-tags"></i>
                          </div>
                          <div class="value">
                              <h1 class=" count3">
                              <?= $request_count; ?> 
                              </h1>
                              <p>User Request</p>
                          </div>
                      </section>
                  </div>
                  <div class="col-lg-6 col-sm-6">
                      <section class="card">
                          <div class="symbol yellow">
                              <i class="fa fa-edit"></i>
                          </div>
                          <div class="value">
                              <h1 class=" count5">
                              <?= $feedback_count; ?> 
                              </h1>
                              <p>User Feedback</p>
                          </div>
                      </section>
                  </div>
              </div>
              <!--state overview end-->
            </section>
      </section>
      <!--main content end-->

<?php include 'includes/footer.php'; ?>