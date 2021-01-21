    <!-- Auother Frontend Bayan S.belbese -->

<?php
include("studentClass.php");

 if(isset($_POST['submit'])){

   $name =$_POST['name'];
   $email =$_POST['email'];
   $password =$_POST['pass'];
   $password_confirm =$_POST['c_pass'];
   $mobile =$_POST['mobile'];
   $level =$_POST['ed_level'];
   $image = $_FILES['image']['name'];
   $temp_name = $_FILES['image']['tmp_name'];
   $path = "../images/";
   move_uploaded_file($temp_name,$path.$image);
   $r=$student->register($name,$email,$password,$password_confirm,$mobile,$image,$level);
  
  if($r=="* Email Already Exists")
  {
   $errorEmail=$r;
  }
  elseif($r=="* Password not match !"){
  $errorPass=$r;
  }
  elseif($r=="your signed up successfully")
  {
    $message=$r;
  }
  

   
 }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Signup</title>

    <!-- Perfect Scrollbar -->
    <link type="text/css" href="assets/vendor/perfect-scrollbar.css" rel="stylesheet">

    <!-- Material Design Icons -->
    <link type="text/css" href="assets/css/material-icons.css" rel="stylesheet">
    <link type="text/css" href="assets/css/material-icons.rtl.css" rel="stylesheet">

    <!-- Font Awesome Icons -->
    <link type="text/css" href="assets/css/fontawesome.css" rel="stylesheet">
    <link type="text/css" href="assets/css/fontawesome.rtl.css" rel="stylesheet">

    <!-- App CSS -->
    <link type="text/css" href="assets/css/app.css" rel="stylesheet">
    <link type="text/css" href="assets/css/app.rtl.css" rel="stylesheet">





</head>

<body class="login">


    <div class="d-flex align-items-center" style="min-height: 100vh">
        <div class="col-sm-8 col-md-6 col-lg-4 mx-auto" style="min-width: 300px;">
            <div class="text-center mt-5 mb-1">
                <div class="avatar avatar-lg">
                    <img src="assets/images/logo/primary.svg" class="avatar-img rounded-circle" alt="LearnPlus" />
                </div>
            </div>
            <div class="d-flex justify-content-center mb-5 navbar-light">
                <a href="" class="navbar-brand m-0">Exmanation System</a>
            </div>
            <div class="card navbar-shadow">
                <div class="card-header text-center">
                    <h4 class="card-title">Sign Up</h4>
                    <p class="card-subtitle">Create a new account</p>
                </div>
                <div class="card-body">

                 
                 
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="form-label" for="name">Name:</label>
                            <div class="input-group input-group-merge">
                                <input id="name" name="name" type="text" required="" class="form-control form-control-prepended" placeholder="Your first and last name">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <span class="far fa-user"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="email">Email address:</label>
                            <div class="input-group input-group-merge">
                                <input id="email" name="email" type="email" required="" class="form-control form-control-prepended" placeholder="Your email address">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <span class="far fa-envelope"></span>
                                        
                                    </div>
                                    
                                </div>
                            </div>
                            <?php
                            if (isset($errorEmail)) {
                            echo"<div class='alert alert-danger' role='alert' width='500'>
                            {$errorEmail}
                            </div>
                            ";
                            }
                            ?>
                                                         
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="password">Password:</label>
                            <div class="input-group input-group-merge">
                                <input name="pass" id="password" type="password" required="" class="form-control form-control-prepended" placeholder="Choose a password">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <span class="fa fa-key"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="form-label" for="password2">confirm Password:</label>
                            <div class="input-group input-group-merge">
                                <input name="c_pass" id="password2" type="password" required="" class="form-control form-control-prepended" placeholder="Confirm password">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <span class="fa fa-key"></span>
                                    </div>
                                </div>
                            </div>
                        </div><?php
                            if (isset($errorPass)) {
                            echo"<div class='alert alert-danger' role='alert' width='500'>
                            {$errorPass}
                            </div>
                            ";
                            }
                            ?>
                        <div class="form-group">
                            <label class="form-label" for="mobile">Mobile</label>
                            <div class="input-group input-group-merge">
                                <input id="mobile" name="mobile" type="text" required="" class="form-control form-control-prepended"  placeholder="Your Mobile Number">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <span class="fas fa-mobile-alt"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                         <div class="media align-items-center mb-3">
                                                    <div class="media-left">
                                                        <div class="icon-block rounded">
                                                            <i class="material-icons text-muted-light md-36">photo</i>
                                                        </div>
                                                    </div>
                                                    <div class="media-body">
                                                        <div class="custom-file" style="width: auto;">
                                                            <input required="" name="image" type="file" id="avatar" class="custom-file-input">
                                                            <label for="avatar" class="custom-file-label">Choose image</label>
                                                        </div>
                                                    </div>
                                                </div>
                                             <label class="form-label">Education Level</label>
                                                <select required="" name="ed_level" class="custom-select mb-3">
                                                   <option selected>Other</option>
                                                   <option>High School</option>
                                                   <option>Diploma / GED</option>
                                                   <option>College</option>
                                                   <option>Associate Degree</option>
                                                   <option>Bachelor's Degree</option>
                                                   <option>Master's Degree or Higher</option>
                                                 </select>
                <button type="submit" name="submit" class="btn btn-primary btn-block mb-3">Sign Up</button>
                        <div class="form-group text-center mb-0">
                            <div class="custom-control custom-checkbox">
                                                            </div>
                        </div>
                    </form>
                    <?php
                            if (isset($message)) {
                            echo"<div class='alert alert-success' role='alert' width='500'>
                            {$message}
                            </div>
                            ";
                            }
                            ?>
                </div>
                <div class="card-footer text-center text-black-50">Already signed up? <a href="user-login.php">Login</a></div>
            </div>
        </div>
    </div>


    <!-- jQuery -->
    <script src="assets/vendor/jquery.min.js"></script>

    <!-- Bootstrap -->
    <script src="assets/vendor/popper.min.js"></script>
    <script src="assets/vendor/bootstrap.min.js"></script>

    <!-- Perfect Scrollbar -->
    <script src="assets/vendor/perfect-scrollbar.min.js"></script>

    <!-- MDK -->
    <script src="assets/vendor/dom-factory.js"></script>
    <script src="assets/vendor/material-design-kit.js"></script>

    <!-- App JS -->
    <script src="assets/js/app.js"></script>

    <!-- Highlight.js -->
    <script src="assets/js/hljs.js"></script>

    <!-- App Settings (safe to remove) -->
    <script src="assets/js/app-settings.js"></script>
<script>
// Add the following code if you want the name of the file appear on select
$(".custom-file-input").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});
</script>




</body>

</html>