<?php include ('../admin/include/dbcon.php');
$ID=$_GET['ticket_id'];
 ?>
 <?php include ('header.php'); ?>

        <div class="page-title">
            <div class="title_left">
                <h3>
					<small>Home/ </small>Ticket Image
                </h3>
            </div>
        </div>
        <div class="clearfix"></div>
 
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_content">
                        <!-- content starts here -->

                        <?php
  $query=mysqli_query($con,"select * from tickets where ticket_id='$ID'")or die(mysql_error());
$row=mysqli_fetch_array($query);
  ?>
                        <form method="post" enctype="multipart/form-data" class="form-horizontal form-label-left">
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">Ticket Image
                                    </label>
                                    <div class="col-md-4">
                                        <?php if($row['image'] != ""): ?>
                                        <img src="../admin/upload/<?php echo $row['image']; ?>" width="100px" height="100px" style="border:1px solid black; border-radius:5px;">
                                        <?php else: ?>
                                        <img src="images/book_image.jpg" width="100px" height="100px" style="border:4px groove #CCCCCC; border-radius:5px;">
                                        <?php endif; ?>
                                        
                                        <input type="file" style="height:44px; margin-top:10px;" name="image" id="image" class="form-control col-md-7 col-xs-12" />
                                    </div>
                                </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          <button type="submit" name="submit" class="btn btn-success"><i class="fa fa-plus-square"></i> Submit</button>
                        </div>
                         </form>
                         <?php
                    $ID=$_GET['ticket_id'];
                    if (isset($_POST['submit'])) {
                        if (!isset($_FILES['image']['tmp_name'])) {
                                        echo "";
                                    }else{
                    $image=$_FILES['image']['name'];
                    move_uploaded_file($_FILES["image"]["tmp_name"],"../admin/upload/" . $_FILES["image"]["name"]);
                    mysqli_query($con," UPDATE tickets SET image='$image' WHERE ticket_id = '$ID' ")or die(mysqli_error($con));
                    echo "<script>alert('Successfully Updated Image!'); window.location='tickets.php'</script>"; 

                                    }
                                }

?>
                        
                        <!-- content ends here -->
                    </div>
                </div>
            </div>
        </div>

<?php include ('footer.php'); ?>