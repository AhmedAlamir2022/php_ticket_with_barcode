<?php include ('header.php'); ?>

        <div class="page-title">
            <div class="title_left">
                <h3>
					<small>Home / Event Organizers</small> / Event Organizer Profile
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
							<a href="event_organizer.php" style="background:none;">
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
						
									<th>Full Name</th>
									<th>Gender</th>
									<th>Email</th>
									<th>Contact</th>
									<th>Address</th>
									<th>Date Added</th>
								</tr>
							</thead>
							<tbody>
<?php
			   
		if (isset($_GET['id']))
		$id=$_GET['id'];
		$result1 = mysqli_query($con,"SELECT * FROM event_organizer WHERE id='$id'");
		while($row = mysqli_fetch_array($result1)){
		?>
							<tr>
					
								<td><?php echo $row['first_name']." ".$row['middle_name']." ".$row['last_name']; ?></td>
								<td><?php echo $row['gender']; ?></td> 
								<td><?php echo $row['email']; ?></td>
								<td><?php echo $row['contact']; ?></td> 
								<td><?php echo $row['address']; ?></td> 
								<td><?php echo date("M d, Y h:m:s a", strtotime($row['creation_date'])); ?></td>
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