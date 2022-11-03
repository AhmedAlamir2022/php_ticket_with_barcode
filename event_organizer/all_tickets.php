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
								<li role="presentation"><a href="tickets.php">My Tickets</a></li>
								<li role="presentation" class="active"><a href="all_tickets.php">All</a></li>
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
									<th>Ticket Barcode</th>
									<th>Remarks</th>
								</tr>
							</thead>
							<tbody>
								
							
							<?php
									
							$result= mysqli_query($con,"SELECT * from tickets  order by added_date desc ") OR die (mysqli_error($con));
						

							while ($row= mysqli_fetch_array ($result) ){
							?>
							<tr>
								<td><?php echo $row['ticket_title']; ?></td>
								<td><?php echo $row['remark']; ?></td> 
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