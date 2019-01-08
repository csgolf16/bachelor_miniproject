<?php
    require 'dbcon.php';

    $applicant = $_GET['applicant'];
    $applicant_department = $_GET['applicant_department'];
    $applicant_tel= $_GET['applicant_tel'];

    $query = "DELETE FROM applicant_tb WHERE applicant='$applicant' AND applicant_department='$applicant_department' AND applicant_tel='$applicant_tel'";
    
    $result = mysqli_query($dbcon, $query); 
    if ($result) {
        header("Location: dashboard.php");
    } else {
        echo "Error description: ".mysqli_error($dbcon);
    }
    
    mysqli_close($dbcon);

?>