
<?php 

include 'cores/config.php';




?>


<!DOCTYPE html>
<html lang="en">

    

<head>
        <meta charset="utf-8" />
        <title><?php CompanyName() ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- App css -->
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/app-modern.min.css" rel="stylesheet" type="text/css" id="light-style" />
        <link href="assets/css/app-modern-dark.min.css" rel="stylesheet" type="text/css" id="dark-style" />

    </head>

    <body class="authentication-bg pb-0" data-layout-config='{"darkMode":false}'>

        <div class="auth-fluid">
            <!--Auth fluid left content -->
            <div class="auth-fluid-form-box">
                <div class="align-items-center d-flex h-100">
                    <div class="card-body">

                        <!-- Logo -->
                        <div class="auth-brand text-center text-lg-left">
                            <a href="index-2.html" class="logo-dark">
                                <span><img src="assets/images/logo-dark.png" alt="" height="18"></span>
                            </a>
                            <a href="index-2.html" class="logo-light">
                                <span><img src="assets/images/logo.png" alt="" height="18"></span>
                            </a>
                        </div>

                        <!-- title-->
                        <h4 class="mt-0">Sign In</h4>
                        <p class="text-muted mb-4">Enter your username  and password to access account.</p>


                        <div style="display: none;" class="errorShow alert alert-danger alert-dismissible bg-danger text-white border-0 fade show" role="alert">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                          </button>
                          <strong>Error - </strong> 
                          <span class="showTHeErrorText"></span>
                      </div>


                        <!-- form -->
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="emailaddress">username </label>
                                <input class="form-control" type="text" name="username" id="usernameaddress" required="" placeholder="Enter your username">
                            </div>
                            <div class="form-group">
                                <a href="pages-recoverpw-2.html" class="text-muted float-right"><small>Forgot your password?</small></a>
                                <label for="password">Password</label>
                                <input class="form-control" type="password" name="password" required="" id="password" placeholder="Enter your password">
                            </div>
                            <div class="form-group mb-3">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="checkbox-signin">
                                    <label class="custom-control-label" for="checkbox-signin">Remember me</label>
                                </div>
                            </div>
                            <div class="form-group mb-0 text-center">
                                <button class="btn btn-primary btn-block" name="submit" type="submit"><i class="mdi mdi-login"></i> Log In </button>
                            </div>
                            <!-- social-->
                           
                        </form>
                        <!-- end form-->

                        <!-- Footer-->
                        <footer class="footer footer-alt">
                            <p class="text-muted">Don't have an account? <a href="register.new.staff.css.dart.android.app" class="text-muted ml-1"><b>Sign Up</b></a></p>
                        </footer>

                    </div> <!-- end .card-body -->
                </div> <!-- end .align-items-center.d-flex.h-100-->
            </div>
            <!-- end auth-fluid-form-box-->

            <!-- Auth fluid right content -->
            <div class="auth-fluid-right text-center">
                <div class="auth-user-testimonial">
                    <h2 class="mb-3">Company Name!</h2>
                    <p class="lead"><i class="mdi mdi-format-quote-open"></i> Developed By GOAD Technologies LTD <i class="mdi mdi-format-quote-close"></i>
                    </p>
                    <p>
                        - 0548157455 / 0548878554 for more Details
                    </p>
                </div> <!-- end auth-user-testimonial-->
            </div>
            <!-- end Auth fluid right content -->
        </div>
        <!-- end auth-fluid-->

        <!-- bundle -->
        <script src="assets/js/vendor.min.js"></script>
        <script src="assets/js/app.min.js"></script>

    </body>
</html>


  <?php 



if (isset($_POST["submit"])) {

    $username = strip_tags(htmlentities(stripslashes($_POST['username'])));
    $password = strip_tags(htmlentities(stripslashes($_POST['password'])));

    $username = strtolower($username);
    $encrypted_password = md5($password);

    $activity_type = "login";
    $description = "Login make suceesfully";
 

    if (!empty($username) && !empty($password)) { 
 

      $staff_query = mysqli_query($conn, "SELECT * FROM staff WHERE  username='$username' AND password='$encrypted_password' AND confirm='yes' AND active='yes' LIMIT 1 ");
      if (mysqli_num_rows($staff_query)===1) {

        $gett = mysqli_fetch_assoc($staff_query);
        $id = $gett["id"];


        if (!empty($id)) {
          $_SESSION["login_session"] = $id;


          mysqli_query($conn, "UPDATE staff SET last_login=now(), sstatus='online' WHERE active='yes' AND username='$username' LIMIT 1 ")


          ?>
          <script type="text/javascript">
            location.replace(".home.login-successful");
          </script>
          <?php
        }else{

          ?>
          <script type="text/javascript">
            $(".errorShow").show();
            $(".showTHeErrorText").text(" Unknown Account...!!");
          </script>

          <?php
        }

      }else{
        ?>

        <script type="text/javascript">
          $(".errorShow").show();
          $(".showTHeErrorText").text(" Incorrect credentials...!!");
        </script>

        <?php
      }


    } else {

     ?>

     <script type="text/javascript">

      $(".errorShow").show();
      $(".showTHeErrorText").text(" Username and password cannot be empty");

    </script>

    <?php
      }


    } else {
          # code...
}



?>