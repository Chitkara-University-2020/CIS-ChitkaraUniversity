<?php 
require "../includes/common.php";


$conn=new mysqli($servername,$serverusername,$serverpassword,$_POST['hospdbname']);
$email=$_POST['email'];
$password=$_POST['password'];
$email= mysqli_real_escape_string($conn, $email);
$password = MD5(mysqli_real_escape_string($conn, $password));
$query = "SELECT id,password FROM doctors WHERE email='$email';";
$query_submit = mysqli_query($conn, $query);
$query_rows = mysqli_num_rows($query_submit);
if ($query_rows != 0)
{
    $row = mysqli_fetch_array($query_submit);
    if ($row['password'] == $password) 
    {
        session_start();
        $_SESSION['email'] = $email;
        $_SESSION['id'] = $row['id'];
        $_SESSION['role']=2;
        $_SESSION['hospital']=$_POST['hospdbname'];
        header('location: ../doctor-page.php');
    }
    else header("location: ../hospital.php?hospital=".$_POST['hospname']."&password_error=Incorrect Password");
}
else header("location: ../hospital.php?hospital=".$_POST['hospname']."&contact_error=Unregistered email");