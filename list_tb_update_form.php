<?php
    session_start(); 
    if (!isset($_SESSION['login_username'])) {
        header("Location: index.php");
    }

    require 'dbcon.php';

    $order_id_raw = $_GET['order_id'];
    $drug_id_raw = $_GET['drug_id'];
    $drug_amount_raw = $_GET['drug_amount'];

    $query_order_tb = "SELECT * FROM order_tb WHERE order_id='$order_id_raw' ";
    $result_order_tb = mysqli_query($dbcon, $query_order_tb);
    $row_order_tb = mysqli_fetch_array($result_order_tb, MYSQLI_ASSOC); 

    $query_drug_tb = "SELECT * FROM drug_tb WHERE drug_id='$drug_id_raw' ";
    $result_drug_tb = mysqli_query($dbcon, $query_drug_tb);
    $row_drug_tb = mysqli_fetch_array($result_drug_tb, MYSQLI_ASSOC); 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ListUpdate | MiniProject</title>
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
        <h1>แก้ไขข้อมูลจ่ายยา</h1>
    </div>
    <!-- /nav -->

    <!-- formupdate -->
    <div class="container">
        <br>
        <form action="list_tb_update.php" method="POST">

            <div class="form-group">
                <label>ยาที่ขอเบิก</label>
                <select required class="form-control" name="drug_id_input" required>
                    <option value="<?php echo $row_drug_tb['drug_id']; ?>">
                        <?php echo $row_drug_tb['drug_name']; ?>
                    </option>
                    <?php
                        require 'dbcon.php';

                        $query_drug_tb = "SELECT * FROM drug_tb";

                        $result_drug_tb = mysqli_query($dbcon, $query_drug_tb);
                        while ($row_drug_tb = mysqli_fetch_array($result_drug_tb, MYSQLI_ASSOC)) {
                            echo "<option value='$row_drug_tb[drug_id]'>$row_drug_tb[drug_name]</option>";
                        }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label>จำนวนยา</label>
                <input required class="form-control" type="text" name="drug_amount_input" value="<?php echo $drug_amount_raw; ?>"
                    required>
            </div>

            <br>

            <input type="hidden" name="order_id_raw" value="<?php echo $order_id_raw; ?>">
            <input type="hidden" name="drug_id_raw" value="<?php echo $drug_id_raw; ?>">
            <input type="hidden" name="drug_amount_raw" value="<?php echo $drug_amount_raw; ?>">
            <input class="btn btn-success" type="submit" value="แก้ไขข้อมูลจ่ายยา">

        </form>
        <br>
    </div>
    <!-- /formupdate -->
</body>

</html>