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
                              <form action="<?php echo base_url(); ?>Admin/insertprovider" enctype="multipart/form-data" method="post">
                                      <div class="form-group row ">
                                          <label for="image" class="control-label col-lg-2">Image</label>
                                          <div class="col-lg-10">
                                              <input class=" form-control" id="image" name="image" type="file" required data-validation-required-message="This field is required" />
                                          </div>
                                      </div>
                                      <div class="form-group row ">
                                          <label for="typeName" class="control-label col-lg-2">Provider_Type Name</label>
                                          <div class="col-lg-10">
                                          <select name="typeIDFK" class="form-control" required data-validation-required-message="This field is required">
                                            <option value=""> Select Provider_Type</option>
                                            <?php foreach ($typeData as $provider_type) {?>
                                            <option value="<?= $provider_type['typeIDPK']; ?>"> 
                                                    <?= $provider_type['typeName']; ?>
                                            </option>
                                            <?php }?>
                                          </select>
                                          </div>
                                      </div>
                                      <div class="form-group row ">
                                          <label for="categoryName" class="control-label col-lg-2">Category Name</label>
                                          <div class="col-lg-10">
                                          <select name="categoryIDFK" class="form-control" required data-validation-required-message="This field is required">
                                            <option value=""> Select Category</option>
                                            <?php foreach ($categoryData as $category) {?>
                                            <option value="<?= $category['categoryIDPK']; ?>"> 
                                                    <?= $category['categoryName']; ?>
                                            </option>
                                            <?php }?>
                                          </select>
                                          </div>
                                      </div>
                                      <div class="form-group row ">
                                          <label for="providerName" class="control-label col-lg-2">Provider Name</label>
                                          <div class="col-lg-10">
                                              <input class="form-control " id="providerName" name="providerName" type="text" required data-validation-required-message="This field is required" />
                                          </div>
                                      </div>
                                      <div class="form-group row ">
                                          <label for="services" class="control-label col-lg-2">Services</label>
                                          <div class="col-lg-10">
                                              <input class="form-control " id="services" name="services" type="text" required data-validation-required-message="This field is required" />
                                          </div>
                                      </div>
                                      <div class="form-group row ">
                                          <label for="gender" class="control-label col-lg-2">Gender</label>
                                          <div class="col-lg-10">
                                              <input class="form-control " id="gender" name="gender" type="text" required data-validation-required-message="This field is required" />
                                          </div>
                                      </div>
                                      <div class="form-group row ">
                                          <label for="address" class="control-label col-lg-2">Address</label>
                                          <div class="col-lg-10">
                                              <input class="form-control " id="address" name="address" type="text" required data-validation-required-message="This field is required" />
                                          </div>
                                      </div>
                                      <div class="form-group row ">
                                          <label for="areaName" class="control-label col-lg-2">Area Name</label>
                                          <div class="col-lg-10">
                                          <select name="areaIDFK" class="form-control" required data-validation-required-message="This field is required">
                                            <option value=""> Select Area</option>
                                            <?php foreach ($areaData as $area) {?>
                                            <option value="<?= $area['areaIDPK']; ?>"> 
                                                    <?= $area['areaName']; ?>
                                            </option>
                                            <?php }?>
                                          </select>
                                          </div>
                                      </div>
                                      <div class="form-group row ">
                                          <label for="mobileNo" class="control-label col-lg-2">Mobile No</label>
                                          <div class="col-lg-10">
                                              <input class="form-control " id="mobileNo" name="mobileNo" type="text" required data-validation-required-message="This field is required" />
                                          </div>
                                      </div>
                                      <div class="form-group row ">
                                          <label for="email" class="control-label col-lg-2">Email</label>
                                          <div class="col-lg-10">
                                              <input class="form-control " id="email" name="email" type="text" required data-validation-required-message="This field is required" />
                                          </div>
                                      </div>
                                      <div class="form-group row ">
                                          <label for="skill" class="control-label col-lg-2">Skill</label>
                                          <div class="col-lg-10">
                                              <input class="form-control " id="skill" name="skill" type="text" required data-validation-required-message="This field is required" />
                                          </div>
                                      </div>
                                      <div class="form-group row ">
                                          <label for="exprience" class="control-label col-lg-2">Exprience</label>
                                          <div class="col-lg-10">
                                              <input class="form-control " id="exprience" name="exprience" type="text" required data-validation-required-message="This field is required" />
                                          </div>
                                      </div>
                                      <div class="form-group row ">
                                          <label for="costperhour" class="control-label col-lg-2">Cost per hour</label>
                                          <div class="col-lg-10">
                                              <input class="form-control " id="costperhour" name="costperhour" type="text" required data-validation-required-message="This field is required" />
                                          </div>
                                      </div>
                                      <div class="form-group row ">
                                          <label for="rating" class="control-label col-lg-2">Rating</label>
                                          <div class="col-lg-10">
                                              <input class="form-control " id="rating" name="rating" type="text" required data-validation-required-message="This field is required" />
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
                                    <form action="<?php echo base_url(); ?>Admin/updateprovider" enctype="multipart/form-data" method="post">
                                    <input type="hidden" name="providerIDPK" value="<?php echo $providerData['providerIDPK']; ?>">
                                      <div class="form-group row ">
                                          <label for="image" class="control-label col-lg-2">Image</label>
                                          <div class="col-lg-10">
                                              <input class=" form-control" id="image" name="image" value="" type="file" />
                                          </div>
                                      </div>
                                      <div class="form-group row ">
                                          <label for="typeName" class="control-label col-lg-2">Provider_Type Name</label>
                                          <div class="col-lg-10">
                                          <select name="typeIDFK" class="form-control" required data-validation-required-message="This field is required">
                                            <option value=""> Select Provider_Type</option>
                                            <?php foreach ($typeData as $provider_type) {?>
                                            <option value="<?= $provider_type['typeIDPK']; ?>" 
                                                    <?php if ($provider_type['typeIDPK'] == $providerData['typeIDFK']) {echo "Selected";}?>>
                                                    <?= $provider_type['typeName']; ?>
                                            </option>
                                            <?php }?>
                                          </select>
                                          </div>
                                      </div>
                                      <div class="form-group row ">
                                          <label for="categoryName" class="control-label col-lg-2">Category Name</label>
                                          <div class="col-lg-10">
                                          <select name="categoryIDFK" class="form-control" required data-validation-required-message="This field is required">
                                            <option value=""> Select Category</option>
                                            <?php foreach ($categoryData as $category) {?>
                                            <option value="<?= $category['categoryIDPK']; ?>"
                                                    <?php if ($category['categoryIDPK'] == $providerData['categoryIDFK']) {echo "Selected";}?>>
                                                    <?= $category['categoryName']; ?>
                                            </option>
                                            <?php }?>
                                          </select>
                                          </div>
                                      </div>
                                      <div class="form-group row ">
                                          <label for="providerName" class="control-label col-lg-2">Provider Name</label>
                                          <div class="col-lg-10">
                                              <input class="form-control " id="providerName" name="providerName" value="<?php echo $providerData['providerName']; ?>" type="text" required data-validation-required-message="This field is required" />
                                          </div>
                                      </div>
                                      <div class="form-group row ">
                                          <label for="services" class="control-label col-lg-2">Services</label>
                                          <div class="col-lg-10">
                                              <input class="form-control " id="services" name="services" value="<?php echo $providerData['services']; ?>" type="text" required data-validation-required-message="This field is required" />
                                          </div>
                                      </div>
                                      <div class="form-group row ">
                                          <label for="gender" class="control-label col-lg-2">Gender</label>
                                          <div class="col-lg-10">
                                              <input class="form-control " id="gender" name="gender" value="<?php echo $providerData['gender']; ?>" type="text" required data-validation-required-message="This field is required" />
                                          </div>
                                      </div>
                                      <div class="form-group row ">
                                          <label for="address" class="control-label col-lg-2">Address</label>
                                          <div class="col-lg-10">
                                              <input class="form-control " id="address" name="address" value="<?php echo $providerData['address']; ?>" type="text" required data-validation-required-message="This field is required" />
                                          </div>
                                      </div>
                                      <div class="form-group row ">
                                          <label for="areaName" class="control-label col-lg-2">Area Name</label>
                                          <div class="col-lg-10">
                                          <select name="areaIDFK" class="form-control" required data-validation-required-message="This field is required">
                                            <option value=""> Select Area</option>
                                            <?php foreach ($areaData as $area) {?>
                                            <option value="<?= $area['areaIDPK']; ?>"
                                                    <?php if ($area['areaIDPK'] == $providerData['areaIDFK']) {echo "Selected";}?>>
                                                    <?= $area['areaName']; ?>
                                            </option>
                                            <?php }?>
                                          </select>
                                          </div>
                                      </div>
                                      <div class="form-group row ">
                                          <label for="mobileNo" class="control-label col-lg-2">Mobile No</label>
                                          <div class="col-lg-10">
                                              <input class="form-control " id="mobileNo" name="mobileNo" value="<?php echo $providerData['mobileNo']; ?>" type="text" required data-validation-required-message="This field is required" />
                                          </div>
                                      </div>
                                      <div class="form-group row ">
                                          <label for="email" class="control-label col-lg-2">Email</label>
                                          <div class="col-lg-10">
                                              <input class="form-control " id="email" name="email" value="<?php echo $providerData['email']; ?>" type="text" required data-validation-required-message="This field is required" />
                                          </div>
                                      </div>
                                      <div class="form-group row ">
                                          <label for="skill" class="control-label col-lg-2">Skill</label>
                                          <div class="col-lg-10">
                                              <input class="form-control " id="skill" name="skill" value="<?php echo $providerData['skill']; ?>" type="text" required data-validation-required-message="This field is required" />
                                          </div>
                                      </div>
                                      <div class="form-group row ">
                                          <label for="exprience" class="control-label col-lg-2">Exprience</label>
                                          <div class="col-lg-10">
                                              <input class="form-control " id="exprience" name="exprience" value="<?php echo $providerData['exprience']; ?>" type="text" required data-validation-required-message="This field is required" />
                                          </div>
                                      </div>
                                      <div class="form-group row ">
                                          <label for="costperhour" class="control-label col-lg-2">Cost per hour</label>
                                          <div class="col-lg-10">
                                              <input class="form-control " id="costperhour" name="costperhour" value="<?php echo $providerData['costperhour']; ?>" type="text" required data-validation-required-message="This field is required" />
                                          </div>
                                      </div>
                                      <div class="form-group row ">
                                          <label for="rating" class="control-label col-lg-2">Rating</label>
                                          <div class="col-lg-10">
                                              <input class="form-control " id="rating" name="rating" value="<?php echo $providerData['rating']; ?>" type="text" required data-validation-required-message="This field is required" />
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