<?php include ('header.php'); ?>

        <div class="page-title">
            <div class="title_left">
                <h3>
					<small>Home /</small> Tickets
                </h3>
            </div>
        </div>
        <div class="clearfix"></div>
 
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
							<a href="print_barcode_ticket.php" target="_blank" style="background:none;">
							<button class="btn btn-danger pull-right"><i class="fa fa-print"></i> Print Tickets Barcode</button>
							</a>
							<br />
							<br />
                    <div class="x_title">
                        <h2><i class="fa fa-book"></i> Tickets List</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li>
							<a href="add_ticket.php" style="background:none;">
							<button class="btn btn-primary"><i class="fa fa-plus"></i> Add Ticket</button>
							</a>
							</li>
                        </ul>
                        <div class="clearfix"></div>
							<ul class="nav nav-pills">
								<li role="presentation" class="active"><a href="tickets.php">My Tickets</a></li>
								<li role="presentation" ><a href="all_tickets.php">All</a></li>
								<li role="presentation"><a href="lost_tickets.php">Pending Tickets</a></li>
							</ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <!-- content starts here -->
                        <br><br><br>


                        <!-- Showing Search Result of books -->
                        <div class="table-responsive">
							<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
								
							<thead>
								<tr>
									<th>Barcode</th>
									<th>Ticket Name</th>
									<th>Remark</th>
									<th>Added Time</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								
							
							<?php
									
							$result= mysqli_query($con,"SELECT * from tickets where ev_or_id='".$_SESSION['id']."' order by added_date desc ") OR die (mysqli_error($con));
						

							while ($row= mysqli_fetch_array ($result) ){
							$id=$row['ticket_id'];
							?>
							<tr>
								<td><?php echo "<img src='../bracode/userQr/".$row['ticket_image']."'/>";?></td>
								<td><?php echo $row['ticket_title']; ?></td>
								<td><?php echo $row['remark']; ?></td>
								<td><?php echo $row['added_date']; ?></td>
								<td>
									<a class="btn btn-primary" for="ViewAdmin" href="view_ticket.php<?php echo '?ticket_id='.$row['ticket_id']; ?>">
										View
									</a>
								
									
									<a class="btn btn-danger" for="DeleteAdmin" href="#delete<?php echo $id;?>" data-toggle="modal" data-target="#delete<?php echo $id;?>">
										Delete
									</a>
									
			
									<!-- delete modal user -->
									<div class="modal fade" id="delete<?php  echo $row['ticket_id'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
									<div class="modal-dialog">
										<div class="modal-content">
										<div class="modal-header">
											<h4 class="modal-title" id="myModalLabel"><i class="glyphicon glyphicon-user"></i> Admin</h4>
										</div>
										<div class="modal-body">
												<div class="alert alert-danger">
													Are you sure you want to delete?
												</div>
												<div class="modal-footer">
												<button class="btn btn-inverse" data-dismiss="modal" aria-hidden="true"><i class="glyphicon glyphicon-remove icon-white"></i> No</button>
												<a href="delete_ticket.php<?php echo '?ticket_id='.$row['ticket_id']; ?>" style="margin-bottom:5px;" class="btn btn-primary"><i class="glyphicon glyphicon-ok icon-white"></i> Yes</a>
												</div>
										</div>
										</div>
									</div>
									</div>

									<a class="btn btn-info" for="Add New Image" href="change-image.php<?php echo '?ticket_id='.$row['ticket_id']; ?>">
										Change Image
									</a>
								</td> 
							</tr>
							<?php  }?>
							</tbody>
							</table>
						</div>
						
                        <!-- books end -->

						
                        <!-- content ends here -->
                    </div>
                </div>
            </div>
        </div>

<?php include ('footer.php'); ?>