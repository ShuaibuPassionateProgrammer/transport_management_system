<?php session_start();?>
<?php include('connection.php');?>

<?php
if(isset($_POST['book_vehicle'])) {
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $bus_name = $_POST['bus_name'];
    $bus_type = $_POST['bus_type'];
    $route_start = $_POST['route_start'];
    $route_finish = $_POST['route_finish'];
    $fair = $_POST['fair'];
    $arrival = $_POST['arrival'];
    $departure = $_POST['departure'];
    $location = $_POST['location'];

    if(empty($_POST['full_name']) || empty($_POST['phone']) || empty($_POST['bus_name']) || empty($_POST['bus_type']) /*|| empty($_POST['route_start']) || empty($_POST['route_finish'])*/ || empty($_POST['fair']) || empty($_POST['arrival']) || empty($_POST['departure']) || empty($_POST['location'])) {
        echo "<span style='background-color: #dc3545; color: #fafafa; padding: 2%; margin: 0 auto; width: 100%;'>All fields should not be blank/empty!</span>";
    }
    else {
        $sql = "INSERT INTO booking (full_name, email, phone, bus_name, bus_type, fair, arrival, departure, location, paymentstatus, bookingstatus) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, 'pending', 'pending')";
        $stmt = mysqli_prepare($db, $sql);
        mysqli_stmt_bind_param($stmt, "sssssssss", $full_name, $email, $phone, $bus_name, $bus_type, $fair, $arrival, $departure, $location);
        $query = mysqli_stmt_execute($stmt);

        if($query) {
            $_SESSION['pid'] = $full_name;
            $pfname = $_SESSION['pid'];
            
            $existing_passenger = "SELECT * FROM booking WHERE full_name = ? ORDER BY id DESC LIMIT 1";
            $stmt = mysqli_prepare($db, $existing_passenger);
            mysqli_stmt_bind_param($stmt, "s", $pfname);
            mysqli_stmt_execute($stmt);
            $existing_passenger_run = mysqli_stmt_get_result($stmt);

            if(mysqli_num_rows($existing_passenger_run) > 0) {
                $row = mysqli_fetch_assoc($existing_passenger_run);
                $pid = $row['id'];
                $pname = $row['full_name'];
            }

            header('location: payment.php?pid='.$pid);
        }
        else {
            echo "<script>alert('Booking failed!')</script>";
        }
    }
}
else {
    header('location: vehicle-booking.php');
}
?>