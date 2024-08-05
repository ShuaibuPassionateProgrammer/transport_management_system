<?php
if(isset($_GET['id'])) {
    $bid=$_GET['id'];
    ?>
<?php session_start();?>
<?php include('connection.php');?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TRANSPORT MANAGEMENT SYSTEM</title>
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <!-- Page level plugin CSS-->
    <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card header text-center p-4 bg-dark text-light"><h2>Thank You</h2></div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

    <?php
}
else {
    header('location: payment.php?pid='.$pid);
}
?>
