<?php include('connection.php')?>

<?php
if(isset($_POST['update_feedback'])) {
    $id = $_POST['id'];
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    $sql = "UPDATE feedback SET fullname = '$full_name' WHERE id = $id";
    $query = mysqli_query($db, $sql);

    if($query) {
        echo "<script>alert('FeedBack Updated Successfully!');window.location.href='feedback.php'</script>";
    }
}
?>