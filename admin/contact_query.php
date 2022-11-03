<?php include ('header.php'); 

                 if(isset($_GET['del'])){
                    include('include/dbcon.php');
                    $get_id=$_GET['del'];
                    mysqli_query($con,"delete from contactquery where id = '$get_id' ")or die(mysqli_error($con));   
                    }?>
	

        <div class="page-title">
            <div class="title_left">
                <h3>
                    <small>Home /</small> Contact Query
                </h3>
            </div>
        </div>
        <div class="clearfix"></div>
 
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2><i class="fa fa-book"></i> Contact Query List</h2>
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
                                    <th>Full Name</th>
                                    <th>Contact Number</th>
                                    <th>Subject</th>
                                    <th>Message</th>
                                    <th>Posting Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                            
                            <?php
                                                $sql=mysqli_query($con,"select * from contactquery order by posting_date desc");
                                                $cnt=1;
                                                while($row=mysqli_fetch_array($sql))
                                                {?>
                            <tr>
                                <td><?php echo $cnt;?></td>
                                <td><?php echo $row['fullname']; ?></td>
                                <td><?php echo $row['contact']; ?></td> 
                                <td><?php echo $row['subject']; ?></td>
                                <td><?php echo $row['message']; ?></td> 
                                <td><?php echo $row['posting_date']; ?></td> 
                                <td>
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
                                                        Are you sure you want to delete?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button class="btn btn-inverse" data-dismiss="modal" aria-hidden="true"><i class="glyphicon glyphicon-remove icon-white"></i> No</button>
                                                        <a href="contact_query.php?del=<?php echo $row['id']; ?>" style="margin-bottom:5px;" class="btn btn-primary"><i class="glyphicon glyphicon-ok icon-white"></i> Yes</a>
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
                            </table>
                        </div>
                        
                        <!-- books end -->

                        
                        <!-- content ends here -->
                    </div>
                </div>
            </div>
        </div>

<?php include ('footer.php'); ?>