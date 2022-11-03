<?php 
include('../admin/include/dbcon.php');
$get_id=$_GET['ticket_id'];
mysqli_query($con,"delete from tickets where ticket_id = '$get_id' ")or die(mysqli_error($con));
header('location:tickets.php');	
?>