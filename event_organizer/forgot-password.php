<?php
  session_start();
  include("../admin/include/dbcon.php");
  error_reporting(0);
  //Checking Details for reset password
  if(isset($_POST['submit']))
  {
    $contact=$_POST['contact'];
    $email=$_POST['email'];
    $query=mysqli_query($con,"select id from  event_organizer where contact='$contact' and email='$email'");
    $row=mysqli_num_rows($query);
    if($row>0)
    {
      $_SESSION['cnumber']=$contact;
      $_SESSION['email']=$email;
      header('location:reset-password.php');
    } else {
      echo "<script>alert('Invalid details. Please try with valid details');</script>";
      echo "<script>window.location.href ='forgot-password.php'</script>";
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

    <title>Event Organizer | Ticket Mangement System</title>

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
              <h1>Forget Password </h1>
              <div>
                <input type="number" class="form-control" name="contact" placeholder="Registerd Contact Number" style="border-radius: 20px;" required="" />
              </div><br>
              <div>
                <input type="email" class="form-control" name="email" placeholder="Registerd Email" style="border-radius: 20px;" required />
              </div>
              <div>
               <button class="btn btn-primary submit btn-block" type="submit" name="submit" style="border-radius: 20px;"><i class="fa fa-check"></i>&nbsp; Reset</button>
                                <?php 
                                 if(isset($_GET['error'])) {
                                    echo $_GET['error']; }
                                 ?> 
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                 <p class="change_link">Already Have account?
                  <a href="index.php" class="to_register"> Login </a>
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
