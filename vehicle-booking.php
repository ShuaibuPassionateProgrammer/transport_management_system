<?php include('connection.php');?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TRANSPORT MANAGEMENT SYSTEM</title>
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
</head>
<body id="bg">
    <div class="header p-4 shadow">
        <h1 class="text-center">TRANSPORT MANAGEMENT SYSTEM</h1>
    </div>

    <div class="container-fluid pt-3">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <img src="image/deluxe-bg.jpg" style="height: 400px;" alt="" class="img-responsive">
            </div>
            <div class="col-md-6 pt-3 text-center">
                <h1>Book a vehicle</h1>
                <p class="text-muted">To book for a particular vehicle, fill in the form below</p>
                <form action="vehicle-booking-process.php" method="post">
                    <div class="form-group">
                        <label for="fullname" class="float-left">Full Name</label><br>
                        <input type="text" name="full_name" placeholder="Your name" class="form-control float-left" required><br>
                    </div><br>
                    <div class="form-group">
                        <label for="email" class="float-left">E-Mail</label>
                        <input type="email" name="email" placeholder="Your email address" class="form-control float-left"><br>
                    </div><br><br>
                    <div class="form-group">
                        <label for="phone" class="float-left">Phone Number</label>
                        <input type="tel" name="phone" placeholder="Your phone number" class="form-control float-left" required><br>
                    </div><br><br>
                    <div class="form-group">
                        <label for="busname" class="float-left">Bus Name</label>
                        <select name="bus_name" class="form-control float-left" required>
                            <option selected disabled>-- Select a Bus Name --</option>
                            <?php
                            $sql = "SELECT BUS_ID, BUS_NAME FROM bus";
                            $query = mysqli_query($db, $sql);
                            
                            if(mysqli_num_rows($query) > 0) {
                                while($row = mysqli_fetch_assoc($query)) {
                                    ?>
                                    <option value="<?php echo htmlspecialchars($row['BUS_NAME']);?>"><?php echo htmlspecialchars($row['BUS_NAME']);?></option>
                                    <?php
                                }
                            }
                            else {
                                echo "Bus Name not found!";
                            }
                            ?>
                        </select>
                    </div><br><br><br>
                    <div class="form-group">
                        <label for="bustype" class="float-left">Bus Type</label>
                        <select name="bus_type" class="form-control float-left" required>
                            <option selected disabled>-- Select a Bus Type --</option>
                            <?php
                            $sql = "SELECT BUS_ID, BUS_TYPE FROM bus";
                            $query = mysqli_query($db, $sql);
                            
                            if(mysqli_num_rows($query) > 0) {
                                while($row = mysqli_fetch_assoc($query)) {
                                    ?>
                                    <option value="<?php echo htmlspecialchars($row['BUS_TYPE']);?>"><?php echo htmlspecialchars($row['BUS_TYPE']);?></option>
                                    <?php
                                }
                            }
                            else {
                                echo "Bus Type not found!";
                            }
                            ?>
                        </select>
                    </div><br><br><br>
                    <div class="form-group">
                        <label for="fair" class="float-left">Transport Fair</label>
                        <select name="fair" class="form-control float-left" required>
                            <option selected disabled>-- Select a Transport Fair --</option>
                            <?php
                            $sql = "SELECT ROUTE_ID, FAIR, START, FINISH FROM route";
                            $query = mysqli_query($db, $sql);
                            
                            if(mysqli_num_rows($query) > 0) {
                                while($row = mysqli_fetch_assoc($query)) {
                                    ?>
                                    <option value="<?php echo htmlspecialchars($row['FAIR']);?>"><?php echo htmlspecialchars($row['START']);?> - <?php echo htmlspecialchars($row['FINISH']);?> #<?php echo htmlspecialchars($row['FAIR']);?></option>
                                    <?php
                                }
                            }
                            else {
                                echo "Transport Fair Not Available!";
                            }
                            ?>
                        </select>
                    </div><br><br><br>

                    <div class="form-group">
                        <label for="departure" class="float-left">Departure</label>
                        <select name="departure" class="form-control float-left" required>
                            <option selected disabled>-- Select the Departure Period --</option>
                            <?php
                            $sql = "SELECT SCHEDULE_ID, DEPARTURE FROM schedule";
                            $query = mysqli_query($db, $sql);
                            
                            if(mysqli_num_rows($query) > 0) {
                                while($row = mysqli_fetch_assoc($query)) {
                                    ?>
                                    <option value="<?php echo htmlspecialchars($row['DEPARTURE']);?>"><?php echo htmlspecialchars($row['DEPARTURE']);?></option>
                                    <?php
                                }
                            }
                            else {
                                echo "Departure Not Time not set!";
                            }
                            ?>
                        </select>
                    </div><br><br><br>

                    <div class="form-group">
                        <label for="arrival" class="float-left">Arrival</label>
                        <select name="arrival" class="form-control float-left" required>
                            <option selected disabled>-- Select the Arrival Period --</option>
                            <?php
                            $sql = "SELECT SCHEDULE_ID, ARRIVAL FROM schedule";
                            $query = mysqli_query($db, $sql);
                            
                            if(mysqli_num_rows($query) > 0) {
                                while($row = mysqli_fetch_assoc($query)) {
                                    ?>
                                    <option value="<?php echo htmlspecialchars($row['ARRIVAL']);?>"><?php echo htmlspecialchars($row['ARRIVAL']);?></option>
                                    <?php
                                }
                            }
                            else {
                                echo "Arrival Not Time not set!";
                            }
                            ?>
                        </select>
                    </div><br><br><br>
                    <div class="form-group">
                        <label for="location" class="float-left">Location</label>
                        <select name="location" class="form-control float-left" required>
                            <option selected disabled>-- Select a Location --</option>
                            <?php
                            $sql = "SELECT LOCATION_ID, LOCATION_NAME FROM stop";
                            $query = mysqli_query($db, $sql);
                            
                            if(mysqli_num_rows($query) > 0) {
                                while($row = mysqli_fetch_assoc($query)) {
                                    ?>
                                    <option value="<?php echo htmlspecialchars($row['LOCATION_NAME']);?>"><?php echo htmlspecialchars($row['LOCATION_NAME']);?></option>
                                    <?php
                                }
                            }
                            else {
                                echo "Arrival Not Time not set!";
                            }
                            ?>
                        </select>
                    </div><br><br><br>
                    <div class="form-group">
                        <input type="submit" name="book_vehicle" class="btn btn-primary float-left" value="Book Now">
                    </div>
                </form>
                <p class="pt-4">
                    <a href="../transport-management-system/">Back to Homepage</a>
                </p>
            </div>
        </div>
    </div>
</body>
</html>