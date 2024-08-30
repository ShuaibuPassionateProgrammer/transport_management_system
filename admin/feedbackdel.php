<?php include('connection.php')?>
<?php
if(isset($_GET['?fdel'])) {
    $fid = $_GET['?fdel'];

    $sql = "DELETE FROM feedback WHERE id = $fid";
    $query = mysqli_query($db, $sql);

    if($query) {
        echo "<script>alert('FeedBack Deleted Successfully!');window.location.href='feedback.php'</script>";
    }
    else {
        echo "<script>alert('FeedBack Deleted Successfully!');window.location.href='feedback.php'</script>";
    }
}
else {
    header('location: feedback.php');
}
?>