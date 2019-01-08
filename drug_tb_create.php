<?php
    require 'dbcon.php';

    $drug_id = $_POST['drug_id_input'];
    $drug_name = $_POST['drug_name_input'];
    $drug_unit= $_POST['drug_unit_input'];

    $query = "INSERT INTO drug_tb(drug_id, drug_name, drug_unit) VALUES('$drug_id', '$drug_name', '$drug_unit')";
    
    $result = mysqli_query($dbcon, $query); 
    if ($result) {
        header("Location: dashboard.php");
    } else {
        echo "Error description: ".mysqli_error($dbcon);
    }
    
    mysqli_close($dbcon);

?>