<?php include ('config2.php');?>
<html>
	<head>
		<title>Black Market || Ticket information</title>
		<style>
		.container {
			width:100%;
			margin:auto;
		}		 
		.table {
		    width: 100%;
		    margin-bottom: 20px;
		}	
		.table-striped tbody > tr:nth-child(odd) > td,
		.table-striped tbody > tr:nth-child(odd) > th {
		    background-color: #f9f9f9;
		}		
		@media print{
		#print {
		display:none;
		}
		}
		#print {
			width: 90px;
		    height: 30px;
		    font-size: 18px;
		    background: white;
		    border-radius: 4px;
			margin-left:28px;
			cursor:hand;
		}
	</style>		
	<script>
		function printPage() {
		    window.print();
		}
	</script>
	</head>
	<body>
		<div class = "container">
			<div id = "header">
				<br>
				<center><p style = "margin-left:30px; margin-top:5px; margin-bottom: 0px;font-size:14pt; font-style: italic; ">Black Market &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p></center>
				<center><p style = "margin-left:30px; margin-top:5px; margin-bottom: 0px;font-size:14pt; font-style: italic; ">Ticket Managment System &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p></center>
				<center><p style = "margin-left:30px; margin-top:5px; margin-bottom: 0px;font-size:14pt; font-style: italic; ">Ticket Information &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p></center>
				<br><br>
			</div>
			<hr style="border: solid black 1px">
			<hr style="border: solid black 1px"><br/>
			<?php
								        $ticket_id=$_GET['id'];
								        $ret=mysqli_query($con,"select * from tickets where ticket_id='$ticket_id'");
										$cnt=1;
										while ($row=mysqli_fetch_array($ret)) {
								    ?>
									<table border="1" class="table table-bordered">
										<tr align="center">
					                      	<h3 colspan="12" style="font-size:20px;color:blue;text-align: center;" >Ticket Information</h3> 
					                    </tr>

									    <tr>
										    <th scope>Ticket Title</th>
										    <td><?php  echo $row['ticket_title'];?></td>
										    <th scope>Event</th>
										    <td><?php  echo $row['event'];?></td>
									  	</tr>
									  	<tr>
										    <th scope>Ticket Price</th>
										    <td><?php  echo $row['ticket_price'];?></td>
										    <th>Status</th>
										    <td><?php  echo $row['status'];?></td>
									  	</tr>
									    <tr>
										    <th>Date</th>
										    <td><?php  echo $row['start_date'];?></td>
										    <th>Time</th>
										    <td><?php  echo $row['time11'];?></td>
									  	</tr>
									  	<tr>
										    <th>Seat Number</th>
										    <td><?php  echo $row['seat_num'];?></td>
										    <th>Address</th>
										    <td><?php  echo $row['address'];?></td>
									  	</tr>
									  	<tr>
										    <th>Country</th>
										    <td><?php  echo $row['country'];?></td>
										    <th>Details</th>
										    <td><?php  echo $row['description'];?></td>
									  	</tr>
									  	<tr>
										    <th>Code</th>
										    <td><?php  echo $row['ticket_code'];?></td>
										    <th>Barcode Image</th>
										    <td><?php echo "<img src='bracode/userQr/".$row['ticket_image']."'/>";?></td>
									  	</tr>
									 
										<?php }?>
									</table><br/>
									
									
			<br />
			<br />
			<hr style="border: solid black 1px">
			<hr style="border: solid black 1px"><br/>
			<button type="submit" id="print" onclick="printPage()">Print</button>
	        <div align="right">
				<b style="color:blue;">Date Prepared:</b>
				<?php //include('currentdate.php');
				echo date("l,d-m-Y"); ?>
	        </div>
			<h2><span style="font-size: 15px" class="glyphicon glyphicon-user"></span></h2>
		</div>
	</body>
</html>