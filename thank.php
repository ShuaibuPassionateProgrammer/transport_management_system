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

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <?php
                if(isset($_SESSION['bookingstatus']))
                {
                    ?>
                    <div class="alert alert-<?php echo $_SESSION['bookingstatus_type']; ?>">
                        <!-- <strong>Hey </strong> --> <?php echo $_SESSION['bookingstatus']; ?> 
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <?php
                    unset($_SESSION['bookingstatus']); 
                }
                ?>
            </div>
        </div>
    </div>

    <?php
    $existing_passenger = "SELECT * FROM booking WHERE id = '$bid'";
    $existing_passenger_run = mysqli_query($db, $existing_passenger);

    if(mysqli_num_rows($existing_passenger_run) > 0) {
        while($row = mysqli_fetch_assoc($existing_passenger_run)) {
            ?>
            <div class="container mt-5">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Full Name</th>
                                    <th>E-Mail</th>
                                    <th>Phone</th>
                                    <th>Bus Booked</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?=$row['full_name']?></td>
                                    <td><?=$row['email']?></td>
                                    <td><?=$row['phone']?></td>
                                    <td><?=$row['bus_name']?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <?php
        }
    }
    ?>

    <div class="container mt-5">
        <div class="row justify-content-center">
            
            <div class="col-md-6 text-left mt-4">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <td class="text-center" colspan="2"><a href="index.php">Back to Homepage</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="js/jquery-3.3.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>

    <?php
}
else {
    header('location: payment.php?pid='.$pid);
}
?>
