<?php 
    require_once 'includes/connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
    <title>Student Management System</title>
</head>
<body>


    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom box-shadow">
        <h5 class="my-0 mr-md-auto font-weight-normal">Student Management System</h5>
        <nav class="my-2 my-md-0 mr-md-3">
            <a class="p-2 text-dark" href="index.php">Home</a>
            <a class="p-2 text-dark" href="#">Features</a>
            <a class="p-2 text-dark" href="#">About</a>
            <a class="p-2 text-dark" href="book_appointment.php">Book Appointment</a>
            <a class="p-2 text-dark" href="#">Contact</a>
        </nav>
        <a class="btn btn-outline-primary" href="admin.php">Admin</a>
    </div>
    
    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
        <h1 class="display-4">Student Management System</h1>
        <p class="lead">Simple Student Management System built using PHP, Bootstrap 4, MySQL</p>
    </div>

    <script src="./assets/js/jquery-3.4.1.min.js"></script>
    <script src="./assets/js/bootstrap.min.js"></script>
</body>
</html>