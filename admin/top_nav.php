            <!-- top navigation -->
            <div class="top_nav">

                <div class="nav_menu">
                    <nav class="" role="navigation">
                        
                        <div class="nav toggle">
                            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                        </div>
                        <ul class="nav navbar-nav navbar-right collapse navbar-collapse" id="menu_toggle">

                            <?php
                            	include('include/dbcon.php');
                            	$user_query=mysqli_query($con,"select * from admin where admin_id='$id_session'")or die(mysqli_error($con));
                            	$row=mysqli_fetch_array($user_query); {
                            ?>
                            <li class="">
                                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    
									<?php if($row['admin_image'] != ""): ?>
									<img src="upload/<?php echo $row['admin_image']; ?>">
									<?php else: ?>
									<img src="images/user.png">
									<?php endif; ?>	<?php echo $row['firstname']; ?>
                                    <span class=" fa fa-angle-down"></span>
                                </a>
                                <ul class="dropdown-menu dropdown-usermenu animated fadeInDown pull-right">
                                    <li>
                                        <a href="change-password.php"><i class="fa fa-lock pull-right"></i>Change Pass</a>
                                    </li>
                                    <li>
										<a href="logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav navbar-nav navbar-left"> <h4 style="font-weight: bold;padding-left: 20px;">Admin Dashboard</h4> </li>
<?php } ?>

                        </ul>
                    </nav>
                </div>

            </div>
            <!-- /top navigation -->