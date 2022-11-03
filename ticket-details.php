<?php 
session_start();
error_reporting(0);
include('config.php');
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
	<title>Black Market || Ticket Deatails  </title>
	
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
<!-- Header Top ==== -->
    <?php include ('header1.php');?>
    <!-- header END ==== -->
    <!-- Content -->
    <div class="page-content bg-white">
        <!-- inner page banner -->
        <div class="page-banner ovbl-dark" style="background-image:url(assets/images/banner/banner2.jpg);">
            <div class="container">
                <div class="page-banner-entry">
                    <h1 class="text-white">Ticket Details</h1>
				 </div>
            </div>
        </div>
		<!-- Breadcrumb row -->
		<div class="breadcrumb-row">
			<div class="container">
				<ul class="list-inline">
					<li><a href="index.php">Home</a></li>
					<li>Ticket Details</li>
				</ul>
			</div>
		</div>
		<!-- Breadcrumb row END -->
        <!-- inner page banner END -->
		<div class="content-block">
            <!-- About Us -->
			<div class="section-area section-sp1">
                <div class="container">
                	<?php 
$vhid=intval($_GET['vhid']);
$sql = "SELECT events.title,ttypes.ttype,tickets.*  from tickets join events on events.event_id=tickets.event
join ttypes on ttypes.type_id=tickets.ticket_type where tickets.ticket_id=:vhid";
$query = $dbh -> prepare($sql);
$query->bindParam(':vhid',$vhid, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{   
?>  
					 <div class="row d-flex flex-row-reverse">
						<div class="col-lg-3 col-md-4 col-sm-12 m-b30">
							<div class="course-detail-bx">
								<div class="course-price">
									<h4 class="price">(KWD)<?php echo htmlentities($result->ticket_price);?></h4>
								</div>	
								
								
								
							</div>
						</div>
					
						<div class="col-lg-9 col-md-8 col-sm-12">
							<div class="courses-post">
								<div class="ttr-post-media media-effect">
									<a href="#"><img src="admin/upload/<?php echo htmlentities($result->image);?>" alt=""></a>
								</div>
								<div class="ttr-post-info">
									<div class="ttr-post-title ">
										<h2 class="post-title"><?php echo htmlentities($result->ticket_title);?></h2>
									</div>
									<div class="ttr-post-text">
										<p><?php echo htmlentities($result->description);?></p>
									</div>
								</div>
							</div>
							<div class="courese-overview" id="overview">
								<h4>Overview</h4>
								<div class="row">
									<div class="col-md-12 col-lg-12">
										<ul class="course-features">
											<li><i class="ti-help-alt"></i> <span class="label">Added By</span> <span class="value"><?php if($result->added_by == 1){ echo "User";} else{echo "Event Organizer";}?></span></li>
											<li><i class="ti-book"></i> <span class="label">Event</span> <span class="value"><?php echo htmlentities($result->title);?></span></li>
											<li><i class="ti-book"></i> <span class="label">Ticket Type</span> <span class="value"><?php echo htmlentities($result->ttype);?></span></li>
											<li><i class="ti-help-alt"></i> <span class="label">Status</span> <span class="value"><?php echo htmlentities($result->status);?></span></li>
											<li><i class="ti-time"></i> <span class="label">Duration</span> <span class="value"><?php echo htmlentities($result->duration);?> hours</span></li>
											<li><i class="ti-time"></i> <span class="label">Date</span> <span class="value"><?php echo htmlentities($result->start_date);?> </span></li>
											<li><i class="ti-time"></i> <span class="label">Time</span> <span class="value"><?php echo htmlentities($result->time11);?> </span></li>
											<li><i class="ti-smallcap"></i> <span class="label">Address</span> <span class="value"><?php echo htmlentities($result->address);?></span></li>
											<li><i class="ti-user"></i> <span class="label">Seat Number</span> <span class="value"><?php echo htmlentities($result->seat_num);?></span></li>
											<li><i class="ti-check-box"></i> <span class="label">Country</span> <span class="value"><?php echo htmlentities($result->country);?></span></li>
											
										</ul>
									</div>
									
								</div>
							</div>
						</div>
						
					</div><?php }} ?>
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
<script src="assets/js/jquery.scroller.js"></script>
<script src="assets/js/functions.js"></script>
<script src="assets/js/contact.js"></script>
<script src="assets/vendors/switcher/switcher.js"></script>
</body>

</html>
