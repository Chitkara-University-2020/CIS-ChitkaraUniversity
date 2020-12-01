<?php
require "../includes/common.php";
$tagline=$_POST['tagline'];
$tagline=mysqli_escape_string($con,$tagline);
$id=$_SESSION['id'];
$query="SELECT info FROM hospitals WHERE id=$id;";
$result=mysqli_query($con,$query);
$result_array=mysqli_fetch_array($result);
$result_array=json_decode($result_array['info']);
$result_array->tagline = $tagline;
$result_array=json_encode($result_array);
//var_dump($result_array);
$query="UPDATE hospitals SET info='$result_array' WHERE id=$id;";
$query_submit=mysqli_query($con,$query) or die(mysqli_error($con));
header("location:../editable-page.php?tagline_message=Successfully updated Tagline");