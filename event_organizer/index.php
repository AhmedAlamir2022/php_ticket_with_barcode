<?php
  session_start();
  include("../admin/include/dbcon.php");
  error_reporting(0);
  if(isset($_POST['submit']))
  {
    $ret=mysqli_query($con,"SELECT * FROM event_organizer WHERE email='".$_POST['username']."' and password='".md5($_POST['password'])."' " );
    $num=mysqli_fetch_array($ret);
    if($num>0)
    {
      $extra="home.php";
      $_SESSION['dlogin']=$_POST['username'];
      $_SESSION['id']=$num['id'];
      $uip=$_SERVER['REMOTE_ADDR'];
      $status=1;
      $log=mysqli_query($con,"insert into eventlogs(uid,email,userip,status) values('".$_SESSION['id']."','".$_SESSION['dlogin']."','$uip','$status')");
      $host=$_SERVER['HTTP_HOST'];
      $uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
      header("location:http://$host$uri/$extra");
      exit();
    }
    else
    {
      $host  = $_SERVER['HTTP_HOST'];
      $_SESSION['dlogin']=$_POST['username'];
      $uip=$_SERVER['REMOTE_ADDR'];
      $status=0;
      mysqli_query($con,"insert into eventlogs(email,userip,status) values('".$_SESSION['dlogin']."','$uip','$status')");
      $_SESSION['errmsg']="Invalid email or password";
      $extra="index.php";
      $uri  = rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
      header("location:http://$host$uri/$extra");
      exit();
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Event Organizer Login | Ticket Mangement System</title>

    <!-- Bootstrap -->
    <link href="../admin/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../admin/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../admin/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="../admin/vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../admin/vendors/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form method="post">
              <h1>Event Organizer  </h1>
              <div>
                <input type="email" class="form-control" name="username" placeholder="Email Address" style="border-radius: 20px;" required="" />
              </div>
              <div>
                <input type="password" class="form-control" name="password" placeholder="Password" style="border-radius: 20px;" onmouseover="this.type='text'" onmousedown="this.type='password'" onmouseout="this.type='password'" required />
              </div>
              <div>
               <button class="btn btn-primary submit btn-block" type="submit" name="submit" style="border-radius: 20px;"><i class="fa fa-check"></i>&nbsp; SIGN IN</button>
                                <?php 
                                 if(isset($_GET['error'])) {
                                    echo $_GET['error']; }
                                 ?> 
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">
                  <a href="forgot-password.php" class="to_register"> Forget Password? </a>
                </p>
                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-paw"></i> Black Market</h1>
                  <p>©<?php echo date('Y'); ?> ticket Management System</p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>
