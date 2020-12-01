<?php

require '../includes/common.php';
$conn=new mysqli($servername,$serverusername,$serverpassword,$_SESSION['hospital']);

$name = $_POST['name'];
$address = $_POST['address'];
$contact = $_POST['contact'];
$gender = $_POST['gender'];
$dob= $_POST['dob'];
$email=$_POST['email'];
$qualification=$_POST['qualification'];
$department=$_POST['department'];
if(strlen($contact)==10)
{
    if(preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $email))
    {
        $check_contact_query = "SELECT id FROM doctors WHERE contact='$contact';";
        $check_contact_submit = mysqli_query($conn, $check_contact_query);
        $check_contact_rows = mysqli_num_rows($check_contact_submit);
        if($check_contact_rows==0)
        {
            if($gender=='O' || $gender=='F' || $gender=='M')
            {
                $department=mysqli_real_escape_string($conn, $department);
                $qualification=mysqli_real_escape_string($conn, $qualification);
                $address=mysqli_real_escape_string($conn, $address);
                $password = MD5($dob);
                $address = mysqli_real_escape_string($conn, $address);
                $name = mysqli_real_escape_string($conn, $name);
                if(!(is_numeric($department) || is_numeric($qualification)))
                {header('location: ../admin-page.php?doctor_error_message=Something went wrong');}
                /* $today = date("Y-m-d");
                $diff = date_diff(date_create($dob), date_create($today));
                $age=$diff->format('%y'); */
                
                $insert_query = "INSERT INTO doctors(name,password,contact,gender,address,date_of_birth,department_id,qualification_id,email) VALUES('$name','$password','$contact','$gender','$address','$dob','$department','$qualification','$email');";
                $insert_result = mysqli_query($conn, $insert_query) or die(mysqli_error($conn));

                header('location:../admin-page.php?doctor_success_message=Entry successfully made.');
            }
            else header('location: ../admin-page.php?doctor_gender_error=Enter valid gender');
        }
        else header('location: ../admin-page.php?doctor_contact_error=This contact number is already registered.');
    } 
    else header('location: ../admin-page.php?doctor_email_error=Enter valid email');
}
else header('location: ../admin-page.php?doctor_contact_error=Enter valid contact number');
?>