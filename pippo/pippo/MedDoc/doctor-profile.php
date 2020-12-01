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
<html lang="en">

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
    /*NAV BAR AND TABLE CSS*/
    .hov a:hover {
      text-decoration: none;
    }

    header {
      background: white;
      height: 23vh;
    }

    header li a {
      color: black;
    }

    header li a:hover {
      color: black
    }

    nav {
      padding-top: 1.5rem;
    }

    .heading {
      font-family: 'Dosis', sans-serif;
      font-size: 6rem;
    }

    .heading span {
      color: #8bcdcd;
    }
    /*EDITABLE TABLE*/
    .row {
      margin-bottom: 20px;
    }
    .button.button-small {
      height: 30px;
      line-height: 30px;
      padding: 0px 10px;
    }

    td input[type=text],
    td select {
      width: 100%;
      height: 30px;
      margin: 0;
      padding: 2px 8px;
    }
    td input[type=number],
    td select {
      width: 100%;
      height: 30px;
      margin: 0;
      padding: 2px 8px;
    }

    td input[type=email],
    td select {
      width: 100%;
      height: 30px;
      margin: 0;
      padding: 2px 8px;
    }

    th:last-child {
      text-align: right;
    }

    td:last-child {
      text-align: right;
    }

    td:last-child .button {
      width: 30px;
      height: 30px;
      text-align: center;
      padding: 0px;
      margin-bottom: 0px;
      margin-right: 5px;
      background-color: #FFF;
    }

    td:last-child .button .fa {
      line-height: 30px;
      width: 30px;
      color: #8bcdcd;
    }
    table{
      font-size: 2rem;
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
          <li> <a href="#" style="color: black">Log Out</a></li>
        </ul>
      </li>
    </ul>
  </nav>
      </div>
    </header>
    <div class="container">
      <div class="row text-center">
        <br><br>
        <h1 class="heading"><span>M</span>y <span>P</span>rofile</h1>
      </div>
      <br><br>
    <form action="scripts/edit-doctor-profile.php" method="POST">
      <div class="row">
        <div class="col-md-12">
          <table class="table table-hover" id="editableTable">
            <tr data-id="1">
              <th> <strong>Name</strong> </th>
              <td data-field="name"><input type="text" value="Mr. Ajay" class="form-control"></td>
            </tr>
            <tr data-id="2">
              <th> <strong>Email ID</strong> </th>
              <td data-field="email"><input type="email" value="abc@gmail.com" class="form-control"></td>
            </tr>
            <tr data-id="3">
              <th> <strong>Age</strong> </th>
              <td data-field="age"><input type="number" value="23" class="form-control"></td>
            </tr>
            <tr data-id="4">
              <th> <strong>Gender</strong> </th>
              <td data-field="gender"><input type="text" value="Male" class="form-control"></td>
            </tr>
            <tr data-id="5">
              <th> <strong>Contact Number</strong> </th>
              <td data-field="contact"><input type="number" value="1234567890" class="form-control"></td>
            </tr>
            <tr data-id="6">
              <th> <strong>Qualification</strong> </th>
              <td data-field="qualification"><input type="text" value="abc" class="form-control"></td>
            </tr>
            <tr data-id="7">
              <th> <strong>Department</strong> </th>
              <td data-field="department"><input type="text" value="abc" class="form-control"></td>
            </tr>
          </table>
        </div>
      </div>
      <div class="row text-center">
      <button type="button" class="btn btn-info btn-lg" data-dismiss="modal">Save Changes</button>
      </div>
    </form>
    </div><br><br><br>
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