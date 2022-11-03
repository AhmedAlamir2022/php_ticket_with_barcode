<?php include ('header.php'); 
if(isset($_GET['approve']))
	{
		mysqli_query($con,"update testimonias set status='1' where test_id ='".$_GET['id']."'");
	}
if(isset($_GET['cancel']))
	{
		mysqli_query($con,"update testimonias set status='2' where test_id ='".$_GET['id']."'");
	}
if(isset($_GET['delete']))
    {
         mysqli_query($con,"delete from testimonias where test_id = '".$_GET['id']."' ")or die(mysqli_error($con)); 
    }
	?>

        <div class="page-title">
            <div class="title_left">
                <h3>
                    <small>Home /</small> Testimonials
                </h3>
            </div>
        </div>
        <div class="clearfix"></div>
 
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2><i class="fa fa-book"></i> Testimonials List</h2>
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
                                    <th>#</th>
                                    <th>User Name</th>
                                    <th>Testimonial</th>
                                    <th>Posting Date</th>
                                    <th>Action</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                            
                            <?php
                                                $sql=mysqli_query($con,"select user.fullname,testimonias.* from testimonias join user on user.email=testimonias.user_email order by posting_date desc");
                                                $cnt=1;
                                                while($row=mysqli_fetch_array($sql))
                                                {?>
                            <tr>
                                <td><?php echo $cnt;?></td>
                                <td><?php echo $row['fullname']; ?></td>
                                <td><?php echo $row['Testimonial']; ?></td> 
                                <td><?php echo $row['posting_date']; ?></td> 
                                <td>
									<div>
									<?php if($row['status']==0)  
													{ ?>												
														<a href="testimonials.php?id=<?php echo $row['test_id']?>&approve=update" onClick="return confirm('Are you sure you want to Accept?')" class="btn btn-transparent btn-xs tooltips" title="Cancel Appointment" tooltip-placement="top" tooltip="Remove"><button class="btn btn-primary">Accept</button> </a>
														<a href="testimonials.php?id=<?php echo $row['test_id']?>&cancel=update" onClick="return confirm('Are you sure you want to Cancel?')"class="btn btn-transparent btn-xs tooltips" title="Cancel Ticket" tooltip-placement="top" tooltip="Remove"><button class="btn btn-warning">Cancel</button> </a>

													<?php }elseif ($row['status']==1) {
														echo "Active";?>
														
													<?php }else {
                                                        echo "Not Active";?>
                                                        
                                                    <?php } ?>
									</div>
								</td>
                                <td><a href="testimonials.php?id=<?php echo $row['test_id']?>&delete=update" onClick="return confirm('Are you sure you want to Delete?')" class="btn btn-transparent btn-xs tooltips" title="Cancel Ticket" tooltip-placement="top" tooltip="Remove"><button class="btn btn-danger">Delete</button> </a></td>
                            </tr>
                            <?php 
                                                $cnt=$cnt+1;
                                             }?>
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