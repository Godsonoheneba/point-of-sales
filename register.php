<!DOCTYPE html>
<html lang="en">

    
<head>
        <meta charset="utf-8" />
        <title>COmpany Name</title>
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
                        <h4 class="mt-0">Free Sign Up</h4>
                        <p class="text-muted mb-4">Don't have an account? Create your account, it takes less than a minute</p>

                        <!-- form -->
                            <div class="form-group">
                                <label for="fullname">Full Name</label>
                                <input class="fullname form-control" type="text" id="fullname" placeholder="Enter your name" required>
                            </div>


                              <div class="form-group">
                                <label for="Mobile">Mobile</label>
                                <input class="mobile form-control"   type="text" required id="Mobile" placeholder="Enter your Mobile" onkeyup="checkMobiles(this)" maxlength ="10">
                            </div>
                            



                             <div class="form-group">
                                <label for="example-select">Assign Role</label>
                                <select class="assign_role form-control" id="example-select">
                                    <option value="">Select Role</option>
                                    <option value="1">Administrator</option>
                                    <option value="2">Staff</option>
                                 
                                </select>
                            </div>


                            <div class="form-group">
                                <label for="Username">Username </label>
                                <input class="username form-control" type="Username " id="Username" required placeholder="Enter your Username .eg. dacosta " >
                            </div>


                            <div class="form-group">
                                <label for="password">Password</label>
                                <input class="password form-control" type="password" required id="password" placeholder="Enter your password">
                            </div>


                            <div class="form-group">
                                <label for="password">Confirm Password</label>
                                <input class="confirm_password form-control" type="password" required id="password" placeholder="Confirm your password">
                            </div>





                            <div class="form-group">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" checked="" class="custom-control-input" id="checkbox-signup">
                                    <label class="custom-control-label" for="checkbox-signup">I accept <a href="javascript: void(0);" class="text-muted">Terms and Conditions</a></label>
                                </div>
                            </div>
                            <div class="form-group mb-0 text-center">
                                <button class="btn btn-primary btn-block" type="submit" onclick="register()" ><i class="mdi mdi-account-circle" ></i> Sign Up </button>
                            </div>
                            <!-- social-->
                           
                        <!-- end form-->

                        <!-- Footer-->
                        <footer class="footer footer-alt">
                            <p class="text-muted">Already have account? <a href="login" class="text-muted ml-1"><b>Log In</b></a></p>
                        </footer>

                    </div> <!-- end .card-body -->
                </div> <!-- end .align-items-center.d-flex.h-100-->
            </div>
            <!-- end auth-fluid-form-box-->

            <!-- Auth fluid right content -->
                       <div class="auth-fluid-right text-center">
                <div class="auth-user-testimonial">
                    <h2 class="mb-3">Company Name!</h2>
                    <p class="lead"><i class="mdi mdi-format-quote-open"></i> Developed By SUSUKA Technologies LTD <i class="mdi mdi-format-quote-close"></i>
                    </p>
                    <p>
                        - 0548157455 for more Details
                    </p>
                </div> <!-- end auth-user-testimonial-->
            </div>
            <!-- end Auth fluid right content -->
        </div>
        <!-- end auth-fluid-->

        <!-- bundle -->
        <script src="assets/js/vendor.min.js"></script>
        <script src="assets/js/app.min.js"></script>
        <script src="assets/js/freewrite.js"></script>
        <script src="assets/js/sweet.js"></script>



    </body>



</html>



