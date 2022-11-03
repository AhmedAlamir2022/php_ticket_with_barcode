<header class="header rs-nav ">
		<div class="top-bar">
			<div class="container">
				<div class="row d-flex justify-content-between">
					<div class="topbar-left">
						<ul>
							<li><a href="contact.php"><i class="fa fa-question-circle"></i>Ask a Question</a></li>
							<li><a href="javascript:;"><i class="fa fa-envelope-o"></i>info@shopblackmarket.com</a></li>
						</ul>
					</div>
					<div class="topbar-right">
						<ul>
							<?php   if(strlen($_SESSION['login'])==0)
							  { ?>
							<li><a href="login.php">Login</a></li>
							<li><a href="register.php">Register</a></li>
							<?php }
							else{ ?>
							<li>Wlecome To Black Market</li>
							<?php } ?>
							
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="sticky-header navbar-expand-lg">
            <div class="menu-bar clearfix">
                <div class="container clearfix">
					<!-- Header Logo ==== -->
					<div class="menu-logo">
						<a href="index.php"><img src="assets/logo.png" alt=""></a>
					</div>
					<!-- Mobile Nav Button ==== -->
                    <button class="navbar-toggler collapsed menuicon justify-content-end" type="button" data-toggle="collapse" data-target="#menuDropdown" aria-controls="menuDropdown" aria-expanded="false" aria-label="Toggle navigation">
						<span></span>
						<span></span>
						<span></span>
					</button>
					<!-- Author Nav ==== -->
                    <div class="secondary-menu">
                        <div class="secondary-inner">
                            <ul>
								<li><a href="javascript:;" class="btn-link"><i class="fa fa-facebook"></i></a></li>
								<li><a href="javascript:;" class="btn-link"><i class="fa fa-google-plus"></i></a></li>
								<li><a href="javascript:;" class="btn-link"><i class="fa fa-linkedin"></i></a></li>
								<!-- Search Button ==== -->
								<li class="search-btn"><button id="quik-search-btn" type="button" class="btn-link"><i class="fa fa-search"></i></button></li>
							</ul>
						</div>
                    </div>
					<!-- Search Box ==== -->
                    <div class="nav-search-bar">
                        <form action="search-results.php" method="post">
                            <input type="text" name="search1" class="form-control" placeholder="Type to search">
                            <span><button class="btn btn-primary " type="submit" name="search" ><i class="fa fa-search"></i>&nbsp; search</button></span>
                            
                        </form>
						<span id="search-remove"><i class="ti-close"></i></span>
                    </div>
					<!-- Navigation Menu ==== -->
                    <div class="menu-links navbar-collapse collapse justify-content-start" id="menuDropdown">
						<div class="menu-logo">
							<a href="index.php"><img src="assets/logo.png" alt=""></a>
						</div>
                        <ul class="nav navbar-nav">
							<li><a href="index.php">Home </a></li>
							<li><a href="about.php">About </a></li>
							<li><a href="events.php">Events </a></li>
							<li><a href="tickets.php">Tickets</a></li>
							<li><a href="contact.php">Contact Us</a></li>
							<?php   if(strlen($_SESSION['login'])==0)
							  { }else{ ?>
							  <?php 
$email=$_SESSION['login'];
$sql ="SELECT fullname FROM user WHERE email=:email ";
$query= $dbh -> prepare($sql);
$query-> bindParam(':email', $email, PDO::PARAM_STR);
$query-> execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
foreach($results as $result)
    {?>
							<li><a href="javascript:;"><?php echo htmlentities($result->fullname); }}?> <i class="fa fa-chevron-down"></i></a>
								<ul class="sub-menu">
									<li><a href="profile.php">Profile</a></li>
									<li><a href="change-password.php">Change Password</a></li>
									<li><a href="post-comment.php">Testimonials</a></li>
									<li><a href="my-tickets.php">My Tickets</a></li>
									<li><a href="annonce-ticket.php">Annonce Ticket</a></li>
									<li><a href="logout.php">Logout</a></li>
								</ul>
							</li><?php } ?>
							
							
						</ul>
						<div class="nav-social-link">
							<a href="javascript:;"><i class="fa fa-facebook"></i></a>
							<a href="javascript:;"><i class="fa fa-google-plus"></i></a>
							<a href="javascript:;"><i class="fa fa-linkedin"></i></a>
						</div>
                    </div>
					<!-- Navigation Menu END ==== -->
                </div>
            </div>
        </div>
    </header>