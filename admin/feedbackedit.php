<?php
if(isset($_GET['fid'])) {
    $fid = $_GET['fid'];
    ?>
<?php include('connection.php');?>
<?php include('topnav.php');?>
    <?php
}
else {
    header('location: feedback.php');
}
?>