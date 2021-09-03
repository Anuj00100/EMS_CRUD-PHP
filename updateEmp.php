<?php

include "dbConn.php";

$id = filter_input(INPUT_POST, "id");
$first_name= filter_input(INPUT_POST, "first_name");
$gender= filter_input(INPUT_POST, "gender");
$address= filter_input(INPUT_POST, "address");

if($first_name== null || $gender== null || $address== null){
    echo "PLEASE ENTER ALL VALUES IN THE FORM<br>";
    //header("Location: index.html");
    exit();
}else{
$sql= "UPDATE emp_detail SET Name ='$first_name', Address ='$address', Gender ='$gender'  WHERE ID = '$id'";
if ($conn->query($sql) === TRUE) {
    header("Location: home.php");
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}
?>