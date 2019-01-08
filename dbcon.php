<?php
    $dbcon = mysqli_connect('localhost', 'root', '', 'miniproject_db') or die('Failed to connect to MySQL: '.mysqli_connect_error()); 
    mysqli_set_charset($dbcon, 'utf8');
?>