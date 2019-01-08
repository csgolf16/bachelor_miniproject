<?php
    session_start(); 
    if (!isset($_SESSION['login_username'])) {
        header("Location: index.php");
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard | MiniProject</title>
    <link rel="stylesheet" href="./public/css/bootstrap.min.css">
    <script src="./public/js/jquery.min.js"></script>
    <script src="./public/js/bootstrap.min.js"></script>
</head>

<body>

    <!-- nav -->
    <div class="container">
        <br>
        <div align="right">
            <?php echo "welcome ".$_SESSION['login_username']." "; ?>
            <a href="dashboard_logout.php">logout</a>
        </div>
        <hr>
        <h1>ระบบจัดเก็บและสืบค้นข้อมูลการจ่ายยา</h1>
    </div>
    <!-- /nav -->

    <!-- tab -->
    <div class="container">
        <ul class="nav nav-tabs" style="text-align: center;">
            <li class="active"><a data-toggle="tab" href="#order_tb">ตารางออเดอร์</a></li>
            <li><a data-toggle="tab" href="#list_tb">ตารางรายการจ่ายา</a></li>
            <li><a data-toggle="tab" href="#drug_tb">ตารางยา</a></li>
            <li><a data-toggle="tab" href="#applicant_tb">ตารางผู้ขอยา</a></li>
            <li><a data-toggle="tab" href="#dispenser_tb">ตารางผู้จ่ายยา</a></li>
            <!--
            <li><a data-toggle="tab" href="#dashboard">ตารางรวม</a></li>
            -->
        </ul>
        <div class="tab-content is_center">
            <div class="tab-pane fade in active" id="order_tb">
                <?php require 'order_tb_read.php' ?>
            </div>
            <div class="tab-pane fade" id="list_tb">
                <?php require './list_tb_read.php' ?>
            </div>
            <div class="tab-pane fade" id="drug_tb">
                <?php require 'drug_tb_read.php' ?>
            </div>
            <div class="tab-pane fade" id="applicant_tb">
                <?php require 'applicant_tb_read.php' ?>
            </div>
            <div class="tab-pane fade" id="dispenser_tb">
                <?php require 'dispenser_tb_read.php' ?>
            </div>
            <!--
            <div class="tab-pane fade" id="dashboard">
                <?php //require 'dashboard_read.php' ?>
            </div>
            -->
        </div>
    </div>
    <!-- /tab -->

</body>

</html>