<?php include 'includes/header.php'; ?>

<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <!-- page start-->
        <div class="row">
            <div class="col-sm-12">
                <section class="card">
                    <header class="card-header">
                        Show Request
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
                                        <th>Request</th>
                                        <th>Status</th>
                                        <th>AddedBy</th>
                                        <th>Payment</th>
                                        <th>Estimate</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no=1; foreach($reqData as $request) { if($_SESSION['usertype'] == "admin"){ $request['is_read_admin'] = 1; }else{ $request['is_read_provider'] = 1;} $this->requestModel->updaterequest($request); ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $request['request']; ?></td>
                                            
                                            <td>
                                            <?php if ($request['status']=="0") { 
                                                echo "Requested";
                                            }else if ($request['status']=="2"){ echo "Price Accepted";
                                            }else if ($request['status']=="3"){ echo "Price Rejected";
                                            }else if ($request['status']=="4"){ echo "Booked";
                                            }else if ($request['status']=="1"){ echo "Estimated";
                                            }else if ($request['status']=="5"){ echo "Completed";
                                            }?></td>
                                            <td><?php echo $request['userName']; ?></td>
                                            <td><?php echo $request['payment']; ?></td>
                                            <td><?php echo $request['estimate']; ?></td>
                                            <td>
								            <a href="<?php echo base_url(); ?>Admin/deleterequest/<?php echo $request['requestIDPK']; ?>"
								            title='Delete User' data-toggle='tooltip'>Delete</a><br/>
                                            <?php if($request['status']=="0" || $request['status']=="3"){?>
                                                <a href="#" data-toggle="modal" data-target="#update_bootstrap<?php echo $request['requestIDPK']; ?>" class="icon-android-create">Estimate Price</a>
                                            <br />
                                            <?php } ?>
                                            <?php if($request['status']=="2"){?>
                                            <a href="#" data-toggle="modal" data-target="#book_bootstrap<?php echo $request['requestIDPK']; ?>" class="icon-android-create">Book Request</a>
                                            <?php } ?>
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
        
<?php foreach($reqData as $request) { ?>
<!-- Modal -->
<form action="<?php echo base_url(); ?>Admin/update_service_request_price/<?php echo $request['requestIDPK']; ?>" method="post">
<div class="modal fade" id="update_bootstrap<?php echo $request['requestIDPK']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Estimate Price</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            
            <div class="form-group row ">
                <label for="estimate" class="control-label col-lg-2">Price:</label>
                <div class="col-lg-10">
                    <input class="form-control " id="estimate" name="estimate" type="text">
                </div>
            </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </div>
    </div>
</div>
</form>
<!-- Modal -->
 
<form action="<?php echo base_url(); ?>Admin/update_service_request_status/<?php echo $request['requestIDPK']; ?>" method="post">
<div class="modal fade" id="book_bootstrap<?php echo $request['requestIDPK']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Booking</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <div class="form-group row ">
                <label for="date" class="control-label col-lg-2">Date:</label>
                <div class="col-lg-10">
                    <input class="form-control" id="date" name="date" type="date">
                </div>
            </div>
            <div class="form-group row ">
                <label for="time" class="control-label col-lg-2">Time:</label>
                <div class="col-lg-10">
                    <input class="form-control" id="time" name="time" type="time">
                </div>
            </div>
            </div>
            <div class="modal-footer">
            <input type="hidden" name="userName" value="<?= $request['request'];?>"/>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">submit</button>
            </div>
        </div>
    </div>
</div>
</form>
<?php } ?>
</section>
</section>
<!--main content end-->



<?php include 'includes/footer.php'; ?>