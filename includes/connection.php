<?php
    $host = 'localhost';
    $user = 'root';
    $pass = 'password';

    $db_name = 'student_management_system';

    $conn = mysqli_connect($host, $user, $pass, $db_name) or die(mysqli_error());
?>
