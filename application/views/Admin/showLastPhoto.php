<?php include 'includes/header.php'; ?>

<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <!-- page start-->
        <div class="row">
            <div class="col-sm-12">
                <section class="card">
                    <header class="card-header">
                        Show Last Photo Services
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
                                        <th>Provider Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no=1; foreach($lpData as $LastPhoto) { ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><img src="<?= base_url().$LastPhoto['image'];?>" height="100" width="100"/></td>
                                            <td><?php echo $LastPhoto['providerName']; ?></td>
                                            <td>
                                            <a href="<?php echo base_url(); ?>Admin/deletelastphoto/<?php echo $LastPhoto['lastphotoIDPK']; ?>"
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