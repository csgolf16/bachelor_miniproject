<?php
    require 'dbcon.php';

    $dispenser = $_POST['dispenser_input'];
    $dispenser_department = $_POST['dispenser_department_input'];
    $dispenser_tel = $_POST['dispenser_tel_input'];
    $dispenser_raw = $_POST['dispenser_raw'];

    $query = "UPDATE dispenser_tb SET dispenser='$dispenser', dispenser_department='$dispenser_department', dispenser_tel='$dispenser_tel' WHERE dispenser='$dispenser_raw'";
    $result = mysqli_query($dbcon, $query);

    if ($result) {
        header("Location: dashboard.php");
    } else {
        echo "Error description: ".mysqli_error($dbcon);
    }
    
    mysqli_close($dbcon);
?>