<?php include ('../admin/include/dbcon.php');

$code = $_GET['code'];
							$result1= mysqli_query($con,"select ticket_title,ticket_barcode from tickets where ticket_barcode = '$code' ") or die (mysqli_error($con));
							$row1=(mysqli_fetch_array($result1));
							$ticket_barcode=$row1['ticket_barcode'];
							$ticket_title=$row1['ticket_title'];
?>
<html>

<head>
		<title>Library Management System</title>
		
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
		<center><h5 style = "font-style:Calibri"></h5>&nbsp; &nbsp;&nbsp; Kashi Institute Of Technology - 428 &nbsp;	&nbsp; </center>
				<center><h5 style = "font-style:Calibri; margin-top:-14px;"></h5> &nbsp; &nbsp;Kashi Institute Of Pharmacy - 551</center>
				<center><h5 style = "font-style:Calibri; margin-top:-14px;"></h5>  Library Management System</center>
					
				</div><hr style="border: solid black 1px">
			<button type="submit" id="print" onclick="printPage()">Print</button>	
			
        <div align="right">
		<b style="color:blue;">Date Prepared:</b>
		<?php //include('currentdate.php');
		echo date("l,d-m-Y"); ?>
        </div>			
		<br/>
		<div>
			<?php echo "<img src = '../admin/BCG/html/image.php?filetype=PNG&dpi=72&scale=1&rotation=0&font_family=Arial.ttf&font_size=10&text=".$ticket_barcode."&thickness=50&start=NULL&code=BCGcode128' />";?>
			<h4><?php echo $ticket_title; ?></h4>

		</div>
<br />
<br />
							<?php
								include('../admin/include/dbcon.php');
								include('session.php');
								$user_query=mysqli_query($con,"select first_name,last_name from event_organizer where id='$id_session'")or die(mysqli_error($con));
								$row=mysqli_fetch_array($user_query); {
							?>        <h2><i class="glyphicon glyphicon-user"></i> <?php echo '<span style="color:blue; font-size:15px;">Prepared by:'."<br /><br /> ".$row['first_name']." ".$row['last_name']." ".'</span>';?></h2>
								<?php } ?>


			</div>
	
	
	
	

	</div>
</body>


</html>