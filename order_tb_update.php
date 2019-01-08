<?php
    require 'dbcon.php';

    $order_id = $_POST['order_id'];
    $applicant_date = $_POST['applicant_date_input'];
    $applicant = $_POST['applicant_input'];
    $dispenser_date = $_POST['dispenser_date_input'];
    $dispenser = $_POST['dispenser_input'];

    $query = "UPDATE order_tb SET applicant_date='$applicant_date', applicant='$applicant', dispenser_date='$dispenser_date', dispenser='$dispenser' WHERE order_id='$order_id'";
    $result = mysqli_query($dbcon, $query);

    if ($result) {
        header("Location: dashboard.php");
    } else {
        echo "Error description: ".mysqli_error($dbcon);
    }
    
    mysqli_close($dbcon); 
?>