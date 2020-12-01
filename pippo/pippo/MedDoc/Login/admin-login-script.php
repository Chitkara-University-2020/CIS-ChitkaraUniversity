<?php 
require "../includes/common.php";

$email=$_POST['email'];
$password=$_POST['password'];
$email= mysqli_real_escape_string($con, $email);
$password = MD5(mysqli_real_escape_string($con, $password));

$query = "SELECT id,password,db_name FROM hospitals WHERE email='$email';";
$query_submit = mysqli_query($con, $query);
$query_rows = mysqli_num_rows($query_submit);
if ($query_rows != 0)
{
    $row = mysqli_fetch_array($query_submit);
    if ($row['password'] == $password) 
    {
        session_start();
        $_SESSION['email'] = $email;
        $_SESSION['id'] = $row['id'];
        $_SESSION['role']=1;
        $_SESSION['hospital']=$row['db_name'];
        header('location: ../admin-page.php');
    }
    else header("location: ../index.php?password_error=Incorrect Password");
}
else header("location: ../index.php?contact_error=Unregistered email");