<?php include('connection.php')?>
<?php
if(isset($_POST['reply_feedback'])) {
    $id = $_POST['id'];
    $message = $_POST['message'];
}
?>