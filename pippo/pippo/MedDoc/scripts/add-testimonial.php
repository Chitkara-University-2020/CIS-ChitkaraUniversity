<?php
require "../includes/common.php";
$source=$_POST['source'];
$testimonial=$_POST['testimonial'];

$source=mysqli_escape_string($con,$source);
$testimonial=mysqli_escape_string($con,$testimonial);
$id=$_SESSION['id'];

$query="SELECT testimonials FROM hospitals WHERE id=$id;";
$result=mysqli_query($con,$query);
$result_array=mysqli_fetch_array($result);
$result_array=json_decode($result_array['testimonials']);

$i=1+(int)$result_array->testimonialsnumber;
$result_array->alltestimonials[$i]->source= $source;
$result_array->alltestimonials[$i]->testimonial= $testimonial;
$result_array->testimonialsnumber=$i;
$result_array=json_encode($result_array);

//var_dump($result_array); die();
$query="UPDATE hospitals SET testimonials='$result_array' WHERE id=$id;";
$query_submit=mysqli_query($con,$query) or die(mysqli_error($con));
header("location:../editable-page.php?testimonial_message=Successfully updated Tagline");