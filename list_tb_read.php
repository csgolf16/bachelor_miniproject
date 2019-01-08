<br>

<div align="right">
    <button class="btn btn-info"><a href="relation_tb_create_form.php" style="text-decoration: none; color: white;">เพิ่มข้อมูลจ่ายยาใหม่</a></button>
</div>

<br>

<div class="form-group">
    <input class="form-control" type="text" id="search_list_tb" placeholder="ค้นหาข้อมูลในตารางรายการจ่ายยา...">
</div>

<br>

<table class="table table-bordered" id="list_tb">
    <tr>
        <th>เลขออเดอร์</th>
        <th>เลขยา</th>
        <th>จำนวนยา</th>
        <th>แก้ไข</th>
        <th>ลบ</th>
    </tr>
    <?php
        require 'dbcon.php';

        $query = "SELECT * FROM list_tb";
    
        $result = mysqli_query($dbcon, $query); 
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) { 
    ?>
    <tr>
        <td>
            <?php echo $row['order_id']; ?>
        </td>
        <td>
            <?php echo $row['drug_id']; ?>
        </td>
        <td>
            <?php echo $row['drug_amount']; ?>
        </td>
        <td><a style="color: green;" href="./list_tb_update_form.php?order_id=<?php echo $row['order_id']; ?>&drug_id=<?php echo $row['drug_id']; ?>&drug_amount=<?php echo $row['drug_amount']; ?>">แก้ไข</a></td>
        <td><a style="color: red;" href="./list_tb_delete.php?order_id=<?php echo $row['order_id']; ?>&drug_id=<?php echo $row['drug_id']; ?>&drug_amount=<?php echo $row['drug_amount']; ?>">ลบ</a></td>
    </tr>
    <?php 
        } 
        mysqli_free_result($result); 
        mysqli_close($dbcon); 
    ?>
</table>

<script>
    $(document).ready(function () {
        $('#search_list_tb').keyup(function () {
            search_tb($(this).val());
        });

        function search_tb(value) {
            $('#list_tb tr').each(function () {
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