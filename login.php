<?php

session_start(); 
include "dbConn.php";

$email = ($_POST['email']);
$pass = ($_POST['pass']);

$sql = "SELECT * FROM emp_login WHERE email='$email' AND pass='$pass'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) === 1) {
    echo "Data";
    $row = mysqli_fetch_assoc($result);
    $_SESSION['user_name'] = $row['name'];
    $_SESSION['email'] = $row['email'];
    $_SESSION['id'] = $row['id'];
    header("Location: home.php");
    exit();
} else{
    //echo "No Data";
    echo"<br><h2>NO USER FOUND.<br>PLEASE CHECK THE EMAIL ADDRESS OR PASSWORD!</h2>";
}
?>
