<?php
  session_start();
  include("../admin/include/dbcon.php");
  error_reporting(0);
  //Checking Details for reset password
  if(isset($_POST['change']))
  {
    $contact=$_SESSION['contact'];
    $email=$_SESSION['email'];
    $newpassword=md5($_POST['password']);
    $query=mysqli_query($con,"update event_organizer set password='$newpassword' where contact='$contact' and email='$email'");
    if ($query) 
    {
      echo "<script>alert('Password successfully updated.');</script>";
      echo "<script>window.location.href ='index.php'</script>";
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

    <title>Event Organizer  | Ticket Mangement System</title>

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
    <script type="text/javascript">
      function valid()
      {
       if(document.passwordreset.password.value!= document.passwordreset.password_again.value)
      {
      alert("Password and Confirm Password Field do not match  !!");
      document.passwordreset.password_again.focus();
      return false;
      }
      return true;
      }
    </script>
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form name="passwordreset" method="post" onSubmit="return valid();">
              <h1>Reset Password  </h1>
              <div>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password" style="border-radius: 20px;" onmouseover="this.type='text'" onmousedown="this.type='password'" onmouseout="this.type='password'" required="" />
              </div>
              <div>
                <input type="password" class="form-control" id="password_again" name="password_again" placeholder="Password Again" style="border-radius: 20px;" onmouseover="this.type='text'" onmousedown="this.type='password'" onmouseout="this.type='password'" required />
              </div>
              <div>
               <button class="btn btn-primary submit btn-block" type="submit" name="change" style="border-radius: 20px;"><i class="fa fa-check"></i>&nbsp; Change</button>
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
