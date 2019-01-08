<?php
    require 'dbcon.php';

    $drug_id = $_POST['drug_id_input'];
    $drug_amount = $_POST['drug_amount_input'];
    $order_id_raw = $_POST['order_id_raw'];
    $drug_id_raw = $_POST['drug_id_raw'];
    $drug_amount_raw = $_POST['drug_amount_raw'];

    $query = "UPDATE list_tb SET drug_id='$drug_id', drug_amount='$drug_amount' WHERE order_id='$order_id_raw' AND drug_id='$drug_id_raw' AND drug_amount='$drug_amount_raw'";
    $result = mysqli_query($dbcon, $query);

    if ($result) {
        header("Location: dashboard.php");
    } else {
        echo "Error description: ".mysqli_error($dbcon);
    }
    
    mysqli_close($dbcon);
?>