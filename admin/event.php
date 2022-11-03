<?php include ('header.php'); ?>

        <div class="page-title">
            <div class="title_left">
                <h3>
					<small>Home/ </small>Events
                </h3>
                <?php 
                 if(isset($_GET['del'])){
                    include('include/dbcon.php');
                    $get_id=$_GET['del'];
                    mysqli_query($con,"delete from events where event_id = '$get_id' ")or die(mysqli_error($con));   
                    }?>
            </div>
        </div>
        <div class="clearfix"></div>
 
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                            <a href="event_print.php" target="_blank" style="background:none;">
                            <button class="btn btn-danger pull-right"><i class="fa fa-print"></i> Print All Events List</button>
                            </a>
                        
                            <br />
                            <br />
                    <div class="x_title">
                        <h2><i class="fa fa-users"></i> Events Information</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li>
                             <!-- Large modal -->
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-plus"></i> Add Event </button>

                  <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">

                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                          </button>
                          <h4 class="modal-title" id="myModalLabel">Add New Event </h4>
                        </div>
                        <div class="modal-body">
                           <form method="post" enctype="multipart/form-data" class="form-horizontal form-label-left">
                                 <div class="form-group">
                                    <label class="control-label col-md-4" for="title">Event Title<span class="required" style="color:red;">*</span>
                                    </label>
                                    <div class="col-md-4">
                                        <input type="text" name="title" placeholder="Enter Event Title"  required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="details">Details<span class="required" style="color:red;">*</span>
                                    </label>
                                    <div class="col-md-4">
                                        <textarea name="details" rows="4"  required="required" class="form-control col-md-7 col-xs-12"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="event_image">Event Image
                                    </label>
                                    <div class="col-md-4">
                                        <input type="file" style="height:44px;" name="event_image" id="event_image" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="category_id">Category <span class="required" style="color:red;">*</span>
                                    </label>
                                    <div class="col-md-3">
                                        <select name="category_id" class="select2_single form-control" tabindex="" >
                                            <?php $ret=mysqli_query($con,"select * from category");
                                                                    while($row=mysqli_fetch_array($ret))
                                                                    {
                                                                    ?>
                                            
                                            <option value="<?php echo htmlentities($row['cat_id']);?>"> <?php echo htmlentities($row['cat_name']);?></option>
                                            <?php }?>                                          
                                        </select>
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
                                    if (!isset($_FILES['event_image']['tmp_name'])) {
                                        echo "";
                                    }else{
                                    
                                    $title = $_POST['title'];
                                    $details=$_POST['details'];
                                    $category_id=$_POST['category_id']; 
                                    $event_image=$_FILES['event_image']['name'];
                                    move_uploaded_file($_FILES["event_image"]["tmp_name"],"upload/" . $_FILES["event_image"]["name"]);  
                                    
                                    mysqli_query($con,"insert into events (title,details,category_id,event_image,added_by, event_added)
                                        values ('$title','$details','$category_id','$event_image',0, NOW())")or die(mysqli_error($con));
                                        echo "<script>alert('Event Successfully Added!'); window.location='event.php'</script>";
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
                                    <th>Event Title</th>
                                    <th>Event Details</th>
                                    <th>Event category</th>
                                    <th>Added By</th>
                                    <th>Event Added</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                            $sql=mysqli_query($con,"select category.cat_name as catname,events.*  from events join category on category.cat_id=events.category_id");
                                            $cnt=1;
                                            while($row=mysqli_fetch_array($sql))
                                            {
                                            ?>
                            <tr>
                                <td><?php if($row['event_image'] != ""): ?>
                                    <img src="upload/<?php echo $row['event_image']; ?>" width="100px" height="100px" style="border:4px groove #CCCCCC; border-radius:5px;">
                                    <?php else: ?>
                                    <?php echo'No Image';?>
                                    <?php endif; ?> </td> 
                                <td><?php echo $row['title']; ?></td>
                                <td><?php echo $row['details']; ?></td>
                                <td><?php echo $row['catname']; ?></td>
                                <td>
                                    <?php if ($row['added_by'] == 0) {
                                        echo "Added By Admin";
                                    }else{
                                        echo "Added By Event Organizer";
                                    }?>
                                </td>
                                <td><?php echo $row['event_added']; ?></td> 
                                <td>
                                    <a class="btn btn-danger" for="DeleteAdmin" href="#delete<?php echo $row['event_id'];?>" data-toggle="modal" data-target="#delete<?php echo $row['event_id'];?>"><i class="glyphicon glyphicon-trash icon-white"></i></a>
                                    <!-- delete modal user -->
                                    <div class="modal fade" id="delete<?php  echo $row['event_id'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="myModalLabel"><i class="glyphicon glyphicon-user"></i> Admin</h4>
                                                </div>
                                                 <div class="modal-body">
                                                    <div class="alert alert-danger">
                                                        Are you sure you want to delete?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button class="btn btn-inverse" data-dismiss="modal" aria-hidden="true"><i class="glyphicon glyphicon-remove icon-white"></i> No</button>
                                                        <a href="event.php?del=<?php echo $row['event_id']; ?>" style="margin-bottom:5px;" class="btn btn-primary"><i class="glyphicon glyphicon-ok icon-white"></i> Yes</a>
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
                                    <th>Event Title</th>
                                    <th>Event Details</th>
                                    <th>Event category</th>
                                    <th>Added By</th>
                                    <th>Event Added</th>
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