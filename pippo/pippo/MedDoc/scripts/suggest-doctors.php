<?php 
require "../includes/common.php";
$conn=new mysqli($servername,$serverusername,$serverpassword,$_SESSION['hospital']);
$symptoms=$_POST['symptoms'];
//var_dump($symptoms);
$i=count($symptoms);
$str="symptom_id=".(string)$symptoms[--$i];
while(--$i>=0){
    $str.=" or symptom_id=".$symptoms[$i];
}
$query="SELECT DISTINCT doc.id as doctor_id,doc.name,s.id as symptom_id,s.symptom,d.department
FROM deparment_symptoms ds
INNER JOIN symptoms s ON ds.symptom_id=s.id
INNER JOIN departments d ON ds.department_id=d.id
INNER JOIN doctors doc ON doc.department_id=d.id
WHERE $str
GROUP BY name ;";
$query_submit=mysqli_query($conn,$query) or die(mysqli_error($conn));
$query_num_rows=mysqli_num_rows($query_submit);
while($query_num_rows--){
$row=mysqli_fetch_array($query_submit);
$array[$query_num_rows]=$row;
}

$i=count($symptoms);
$str="id=".(string)$symptoms[--$i];
while(--$i>=0){
    $str.=" or id=".$symptoms[$i];
}
$query="SELECT symptom FROM symptoms WHERE $str";
$query_result=mysqli_query($conn,$query);
$query_num_rows=mysqli_num_rows($query_result);
$str="";
while($query_num_rows--){
$row=mysqli_fetch_array($query_result);
$str.=$row['symptom'].",";
}
$array['symptoms']=substr_replace($str ,"", -1);
$array=json_encode($array);
//var_dump($array);
header("location:../patient-page.php?values=".$array);