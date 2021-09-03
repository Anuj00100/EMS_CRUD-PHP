<?php

include "dbConn.php";

$id = $_GET['id'];
$sql = "DELETE FROM emp_detail WHERE ID=$id";
$result = mysqli_query($conn, $sql);
if($result){
    header("Location: home.php");
}else{
    echo "UNABLE TO DELETE!";
}

?>