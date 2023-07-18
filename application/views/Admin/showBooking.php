<?php include 'includes/header.php'; ?>

<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <!-- page start-->
        <div class="row">
            <div class="col-sm-12">
                <section class="card">
                    <header class="card-header">
                        Show Booking
                        <span class="tools pull-right">
                            <a href="javascript:;" class="fa fa-chevron-down"></a>
                            <a href="javascript:;" class="fa fa-times"></a>
                        </span>
                    </header>
                    <div class="card-body">
                        <div class="adv-table">
                            <table class="display table table-bordered table-striped" id="dynamic-table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Request</th>
                                        <th>Status</th>
                                        <th>Date</th>
                                        <th>Time</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no=1; foreach($bookingData as $booking) { ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $booking['requestName']; ?></td>
                                            <td><?php if ($booking['status']=="0") { 
                                                echo "Booked";
                                            }else if ($booking['status']=="1") { 
                                                echo "Completed";
                                            }?></td>
                                            <td><?php echo $booking['date']; ?></td>
                                            <td><?php echo $booking['time']; ?></td>
                                            <td>
                                            <a href="<?php echo base_url(); ?>Admin/deletebooking/<?php echo $booking['bookingIDPK']; ?>"
								            title='Delete' data-toggle='tooltip'>Delete</a><br/>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
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