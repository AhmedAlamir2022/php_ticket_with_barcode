<?php
session_start();
include('include/dbcon.php');

              if (isset($_POST['login'])){

              $username=$_POST['username'];
              $password=$_POST['password'];

              $login_query=mysqli_query($con,"select * from admin where username='$username' and password='$password'");
              $count=mysqli_num_rows($login_query);
              $row=mysqli_fetch_array($login_query);

              if (($count > 0)){
              $_SESSION['id']=$row['admin_id'];

              header("location:home.php");
              }else{ 
              echo 
                 $error = "<span class='red'>Incorrect Login Details </span>";
                 header('location: index.php?error=' . $error);

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

    <title>Admin Login | Ticket Mangement System</title>

    <!-- Bootstrap -->
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="vendors/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form method="post">
              <h1>Admin Login</h1>
              <div>
                <input type="text" class="form-control" name="username" placeholder="Username" style="border-radius: 20px;" required="" />
              </div>
              <div>
                <input type="password" class="form-control" name="password" placeholder="Password" style="border-radius: 20px;" onmouseover="this.type='text'" onmousedown="this.type='password'" onmouseout="this.type='password'" required />
              </div>
              <div>
               <button class="btn btn-primary submit btn-block" type="submit" name="login" style="border-radius: 20px;"><i class="fa fa-check"></i>&nbsp; SIGN IN</button>
                                <?php 
                                 if(isset($_GET['error'])) {
                                    echo $_GET['error']; }
                                 ?> 
              </div>

              <div class="clearfix"></div>

              <div class="separator">

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
