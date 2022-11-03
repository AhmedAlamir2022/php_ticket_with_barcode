<?php include ('header.php'); ?>

        <div class="page-title">
            <div class="title_left">
                <h3>
					<small>Home /</small> Event Organizer 
                </h3>
            </div>
        </div>
        <div class="clearfix"></div>
 
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2><i class="fa fa-users"></i> Event Organizer Attendance</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li>
							<a href="event_log_print.php" target="_blank" style="background:none;">
							<button class="btn btn-danger"><i class="fa fa-print"></i> Print</button>
							</a>
							</li>
                         <li>
                        </ul>
                        <div class="clearfix"></div>
		<!--- sort -->
						<form method="POST" action="event_log_search.php" class="form-inline">
                                <div class="control-group">
                                    <div class="controls">
                                        <div class="col-md-3">
                                            <input type="date" style="color:black;" value="<?php echo date('Y-m-d'); ?>" name="datefrom" class="form-control has-feedback-left" placeholder="Date From" aria-describedby="inputSuccess2Status4" required />
                                            <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                            <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <div class="controls">
                                        <div class="col-md-3">
                                            <input type="date" style="color:black;" value="<?php echo date('Y-m-d'); ?>" name="dateto" class="form-control has-feedback-left" placeholder="Date To" aria-describedby="inputSuccess2Status4" required />
                                            <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                            <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                                        </div>
                                    </div>
                                </div>
								
								<button type="submit" name="search" class="btn btn-primary btn-outline"><i class="fa fa-calendar-o"></i> Search By Date Log In</button>
								
						</form>
                    </div>
                    <div class="x_content">
                        <!-- content starts here -->

						<div class="table-responsive">
							<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
								
							<thead>
								<tr>
                                    <th style="width:160px;">#</th>
                                    <th style="width:160px;">ID</th>
									<th style="width:160px;">Email</th>
									<th style="width:160px;">Ip</th>
									<th style="width:160px;">Login Time</th>
                                    <th style="width:160px;">Status</th>
								</tr>
							</thead>
							<tbody>
							
							<?php
                                            $sql=mysqli_query($con,"select * from eventlogs ");
                                            $cnt=1;
                                            while($row=mysqli_fetch_array($sql))
                                            {
                                            ?>
							<tr>
                                                <td class="center"><?php echo $cnt;?>.</td>
                                                <td class="hidden-xs"><?php echo $row['uid'];?></td>
                                                <td class="hidden-xs"><?php echo $row['email'];?></td>
                                                <td><?php echo $row['userip'];?></td>
                                                <td><?php echo $row['logintime'];?></td>
                                                <td>
                                                    <?php 
                                                        if($row['status']==1){echo "Success";}
                                                        else{echo "Failed";}
                                                    ?>
                                                </td>
                                            </tr>
							<?php 
                                                $cnt=$cnt+1;
                                             }?>
							</tbody>
							</table>
						</div>
						
                        <!-- content ends here -->
                    </div>
                </div>
            </div>
        </div>

<?php include ('footer.php'); ?>