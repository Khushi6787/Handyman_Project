<?php include 'includes/header.php'; ?>

   <!--main content start-->
   <section id="main-content">
          <section class="wrapper">
              <!-- page start-->
              <div class="row">
                  <div class="col-lg-12">
                      <section class="card">
                          <header class="card-header">
                            Add Category
                          </header>
                          <div class="card-body">
                              <div class="form">
                                  <?php if($operation == "insert") {?>
                                  <form action="<?php echo base_url(); ?>Admin/insertcategory" enctype="multipart/form-data" method="post">
                                      <div class="form-group row ">
                                          <label for="image" class="control-label col-lg-2">Image</label>
                                          <div class="col-lg-10">
                                              <input class=" form-control" id="image" name="image" type="file" required data-validation-required-message="This field is required" />
                                          </div>
                                      </div>
                                      <div class="form-group row ">
                                          <label for="categoryName" class="control-label col-lg-2">Category Name</label>
                                          <div class="col-lg-10">
                                              <input class="form-control " id="categoryName" name="categoryName" type="text" required data-validation-required-message="This field is required" />
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
                                    <form action="<?php echo base_url(); ?>Admin/updatecategory" enctype="multipart/form-data" method="post">
                                    <input type="hidden" name="categoryIDPK" value="<?php echo $catData['categoryIDPK']; ?>">
                                      <div class="form-group row ">
                                          <label for="image" class="control-label col-lg-2">Image</label>
                                          <div class="col-lg-10">
                                              <input class=" form-control" id="image" name="image" value="" type="file" />
                                          </div>
                                      </div>
                                      <div class="form-group row ">
                                          <label for="categoryName" class="control-label col-lg-2">Category Name</label>
                                          <div class="col-lg-10">
                                              <input class="form-control " id="categoryName" name="categoryName" value="<?php echo $catData['categoryName']; ?>" type="text" required data-validation-required-message="This field is required" />
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