<?php

require "../includes/common.php";
$contact = $_POST['contact'];
$password = $_POST['password'];
$password = MD5(mysqli_real_escape_string($con, $password));
if(strlen($contact)==10)
{
    $query = "SELECT id,password FROM patients WHERE contact=$contact;";
    $query_submit = mysqli_query($con, $query);
    $query_rows = mysqli_num_rows($query_submit);
    if ($query_rows != 0)
    {
        $row = mysqli_fetch_array($query_submit);
        if ($row['password'] == $password) 
        {
            session_start();
            $_SESSION['contact'] = $contact;
            $_SESSION['id'] = $row['id'];
            $_SESSION['role']=3;
            $_SESSION['hospital']=$_POST['hospdbname'];
            header('location: ../patient-page.php');
        }
        else header("location: ../index.php?password_error=Incorrect Password");
    }
    else header("location: ../index.php?contact_error=Unregistered number");
}
else header("location: ../index.php?contact_error=Enter valid number");
