 <footer>
        <div class="footer-top">
			<div class="pt-exebar">
				<div class="container">
					
				</div>
			</div>
            <div class="container">
                <div class="row">
					<div class="col-lg-6 col-md-12 col-sm-12 footer-col-4">
                        <div class="widget">
                            <h5 class="footer-title">Sign Up For A Newsletter</h5>
                            <div class="subscribe-form m-b20">
								<h5>Put youe email address to get last news</h5>
							<form class="cours-search" method="post">
								<div class="input-group">
									<input type="email" name="subscriberemail" class="form-control" placeholder="Email Address	">
									<div class="input-group-append">
										<button class="btn" type="submit" name="emailsubscibe">Go</button> 
									</div>
								</div>
							</form>
							</div>
                        </div>
                    </div>
					<div class="col-12 col-lg-5 col-md-7 col-sm-12">
						<div class="row">
							<div class="col-3 col-lg-3 col-md-3 col-sm-3">
								<div class="widget footer_widget">
									<h5 class="footer-title">Company</h5>
									<ul>
										<li><a href="index.php">Home</a></li>
										<li><a href="about.php">About</a></li>
										
									</ul>
								</div>
							</div>
							<div class="col-3 col-lg-3 col-md-3 col-sm-3">
								<div class="widget footer_widget">
									<h5 class="footer-title">Get In Touch</h5>
									<ul>
										<li><a href="contact.php">Contact</a></li>

									</ul>
								</div>
							</div>
							<div class="col-3 col-lg-3 col-md-3 col-sm-3">
								<div class="widget footer_widget">
									<h5 class="footer-title">Events & Tickets</h5>
									<ul>
										<li><a href="tickets.php">Tickets</a></li>
										<li><a href="events.php">Events</a></li>
									</ul>
								</div>
							</div>
							<div class="col-3 col-lg-3 col-md-3 col-sm-3">
								<div class="widget footer_widget">
									<h5 class="footer-title">Our Partners</h5>
									<ul>
										<li><a href="new.php">Tickets</a></li>
									</ul>
								</div>
							</div>
						</div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <?php
if(isset($_POST['subscribe']))
{
$subscriberemail=$_POST['subscriberemail'];
$sql ="SELECT SubscriberEmail FROM tblsubscribers WHERE SubscriberEmail=:subscriberemail";
$query= $dbh -> prepare($sql);
$query-> bindParam(':subscriberemail', $subscriberemail, PDO::PARAM_STR);
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query -> rowCount() > 0)
{
echo "<script>alert('Already Subscribed.');</script>";
}
else{
$sql="INSERT INTO  tblsubscribers(SubscriberEmail) VALUES(:subscriberemail)";
$query = $dbh->prepare($sql);
$query->bindParam(':subscriberemail',$subscriberemail,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
echo "<script>alert('Subscribed successfully.');</script>";
}
else 
{
echo "<script>alert('Something went wrong. Please try again');</script>";
}
}
}
?>