<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from thevectorlab.net/flatlab-4/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 19 Feb 2022 08:54:06 GMT -->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">
    <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <link rel="shortcut icon" href="<?=  ADMIN_ASSETS_PATH;?>img/favicon.html">

    <title>Admin side</title>

    <!-- Bootstrap core CSS -->
    <link href="<?=  ADMIN_ASSETS_PATH;?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?=  ADMIN_ASSETS_PATH;?>css/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="<?=  ADMIN_ASSETS_PATH;?>assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="<?=  ADMIN_ASSETS_PATH;?>assets/fancybox/source/jquery.fancybox.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="<?=  ADMIN_ASSETS_PATH;?>css/gallery.css" />
    <link rel="stylesheet" type="text/css" href="<?=  ADMIN_ASSETS_PATH;?>assets/gritter/css/jquery.gritter.css" />
    <link href="<?=  ADMIN_ASSETS_PATH;?>assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet"
        type="text/css" media="screen" />
    <link rel="stylesheet" href="<?=  ADMIN_ASSETS_PATH;?>css/owl.carousel.css" type="text/css">

    <!--right slidebar-->
    <link href="<?=  ADMIN_ASSETS_PATH;?>css/slidebars.css" rel="stylesheet">

    <!-- Custom styles for this template -->

    <link href="<?=  ADMIN_ASSETS_PATH;?>css/style.css" rel="stylesheet">
    <link href="<?=  ADMIN_ASSETS_PATH;?>css/style-responsive.css" rel="stylesheet" />

</head>

<body class="dark-sidebar-nav">

    <section id="container">
        <!--header start-->
        <header class="header dark-bg">
            <div class="sidebar-toggle-box">
                <i class="fa fa-bars"></i>
            </div>
            <!--logo start-->
            <a href="<?= base_url();?>admin" class="logo">Youthful<span>Handyman</span></a>
            <!--logo end-->
            <div class="nav notify-row" id="top_menu">
                <!--  notification start -->
                <ul class="nav top-menu">
                    <!-- inbox dropdown start-->
                    <?php $readinquiryData = $this->inquiryModel->showreadinquiry();?>
                    <li id="header_inbox_bar" class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <i class="fa fa-envelope-o"></i>
                            <span class="badge badge-danger"><?= count($readinquiryData);?></span>
                        </a>
                        <ul class="dropdown-menu extended inbox">
                            <div class="notify-arrow notify-arrow-red"></div>
                            <li>
                                <p class="red">You have <?= count($readinquiryData);?> New Inquiries</p>
                            </li>
                            <?php foreach($readinquiryData as $readinquiry){ ?>
                            <li>
                                <a href="<?= base_url();?>Admin/showinquiry">
                                    <span class="label label-danger">
                                    <i class="fa fa-bolt"></i></span>
                                    Inquiry Name: <?= $readinquiry['inquiryName']; ?><br>
                                    Subject: <?= $readinquiry['subject']; ?><br>
                                    Message: <?= $readinquiry['message']; ?>
                                </a>
                            </li>
                            <?php } ?>
                            <li>
                                <a href="<?= base_url();?>Admin/showinquiry">See all Inquiries</a>
                            </li>
                        </ul>
                    </li>
                    <!-- inbox dropdown end -->
                    <!-- notification dropdown start-->
                    <?php 
                        $readRequestData = $this->requestModel->showreadrequest($_SESSION['usertype'],$_SESSION['userIDFK']);
                    ?>
                    <li id="header_notification_bar" class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <i class="fa fa-bell-o"></i>
                            <span class="badge badge-warning"><?= count($readRequestData);?></span>
                        </a>
                        <ul class="dropdown-menu extended notification">
                            <div class="notify-arrow notify-arrow-yellow"></div>
                            <li>
                                <p class="yellow">You have <?= count($readRequestData);?> new Requests</p>
                            </li>
                            <?php foreach($readRequestData as $readRequest){ ?>
                            <li>
                                <a href="<?= base_url();?>Admin/showrequest">
                                    <span class="label label-danger">
                                    <i class="fa fa-bolt"></i></span>
                                    <?= $readRequest['providerName']."-".$readRequest['userName'];?>,<br>
                                    <?= $readRequest['categoryName']."-".$readRequest['request'];?>
                                </a>
                            </li>
                            <?php } ?> 
                            <li>
                            <a href="<?= base_url();?>Admin/showrequest">See all Requests</a>
                            </li>
                        </ul>
                    </li>
                    <!-- notification dropdown end -->
                </ul>
                <!--  notification end -->
            </div>
            <div class="top-nav ">
                <!--user info start-->
                <ul class="nav pull-right top-menu">
                    <!-- user login dropdown start-->
                    <li class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle">
                        <h4 class="fa fa-user"> <?= $_SESSION['userName'];?></h4>
                    </a>
                    <ul class="dropdown-menu extended logout dropdown-menu-right">
                        <div class="log-arrow-up"></div>
                        <li><a href="<?=base_url();?>Admin/logout/"><i class="fa fa-key"></i>Log Out</a></li>
                    </ul>
                    </li>
                </ul>
                <!--user info end-->
            </div>
        </header>
        <!--header end-->

        <!--sidebar start-->
        <aside>
            <div id="sidebar" class="nav-collapse">
                <!-- sidebar menu start-->
                <ul class="sidebar-menu" id="nav-accordion">
                    <li>
                        <a class="active" href="<?= base_url();?>admin/index">
                            <i class="fa fa-dashboard"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>

                    <?php if($_SESSION['usertype'] != "provider") { ?>
                    <li class="sub-menu">
                        <a href="javascript:;">
                            <i class="fa fa-users"></i>
                            <span>User</span>
                        </a>
                        <ul class="sub">
                            <li><a href="<?= base_url();?>admin/showUser">Show User</a></li>
                        </ul>
                    </li>
                    <?php } ?>

                    <?php if($_SESSION['usertype'] != "provider") { ?>
                    <li class="sub-menu">
                        <a href="javascript:;">
                            <i class="fa fa-wrench"></i>
                            <span>Provider</span>
                        </a>
                        <ul class="sub">
                            <li><a href="<?= base_url();?>admin/addProvider">Add Provider</a></li>
                            <li><a href="<?= base_url();?>admin/showProvider">Show Provider</a></li>
                        </ul>
                    </li>
                    <?php } ?>

                    <li class="sub-menu">
                        <a href="javascript:;">
                            <i class="fa fa-list-ul"></i>
                            <span>Category</span>
                        </a>
                        <ul class="sub">
                            <?php if($_SESSION['usertype'] != "provider") { ?>
                            <li><a href="<?= base_url();?>admin/addCategory">Add Category</a></li>
                            <?php } ?>
                            <li><a href="<?= base_url();?>admin/showCategory">Show Category</a></li>
                        </ul>
                    </li>

                    <li class="sub-menu">
                        <a href="javascript:;">
                            <i class="fa fa-check-square"></i>
                            <span>Request</span>
                        </a>
                        <ul class="sub">
                            <li><a href="<?= base_url();?>admin/showRequest">Show Request</a></li>
                        </ul>
                    </li>

                    <li class="sub-menu">
                        <a href="javascript:;">
                            <i class="fa fa-solid fa-book"></i>
                            <span>Booking</span>
                        </a>
                        <ul class="sub">
                            <li><a href="<?= base_url();?>admin/showBooking">Show Booking</a></li>
                        </ul>
                    </li>

                    <li class="sub-menu">
                        <a href="javascript:;">
                            <i class="fa fa-camera"></i>
                            <span>Last Photo Services</span>
                        </a>
                        <ul class="sub">
                            <?php if($_SESSION['usertype'] != "admin") { ?>
                            <li><a href="<?= base_url();?>admin/addLastPhoto">Add Last Photo Services</a></li>
                            <?php } ?>
                            <li><a href="<?= base_url();?>admin/showLastPhoto">Show Last Photo Services</a></li>
                        </ul>
                    </li>

                    <li class="sub-menu">
                        <a href="javascript:;">
                            <i class="fa fa-list-alt"></i>
                            <span>Proof</span>
                        </a>
                        <ul class="sub">
                            <?php if($_SESSION['usertype'] != "admin") { ?>
                            <li><a href="<?= base_url();?>admin/addProof">Add Proof</a></li>
                            <?php } ?>
                            <li><a href="<?= base_url();?>admin/showProof">Show Proof</a></li>
                        </ul>
                    </li>

                    <li class="sub-menu">
                        <a href="javascript:;">
                            <i class="fa fa-comments"></i>
                            <span>Inquiry</span>
                        </a>
                        <ul class="sub">
                            <li><a href="<?= base_url();?>admin/showInquiry">Show Inquiry</a></li>
                        </ul>
                    </li>

                    <li class="sub-menu">
                        <a href="javascript:;">
                            <i class="fa fa-edit"></i>
                            <span>Feedback</span>
                        </a>
                        <ul class="sub">
                            <li><a href="<?= base_url();?>admin/showFeedback">Show Feedback</a></li>
                        </ul>
                    </li>
                </ul>
                <!-- sidebar menu end-->
            </div>
        </aside>
</body>

</html>