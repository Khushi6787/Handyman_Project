<?php include 'includes/header.php'; ?>

<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <!-- page start-->
        <div class="row">
            <div class="col-sm-12">
                <section class="card">
                    <header class="card-header">
                        Show Proof
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
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no=1; foreach($proofData as $proof) { ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><img src="<?= base_url().$proof['image'];?>" height="100" width="100"/></td>
                                            <td>
                                            <a href="<?php echo base_url().$proof['image']; ?>"
								            title='Download User' target="_blank" download data-toggle='tooltip'>Download</a><br/>
                                            <a href="<?php echo base_url(); ?>Admin/deleteproof/<?php echo $proof['proofIDPK']; ?>"
								            title='Delete User' data-toggle='tooltip'>Delete</a><br/>
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