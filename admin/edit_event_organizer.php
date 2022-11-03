<?php include ('include/dbcon.php');
$ID=$_GET['id'];
 ?>
<?php include ('header.php'); ?>

        <div class="page-title">
            <div class="title_left">
                <h3>
					<small>Home / Event Organizers /</small> Edit Information
                </h3>
            </div>
        </div>
        <div class="clearfix"></div>
 
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2><i class="fa fa-pencil"></i> Edit Event Organizer Information</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                       
                            <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <!-- content starts here -->
                            <?php
                              $query=mysqli_query($con,"select * from event_organizer where id='$ID'")or die(mysqli_error($con));
                            $row=mysqli_fetch_array($query);
                              ?>

                            <form method="post" enctype="multipart/form-data" class="form-horizontal form-label-left">
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">E-O Image
                                    </label>
                                    <div class="col-md-4">
                                        <?php if($row['image'] != ""): ?>
                                        <img src="upload/<?php echo $row['image']; ?>" width="100px" height="100px" style="border:1px solid black; border-radius:5px;">
                                        <?php else: ?>
                                        <img src="images/book_image.jpg" width="100px" height="100px" style="border:4px groove #CCCCCC; border-radius:5px;">
                                        <?php endif; ?>
                                        
                                        <input type="file" style="height:44px; margin-top:10px;" name="image" id="image" class="form-control col-md-7 col-xs-12" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="first-name">First Name<span class="required" style="color:red;">*</span>
									</label>
                                    <div class="col-md-4">
                                        <input type="text" value="<?php echo $row['first_name']; ?>" name="first_name" id="first-name2" class="form-control col-md-7 col-xs-12" required="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="first-name">Middle Name
                                    </label>
                                    <div class="col-md-4">
                                        <input type="text" name="middle_name" value="<?php echo $row['middle_name']; ?>" placeholder="optional" id="first-name2" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">Last Name<span class="required" style="color:red;">*</span>
                                    </label>
                                    <div class="col-md-4">
                                        <input type="text" value="<?php echo $row['last_name']; ?>" name="last_name" id="last-name2" class="form-control col-md-7 col-xs-12" required="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">Contact<span class="required" style="color:red;">*</span>
                                    </label>
                                    <div class="col-md-4">
                                        <input type='number' value="<?php echo $row['contact']; ?>" autocomplete="off"  maxlength="8" name="contact" id="last-name2" class="form-control col-md-7 col-xs-12" required="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">Email<span class="required" style="color:red;">*</span>
                                    </label>
                                    <div class="col-md-4">
                                        <input type='text' value="<?php echo $row['email']; ?>" autocomplete="off"   name="email" id="last-name2" class="form-control col-md-7 col-xs-12" required="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">Gender<span class="required" style="color:red;">*</span>
                                    </label>
									<div class="col-md-3">
                                        <select name="gender" class="select2_single form-control" tabindex="-1" required="">
                                            <option value="<?php echo $row['gender']; ?>"><?php echo $row['gender']; ?></option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                    </div>
                                </div>					
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">Address<span class="required" style="color:red;">*</span>
                                    </label>
                                    <div class="col-md-4">
                                        <input type="text" value="<?php echo $row['address']; ?>" name="address" id="last-name2" class="form-control col-md-7 col-xs-12" required="">
                                    </div>
                                </div>
                                
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                        <a href="event_organizer.php"><button type="button" class="btn btn-primary"><i class="fa fa-times-circle-o"></i> Cancel</button></a>
                                        <button type="submit" name="update" class="btn btn-success"><i class="glyphicon glyphicon-save"></i> Update</button>
                                    </div>
                                </div>
                            </form>
							
                            <?php
                                $id =$_GET['id'];
                                if (isset($_POST['update'])) {
                        if (!isset($_FILES['image']['tmp_name'])) {
                                        echo "";
                                    }else{
                                $first_name = $_POST['first_name'];
                                $middle_name = $_POST['middle_name'];
                                $last_name = $_POST['last_name'];
                                $contact = $_POST['contact'];
                                $email = $_POST['email'];
                                $gender = $_POST['gender'];
                                $address = $_POST['address'];	
                                $image=$_FILES['image']['name'];
                                     move_uploaded_file($_FILES["image"]["tmp_name"],"upload/" . $_FILES["image"]["name"]);	
                                mysqli_query($con," UPDATE event_organizer SET first_name='$first_name', middle_name='$middle_name', last_name='$last_name', contact='$contact', email ='$email',gender='$gender', address='$address', image='$image' WHERE id = '$id' ")or die(mysqli_error($con));
                                echo "<script>alert('Successfully Updated Event Organizer Info!'); window.location='event_organizer.php'</script>";
                                
                            }
                                }
                            ?>
						
                        <!-- content ends here -->
                    </div>
                </div>
            </div>
        </div>

<?php include ('footer.php'); ?>