<?php
    require 'dbcon.php';

    $order_id = $_GET['order_id'];
    $drug_id = $_GET['drug_id'];
    $drug_amount = $_GET['drug_amount'];

    $query = "DELETE FROM list_tb WHERE order_id='$order_id' AND drug_id='$drug_id' AND drug_amount='$drug_amount'";

    $result = mysqli_query($dbcon, $query);
    if ($result) {
        header("Location: dashboard.php");
    } else {
        echo "Error description: ".mysqli_error($dbcon);
    }
    mysqli_free_result($result); 
    mysqli_close($dbcon);
?>