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
        .img-responsive {
            height: 100%;
            width: 100%;
        }
    </style>
    <title>RANSPORT MANAGEMENT SYSTEM</title>
</head>
<body id="bg">
    <!-- Body content -->
    
    <div class="header p-4 shadow">
        <h1 class="text-center">TRANSPORT MANAGEMENT SYSTEM</h1>
    </div>

    <div class="container mt-5 mb-5">
        <div class="row col-md-12">
            <div class="card w-100 p-5 shadow">
                <h1 class="text-center">PAYMENT GATEWAY</h1>
                <p><!-- Icon placeholder --></p>
                <table class="table table-borderless">
                    <thead>
                        <tr>
                            <td class="text-center"><img src="image/visa_icon.png" alt="" width="100px"></td>
                            <td class="text-center"><img src="image/mastercard_icon.png" alt="" width="100px"></td>
                            <td class="text-center"><img src="image/verve_icon.png" alt="" width="100px"></td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
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
                                $query = "UPDATE booking SET paymentstatus='paid' WHERE id=$pid";
                                $query_run = mysqli_query($db, $query);

                                if($query_run)
                                {
                                    $_SESSION['bookingstatus'] = "Vehicle booked successfully";
                                    $_SESSION['bookingstatus_type'] = "success";
                                    header("location: thank.php?id=".$pid);
                                }
                                else
                                {
                                    echo "<script>alert('Booking Failed');</script>";
                                }
                            }
                        }
                        ?>
                        <form action="" method="post">
                            <tr>
                                <td>
                                    <label for="card_number"><h5>Card Number</h5></label>
                                    <input type="number" maxlength="19" name="card_number" id="card_number" class="form-control">
                                </td>
                            </tr>
                            <tr>
                                <td><h4>Expiration Date</h4></td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="month">Month</label>
                                    <select name="month" id="month" class="form-control">
                                        <option value="january">January</option>
                                        <option value="february">February</option>
                                        <option value="march">March</option>
                                        <option value="april">April</option>
                                        <option value="may">May</option>
                                        <option value="june">June</option>
                                        <option value="jully">Jully</option>
                                        <option value="august">August</option>
                                        <option value="september">September</option>
                                        <option value="october">October</option>
                                        <option value="november">November</option>
                                        <option value="december">December</option>
                                    </select>
                                </td>
                                <td>
                                    <label for="year">Year</label>
                                    <select name="year" id="year" class="form-control">
                                        <option value="2012">2012</option>
                                        <option value="2013">2013</option>
                                        <option value="2014">2014</option>
                                        <option value="2015">2015</option>
                                        <option value="2016">2016</option>
                                        <option value="2017">2017</option>
                                        <option value="2018">2018</option>
                                        <option value="2019">2019</option>
                                        <option value="2020">2020</option>
                                        <option value="2021">2021</option>
                                        <option value="2022">2022</option>
                                        <option value="2023">2023</option>
                                        <option value="2023">2024</option>
                                        <option value="2023">2025</option>
                                    </select>
                                </td>
                                <td>
                                    <label for="cvv_or_cvc">CVV/CVC</label>
                                    <input type="text" name="cvv_or_cvc" id="cvv_or_cvc" class="form-control">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="card_holder_name"><h5>Card Holder Name</h5></label>
                                    <input type="text" name="card_holder_name" class="form-control" required>
                                </td>
                            </tr>
                            <tr>
                                <td><input type="submit" name="pay_for_booking" value="Pay" class="btn btn-success w-50"></td>
                            </tr>
                        </form>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
    <?php
}
else {
    header('location: vehicle-booking-process.php');
}
?>