 <?php 
require "includes/common.php";
$page="index.php"; 
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

if(!isset($_GET['hospital_signup_name_error']))
$_GET['hospital_signup_name_error']=NULL;

if(!isset($_GET['hospital_signup_address_error']))
$_GET['hospital_signup_address_error']=NULL;

if(!isset($_GET['hospital_signup_email_error']))
$_GET['hospital_signup_email_error']=NULL;

if(!isset($_GET['hospital_signup_contact_error']))
$_GET['hospital_signup_contact_error']=NULL;

if(!isset($_GET['hospital_signup_file_error']))
$_GET['hospital_signup_file_error']=NULL;

if(!isset($_GET['hospital_signup_password_error']))
$_GET['hospital_signup_password_error']=NULL;

if(!isset($_GET['admin_login_email_error']))
$_GET['admin_login_email_error']=NULL;
if(!isset($_GET['admin_login_password_error']))
$_GET['admin_login_password_error']=NULL;

if(!isset($_GET['patient_login_email_error']))
$_GET['patient_login_email_error']=NULL;
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
    /* /Hospital Select Dropdown/ */
    .dropbtn {
  background-color: #4CAF50;
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
  cursor: pointer;
  width: 300px;
}

.dropbtn:hover, .dropbtn:focus {
  background-color: #3e8e41;
}

#myInput {
  box-sizing: border-box;
  background-image: url('searchicon.png');
  background-position: 14px 12px;
  background-repeat: no-repeat;
  font-size: 16px;
  padding: 14px 20px 12px 45px;
  border: none;
  border-bottom: 1px solid #ddd;
  width: 295px;
}

#myInput:focus {outline: 3px solid #ddd;}

.dropdown1 {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f6f6f6;
  min-width: 230px;
  overflow: auto;
  border: 1px solid #ddd;
  z-index: 1;
  border-radius: 10px;
  width: 300px;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown1 a:hover {background-color: #ddd;}

.show {display: block;}

.dropdown-content a:hover{
  text-decoration: none;
  color: black;
  background-color: #8bcdcd;
}
.testimonial {
      height: 200px;
      width: 600px;

    }
  </style>
</head>

<body style="background-color: white; padding-bottom: 0; padding-top: 0;">
  <!-- Modal -->
  <div class="modal fade" id="myModal2" role="dialog">
    <div class="modal-dialog">


      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title text-center">Sign Up</h4>
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
            <input type="text" id="address" class="form-control" name="addess" placeholder="Address">
            <br>
            <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" id="inputPassword" class="form-control" name="password" placeholder="Password" pattern=".{6,}">
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
  <div class="modal fade" id="myModalFind" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header text-center">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Select the Hospital</h4>
        </div>
        <div class="modal-body text-center">
          <img src="https://media.giphy.com/media/1gPxynPQZT8w9RJNM3/giphy.gif" height=200px width=250px>
          <br><br>
            <h4 class="text-justify" style="margin: 0 5rem; color: #c4b6b6;">Contact us any suitable way and make an appointment with the doctor of whichever hospital whose help you need! Visit at the scheduled time and get your treatment.</h4>
            <br><br>
          <div class="dropdown1">
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type="button" onclick="myFunction()" class="dropbtn btn btn-default btn-lg" style="background-color: #8bcdcd; color: white">Select The Hospital</button>
  <div id="myDropdown" class="dropdown-content" style="margin-left: 2.5rem;">
    <input type="text" placeholder="Search.." id="myInput" onkeyup="filterFunction()">
    <?php
      $query = "SELECT name FROM hospitals";
      $result = mysqli_query($con, $query);
      $no_rows = mysqli_num_rows($result);
      while ($no_rows--) { 
        $row = mysqli_fetch_array($result);  ?> 
        <a href="hospital.php?hospital=<?php echo $row['name'];?>"><?php echo $row['name'];?></a>
      <?php } ?>  
  </div>
</div>
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
  <?php if(!isset($_SESSION['id'])) { ?>}
<nav>
  <h1 class="brand"><a href="index.php"><span>M</span>ed<span>D</span>oc</a></h1>
  <ul>
    <li class="dropdown">
      <a href="#" class="dropdown-toggle" data-toggle="dropdown">Sign Up<b class="caret"></b></a>
      <ul class="dropdown-menu">
        <li> <a href="#" data-toggle="modal" data-target="#myModalFind">Patient</a></li>
<li><a href="#" data-toggle="modal" data-target="#myModalHosp">Hospital</a></li>
      </ul>
    </li>
    <li class="dropdown">
      <a href="#" class="dropdown-toggle" data-toggle="dropdown">Login<b class="caret"></b></a>
      <ul class="dropdown-menu">
        <li> <a href="#" data-toggle="modal" data-target="#myModalFind">Patient</a></li>
        <li> <a href="#" data-toggle="modal" data-target="#myModalFind">Hospital Admin</a></li>
        <li> <a href="#" data-toggle="modal" data-target="#myModalFind">Doctor</a></li>
      </ul>
    </li>
  </ul>
</nav>
      <?php } else{
        $role=$_SESSION['role'];
        if($role==3){ ?>
        <nav>
          <h1 class="brand"><a href="index.php" style="color: white"><span>M</span>ed<span>D</span>oc</a></h1>
          <ul>
            <li><a href="patient-page.php">Dashboard</a></li>
            <li><a href="#appointment">Make An Appointment</a></li>
            <li><a href="#status">Request Status</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Settings<b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li> <a href="patient-profile.php">My Profile</a></li>
                <li> <a href="#" style="color: black">Change Password</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <img src="Images/user.png" alt=""> <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li> <a href="includes/logout.php" style="color: black">Log Out</a></li>
              </ul>
            </li>
          </ul>
        </nav>
        <?php } elseif($role==2){ ?>
  <nav>
    <h1 class="brand"><a href="index.php" style="color: white"><span>M</span>ed<span>D</span>oc</a></h1>
    <ul>
      <li><a href="doctor-page.php">Dashboard</a></li>
      <li><a href="doctor-page.php">Appointment Requests</a></li>
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Settings<b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li> <a href="doctor-profile.php">My Profile</a></li>
          <li> <a href="#" style="color: black">Change Password</a></li>
        </ul>
      </li>
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <img src="Images/user.png" alt=""> <b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li> <a href="includes/logout.php" style="color: black">Log Out</a></li>
        </ul>
      </li>
    </ul>
  </nav>
        <?php } else{ ?>
          <nav>
        <h1 class="brand"><a href="index.php" style="color: black"><span>M</span>ed<span>D</span>oc</a></h1>
        <ul>
        <li><a href="admin-page.php">Dashboard</a></li>
        <li><a href="#" data-toggle="modal" data-target="#myModalAddDoc">Add a Doctor</a></li>
        <li><a href="#" data-toggle="modal" data-target="#myModalAddPat">Add a patient</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Data<b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li> <a href="patient-data.php">Patients Data</a></li>
            <li> <a href="doctor-data.php" style="color: black">Doctors Data</a></li>
            <li> <a href="editable-page.php">Your Home Page</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Settings<b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li> <a href="#" style="color: black">Change Password</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <img src="Images/user.png" alt=""> <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li> <a href="includes/logout.php" style="color: black">Logout</a></li>
          </ul>
        </li>
      </ul>
    </nav>
     <?php }
     } ?>
</div>
<div class="banner-text">
<h1>MedDoc</h1>
<p>The best specialists of the city expect you.</p>
<br><br>
<div class="banner-btn">
  <a href="#" data-toggle="modal" data-target="#myModalFind"><span></span>Find A Hospital</a>
</div>
</div>
    
    </header>
  </section>
  <div class="container">
    <div class="page-header resp">
      <h2>An <span style="color: #8bcdcd">innovative</span> approach to treatment.</h2>
    </div>
    <div class="row">
      <div class="col-sm-6">
        <div class="features">
          <h3>Multiple Hospitals Contact</h3><br><br>
          <div class="features-desc">
            <div class="features-icon">
              <i class="fa fa-stethoscope"></i>
            </div>
            <div class="features-text">
              <p>
                &nbsp&nbsp&nbsp&nbspContact us any suitable way and make an appointment with the doctor of &nbsp&nbsp&nbsp&nbspwhichever hospital whose help you need! Visit at the scheduled time and get your &nbsp&nbsp&nbsp&nbsptreatment.
              </p>
            </div>
          </div>
        </div>
        <div class="features">
          <h3>Wide Range of Services</h3><br><br>
          <div class="features-desc">
            <div class="features-icon">
              <i class="fa fa-heartbeat"></i>
            </div>
            <div class="features-text">
              <p>
                &nbsp&nbsp&nbsp&nbspWe provide the a wide range of services, so every person could have the &nbsp&nbsp&nbsp&nbspopportunity to receive qualitative medical help from whichever department of &nbsp&nbsp&nbsp&nbspwhichever hospital they need.
              </p>
            </div>
          </div>
        </div>
        <div class="features">
          <h3>Fix Online Appointments</h3><br><br>
          <div class="features-desc">
            <div class="features-icon">
              <i class="fa fa-medkit"></i>
            </div>
            <div class="features-text">
              <p>
                &nbsp&nbsp&nbsp&nbspYou can fix your appointment with doctor and can interact with doctor in &nbsp&nbsp&nbsp&nbspscheduled timings.
              </p>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-2">
        &nbsp;
      </div>
      <div class="col-sm-4 text-center profile">
        <br><br>
        <!--FIRST FORM BUTTON-->
        <img src="Images/medical-folder.png"><br><br><br>
        <div class="Doctor_login">
          <!-- Trigger the modal with a button -->
          <a href="#"><button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModaFind">Hospital Admin Login</button></a><br><br><br><br>
          <!-- Modal -->
          <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">
              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title text-center">Hospital Admin Login</h4>
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
        </div>


        <!--SECOND FORM BUTTON-->
        <img src="Images/patient_profile.png"><br><br><br>
        <div class="Patient_login">
          <!-- Trigger the modal with a button -->
          <a href="#"><button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModalFind">Log In as Patient</button></a><br><br>
          <!-- Modal -->
          <div class="modal fade" id="myModal1" role="dialog">
            <div class="modal-dialog">
              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title text-center">Log In as Patient</h4>
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
                    <button class="btn btn-lg btn-info btn-block" type="submit">Sign in</button><br>
                  </center>  Don't have an already existing account ? <a href="#" data-toggle="modal" data-target="#myModal2"><br>Sign Up</a></center>
                  </form>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>
        </div>


      </div>
    </div>

  </div>

  <section id="service">
    <div class="title-text">
      <p>We provide assistance in various spheres.</p>
    </div>
    <div class="service-box">
      <div class="single-service">
        <img src="Images/digitally-equiped.jpg" alt="">
        <div class="overlay1"></div>
        <div class="service-desc">
          <h3>Digitally Equipped</h3>
          <hr>
          <p>A computerized solution capable of operating all functional activities systemically</p>
        </div>
      </div>
      <div class="single-service">
        <img src="Images/administrator.jpg" alt="">
        <div class="overlay1"></div>
        <div class="service-desc">
          <h3>Administration</h3>
          <hr>
          <p>Allows the administrator to manage patients, appointments and medications smoothly.</p>
        </div>
      </div>
      <div class="single-service">
        <img src="Images/versatility.jpg" alt="">
        <div class="overlay1"></div>
        <div class="service-desc">
          <h3>Versatility</h3>
          <hr>
          <p>Provides hospital management services by creating multiple branches in a single domain.</p>
        </div>
      </div>
    </div>
  </section>
  <br><br>
  <div class="container text-justify">
    <p style="font-size: 20px;">We provide the a wide range of medical services, so every person could have the opportunity to receive qualitative medical help.This is a Software Requirements Specification (SRS) for the Hospital Management System. It
      describes the functions, goals and tasks that the system can perform. This is used to describe the scope of the project and to plan for the system’s design and implementation.</p>
  </div><br><br><br>
  <div class="container">
    <div class="row justify-content-center mb-5 pb-2">
      <div class="col-md-8 text-center heading-section ftco-animate fadeInUp ftco-animated">
        <!--<span class="subheading">Testimonials</span> -->
        <h2 class="mb-4"><img src="Images/testimonial.png" height="60px" width="60px" alt="">&nbsp&nbsp Our Patients Says About
          Us</h2>
        <p>Separated they live in. A small river named Duden flows by their place and supplies it with the necessary
          regelialia. It is a paradisematic country</p>
      </div>
    </div>
  </div>

  <br><br>

  <div class="owl-carousel owl-theme">
    <div class="container item testimonial">
      <blockquote>
        <p>For 50 years, WWF has been protecting the future of nature. The world's leading conservation organization,
          WWF works in 100 countries and is supported by 1.2 million members in the United States and close to 5 million
          globally.</p>
        <footer>From WWF's website</footer>
      </blockquote>
    </div>
    <div class="container item testimonial">
      <blockquote>
        <p>For 50 years, WWF has been protecting the future of nature. The world's leading conservation organization,
          WWF works in 100 countries and is supported by 1.2 million members in the United States and close to 5 million
          globally.</p>
        <footer>From WWF's website</footer>
      </blockquote>
    </div>
    <div class="container item testimonial">
      <blockquote>
        <p>For 50 years, WWF has been protecting the future of nature. The world's leading conservation organization,
          WWF works in 100 countries and is supported by 1.2 million members in the United States and close to 5 million
          globally.</p>
        <footer>From WWF's website</footer>
      </blockquote>
    </div>
    <div class="container item testimonial">
      <blockquote>
        <p>For 50 years, WWF has been protecting the future of nature. The world's leading conservation organization,
          WWF works in 100 countries and is supported by 1.2 million members in the United States and close to 5 million
          globally.</p>
        <footer>From WWF's website</footer>
      </blockquote>
    </div>

  </div>

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
  /Hospital find dropdown/
    /* When the user clicks on the button,
toggle between hiding and showing the dropdown content */
function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

function filterFunction() {
  var input, filter, ul, li, a, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  div = document.getElementById("myDropdown");
  a = div.getElementsByTagName("a");
  for (i = 0; i < a.length; i++) {
    txtValue = a[i].textContent || a[i].innerText;
    if (txtValue.toUpperCase().indexOf(filter) > -1) {
      a[i].style.display = "";
    } else {
      a[i].style.display = "none";
    }
  }
}


  var open = document.getElementById('hamburger');
  var changeIcon = true;

  open.addEventListener("click", function() {

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
  <script src="https://getbootstrap.com/docs/3.4/assets/js/ie10-viewport-bug-workaround.js"></script>
</body>

</html>