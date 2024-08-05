<?php
if(isset($_GET['pid'])) {
    $pid = $_GET['pid'];
    ?>
<?php session_start();?>
<?php include('connection.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap core CSS-->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <title>RANSPORT MANAGEMENT SYSTEM</title>
</head>
<body>
    
</body>
</html>
    <?php
}
else {
    header('location: vehicle-booking-process.php');
}
?>