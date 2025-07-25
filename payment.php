<?php session_start();?>
<?php include('connection.php');?>
<?php
if(isset($_GET['pid'])) {
    $pid = filter_var($_GET['pid'], FILTER_VALIDATE_INT);
    if ($pid === false) {
        header('location: index.php');
        exit();
    }
} else {
    header('location: vehicle-booking.php');
    exit();
}

if(isset($_POST['pay_for_booking']))
{
    $card_number = $_POST['card_number'];
    $month = $_POST['month'];
    $year = $_POST['year'];
    $cvv_or_cvc = $_POST['cvv_or_cvc'];
    $card_holder_name = $_POST['card_holder_name'];
    
    if(empty($card_number) || empty($month) || empty($year) || empty($cvv_or_cvc) || empty($card_holder_name))
    {
        echo "<script>alert('All fields should not be empty');</script>";
    }
    else {
        $query = "UPDATE booking SET paymentstatus='paid' WHERE id=?";
        $stmt = mysqli_prepare($db, $query);
        mysqli_stmt_bind_param($stmt, "i", $pid);
        $query_run = mysqli_stmt_execute($stmt);

        if($query_run)
        {
            $_SESSION['bookingstatus'] = "Vehicle booked successfully";
            $_SESSION['bookingstatus_type'] = "success";
            header("location: thank.php?id=".$pid);
            exit();
        }
        else
        {
            echo "<script>alert('Booking Failed');</script>";
        }
    }
}
?>
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
        .img-responsive {
            height: 100%;
            width: 100%;
        }
    </style>
    <title>TRANSPORT MANAGEMENT SYSTEM</title>
</head>
<body id="bg">
    <!-- Body content -->
    
    <div class="header p-4 shadow">
        <h1 class="text-center">TRANSPORT MANAGEMENT SYSTEM</h1>
    </div>

    <div class="container mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card w-100 p-5 shadow">
                    <h1 class="text-center">PAYMENT GATEWAY</h1>
                    <div class="text-center my-3">
                        <img src="image/visa_icon.png" alt="Visa" width="70px" class="mx-2">
                        <img src="image/mastercard_icon.png" alt="Mastercard" width="70px" class="mx-2">
                        <img src="image/verve_icon.png" alt="Verve" width="70px" class="mx-2">
                    </div>
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="card_holder_name"><h5>Card Holder Name</h5></label>
                            <input type="text" name="card_holder_name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="card_number"><h5>Card Number</h5></label>
                            <input type="text" maxlength="19" name="card_number" id="card_number" class="form-control" required>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="month">Month</label>
                                <select name="month" id="month" class="form-control" required>
                                    <option value="01">January</option>
                                    <option value="02">February</option>
                                    <option value="03">March</option>
                                    <option value="04">April</option>
                                    <option value="05">May</option>
                                    <option value="06">June</option>
                                    <option value="07">July</option>
                                    <option value="08">August</option>
                                    <option value="09">September</option>
                                    <option value="10">October</option>
                                    <option value="11">November</option>
                                    <option value="12">December</option>
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="year">Year</label>
                                <select name="year" id="year" class="form-control" required>
                                    <?php
                                        $current_year = date('Y');
                                        for ($i = $current_year; $i <= $current_year + 10; $i++) {
                                            echo "<option value='{$i}'>{$i}</option>";
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="cvv_or_cvc">CVV/CVC</label>
                                <input type="text" name="cvv_or_cvc" id="cvv_or_cvc" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="pay_for_booking" value="Pay" class="btn btn-success btn-block">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>