<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">
    <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <link rel="shortcut icon" href="<?= ADMIN_ASSETS_PATH;?>img/favicon.png">

    <title>Admin Login</title>

    <!-- Bootstrap core CSS -->
    <link href="<?= ADMIN_ASSETS_PATH;?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= ADMIN_ASSETS_PATH;?>css/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="<?= ADMIN_ASSETS_PATH;?>assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="<?= ADMIN_ASSETS_PATH;?>css/style.css" rel="stylesheet">
    <link href="<?= ADMIN_ASSETS_PATH;?>css/style-responsive.css" rel="stylesheet" />


</head>

  <body class="login-body">

    <div class="container">

      <form class="form-signin" method="post" action="<?=base_url();?>Admin/login">
        <h2 class="form-signin-heading">sign in now</h2>
        <div class="login-wrap">
            <input class="form-control" id="email" type="text" placeholder="Email" name="email">
            <input class="form-control" id="password" type="password" placeholder="Password" name="password">
            <button class="btn btn-lg btn-login btn-block" type="submit">Sign in</button>
            <?php if(isset($invalid)){
              if($invalid != null) { ?>
              <div class = ""><span style = "color:red;">
                    <b>*<?php echo $invalid; ?></b></span>
              </div>
            <?php } } ?>
        </div>

        </form>

    </div>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="<?= ADMIN_ASSETS_PATH;?>js/jquery.js"></script>
    <script src="<?= ADMIN_ASSETS_PATH;?>js/bootstrap.bundle.min.js"></script>

  </body>
</html>
