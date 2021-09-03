<?php

session_start();
include "dbConn.php";
if(isset($_SESSION['id']) && isset($_SESSION['user_name'])){

 $sql = "SELECT * FROM emp_login ORDER BY id";
 $result = mysqli_query($conn, $sql);

?>

<html>

<head>
    <link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<!--<table>
    <tr>
        <th>Sno.</th>
        <th>NAME</th>
        <th>EMAIL ID</th>
        <th>PASSWORD</th>
        <th></th>
    </tr>
    <?php 
        $sno = 1;
        foreach($result as $r): ?>
    <tr>
        <td><?php echo $sno;?></td>
        <td><?php echo $r['name'];?></td>
        <td><?php echo $r['email'];?></td>
        <td><?php echo $r['pass'];?></td>
        <td><a href="delete.php?id=<?php echo $r['id'];?>">Delete</a></td>
    </tr>
    <?php 
        $sno++;
        endforeach;?>
</table>--> <br>
<hr><br>

</html>

<?php
$sql2 = "SELECT * FROM emp_detail";
$result2 = mysqli_query($conn, $sql2);
?>

<html>
<table>
    <tr>
        <th>Sno.</th>
        <th>NAME</th>
        <th>GENDER</th>
        <th>ADDRESS</th>
        <th>Delete</th>
        <th>Update</th>
    </tr>
    <?php $index = 1;
    foreach($result2 as $r2): ?>
    <tr>
        <td><?php echo $index;?></td>
        <td><?php echo $r2['Name'];?></td>
        <td><?php echo $r2['Gender'];?></td>
        <td><?php echo $r2['Address'];?></td>
        <td><a href="deleteEmp.php?id=<?php echo $r2['ID'];?>">Delete</a></td>
        <td><a href="AddEmpForm.php?id=<?php echo $r2['ID'];?>">Update</a></td>
    </tr>
    <?php 
    $index++;
    endforeach;?>
</table>

<a href="AddEmpForm.php">ADD NEW EMPLOYEE</a>

</html>

<?php 

}
else{
    header("Location: index.html");
    exit();
}

?>