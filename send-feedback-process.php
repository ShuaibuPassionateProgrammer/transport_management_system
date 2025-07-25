<?php include('connection.php');?>

<?php
if(isset($_POST['send_feedback'])) {
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

        // Sanitize user input to prevent XSS
    $full_name = htmlspecialchars($full_name);
    $email = htmlspecialchars($email);
    $phone = htmlspecialchars($phone);
    $subject = htmlspecialchars($subject);
    $message = htmlspecialchars($message);

    // Insert into feedback table using prepared statements
    $sql = "INSERT INTO feedback (fullname, email, phone, subject, message) VALUES (?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($db, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "sssss", $full_name, $email, $phone, $subject, $message);
        $query = mysqli_stmt_execute($stmt);

        if($query) {
            echo '<script>alert("Feedback Sent Successfully");window.location.href="send-feedback.php";</script>';
        }
        else {
            error_log("Feedback insertion failed: " . mysqli_error($db));
            echo '<script>alert("Failed to send feedback. Please try again later.");window.location.href="send-feedback.php";</script>';
        }
    } else {
        error_log("Failed to prepare statement: " . mysqli_error($db));
        echo '<script>alert("An unexpected error occurred. Please try again later.");window.location.href="send-feedback.php";</script>';
    }
}
else {
    header('location: send-feedback.php');
}
?>