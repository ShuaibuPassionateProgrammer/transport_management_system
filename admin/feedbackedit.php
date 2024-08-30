<?php
if(isset($_GET['fid'])) {
    $fid = $_GET['fid'];
    ?>
        <?php
}
else {
    header('location: feedback.php');
}
?>