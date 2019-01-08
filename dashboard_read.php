<br>

<table class="table table-bordered">
    <tr>
        <th>เลขออเดอร์</th>
        <th>วันที่ขอยา</th>
        <th>ผู้ขอยา</th>
        <th>หน่วยงานผู้ขอยา</th>
        <th>เบอร์ผู้ขอยา</th>
        <th>วันที่จ่ายยา</th>
        <th>ผู้จ่ายยา</th>
        <th>หน่วยงานผู้จ่ายยา</th>
        <th>เบอร์ผู้จ่ายยา</th>
        <th>เลขยา</th>
        <th>ชื่อยา</th>
        <th>หน่วยยา</th>
        <th>จำนวนยา</th>
    </tr>
    <?php
        require 'dbcon.php';

        $query = "SELECT * FROM list_tb 
        INNER JOIN order_tb ON list_tb.order_id=order_tb.order_id
        INNER JOIN drug_tb ON list_tb.drug_id=drug_tb.drug_id
        INNER JOIN applicant_tb ON order_tb.applicant=applicant_tb.applicant
        INNER JOIN dispenser_tb ON order_tb.dispenser=dispenser_tb.dispenser";
        
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
            <?php echo $row['applicant_department']; ?>
        </td>
        <td>
            <?php echo $row['applicant_tel']; ?>
        </td>
        <td>
            <?php echo $row['dispenser_date']; ?>
        </td>
        <td>
            <?php echo $row['dispenser']; ?>
        </td>
        <td>
            <?php echo $row['dispenser_department']; ?>
        </td>
        <td>
            <?php echo $row['dispenser_tel']; ?>
        </td>
        <td>
            <?php echo $row['drug_id']; ?>
        </td>
        <td>
            <?php echo $row['drug_name']; ?>
        </td>
        <td>
            <?php echo $row['drug_unit']; ?>
        </td>
        <td>
            <?php echo $row['drug_amount']; ?>
        </td>
    </tr>
    <?php 
        } 
        mysqli_free_result($result); 
        mysqli_close($dbcon); 
    ?>
</table>