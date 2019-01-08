<?php
    require 'dbcon.php';

    $applicant = $_POST['applicant_input'];
    $applicant_department = $_POST['applicant_department_input'];
    $applicant_tel= $_POST['applicant_tel_input'];

    $query = "INSERT INTO applicant_tb(applicant, applicant_department, applicant_tel) VALUES('$applicant', '$applicant_department', '$applicant_tel')";
    
    $result = mysqli_query($dbcon, $query); 
    if ($result) {
        header("Location: dashboard.php");
    } else {
        echo "Error description: ".mysqli_error($dbcon);
    }
    
    mysqli_close($dbcon);

?>