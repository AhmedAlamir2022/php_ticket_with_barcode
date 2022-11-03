<?php include ('header.php'); ?>

        <div class="page-title">
            <div class="title_left">
                <h3>
					<small>Home /  Profile</small> / View Individual
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
			   
		if (isset($_GET['id']))
		$id=$_GET['id'];
		$result1 = mysqli_query($con,"SELECT * FROM event_organizer WHERE id='$id'");
		while($row = mysqli_fetch_array($result1)){
		?>
								
								
								<form method="post" enctype="multipart/form-data" class="form-horizontal form-label-left">
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">E-O Image
                                    </label>
                                    <div class="col-md-4">
										<?php if($row['image'] != ""): ?>
										<img src="../admin/upload/<?php echo $row['image']; ?>" width="100px" height="100px" style="border:1px solid black; border-radius:5px;">
										<?php else: ?>
										<img src="../admin/images/book_image.jpg" width="100px" height="100px" style="border:4px groove #CCCCCC; border-radius:5px;">
										<?php endif; ?>
										
                                        <input type="file" style="height:44px; margin-top:10px;" name="image" id="image" class="form-control col-md-7 col-xs-12" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="first_name">First Name <span class="required" style="color:red;">*</span>
                                    </label>
                                    <div class="col-md-4">
                                        <input type="text" name="first_name" value="<?php echo $row['first_name']; ?>" id="first_name"  class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="middle_name">Middle Name <span class="required" style="color:red;">*</span>
                                    </label>
                                    <div class="col-md-4">
                                        <input type="text" name="middle_name" value="<?php echo $row['middle_name']; ?>" id="middle_name"  class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="last_name">Last Name <span class="required" style="color:red;">*</span>
                                    </label>
                                    <div class="col-md-4">
                                        <input type="text" name="last_name" value="<?php echo $row['last_name']; ?>" id="last_name"  class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="email">Email Address <span class="required" style="color:red;">*</span>
                                    </label>
                                    <div class="col-md-4">
                                        <input type="email" readonly="" name="" value="<?php echo $row['email']; ?>" id="email"  class="form-control col-md-7 col-xs-12">
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
                                    <label class="control-label col-md-4" for="gender">Gender <span class="required" style="color:red;">*</span>
                                    </label>
                                    <div class="col-md-3">
                                        <select name="gender" class="select2_single form-control" required="required" tabindex="-1" >
                                        	<option value="<?php echo $row['gender']; ?>"><?php echo $row['gender']; ?></option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                    </div>
                                </div> 
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="creation_date">Added Date <span class="required" style="color:red;">*</span>
                                    </label>
                                    <div class="col-md-4">
                                        <input type="" name="" readonly="" value="<?php echo date("M d, Y h:m:s a", strtotime($row['creation_date'])); ?>" id=""  class="form-control col-md-7 col-xs-12">
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
                    $id=$_GET['id'];
                    if (isset($_POST['update11'])) {
                        if (!isset($_FILES['image']['tmp_name'])) {
                                        echo "";
                                    }else{

                                        
                    $first_name=$_POST['first_name'];
                    $middle_name=$_POST['middle_name'];
                    $last_name=$_POST['last_name'];
                    $contact=$_POST['contact'];
                    $gender=$_POST['gender'];
                    $image=$_FILES['image']['name'];
                                     move_uploaded_file($_FILES["image"]["tmp_name"],"../admin/upload/" . $_FILES["image"]["name"]);
                    mysqli_query($con," UPDATE event_organizer SET first_name='$first_name', middle_name='$middle_name', last_name='$last_name',gender='$gender', contact='$contact', image='$image' WHERE id = '$id' ")or die(mysqli_error($con));
                    echo "<script>alert('Successfully Updated Info!'); window.location='home.php'</script>"; 

                                    }
                                }

?>
                    
						
                        <!-- content ends here -->
                    </div>
                </div>
            </div>
        </div>

<?php include ('footer.php'); ?>