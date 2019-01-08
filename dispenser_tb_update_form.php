<?php
    session_start(); 
    if (!isset($_SESSION['login_username'])) {
        header("Location: index.php");
    }

    $dispenser= $_GET['dispenser'];
    $dispenser_department = $_GET['dispenser_department'];
    $dispenser_tel = $_GET['dispenser_tel'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DispenserUpdate| MiniProject</title>
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
        <h1>แก้ไขข้อมูลผู้จ่ายยา</h1>
    </div>
    <!-- /nav -->

    <!-- formupdate -->
    <div class="container">
        <br>
        <form action="dispenser_tb_update.php" method="POST">

            <div class="form-group">
                <label>ผู้จ่ายยา</label>
                <input required class="form-control" type="text" name="dispenser_input" value="<?php echo $dispenser; ?>">
            </div>

            <div class="form-group">
                <label>หน่วยงานผู้จ่ายยา</label>
                <input required class="form-control" type="text" name="dispenser_department_input" value="<?php echo $dispenser_department; ?>">
            </div>

            <div class="form-group">
                <label>เบอร์โทรผู้จ่ายยา</label>
                <input required class="form-control" type="text" name="dispenser_tel_input" value="<?php echo $dispenser_tel; ?>">
            </div>

            <br>

            <input type="hidden" name="dispenser_raw" value="<?php echo $dispenser; ?>">
            <input class="btn btn-success" type="submit" value="แก้ไขข้อมูลผู้จ่ายยา">

        </form>
        <br>
    </div>
    <!-- /formupdate -->
</body>

</html>