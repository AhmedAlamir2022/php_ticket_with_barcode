            <!-- sidebar navigation -->
            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">

                    <div class="navbar nav_title" style="border: 0;">
                        <a href="home.php" class="site_title"><i class="fa fa-university"></i> <span>Black Market</span></a>
                    </div>
                    <div class="clearfix" style="margin-bottom: 0px"></div>

                    <!-- menu prile quick info -->
					
                        <?php
                        	include('include/dbcon.php');
                        	$user_query=mysqli_query($con,"select *  from admin where admin_id='$id_session'")or die(mysqli_error($con));
                        	$row=mysqli_fetch_array($user_query); {
                        ?>
                        <a href='profile.php<?php echo '?admin_id='.$row['admin_id']; ?>'>
                        <div class="profile">
                        <div class="profile_pic" style="margin-left: 0px">
									<?php if($row['admin_image'] != ""): ?>
									<img src="upload/<?php echo $row['admin_image']; ?>" style="height:85px; width:80px;border: 1px solid white;padding: 1px">
                                    <?php else: ?>
                                    <img src="images/user.png" style="height:85px; width:80px;" class="img-circle profile_img">
                                    <?php endif; ?>  
                        </div>

                        <div class="profile_info" align="center">
                            <span>Welcome</span>
                            <h2><?php echo $row['firstname']; ?></h2>
                        </div>
                        <?php } ?>
                    </div>
					</a>
                    <!-- /menu prile quick info -->

                    <br />

                    <!-- sidebar menu -->
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

                        <div class="menu_section">
							<h3 style="margin-top:85px;">Members Information</h3>
							<div class="separator"></div>
                            <ul class="nav side-menu">
                                <li>
									<a href="home.php"><i class="fa fa-home"></i> Home</a>
                                </li>
                                <li>
                                    <a href="admin.php"><i class="fa fa-user"></i> Admin </a>
                                </li>
                                <li>
									<a href="event_organizer.php"><i class="fa fa-users"></i> Event Organizers</a>
                                </li>
                                <li>
                                    <a href="event_log_in.php"><i class="fa fa-history"></i> Event Organizer Record</a>
                                </li>
                                <li>
                                    <a href="user.php"><i class="fa fa-user"></i> Users</a>
                                </li>
                               
                            </ul>
                        </div>
                        <div class="menu_section">
                            <h3>Transaction Information</h3>
							<div class="separator"></div>
                            <ul class="nav side-menu">
                                <li>
                                    <a href="event_category.php"><i class="fa fa-edit"></i> Event category</a>
                                </li>
                                <li>
                                    <a href="event.php"><i class="fa fa-edit"></i> Events</a>
                                </li>
                                <li>
                                    <a href="tickets.php"><i class="fa fa-ticket"></i> Tickets</a>
                                </li>
                                <li>
                                    <a href="report.php"><i class= "fa fa-file"></i>Tickets Reports</a>
                                </li>
                                <li>
                                    <a href="testimonials.php"><i class= "fa fa-file"></i>Testimonials</a>
                                </li>
                                <li>
                                    <a href="contact_query.php"><i class= "fa fa-file"></i>Contact Query</a>
                                </li>
                                <li>
                                    <a href="logout.php"><i class="fa fa-sign-out"></i> Log Out</a>
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>