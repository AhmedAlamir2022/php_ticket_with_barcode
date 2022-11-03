<?php
session_start();
error_reporting(0);
include('config.php');
if(strlen($_SESSION['login'])==0)
  { 
header('location:index.php');
}
else{
if(isset($_POST['updateprofile']))
  {
$fullname=$_POST['fullname'];
$contact=$_POST['contact'];
$address=$_POST['address'];
$city=$_POST['city'];
$country=$_POST['country'];
$email=$_SESSION['login'];
$sql="update user set fullname=:fullname,contact=:contact,address=:address,city=:city,country=:country where email=:email";
$query = $dbh->prepare($sql);
$query->bindParam(':fullname',$fullname,PDO::PARAM_STR);
$query->bindParam(':contact',$contact,PDO::PARAM_STR);
$query->bindParam(':address',$address,PDO::PARAM_STR);
$query->bindParam(':city',$city,PDO::PARAM_STR);
$query->bindParam(':country',$country,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->execute();
$msg="Profile Updated Successfully";
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
	<title>Black Market || Profile </title>
	
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
                    <h1 class="text-white">Profile</h1>
				 </div>
            </div>
        </div>
		<!-- Breadcrumb row -->
		<div class="breadcrumb-row">
			<div class="container">
				<ul class="list-inline">
					<li><a href="index.php">Home</a></li>
					<li>Profile</li>
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
									<img src="assets/images/testimonials/pic2.jpg" alt=""/>
								</div>
								<?php 
$useremail=$_SESSION['login'];
$sql = "SELECT * from user where email=:useremail";
$query = $dbh -> prepare($sql);
$query -> bindParam(':useremail',$useremail, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{ ?>
								<div class="profile-info">
									<h4><?php echo htmlentities($result->fullname);?></h4>
									<span><?php echo htmlentities($result->email); }}?></span>
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
											<a class="nav-link active" href="profile.php"><i class="ti-pencil-alt"></i>Edit Profile</a>
										</li>
										<li class="nav-item">
											<a class="nav-link " href="change-password.php"><i class="ti-lock"></i>Change Password</a>
										</li>
										<li class="nav-item">
											<a class="nav-link " href="post-comment.php"><i class="ti-book"></i>Testimonials</a>
										</li>
										<li class="nav-item">
											<a class="nav-link"  href="my-tickets.php"><i class="ti-bookmark-alt"></i>My Tickets </a>
										</li>
										<li class="nav-item">
											<a class="nav-link" href="annonce-ticket.php"><i class="ti-pencil-alt"></i>Annonce Ticket</a>
										</li>
										
									</ul>
								</div>
							</div>
						</div>
						<div class="col-lg-9 col-md-8 " class="tab-pane" id="edit-profile">
							<?php 
$email=$_SESSION['login'];
$sql = "SELECT * from user where email=:email";
$query = $dbh -> prepare($sql);
$query -> bindParam(':email',$email, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{ ?>
						<form class="edit-profile" method="post">
											<div class="">
												<div class="heading-bx left">
								<h2 class="title-head">Profile  <span>Information</span></h2>
							</div>
												<div class="form-group row">
													<label class="col-12 col-sm-3 col-md-3 col-lg-3 col-form-label">Full Name</label>
													<div class="col-12 col-sm-9 col-md-9 col-lg-8">
														<input style="border-radius: 15px;" class="form-control" type="text" value="<?php echo htmlentities($result->fullname);?>" name="fullname">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-12 col-sm-3 col-md-3 col-lg-3 col-form-label">Email Address</label>
													<div class="col-12 col-sm-9 col-md-9 col-lg-8">
														<input style="border-radius: 15px;" class="form-control" type="email" value="<?php echo htmlentities($result->email);?>" readonly name="email">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-12 col-sm-3 col-md-3 col-lg-3 col-form-label">Phone</label>
													<div class="col-12 col-sm-9 col-md-9 col-lg-8">
														<input style="border-radius: 15px;" class="form-control" type="number" value="<?php echo htmlentities($result->contact);?>" name="contact">
														
													</div>
												</div>
												
												
												<div class="form-group row">
													<label class="col-12 col-sm-3 col-md-3 col-lg-3 col-form-label">Address</label>
													<div class="col-12 col-sm-9 col-md-9 col-lg-8">
														<textarea style="border-radius: 15px;" class="form-control" name="address"><?php echo htmlentities($result->address);?></textarea>
													</div>
												</div>
												<div class="form-group row">
													<label class="col-12 col-sm-3 col-md-3 col-lg-3 col-form-label">Country</label>
													<div class="col-12 col-sm-9 col-md-9 col-lg-8">
														<input style="border-radius: 15px;" class="form-control" type="text" value="<?php echo htmlentities($result->country);?>" name="country">
														
													</div>
												</div>
												<div class="form-group row">
													<label class="col-12 col-sm-3 col-md-3 col-lg-3 col-form-label">City</label>
													<div class="col-12 col-sm-9 col-md-9 col-lg-8">
														<input style="border-radius: 15px;" class="form-control" type="text" value="<?php echo htmlentities($result->city);?>" name="city">
														
													</div>
												</div>
												<div class="form-group row">
													<label class="col-12 col-sm-3 col-md-3 col-lg-3 col-form-label">Added Date</label>
													<div class="col-12 col-sm-9 col-md-9 col-lg-8">
														<input style="border-radius: 15px;" class="form-control" type="text" value="<?php echo htmlentities($result->user_added);?>" readonly>
														
													</div>
												</div>
												
											<div class="">
												<div class="">
													<div class="row">
														<div class="col-12 col-sm-3 col-md-3 col-lg-3">
														</div>
														<div class="col-12 col-sm-9 col-md-9 col-lg-">
															<button style="border-radius: 15px;" type="submit" name="updateprofile" class="btn">Update Profile</button>
															
														</div>
													</div>
												</div>
											</div>
										</form><?php }} ?>
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
