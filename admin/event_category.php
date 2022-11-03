<?php include ('header.php'); ?>

        <div class="page-title">
            <div class="title_left">
                <h3>
					<small>Home/ </small>Event Category
                </h3>
                 <?php 
                 if(isset($_GET['del'])){
                    include('include/dbcon.php');
                    $get_id=$_GET['del'];
                    mysqli_query($con,"delete from category where cat_id = '$get_id' ")or die(mysqli_error($con));   
                    }?>
            </div>
        </div>
        <div class="clearfix"></div>
 
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2><i class="fa fa-users"></i> Category Information</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li>
                             <!-- Large modal -->
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-plus"></i> Add Category</button>

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
                                    <label class="control-label col-md-4" for="title">Category Name<span class="required" style="color:red;">*</span>
                                    </label>
                                    <div class="col-md-4">
                                        <input type="text" name="cat_name" placeholder="Enter Event Title"  required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="details">Category Details<span class="required" style="color:red;">*</span>
                                    </label>
                                    <div class="col-md-4">
                                        <textarea name="details" required="required" class="form-control col-md-7 col-xs-12"  placeholder="Enter Event Title"  ></textarea>  
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="cat_image">Category Image
                                    </label>
                                    <div class="col-md-4">
                                        <input type="file" style="height:44px;" name="cat_image" id="cat_image" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          <button type="submit" name="submit" class="btn btn-success"><i class="fa fa-plus-square"></i> Submit</button>
                        </div>
                         </form>
                          <?php   
                                if (isset($_POST['submit'])){
                                    if (!isset($_FILES['cat_image']['tmp_name'])) {
                                        echo "";
                                    }else{
                                    $cat_name = $_POST['cat_name']; 
                                    $details = $_POST['details'];
                                    $cat_image=$_FILES['cat_image']['name'];
                                     move_uploaded_file($_FILES["cat_image"]["tmp_name"],"upload/" . $_FILES["cat_image"]["name"]); 
                                    mysqli_query($con,"insert into category (cat_name,details,cat_image)
                                        values ('$cat_name','$details','$cat_image')")or die(mysqli_error($con));
                                    echo "<script>alert('Category Successfully Added!'); window.location='event_category.php'</script>";
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
                                    <th>Category Name</th>
                                    <th>Details</th>
                                    <th>Added Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                            $sql=mysqli_query($con,"select * from category order by creation_date desc");
                                            $cnt=1;
                                            while($row=mysqli_fetch_array($sql))
                                            {
                                            ?>
                            <tr>
                                <td><?php if($row['cat_image'] != ""): ?>
                                    <img src="upload/<?php echo $row['cat_image']; ?>" width="100px" height="100px" style="border:4px groove #CCCCCC; border-radius:5px;">
                                    <?php else: ?>
                                    <?php echo'No Image';?>
                                    <?php endif; ?></td> 
                                <td><?php echo $row['cat_name']; ?></td>
                                <td><?php echo $row['details'] ?></td>
                                <td><?php echo $row['creation_date']; ?></td> 
                                <td>
                                    <a class="btn btn-warning" href="edit_category.php<?php echo '?id='.$row['cat_id']; ?>"><i class="fa fa-edit"></i></a>
                                    <a class="btn btn-danger" for="DeleteAdmin" href="#delete<?php echo $row['cat_id'];?>" data-toggle="modal" data-target="#delete<?php echo $row['cat_id'];?>"><i class="glyphicon glyphicon-trash icon-white"></i></a>
                                    <!-- delete modal user -->
                                    <div class="modal fade" id="delete<?php  echo $row['cat_id'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                                                        <a href="event_category.php?del=<?php echo $row['cat_id']; ?>" style="margin-bottom:5px;" class="btn btn-primary"><i class="glyphicon glyphicon-ok icon-white"></i> Yes</a>
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
                                    <th> #</th>
                                    <th>Category Name</th>
                                    <th>Added Date</th>
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