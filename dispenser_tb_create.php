<?php
    require 'dbcon.php';

    $dispenser = $_POST['dispenser_input'];
    $dispenser_department = $_POST['dispenser_department_input'];
    $dispenser_tel= $_POST['dispenser_tel_input'];

    $query = "INSERT INTO dispenser_tb(dispenser, dispenser_department, dispenser_tel) VALUES('$dispenser', '$dispenser_department', '$dispenser_tel')";
    
    $result = mysqli_query($dbcon, $query); 
    if ($result) {
        header("Location: dashboard.php");
    } else {
        echo "Error description: ".mysqli_error($dbcon);
    }
    
    mysqli_close($dbcon);

?>