<?php 
require "../includes/common.php";
$hospital_db=$_SESSION['hospital'];
$conn=new mysqli($servername,$serverusername,$serverpassword,$hospital_db);

$id=$_SESSION['id'];
$symptoms=$_POST['symptoms'];
if(isset($_POST['message'])){
    $message=$_POST['message'];
}
else $message=null;
$datetime=$_POST['datetime'];
$doctor=$_POST['doctor'];

$symptoms=mysqli_escape_string($conn,$symptoms);
$message=mysqli_escape_string($conn,$message);
$datetime=mysqli_escape_string($conn,$datetime);
$doctor=mysqli_escape_string($conn,$doctor);

$query="SELECT date_of_birth FROM patients WHERE id=$id;";
$query_result=mysqli_query($con,$query);
$row=mysqli_fetch_array($query_result);
$dob=$row['date_of_birth'];

$today = date("Y-m-d");
$diff = date_diff(date_create($dob), date_create($today));
$age=$diff->format('%y'); 

$query="INSERT INTO appointment_requests(doctor_id,patient_id,age,symptoms,datetime_of_appointment) VALUES($doctor,$id,$age,'$symptoms','$datetime')";
//echo $query;
$query_result=mysqli_query($conn,$query) or die(mysqli_error($conn));
$request_id = mysqli_insert_id($conn);

$query="INSERT INTO patient_requests(patient_id,hospital_db,request_id,datetime_of_appointment) VALUES($id,'$hospital_db',$request_id,'$datetime');";
$query_result=mysqli_query($con,$query) or die(mysqli_error($con));

header("location:../patient-page.php");