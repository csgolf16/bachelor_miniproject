<?php
    session_start(); 
    if (!isset($_SESSION['login_username'])) {
        header("Location: index.php");
    }

    $drug_id = $_GET['drug_id'];
    $drug_name = $_GET['drug_name'];
    $drug_unit = $_GET['drug_unit'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
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
        <h1>แก้ไขข้อมูลยา</h1>
    </div>
    <!-- /nav -->

    <!-- formupdate -->
    <div class="container">
        <br>
        <form action="drug_tb_update.php" method="POST">

            <div class="form-group">
                <label>รหัสของยาใหม่</label>
                <input required class="form-control" type="text" name="drug_id_input" value="<?php echo $drug_id; ?>">
            </div>

            <div class="form-group">
                <label>ชื่อของยาใหม่</label>
                <input required class="form-control" type="text" name="drug_name_input" value="<?php echo $drug_name; ?>">
            </div>

            <div class="form-group">
                <label>หน่วยของยาใหม่</label>
                <input required class="form-control" type="text" name="drug_unit_input" value="<?php echo $drug_unit; ?>">
            </div>

            <br>

            <input type="hidden" name="drug_id_raw" value="<?php echo $drug_id; ?>">
            <input class="btn btn-success" type="submit" value="แก้ไขข้อมูลยา">

        </form>
        <br>
    </div>
    <!-- /formupdate -->
</body>

</html>