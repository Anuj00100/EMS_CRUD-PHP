<?php

include "dbConn.php";

$first_name= filter_input(INPUT_POST, "first_name");
$gender= filter_input(INPUT_POST, "gender");
$address= filter_input(INPUT_POST, "address");

if($first_name== null || $gender== null || $address== null){
    echo "PLEASE ENTER ALL VALUES IN THE FORM<br>";
    //header("Location: index.html");
    exit();
}else{
$sql= "INSERT INTO emp_detail VALUES (null, '$first_name', '$gender', '$address')";
if ($conn->query($sql) === TRUE) {
    header("Location: home.php");
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}
?>