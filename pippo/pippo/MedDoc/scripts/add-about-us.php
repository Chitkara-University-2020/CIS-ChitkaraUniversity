<?php
require "../includes/common.php";
$aboutus=$_POST['aboutus'];
$aboutus=mysqli_escape_string($con,$aboutus);
$id=$_SESSION['id'];
$query="SELECT info FROM hospitals WHERE id=$id;";
$result=mysqli_query($con,$query);
$result_array=mysqli_fetch_array($result);
$result_array=json_decode($result_array['info']);
$result_array->aboutus = $aboutus;
$result_array=json_encode($result_array);
//var_dump($result_array);
$query="UPDATE hospitals SET info='$result_array' WHERE id=$id;";
$query_submit=mysqli_query($con,$query) or die(mysqli_error($con));
header("location:../editable-page.php?aboutus_message=Successfully updated aboutus");