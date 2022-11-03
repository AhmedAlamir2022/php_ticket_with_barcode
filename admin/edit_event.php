<?php include ('include/dbcon.php');
$ID=$_GET['id'];
 ?>
<?php include ('header.php'); ?>

        <div class="page-title">
            <div class="title_left">
                <h3>
					<small>Home / Event /</small> Edit Information
                </h3>
            </div>
        </div>
        <div class="clearfix"></div>
 
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2><i class="fa fa-pencil"></i> Edit Event Information</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                       
                            <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <!-- content starts here -->
                            <?php
                              $query=mysqli_query($con,"select * from events where event_id='$ID'")or die(mysqli_error($con));
                            $row=mysqli_fetch_array($query);
                              ?>

                            <form method="post" enctype="multipart/form-data" class="form-horizontal form-label-left">
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="Title">Title<span class="required" style="color:red;">*</span>
									</label>
                                    <div class="col-md-4">
                                        <input type="text" value="<?php echo $row['title']; ?>" name="title" id="title" class="form-control col-md-7 col-xs-12" required="">
                                    </div>
                                </div>
                                
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                        <a href="event.php"><button type="button" class="btn btn-primary"><i class="fa fa-times-circle-o"></i> Cancel</button></a>
                                        <button type="submit" name="update" class="btn btn-success"><i class="glyphicon glyphicon-save"></i> Update</button>
                                    </div>
                                </div>
                            </form>
							
                            <?php
                                $id =$_GET['id'];
                                if (isset($_POST['update'])) {
                                $title = $_POST['title'];	
                                mysqli_query($con," UPDATE events SET title='$title' WHERE event_id = '$id' ")or die(mysqli_error($con));
                                echo "<script>alert('Successfully Updated Event Info!'); window.location='event.php'</script>";
                                

                                }
                            ?>
						
                        <!-- content ends here -->
                    </div>
                </div>
            </div>
        </div>

<?php include ('footer.php'); ?>