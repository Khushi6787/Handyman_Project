    <!-- js placed at the end of the document so the pages load faster -->
    <script src="<?= ADMIN_ASSETS_PATH;?>js/jquery.js"></script>
    <script src="<?= ADMIN_ASSETS_PATH;?>js/bootstrap.bundle.min.js"></script>
    <script class="include" type="text/javascript" src="<?= ADMIN_ASSETS_PATH;?>js/jquery.dcjqaccordion.2.7.js">
    </script>
    <script src="<?= ADMIN_ASSETS_PATH;?>assets/fancybox/source/jquery.fancybox.js"></script>
    <script src="<?= ADMIN_ASSETS_PATH;?>js/jquery.scrollTo.min.js"></script>
    <script src="<?= ADMIN_ASSETS_PATH;?>js/jquery.nicescroll.js" type="text/javascript"></script>
    <script type="text/javascript" src="<?= ADMIN_ASSETS_PATH;?>assets/gritter/js/jquery.gritter.js"></script>
    <script src="<?= ADMIN_ASSETS_PATH;?>js/jquery.sparkline.js" type="text/javascript"></script>
    <script src="<?= ADMIN_ASSETS_PATH;?>assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script>
    <script src="<?= ADMIN_ASSETS_PATH;?>js/owl.carousel.js"></script>
    <script src="<?= ADMIN_ASSETS_PATH;?>js/jquery.customSelect.min.js"></script>
    <script type="text/javascript" src="<?= ADMIN_ASSETS_PATH;?>js/jquery.validate.min.js"></script>
    <script type="text/javascript" language="javascript"
        src="<?= ADMIN_ASSETS_PATH;?>assets/advanced-datatable/media/js/jquery.dataTables.js"></script>
    <script type="text/javascript" src="<?= ADMIN_ASSETS_PATH;?>assets/data-tables/DT_bootstrap.js"></script>
    <script src="<?= ADMIN_ASSETS_PATH;?>js/respond.min.js"></script>
    <script type="text/javascript" src="<?= ADMIN_ASSETS_PATH;?>js/jquery.pulsate.min.js"></script>
    <script src="<?= ADMIN_ASSETS_PATH;?>js/modernizr.custom.js"></script>
    <script src="<?= ADMIN_ASSETS_PATH;?>js/toucheffects.js"></script>

    <!--right slidebar-->
    <script src="<?= ADMIN_ASSETS_PATH;?>js/slidebars.min.js"></script>
    <script src="<?= ADMIN_ASSETS_PATH;?>js/dynamic_table_init.js"></script>
    <!--common script for all pages-->
    <script src="<?= ADMIN_ASSETS_PATH;?>js/common-scripts.js"></script>

    <!--script for this page-->
    <script src="<?= ADMIN_ASSETS_PATH;?>js/sparkline-chart.js"></script>
    <script src="<?= ADMIN_ASSETS_PATH;?>js/easy-pie-chart.js"></script>
    <!-- <script src="<?= ADMIN_ASSETS_PATH;?>js/count.js"></script> -->
    <script src="<?= ADMIN_ASSETS_PATH;?>js/form-validation-script.js"></script>
    <script src="<?= ADMIN_ASSETS_PATH;?>js/gritter.js" type="text/javascript"></script>
    <script src="<?= ADMIN_ASSETS_PATH;?>js/pulstate.js" type="text/javascript"></script>

    <script>
//owl carousel

$(document).ready(function() {
    $("#owl-demo").owlCarousel({
        navigation: true,
        slideSpeed: 300,
        paginationSpeed: 400,
        singleItem: true,
        autoPlay: true

    });
    // $('#dynamic-table').dataTable({
    //     "aaSorting": [
    //         [1, "asc"]
    //     ]
    // });
});

//custom select box

$(function() {
    $('select.styled').customSelect();
});

$(function() {
        //    fancybox
          jQuery(".fancybox").fancybox();
      });

$(window).on("resize", function() {
    var owl = $("#owl-demo").data("owlCarousel");
   // owl.reinit();
});
    </script>