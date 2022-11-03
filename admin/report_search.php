<?php include ('header.php'); ?>

        <div class="page-title">
            <div class="title_left">
                <h3>
					<small>Home /</small> Report
                </h3>
            </div>
        </div>
        <div class="clearfix"></div>
 
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2><i class="fa fa-users"></i> Report Lists</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li>
							<a href="report_print.php" target="_blank" style="background:none;">
							<button name="print" type="submit" class="btn btn-danger"><i class="fa fa-print"></i> Print</button>
							</a>
							</li>
                            
                        </ul>
						
                        <div class="clearfix"></div>
						
						<form method="POST" class="form-inline">
						
                                <div class="control-group">
                                    <div class="controls">
                                        <div class="col-md-3">
                                            <input type="date" style="color:black;" value="<?php echo (isset($_POST['datefrom'])) ? $_POST['datefrom']: ''; ?>" name="datefrom" class="form-control has-feedback-left" placeholder="Date From" aria-describedby="inputSuccess2Status4">
                                            <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                            <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <div class="controls">
                                        <div class="col-md-3">
                                            <input type="date" style="color:black;" value="<?php echo (isset($_POST['dateto'])) ? $_POST['dateto']: ''; ?>" name="dateto" class="form-control has-feedback-left" placeholder="Date To" aria-describedby="inputSuccess2Status4">
                                            <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                            <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                                        </div>
                                    </div>
                                </div>
                                
								
								<button type="submit" name="search" class="btn btn-primary btn-outline"><i class="fa fa-calendar-o"></i> Search By Date Log In</button>
								
						</form>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <!-- content starts here -->

						<div class="table-responsive">
							<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
								
						
							<thead>
								<tr>
    <?php
    	$_SESSION['datefrom'] = $_POST['datefrom'];
    	$_SESSION['dateto'] = $_POST['dateto'];
    ?>
									<th>Ticket Bracode</th>
                                    <th>Title</th>
                                    <th>Event</th>
                                    <th>Price</th>
                                    <th>Status</th>
                                    <th>Added Date</th>
								</tr>
							</thead>
							<tbody>
							<?php
    	
							$result= mysqli_query($con,"select * from tickets where added_date BETWEEN '".$_POST['datefrom']." 00:00:01' and '".$_POST['dateto']." 23:59:59' order by ticket_id DESC ") or die (mysqli_error($con));
							
							while ($row= mysqli_fetch_array ($result) ){
                            
                            ?>
                            <tr>
                                <td><?php echo "<img src='../bracode/userQr/".$row['ticket_image']."'/>";?></td>
                                <td><?php echo $row['ticket_title']; ?></td>
                                <td><?php echo $row['event']; ?></td>
                                <td><?php echo $row['ticket_price']; ?></td> 
                                <td><?php echo $row['status']; ?></td> 
                                <td><?php echo date("M d, Y h:m:s a",strtotime($row['added_date'])); ?></td>
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