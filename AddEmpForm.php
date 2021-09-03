<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="css/main.css">
</head>

<body>
    <header>
        <h2 style="text-align: center;">INSERT NEW EMPLOYEE DETAILS</h2>
    </header>
    <?php
    if (!isset($_GET['id'])) {
    ?>
        <section>
            <form style="text-align: center; margin: auto;" action="AddEmp.php" method="POST" id="add_emp_form">
                <label>First Name: </label>
                <input type="text" name="first_name"><br>
                <label class="margin">Gender: </label>
                <input type="radio" name="gender" value="M" id="male">MALE<t>
                    <input type="radio" name="gender" value="F" id="female">FEMALE<br>
                    <label class="margin">Address: </label>
                    <input type="text" name="address"><br>
                    <input type="submit" value="Add Employee"><br>
            </form>
        </section>
        <?php
    } else {
        ///Get Query
        include "dbConn.php";
        $id = $_GET['id'];
        $sql = "SELECT * FROM emp_detail WHERE ID=$id";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            $isTrueM = "";
            $isTrueF = "";
            if($row['Gender'] === 'M' ){
                $isTrueM = "checked";
            } else {
                $isTrueF = "checked";
            }
        ?>
            <section>
                <form style="text-align: center; margin: auto;" action="updateEmp.php" method="POST" id="add_emp_form">
                    <label> update First Name: </label>
                    <input type="text" name="first_name" value="<?php echo $row['Name'];?>"><br>
                    <label class="margin">Gender: </label>
                    <input type="radio" name="gender" value="M" id="male" <?php echo $isTrueM; ?> >MALE<t>
                        <input type="radio" name="gender" value="F" <?php echo $isTrueF; ?> id="female">FEMALE<br>
                        <label class="margin">Address: </label>
                        <input type="text" name="address" value="<?php echo $row['Address'];?>"><br>
                        <input type="hidden" name="id" value="<?php echo $row['ID'];?>">
                        <input type="submit" value="Add Employee"><br>
                </form>
            </section>
    <?php
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    ?>
</body>

</html>