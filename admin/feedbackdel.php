<?php include('connection.php')?>
<?php
if(isset($_GET['?fdel'])) {
    $fid = $_GET['?fdel'];
    
}
else {
    header('location: feedback.php');
}
?>