<?php include 'includes/header.php'; ?>
<br>
<br>
<br>
<br>
<!-- Start Page Title Area -->
<div class="page-title-area bg-5">
    <div class="container">
        <div class="page-title-content">
            <h2>Provider details</h2>
            <ul>
                <li>
                    <a href="<?=base_url();?>Client/index/">
                        Home
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- End Page Title Area -->
<!-- Start Services Details Area -->
<section class="services-details-area ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="services-details-content main-default-content mr-15">
                    <div class="project-details-img">
                        <img src="<?=base_url().$providerData['image'];?>" alt="provider">
                        <a href="<?=base_url();?>Client/showproviderdetails/"></a>
                    </div>

                    <div class="gap-20"></div>
                    <h2>Name: <?= $providerData['providerName'];?></h2>

                    <h3>Email: <?= $providerData['email'];?></h3>
                    <h3>Skill: <?= $providerData['skill'];?></h3><br>

                    <ul>
                        <li>
                            <i class="ri-checkbox-circle-fill"></i>
                            Address: <?= $providerData['address'];?>
                        </li>
                        <li>
                            <i class="ri-checkbox-circle-fill"></i>
                            mobile No: <?= $providerData['mobileNo'];?>
                        </li>
                        <li>
                            <i class="ri-checkbox-circle-fill"></i>
                            Gender: <?= $providerData['gender'];?>
                        </li>
                        <li>
                            <i class="ri-checkbox-circle-fill"></i>
                            Rating: <?= $providerData['rating'];?>
                        </li>

                        <li>
                            <i class="ri-checkbox-circle-fill"></i>
                            Experience: <?= $providerData['exprience'];?>
                        </li>
                        <li>
                            <i class="ri-checkbox-circle-fill"></i>
                            Cost Per Hour: <?= $providerData['costperhour'];?>
                        </li>
                        <li>
                            <i class="ri-checkbox-circle-fill"></i>
                            Provider Type: <?= $providerData['typeName'];?>
                        </li>


                    </ul>
                    <br>
                    <br>
                    <br>
                    <br>
                    <!-- Start Our Project Area -->
                    <section class="our-project-area">
                        <div class="container">
                            <div class="section-title">
                                <h2>Last Service Photo</h2>
                            </div>

                            <div class="project-slider owl-carousel owl-theme">
                                <?php $lpData = $this->lastphotoModel->showlastphotobyprovider($providerData['providerIDPK']);
					foreach($lpData as $lastphoto) { ?>
                                <div class="single-project">
                                    <img src="<?=base_url().$lastphoto['image'];?>" width="500px" height="500px"
                                        alt="lastphoto">

                                    <div class="project-content">
                                        <h3>
                                            <a
                                                href="<?=base_url();?>Client/showlastphoto/<?= $lastphoto['lastphotoIDPK'];?>"></a>
                                        </h3>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </section>
                    <!-- End Our Project Area -->
                    <br>
                    <br>
                    <br>
                    <!-- Start Our Project Area -->
                    <section class="our-project-area">
                        <div class="container">
                            <div class="section-title">
                                <h2>Service Proof</h2>
                            </div>
                            <div class="project-slider owl-carousel owl-theme">
                                <?php $proofData = $this->proofModel->showproofbyprovider($providerData['providerIDPK']);
					foreach($proofData as $proof) { ?>

                                <div class="single-project">
                                    <img src="<?=base_url().$proof['image'];?>" width="500px" height="500px"
                                        alt="proof">

                                    <div class="project-content">
                                        <h3>
                                            <a href="<?=base_url();?>Client/proof/<?= $proof['proofIDPK'];?>"></a>
                                        </h3>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </section>
                    <!-- End Our Project Area -->
                </div>
            </div>

            <div class="col-lg-4">
                <div class="services-sidebar ml-15">
                    <h3>Categorys</h3>
                    <ul class="submenu">
                        <?php $catData = $this->categoryModel->showCategory();
                            foreach($catData as $category) { ?>
                        <li class="nav-item">
                            <a class="nav-link"
                                href="<?=base_url();?>Client/showprovider/<?= $category['categoryIDPK'];?>"><?= $category['categoryName'];?>
                            </a>
                        </li>
                        <?php } ?>
                    </ul>
                </div>

                <form action="<?php echo base_url(); ?>Client/insertbooking" method="post"
                    class="book-appointment ml-15">
                    <h3>Book an appointment</h3>
                    <input type="hidden" name="userID"
                        value="<?= isset($_SESSION['userID']) ? $_SESSION['userID'] : ""?>" />
                    <input type="hidden" name="providerID" value="<?= $providerData['providerIDPK']?>" />
                    <input type="hidden" name="providerName" value="<?= $providerData['providerName']?>" />
                    <input type="hidden" name="categoryID" value="<?= $providerData['categoryIDFK']?>" />
                    <input type="hidden" name="categoryName" value="<?= $providerData['categoryName']?>" />

                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <input class="form-control" type="text" name="userName" placeholder="Name"
                                    value="<?= isset($_SESSION['userName']) ? $_SESSION['userName'] : ""?>">
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <input class="form-control" type="email" name="email" placeholder="Email"
                                    value="<?= isset($_SESSION['email']) ? $_SESSION['email'] : "" ?>">
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group row ">
                                <label for="areaName" class="control-label col-lg-2"></label>
                                <div class="col-lg-12">
                                    <select name="areaIDFK" class="form-control">
                                        <option value=""> Select Area</option>
                                        <?php foreach ($areaData as $area) {?>
                                        <option value="<?= $area['areaIDPK']; ?>">
                                            <?= $area['areaName']; ?>
                                        </option>
                                        <?php }?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <input class="form-control" type="text" name="service" placeholder="Service">
                            </div>
                        </div>

                        <div class="col-12">
                            <button type="submit" class="default-btn">
                                Send Request
                            </button>
                        </div>
                    </div>
                </form>

                <form action="<?php echo base_url(); ?>Client/insertfeedback" method="post"
                    class="book-appointment ml-15">
                    <h3>Feedback</h3>
                    <input type="hidden" name="providerID" value="<?= $providerData['providerIDPK']?>" />
                    <input type="hidden" name="providerName" value="<?= $providerData['providerName']?>" />

                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <input type="text" placeholder="Ratings" name="ratings" class="form-control">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <textarea name="comment" placeholder="Comment" cols="30" rows="8"
                                    class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="default-btn">
                                Submit Feedback
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- End Services Details Area -->

<?php include 'includes/footer.php'; ?>