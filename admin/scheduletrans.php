<?php 
include 'header.php';
include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_GET['action']) && $_GET['action'] == 'add') {
    $arvl = trim($_POST['ARRIVAL']);
    $dpt = trim($_POST['DEPARTURE']);
    $bid = trim($_POST['BUS_ID']);

    if (empty($arvl) || empty($dpt) || empty($bid)) {
        echo '<script>alert("All fields are required.");window.history.back();</script>';
        exit;
    }

    if (!is_numeric($bid)) {
        echo '<script>alert("Invalid Bus ID. It must be a number.");window.history.back();</script>';
        exit;
    }

    $query = "INSERT INTO schedule (ARRIVAL, DEPARTURE, BUS_ID) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($db, $query);
    // The types are: s = string, i = integer.
    mysqli_stmt_bind_param($stmt, "ssi", $arvl, $dpt, $bid);

    if (mysqli_stmt_execute($stmt)) {
        echo '<script>alert("Successfully added.");window.location = "schedule.php";</script>';
    } else {
        error_log("Error adding schedule: " . mysqli_error($db));
        echo '<script>alert("An error occurred. Please try again.");window.history.back();</script>';
    }
    mysqli_stmt_close($stmt);

} else {
    // Redirect if accessed incorrectly
    header("Location: schedule.php");
    exit();
}
?>