<?php
	session_start();
	error_reporting(0);
	include('config.php');
	if(isset($_POST['signup']))
	{
		$fullname=$_POST['fullname'];
		$country=$_POST['country'];
		$isd_code=$_POST['isd_code'];
		$email=$_POST['email']; 
		$contact=$_POST['contact'];
		$password=md5($_POST['password']); 
		$sql="INSERT INTO  user(fullname,country,isd_code,email,contact,password) VALUES(:fullname,:country,:isd_code,:email,:contact,:password)";
		$query = $dbh->prepare($sql);
		$query->bindParam(':fullname',$fullname,PDO::PARAM_STR);
		$query->bindParam(':country',$country,PDO::PARAM_STR);
		$query->bindParam(':isd_code',$isd_code,PDO::PARAM_STR);
		$query->bindParam(':email',$email,PDO::PARAM_STR);
		$query->bindParam(':contact',$contact,PDO::PARAM_STR);
		$query->bindParam(':password',$password,PDO::PARAM_STR);
		$query->execute();
		$lastInsertId = $dbh->lastInsertId();
		if($lastInsertId){
		echo "<script>alert('Registration successfull. Now you can login');</script>";
		echo "<script type='text/javascript'> document.location = 'login.php'; </script>";
		}else {
		echo "<script>alert('Something went wrong. Please try again');</script>";
		}
	}

?>
<?php

require 'config1.php';
$sql = "SELECT `countries_id`, `countries_name`, `countries_iso_code`, `countries_isd_code` "
        . " FROM `countries` WHERE 1 "
        . " ORDER BY countries_name ASC";
try {
    $stmt = $DB->prepare($sql);
    $stmt->execute();
    $results = $stmt->fetchAll();
} catch (Exception $ex) {
    echo($ex->getMessage());
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
	<title>Black Market || Register </title>
	
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
	<script>
function checkAvailability() {
$("#loaderIcon").show();
jQuery.ajax({
url: "check_availability.php",
data:'email='+$("#email").val(),
type: "POST",
success:function(data){
$("#user-availability-status").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}
</script>
<script type="text/javascript">
function valid()
{
if(document.signup.password.value!= document.signup.confirmpassword.value)
{
alert("Password and Confirm Password Field do not match  !!");
document.signup.confirmpassword.focus();
return false;
}
return true;
}
</script>
	<script type="text/javascript">
            // fetching records
            function displayRecords(country_iso_code) {
                var country_iso_code = $.trim(country_iso_code);
                if (country_iso_code.length > 0) {
                    $.ajax({
                        type: "GET",
                        url: "getvalue.php",
                        data: "isocode=" + country_iso_code,
                        cache: false,
                        beforeSend: function() {
                            $('.loader').html('<img src="loader.gif" alt="" width="24" height="24"" >');
                        },
                        success: function(html) {
                            $("#results").html(html);
                            // parsing the json results
                            var parsedData = jQuery.parseJSON(html);
                            // resetting the values
                            $('#isd_code').val('');
                            $('#cflag').attr("src", "");
                            $('#cname').html('');
                            // checking if there are results or not
                            if (Object.keys(parsedData).length > 0) {
                                $('#isd_code').val($.trim(parsedData.c_isd));
                                $('#cflag').attr("src", "flags/"+$.trim(parsedData.c_iso)+".png");
                                $('#cname').html($.trim(parsedData.c_name));
                            }
                            $('.loader').html('');
                            
                        }
                    });
                } else {
                    // setting the default values
                    $('#isd_code').val('');
                    $('#cflag').attr("src", "");
                    $('#cname').html('');
                }
            }
        </script>
	
</head>
<body id="bg">
<div class="page-wraper">
	<div id="loading-icon-bx"></div>
	<div class="account-form">
		<div class="account-head" style="background-image:url(assets/images/background/bg2.jpg);">
			
		</div>
		<div class="account-form-inner">
			<div class="account-container">
				<div class="heading-bx left">
					<h2 class="title-head">Sign Up <span>Now</span></h2>
					<p>Login Your Account <a href="login.php">Click here</a></p>
				</div>	
				<form class="contact-bx" method="post" name="signup" onSubmit="return valid();">
					<div class="row placeani">
						<div class="col-lg-12">
							<div class="form-group">
								<div class="input-group">
									<label>Your Name</label>
									<input name="fullname" type="text" required="" class="form-control">
								</div>
							</div>
						</div>
						<div class="col-lg-12">
							 
						</div>
						<div class="col-lg-12">
							<div class="form-group">
								<div class="input-group">
									<label>Phone Number</label>
									<input name="contact" type="number" required="" class="form-control">
								</div>
							</div>
						</div>
						<div class="col-lg-12">
							<div class="form-group">
								<div class="input-group">
									<label>Your Email Address</label>
									<input name="email" id="email" onBlur="checkAvailability()" type="email" required="" class="form-control">
									<span id="user-availability-status" style="font-size:12px;"></span>
								</div>
							</div>
						</div>
						<div class="col-lg-12">
							<div class="form-group">
								<div class="input-group"> 
									<label>Your Password</label>
									<input name="password" type="password" class="form-control" required="">
								</div>
							</div>
						</div>
						<div class="col-lg-12">
							<div class="form-group">
								<div class="input-group"> 
									<label>Confirm Password</label>
									<input id="confirmpassword" name="confirmpassword" type="password" class="form-control" required="">
								</div>
							</div>
						</div>
						<table>
                        <tr>
                            
                            <td style="width: 50%;">
                                <select name="country" id="country" style="max-width: 300px;" onchange="displayRecords(this.value);">
                                    <option value="">Select</option>
                                    <?php foreach ($results as $rs) { ?>
                                        <option value="<?php echo trim($rs["countries_iso_code"]); ?>"><?php echo trim($rs["countries_name"]); ?></option>
                                    <?php } ?>
                                </select>
                            </td>
                            <td><div class="loader" style="width: 33px"></div></td>
                            <td><input type="text" id="isd_code" placeholder="ISD CODE" name="isd_code" value="" readonly=""></td>
                        </tr>
                    </table>
						<div class="col-lg-12 m-b30">
							<button name="signup" type="submit"  class="btn button-md">Sign Up</button>
						</div>
						 <?php 
                                 if(isset($_GET['error'])) {
                                    echo $_GET['error']; }
                                 ?> 
						
					</div>
				</form>
			</div>
		</div>
	</div>
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
