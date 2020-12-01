<?php
require 'includes/common.php';
 if(!isset($_SESSION['id'])){
header('location: index.php');}
if($_SESSION['role']==1){
header('location: admin-page.php');}
if($_SESSION['role']==3){
header('location: patient-page.php');}
?>
<!DOCTYPE html>
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
    <style media="screen">
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
      .style{
        text-align: left;
      }
      .data{
        text-align: left;
      }
    </style>
  </head>
  <body style="background-color: white; padding-bottom: 0; padding-top: 0;">
      <header>
        <div class="menu-toggle" id="hamburger">
          <i class="fas fa-bars"></i>
        </div>
        <div class="overlay"></div>
        <div class="container hov">
        <nav>
    <h1 class="brand"><a href="index.php" style="color: black"><span>M</span>ed<span>D</span>oc</a></h1>
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
        </div>
      </header>
      <div class="container text-left">
        <div class="row">
          <div class="col-sm-5">
            <img src="Images/Human-heart.jpg" height=600px width=300px;>
          </div>
          <div class="col-sm-7">
            <img src="Images/anatomy.jpg" height=300px width=500px style="margin-left: -100px">
            <br><br>
            <h1 class="heading"><span style="color: #8bcdcd">S</span>cience has everything to <span style="color: #8bcdcd">S</span>ay about what is possible</h1>
          </div>
        </div>
      </div>
      <br><br><br>
      <section id="appointments">
        <div class="container">
          <div class="row text-center">
            <br><br><br><br><br>
            <h1 class="heading"><span>A</span>ppointment <span>R</span>equestes</h1>
          </div>
          <div class="row">
            <br><br><br><br>
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Gender</th>
                  <th>Age</th>
                  <th>Symptoms</th>
                  <th>Contact Number</th>
                  <th>Message From Patient</th>
                  <th>Appointment Date and Time</th>
                  <th>Appointment Status</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                $id=$_SESSION['id'];
                $hospital_db=$_SESSION['hospital'];
                $conn=new mysqli($servername,$serverusername,$serverpassword,$hospital_db);
                $query="SELECT * FROM appointment_requests WHERE doctor_id=$id;";
                $query_result=mysqli_query($conn,$query);
                $query_rows=mysqli_num_rows($query_result);
                while($query_rows--){
                $row=mysqli_fetch_array($query_result);
                $id=$row['patient_id'];
                $query="SELECT name,gender,contact FROM patients WHERE id=$id;";
                $query_result2=mysqli_query($con,$query);
                $row2=mysqli_fetch_array($query_result2);
                ?>
                <tr>
                  <td><?php echo $row2['name']; ?></td>
                  <td><?php echo $row2['gender']; ?></td>
                  <td><?php echo $row['age']; ?></td>
                  <td><?php echo $row['symptoms']; ?></td>
                  <td><?php echo $row2['contact']; ?></td>
                  <td><?php echo $row['message']; ?></td>
                  <td><?php echo $row['datetime_of_appointment']; ?></td>
                <td><?php if($row['status']=='pending'){ ?>
                  <form action="scripts/approve_request.php" method="POST">
                  <input type="text" value="<?php echo $row['id'] ?>" name="request_id" style="display:none;">
                  <button type="submit" class="btn btn-success">Approve</button>
                  </form>
                  &nbsp;&nbsp;
                  <form method="post" action="scripts/decline_request.php">
                  <input type="text" value="<?php echo $row['id'] ?>" name="request_id" style="display:none;">
                    <button type="submit" class="btn btn-danger">Decline</button><?php } else echo $row['status']; ?></td>
                  </form>
                </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </section>
      <br><br><br><br>
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
