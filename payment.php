<?php
if(isset($_GET['pid'])) {
    $pid = $_GET['pid'];
}
else {
    header('location: vehicle-booking-process.php');
}
?>