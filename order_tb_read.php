<br>

<div align="right">
    <button class="btn btn-info"><a href="relation_tb_create_form.php" style="text-decoration: none; color: white;">เพิ่มข้อมูลจ่ายยาใหม่</a></button>
</div>

<br>

<div class="form-group">
    <input class="form-control" type="text" id="search_order_tb" placeholder="ค้นหาข้อมูลในตารางออเดอร์...">
</div>

<br>

<table class="table table-bordered" id="order_tb">
    <tr>
        <th>เลขออเดอร์</th>
        <th>วันที่ขอยา</th>
        <th>ผู้ขอยา</th>
        <th>วันที่จ่ายยา</th>
        <th>ผู้จ่ายยา</th>
        <th>แก้ไข</th>
        <th>ลบ</th>
    </tr>
    <?php
        require 'dbcon.php';

        $query = "SELECT * FROM order_tb";
    
        $result = mysqli_query($dbcon, $query); 
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) { 
    ?>
    <tr>
        <td>
            <?php echo $row['order_id']; ?>
        </td>
        <td>
            <?php echo $row['applicant_date']; ?>
        </td>
        <td>
            <?php echo $row['applicant']; ?>
        </td>
        <td>
            <?php echo $row['dispenser_date']; ?>
        </td>
        <td>
            <?php echo $row['dispenser']; ?>
        </td>
        <td><a style="color: green;" href="order_tb_update_form.php?order_id=<?php echo $row['order_id']; ?>&applicant_date=<?php echo $row['applicant_date']; ?>&applicant=<?php echo $row['applicant']; ?>&dispenser_date=<?php echo $row['dispenser_date']; ?>&dispenser=<?php echo $row['dispenser']; ?>">แก้ไข</a></td>
        <td><a style="color: red;" href="order_tb_delete.php?order_id=<?php echo $row['order_id']; ?>&applicant_date=<?php echo $row['applicant_date']; ?>&applicant=<?php echo $row['applicant']; ?>&dispenser_date=<?php echo $row['dispenser_date']; ?>&dispenser=<?php echo $row['dispenser']; ?>">ลบ</a></td>
    </tr>
    <?php 
            } 
            mysqli_free_result($result); 
            mysqli_close($dbcon); 
        ?>
</table>

<script>
    $(document).ready(function () {
        $('#search_order_tb').keyup(function () {
            search_tb($(this).val());
        });

        function search_tb(value) {
            $('#order_tb tr').each(function () {
                var found = 'false';
                $(this).each(function () {
                    if ($(this).text().toLowerCase().indexOf(value.toLowerCase()) >= 0) {
                        found = 'true';
                    }
                });
                if (found == 'true') {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
        }
    });
</script>