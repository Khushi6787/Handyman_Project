<?php include 'includes/header.php'; ?>

<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <!-- page start-->
        <div class="row">
            <div class="col-sm-12">
                <section class="card">
                    <header class="card-header">
                        Show Feedback
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
                                        <th>#</th>
                                        <th>Comment</th>
                                        <th>Ratings</th>
                                        <th>Provider Name</th>
                                        <th>AddedOn</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no=1; foreach($feedData as $feedback) { ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $feedback['comment']; ?></td>
                                            <td><?php echo $feedback['ratings']; ?></td>
                                            <td><?php echo $feedback['providerName']; ?></td>
                                            <td><?php echo $feedback['addedon']; ?></td>
                                            <td>
								            <a href="<?php echo base_url(); ?>Admin/deletefeedback/<?php echo $feedback['feedbackIDPK']; ?>"
								            title='Delete User' data-toggle='tooltip'>Delete</a></td>
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