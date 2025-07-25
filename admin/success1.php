<?php
require('connection.php');

if (isset($_POST['register'])) {
    $firstname = trim($_POST['firstname']);
    $lastname = trim($_POST['lastname']);
    $user = trim($_POST['email']);
    $password = trim($_POST['password']);
    $confirm = trim($_POST['confirm']);

    if ($password !== $confirm) {
        echo '<script>alert("Passwords do not match."); window.history.back();</script>';
        exit();
    }

    // Check if user already exists
    $check_sql = "SELECT `id` FROM `admin` WHERE `user` = ? LIMIT 1";
    $check_stmt = mysqli_prepare($db, $check_sql);
    mysqli_stmt_bind_param($check_stmt, "s", $user);
    mysqli_stmt_execute($check_stmt);
    mysqli_stmt_store_result($check_stmt);

    if (mysqli_stmt_num_rows($check_stmt) > 0) {
        echo '<script>alert("An account with this email already exists."); window.location = "login.php";</script>';
        exit();
    }

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $status = 'CLIENT'; // Default status

    $sql = "INSERT INTO admin (fname, lname, user, password, status) VALUES (?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($db, $sql);
    mysqli_stmt_bind_param($stmt, "sssss", $firstname, $lastname, $user, $hashed_password, $status);

    if (mysqli_stmt_execute($stmt)) {
        echo '<script>alert("Registration successful. Please log in."); window.location = "login.php";</script>';
    } else {
        error_log("Error during registration: " . mysqli_error($db));
        echo '<script>alert("An error occurred during registration. Please try again later."); window.history.back();</script>';
    }

    mysqli_stmt_close($stmt);
    mysqli_stmt_close($check_stmt);
} else {
    header('Location: register.php');
    exit();
}

$db->close();
?>