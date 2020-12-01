<?php 

require "../includes/common.php";
$conn=new mysqli($servername,$serverusername,$serverpassword,$_SESSION['hospital']);

$request_id=$_POST['request_id'];

$query="UPDATE appointment_requests SET status='declined' WHERE id=$request_id;";
$query_result=mysqli_query($conn,$query) or die(mysqli_error($conn));

$query="UPDATE patient_requests SET status='declined' WHERE request_id=$request_id;";
$query_result=mysqli_query($con,$query) or die(mysqli_error($con));

header("location:../doctor-page.php");