<?php include ('header.php'); ?>

        <div class="page-title">
            <div class="title_left">
                <h3>
                    <small>Home/ </small>Tickets Types
                </h3>
                <?php 
                 if(isset($_GET['del'])){
                    include('../admin/include/dbcon.php');
                    $get_id=$_GET['del'];
                    mysqli_query($con,"delete from ttypes where type_id = '$get_id' ")or die(mysqli_error($con));   
                    }?>
            </div>
        </div>
        <div class="clearfix"></div>
 
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2><i class="fa fa-users"></i> Ticket Types Information</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <!-- Large modal -->
                            <li>
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-plus"></i> Add New Type </button>

                  <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">

                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                          </button>
                          <h4 class="modal-title" id="myModalLabel">Add New Type </h4>
                        </div>
                        <div class="modal-body">
                           <form method="post" enctype="multipart/form-data" class="form-horizontal form-label-left">
                                 <div class="form-group">
                                    <label class="control-label col-md-4" for="ttype">Ticket Type <span class="required" style="color:red;">*</span>
                                    </label>
                                    <div class="col-md-4">
                                        <input type="text" name="ttype" placeholder="Enter Ticket Type"  required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          <button type="submit" name="submit" class="btn btn-success"><i class="fa fa-plus-square"></i> Submit</button>
                        </div>
                         </form>
                         <?php  
                            include ('../admin/include/dbcon.php');
                                if (isset($_POST['submit'])){
                                    
                                    $ttype = $_POST['ttype'];  
                                    
                                    mysqli_query($con,"insert into ttypes (ttype)
                                        values ('$ttype')")or die(mysqli_error($con));
                                        echo "<script>alert('Type Successfully Added!');
                                        window.location='type.php'</script>";
                                    
                                            }
                                        
                                ?>
                      </div>
                    </div>
                  </div>
                            </li>
                            
                        </ul>
                        <div class="clearfix"></div>
                            <ul class="nav nav-pills">
                                <li role="presentation">All Types</li>
                            </ul>
                    </div>
                    <div class="x_content">
                        <!-- content starts here -->

                        <div class="table-responsive">
                            <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
                                
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Type</th>
                                    <th>Added Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                            $sql=mysqli_query($con,"select * from ttypes");
                                            $cnt=1;
                                            while($row=mysqli_fetch_array($sql))
                                            {
                                            ?>
                            <tr> 
                                <td><?php echo $row['type_id']; ?></td>
                                <td><?php echo $row['ttype']; ?></td>
                                <td><?php echo $row['creation_date']; ?></td>
                                <td>
                                    <a class="btn btn-warning" href="edit_type.php<?php echo '?id='.$row['type_id']; ?>"><i class="fa fa-edit"></i></a>
                                    <a class="btn btn-danger" for="DeleteAdmin" href="#delete<?php echo $row['type_id'];?>" data-toggle="modal" data-target="#delete<?php echo $row['type_id'];?>"><i class="glyphicon glyphicon-trash icon-white"></i></a>
                                    <!-- delete modal user -->
                                    <div class="modal fade" id="delete<?php  echo $row['type_id'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="myModalLabel"><i class="glyphicon glyphicon-user"></i> Event Organizer</h4>
                                                </div>
                                                 <div class="modal-body">
                                                    <div class="alert alert-danger">
                                                        Are you sure you want to delete?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button class="btn btn-inverse" data-dismiss="modal" aria-hidden="true"><i class="glyphicon glyphicon-remove icon-white"></i> No</button>
                                                        <a href="type.php?del=<?php echo $row['type_id']; ?>" style="margin-bottom:5px;" class="btn btn-primary"><i class="glyphicon glyphicon-ok icon-white"></i> Yes</a>
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
                                    <th>ID</th>
                                    <th>Type</th>
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