<?php include 'includes/header.php'; ?>

<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <!-- page start-->
        <div class="row">
            <div class="col-sm-12">
                <section class="card">
                    <header class="card-header">
                        Show Inquiry
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
                                        <th>Inquiry Name</th>
                                        <th>Email</th>
                                        <th>Mobile No</th>
                                        <th>subject</th>
                                        <th>Message</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no=1; foreach($inqData as $inquiry) { $inquiry['is_read'] = 1; $this->inquiryModel->updateinquiry($inquiry); ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $inquiry['inquiryName']; ?></td>
                                            <td><?php echo $inquiry['email']; ?></td>
                                            <td><?php echo $inquiry['mobileno']; ?></td>
                                            <td><?php echo $inquiry['subject']; ?></td>
                                            <td><?php echo $inquiry['message']; ?></td>
                                            <td>
								            <a href="<?php echo base_url(); ?>Admin/deleteinquiry/<?php echo $inquiry['inquiryIDPK']; ?>"
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