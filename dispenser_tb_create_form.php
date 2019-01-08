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
    <title>DispenserCreate | MiniProject</title>
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
        <h1>เพิ่มข้อมูลผู้จ่ายยาใหม่</h1>
    </div>
    <!-- /nav -->

    <!-- formcreate -->
    <div class="container">
        <br>
        <form action="dispenser_tb_create.php" method="POST">

            <div class="form-group">
                <label>ผู้จ่ายยา</label>
                <input required class="form-control" type="text" name="dispenser_input">
            </div>

            <div class="form-group">
                <label>หน่วยงานผู้จ่ายยา</label>
                <input required class="form-control" type="text" name="dispenser_department_input">
            </div>

            <div class="form-group">
                <label>เบอร์โทรผู้จ่ายยา</label>
                <input required class="form-control" type="text" name="dispenser_tel_input">
            </div>

            <br>

            <input class="btn btn-info" type="submit" value="เพิ่มข้อมูลผู้จ่ายยาใหม่">

        </form>
        <br>
    </div>
    <!-- /formcreate -->
</body>

</html>