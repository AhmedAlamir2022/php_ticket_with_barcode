<?php
session_start();
error_reporting(0);
include('config.php');

	if(isset($_POST['submit11']))
  {
  	$username = $_SESSION['login'];
$ticket_code=$_POST['ticket_code'];
$ticket_price=$_POST['ticket_price'];
$status1=1;
$sql="update tickets set username=:username,ticket_price=:ticket_price,status1=:status1 where ticket_code=:ticket_code";
$query = $dbh->prepare($sql);
$query->bindParam(':username',$username,PDO::PARAM_STR);
$query->bindParam(':ticket_price',$ticket_price,PDO::PARAM_STR);
$query->bindParam(':status1',$status1,PDO::PARAM_STR);
$query->bindParam(':ticket_code',$ticket_code,PDO::PARAM_STR);
$query->execute();
echo "<script>alert('Annonced Successfully, Waiting for event organizer approvement');</script>";
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
	<title>Black Market || Ticket Information </title>
	
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
                    <h1 class="text-white">Ticket Information</h1>
				 </div>
            </div>
        </div>
		<!-- Breadcrumb row -->
		<div class="breadcrumb-row">
			<div class="container">
				<ul class="list-inline">
					<li><a href="index.php">Home</a></li>
					<li>Ticket Information</li>
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
								 								<div class="col-lg-9 col-md-8 " class="tab-pane" id="edit-profile">
							 <?php 
                  //Query for Listing count
                  $ticket_code=$_POST['ticket_code'];
                  $sql = "SELECT *  from tickets where ticket_code=:ticket_code  ";
                  $query = $dbh -> prepare($sql);
                  $query -> bindParam(':ticket_code',$ticket_code, PDO::PARAM_STR);
                  $query->execute();
                  $results=$query->fetchAll(PDO::FETCH_OBJ);
                  $cnt=1;
                  if($query->rowCount() > 0)
                  {
                  foreach($results as $result)
                  {  ?>
						<form class="edit-profile" method="post">
											<div class="">
												<div class="heading-bx left">
								<h2 class="title-head">Ticket  <span>Information</span></h2>
							</div>
							<hr>
												<div class="form-group row">
													<label class="col-12 col-sm-3 col-md-3 col-lg-3 col-form-label">Put Ticket Price</label>
													<div class="col-12 col-sm-9 col-md-9 col-lg-8">
														<input style="border-radius: 15px;" class="form-control" type="number"  name="ticket_price">
													</div>
												</div>
												<div class="">
													<div class="row">
														<div class="col-12 col-sm-3 col-md-3 col-lg-3">
														</div>
														<div class="col-12 col-sm-9 col-md-9 col-lg-">
															<button style="border-radius: 15px;" type="submit" name="submit11" class="btn">Submit</button>
															
														</div>
													</div>
												</div><hr>
												<div class="form-group row">
													<label class="col-12 col-sm-3 col-md-3 col-lg-3 col-form-label">Ticket Code</label>
													<div class="col-12 col-sm-9 col-md-9 col-lg-8">
														<input style="border-radius: 15px;" class="form-control" value="<?php echo htmlentities($result->ticket_code);?>" name="ticket_code" readonly >
													</div>
												</div>

												<div class="form-group row">
													<label class="col-12 col-sm-3 col-md-3 col-lg-3 col-form-label">Ticket Title</label>
													<div class="col-12 col-sm-9 col-md-9 col-lg-8">
														<input style="border-radius: 15px;" class="form-control" value="<?php echo htmlentities($result->ticket_title);?>" readonly >
													</div>
												</div>
												<div class="form-group row">
													<label class="col-12 col-sm-3 col-md-3 col-lg-3 col-form-label">Ticket Event</label>
													<div class="col-12 col-sm-9 col-md-9 col-lg-8">
														<input style="border-radius: 15px;" class="form-control" value="<?php echo htmlentities($result->event);?>" readonly >
													</div>
												</div>
												<div class="form-group row">
													<label class="col-12 col-sm-3 col-md-3 col-lg-3 col-form-label">Address</label>
													<div class="col-12 col-sm-9 col-md-9 col-lg-8">
														<textarea style="border-radius: 15px;" class="form-control" readonly=""><?php echo htmlentities($result->address);?></textarea>
													</div>
												</div>
												<div class="form-group row">
													<label class="col-12 col-sm-3 col-md-3 col-lg-3 col-form-label">Date</label>
													<div class="col-12 col-sm-9 col-md-9 col-lg-8">
														<input style="border-radius: 15px;" class="form-control" value="<?php echo htmlentities($result->start_date);?>" readonly>
													</div>
												</div>
												<div class="form-group row">
													<label class="col-12 col-sm-3 col-md-3 col-lg-3 col-form-label">Time</label>
													<div class="col-12 col-sm-9 col-md-9 col-lg-8">
														<input style="border-radius: 15px;" class="form-control" value="<?php echo htmlentities($result->time11);?>" readonly>
													</div>
												</div>
												<div class="form-group row">
													<label class="col-12 col-sm-3 col-md-3 col-lg-3 col-form-label">Seat Number</label>
													<div class="col-12 col-sm-9 col-md-9 col-lg-8">
														<input style="border-radius: 15px;" class="form-control" value="<?php echo htmlentities($result->seat_num);?>" readonly>
													</div>
												</div>
												<div class="form-group row">
													<label class="col-12 col-sm-3 col-md-3 col-lg-3 col-form-label">Description</label>
													<div class="col-12 col-sm-9 col-md-9 col-lg-8">
														<textarea style="border-radius: 15px;" class="form-control" readonly=""><?php echo htmlentities($result->description);?></textarea>
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
