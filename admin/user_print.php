<?php include ('include/dbcon.php');
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
		<?php //include('currentdate.php');
		echo date("l,d-m-Y"); ?>
        </div>			
		<br/>
						<table class="table table-striped">
						  <thead >
								<tr>
								<tr>
									<th style="text-align: center">#</th>
									<th style="text-align: center">Full Name</th>
									<th style="text-align: center">Email</th>
									<th style="text-align: center">Contact</th>
									<th style="text-align: center">Address</th>
									<th style="text-align: center">Country</th>
									<th style="text-align: center">City</th>
									<th style="text-align: center">Date Added</th>
								</tr>
								</tr>
						  </thead>   
						  <tbody>
<?php
							$result= mysqli_query($con,"select * from user order by user_id ASC") or die (mysqli_error($con));
							while ($row= mysqli_fetch_array ($result) ){
								$cnt=1;
							?>
							<tr>
								<td style="text-align: center" ><?php echo $cnt;?></td>
								<td style="text-align: center"><?php echo $row['fullname']; ?></td> 
								<td style="text-align: center"><?php echo $row['email']; ?></td> 
								<td style="text-align: center"><?php echo $row['contact']; ?></td>
								<td style="text-align: center"><?php echo $row['address']; ?></td> 
								<td style="text-align: center"><?php echo $row['country']; ?></td> 
								<td style="text-align: center"><?php echo $row['city']; ?></td> 
								<td style="text-align: center"><?php echo date("M d, Y h:m:s a", strtotime($row['user_added'])); ?></td>
							</tr>
							
							
							
							 <?php 
                                $cnt=$cnt+1;
                            }?>
						  </tbody> 
					  </table> 

<br />
<br />
							<?php
								include('include/dbcon.php');
								

								$user_query=mysqli_query($con,"select * from admin where admin_id='".$_SESSION['id']."'")or die(mysqli_error($con));
								$row=mysqli_fetch_array($user_query); 
								{
							?>        <h2><span style="font-size: 15px" class="glyphicon glyphicon-user"></span> 
								<?php echo '<span style="color:blue; font-size:13px;">Prepared by:'."<br /><br /> ".$row['firstname']." ".$row['lastname']." ".'</span>';?></h2>
								<?php } ?>


			</div>
	
	
	
	

	</div>
</body>


</html>