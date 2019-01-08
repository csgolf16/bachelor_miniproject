<?php
    require 'dbcon.php';

    $order_id = $_GET['order_id'];
    $applicant_date = $_GET['applicant_date'];
    $applicant = $_GET['applicant'];
    $dispenser_date = $_GET['dispenser_date'];
    $dispenser = $_GET['dispenser'];

    $query1 = "DELETE FROM order_tb WHERE order_id='$order_id' AND applicant_date='$applicant_date' AND applicant='$applicant' AND dispenser_date='$dispenser_date' AND dispenser='$dispenser'";
    $result1 = mysqli_query($dbcon, $query1);
    $query2 = "DELETE FROM list_tb WHERE order_id='$order_id'";
    $result2 = mysqli_query($dbcon, $query2);


    if ($result1 AND $result2) {
        header("Location: dashboard.php");
    } else {
        echo "Error description: ".mysqli_error($dbcon);
    }
    
    mysqli_close($dbcon);
?>