<?php include('connection.php')?>
<?php
if(isset($_POST['reply_feedback'])) {
    $id = $_POST['id'];
    $message = $_POST['message'];

    $sql = "UPDATE feedback SET replymessage = '$message' WHERE id = $id";
}
?>