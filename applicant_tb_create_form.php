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
    <title>ApplicantCreate | MiniProject</title>
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
        <h1>เพิ่มข้อมูลผู้ขอยาใหม่</h1>
    </div>
    <!-- /nav -->

    <!-- formcreate -->
    <div class="container">
        <br>
        <form action="applicant_tb_create.php" method="POST">

            <div class="form-group">
                <label>ผู้ขอยา</label>
                <input required class="form-control" type="text" name="applicant_input">
            </div>

            <div class="form-group">
                <label>หน่วยงานผู้ขอยา</label>
                <input required class="form-control" type="text" name="applicant_department_input">
            </div>

            <div class="form-group">
                <label>เบอร์โทรผู้ขอยา</label>
                <input required class="form-control" type="text" name="applicant_tel_input">
            </div>

            <br>

            <input class="btn btn-info" type="submit" value="เพิ่มข้อมูลผู้ขอยาใหม่">

        </form>
        <br>
    </div>
    <!-- /formcreate -->

</body>

</html>