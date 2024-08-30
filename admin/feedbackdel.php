<?php include('connection.php')?>
<?php
if(isset($_GET['?fdel'])) {
    $fid = $_GET['?fdel'];
    ?>
    <?php
}
else {
    header('location: feedback.php');
}
?>