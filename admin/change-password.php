<?php ob_start(); ?>
<?php

            include ('include/dbcon.php');
            include ('header.php');

                
?>
<script type="text/javascript">
        function valid()
        {
            if(document.chngpwd.cpass.value=="")
            {
                alert("Current Password Filed is Empty !!");
                document.chngpwd.cpass.focus();
                return false;
            }
            else if(document.chngpwd.npass.value=="")
            {
                alert("New Password Filed is Empty !!");
                document.chngpwd.npass.focus();
                return false;
            }
            else if(document.chngpwd.cfpass.value=="")
            {
                alert("Confirm Password Filed is Empty !!");
                document.chngpwd.cfpass.focus();
                return false;
            }
            else if(document.chngpwd.npass.value!= document.chngpwd.cfpass.value)
            {
                alert("Password and Confirm Password Field do not match  !!");
                document.chngpwd.cfpass.focus();
                return false;
            }
        return true;
        }
        </script>

        <div class="page-title">
            <div class="title_left">
                <h3>
                    <small>Home / admin /</small> Change Password
                </h3>
            </div>
        </div>
        <div class="clearfix"></div>
       
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2><i class="fa fa-lock"></i> Change Password</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <!-- content starts here -->

                            <form name="chngpwd" method="post" onSubmit="return valid();"" class="form-horizontal form-label-left">
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="cpass">Current Password <span class="required" style="color:red;">*</span>
                                    </label>
                                    <div class="col-md-4">
                                        <input type="password" name="cpass" id="cpass" required="required" class="form-control col-md-7 col-xs-12" placeholder="Current Password">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="npass">New Password <span class="required" style="color:red;">*</span>
                                    </label>
                                    <div class="col-md-4">
                                        <input type="password" name="npass" id="npass" required="required" class="form-control col-md-7 col-xs-12" placeholder="New Password">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="cfpass">Confirm Password <span class="required" style="color:red;">*</span>
                                    </label>
                                    <div class="col-md-4">
                                        <input type="password" name="cfpass" id="cfpass" required="required" class="form-control col-md-7 col-xs-12" placeholder="Confirm Password">
                                    </div>
                                </div>
                                
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                        <a href="home.php"><button type="button" class="btn btn-primary"><i class="fa fa-times-circle-o"></i> Cancel</button></a>
                                        <button type="submit" name="submit" class="btn btn-success"><i class="fa fa-plus-square"></i> Submit</button>
                                    </div>
                                </div>
                            </form>
                            <?php
                                if(isset($_POST['submit']))
                                {
                                    $sql=mysqli_query($con,"SELECT password FROM  admin where password='".$_POST['cpass']."' && admin_id='".$_SESSION['id']."'");
                                    $num=mysqli_fetch_array($sql);
                                    if($num>0)
                                    {
                                        $con=mysqli_query($con,"update admin set password='".$_POST['npass']."' , confirm_password='".$_POST['npass']."' where admin_id='".$_SESSION['id']."'");
                                        echo "<script>alert('Password Changed Successfully !!'); </script>";
                                    }

                                    else{ echo "<script>alert('Old Password not match'); </script>";}
                                }
                            ?>
                        <!-- content ends here -->
                    </div>
                </div>
            </div>
        </div>

<?php include ('footer.php'); ?>
