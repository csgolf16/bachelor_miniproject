<br>

<div align="right">
    <button class="btn btn-info"><a href="drug_tb_create_form.php" style="text-decoration: none; color: white;">เพิ่มข้อมูลยาใหม่</a></button>
</div>

<br>

<div class="form-group">
    <input class="form-control" type="text" id="search_drug_tb" placeholder="ค้นหาข้อมูลในตารางยา...">
</div>

<br>

<table class="table table-bordered" id="drug_tb">
    <tr>
        <th>เลขยา</th>
        <th>ชื่อยา</th>
        <th>หน่วยของยา</th>
        <th>แก้ไข</th>
        <th>ลบ</th>
    </tr>
    <?php
        require 'dbcon.php';

        $query = "SELECT * FROM drug_tb";
    
        $result = mysqli_query($dbcon, $query); 
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) { 
    ?>
    <tr>
        <td>
            <?php echo $row['drug_id']; ?>
        </td>
        <td>
            <?php echo $row['drug_name']; ?>
        </td>
        <td>
            <?php echo $row['drug_unit']; ?>
        </td>
        <td><a style="color: green;" href="drug_tb_update_form.php?drug_id=<?php echo $row['drug_id']; ?>&drug_name=<?php echo $row['drug_name']; ?>&drug_unit=<?php echo $row['drug_unit']; ?>">แก้ไข</a></td>
        <td><a style="color: red;" href="drug_tb_delete.php?drug_id=<?php echo $row['drug_id']; ?>&drug_name=<?php echo $row['drug_name']; ?>&drug_unit=<?php echo $row['drug_unit']; ?>">ลบ</a></td>
    </tr>
    <?php 
            } 
            mysqli_free_result($result); 
            mysqli_close($dbcon); 
        ?>
</table>

<script>
    $(document).ready(function () {
        $('#search_drug_tb').keyup(function () {
            search_tb($(this).val());
        });

        function search_tb(value) {
            $('#drug_tb tr').each(function () {
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