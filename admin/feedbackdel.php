<?php include('connection.php')?>
<?php
if(isset($_GET['?fdel'])) {
    $fid = $_GET['?fdel'];

    $sql = "DELETE FROM feedback WHERE id = $fid";
    $query = mysqli_query($db, $sql);

    if($query) {}
}
else {
    header('location: feedback.php');
}
?>