<br>

<div align="right">
    <button class="btn btn-info"><a href="dispenser_tb_create_form.php" style="text-decoration: none; color: white;">เพิ่มข้อมูลผู้จ่ายยาใหม่</a></button>
</div>

<br>

<div class="form-group">
    <input class="form-control" type="text" id="search_dispenser_tb" placeholder="ค้นหาข้อมูลในตารางผู้จ่ายยา...">
</div>

<br>

<table class="table table-bordered" id="dispenser_tb">
    <tr>
        <th>ผู้จ่ายยา</th>
        <th>หน่วยงานผู้จ่ายยา</th>
        <th>เบอร์โทรผู้จ่ายยา</th>
        <th>แก้ไข</th>
        <th>ลบ</th>
    </tr>
    <?php
        require 'dbcon.php';

        $query = "SELECT * FROM dispenser_tb";
    
        $result = mysqli_query($dbcon, $query); 
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) { 
    ?>
    <tr>
        <td>
            <?php echo $row['dispenser']; ?>
        </td>
        <td>
            <?php echo $row['dispenser_department']; ?>
        </td>
        <td>
            <?php echo $row['dispenser_tel']; ?>
        </td>
        <td><a style="color: green;" href="dispenser_tb_update_form.php?dispenser=<?php echo $row['dispenser']; ?>&dispenser_department=<?php echo $row['dispenser_department']; ?>&dispenser_tel=<?php echo $row['dispenser_tel']; ?>">แก้ไข</a></td>
        <td><a style="color: red;" href="dispenser_tb_delete.php?dispenser=<?php echo $row['dispenser']; ?>&dispenser_department=<?php echo $row['dispenser_department']; ?>&dispenser_tel=<?php echo $row['dispenser_tel']; ?>">ลบ</a></td>
    </tr>
    <?php 
            } 
            mysqli_free_result($result); 
            mysqli_close($dbcon); 
        ?>
</table>

<script>
    $(document).ready(function () {
        $('#search_dispenser_tb').keyup(function () {
            search_tb($(this).val());
        });

        function search_tb(value) {
            $('#dispenser_tb tr').each(function () {
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