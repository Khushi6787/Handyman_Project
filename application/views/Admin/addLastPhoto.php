<?php include 'includes/header.php'; ?>

   <!--main content start-->
   <section id="main-content">
          <section class="wrapper">
              <!-- page start-->
              <div class="row">
                  <div class="col-lg-12">
                      <section class="card">
                          <header class="card-header">
                             Add Last Photo Services
                          </header>
                          <div class="card-body">
                              <div class="form">
                                <form action="<?php echo base_url(); ?>Admin/insertlastphoto" enctype="multipart/form-data" method="post">
                                      <div class="form-group row ">
                                          <label for="image" class="control-label col-lg-2">Image</label>
                                          <div class="col-lg-10">
                                              <input class=" form-control" id="image" name="image[]" multiple type="file" required data-validation-required-message="This field is required" />
                                          </div>
                                      </div>
                                      
                                      <div class="form-group row ">
                                          <label for="providerName" class="control-label col-lg-2">providerName</label>
                                          <div class="col-lg-10">
                                          <select name="providerIDFK" class="form-control" required data-validation-required-message="This field is required">
                                            <option value=""> Select Provider</option>
                                            <?php foreach ($providerData as $provider) {?>
                                            <option value="<?= $provider['providerIDPK']; ?>"> 
                                                    <?= $provider['providerName']; ?>
                                            </option>
                                            <?php }?>
                                          </select>    
                                          </div>
                                      </div>

                                      <div class="form-group row">
                                          <div class="col-lg-offset-2 col-lg-10">
                                              <button class="btn btn-danger" type="submit">Save</button>
                                              <button class="btn btn-default" type="button">Cancel</button>
                                          </div>
                                      </div>
                                </form>                                 
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