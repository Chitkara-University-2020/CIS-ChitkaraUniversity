<?php
$servername="localhost";
$serverusername="root";
$serverpassword="";
$con=mysqli_connect($servername, $serverusername, $serverpassword,"meddoc")or die(mysqli_error($con));
if(!isset($_SESSION)) { session_start(); }
?>