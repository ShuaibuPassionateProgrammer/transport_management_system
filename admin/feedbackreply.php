<?php
if(isset($_GET['freply'])) {
    $fid = $_GET['freply'];
    ?>

    <?php
}
else {
    header('location: feedback.php');
}
?>