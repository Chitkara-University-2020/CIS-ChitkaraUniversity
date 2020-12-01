<?php
require 'includes/common.php';
if(!isset($_SESSION['id'])){
header('location: index.php');}
if($_SESSION['role']==2){
header('location: doctor-page.php');}
if($_SESSION['role']==1){
header('location: admin-page.php');}
$conn = mysqli_connect($servername, $serverusername, $serverpassword,$_SESSION['hospital']);
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
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

        <!--FOR SEARCH AND SELECT MULTIPLE DROPDOWN-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
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
            font-size: 4.5rem;
          }
          .heading span{
            color: #8bcdcd;
          }
          .form-signin p{
            font-size: 14px;
          }
        .mul-select{
            width: 500px;
        }
        .select2-container--default .select2-selection--multiple .select2-selection__choice {
    background-color: #8bcdcd;
    border: 1px solid #8bcdcd;
    border-radius: 4px;
    cursor: default;
    float: left;
    margin-right: 16px;
    margin-top: 5px;
    padding: 0 10px;
    border-radius: 20px;
    color: white;
    font-size: 20px;
    padding-bottom: 5px;
}
.select2-results__option[aria-selected]:hover{
    background-color: #8bcdcd;
}
.select2-container--default .select2-selection--multiple{
    font-size: 20px;
}
.justify-content-center{
  background-color: white;
}
.text-dark{
  background-color: white;
}
.form-control{
  width: 400px;
  height: 45px;
  border-radius: 0.5rem;
}
      .table{
        font-size: 2rem;
      }
      .field{
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
      </div>
    </header>
    <div class="container">
      <div class="row">
        <div class="col-sm-7">
          <img src="Images/skull.jpg" height=450px width=750px>
        </div>
        <div class="col-sm-1">
          &nbsp;
        </div>
        <div class="col-sm-4">
          <h1 class="heading">The aim of <span style="color: #8bcdcd">Medicine</span> is to prevent disease and prolong life; the ideal of <span style="color: #8bcdcd">Medicine</span> is to eliminate the need of a physician.</h1>
        </div>
      </div>
    </div>
    <br><br><br><br><br>
    <section id="appointment">
      <div class="container text-center">
        <h1 class="heading"><span style="color: #8bcdcd">M</span>ake <span style="color: #8bcdcd">A</span>n <span style="color: #8bcdcd">A</span>ppointment</h1>
      </div>
      <br><br><br>
      <div class="container">
        <h3>Don't know doctor of which department you should consult? Dont't worry !! Select your Symptoms and the system will tell about the doctor of which department you should consult.</h3>
        
        <br><br>
        <!-- <div class="row" style="font-size: 20px;">
          <div class="col-sm-4"><label for="otherDoc"><p>Have you consulted any other doctor before this for the same :</p></label></div>
          <div class="col-sm-8">
            <input type="radio" name="otherDoc" value="Y"> Yes&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="radio" name="otherDoc" value="N"> No
          </div>
        </div> -->
        <br><br>
        <?php if(isset($_GET['values'])){ $array=$_GET['values'];$array=json_decode($array); ?>
                <div style="font-size: 18px;">
                <span class="container" style="font-size: 18px; font-weight: 600; color: red"><h1>Selected Symptoms</h1></span><br><?php echo($array->symptoms); ?>
              <?php } else{ ?>
                </div>
        <strong><h2 style="color: #8bcdcd">SELECT YOUR SYMPTOMS</h2></strong>
        <div class="row" style="font-size: 20px; margin-left: -41.5rem;">
          <div class="col-sm-8">
            <div class="container-fluid h-100 bg-light text-dark">
              <br>
              
              <form action="scripts/suggest-doctors.php" method="POST">
              <div class="row justify-content-center align-items-center h-100">
                  <div class="col col-sm-6 col-md-6 col-lg-4 col-xl-3">
                      <div class="form-group">
                          <select class="mul-select" multiple="true" name="symptoms[]">
                          <?php
                              $query = "SELECT * FROM symptoms";
                              $result = mysqli_query($conn, $query);
                              $no_rows = mysqli_num_rows($result);
                              while ($no_rows--) { 
                                $row = mysqli_fetch_array($result);  ?> 
                                <option value="<?php echo $row['id']; ?>"><?php echo $row['symptom']; ?></option>  
                              <?php } ?>  
                          </select>
                          <br><br>
                          <button type="submit" class="btn btn-default btn-lg text-center" style="background-color: #8bcdcd; color: white; font-size: 20px; margin-left: 50rem;">Suggest Doctors</button>
                      </div> 
                 </div>
              </div>
              </form>
          </div>
          </div>
        </div>
        
        <?php } ?>
        <br><br><br><br>
        <!-- <div class="row" style="font-size: 20px;">
          <div class="col-sm-4"><label for="message"><p>Any other problem or symptoms you are facing :</p></label></div>
          <div class="col-sm-8">
            <input type="text" class="form-control" name="message">
          </div>
        </div><br><br><br> -->
        <?php if(isset($array)){ ?>
        <form action="scripts/request-appointment.php" method="post">
          
        <input type="text" name="symptoms" value="<?php echo $array->symptoms; ?>" style="display:none;">
        <h1 style="font-size: 24px; font-weight: 600; color: black"><span style="color: #8bcdcd">S</span>uggested <span style="color: #8bcdcd">D</span>octors(Doctor Name---Department)</h1><br>
        <div class="row">
          <div class="col-sm-4"><label for="datetime"><p>Select the Doctor :</p></label></div>
          <div class="col-sm-8">
          <select name="doctor" style="width: 400px; padding: 1rem; font-size: 1.7rem" class="form-control">
        <?php 
        $i=0;
            while(isset($array->$i)){ 
              echo "<option value='".$array->$i->doctor_id."'>".$array->$i->name."---".$array->$i->department."</option>";
              $i++;}
          ?>
        </select>
          </div>
        </div>
        
        <br><br><br>
        <div class="row" style="font-size: 20px;">
          <div class="col-sm-4"><label for="datetime"><p>You want to schedule your appointment on :</p></label></div>
          <div class="col-sm-8">
            <input type="datetime-local" class="form-control" name="datetime">
          </div>
        </div><br><br><br>
        <div class="row" style="font-size: 20px;">
          <div class="col-sm-4"><label for="message"><p>Any other symptoms or any message for the doctor :</p></label></div>
          <div class="col-sm-8">
            <input type="text" class="form-control" name="message">
          </div>
        </div><br><br><br><br>
        <div class="container text-center" style="font-size: 20px;">
          <button type="submit" class="btn btn-info btn-lg" style="font-size: 20px; background-color: #8bcdcd;">Make Appointment</button>
        </div>
        </form>
        <?php } ?>
        <br><br><br><br><br><br><br><br><br><br>
        <section id="status">
          <div class="container text-center">
            <?php
            $id=$_SESSION['id'];
            $hospital_db=$_SESSION['hospital'];
            
            $query="SELECT * FROM patient_requests WHERE patient_id=$id ORDER BY request_id DESC;";
            $query_result=mysqli_query($con,$query);
            $query_rows=mysqli_num_rows($query_result);

            if($query_rows>0) {
              $conn=new mysqli($servername,$serverusername,$serverpassword,$hospital_db);
            ?>
            <h1 class="heading"><span style="color: #8bcdcd">A</span>ppointment <span style="color: #8bcdcd">S</span>tatus</h1>
            <br><br><br><br><br><br>
            <table class="table table-hover" width=100%>
              <tbody>
                <?php
                while($query_rows--){
                  $row=mysqli_fetch_array($query_result); 
                  $request_id=$row['request_id'];
                  $query="SELECT d.name,ds.department FROM appointment_requests ar INNER JOIN doctors d ON ar.doctor_id=d.id INNER JOIN departments ds ON d.department_id=ds.id WHERE ar.id=$request_id;";
                  $query_result2=mysqli_query($conn,$query) or die(mysqli_error($conn));
                  $row2=mysqli_fetch_array($query_result2);
                ?>      
                <tr>
                  <td class="field"> <strong>Appointment Date and Time: </strong> </td>
                  <td class="data"><?php echo $row['datetime_of_appointment']; ?></td>
                </tr>
                <tr>
                  <td class="field"> <strong>Department : </strong> </td>
                  <td class="data"><?php echo $row2['department']; ?></td>
                </tr>
                <tr>
                  <td class="field"> <strong>Doctor's Name : </strong> </td>
                  <td class="data"><?php echo $row2['name']; ?></td>
                </tr>
                <tr>
                  <td class="field"> <strong>Appointment Status : </strong> </td>
                  <td class="data"><?php echo $row['status']; ?></td>
                </tr>
                <tr height="50"></tr>
                <?php } ?>
              </tbody>
            </table>
                <?php } ?>
            <br><br><br><br>
          </div>
        </section>
        <br><br><br><br>
      </div>
      <br><br><br><br><br><br><br>
    </section>
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

  /*multiple select dropdown*/
      $(document).ready(function(){
          $(".mul-select").select2({
                  placeholder: "Select the Symptoms", //placeholder
                  tags: true,
                  tokenSeparators: ['/',',',';'," "] 
              });
          })
  </script>
  </body>
</html>
