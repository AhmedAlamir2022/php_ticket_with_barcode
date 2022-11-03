<?php include ('header.php'); ?>
        <div class="clearfix"></div>
		
                <!-- top tiles -->
                <div class="row tile_count" style="margin-right:-245px;">
					<div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count">
                        <div class="left"></div>
                        <div class="right">
							<?php
							$result = mysqli_query($con,"SELECT id FROM event_organizer");
							$num_rows = mysqli_num_rows($result);
							?>
							
                            <span class="count_top"><i class="fa fa-male"></i> <i class="fa fa-female"></i> Event Organizers</span>
							
                            <div class="count green"><?php echo $num_rows; ?></div>
							<span class="count_bottom">Total of Members</span>							
                        </div>
                    </div>
					<div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count">
                        <div class="left"></div>
                        <div class="right">
							<?php
							$result = mysqli_query($con,"SELECT ticket_id FROM tickets");
							$num_rows = mysqli_num_rows($result);
							?>
				
                            <span class="count_top"><i class="fa fa-ticket"></i> tickets</span>
				
                            <div class="count green"><?php echo $num_rows; ?></div>
							 <span class="count_bottom ">Total of tickets</span>                     
					  </div>
                    </div>
					<div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count">
                        <div class="left"></div>
                        <div class="right">
							<?php
							$result = mysqli_query($con,"SELECT * FROM user");
							$num_rows = mysqli_num_rows($result);
							?>

                            <span class="count_top"><i class="fa fa-male"></i> <i class="fa fa-female"></i> Users</span>

                            <div class="count green"><?php echo $num_rows; ?></div>
							 <span class="count_bottom ">Total of Users</span>
                        </div>
                    </div>
					<div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count">
                      <div class="left"></div>
                        <div class="right">
							<?php
							$result = mysqli_query($con,"SELECT * FROM events");
							$num_rows = mysqli_num_rows($result);
							?>

                            <span class="count_top"><i class="fa fa-book"></i> Events</span>

                            <div class="count green"><?php echo $num_rows; ?></div>
							 <span class="count_bottom ">Total of Events</span>							
                        </div>
                    </div>

                </div>
                <!-- /top tiles -->
				
				

<?php include('slide.php'); ?>
<?php include ('footer.php'); ?>