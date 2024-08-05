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
    <!-- Page level plugin CSS-->
    <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
    <style>
        html, body {
            font-family: 'Tahoma', sans-serif;
        }
        .header {
            box-shadow: 0 1px 3px rgba(2,2,2,0.2);
        }
    </style>
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