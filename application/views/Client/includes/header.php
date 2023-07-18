<!doctype html>
<html lang="zxx">

<!-- Mirrored from templates.envytheme.com/hacbu/default/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 19 Feb 2022 09:36:09 GMT -->

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap Min CSS -->
    <link rel="stylesheet" href="<?=CLIENT_ASSETS_PATH;?>assets/css/bootstrap.min.css">
    <!-- Owl Theme Default Min CSS -->
    <link rel="stylesheet" href="<?=CLIENT_ASSETS_PATH;?>assets/css/owl.theme.default.min.css">
    <!-- Owl Carousel Min CSS -->
    <link rel="stylesheet" href="<?=CLIENT_ASSETS_PATH;?>assets/css/owl.carousel.min.css">
    <!-- Remixicon CSS -->
    <link rel="stylesheet" href="<?=CLIENT_ASSETS_PATH;?>assets/css/remixicon.css">
    <!-- Flaticon CSS -->
    <link rel="stylesheet" href="<?=CLIENT_ASSETS_PATH;?>assets/css/flaticon.css">
    <!-- Meanmenu Min CSS -->
    <link rel="stylesheet" href="<?=CLIENT_ASSETS_PATH;?>assets/css/meanmenu.min.css">
    <!-- Animate Min CSS -->
    <link rel="stylesheet" href="<?=CLIENT_ASSETS_PATH;?>assets/css/animate.min.css">
    <!-- Magnific Popup Min CSS -->
    <link rel="stylesheet" href="<?=CLIENT_ASSETS_PATH;?>assets/css/magnific-popup.min.css">
    <!-- Odometer Min CSS-->
    <link rel="stylesheet" href="<?=CLIENT_ASSETS_PATH;?>assets/css/odometer.min.css">
    <!-- Slick Min CSS-->
    <link rel="stylesheet" href="<?=CLIENT_ASSETS_PATH;?>assets/css/slick.css">
    <!-- Style CSS -->
    <link rel="stylesheet" href="<?=CLIENT_ASSETS_PATH;?>assets/css/style.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="<?=CLIENT_ASSETS_PATH;?>assets/css/responsive.css">

    <!-- Favicon -->
    <link rel="icon" type="image/jpg" href="<?=CLIENT_ASSETS_PATH;?>assets/images/Handyman logo.jpg">
    <!-- Title -->
    <title>Handyman Services</title>
</head>

<body>
    <!-- Start Preloader Area -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="pl-flip-1 pl-flip-2"></div>
        </div>
    </div>
    <!-- End Preloader Area -->

    <!-- Start Navbar Area -->
    <div class="navbar-area">
        <div class="mobile-responsive-nav">
            <div class="container">
                <div class="mobile-responsive-menu">
                    <div class="logo">
                        <a href="<?=base_url();?>Client/index/">
                            <img src="<?=CLIENT_ASSETS_PATH;?>assets/images/Handyman logo.jpg" alt="logo">
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="desktop-nav">
            <div class="container">
                <nav class="navbar navbar-expand-md navbar-light">
                    <a class="navbar-brand" href="<?=base_url();?>Client/index/">
                        <img src="<?=CLIENT_ASSETS_PATH;?>assets/images/Handyman logo.jpg" height="57px" width="168px"
                            alt="logo">
                    </a>

                    <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                        <ul class="navbar-nav m-auto">
                            <li class="nav-item">
                                <a href="<?=base_url();?>Client/index/" class="nav-link active">
                                    Home
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    Category
                                    <i class="ri-arrow-down-s-line"></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <?php $catData = $this->categoryModel->showCategory();
                                		  foreach($catData as $category) { ?>
                                    <li class="nav-item">
                                        <a class="nav-link"
                                            href="<?=base_url();?>Client/showprovider/<?= $category['categoryIDPK'];?>"><?= $category['categoryName'];?>
                                        </a>
                                    </li>
                                    <?php } ?>
                                </ul>
                            </li>

                            <li class="nav-item">
                                <a href="<?=base_url();?>Client/showContactus/" class="nav-link">Contact</a>
                            </li>

                            <li class="nav-item">
                                <a href="<?=base_url();?>Client/showAboutus/" class="nav-link">About us</a>
                            </li>
                        </ul>
                        <div class="others-options">
                            <ul>
                                <?php if (isset($_SESSION['userID']) && isset($_SESSION['usertype']) && $_SESSION['usertype'] == "client") { ?>
                                <li class="nav-item">
                                    <h4><a href="<?=base_url();?>Client/showProfile" class="nav-link">
                                            <i class="ri-account-circle-line"></i><?= $_SESSION['userName'];?></a></h4>
                                </li>
                                <?php } else { ?>
                                <li class="nav-item">
                                    <h4><a href="<?=base_url();?>Client/showUser/" class="nav-link">
                                            <i class="ri-account-circle-line"></i>Login</a></h4>
                                </li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <!-- End Navbar Area -->