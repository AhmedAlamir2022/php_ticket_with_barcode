<?php include ('header.php'); ?>

        <div class="page-title">
            <div class="title_left">
                <h3>
					<small>Home / Admin Profile</small> / View Individual
                </h3>
            </div>
        </div>
        <div class="clearfix"></div>
 
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2><i class="fa fa-info"></i> Individual Information</h2>
                       
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <!-- content starts here -->

						<div class="table-responsive">
							
<?php
			   
		if (isset($_GET['admin_id']))
		$id=$_GET['admin_id'];
		$result1 = mysqli_query($con,"SELECT * FROM admin WHERE admin_id='$id'");
		while($row = mysqli_fetch_array($result1)){
		?>
								
								
								<form method="post" enctype="multipart/form-data" class="form-horizontal form-label-left">
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">Admin Image
                                    </label>
                                    <div class="col-md-4">
										<?php if($row['admin_image'] != ""): ?>
										<img src="upload/<?php echo $row['admin_image']; ?>" width="100px" height="100px" style="border:1px solid black; border-radius:5px;">
										<?php else: ?>
										<img src="images/book_image.jpg" width="100px" height="100px" style="border:4px groove #CCCCCC; border-radius:5px;">
										<?php endif; ?>
										
                                        <input type="file" style="height:44px; margin-top:10px;" name="admin_image" id="admin_image" class="form-control col-md-7 col-xs-12" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="firstname">First Name <span class="required" style="color:red;">*</span>
                                    </label>
                                    <div class="col-md-4">
                                        <input type="text" name="firstname" value="<?php echo $row['firstname']; ?>" id="firstname"  class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="middlename">Middle Name <span class="required" style="color:red;">*</span>
                                    </label>
                                    <div class="col-md-4">
                                        <input type="text" name="middlename" value="<?php echo $row['middlename']; ?>" id="middlename"  class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="lastname">Last Name <span class="required" style="color:red;">*</span>
                                    </label>
                                    <div class="col-md-4">
                                        <input type="text" name="lastname" value="<?php echo $row['lastname']; ?>" id="lastname"  class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="email_id">Email Address <span class="required" style="color:red;">*</span>
                                    </label>
                                    <div class="col-md-4">
                                        <input type="email" name="email_id" value="<?php echo $row['email_id']; ?>" id="email_id"  class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="email_id">Contact Number <span class="required" style="color:red;">*</span>
                                    </label>
                                    <div class="col-md-4">
                                        <input type="number" name="contact" value="<?php echo $row['contact']; ?>" id="contact"  class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="email_id">Added Date <span class="required" style="color:red;">*</span>
                                    </label>
                                    <div class="col-md-4">
                                        <input type="" name="" readonly="" value="<?php echo date("M d, Y h:m:s a", strtotime($row['admin_added'])); ?>" id=""  class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                               
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                        <button type="submit" name="update11" class="btn btn-success"><i class="glyphicon glyphicon-save"></i> Update</button>
                                    </div>
                                </div>
                            </form> 
							
							<?php } ?>
						</div>
                         <?php
                    $id=$_GET['admin_id'];
                    if (isset($_POST['update11'])) {
                        if (!isset($_FILES['admin_image']['tmp_name'])) {
                                        echo "";
                                    }else{

                                        
                    $firstname=$_POST['firstname'];
                    $middlename=$_POST['middlename'];
                    $lastname=$_POST['lastname'];
                    $email_id=$_POST['email_id'];
                    $contact=$_POST['contact'];
                    $admin_image=$_FILES['admin_image']['name'];
                                     move_uploaded_file($_FILES["admin_image"]["tmp_name"],"upload/" . $_FILES["admin_image"]["name"]);
                    mysqli_query($con," UPDATE admin SET firstname='$firstname', middlename='$middlename', lastname='$lastname',email_id='$email_id', contact='$contact', admin_image='$admin_image' WHERE admin_id = '$id' ")or die(mysqli_error($con));
                    echo "<script>alert('Successfully Updated Info!'); window.location='admin.php'</script>"; 

                                    }
                                }

?>
                    
						
                        <!-- content ends here -->
                    </div>
                </div>
            </div>
        </div>

<?php include ('footer.php'); ?>