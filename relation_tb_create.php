<?php
    require 'dbcon.php';

    $order_id = uniqid();
    $applicant_date = $_POST['applicant_date_input'];
    $applicant = $_POST['applicant_input'];
    $dispenser_date= $_POST['dispenser_date_input'];
    $dispenser = $_POST['dispenser_input'];

    mysqli_query($dbcon, "INSERT INTO order_tb(order_id, applicant_date, applicant, dispenser_date, dispenser) VALUES('$order_id', '$applicant_date', '$applicant', '$dispenser_date', '$dispenser')") or die (mysql_error());
    mysqli_close($dbcon); 

    $connect = new PDO("mysql:host=localhost;dbname=miniproject_db", "root", "");

    for($count = 0; $count < count($_POST["drug_id_input"]); $count++) {  
        $query = "INSERT INTO list_tb (order_id, drug_id, drug_amount) VALUES (:order_id, :drug_id, :drug_amount)";
        $statement = $connect->prepare($query);
        $statement->execute(array(
            ':order_id'   => $order_id,
            ':drug_id'  => $_POST["drug_id_input"][$count], 
            ':drug_amount'  => $_POST["drug_amount_input"][$count]
        ));
    }
    $result = $statement->fetchAll();
    if(isset($result)) {
        echo 'success';
    }

?>