<?php session_start();?>
<?php include('connection.php');?>

<?php
if(isset($_POST['book_vehicle'])) {}
else {
    header('location: vehicle-booking.php');
}
?>