<?php ob_start(); ?>
<?php

            include ('../admin/include/dbcon.php');
            include ('header.php');

                
?>


        <div class="page-title">
            <div class="title_left">
                <h3>
                    <small>Home / Tickets /</small> Add Ticket
                </h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <?php 
  include "../bracode/meRaviQr/qrlib.php";
  include "../bracode/config.php";
  if(isset($_POST['create']))
  {
     $ticket_code=$_POST['ticket_code'];
        $query=mysqli_query($con,"select * from tickets where ticket_code='$ticket_code'");
        $count=mysqli_num_rows($query);
        $row=mysqli_fetch_array($query);
        if (($count > 0)){
            echo "<script>alert('Code is already used please use another one');</script>";
              }else{ 
                $ev_or_id = $_SESSION['id'];
             $ticket_title =  $_POST['ticket_title'];
    $event = $_POST['event'];
    $ticket_type = $_POST['ticket_type'];
    $ticket_price=$_POST['ticket_price'];
    $status= $_POST['status'];
    $start_date = $_POST['start_date'];
    $duration = $_POST['duration'];
    $time11 = $_POST['time11'];
    $seat_num = $_POST['seat_num'];
    $country = $_POST['country'];
    $address = $_POST['address'];
    $description = $_POST['description'];
    $ticket_code= $_POST['ticket_code'];
    $qrImgName = "meravi".rand();
    $title = "Ticket Title ( ";
    $ticketprice = "Ticket Price ( ";
    $status1 = "Status ( ";
    $start_date1 = "Date ( ";
    $code = "Ticket Cod ( ";
    $duration1 = "Duration by hours ( ";
    $added_by = "1";


    $final =$title.$ticket_title." ) ".$ticketprice.$ticket_price." ) ".$status1.$status." ) ".$code.$ticket_code." ) ".$start_date1.$start_date." ) ".$duration1.$duration." ) ";
    if ($status == 'Old') {
        $remark = 'Available';
    }else {
        $remark = 'Available';
    }
    $qrs = QRcode::png($final,"../bracode/userQr/$qrImgName.png","H","3","3");
    $ticket_image = $qrImgName.".png";
    $workDir = $_SERVER['HTTP_HOST'];
    $qrlink = $workDir."../bracode/qrcode".$qrImgName.".png";
    $insQr = $meravi->insertQrrr($ev_or_id,$ticket_title,$event,$ticket_type,$ticket_price,$final,$status,$start_date,$time11,$seat_num,$country,$address,$description,$duration,$ticket_code,$ticket_image,$added_by,$remark);
    if($insQr==true)
    {
      echo "<script>alert('Ticket Added Successfully'); window.location='add_ticket.php?success=$ticket_image';</script>";

    }
    else
    {
      echo "<script>alert('cant create QR Code');</script>";
    }

              }


    
  
 }
  ?>
  <?php 
  if(isset($_GET['success']))
  {
  ?>
  <div id="qrSucc">
    <div class="form-group">
                                    <label class="control-label col-md-4" for="ticket_image">Ticket Brarcode
                                    </label>
                                    <div class="col-md-4">
                                        <img src="../bracode/userQr/<?php echo $_GET['success']; ?>" alt="">
                                        <?php 
$workDir = $_SERVER['HTTP_HOST'];
    $qrlink = $workDir."../bracode//qrcode/userQr/".$_GET['success'];
    ?>
     
    <br><br>
<br>
 <br><br>
 <a href="add_ticket.php"><button type="button" class="btn btn-primary"><i class="fa fa-times-circle-o"></i> Go Back </button></a>
                                    </div>
                                </div>
    <?php 
    ?>

 
    
    
    
     </div>
  <?php
}
else
{
  ?>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2><i class="fa fa-plus"></i> Add Ticket</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <!-- content starts here -->
                            <?php
                            $ID=$_GET['ticket_id'];
  $query=mysqli_query($con,"select * from tickets where ticket_id='$ID'")or die(mysql_error());
$row=mysqli_fetch_array($query);
  ?>
                            <form method="post" enctype="multipart/form-data" class="form-horizontal form-label-left">
                            <input type="hidden" name="new_barcode" value="<?php echo $new_barcode; ?>">
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="ticket_code">Enter Ticket Code(6 Char)<span class="required" style="color:red;">*</span>
                                    </label>
                                    <div class="col-md-6">
                                        <input type="text" style="border-radius: 10px" maxlength="6" minlength="6" name="ticket_code" id="ticket_code" class="form-control col-md-7 col-xs-12" required="required">
                                    </div>
                                </div><br>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="ticket_title">Ticket Title <span class="required" style="color:red;">*</span>
                                    </label>
                                    <div class="col-md-6">
                                        <input type="text" name="ticket_title" value="<?php echo $row['ticket_title']; ?>" style="border-radius: 10px" id="ticket_title" required="required" class="form-control col-md-7 col-xs-12" readonly>
                                    </div>
                                </div><br>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="event">Event <span class="required" style="color:red;">*</span>
                                    </label>
                                    <div class="col-md-6">
                                         <input type="text" name="event" value="<?php echo $row['event']; ?>" style="border-radius: 10px" id="event" required="required" class="form-control col-md-7 col-xs-12" readonly>
                                        </select>
                                    </div>
                                </div><br>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="event">Type <span class="required" style="color:red;">*</span>
                                    </label>
                                    <div class="col-md-6">
                                         <input type="text" name="ticket_type" value="<?php echo $row['ticket_type']; ?>" style="border-radius: 10px" id="ticket_type" required="required" class="form-control col-md-7 col-xs-12" readonly>
                                    </div>
                                </div><br>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="ticket_price">Ticket Price <span class="required" style="color:red;">*</span>
                                    </label>
                                    <div class="col-md-6">
                                        <input type="text" value="<?php echo $row['ticket_price']; ?>" name="ticket_price" style="border-radius: 10px" id="ticket_price" class="form-control col-md-7 col-xs-12" required="required" readonly>
                                    </div>
                                </div><br>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="status">Status <span class="required" style="color:red;">*</span>
                                    </label>
                                    <div class="col-md-6">
                                        <select readonly name="status" class="select2_single form-control" tabindex="-1" style="border-radius: 10px" required="required">
                                            <option  value="<?php echo $row['status']; ?>"><?php echo $row['status']; ?></option>
                                        </select>
                                    </div>
                                </div><br>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="start_date">Date <span class="required" style="color:red;">*</span>
                                    </label>
                                    <div class="col-md-6">
                                        <input type="date" style="border-radius: 10px" name="start_date" value="<?php echo $row['start_date']; ?>" id="start_date" class="form-control col-md-7 col-xs-12" required="required" readonly>
                                    </div>
                                </div><br>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="duration">Duration (h) <span class="required" style="color:red;">*</span>
                                    </label>
                                    <div class="col-md-6">
                                        <input type="text" style="border-radius: 10px" name="duration" value="<?php echo $row['duration']; ?>" id="duration" class="form-control col-md-7 col-xs-12" required="required" readonly>
                                    </div>
                                </div><br>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="time11">Time  <span class="required" style="color:red;">*</span>
                                    </label>
                                    <div class="col-md-6">
                                        <input type="time" style="border-radius: 10px" name="time11"  id="time11" value="<?php echo $row['time11']; ?>" class="form-control col-md-7 col-xs-12" required="required" readonly>
                                    </div>
                                </div><br>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="seat_num">Seat Number  <span class="required" style="color:red;">*</span>
                                    </label>
                                    <div class="col-md-6">
                                        <input type="number" value="<?php echo $row['seat_num']; ?>" style="border-radius: 10px" name="seat_num"  id="seat_num" class="form-control col-md-7 col-xs-12" required="required" readonly>
                                    </div>
                                </div><br>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="country">Country  <span class="required" style="color:red;">*</span>
                                    </label>
                                    <div class="col-md-6">
                                        <input type="text" style="border-radius: 10px" name="country"  id="country" value="<?php echo $row['country']; ?>" class="form-control col-md-7 col-xs-12" required="required" readonly>
                                    </div>
                                </div><br>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="seat_num">Address  <span class="required" style="color:red;">*</span>
                                    </label>
                                    <div class="col-md-6">
                                        <textarea name="address" style="border-radius: 10px" id="address" class="form-control col-md-7 col-xs-12"  required="required" rows="3" readonly><?php echo $row['address']; ?></textarea>
                                    </div>
                                </div><br>
                                 <div class="form-group">
                                    <label class="control-label col-md-4" for="description">Ticket Details  <span class="required" style="color:red;">*</span>
                                    </label>
                                    <div class="col-md-6">
                                        <textarea name="description" style="border-radius: 10px" id="description" class="form-control col-md-7 col-xs-12" required="required" readonly="" rows="5"><?php echo $row['description']; ?></textarea>
                                    </div>
                                </div><br>
                                
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                        <a href="tickets.php"><button type="button" class="btn btn-primary"><i class="fa fa-times-circle-o"></i> Cancel</button></a>
                                        <button type="submit" name="create" class="btn btn-success"><i class="fa fa-plus-square"></i> Submit</button>
                                    </div>
                                </div>
                            </form>
                             <?php 
}
   ?>
                    
                        
                        <!-- content ends here -->
                    </div>
                </div>
            </div>
        </div>

<?php include ('footer.php'); ?>
