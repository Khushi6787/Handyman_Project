<?php include 'includes/header.php'; ?>

   <!--main content start-->
   <section id="main-content">
          <section class="wrapper">
              <!-- page start-->
              <div class="row">
                  <div class="col-lg-12">
                      <section class="card">
                          <header class="card-header">
                             Add Provider
                          </header>
                          <div class="card-body">
                              <div class="form">
                              <?php if($operation == "insert") {?>
                              <form action="<?php echo base_url(); ?>Admin/insertcontractor" method="post">
                                      <div class="form-group row ">
                                          <label for="userName" class="control-label col-lg-2">Contractor Name</label>
                                          <div class="col-lg-10">
                                              <input class="form-control " id="userName" name="userName" type="text" required data-validation-required-message="This field is required" />
                                          </div>
                                      </div>
                                      <div class="form-group row ">
                                          <label for="address" class="control-label col-lg-2">Address</label>
                                          <div class="col-lg-10">
                                              <input class="form-control " id="address" name="address" type="text" required data-validation-required-message="This field is required" />
                                          </div>
                                      </div>
                                      <div class="form-group row ">
                                          <label for="gender" class="control-label col-lg-2">Gender</label>
                                          <div class="col-lg-10">
                                              <input class="form-control " id="gender" name="gender" type="text" required data-validation-required-message="This field is required" />
                                          </div>
                                      </div>
                                      <div class="form-group row ">
                                          <label for="mobileno" class="control-label col-lg-2">Mobile No</label>
                                          <div class="col-lg-10">
                                              <input class="form-control " id="mobileno" name="mobileno" type="text" required data-validation-required-message="This field is required" />
                                          </div>
                                      </div>
                                      <div class="form-group row ">
                                          <label for="email" class="control-label col-lg-2">Email</label>
                                          <div class="col-lg-10">
                                              <input class="form-control " id="email" name="email" type="text" required data-validation-required-message="This field is required" />
                                          </div>
                                      </div>
                                                                                                                
                                      <div class="form-group row">
                                          <div class="col-lg-offset-2 col-lg-10">
                                              <button class="btn btn-danger" type="submit">Save</button>
                                              <button class="btn btn-default" type="button">Cancel</button>
                                          </div>
                                      </div>
                                  </form>
                                  <?php } else { ?>
                                    <form action="<?php echo base_url(); ?>Admin/updatecontractor" method="post">
                                    <input type="hidden" name="userIDPK" value="<?php echo $userData['userIDPK']; ?>">
                                      <div class="form-group row ">
                                          <label for="userName" class="control-label col-lg-2">Contractor Name</label>
                                          <div class="col-lg-10">
                                              <input class="form-control " id="userName" name="userName" value="<?php echo $userData['userName']; ?>" type="text" required data-validation-required-message="This field is required" />
                                          </div>
                                      </div>
                                      <div class="form-group row ">
                                          <label for="address" class="control-label col-lg-2">Address</label>
                                          <div class="col-lg-10">
                                              <input class="form-control " id="address" name="address" value="<?php echo $userData['address']; ?>" type="text" required data-validation-required-message="This field is required" />
                                          </div>
                                      </div>
                                      <div class="form-group row ">
                                          <label for="gender" class="control-label col-lg-2">Gender</label>
                                          <div class="col-lg-10">
                                              <input class="form-control " id="gender" name="gender" value="<?php echo $userData['gender']; ?>" type="text" required data-validation-required-message="This field is required" />
                                          </div>
                                      </div>
                                      <div class="form-group row ">
                                          <label for="mobileno" class="control-label col-lg-2">Mobile No</label>
                                          <div class="col-lg-10">
                                              <input class="form-control " id="mobileno" name="mobileno" value="<?php echo $userData['mobileno']; ?>" type="text" required data-validation-required-message="This field is required" />
                                          </div>
                                      </div>
                                      <div class="form-group row ">
                                          <label for="email" class="control-label col-lg-2">Email</label>
                                          <div class="col-lg-10">
                                              <input class="form-control " id="email" name="email" value="<?php echo $userData['email']; ?>" type="text" required data-validation-required-message="This field is required" />
                                          </div>
                                      </div>
                                                                                                                
                                      <div class="form-group row">
                                          <div class="col-lg-offset-2 col-lg-10">
                                              <button class="btn btn-danger" type="submit">Save</button>
                                              <button class="btn btn-default" type="button">Cancel</button>
                                          </div>
                                      </div>
                                  </form>
                                  <?php } ?>
                              </div>
                          </div>
                      </section>
                  </div>
              </div>
              <!-- page end-->
          </section>
      </section>
      <!--main content end-->



<?php include 'includes/footer.php'; ?>