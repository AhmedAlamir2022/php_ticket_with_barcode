<?php include ('../admin/include/dbcon.php');
include('session.php');
?>
<html>

<head>
		<title>Ticket Management System</title>
		
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
		<center><h5 style = "font-style:Calibri"></h5>&nbsp; &nbsp;&nbsp; Ticket Management System &nbsp;	&nbsp; </center>
				<center><h5 style = "font-style:Calibri; margin-top:-14px;"></h5> &nbsp; &nbsp;Black Market</center>
					
				</div><hr style="border: solid black 1px">
			<button type="submit" id="print" onclick="printPage()">Print</button>	
			<p style = "margin-left:30px; margin-top:5px; margin-bottom: 0px;font-size:14pt; font-style: italic; ">Member List&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
        <div align="right">
		<b style="color:blue;">Date Prepared:</b>
		<?php 
		echo date("l,d-m-Y"); ?>
        </div>			
		<br/>

						<table class="table table-striped">
						  <thead>
								<tr>
								<tr>
									<th>Title</th>
									<th>Event</th>
									<th>Price</th>
									<th>Status</th>
									<th>Remarks</th>
								</tr>
								</tr>
						  </thead>   
						  <tbody>
						  	<?php
						$result= mysqli_query($con,"SELECT * from tickets order by added_date DESC ") OR die (mysqli_error($con));
							while ($row= mysqli_fetch_array ($result) ){
							$id=$row['ticket_id'];
?>
							<tr>
								<td	style="text-align:center;"><?php echo $row['ticket_title']; ?></td>
								<td	style="text-align:center;"><?php echo $row['event']; ?></td>
								<td	style="text-align:center;"><?php echo $row['ticket_price']; ?></td>
								<td	style="text-align:center;"><?php echo $row['status']; ?></td>
								<td	style="text-align:center;"><?php echo $row['remark']; ?></td>
							</tr>
							
							<?php 
							}					
							?>
						  </tbody> 
					  </table> 

<br />
<br />
							<?php
								
								$user_query=mysqli_query($con,"select * from admin where admin_id='$id_session'")or die(mysql_error());
								$row=mysqli_fetch_array($user_query); {
							?>        <h2><i class="glyphicon glyphicon-user"></i> <?php echo '<span style="color:blue; font-size:15px;">Prepared by:'."<br /><br /> ".$row['firstname']." ".$row['lastname']." ".'</span>';?></h2>
								<?php } ?>


			</div>
	
	
	
	

	</div>
</body>


</html>