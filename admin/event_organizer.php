<?php include ('header.php'); ?>

        <div class="page-title">
            <div class="title_left">
                <h3>
					<small>Home/ </small>Event Organizers
                </h3>
                             <?php 
                 if(isset($_GET['del'])){
                    include('include/dbcon.php');
                    $get_id=$_GET['del'];
                    mysqli_query($con,"delete from event_organizer where id = '$get_id' ")or die(mysqli_error($con));   
                    }?>
            </div>
        </div>
        <div class="clearfix"></div>
 
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                            <a href="event_rganizer_print.php" target="_blank" style="background:none;">
                            <button class="btn btn-danger pull-right"><i class="fa fa-print"></i> Print All Event Organizers List</button>
                            </a>
                        
                            <br />
                            <br />
                    <div class="x_title">
                        <h2><i class="fa fa-users"></i> Event Organizers Information</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li>
                             <!-- Large modal -->
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-plus"></i> Add Event Organizer</button>

                  <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">

                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                          </button>
                          <h4 class="modal-title" id="myModalLabel">Add New Event Category</h4>
                        </div>
                        <div class="modal-body">
                           <form method="post" enctype="multipart/form-data" class="form-horizontal form-label-left">
                                 <div class="form-group">
                                    <label class="control-label col-md-4" for="first_name">First Name <span class="required" style="color:red;">*</span>
                                    </label> 
                                    <div class="col-md-4">
                                        <input type="text" name="first_name" placeholder="Enter First Name"  required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="middle_name">Middle Name
                                    </label>
                                    <div class="col-md-3">
                                        <input type="text" name="middle_name" class="form-control col-md-7 col-xs-12">
                                    </div> <span style="color:red;">Optional</span>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="last_name">Last Name <span class="required" style="color:red;">*</span>
                                    </label>
                                    <div class="col-md-4">
                                        <input type="text" name="last_name" placeholder="Enter Last Name"  required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="email">Email Address <span class="required" style="color:red;">*</span>
                                    </label>
                                    <div class="col-md-4">
                                        <input type="email" autocomplete="off" placeholder="Enter Email Address"  name="email" id="email" class="form-control col-md-7 col-xs-12" required="required">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="password">Password <span class="required" style="color:red;">*</span>
                                    </label>
                                    <div class="col-md-4">
                                        <input type="password" autocomplete="off" placeholder="Password"  name="password" id="password" class="form-control col-md-7 col-xs-12" onmouseover="this.type='text'" onmousedown="this.type='password'" onmouseout="this.type='password'" required="required">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="contact">Contact <span class="required" style="color:red;">*</span>
                                    </label>
                                    <div class="col-md-4">
                                        <input type="tel" autocomplete="off" placeholder="Enter Contact Number"  name="contact" id="contact" class="form-control col-md-7 col-xs-12" required="required">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="gender">Gender <span class="required" style="color:red;">*</span>
                                    </label>
                                    <div class="col-md-3">
                                        <select name="gender" class="select2_single form-control" required="required" tabindex="-1" >
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                    </div>
                                </div>          
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="address">Address<span class="required" style="color:red;">*</span>
                                    </label>
                                    <div class="col-md-4">
                                        <input type="text" name="address" id="last-name2" placeholder="Enter Address" class="form-control col-md-7 col-xs-12" required="required">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">Image
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
                                if (isset($_POST['submit'])){
                                    if (!isset($_FILES['image']['tmp_name'])) {
                                        echo "";
                                    }else{
                                    $image=$_FILES['image']['name'];
                                     move_uploaded_file($_FILES["image"]["tmp_name"],"upload/" . $_FILES["image"]["name"]);
                                    $first_name = $_POST['first_name'];
                                    $middle_name = $_POST['middle_name'];
                                    $last_name = $_POST['last_name'];
                                    $email = $_POST['email'];
                                    $password = md5($_POST['password']);
                                    $contact = $_POST['contact'];
                                    $gender = $_POST['gender'];
                                    $address = $_POST['address'];

                                    $result=mysqli_query($con,"select * from event_organizer WHERE email='$email'") or die (mysqli_error($con));
                                    $row=mysqli_num_rows($result);
                                    if ($row > 0)
                                    {
                                    echo "<script>alert('Email Address <br> already exist!'); window.location='event_organizer.php'</script>";
                                    }else
                                    {       
                                        mysqli_query($con,"insert into event_organizer (first_name,middle_name, last_name, email, password, contact, gender, address,image, creation_date)
                                        values ('$first_name','$middle_name', '$last_name','$email', '$password', '$contact', '$gender', '$address','$image', NOW())")or die(mysqli_error($con));
                                        echo "<script>alert('Event Organizer Successfully Added!'); window.location='event_organizer.php'</script>";
                                    }
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
                                    <th> Image</th>
                                    <th>Member Full Name</th>
                                    <th>Member Added</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                            $sql=mysqli_query($con,"select * from event_organizer order by creation_date desc");
                                            $cnt=1;
                                            while($row=mysqli_fetch_array($sql))
                                            {
                                            ?>
                            <tr>
                                <td><?php if($row['image'] != ""): ?>
                                    <img src="upload/<?php echo $row['image']; ?>" width="100px" height="100px" style="border:4px groove #CCCCCC; border-radius:5px;">
                                    <?php else: ?>
                                    <img src="images/user.png" width="100px" height="100px" style="border:4px groove #CCCCCC; border-radius:5px;">
                                    <?php endif; ?> </td> 
                                <td><?php echo $row['first_name']." ".$row['middle_name']." ".$row['last_name']; ?></td>
                                <td><?php echo $row['creation_date']; ?></td> 
                                <td>
                                    <a class="btn btn-primary" for="ViewAdmin" href="view_event_organizer.php<?php echo '?id='.$row['id']; ?>">
                                        <i class="fa fa-search"></i>
                                    </a>
                                    <a class="btn btn-warning" href="edit_event_organizer.php<?php echo '?id='.$row['id']; ?>"><i class="fa fa-edit"></i></a>
                                    <a class="btn btn-danger" for="DeleteAdmin" href="#delete<?php echo $row['id'];?>" data-toggle="modal" data-target="#delete<?php echo $row['id'];?>"><i class="glyphicon glyphicon-trash icon-white"></i></a>
                                    <!-- delete modal user -->
                                    <div class="modal fade" id="delete<?php  echo $row['id'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="myModalLabel"><i class="glyphicon glyphicon-user"></i> Admin</h4>
                                                </div>
                                                 <div class="modal-body">
                                                    <div class="alert alert-danger">
                                                        Are you sure you want to delete this event organizer?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button class="btn btn-inverse" data-dismiss="modal" aria-hidden="true"><i class="glyphicon glyphicon-remove icon-white"></i> No</button>
                                                        <a href="event_organizer.php?del=<?php echo $row['id']; ?>" style="margin-bottom:5px;" class="btn btn-primary"><i class="glyphicon glyphicon-ok icon-white"></i> Yes</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td> 
                            </tr>
                            <?php 
                                $cnt=$cnt+1;
                            }?>
                            
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th> Image</th>
                                    <th>Member Full Name</th>
                                    <th>Member Added</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            </table>
                        </div>
                       
                        <!-- content ends here -->
                    </div>
                </div>
            </div>
        </div>

<?php include ('footer.php'); ?>