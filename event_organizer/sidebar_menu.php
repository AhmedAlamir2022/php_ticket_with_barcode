            <!-- sidebar navigation -->
            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">

                    <div class="navbar nav_title" style="border: 0;">
                        <a href="home.php" class="site_title"><i class="fa fa-university"></i> <span>Black Market</span></a>
                    </div>
                    <div class="clearfix" style="margin-bottom: 0px"></div>

                    <!-- menu prile quick info -->
					
                        <?php
                        	include('../admin/include/dbcon.php');
                        	$user_query=mysqli_query($con,"select *  from event_organizer where id='$id_session'")or die(mysqli_error($con));
                        	$row=mysqli_fetch_array($user_query); {
                        ?>
                        <a href='profile.php<?php echo '?id='.$row['id']; ?>'>
                        <div class="profile">
                        <div class="profile_pic" style="margin-left: 0px">
									<?php if($row['image'] != ""): ?>
									<img src="../admin/upload/<?php echo $row['image']; ?>" style="height:85px; width:80px;border: 1px solid white;padding: 1px">
                                    <?php else: ?>
                                    <img src="../admin/images/user.png" style="height:85px; width:80px;" class="img-circle profile_img">
                                    <?php endif; ?>  
                        </div>

                        <div class="profile_info" align="center">
                            <span>Welcome</span>
                            <h2><?php echo $row['first_name']; ?></h2>
                        </div>
                        <?php } ?>
                    </div>
					</a>
                    <!-- /menu prile quick info -->

                    <br />

                    <!-- sidebar menu -->
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

                        <div class="menu_section">
							<h3 style="margin-top:85px;">File Information</h3>
							<div class="separator"></div>
                            <ul class="nav side-menu">
                                <li>
									<a href="home.php"><i class="fa fa-home"></i> Home</a>
                                </li>
                            </ul>
                        </div>
                        <div class="menu_section">
                            <h3>Transaction Information</h3>
							<div class="separator"></div>
                            <ul class="nav side-menu">
                                <li>
                                    <a href="event.php"><i class="fa fa-edit"></i> Events</a>
                                </li>
                                <li>
                                    <a href="type.php"><i class="fa fa-edit"></i> Types</a>
                                </li>
                                <li>
                                    <a href="tickets.php"><i class="fa fa-ticket"></i> Tickets</a>
                                </li>
                                <li>
                                    <a href="change-password.php"><i class="fa fa-lock"></i> Change Password</a>
                                </li>
                                <li>
                                    <a href="logout.php"><i class="fa fa-sign-out"></i> Logout</a>
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>