<?php include('connection.php');?>

<?php
if(isset($_POST['send_feedback'])) {
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Insert into feedback table
    $sql1 = "SELECT * FROM booking";
    $query1 = mysqli_query($db, $sql1);

    if(mysqli_num_rows($query1) > 0) {
        while ($row=mysqli_fetch_assoc($query1)) {
            $bookingid = $row["id"];
        }
    }
    else {
        echo "<script>alert('No Booking Found')</script>";
    }

    $bookingid1 = $bookingid;
    $sql2 = "INSERT INTO feedback SET booking_id = $bookingid1, fullname = '$full_name', email = '$email', phone = '$phone', subject = '$subject', message = '$message'";
    $query2 = mysqli_query($db, $sql2);
}
?>