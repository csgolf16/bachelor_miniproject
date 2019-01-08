<?php
    session_start(); 
    if (!isset($_SESSION['login_username'])) {
        header("Location: index.php");
    }

    $applicant= $_GET['applicant'];
    $applicant_department = $_GET['applicant_department'];
    $applicant_tel = $_GET['applicant_tel'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ApplicantUpdate | MiniProject</title>
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
        <h1>แก้ไขข้อมูลผู้ขอยา</h1>
    </div>
    <!-- /nav -->

    <!-- formupdate -->
    <div class="container">
        <br>
        <form action="applicant_tb_update.php" method="POST">

            <div class="form-group">
                <label>ผู้ขอยา</label>
                <input required type="text" class="form-control" name="applicant_input" value="<?php echo $applicant; ?>">
            </div>

            <div class="form-group">
                <label>หน่วยงานผู้ขอยา</label>
                <input required type="text" class="form-control" name="applicant_department_input" value="<?php echo $applicant_department; ?>">
            </div>

            <div class="form-group">
                <label>เบอร์โทรผู้ขอยา</label>
                <input required type="text" class="form-control" name="applicant_tel_input" value="<?php echo $applicant_tel; ?>">
            </div>

            <br>

            <input type="hidden" name="applicant_raw" value="<?php echo $applicant; ?>">
            <input class="btn btn-success" type="submit" value="แก้ไขข้อมูลผู้ขอยา">

        </form>
        <br>
    </div>
    <!-- /formupdate -->
</body>

</html>