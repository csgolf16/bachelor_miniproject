<br>

<div align="right">
    <button class="btn btn-info"><a href="applicant_tb_create_form.php" style="text-decoration: none; color: white;">เพิ่มข้อมูลผู้ขอยาใหม่</a></button>
</div>

<br>

<div class="form-group">
    <input class="form-control" type="text" id="search_applicant_tb" placeholder="ค้นหาข้อมูลในตารางผู้ขอยา...">
</div>

<br>

<table class="table table-bordered" id="applicant_tb">
    <tr>
        <th>ผู้ขอยา</th>
        <th>หน่วยงานผู้ขอยา</th>
        <th>เบอร์โทรผู้ขอยา</th>
        <th>แก้ไข</th>
        <th>ลบ</th>
    </tr>
    <?php
        require 'dbcon.php';

        $query = "SELECT * FROM applicant_tb";
    
        $result = mysqli_query($dbcon, $query); 
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) { 
    ?>
    <tr>
        <td>
            <?php echo $row['applicant']; ?>
        </td>
        <td>
            <?php echo $row['applicant_department']; ?>
        </td>
        <td>
            <?php echo $row['applicant_tel']; ?>
        </td>
        <td><a style="color: green;" href="applicant_tb_update_form.php?applicant=<?php echo $row['applicant']; ?>&applicant_department=<?php echo $row['applicant_department']; ?>&applicant_tel=<?php echo $row['applicant_tel']; ?>">แก้ไข</a></td>
        <td><a style="color: red;" href="applicant_tb_delete.php?applicant=<?php echo $row['applicant']; ?>&applicant_department=<?php echo $row['applicant_department']; ?>&applicant_tel=<?php echo $row['applicant_tel']; ?>">ลบ</a></td>
    </tr>
    <?php 
            } 
            mysqli_free_result($result); 
            mysqli_close($dbcon); 
        ?>
</table>

<script>
    $(document).ready(function () {
        $('#search_applicant_tb').keyup(function () {
            search_tb($(this).val());
        });

        function search_tb(value) {
            $('#applicant_tb tr').each(function () {
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