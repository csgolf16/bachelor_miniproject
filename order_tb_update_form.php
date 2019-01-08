<?php
    session_start(); 
    if (!isset($_SESSION['login_username'])) {
        header("Location: index.php");
    }

    $order_id = $_GET['order_id'];
    $applicant_date = $_GET['applicant_date'];
    $applicant = $_GET['applicant'];
    $dispenser_date = $_GET['dispenser_date'];
    $dispenser = $_GET['dispenser'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>OrderUpdate | MiniProject</title>
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
        <h1>แก้ไขข้อมูลออเดอร์</h1>
    </div>
    <!-- /nav -->

    <!-- formupdate -->
    <div class="container">
        <br>
        <form action="order_tb_update.php" method="POST">

            <div class="form-group">
                <label>วันที่ขอยา</label>
                <input required class="form-control" type="date" name="applicant_date_input" value="<?php echo $applicant_date; ?>">
            </div>

            <div class="form-group">
                <label>ผู้ขอยา</label>
                <select required class="form-control" name="applicant_input">
                    <option value="<?php echo $applicant; ?>">
                        <?php echo $applicant; ?>
                    </option>
                    <?php
                        require 'dbcon.php';

                        $query_applicant_tb = "SELECT * FROM applicant_tb";

                        $result_applicant_tb = mysqli_query($dbcon, $query_applicant_tb);
                        while ($row_applicant_tb = mysqli_fetch_array($result_applicant_tb, MYSQLI_ASSOC)) {
                            echo "<option value='$row_applicant_tb[applicant]'>$row_applicant_tb[applicant]</option>";
                        }
                    ?>
                </select>
            </div>

            <br>

            <div class="form-group">
                <label>วันที่จ่ายยา</label>
                <input required class="form-control" type="date" name="dispenser_date_input" value="<?php echo $dispenser_date; ?>">
            </div>

            <div class="form-group">
                <label>ผู้จ่ายยา</label>
                <select required class="form-control" name="dispenser_input">
                    <option value="<?php echo $dispenser; ?>">
                        <?php echo $dispenser; ?>
                    </option>
                    <?php
                        require 'dbcon.php';

                        $query_dispenser_tb = "SELECT * FROM dispenser_tb";

                        $result_dispenser_tb = mysqli_query($dbcon, $query_dispenser_tb);
                        while ($row_dispenser_tb = mysqli_fetch_array($result_dispenser_tb, MYSQLI_ASSOC)) {
                            echo "<option value='$row_dispenser_tb[dispenser]'>$row_dispenser_tb[dispenser]</option>";
                        }
                    ?>
                </select>
            </div>

            <br>

            <input type="hidden" name="order_id" value="<?php echo $order_id; ?>">
            <input class="btn btn-success" type="submit" value="แก้ไขข้อมูลออเดอร์">
        </form>
    </div>
    <!-- formupdate -->
</body>

</html>