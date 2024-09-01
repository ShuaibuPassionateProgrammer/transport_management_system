<?php include('connection.php')?>
<?php
if(isset($_POST['reply_feedback'])) {
    $id = $_POST['id'];
    $message = $_POST['message'];

    $sql = "UPDATE feedback SET replymessage = '$message' WHERE id = $id";
    $query = mysqli_query($db, $sql);

    if($query) {
        echo "<script>alert('FeedBack Replied Successfully!');window.location.href='feedback.php'</script>";
    }
    else {
        echo "<script>alert('FeedBack Reply Failed!');window.location.href='feedback.php'</script>";
    }
}
?>