<?php include ('header.php'); ?>

        <div class="page-title">
            <div class="title_left">
                <h3>
					<small>Home /</small> My Messages
                </h3>
            </div>
        </div>
        <div class="clearfix"></div>
 
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2><i class="fa fa-book"></i> Messages List</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <!-- content starts here -->
                        <br><br><br>


                        <!-- Showing Search Result of books -->
                        <div class="table-responsive">
							<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
							<tbody>
								<?php
												$qid=intval($_GET['message_id']);
												$sql=mysqli_query($con,"select user.firstname,user.lastname,messages.* from messages join user on user.user_id=messages.user_id where messages.message_id='$qid'");
												$cnt=1;
												while($row=mysqli_fetch_array($sql))
												{
											?>
											<tr>
												<th>User Name</th>
												<td><?php echo $row['firstname'].' '.$row['lastname'];?></td>
											</tr>
											<tr>
												<th>Message</th>
												<td><?php echo $row['message'];?></td>
											</tr>
											<tr>
												<th>Posting Date</th>
												<td><?php echo $row['posting_date'];?></td>
											</tr>										
												<?php if($row['remark']==""){?>	
												<form name="query" method="post">
													<tr>
														<th>Admin Remark</th>
														<td><textarea name="remark" class="form-control" required="true"></textarea></td>
													</tr>
													<tr>
														<td>&nbsp;</td>
														<td>	
															<button type="submit" class="btn btn-primary pull-left" name="update">
															Update <i class="fa fa-arrow-circle-right"></i>
															</button>
														</td>
													</tr>
												</form>												
												<?php } else {?>										
												<tr>
													<th>Admin Remark</th>
													<td><?php echo $row['remark'];?></td>
												</tr>
												<?php 
												 } }?>
							</tbody>
							</table>

						</div>
						<?php
						if(isset($_POST['update']))
	{
		$qid=intval($_GET['message_id']);
		$remark=$_POST['remark'];
		$is_read=1;
		$query=mysqli_query($con,"update messages set  remark='$remark',is_read='$is_read' where message_id='$qid'");
		if($query){
		echo "<script>alert('Admin Remark updated successfully.');</script>";
		echo "<script>window.location.href ='read-messages.php'</script>";
		}
	}?>
                        <!-- books end -->

						
                        <!-- content ends here -->
                    </div>
                </div>
            </div>
        </div>

<?php include ('footer.php'); ?>