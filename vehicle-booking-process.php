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

}
else {
    header('location: vehicle-booking.php');
}
?>