<?php include ('include/dbcon.php');
$ID=$_GET['id'];
 ?>
<?php include ('header.php'); ?>

        <div class="page-title">
            <div class="title_left">
                <h3>
					<small>Home / Category /</small> Edit category Information
                </h3>
            </div>
        </div>
        <div class="clearfix"></div>
 
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2><i class="fa fa-pencil"></i> Edit Category</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <!-- content starts here -->
<?php
  $query=mysqli_query($con,"select * from category where cat_id='$ID'")or die(mysql_error());
$row=mysqli_fetch_array($query);
  ?>

                            <form method="post" enctype="multipart/form-data" class="form-horizontal form-label-left">
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">category Image
                                    </label>
                                    <div class="col-md-4">
										<?php if($row['cat_image'] != ""): ?>
										<img src="upload/<?php echo $row['cat_image']; ?>" width="100px" height="100px" style="border:1px solid black; border-radius:5px;">
										<?php else: ?>
										<img src="images/book_image.jpg" width="100px" height="100px" style="border:4px groove #CCCCCC; border-radius:5px;">
										<?php endif; ?>
										
                                        <input type="file" style="height:44px; margin-top:10px;" name="cat_image" id="cat_image" class="form-control col-md-7 col-xs-12" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="cat_name">Category Name <span class="required" style="color:red;">*</span>
                                    </label>
                                    <div class="col-md-4">
                                        <input type="text" name="cat_name" value="<?php echo $row['cat_name']; ?>" id="cat_name" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="details">Details <span class="required" style="color:red;">*</span>
                                    </label>
                                    <div class="col-md-4">
                                        <textarea name="details"  id="details" required="required" class="form-control col-md-7 col-xs-12"> <?php echo $row['details']; ?></textarea>
                                    </div>
                                </div>
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                        <a href="event_category.php"><button type="button" class="btn btn-primary"><i class="fa fa-times-circle-o"></i> Cancel</button></a>
                                        <button type="submit" name="update11" class="btn btn-success"><i class="glyphicon glyphicon-save"></i> Update</button>
                                    </div>
                                </div>
                            </form>
							
                    <?php
                    $ID=$_GET['id'];
                    if (isset($_POST['update11'])) {
                        if (!isset($_FILES['cat_image']['tmp_name'])) {
                                        echo "";
                                    }else{

										
					$cat_name=$_POST['cat_name'];
					$details=$_POST['details'];
					$cat_image=$_FILES['cat_image']['name'];
                                     move_uploaded_file($_FILES["cat_image"]["tmp_name"],"upload/" . $_FILES["cat_image"]["name"]);
                    mysqli_query($con," UPDATE category SET cat_name='$cat_name', details='$details', cat_image='$cat_image' WHERE cat_id = '$ID' ")or die(mysqli_error($con));
                    echo "<script>alert('Successfully Updated category Info!'); window.location='event_category.php'</script>";	

									}
                                }

?>
						
                        <!-- content ends here -->
                    </div>
                </div>
            </div>
        </div>

<?php include ('footer.php'); ?>