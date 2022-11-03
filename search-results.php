<?php
session_start();
error_reporting(0);
include('config.php');

	if(isset($_REQUEST['eid']))
	{
$eid=intval($_GET['eid']);
$user_email=$_SESSION['login'];
$remark='Not Available';
$sql = "UPDATE tickets SET user_email=:user_email,remark=:remark WHERE  ticket_id=:eid";
$query = $dbh->prepare($sql);
$query -> bindParam(':user_email',$user_email, PDO::PARAM_STR);
$query -> bindParam(':remark',$remark, PDO::PARAM_STR);
$query-> bindParam(':eid',$eid, PDO::PARAM_STR);
$query -> execute();

echo "<script>alert('Done');</script>";
echo "<script type='text/javascript'> document.location = 'my-tickets.php'; </script>";
}

?>
<!DOCTYPE html>
<html lang="en">


<head>

	<!-- META ============================================= -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="keywords" content="" />
	<meta name="author" content="" />
	<meta name="robots" content="" />
	
	<!-- DESCRIPTION -->
	<meta name="description" content="EduChamp : Education HTML Template" />
	
	<!-- OG -->
	<meta property="og:title" content="EduChamp : Education HTML Template" />
	<meta property="og:description" content="EduChamp : Education HTML Template" />
	<meta property="og:image" content="" />
	<meta name="format-detection" content="telephone=no">
	
	<!-- FAVICONS ICON ============================================= -->
	<link rel="icon" href="assets/images/favicon.ico" type="image/x-icon" />
	<link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.png" />
	
	<!-- PAGE TITLE HERE ============================================= -->
	<title>Black Market || Ticket Search </title>
	
	<!-- MOBILE SPECIFIC ============================================= -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<!--[if lt IE 9]>
	<script src="assets/js/html5shiv.min.js"></script>
	<script src="assets/js/respond.min.js"></script>
	<![endif]-->
	
	<!-- All PLUGINS CSS ============================================= -->
	<link rel="stylesheet" type="text/css" href="assets/css/assets.css">
	
	<!-- TYPOGRAPHY ============================================= -->
	<link rel="stylesheet" type="text/css" href="assets/css/typography.css">
	
	<!-- SHORTCODES ============================================= -->
	<link rel="stylesheet" type="text/css" href="assets/css/shortcodes/shortcodes.css">
	
	<!-- STYLESHEETS ============================================= -->
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<link class="skin" rel="stylesheet" type="text/css" href="assets/css/color/color-1.css">
	
</head>
<body id="bg">
<div class="page-wraper">
<div id="loading-icon-bx"></div>

    <?php include ('header1.php');?>
    <!-- Content -->
    <div class="page-content bg-white">
        <!-- inner page banner -->
        <div class="page-banner ovbl-dark" style="background-image:url(assets/images/banner/banner3.jpg);">
            <div class="container">
                <div class="page-banner-entry">
                    <h1 class="text-white">Ticket Search</h1>
				 </div>
            </div>
        </div>
		<!-- Breadcrumb row -->
		<div class="breadcrumb-row">
			<div class="container">
				<ul class="list-inline">
					<li><a href="index.php">Home</a></li>
					<li>Ticket Search</li>
				</ul>
			</div>
		</div>
		<!-- Breadcrumb row END -->
        <!-- inner page banner END -->
		<div class="content-block">
            <!-- About Us -->
			<div class="section-area section-sp1">
                <div class="container">
					 <div class="row">
						
						<div class="col-lg-12 col-md-12 col-sm-12">
							<div class="row">
								<?php
					if(isset($_POST['search'])){
				    $con= new mysqli("localhost","root","","ticket1");
				    $search1 = $_POST['search1'];
				    // Check connection
				    if (mysqli_connect_errno())
				      {
				      echo "Failed to connect to MySQL: " . mysqli_connect_error();
				      }

				$result = mysqli_query($con, "SELECT ttypes.ttype,tickets.*  from tickets join ttypes on ttypes.type_id=tickets.ticket_type
				    WHERE ticket_title LIKE '%{$search1}%' OR event LIKE '%{$search1}%' OR ticket_price LIKE '%{$search1}%' OR status LIKE '%{$search1}%' OR start_date LIKE '%{$search1}%' OR ticket_code LIKE '%{$search1}%' ");

				while ($row = mysqli_fetch_array($result))
				{?>
								<div class="col-md-6 col-lg-3 col-sm-6 m-b30">
									<div class="cours-bx">
										<div class="action-box">
											<img src="admin/upload/<?php echo $row['image'];?>" alt="">
											<a href="ticket-details.php?vhid=<?php echo $row['ticket_id'];?>" class="btn">Read More</a>
										</div>
										<div class="info-bx text-center">
											<h5><a href="ticket-details.php?vhid=<?php echo $row['ticket_id'];?>"><?php echo $row['ticket_title'];?></a></h5>
										</div>
										<div class="cours-more-info">
											<div class="price">
												<p><?php echo $row['ttype'];?></p>
												
											</div>

											<div class="price">
												<h5>(KWD)<?php echo $row['ticket_price'];?></h5>
												<h5><?php   if(strlen($_SESSION['login'])==0){ ?>
								<a href="login.php"><button class="btn btn-success">Login To Book</button></a>
<?php }
else{ ?>
<a href="search-results.php?eid=<?php echo $row['ticket_id'];?>" onClick="return confirm('Are you sure you want to Book?')"><button class="btn btn-success">Book</button></a>
								
								<?php } ?></h5>
											</div>

										</div>
									</div>
								</div><?php  }}?>
								<?php
					if(isset($_POST['search3'])){
				    $con= new mysqli("localhost","root","","ticket1");
				    $search2 = $_POST['search2'];
				    // Check connection
				    if (mysqli_connect_errno())
				      {
				      echo "Failed to connect to MySQL: " . mysqli_connect_error();
				      }

				$result = mysqli_query($con, "SELECT ttypes.ttype,tickets.*  from tickets join ttypes on ttypes.type_id=tickets.ticket_type
				    WHERE start_date LIKE '%{$search2}%'");

				while ($row = mysqli_fetch_array($result))
				{?>
								<div class="col-md-6 col-lg-3 col-sm-6 m-b30">
									<div class="cours-bx">
										<div class="action-box">
											<img src="admin/upload/<?php echo $row['image'];?>" alt="">
											<a href="ticket-details.php?vhid=<?php echo $row['ticket_id'];?>" class="btn">Read More</a>
										</div>
										<div class="info-bx text-center">
											<h5><a href="ticket-details.php?vhid=<?php echo $row['ticket_id'];?>"><?php echo $row['ticket_title'];?></a></h5>
										</div>
										<div class="cours-more-info">
											<div class="price">
												<p><?php echo $row['ttype'];?></p>
												
											</div>

											<div class="price">
												<h5>(KWD)<?php echo $row['ticket_price'];?></h5>
												<h5><?php   if(strlen($_SESSION['login'])==0){ ?>
								<a href="login.php"><button class="btn btn-success">Login To Book</button></a>
<?php }
else{ ?>
<a href="search-results.php?eid=<?php echo $row['ticket_id'];?>" onClick="return confirm('Are you sure you want to Book?')"><button class="btn btn-success">Book</button></a>
								
								<?php } ?></h5>
											</div>

										</div>
									</div>
								</div><?php  }}?>
							</div>
						</div>
					</div>
				</div>
            </div>
        </div>
		<!-- contact area END -->
		
    </div>
    <!-- Content END-->
	<!-- Footer ==== -->
     <?php include('footer.php');?>
    <!-- Footer END ==== -->
    <button class="back-to-top fa fa-chevron-up" ></button>
</div>
<!-- External JavaScripts -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/vendors/bootstrap/js/popper.min.js"></script>
<script src="assets/vendors/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/vendors/bootstrap-select/bootstrap-select.min.js"></script>
<script src="assets/vendors/bootstrap-touchspin/jquery.bootstrap-touchspin.js"></script>
<script src="assets/vendors/magnific-popup/magnific-popup.js"></script>
<script src="assets/vendors/counter/waypoints-min.js"></script>
<script src="assets/vendors/counter/counterup.min.js"></script>
<script src="assets/vendors/imagesloaded/imagesloaded.js"></script>
<script src="assets/vendors/masonry/masonry.js"></script>
<script src="assets/vendors/masonry/filter.js"></script>
<script src="assets/vendors/owl-carousel/owl.carousel.js"></script>
<script src="assets/js/functions.js"></script>
<script src="assets/js/contact.js"></script>
<script src='assets/vendors/switcher/switcher.js'></script>
</body>

</html>
