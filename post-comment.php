<?php
session_start();
error_reporting(0);
include('config.php');
if(strlen($_SESSION['login'])==0)
  { 
header('location:index.php');
}
else{
if(isset($_POST['post']))
  {
$Testimonial=$_POST['Testimonial'];
$user_email=$_SESSION['login'];
$sql="INSERT INTO  testimonias(user_email,Testimonial) VALUES(:user_email,:Testimonial)";
$query = $dbh->prepare($sql);
$query->bindParam(':Testimonial',$Testimonial,PDO::PARAM_STR);
$query->bindParam(':user_email',$user_email,PDO::PARAM_STR);

$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
  echo "<script>alert('Testimonail submitted successfully');</script>";
}
else 
{
   echo "<script>alert('Something went wrong. Please try again');</script>";
}

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
	<title>Black Market || Post Testimonial </title>
	
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
                    <h1 class="text-white">Post Testimonial</h1>
				 </div>
            </div>
        </div>
		<!-- Breadcrumb row -->
		<div class="breadcrumb-row">
			<div class="container">
				<ul class="list-inline">
					<li><a href="index.php">Home</a></li>
					<li>Post Testimonial</li>
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
											<a class="nav-link " href="profile.php"><i class="ti-pencil-alt"></i>Edit Profile</a>
										</li>
										<li class="nav-item">
											<a class="nav-link " href="change-password.php"><i class="ti-lock"></i>Change Password</a>
										</li>
										<li class="nav-item">
											<a class="nav-link active" href="post-comment.php"><i class="ti-book"></i>Testimonials</a>
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
							
						<form class="edit-profile" name="chngpwd" method="post" onSubmit="return valid();">
											<div class="">
												<div class="heading-bx left">
								<h2 class="title-head">Post New  <span>Testimonial</span></h2>
							</div>
												<div class="form-group row">
													<label class="col-12 col-sm-3 col-md-3 col-lg-3 col-form-label">Testimonial</label>
													<div class="col-12 col-sm-9 col-md-9 col-lg-8">
														<textarea style="border-radius: 15px;" rows="6" class="form-control" name="Testimonial"></textarea>
														
													</div>
												</div>
											<div class="">
												<div class="">
													<div class="row">
														<div class="col-12 col-sm-3 col-md-3 col-lg-3">
														</div>
														<div class="col-12 col-sm-9 col-md-9 col-lg-">
															<button style="border-radius: 15px;" type="submit"  name="post" id="submit" class="btn">Post</button>
															
														</div>
													</div>
												</div>
											</div>
										</form>
									</div>
									<!-- Testimonials ==== -->
			<div class="section-area section-sp2">
				<div class="container">
					<div class="row">
						<div class="col-md-12 heading-bx left">
							<h2 class="title-head text-uppercase">My  <span>Testimonials</span></h2>
						</div>
					</div>
					<div class="testimonial-carousel owl-carousel owl-btn-1 col-12 p-lr0">
						<?php 
                  $user_email=$_SESSION['login'];
                  $sql = "SELECT * from testimonias where user_email=:user_email";
                  $query = $dbh -> prepare($sql);
                  $query -> bindParam(':user_email',$user_email, PDO::PARAM_STR);
                  $query->execute();
                  $results=$query->fetchAll(PDO::FETCH_OBJ);

                  if($cnt=$query->rowCount() > 0)
                  {
                  foreach($results as $result)
                  { ?>
						<div class="item">
							<div class="testimonial-bx">
								<div class="testimonial-thumb">
									<img src="assets/images/testimonials/pic2.jpg" alt="">
								</div>
								<div class="testimonial-info">
									<h5 class="name"></h5>
								</div>
								<div class="testimonial-content">
									<p><?php echo htmlentities($result->Testimonial);?></p>
								</div><br>
								 <?php   
                            if( $result->status ==1){ ?>
                             <p><b>Status : </b><button class="btn btn-success">Active</button> </p>
                              <?php }else if($result->status ==2){ ?>
                               <p><b>Status : </b><button class="btn btn-danger">Cancelled </button> </p>
                           <?php } else{ ?>
                             <p><b>Status : </b><button class="btn btn-warning">Waiting for approval</button></p>
                            <?php } ?>
                             <p><b>Posting Date : </b><?php echo htmlentities($result->posting_date);?> </p>
							</div>
						</div><?php }}?>
					</div>
				</div>
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
