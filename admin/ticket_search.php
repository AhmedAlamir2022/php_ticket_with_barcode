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
							<a href="ticket_print.php" target="_blank" style="background:none;">
							<button class="btn btn-danger pull-right"><i class="fa fa-print"></i> Print tickets List</button>
							</a>
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
							</ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <!-- content starts here -->
                        <div class="row">
                        	
                        		<form method="post" action="">
                        			<div class="col-md-4">
                                        <select name="ticket_title" class="select2_single form-control" required="required" tabindex="-1" >
										<option value="0">Select Title</option>
										<?php
										$result= mysqli_query($con,"select distinct ticket_title from tickets") or die (mysqli_error($con));
										while ($row= mysqli_fetch_array ($result) ){
										$id=$row['ticket_id'];
										?>
                                            <option value="<?php echo $row['ticket_title']; ?>"><?php echo $row['ticket_title']; ?></option>
										<?php } ?>
                                        </select>  
                                    </div>
							
										<button name="submit" type="submit" class="btn btn-primary" style=""><i class="glyphicon glyphicon-log-in"></i> Submit</button>
								</form>
                        	
                        </div>
                        
						<?php
                        $ticket_title = $_POST['ticket_title'];
                    	$result= mysqli_query($con,"SELECT COUNT(ticket_id) AS total from tickets where ticket_title='$ticket_title' ") OR die (mysqli_error($con));
                    	$row=mysqli_fetch_assoc($result);
                    	$count=$row['total'];
                    	echo "<span style='color:red;font-size:16px;font-weight:bold;Times New Roman, Times, serif';>Total Numbers of Tickets is = ".$count."</span";
                        ?>
                        <br><br><br>


                        <!-- Showing Search Result of books -->
                        <div class="table-responsive">
							<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
								
							<thead>
								<tr>
									<th>Barcode</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
<?php 
								$_SESSION['ticket_title'] = $_POST['ticket_title'];
?>
								
							
							<?php
									
							$result= mysqli_query($con,"SELECT * from tickets where ticket_title='$ticket_title'  order by ticket_id DESC ") OR die (mysqli_error($con));
						

							while ($row= mysqli_fetch_array ($result) ){
							$id=$row['ticket_id'];
							?>
							<tr>
								<td><?php echo "<img src='../bracode/userQr/".$row['ticket_image']."'/>";?></td>
								<td>
									<a class="btn btn-primary" for="ViewAdmin" href="view_ticket.php<?php echo '?ticket_id='.$row['ticket_id']; ?>">
										<i class="fa fa-search"></i>
									</a>
									
									
									<a class="btn btn-danger" for="DeleteAdmin" href="#delete<?php echo $id;?>" data-toggle="modal" data-target="#delete<?php echo $id;?>">
										<i class="glyphicon glyphicon-trash icon-white"></i>
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