<?php include 'includes/header.php'; ?>

<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <!-- page start-->
        <div class="row">
            <div class="col-sm-13">
                <section class="card">
                    <header class="card-header">
                        Show Provider
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
                                        <th>Provider Detail</th>
                                        <th>Services</th>
                                        <th>category Name</th>
                                        <th>Address</th>
                                        <th>Mobile No</th>
                                        <th>Email</th>
                                        <th>Skill</th>
                                        <th>exprience</th>
                                        <th>Cost per hour</th>
                                        <th>rating</th>
                                        <th>Action</th>
                                        </tr>
                                </thead>
                                <tbody>
                                    <?php $no=1; foreach($providerData as $provider) { ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><img src="<?= base_url().$provider['image'];?>" height="100" width="100"/></td>
                                            <td>
                                            Name : <?php echo $provider['providerName']; ?><br/> 
                                            Type : <?php echo $provider['typeName']; ?><br/>
                                            Gender : <?php echo $provider['gender']; ?><br/>
                                            </td>
                                            <td><?php echo $provider['services']; ?></td>
                                            <td><?php echo $provider['categoryName']; ?></td>
                                            <td>
                                            Address : <?php echo $provider['address']; ?><br/>
                                            Area : <?php echo $provider['areaName']; ?><br/>
                                            </td>
                                            <td><?php echo $provider['mobileNo']; ?></td>
                                            <td><?php echo $provider['email']; ?></td>
                                            <td><?php echo $provider['skill']; ?></td>
                                            <td><?php echo $provider['exprience']; ?></td>
                                            <td><?php echo $provider['costperhour']; ?></td>
                                            <td><?php echo $provider['rating']; ?></td>
                                            <td>
                                            <a href="<?php echo base_url(); ?>Admin/viewlastphoto/<?php echo $provider['providerIDPK']; ?>"
								            title='Delete User' data-toggle='tooltip'>View Last Photo Service</a><br/>
                                            <a href="<?php echo base_url(); ?>Admin/editprovider/<?php echo $provider['providerIDPK']; ?>"
										    title='Edit User' data-toggle='tooltip'>Edit</a><br/>
								            <a href="<?php echo base_url(); ?>Admin/deleteprovider/<?php echo $provider['providerIDPK']; ?>"
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