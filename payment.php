<?php
if(isset($_GET['pid'])) {
    $pid = $_GET['pid'];
    ?>
    
    <?php
}
else {
    header('location: vehicle-booking-process.php');
}
?>