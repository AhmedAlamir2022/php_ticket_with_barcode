<?php include ('header.php');
?>

        <div class="page-title">
            <div class="title_left">
                <h3>
					<small>Home /</small> Admin Profile
                </h3>
            </div>
        </div>
        <div class="clearfix"></div>
 
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2><i class="fa fa-info"></i> Admin Information</h2>
                        <ul class="nav navbar-right panel_toolbox">		
                            
							<li>
                             <!-- Large modal -->
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-plus"></i> Add Admin</button>

                  <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">

                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                          </button>
                          <h4 class="modal-title" id="myModalLabel">Add New </h4>
                        </div>
                        <div class="modal-body">
                           <form method="post" enctype="multipart/form-data" class="form-horizontal form-label-left">
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="first-name">First Name <span class="required" style="color:red;">*</span>
                                    </label>
                                    <div class="col-md-4">
                                        <input type="text" name="firstname" id="first-name2" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="first-name">Middle Name
                                    </label>
                                    <div class="col-md-3">
                                        <input type="text" name="middlename" placeholder="" id="first-name2" class="form-control col-md-7 col-xs-12">
                                    </div><span style="color:red;">Optional</span>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">Last Name <span class="required" style="color:red;">*</span>
                                    </label>
                                    <div class="col-md-4">
                                        <input type="text" name="lastname" id="last-name2" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="first-name">Email-Id
                                    </label>
                                    <div class="col-md-3">
                                        <input type="email" name="email_id" placeholder="" id="first-name2" class="form-control col-md-7 col-xs-12">
                                    </div><span style="color:red;">Optional</span>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="first-name">Contact<span class="required" style="color:red;">*</span>
                                    </label>
                                    <div class="col-md-3">
                                        <input type="number" name="contact" placeholder="" id="first-name2" class="form-control col-md-7 col-xs-12" required=""  maxlength="8">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">User Name <span class="required" style="color:red;">*</span>
                                    </label>
                                    <div class="col-md-4">
                                        <input type="text" name="username" id="last-name2" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">Password <span class="required" style="color:red;">*</span>
                                    </label>
                                    <div class="col-md-4">
                                        <input type="password" name="password" id="last-name2" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">Confirm Password <span class="required" style="color:red;">*</span>
                                    </label>
                                    <div class="col-md-4">
                                        <input type="password" name="confirm_password" id="last-name2" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                        
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">Admin Image
                                    </label>
                                    <div class="col-md-4">
                                        <input type="file" style="height:44px;" name="image" id="last-name2" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          <button type="submit" name="submit" class="btn btn-success"><i class="fa fa-plus-square"></i> Submit</button>
                        </div>
                         </form>
                         <?php	
							include ('include/dbcon.php');
							if (!isset($_FILES['image']['tmp_name'])) {
							echo "";
							}else{
							    $image=$_FILES['image']['name'];
                                move_uploaded_file($_FILES["image"]["tmp_name"],"upload/" . $_FILES["image"]["name"]);
								$firstname = $_POST['firstname'];
								$middlename = $_POST['middlename'];
								$lastname = $_POST['lastname'];
                                $email_id = $_POST['email_id'];
                                $contact = $_POST['contact'];
								$username = $_POST['username'];
								$password = $_POST['password'];
								$confirm_password = $_POST['confirm_password'];
									
					
					$result=mysqli_query($con,"select * from admin WHERE username='$username' ") or die (mysqli_error($con));
					$row=mysqli_num_rows($result);
					if ($row > 0)
					{
					echo "<script>alert('Username already taken!'); window.location='admin.php'</script>";
					}
					elseif($password != $confirm_password)
					{
					echo "<script>alert('Password do not match!'); window.location='admin.php'</script>";
					}else
					{		
						mysqli_query($con,"insert into admin (firstname, middlename, lastname,email_id,contact , username, password, confirm_password, admin_image, admin_added)
						values ('$firstname', '$middlename', '$lastname','$email_id','$contact', '$username', '$password', '$confirm_password', '$image',NOW())")or die(mysqli_error($con));
						echo "<script>alert('Account successfully added!'); window.location='admin.php'</script>";
					}
									
									
							}
								?>
                      </div>
                    </div>
                  </div>
                            </li>
							
					
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <!-- content starts here -->

						<div class="table-responsive">
							<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
								
							<thead>
								<tr>
									<th>Image</th>
									<th>Full Name</th>
									<th>Email</th>	
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
							
							<?php
							$result= mysqli_query($con,"select * from admin order by admin_id ASC") or die (mysqli_error($con));
							while ($row= mysqli_fetch_array ($result) ){
							$id=$row['admin_id'];
							?>
							<tr>
								<td>
									<?php if($row['admin_image'] != ""): ?>
									<img src="upload/<?php echo $row['admin_image']; ?>" width="100px" height="100px" style="border:4px groove #CCCCCC; border-radius:5px;">
									<?php else: ?>
									<img src="images/user.png" width="100px" height="100px" style="border:4px groove #CCCCCC; border-radius:5px;">
									<?php endif; ?>	
								</td> 
								<td><?php echo $row['firstname']." ".$row['middlename']." ".$row['lastname']; ?></td>
								<td><?php echo $row['email_id']; ?></td>
								<td>
									<a class="btn btn-primary" for="ViewAdmin" href="view_admin.php<?php echo '?admin_id='.$id; ?>">
										<i class="fa fa-search"></i>
									</a>

                                   
								</td> 
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