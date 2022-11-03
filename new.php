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

<!-- Mirrored from educhamp.themetrades.com/demo/admin/courses.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 22 Feb 2019 13:10:19 GMT -->
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
	<link rel="icon" href="../error-404.html" type="image/x-icon" />
	<link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.png" />
	
	<!-- PAGE TITLE HERE ============================================= -->
	<title>All Tickets </title>
	
	<!-- MOBILE SPECIFIC ============================================= -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<!--[if lt IE 9]>
	<script src="assets/js/html5shiv.min.js"></script>
	<script src="assets/js/respond.min.js"></script>
	<![endif]-->
	
	<!-- All PLUGINS CSS ============================================= -->
	<link rel="stylesheet" type="text/css" href="assets/assets/css/assets.css">
	<link rel="stylesheet" type="text/css" href="assets/assets/vendors/calendar/fullcalendar.css">
	
	<!-- TYPOGRAPHY ============================================= -->
	<link rel="stylesheet" type="text/css" href="assets/assets/css/typography.css">
	
	<!-- SHORTCODES ============================================= -->
	<link rel="stylesheet" type="text/css" href="assets/assets/css/shortcodes/shortcodes.css">
	
	<!-- STYLESHEETS ============================================= -->
	<link rel="stylesheet" type="text/css" href="assets/assets/css/style.css">
	<link rel="stylesheet" type="text/css" href="assets/assets/css/dashboard.css">
	<link class="skin" rel="stylesheet" type="text/css" href="assets/assets/css/color/color-1.css">
	
</head>
<body >
	

	<!--Main container start -->
	<main class="ttr-wrapper">
		<div class="container-fluid">
			<div class="row">
				<!-- Your Profile Views Chart -->
				<div class="col-lg-12 m-b30">
					<div class="widget-box">
						<div class="wc-title">
							<h4>All Avilable Tickets</h4>
						</div>
						<?php 
								$status="Available";
								$sql = "SELECT * from tickets where remark=:status";
								$query = $dbh -> prepare($sql);
								$query -> bindParam(':status',$status, PDO::PARAM_STR);
								$query->execute();
								$results=$query->fetchAll(PDO::FETCH_OBJ);
								$cnt=1;
								if($query->rowCount() > 0)
								{
								foreach($results as $result)
								{  ?>
						<div class="widget-inner">
							<div class="card-courses-list admin-courses">
								<div class="card-courses-media">
									<img src="admin/upload/<?php echo htmlentities($result->image);?>" alt=""/>
								</div>
								<div class="card-courses-full-dec">
									<div class="card-courses-title">
										<a href="ticket-details.php?vhid=<?php echo htmlentities($result->ticket_id);?>"><h4><?php echo htmlentities($result->ticket_title);?></h4></a> 
									</div>
									<div class="card-courses-list-bx">
										<ul class="card-courses-view">
											<li class="card-courses-user">
												<div class="card-courses-user-pic">
													<img src="assets/images/testimonials/pic3.jpg" alt=""/>
												</div>
												<div class="card-courses-user-info">
													<h5>Provider</h5>
													<h4><?php if($result->added_by == 1){ echo "Added By User";} else{echo "Added By Event Organizer";}?></h4>
												</div>
											</li>
											<li class="card-courses-categories">
												<h5>Event</h5>
												<h4><?php echo htmlentities($result->event);?></h4>
											</li>
											<li class="card-courses-categories">
												<h5>Date</h5>
												<h4><?php echo htmlentities($result->start_date);?></h4>
											</li>
											<li class="card-courses-categories">
												<h5>Time</h5>
												<h4><?php echo htmlentities($result->time11);?></h4>
											</li>
											<li class="card-courses-review">
												<h5>3 Review</h5>
												<ul class="cours-star">
													<li class="active"><i class="fa fa-star"></i></li>
													<li class="active"><i class="fa fa-star"></i></li>
													<li class="active"><i class="fa fa-star"></i></li>
													<li><i class="fa fa-star"></i></li>
													<li><i class="fa fa-star"></i></li>
												</ul>
											</li>
											<li class="card-courses-categories">
												<h5>seat Number</h5>
												<h4><?php echo htmlentities($result->seat_num);?></h4>
											</li>
											<li class="card-courses-categories">
												<h5>Address</h5>
												<h4><?php echo htmlentities($result->address);?></h4>
											</li>
											
											<li class="card-courses-price">
												<h5 class="text-primary"><?php echo htmlentities($result->ticket_price);?> KWD</h5>
											</li>
										</ul>
									</div>
									<div class="row card-courses-dec">
										<div class="col-md-12">
											<h6 class="m-b10">Ticket Description</h6>
											<p><?php echo htmlentities($result->description);?></p>	
										</div>
										<div class="col-md-12">
											
											<?php   if(strlen($_SESSION['login'])==0){ ?>
								<a href="login.php"><button class="btn btn-success">Login To Book</button></a>
<?php }
else{ ?>
<a href="tickets.php?eid=<?php echo htmlentities($result->ticket_id);?>" onClick="return confirm('Are you sure you want to Book?')"><button class="btn btn-success">Book</button></a>
								
								<?php } ?>
										</div>
									</div>
									
								</div>
							</div>
						</div><hr><?php  }}?>
					</div>
				</div>
				<!-- Your Profile Views Chart END-->
			</div>
		</div>
	</main>
	<div class="ttr-overlay"></div>

<!-- External JavaScripts -->
<script src="assets/assets/js/jquery.min.js"></script>
<script src="assets/assets/vendors/bootstrap/js/popper.min.js"></script>
<script src="assets/assets/vendors/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/assets/vendors/bootstrap-select/bootstrap-select.min.js"></script>
<script src="assets/assets/vendors/bootstrap-touchspin/jquery.bootstrap-touchspin.js"></script>
<script src="assets/assets/vendors/magnific-popup/magnific-popup.js"></script>
<script src="assets/assets/vendors/counter/waypoints-min.js"></script>
<script src="assets/assets/vendors/counter/counterup.min.js"></script>
<script src="assets/assets/vendors/imagesloaded/imagesloaded.js"></script>
<script src="assets/assets/vendors/masonry/masonry.js"></script>
<script src="assets/assets/vendors/masonry/filter.js"></script>
<script src="assets/assets/vendors/owl-carousel/owl.carousel.js"></script>
<script src='assets/assets/vendors/scroll/scrollbar.min.js'></script>
<script src="assets/assets/js/functions.js"></script>
<script src="assets/assets/vendors/chart/chart.min.js"></script>
<script src="assets/assets/js/admin.js"></script>
<script src='assets/assets/vendors/switcher/switcher.js'></script>
</body>

<!-- Mirrored from educhamp.themetrades.com/demo/admin/courses.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 22 Feb 2019 13:11:35 GMT -->
</html>