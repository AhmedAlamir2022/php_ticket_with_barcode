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
	<title>Black Market || Tickets </title>
	
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
                    <h1 class="text-white">Our Tickets</h1>
				 </div>
            </div>
        </div>
		<!-- Breadcrumb row -->
		<div class="breadcrumb-row">
			<div class="container">
				<ul class="list-inline">
					<li><a href="index.php">Home</a></li>
					<li>Our Tickets</li>
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
							<div class="widget courses-search-bx placeani">
								<div class="form-group">
									<div class="input-group">
										<form action="search-results.php" method="post">
                            <input type="text" name="search2" class="form-control" placeholder="Search By Date">
                            <span><button class="btn btn-primary " type="submit" name="search3" ><i class="fa fa-search"></i>&nbsp; search</button></span>
                            
                        </form>
										
									</div>
								</div>
							</div>
							<div class="widget widget_archive">
                                <h5 class="widget-title style-1">All Events</h5>
                                <ul>
                                	<?php $sql = "SELECT category.cat_name as catname,events.*  from events join category on category.cat_id=events.category_id";
								$query = $dbh -> prepare($sql);
								$query->execute();
								$results=$query->fetchAll(PDO::FETCH_OBJ);
								$cnt=1;
								if($query->rowCount() > 0)
								{
								foreach($results as $result)
								{  
								?> 
                                    <li><a href="eventgo.php?cid=<?php echo htmlentities($result->event_id);?>"><?php echo htmlentities($result->title);?></a></li>
                                    <?php }}?>
                                </ul>
                            </div>
                            <hr>
						</div>
						<div class="col-lg-9 col-md-8 col-sm-12">
							<div class="row">
								<?php 
								$status="Available";
								$sql = "SELECT ttypes.ttype,tickets.*  from tickets join ttypes on ttypes.type_id=tickets.ticket_type where remark=:status";
								$query = $dbh -> prepare($sql);
								$query -> bindParam(':status',$status, PDO::PARAM_STR);
								$query->execute();
								$results=$query->fetchAll(PDO::FETCH_OBJ);
								$cnt=1;
								if($query->rowCount() > 0)
								{
								foreach($results as $result)
								{  ?>
								<div class="col-md-6 col-lg-4 col-sm-6 m-b30">
									<div class="cours-bx">
										<div class="action-box">
											<img src="admin/upload/<?php echo htmlentities($result->image);?>" alt="">
											<a href="ticket-details.php?vhid=<?php echo htmlentities($result->ticket_id);?>" class="btn">Read More</a>
										</div>
										<div class="info-bx text-center">
											<h5><a href="ticket-details.php?vhid=<?php echo htmlentities($result->ticket_id);?>"><?php echo htmlentities($result->ticket_title);?></a></h5>
										</div>
										<div class="cours-more-info">
											<div class="price">
												<p><?php echo htmlentities($result->ttype);?></p>
												
											</div>

											<div class="price">
												<h5>(KWD)<?php echo htmlentities($result->ticket_price);?></h5>
												<h5><?php   if(strlen($_SESSION['login'])==0){ ?>
								<a href="login.php"><button class="btn btn-success">Login To Book</button></a>
<?php }
else{ ?>
<a href="tickets.php?eid=<?php echo htmlentities($result->ticket_id);?>" onClick="return confirm('Are you sure you want to Book?')"><button class="btn btn-success">Book</button></a>
								
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
