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
							
							<br />
                    <div class="x_title">
                        <h2><i class="fa fa-ticket"></i> Ticket List</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li>
							<a href="add_ticket.php" style="background:none;">
							<button class="btn btn-primary"><i class="fa fa-plus"></i> Add ticket</button>
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
                        	
                        		<form method="post" action="ticket_search.php">
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
                        <br>

						
                        <!-- books end -->

						
                        <!-- content ends here -->
                    </div>
                </div>
            </div>
        </div>

<?php include ('footer.php'); ?>