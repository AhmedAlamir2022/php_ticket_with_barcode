<?php
session_start();
error_reporting(0);
include('config.php');
if(strlen($_SESSION['login'])==0)
  { 
header('location:index.php');
}
else{

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
	<title>Black Market || Checkout </title>
	
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
    <?php include('header1.php');?>
    <!-- header END ==== -->
    <!-- Content -->
    <div class="page-content bg-white">
        <!-- inner page banner -->
        <div class="page-banner ovbl-dark" style="background-image:url(assets/images/banner/banner1.jpg);">
            <div class="container">
                <div class="page-banner-entry">
                    <h1 class="text-white">Checkout</h1>
				 </div>
            </div>
        </div>
		<!-- Breadcrumb row -->
		<div class="breadcrumb-row">
			<div class="container">
				<ul class="list-inline">
					<li><a href="index.php">Home</a></li>
					<li>Checkout</li>
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
						<div class="col-lg-3 col-md-4 col-sm-12 m-b30">
							<div class="profile-bx text-center">
								<div class="user-profile-thumb">
									<img src="assets/images/profile/pic1.jpg" alt=""/>
								</div>
								<div class="profile-info">
									<h4>Mark Andre</h4>
									<span>mark.example@info.com</span>
								</div>
								<div class="profile-social">
									<ul class="list-inline m-a0">
										<li><a href="#"><i class="fa fa-facebook"></i></a></li>
										<li><a href="#"><i class="fa fa-twitter"></i></a></li>
										<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
										<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
									</ul>
								</div>
								<div class="profile-tabnav">
									<ul class="nav nav-tabs">
										<li class="nav-item">
											<a class="nav-link " href="profile.php"><i class="ti-pencil-alt"></i>Edit Profile</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" href="change-password.php"><i class="ti-lock"></i>Change Password</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" href="post-comment.php"><i class="ti-book"></i>Testimonials</a>
										</li>
										<li class="nav-item">
											<a class="nav-link"  href="my-tickets.php"><i class="ti-bookmark-alt"></i>My Tickets </a>
										</li>
										
									</ul>
								</div>
							</div>
						</div>
						<div class="col-lg-9 col-md-8 " class="tab-pane" id="edit-profile">
							
						<form class="edit-profile" method="post">
											<div class="">
												<div class="heading-bx left">
								<h2 class="title-head">Check<span>out</span></h2>
							</div>
							<div class="form-group row">
								<label class="col-12 col-sm-3 col-md-3 col-lg-3 col-form-label">Select Bank</label>
								<div class="col-12 col-sm-9 col-md-9 col-lg-8">
									<select class="form-control" style="border-radius: 15px;"  tabindex="-1" required="required">
										<option value="">Select Bank</option>
										<option value="">National Bank Of Kuwait</option>
										<option value="">kuwait Finance House</option>
										<option value="">Burgan Bank</option>
										<option value="">Gulf Bank</option>
									</select>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-12 col-sm-3 col-md-3 col-lg-3 col-form-label">Card Number</label>
								<div class="col-12 col-sm-9 col-md-9 col-lg-8">
									<input style="border-radius: 15px;" class="form-control" type="number" maxlength="12" minlength="12" required="" >
								</div>
							</div>
							<div class="form-group row">
								<label class="col-12 col-sm-3 col-md-3 col-lg-3 col-form-label">Expiration Date</label>
								<div class="col-12 col-sm-9 col-md-9 col-lg-8">
									<input style="border-radius: 15px;" class="form-control" type="date"  required="">
								</div>
							</div>
							<div class="form-group row">
								<label class="col-12 col-sm-3 col-md-3 col-lg-3 col-form-label">PIN</label>
								<div class="col-12 col-sm-9 col-md-9 col-lg-8">
									<input style="border-radius: 15px;" class="form-control" type="number"  required="">
								</div>
							</div>
							<div class="">
								<div class="">
									<div class="row">
										<div class="col-12 col-sm-3 col-md-3 col-lg-3"></div>
										<div class="col-12 col-sm-9 col-md-9 col-lg-">
											<button style="border-radius: 15px;" type="submit" name="submit" class="btn">Submit</button>
										</div>
									</div>
								</div>
							</div>
						</form>
						<?php
                       if(isset($_POST['submit']))
  {
$checkout='1';
$id=intval($_GET['id']);

$sql="update tickets set checkout=:checkout where ticket_id=:id ";
$query = $dbh->prepare($sql);
$query->bindParam(':checkout',$checkout,PDO::PARAM_STR);
$query->bindParam(':id',$id,PDO::PARAM_STR);
$query->execute();
echo "<script type='text/javascript'> alert('Done');</script>";
}?>
					</div>
						
									
								</div> 
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

</html><?php } ?>
