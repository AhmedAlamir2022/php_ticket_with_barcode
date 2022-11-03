<?php include ('../admin/include/dbcon.php');
$ID=$_GET['ticket_id'];
 ?>
<?php include ('header.php'); ?>

        <div class="page-title">
            <div class="title_left">
                <h3>
					<small>Home / Tickets /</small> Edit Ticket Information
                </h3>
            </div>
        </div>
        <div class="clearfix"></div>
 
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2><i class="fa fa-pencil"></i> Edit Ticket</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <!-- content starts here -->
<?php
  $query=mysqli_query($con,"select * from tickets where ticket_id='$ID'")or die(mysql_error());
$row=mysqli_fetch_array($query);
  ?>

                            <form method="post" enctype="multipart/form-data" class="form-horizontal form-label-left">
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">Ticket Image
                                    </label>
                                    <div class="col-md-4">
										<?php if($row['ticket_image'] != ""): ?>
										<img src="../admin/upload/<?php echo $row['ticket_image']; ?>" width="100px" height="100px" style="border:1px solid black; border-radius:5px;">
										<?php else: ?>
										<img src="../admin/images/book_image.jpg" width="100px" height="100px" style="border:4px groove #CCCCCC; border-radius:5px;">
										<?php endif; ?>
										
                                        <input type="file" style="height:44px; margin-top:10px;" name="ticket_image" id="last-name2" class="form-control col-md-7 col-xs-12" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="ticket_title">Title <span class="required" style="color:red;">*</span>
                                    </label>
                                    <div class="col-md-4">
                                        <input type="text" name="ticket_title" value="<?php echo $row['ticket_title']; ?>" id="ticket_title" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="ticket_price">Price <span class="required" style="color:red;">*</span>
                                    </label>
                                    <div class="col-md-4">
                                        <input type="number" name="ticket_price" value="<?php echo $row['ticket_price']; ?>" id="ticket_price" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                
                                
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">Status <span class="required" style="color:red;">*</span>
                                    </label>
                                    <div class="col-md-3">
                                        <select name="status" class="select2_single form-control" tabindex="" >
                                            <option value="<?php echo htmlentities($row['status']);?>"> <?php echo htmlentities($row['status']);?></option>
                                            <option value="New">New</option>
                                            <option value="Old">Old</option>                                          
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="event">Event <span class="required" style="color:red;">*</span>
                                    </label>
                                    <div class="col-md-3">
                                        <select name="event" class="select2_single form-control" tabindex="" >

                                            <?php $ret=mysqli_query($con,"select * from events");
                                                                while($row=mysqli_fetch_array($ret))
                                                                    {
                                                                    ?>
                                            
                                            <option value="<?php echo htmlentities($row['title']);?>"> <?php echo htmlentities($row['title']);?></option>
                                            <?php }?>                                          
                                        </select>
                                    </div>
                                </div>
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                        <a href="tickets.php"><button type="button" class="btn btn-primary"><i class="fa fa-times-circle-o"></i> Cancel</button></a>
                                        <button type="submit" name="update11" class="btn btn-success"><i class="glyphicon glyphicon-save"></i> Update</button>
                                    </div>
                                </div>
                            </form>
							
                    <?php
                    $id =$_GET['ticket_id'];
                    if (isset($_POST['update11'])) {
                        if (!isset($_FILES['ticket_image']['tmp_name'])) {
                            echo "";
                        }else{
                            
										
					$ticket_title=$_POST['ticket_title'];
					$ticket_price=$_POST['ticket_price'];
					$event=$_POST['event'];
					$status=$_POST['status'];
                    $ticket_image=$_FILES['ticket_image']['name'];
                    move_uploaded_file($_FILES["ticket_image"]["tmp_name"],"../admin/upload/" . $_FILES["ticket_image"]["name"]);
					if ($status == 'Old') {
						$remark = 'Available';
					} else {
						$remark = 'Available';
					}

                    mysqli_query($con," UPDATE tickets SET ticket_title='$ticket_title', ticket_price='$ticket_price', event='$event', status='$status', ticket_image='$ticket_image', remark='$remark', added_by='1' WHERE ticket_id = '$id' ")or die(mysqli_error($con));
                    echo "<script>alert('Successfully Updated Ticket Info!'); window.location='tickets.php'</script>";	
                }
									}

?>
						
                        <!-- content ends here -->
                    </div>
                </div>
            </div>
        </div>

<?php include ('footer.php'); ?>