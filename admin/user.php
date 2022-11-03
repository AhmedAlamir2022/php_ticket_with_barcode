<?php include ('header.php');
?>

        <div class="page-title">
            <div class="title_left">
                <h3>
					<small>Home /</small> User Profile
                </h3>
                <?php 
                 if(isset($_GET['del'])){
                    include('include/dbcon.php');
                    $get_id=$_GET['del'];
                    mysqli_query($con,"delete from user where user_id = '$get_id' ")or die(mysqli_error($con));   
                    }?>
            </div>
        </div>
        <div class="clearfix"></div>
 
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                	<a href="user_print.php" target="_blank" style="background:none;">
                            <button class="btn btn-danger pull-right"><i class="fa fa-print"></i> Print All Users List</button>
                            </a>
                    <div class="x_title">
                        <h2><i class="fa fa-info"></i> User Information</h2>
                        
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <!-- content starts here -->

						<div class="table-responsive">
							<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
								
							<thead>
								<tr>
									<th>Full Name</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
							
							<?php
							$result= mysqli_query($con,"select * from user order by user_id ASC") or die (mysqli_error($con));
							while ($row= mysqli_fetch_array ($result) ){
							?>
							<tr>
								<td><?php echo $row['fullname'];?></td>
								<td>
									<a class="btn btn-primary" for="ViewAdmin" href="view_user.php<?php echo '?user_id='.$row['user_id']; ?>">
										<i class="fa fa-search"></i>
									</a>
									<a class="btn btn-danger" for="DeleteAdmin" href="#delete<?php echo $row['user_id'];?>" data-toggle="modal" data-target="#delete<?php echo $row['user_id'];?>"><i class="glyphicon glyphicon-trash icon-white"></i></a>
                                    <!-- delete modal user -->
                                    <div class="modal fade" id="delete<?php  echo $row['user_id'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="myModalLabel"><i class="glyphicon glyphicon-user"></i> Admin</h4>
                                                </div>
                                                 <div class="modal-body">
                                                    <div class="alert alert-danger">
                                                        Are you sure you want to delete this event organizer?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button class="btn btn-inverse" data-dismiss="modal" aria-hidden="true"><i class="glyphicon glyphicon-remove icon-white"></i> No</button>
                                                        <a href="user.php?del=<?php echo $row['user_id']; ?>" style="margin-bottom:5px;" class="btn btn-primary"><i class="glyphicon glyphicon-ok icon-white"></i> Yes</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
								</td> 
							</tr>
							<?php } ?>
							</tbody>
							</table>
						</div>
						
                        <!-- content ends here -->
                    </div>
                </div>
            </div>
        </div>

<?php include ('footer.php'); ?>