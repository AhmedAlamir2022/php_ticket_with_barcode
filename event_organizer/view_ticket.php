<?php include ('header.php'); ?>

        <div class="page-title">
            <div class="title_left">
                <h3>
					<small>Home / Tickets</small> / View Individual
                </h3>
            </div>
        </div>
        <div class="clearfix"></div>
 
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2><i class="fa fa-info"></i> Individual Information</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li>
							<a href="tickets.php" style="background:none;">
							<button class="btn btn-primary"><i class="fa fa-arrow-left"></i> Back</button>
							</a>
							</li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <!-- content starts here -->

						<div class="table-responsive">
							<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered">
								
							<thead>
								<tr>
									<th>Barcode</th>
									<th>User Email</th>
									<th>Title</th>
									<th>Event</th>
									<th>Price</th>
									<th>Status</th>
									<th>Seat Number</th>
									<th>Date</th>
									<th>Time</th>
									<th>Full Address</th>
									<th>Details</th>
								</tr>
							</thead>
							<tbody>
<?php 
			   
		if (isset($_GET['ticket_id']))
		$id=$_GET['ticket_id'];
	$result1 = mysqli_query($con,"SELECT events.title,tickets.*  from tickets join events on events.event_id=tickets.event where ticket_id='$id'");
		while($row = mysqli_fetch_array($result1)){
		?>
							<tr>
								<td><?php echo "<img src='../bracode/userQr/".$row['ticket_image']."'/>";?></td>
								<td><?php echo $row['username'];?></td>
								<td><?php echo $row['ticket_title']; ?></td>
								<td><?php echo $row['title']; ?></td>
								<td><?php echo $row['ticket_price']; ?></td>
								<td><?php echo $row['status']; ?></td> 
								<td><?php echo $row['seat_num']; ?></td>
								<td><?php echo $row['start_date']; ?></td>
								<td><?php echo $row['time11']; ?></td>
								<td><?php echo $row['address']; ?></td> 
								<td><?php echo $row['description']; ?></td> 
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