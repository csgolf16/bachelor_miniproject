<?php
    require 'dbcon.php';

    $dispenser = $_GET['dispenser'];
    $dispenser_department = $_GET['dispenser_department'];
    $dispenser_tel= $_GET['dispenser_tel'];

    $query = "DELETE FROM dispenser_tb WHERE dispenser='$dispenser' AND dispenser_department='$dispenser_department' AND dispenser_tel='$dispenser_tel'";
    
    $result = mysqli_query($dbcon, $query); 
    if ($result) {
        header("Location: dashboard.php");
    } else {
        echo "Error description: ".mysqli_error($dbcon);
    }
    
    mysqli_close($dbcon);

?>