 <?php ob_start(); ?>
<?php

			include ('include/dbcon.php');
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
             $ticket_title =  $_POST['ticket_title'];
    $event = $_POST['event'];
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
    $event1 = "Event Name ( ";
    $ticketprice = "Ticket Price ( ";
    $status1 = "Status ( ";
    $start_date1 = "Date ( ";
    $code = "Ticket Cod ( ";
    $duration1 = "Duration by hours ( ";


    $final =$title.$ticket_title." ) ".$event1.$event." ) ".$ticketprice.$ticket_price." ) ".$status1.$status." ) ".$code.$ticket_code." ) ".$start_date1.$start_date." ) ".$duration1.$duration." ) ";
    if ($status == 'Old') {
        $remark = 'Available';
    }else {
        $remark = 'Available';
    }
    $qrs = QRcode::png($final,"../bracode/userQr/$qrImgName.png","H","3","3");
    $ticket_image = $qrImgName.".png";
    $workDir = $_SERVER['HTTP_HOST'];
    $qrlink = $workDir."../bracode/qrcode".$qrImgName.".png";
    $insQr = $meravi->insertQr($ticket_title,$event,$ticket_price,$final,$status,$start_date,$time11,$seat_num,$country,$address,$description,$duration,$ticket_code,$ticket_image,$remark);
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

                            <form method="post" enctype="multipart/form-data" class="form-horizontal form-label-left">
                            <input type="hidden" name="new_barcode" value="<?php echo $new_barcode; ?>">
                            
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="ticket_title">Ticket Title <span class="required" style="color:red;">*</span>
                                    </label>
                                    <div class="col-md-6">
                                        <input type="text" style="border-radius: 10px" name="ticket_title" id="ticket_title" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div><br>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="event">Event <span class="required" style="color:red;">*</span>
                                    </label>
                                    <div class="col-md-6">
                                        <select name="event" style="border-radius: 10px" class="select2_single form-control" tabindex="-1" required="required">
                                            <option value="">Select Event</option>
                                            <?php $ret=mysqli_query($con,"select * from events");
                                                                    while($row=mysqli_fetch_array($ret))
                                                                    {
                                                                    ?>
                                            <option value="<?php echo htmlentities($row['title']);?>">
                                                                    <?php echo htmlentities($row['title']); }?></option>
                                            
                                        </select>
                                    </div>
                                </div><br>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="ticket_price">Ticket Price<span class="required" style="color:red;">*</span>
                                    </label>
                                    <div class="col-md-6">
                                        <input type="text" style="border-radius: 10px" name="ticket_price" id="ticket_price" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div><br>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="status">Status <span class="required" style="color:red;">*</span>
                                    </label>
                                    <div class="col-md-6">
                                        <select name="status" style="border-radius: 10px" class="select2_single form-control" tabindex="-1" required="required">
                                            <option value="New">New</option>
                                            <option value="old">Old</option>
                                        </select>
                                    </div>
                                </div><br>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="start_date">Date <span class="required" style="color:red;">*</span>
                                    </label>
                                    <div class="col-md-6">
                                        <input type="date" name="start_date" value="<?php echo $row['start_date']; ?>" style="border-radius: 10px" id="start_date" class="form-control col-md-7 col-xs-12" required="required">
                                    </div>
                                </div><br>
                               
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="duration">Duration (h) <span class="required" style="color:red;">*</span>
                                    </label>
                                    <div class="col-md-6">
                                        <input type="text" style="border-radius: 10px" name="duration" value="<?php echo $row['duration']; ?>" id="duration" class="form-control col-md-7 col-xs-12" required="required">
                                    </div>
                                </div><br>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="time11">Time  <span class="required" style="color:red;">*</span>
                                    </label>
                                    <div class="col-md-6">
                                        <input type="time" style="border-radius: 10px" name="time11"  id="time11" class="form-control col-md-7 col-xs-12" required="required">
                                    </div>
                                </div><br>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="seat_num">Seat Number  <span class="required" style="color:red;">*</span>
                                    </label>
                                    <div class="col-md-6">
                                        <input type="number" style="border-radius: 10px" name="seat_num"  id="seat_num" class="form-control col-md-7 col-xs-12" required="required">
                                    </div>
                                </div><br>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="country">Country  <span class="required" style="color:red;">*</span>
                                    </label>
                                    <div class="col-md-6">
                                        <input type="text" style="border-radius: 10px" name="country"  id="country" class="form-control col-md-7 col-xs-12" required="required">
                                    </div>
                                </div><br>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="seat_num">Address  <span class="required" style="color:red;">*</span>
                                    </label>
                                    <div class="col-md-6">
                                        <textarea name="address" style="border-radius: 10px" id="address" class="form-control col-md-7 col-xs-12" required="required" rows="3"></textarea>
                                    </div>
                                </div><br>
                                 <div class="form-group">
                                    <label class="control-label col-md-4" for="description">Ticket Details  <span class="required" style="color:red;">*</span>
                                    </label>
                                    <div class="col-md-6">
                                        <textarea name="description" style="border-radius: 10px" id="description" class="form-control col-md-7 col-xs-12" required="required" rows="5"></textarea>
                                    </div>
                                </div><br>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="ticket_code">Ticket Code(6 Char)<span class="required" style="color:red;">*</span>
                                    </label>
                                    <div class="col-md-6">
                                        <input type="text" maxlength="6" style="border-radius: 10px" minlength="6" name="ticket_code" id="ticket_code" class="form-control col-md-7 col-xs-12" required="required">
                                    </div>
                                </div><br>
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                        <a href="tickets.php"><button style="border-radius: 10px" type="button" class="btn btn-primary"><i class="fa fa-times-circle-o"></i> Cancel</button></a>
                                        <button style="border-radius: 10px" type="submit" name="create" class="btn btn-success"><i class="fa fa-plus-square"></i> Submit</button>
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
