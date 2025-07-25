<?php 
session_start();
include('connection.php');

if(isset($_GET['id'])) {
    $bid = filter_var($_GET['id'], FILTER_VALIDATE_INT);
    if ($bid === false) {
        header('location: index.php');
        exit();
    }
} else {
    header('location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TRANSPORT MANAGEMENT SYSTEM</title>
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <!-- Page level plugin CSS-->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
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
                    <div class="card-header text-center p-4 bg-dark text-light"><h2>Thank You</h2></div>
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
                    <div class="alert alert-<?php echo htmlspecialchars($_SESSION['bookingstatus_type']); ?>">
                        <?php echo htmlspecialchars($_SESSION['bookingstatus']); ?> 
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <?php
                    unset($_SESSION['bookingstatus']); 
                    unset($_SESSION['bookingstatus_type']);
                }
                ?>
            </div>
        </div>
    </div>

    <?php
    $existing_passenger = "SELECT * FROM booking WHERE id = ?";
    $stmt = mysqli_prepare($db, $existing_passenger);
    mysqli_stmt_bind_param($stmt, "i", $bid);
    mysqli_stmt_execute($stmt);
    $existing_passenger_run = mysqli_stmt_get_result($stmt);

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
                                    <td><?=htmlspecialchars($row['full_name'])?></td>
                                    <td><?=htmlspecialchars($row['email'])?></td>
                                    <td><?=htmlspecialchars($row['phone'])?></td>
                                    <td><?=htmlspecialchars($row['bus_name'])?></td>
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
            <div class="col-md-6 text-center mt-4">
                <a href="index.php" class="btn btn-primary">Back to Homepage</a>
            </div>
        </div>
    </div>

    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
