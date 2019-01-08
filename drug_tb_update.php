<?php
    require 'dbcon.php';

    $drug_id = $_POST['drug_id_input'];
    $drug_name = $_POST['drug_name_input'];
    $drug_unit = $_POST['drug_unit_input'];
    $drug_id_raw = $_POST['drug_id_raw'];

    $query = "UPDATE drug_tb SET drug_id='$drug_id', drug_name='$drug_name', drug_unit='$drug_unit' WHERE drug_id='$drug_id_raw'";
    
    $result = mysqli_query($dbcon, $query);
    if ($result) {
        header("Location: dashboard.php");
    } else {
        echo "Error description: ".mysqli_error($dbcon);
    }
    
    mysqli_close($dbcon);
?>