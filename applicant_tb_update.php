<?php
    require 'dbcon.php';

    $applicant = $_POST['applicant_input'];
    $applicant_department = $_POST['applicant_department_input'];
    $applicant_tel = $_POST['applicant_tel_input'];
    $applicant_raw = $_POST['applicant_raw'];

    $query = "UPDATE applicant_tb SET applicant='$applicant', applicant_department='$applicant_department', applicant_tel='$applicant_tel' WHERE applicant='$applicant_raw'";
    $result = mysqli_query($dbcon, $query);

    if ($result) {
        header("Location: dashboard.php");
    } else {
        echo "Error description: ".mysqli_error($dbcon);
    }
    
    mysqli_close($dbcon);
?>