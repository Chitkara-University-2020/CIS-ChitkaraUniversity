<?php

require '../includes/common.php';

$name = $_POST['name'];
$address = $_POST['address'];
$password = $_POST['password'];
$contact = $_POST['contact'];
$gender = $_POST['gender'];
$dob= $_POST['dob'];

if(strlen($contact)==10)
{
    $check_contact_query = "SELECT id FROM patients WHERE contact='$contact';";
    $check_contact_submit = mysqli_query($con, $check_contact_query);
    $check_contact_rows = mysqli_num_rows($check_contact_submit);
    if($check_contact_rows==0)
    {
        if($gender=='O' || $gender=='F' || $gender=='M')
        {
            if(strlen($password)>=6 && strlen($password)<=16)
            {
                $password = MD5(mysqli_real_escape_string($con, $password));
                $address = mysqli_real_escape_string($con, $address);
                $name = mysqli_real_escape_string($con, $name);
                
                /* $today = date("Y-m-d");
                $diff = date_diff(date_create($dob), date_create($today));
                $age=$diff->format('%y'); */
                
                $insert_query = "INSERT INTO patients(name,password,contact,gender,address,date_of_birth) VALUES('$name','$password','$contact','$gender','$address','$dob');";
                $insert_result = mysqli_query($con, $insert_query) or die(mysqli_error($con));
                session_start();
                $_SESSION['contact'] = $contact;
                $_SESSION['id'] = mysqli_insert_id($con);
                $_SESSION['role'] = 3;
                
                header('location:../patient-page.php');
            }
            else header('location: ../index.php?password_error=Password must be between 6 and 16 characters');
        }
        else header('location: ../index.php?gender_error=Enter valid gender');
    }
    else header('location: ../index.php?contact_error=This contact number is already registered.');
}
else header('location: ../index.php?contact_error=Enter valid contact number');
?>