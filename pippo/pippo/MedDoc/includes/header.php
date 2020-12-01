<?php

if(!isset($SESSION['id'])){
  echo
  '
  <nav>
  <h1 class="brand"><a href="index.php"><span>M</span>ed<span>D</span>oc</a></h1>
  <ul>
    <li class="dropdown">
      <a href="#" class="dropdown-toggle" data-toggle="dropdown">Sign Up<b class="caret"></b></a>
      <ul class="dropdown-menu">
        <li> <a href="#" data-toggle="modal" data-target="#myModal2">Patient</a></li>
        <li> <a href="#" data-toggle="modal" data-target="#myModalHosp">Hospital</a></li>
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
  ';
}

else
{
  if($_SESSION['role']==1){

    echo '<nav>
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
</nav>';
}

  elseif($_SESSION['role']==2){
    echo '<nav>
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
  </nav>';
  }

  else
  {
    echo '
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
    </nav>';
  }
}






?>