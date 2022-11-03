<?php include ('header.php'); ?>

        <div class="page-title">
            <div class="title_left">
                <h3>
                    <small>Home /</small> My Messages
                </h3>
            </div>
        </div>
        <div class="clearfix"></div>
 
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2><i class="fa fa-book"></i> Messages List</h2>
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
                                    <th>Name</th>
                                    <th>Posting Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                            
                            <?php
                                                $sql=mysqli_query($con,"select user.firstname,user.lastname,messages.* from messages join user on user.user_id=messages.user_id where messages.admin_id='".$_SESSION['id']."' && is_read is null ");
                                                $cnt=1;
                                                while($row=mysqli_fetch_array($sql))
                                                {?>
                            <tr>
                                <td><?php echo $cnt;?></td>
                                <td><?php echo $row['firstname'].' '.$row['lastname']; ?></td>
                                <td><?php echo $row['posting_date']; ?></td> 
                                <td ><div class="visible-md visible-lg hidden-sm hidden-xs"><a href="message-details.php?message_id=<?php echo $row['message_id'];?>" class="btn btn-transparent btn-lg" title="View Details"><i class="fa fa-file"></i></a></div></td>
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