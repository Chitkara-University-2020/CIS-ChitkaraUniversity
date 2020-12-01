<?php
require 'includes/common.php';
 if(!isset($_SESSION['id'])){
header('location: index.php');}
if($_SESSION['role']==2){
header('location: doctor-page.php');}
if($_SESSION['role']==3){
header('location: patient-page.php');}

$conn=new mysqli($servername,$serverusername,$serverpassword,$_SESSION['hospital']);
?>
<?php require "includes/common.php"; ?><!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="author" content="">
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
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@500&display=swap" rel="stylesheet">
    <title></title>
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="stylesheet" href="CSS/login.css">
    <style>
       .hov a:hover {
        text-decoration: none;
      }
      header{
        background: white;
        height: 23vh;
      }
      header li a{
        color: black;
      }
      header li a:hover{
        color: black
      }
      nav{
        padding-top: 1.5rem;
      }
      .heading{
        font-family: 'Dosis', sans-serif;
        font-size: 6rem;
      }
      .heading span{
        color: #8bcdcd;
      }
      .table{
        font-size: 2rem;
      }
      .style{
        text-align: left;
      }
      .data{
        text-align: left;
      }
    </style>
</head>
  <body style="background-color: white; padding-bottom: 0; padding-top: 0;">
  <!-- Trigger the modal with a button 
  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModalAddDoc">Add a Doctor</button>-->

  <!-- Modal -->
  <div class="modal fade" id="myModalAddDoc" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title text-center">Add a Doctor</h4>
        </div>
        <div class="modal-body text-center">
          <form class="form-signin" method="post" action="Login/add-a-doctor-script.php">
          <img src=" Images/doctor_profile.png" alt=""><br>
            <br>
            <label for="name" class="sr-only">Name</label>
            <input type="text" id="name" class="form-control" placeholder="Name" name="name" autofocus>
            <br>
            <label for="dob" class="sr-only">Date of Birth</label>
            <input type="date" id="dob" class="form-control" name="dob" placeholder="Date of Birth">
            <br>
            <label for="gender" class="sr-only">Gender</label>
            <input type="radio" name="gender" value="M"> Male
            <input type="radio" name="gender" value="F"> Female
            <input type="radio" name="gender" value="O"> Others
            <br><br>
            <label for="contact" class="sr-only">Contact No.</label>
            <input type="number" id="contact" class="form-control" placeholder="Contact Number" name="contact"  pattern="[0-9]{10}">
            <br>
            <label for="email" class="sr-only">Email</label>
            <input type="email" id="email" class="form-control" placeholder="Email" name="email">
            <br>
            <label for="address" class="sr-only">Address:</label>
            <input type="text" id="address" class="form-control" name="address" placeholder="Address">
            <br>
            <label for="qualf" class="sr-only">Qualification:</label>
            <!-- <input type="text" id="qualf" name="qualification" class="form-control" placeholder="Qualification" required> -->
            <select name="qualification">
              <option value="0">Select Doctor's Qualification</option>
            <?php
            $query = "SELECT * FROM qualifications";
            $result = mysqli_query($conn, $query);
            $no_rows = mysqli_num_rows($result);
            while ($no_rows--) {
              $row = mysqli_fetch_array($result);
              ?>  
              <?php echo "<option value='".$row['id']."'>".$row['qualification']."</option>"; } ?>
            </select>
            <br>
            <br>
            <label for="dept" class="sr-only">Department:</label>
            <!--<input type="text" id="dept" name="department" class="form-control" placeholder="Department" required>-->
            <select name="department">
              <option value="0" selected>Select Department</option>
            <?php
            $query = "SELECT * FROM departments";
            $result = mysqli_query($conn, $query);
            $no_rows = mysqli_num_rows($result);
            while ($no_rows--) {
              $row = mysqli_fetch_array($result);
              ?>  
              <?php echo "<option value='".$row['id']."'>".$row['department']."</option>"; } ?>
            </select>
            <br>
            <button class="btn btn-lg btn-info btn-block" type="submit">Add Doctor</button>
            </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>

    </div>
  </div>
  <header>
        <div class="menu-toggle" id="hamburger">
          <i class="fas fa-bars"></i>
        </div>
        <div class="overlay"></div>
        <div class="container hov">
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
        </div>
      </header>
      <div class="container text-left">
        <div class="row">
          <div class="col-sm-5">
            <img src="Images/heart-study.jpg" height=600px width=300px;>
          </div>
          <div class="col-sm-7">
            <img src="Images/admin-anatomy.jpg" height=280px width=500px style="margin-left: -100px">
            <br><br><br>
            <img src="Images/skull.jpg" height=280px width=500px style="margin-left: -100px">
            <h1 class="heading" style="margin-left: 60px;"><span style="color: #8bcdcd">S</span>cience has everything to <span style="color: #8bcdcd">S</span>ay about what is possible</h1>
          </div>
        </div>
      </div>
      <br><br><br><br><br><br>
      <div class="container text-justify">
        <p style="font-size: 20px;">We provide the a wide range of medical services, so every person could have the opportunity to receive qualitative medical help.This is a Software Requirements Specification (SRS) for the Hospital Management System. It
          describes the functions, goals and tasks that the system can perform. This is used to describe the scope of the project and to plan for the system’s design and implementation.</p>
      </div>
      <br><br>
      <div class="container text-center" id="add">
        <h1 class="heading"><span style="color: #8bcdcd">A</span>dd <span style="color: #8bcdcd">Or</span> <span style="color: #8bcdcd">U</span>pdate<span style="color: #8bcdcd">D</span>ata</h1>
      </div>
      <br><br><br>
      <div class="row">
        <div class="col-sm-6 text-center">
          <img src="Images/doctor_profile.png" alt="">
          <br><br><br>
          <button type="button" class="btn btn-lg btn-default" data-toggle="modal" data-target="#myModalAddDoc">Add a Doctor</button>
        </div>
        <div class="col-sm-6 text-center">
          <img src="Images/patient_profile.png" alt="">
          <br><br><br>
          <button type="button" class="btn btn-lg btn-default">Add a Patient</button>
        </div>
      </div>
      <br><br><br><br>
      <br><br><br><br>
      <section id="profile">
        <div class="container">
            <div class="row text-center">
              <br><br><br><br><br>
              <h1 class="heading"><span>M</span>y <span>P</span>rofile</h1>
            </div>
            <br><br><br>
            <div class="row">
              <table class="table table-hover" width=100%>
                <tbody>
                  <tr>
                    <td class="field"> <strong>Name</strong> </td>
                    <td class="data">&nbsp</td>
                  </tr>
                  <tr>
                    <td class="field"> <strong>Email ID</strong> </td>
                    <td class="data">&nbsp</td>
                  </tr>
                  <tr>
                    <td class="field"> <strong>Gender</strong> </td>
                    <td class="data">&nbsp</td>
                  </tr>
                  <tr>
                    <td class="field"> <strong>Age</strong> </td>
                    <td class="data">&nbsp</td>
                  </tr>
                  <tr>
                    <td class="field"> <strong>Contact Number</strong> </td>
                    <td class="data">&nbsp</td>
                  </tr>
                  <tr>
                    <td class="field"> <strong>Address</strong> </td>
                    <td class="data">&nbsp</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          <br><br><br><br>
      </section>
      <br><br><br>
      <div class="container text-center">
          <div class="row">
            <div class="col-sm-4">
                <img src="Images/admin-page2.jpg" height=280px width=350px style="border-radius: 20px;">
            </div>
            <div class="col-sm-4">
                <img src="Images/admin-page1.jpg" height=280px width=350px style="border-radius: 20px;">
            </div>
            <div class="col-sm-4">
                <img src="Images/admin-page3.jpg" height=280px width=350px style="border-radius: 20px;">
            </div>
          </div>
      </div>
      <br><br><br>
      <div class="container text-justify">
        <p style="font-size: 20px;">We provide the a wide range of medical services, so every person could have the opportunity to receive qualitative medical help.This is a Software Requirements Specification (SRS) for the Hospital Management System. It
          describes the functions, goals and tasks that the system can perform. This is used to describe the scope of the project and to plan for the system’s design and implementation.</p>
      </div><br><br>
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
      /*Nav Bar js*/
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
  </body>
</html>
