<?php
    session_start(); 
    if (!isset($_SESSION['login_username'])) {
        header("Location: index.php");
    }

    $connect = new PDO("mysql:host=localhost;dbname=miniproject_db", "root", "");
    function fill_drug_select_box($connect) { 
        $output = '';
        $query = "SELECT * FROM drug_tb";
        $stmt = $connect->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll();
        foreach($result as $row) {
            $output .= '<option value="'.$row["drug_id"].'">'.$row["drug_name"].'</option>';
        }
        return $output;
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ListOrderCreate | MiniProject</title>
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
        <h1>เพิ่มข้อมูลจ่ายยาใหม่</h1>
    </div>
    <!-- /nav -->

    <!-- formcreate -->
    <div class="container">
        <br>
        <form method="POST" id="insert_form">

            <div class="form-group">
                <label>วันที่ขอยา</label>
                <input required class="form-control" type="date" name="applicant_date_input">
            </div>
            <div class="form-group">
                <label>ผู้ขอยา</label>
                <select required class="form-control" name="applicant_input">
                    <option value="">เลือกผู้ขอยา</option>
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
                <input required class="form-control" type="date" name="dispenser_date_input">
            </div>
            <div class="form-group">
                <label>ผู้จ่ายยา</label>
                <select required class="form-control" name="dispenser_input">
                    <option value="">เลือกผู้จ่ายยา</option>
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

            <div class="form-group">
                <label>ยาที่จ่าย</label>
                <table class="table table-bordered" id="drug_table">
                    <tr>
                        <th>ชื่อยา</th>
                        <th>จำนวนยา</th>
                        <th><button class="btn btn-success btn_add" type="button">+</button></th>
                    </tr>
                </table>
            </div>

            <br>

            <input class="btn btn-info" type="submit" value="เพิ่มข้อมูลจ่ายยาใหม่">

        </form>
        <br>
    </div>
    <!-- /formcreate -->
</body>

</html>

<script>
    $(document).ready(function () {

        $(document).on('click', '.btn_add', function () {
            var html = '';
            html += '<tr>';
            html +=
                '<td><select required class="form-control" name="drug_id_input[]"><option value="">Select Unit</option><?php echo fill_drug_select_box($connect); ?></select></td>';
            html += '<td><input required type="text" class="form-control" name="drug_amount_input[]"/></td>';
            html +=
                '<td><button class="btn btn-danger btn_remove" type="button">x</button></td></tr>';
            $('#drug_table').append(html);
        });

        $(document).on('click', '.btn_remove', function () {
            $(this).closest('tr').remove();
        });

        $('#insert_form').on('submit', function (event) {
            event.preventDefault();
            var data_input = $(this).serialize();
            $.ajax({
                url: "./relation_tb_create.php",
                method: "POST",
                data: data_input,
                success: function (data) {
                    if (data == 'success') {
                        url = "./dashboard.php";
                        $(location).attr("href", url);
                    }
                }
            });
        });

    });
</script>