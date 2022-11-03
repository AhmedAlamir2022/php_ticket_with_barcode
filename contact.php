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
	<title>Black Market || Contact Us </title>
	
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
        <div class="page-banner ovbl-dark" style="background-image:url(assets/images/banner/banner3.jpg);">
            <div class="container">
                <div class="page-banner-entry">
                    <h1 class="text-white">Contact Us </h1>
				 </div>
            </div>
        </div>
		<!-- Breadcrumb row -->
		<div class="breadcrumb-row">
			<div class="container">
				<ul class="list-inline">
					<li><a href="index.php">Home</a></li>
					<li>Contact Us </li>
				</ul>
			</div>
		</div>
		<!-- Breadcrumb row END -->
	
        <!-- inner page banner -->
        <div class="page-banner contact-page section-sp2">
            <div class="container">
                <div class="row">
					<div class="col-lg-5 col-md-5 m-b30">
						<div class="bg-primary text-white contact-info-bx">
							<h2 class="m-b10 title-head">Contact <span>Information</span></h2>
							<div class="widget widget_getintuch">	
								<ul>
									<li><i class="ti-location-pin"></i>Kwuiet</li>
									<li><i class="ti-mobile"></i>+965 55255296 (24/7 Support Line)</li>
									<li><i class="ti-email"></i>info@shopblackmarket.com</li>
								</ul>
							</div>
							<h5 class="m-t0 m-b20">Follow Us</h5>
							<ul class="list-inline contact-social-bx">
								<li><a href="#" class="btn outline radius-xl"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#" class="btn outline radius-xl"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#" class="btn outline radius-xl"><i class="fa fa-linkedin"></i></a></li>
								<li><a href="#" class="btn outline radius-xl"><i class="fa fa-google-plus"></i></a></li>
							</ul>
						</div>
					</div>
					<div class="col-lg-7 col-md-7 " class="tab-pane" id="edit-profile">
						<form class="edit-profile" method="post">
											<div class="">
												<div class="heading-bx left">
								<h2 class="title-head">Get In <span>Touch</span></h2>
							</div>
												<div class="form-group row">
													<label class="col-12 col-sm-3 col-md-3 col-lg-2 col-form-label">Full Name</label>
													<div class="col-12 col-sm-9 col-md-9 col-lg-7">
														<input style="border-radius: 15px;" class="form-control" type="text" name="fullname">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-12 col-sm-3 col-md-3 col-lg-2 col-form-label">Email Address</label>
													<div class="col-12 col-sm-9 col-md-9 col-lg-7">
														<input style="border-radius: 15px;" class="form-control" type="email" name="email">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-12 col-sm-3 col-md-3 col-lg-2 col-form-label">Phone</label>
													<div class="col-12 col-sm-9 col-md-9 col-lg-7">
														<input style="border-radius: 15px;" class="form-control" type="number" name="contact">
														
													</div>
												</div>
												<div class="form-group row">
													<label class="col-12 col-sm-3 col-md-3 col-lg-2 col-form-label">Subject</label>
													<div class="col-12 col-sm-9 col-md-9 col-lg-7">
														<input style="border-radius: 15px;" class="form-control" type="text" name="subject">
													</div>
												</div>
												
												
												<div class="form-group row">
													<label class="col-12 col-sm-3 col-md-3 col-lg-2 col-form-label">Message</label>
													<div class="col-12 col-sm-9 col-md-9 col-lg-7">
														<textarea style="border-radius: 15px;" class="form-control" name="message"></textarea>
													</div>
												</div>
												
											<div class="">
												<div class="">
													<div class="row">
														<div class="col-12 col-sm-3 col-md-3 col-lg-2">
														</div>
														<div class="col-12 col-sm-9 col-md-9 col-lg-7">
															<button style="border-radius: 15px;" type="submit" name="send1" class="btn">Submit</button>
															
														</div>
													</div>
												</div>
											</div>
										</form>
						
						<?php
				
				if(isset($_POST['send1'])){
      $fullname=$_POST['fullname'];
      $email=$_POST['email'];
      $contact=$_POST['contact'];
      $subject=$_POST['subject'];
      $message=$_POST['message'];
      $sql="INSERT INTO  contactquery(fullname,email,contact,subject,message) VALUES(:fullname,:email,:contact,:subject,:message)";
      $query = $dbh->prepare($sql);
      $query->bindParam(':fullname',$fullname,PDO::PARAM_STR);
      $query->bindParam(':email',$email,PDO::PARAM_STR);
      $query->bindParam(':contact',$contact,PDO::PARAM_STR);
      $query->bindParam(':subject',$subject,PDO::PARAM_STR);
      $query->bindParam(':message',$message,PDO::PARAM_STR);
      $query->execute();
      $lastInsertId = $dbh->lastInsertId();
      if($lastInsertId){
      	echo "<script>alert('Query Sent. We will contact you shortly');</script>";
      }else {
      	echo "<script>alert('Something went wrong. Please try again');</script>";
      }

  }
				?>
					</div>
				</div>
            </div>
		</div>
        <!-- inner page banner END -->
    </div>
    <!-- Content END-->
    <!-- Footer ==== -->
    <?php include('footer.php');?>
    <!-- Footer END ==== -->
    <!-- scroll top button -->
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
<script src='../../www.google.com/recaptcha/api.js'></script>
</body>


</html>
