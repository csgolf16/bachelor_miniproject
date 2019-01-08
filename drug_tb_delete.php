<?php
    require 'dbcon.php';

    $drug_id = $_GET['drug_id'];
    $drug_name = $_GET['drug_name'];
    $drug_unit= $_GET['drug_unit'];

    $query = "DELETE FROM drug_tb WHERE drug_id='$drug_id' AND drug_name='$drug_name' AND drug_unit='$drug_unit'";
    
    $result = mysqli_query($dbcon, $query); 
    if ($result) {
        header("Location: dashboard.php");
    } else {
        echo "Error description: ".mysqli_error($dbcon);
    }
    
    mysqli_close($dbcon);

?>