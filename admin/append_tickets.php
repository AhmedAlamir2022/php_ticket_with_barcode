<?php include ('header.php'); 
if(isset($_GET['approve']))
	{
		mysqli_query($con,"update annoncing_tickets set status='2' where image_id ='".$_GET['id']."'");
	}
	if(isset($_GET['return']))
	{
		mysqli_query($con,"update annoncing_tickets set status='0' where image_id ='".$_GET['id']."'");
	}
if(isset($_GET['cancel']))
	{
		mysqli_query($con,"update annoncing_tickets set status='1' where image_id ='".$_GET['id']."'");
	}
	?>

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
							<a href="ticket_print_lost.php" target="_blank" style="background:none;">
							<button class="btn btn-danger pull-right"><i class="fa fa-print"></i> Print Tickets List</button>
							</a>
							
							<br />
							<br />
                    <div class="x_title">
                        <h2><i class="fa fa-ticket"></i> Tickets List</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li>
							<a href="add_ticket.php" style="background:none;">
							<button class="btn btn-primary"><i class="fa fa-plus"></i> Add Ticket</button>
							</a>
							</li>
                            
                        </ul>
                        <div class="clearfix"></div>
							<ul class="nav nav-pills">
								<li role="presentation"><a href="tickets.php">All</a></li>
								<li role="presentation"><a href="lost_tickets.php">Old Tickets</a></li>
								<li role="presentation" class="active"><a href="append_tickets.php">Appending Tickets</a></li>
							</ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <!-- content starts here -->

						<div class="table-responsive">
							<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
								
							<thead>
								<tr>
									<th>Barcode Image</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
							
							<?php
							$result= mysqli_query($con,"select * from annoncing_tickets  ") or die (mysql_error());
							while ($row= mysqli_fetch_array ($result) ){
							?>
							<tr>
								<td>
								<?php if($row['Barcode_image'] != ""): ?>
								<img src="upload/<?php echo $row['Barcode_image']; ?>" width='200px' hight="100px" class="img-thumbnail" >
								<?php else: ?>
								<img src="images/book_image.jpg" class="img-thumbnail" width="75px" height="50px">
								<?php endif; ?>
								</td> 
								
								<td>
									<div class="visible-md visible-lg hidden-sm hidden-xs">
									<?php if($row['status']==0)  
													{ ?>												
														<a href="append_tickets.php?id=<?php echo $row['image_id']?>&approve=update" onClick="return confirm('Are you sure you want to Aprrove?')" class="btn btn-transparent btn-xs tooltips" title="Cancel Appointment" tooltip-placement="top" tooltip="Remove"><button class="btn btn-primary">Confirm And Added</button> </a>
														<a href="append_tickets.php?id=<?php echo $row['image_id']?>&cancel=update" onClick="return confirm('Are you sure you want to Cancel?')"class="btn btn-transparent btn-xs tooltips" title="Cancel Ticket" tooltip-placement="top" tooltip="Remove"><button class="btn btn-danger">Cancel</button> </a>
													<?php }elseif ($row['status']==1) {
														echo "Cancelled";?>
														<a href="append_tickets.php?id=<?php echo $row['image_id']?>&return=update" onClick="return confirm('Are you sure you want to return cancelling?')" class="btn btn-transparent btn-xs tooltips" title="Cancel Appointment" tooltip-placement="top" tooltip="Return"><button class="btn btn-primary">Return Cancelling</button> </a>
													<?php }else{
														echo "Confirmed and Added";?>
														
													<?php } ?>
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