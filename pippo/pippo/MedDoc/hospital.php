<?php 
if(!isset($_GET['hospital'])){ header("location:index.php");}
require "includes/common.php";
$page="hospital.php"; 
$hospital=$_GET['hospital'];
$hospital=htmlspecialchars(urldecode($hospital));
$hospital=mysqli_escape_string($con,$hospital);
$conn = mysqli_connect($servername, $serverusername, $serverpassword) or die(mysqli_error($conn));
$query = "SELECT * FROM hospitals WHERE name='$hospital'";
$result = mysqli_query($con, $query);
$no_rows = mysqli_num_rows($result);
if($no_rows==0){header("location:index.php");
}
$row = mysqli_fetch_array($result);
if( isset($_SESSION['id']) && $_SESSION['role']==3){
  $_SESSION['hospitaldb']= $row['db_name'];
}
if(!isset($_GET['patient_signup_name_error']))
$_GET['patient_signup_name_error']=NULL;
if(!isset($_GET['patient_signup_email_error']))
$_GET['patient_signup_email_error']=NULL;
if(!isset($_GET['patient_signup_gender_error']))
$_GET['patient_signup_gender_error']=NULL;
if(!isset($_GET['patient_signup_dob_error']))
$_GET['patient_signup_dob_error']=NULL;
if(!isset($_GET['patient_signup_contact_error']))
$_GET['patient_signup_contact_error']=NULL;
if(!isset($_GET['patient_signup_addess_error']))
$_GET['patient_signup_addess_error']=NULL;
if(!isset($_GET['patient_signup_password_error']))
$_GET['patient_signup_password_error']=NULL;

if(!isset($_GET['doctor_login_contact_error']))
$_GET['doctor_login_contact_error']=NULL;
if(!isset($_GET['doctor_login_password_error']))
$_GET['doctor_login_password_error']=NULL;

if(!isset($_GET['patient_login_contact_error']))
$_GET['patient_login_contact_error']=NULL;
if(!isset($_GET['patient_login_password_error']))
$_GET['patient_login_password_error']=NULL;
?> 
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="">
<meta name="author" content="">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<!-- FOR NORMAL BOOTSTRAP -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<!--FOR FONT AWESOME ICONS AND FONTS-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<!--FOR BOOTSTRAP FORMS-->
<link rel="canonical" href="https://getbootstrap.com/docs/3.4/examples/signin/">
<link href="https://getbootstrap.com/docs/3.4/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://getbootstrap.com/docs/3.4/assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">
<script src="https://getbootstrap.com/docs/3.4/assets/js/ie-emulation-modes-warning.js"></script>
<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<title></title>
<!--Owl Carousel-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g=="
crossorigin="anonymous" />
<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"
integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw=="
crossorigin="anonymous" />
<link rel="stylesheet" href="CSS/style.css">
<link rel="stylesheet" href="CSS/login.css">
<link rel="stylesheet" href="CSS/owl.carousel.min.css">
<link rel="stylesheet" href="CSS/owl.theme.default.min.css">
<style media="screen">
.hov a:hover {
      text-decoration: none;
      color: white;
    }

    .colorcd {
      height: 280px;
      width: 180px;
      background-color: #e7e7e7;
      border-radius: 25px;
    }

    .colorcd:hover {
      transform: scale(1.1);
    }

    .colordep {
      height: 120px;
      width: 70px;
      background-color: #e7e7e7;
      border-radius: 25px;
    }

    .colordep:hover {
      transform: scale(1.1);
    }

    .icona {
      color: #8bcdcd;
      font-size: 45px;
    }

    .counter {
      text-align: center;
    }

    .counter-count {
      font-size: 50px;
      font-weight: bold;
      position: relative;
      color: #000000;
      text-align: center;
      display: inline-block;
    }

    .testimonial {
      height: 200px;
      width: 600px;

    }
</style>
</head>

<body style="background-color: white; padding-bottom: 0; padding-top: 0;">
<!-- Modal -->
<div class="modal fade" id="myModalHosp" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title text-center">Sign Up</h4>
          </div>
          <div class="modal-body text-center">
            <form class="form-signin" action="Login/hospital-signup.php" method="POST" enctype="multipart/form-data">
              <img src=" Images/medical-folder.png" alt=""><br>
              <br>
              <label for="name" class="sr-only">Hospital Name</label>
              <input type="text" id="name" class="form-control" placeholder="Hospital Name" name="name" autofocus required>
              <br>
              <label for="address" class="sr-only">Address:</label>
              <input type="text" id="address" class="form-control" name="address" placeholder="Address" required>
              <br>
              <label for="email" class="sr-only">Email</label>
              <input type="email" id="email" class="form-control" placeholder="Email" name="email" required>
              <br>
              <label for="contact" class="sr-only">Contact No.</label>
              <input type="number" id="contact" class="form-control" placeholder="Contact Number" name="contact"  pattern="[0-9]{10}">
              <br>
              <label for="files" style="text-align:left">HospitaL Verification Documents</label><br>
              <input type="file" id="files" class="form-control" placeholder="Upload Files" name="file" required>
              <br>
              <label for="inputPassword" class="sr-only">Password</label>
              <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="password" pattern=".{6,}" required>
              <br>
              <button class="btn btn-lg btn-info btn-block" type="submit">Sign Up</button>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
    <!-- Modal -->
<!-- Modal -->
<div class="modal fade" id="myModal3" role="dialog">
<div class="modal-dialog">

<!-- Modal content-->
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title text-center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sign Up</h4>
<button type="button" class="close" data-dismiss="modal">&times;</button>
</div>
<div class="modal-body text-center">
<form class="form-signin" action="Login/patient-signup-script.php" method="POST">
<img src=" Images/patient_profile.png" alt=""><br>
<br>
<label for="name" class="sr-only">Name</label>
<input type="text" id="name" class="form-control" placeholder="Name" name="name" autofocus>
<br>
<label for="email" class="sr-only">Email</label>
<input type="email" id="email" class="form-control" placeholder="Email" name="email">
<br>
<label for="gender" class="sr-only">Gender</label>
<input type="radio" name="gender" value="M"> Male
<input type="radio" name="gender" value="F"> Female
<input type="radio" name="gender" value="O"> Others
<br><br>
<label for="dob" class="sr-only">Date of Birth</label>
<input type="date" id="dob" class="form-control" name="dob" placeholder="Date of Birth">
<br>
<label for="contact" class="sr-only">Contact No.</label>
<input type="number" id="contact" class="form-control" placeholder="Contact Number" name="contact"  pattern="[0-9]{10}">
<br>
<label for="address" class="sr-only">Address:</label>
<input type="text" id="address" class="form-control" name="address" placeholder="Address">
<br>
<label for="inputPassword" class="sr-only">Password</label>
<input type="password" id="inputPassword" class="form-control" placeholder="Password" name="password" pattern=".{6,}">
<br>
<input type="text" name="hospdbname" value="<?php echo $row['db_name']; ?>" style="display:none;">
<button class="btn btn-lg btn-info btn-block" type="submit">Sign Up</button>
</form>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
</div>
</div>
</div>
</div>

<!-- Modal -->
<div class="modal fade" id="myModal1" role="dialog">
<div class="modal-dialog">
<!-- Modal content-->
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title text-center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Login as Patient</h4>
<button type="button" class="close" data-dismiss="modal">&times;</button>
</div>
<div class="modal-body text-center">
<form class="form-signin" method="POST" action="Login/patient-login-script.php">
<img src=" Images/patient_profile.png" alt=""><br>
<br>
<label for="contact" class="sr-only">Contact No.</label>
<input type="number" id="contact" class="form-control" placeholder="Contact Number" name="contact" required autofocus>
<br>
<label for="inputPassword" class="sr-only">Password</label>
<input type="password" id="inputPassword" class="form-control" placeholder="Password" name="password" required>
<div class="checkbox">
<label>
<input type="checkbox" value="remember-me"> Remember me
</label>
</div>
<input type="text" name="hospdbname" value="<?php echo $row['db_name']; ?>" style="display:none;">
<button class="btn btn-lg btn-info btn-block" type="submit">Sign in</button><br>
<center>Don't have an already existing account ? <a href="#" data-toggle="modal" data-target="#myModal3"><br>Sign Up</a></center>
</form>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
</div>
</div>
</div>
</div>
<!-- Modal -->
<div class="modal fade" id="myModal2" role="dialog">
<div class="modal-dialog">
<!-- Modal content-->
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title text-center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Login as a Doctor</h4>
<button type="button" class="close" data-dismiss="modal">&times;</button>
</div>
<div class="modal-body text-center">
<form class="form-signin" method="POST" action="Login/doctor-login-script.php">
<img src=" Images/medical-folder.png" alt=""><br>
<br>
<label for="inputEmail" class="sr-only">Email address</label>
<input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address" required autofocus>
<br>
<label for="inputPassword" class="sr-only">Password</label>
<input type="password" id="inputPassword" class="form-control" name="password" placeholder="Password" required>
<input type="text" name="hospname" value="<?php echo $hospital; ?>" style="display:none;">
<input type="text" name="hospdbname" value="<?php echo $row['db_name']; ?>" style="display:none;">
<div class="checkbox">
<label>
<input type="checkbox" value="remember-me"> Remember me
</label>
</div>
<button class="btn btn-lg btn-info btn-block" type="submit">Sign in</button>
</form>
<br><br>
</div>

<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
</div>
</div>
</div>
</div>

<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">
              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title text-center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Hospital Admin Login</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body text-center">
                  <form class="form-signin" method="POST" action="Login/admin-login-script.php">
                    <img src=" Images/medical-folder.png" alt=""><br>
                    <br>
                    <label for="inputEmail" class="sr-only">Email address</label>
                    <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address" required autofocus>
                    <br>
                    <label for="inputPassword" class="sr-only">Password</label>
                    <input type="password" id="inputPassword" class="form-control" name="password" placeholder="Password" required>
                    <div class="checkbox">
                      <label>
                        <input type="checkbox" value="remember-me"> Remember me
                      </label>
                    </div>
                    <input type="text" name="hospdbname" value="<?php echo $row['db_name']; ?>" style="display:none;">
                    <button class="btn btn-lg btn-info btn-block" type="submit">Sign in</button>
                  </form>
                  <br><br>
                </div>

                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>
<section class="banner">
<header>
<div class="menu-toggle" id="hamburger">
<i class="fas fa-bars"></i>
</div>
<div class="overlay"></div>
<div class="container hov">
<nav>
<h1 class="brand"><a href="index.php"><span>M</span>ed<span>D</span>oc</a></h1>
<ul>
<li><a href="#">Departments</a></li>
<li><a href="patient-page.php">Make An Appointment</a></li>
<?php if(!isset($_SESSION['id'])) { ?>
<li class="dropdown">
<a href="#" class="dropdown-toggle" data-toggle="dropdown">Login<b class="caret"></b></a>
<ul class="dropdown-menu">
<li>
<a href="#" data-toggle="modal" data-target="#myModal1">Patient</a>
</li>
<li>
<a href="#" data-toggle="modal" data-target="#myModal2">Doctor</a>
</li>
<li>
<a href="#" data-toggle="modal" data-target="#myModal">Admin</a>
</li>
</ul>
</li>
<li class="dropdown">
<a href="#" class="dropdown-toggle" data-toggle="dropdown">Sign Up<b class="caret"></b></a>
<ul class="dropdown-menu">
<li>
<a href="#" data-toggle="modal" data-target="#myModal3">Patient</a>
</li>
<li><a href="#" data-toggle="modal" data-target="#myModalHosp">Hospital</a></li>
<?php } else { ?>
  <li><a href="includes/logout.php">Logout</a></li>
<?php } ?>
</ul>
</li>
</ul>
</nav>
</div>
<div class="banner-text">
<h1><span><?php echo $row['name']; ?></span></h1>
<?php $info=json_decode($row['info']); if($info->tagline!="null"){ echo "<p>".$info->tagline."</p>"; } ?>
<br><br>
<div class="banner-btn">
<a href="patient-page.php"><span></span>Make an Appointment</a>
<a href="#"><span></span>Departments</a>
</div>
</div>
</header>
</section>
<br>
<div class="container">
<div class="page-header resp">
<h2> <span style="color: #8bcdcd">We Care</span><br>
About your Health.</h2>
</div>
</div>
<br>
<div class="container text-center">
<div class="row">

<div class="col-sm-3">
<div class="count-up">
<i class="fa fa-bookmark icona"></i>
<h1><span class="counter-count">20</span>+</h1>
<h3>Years of Experience</h3>
</div>
</div>

<div class="col-sm-3">
<div class="count-up">
<i class="fa fa-heart icona"></i>
<h1><span class="counter-count">700</span>+</h1>
<h3>Happy Patients</h3>
</div>
</div>

<div class="col-sm-3">
<div class="count-up">
<i class="fa fa-shield icona"></i>
<h1><span class="counter-count">120</span>+</h1>
<h3>Certificate</h3>
</div>
</div>

<div class="col-sm-3">
<div class="count-up">
<i class="fa fa-user-md icona"></i>
<h1><span class="counter-count">40</span>+</h1>
<h3>Doctors</h3>
</div>
</div>
</div>
</div>

<div class="container">
<div class="page-header resp">
<h2> <span style="color: #8bcdcd">Why </span>choose us ?</h2>
</div>
</div>
<br><br><br>
<div class="container text-center">
<div class="row">

<div class="col-sm-3 justify-content-center align-items-center colorcd">
<br><img src="Images/stethoscope.png" height="60px" width="60px" alt="">
<h3 class="heading">Qualitfied Doctors</h3>
<p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic.</p>
</div>
<div class=col-sm-1>&nbsp</div>

<div class="col-sm-3 justify-content-center align-items-center colorcd">
<br><img src="Images/ambulance.png" height="60px" width="60px" alt="">
<h3 class="heading">Emergency Care</h3>
<p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic.</p>
</div>
<div class=col-sm-1>&nbsp</div>
<div class="col-sm-3 justify-content-center align-items-center colorcd">
<br><img src="Images/24-hours.png" height="60px" width="60px" alt="">
<h3 class="heading">24 Hours Service</h3>
<p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic.</p>
</div>

</div>
</div>
<br><br><br><br>
<br><br><br>
  <div class="container text-center">
    <div class="page-header resp">
      <h2>Departments</h2>
    </div>
    <div class="row">
      <div class="col-sm-1">&nbsp</div>
      <div class="col-sm-1 colordep">
        <br><img src="Images/child.png" height="60px" width="60px" alt="">
        <h4>Pediatric</h4>
      </div>
      <div class="col-sm-1">&nbsp</div>
      <div class="col-sm-1 colordep">
        <br><img src="Images/thinking.png" height="60px" width="60px" alt="">
        <h4>Neurology</h4>
      </div>
      <div class="col-sm-1">&nbsp</div>
      <div class="col-sm-1 colordep">
        <br><img src="Images/kidneys.png" height="60px" width="60px" alt="">
        <h4>Urology</h4>
      </div>
      <div class="col-sm-1">&nbsp</div>
      <div class="col-sm-1 colordep">
        <br><img src="Images/heart.png" height="60px" width="60px" alt="">
        <h4>Cardiology</h4>
      </div>
      <div class="col-sm-1">&nbsp</div>
      <div class="col-sm-1 colordep">
        <br><img src="Images/dental-checkup.png" height="60px" width="60px" alt="">
        <h4>Dental</h4>
      </div>
      <div class="col-sm-1">&nbsp</div>
    </div>
    <br><br><br>
    <div class="row">
      <div class="col-sm-1">&nbsp</div>
      <div class="col-sm-1">&nbsp</div>
      <div class="col-sm-1 colordep">
        <br><img src="Images/lungs.png" height="60px" width="60px" alt="">
        <h4>Pulmonary</h4>
      </div>

      <div class="col-sm-1">&nbsp</div>
      <div class="col-sm-1 colordep">
        <br><img src="Images/knee.png" height="60px" width="60px" alt="">
        <h4>Trauma</h4>
      </div>

      <div class="col-sm-1">&nbsp</div>
      <div class="col-sm-1 colordep">
        <br><img src="Images/eye.png" height="60px" width="60px" alt="">
        <h4>Eyes</h4>
      </div>
      <div class="col-sm-1">&nbsp</div>
      <div class="col-sm-1 colordep">
        <br><img src="Images/intestine.png" height="60px" width="60px" alt="">
        <h4>Gastro</h4>
      </div>
    </div>
  </div>
  <br><br><br>
<div class="container">
<div class="row">
<!-- checking if about us info present -->
<?php if($info->aboutus!="null"){ ?>
  <div class="col-sm-8">
  <div class="page-header resp"> 
  <h2> <span style="color: #8bcdcd">About Us</span></h2>
  </div>
  <p style="font-size: 20px; font-family:Perpetua;"><?php echo $info->aboutus; ?></p>
  </div>
  <?php } ?>
  <div class="col-sm-1">&nbsp</div>
  <div class="col-sm-3"> <br>
  <h2> <span style="color: #8bcdcd">Quick </span>Facts:</h2>
  <ul type="disc"></ul>
  <li style="font-size: 20px; font-family:Perpetua;">Qualified Doctors</li>
  <li style="font-size: 20px; font-family:Perpetua;">Ambulance Availability</li>
  <li style="font-size: 20px; font-family:Perpetua;">Bed to Bed Service</li>
  <li style="font-size: 20px; font-family:Perpetua;">Free Eye Check Up Camp</li>
  <li style="font-size: 20px; font-family:Perpetua;">Special Package</li>
  </ul>
  </div>
  </div>
  </div><br><br><br><br><br><br>
  
  
      
      <br><br>
      <section id="footer">
      <img src="Images/footer-img.png" class="footer-img">
      <div class="title-text">
      <p>CONTACT</p>
      </div>
      <div class="social-links">
      <i class="fa fa-facebook"></i>
      <i class="fa fa-twitter"></i>
      <i class="fa fa-youtube-play"></i>
      <i class="fa fa-linkedin"></i>
      <p>copyright MedDoc 2020</p>
      </div>
      </section>
      <script>
      var open = document.getElementById('hamburger');
      var changeIcon = true;
      
      open.addEventListener("click", function () {
        
        var overlay = document.querySelector('.overlay');
        var nav = document.querySelector('nav');
        var icon = document.querySelector('.menu-toggle i');
        
        overlay.classList.toggle("menu-open");
        nav.classList.toggle("menu-open");
        
        if (changeIcon) {
          icon.classList.remove("fa-bars");
          icon.classList.add("fa-times");
          
          changeIcon = false;
        } else {
          icon.classList.remove("fa-times");
          icon.classList.add("fa-bars");
          changeIcon = true;
        }
      });
      </script>
      <script src="https://getbootstrap.com/docs/3.4/assets/js/ie10-viewport-bug-workaround.js"></script>
      
      
      <!--Owl Carousel-->
      <script src="js/owl.carousel.js"></script>
      <script src="js/owl.carousel.min.js"></script>
      <script>
      $('.owl-carousel').owlCarousel({
        nav: true,
        dots: true,
        margin: 10,
        loop: true,
        autoWidth: true,
        items: 4
        
      })
      </script>
      <script>
      /*COUNTERS*/
      $('.counter-count').each(function () {
        $(this).prop('Counter', 0).animate({
          Counter: $(this).text()
        }, {
          
          //chnage count up speed here
          duration: 4000,
          easing: 'swing',
          step: function (now) {
            $(this).text(Math.ceil(now));
          }
        });
      });
      </script>
      </body>
      </html>