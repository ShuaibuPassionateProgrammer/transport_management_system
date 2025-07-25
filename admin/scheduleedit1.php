<?php 
include 'connection.php';
include 'topnav.php'; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $zz = trim($_POST['id']);
    $arvl = trim($_POST['ARRIVAL']);
    $dpt = trim($_POST['DEPARTURE']);
    $bid = trim($_POST['BUS_ID']);

    if (empty($zz) || empty($arvl) || empty($dpt) || empty($bid)) {
        echo '<script>alert("All fields are required.");window.history.back();</script>';
        exit;
    }

    if (!is_numeric($bid)) {
        echo '<script>alert("Invalid Bus ID. It must be a number.");window.history.back();</script>';
        exit;
    }

    $query = 'UPDATE schedule SET ARRIVAL = ?, DEPARTURE = ?, BUS_ID = ? WHERE SCHEDULE_ID = ?';
    $stmt = mysqli_prepare($db, $query);
    // The types are: s = string, i = integer.
    mysqli_stmt_bind_param($stmt, "ssii", $arvl, $dpt, $bid, $zz);

    if (mysqli_stmt_execute($stmt)) {
        echo '<script>alert("Update Successful.");window.location = "schedule.php";</script>';
    } else {
        error_log("Error updating schedule: " . mysqli_error($db));
        echo '<script>alert("An error occurred. Please try again.");window.history.back();</script>';
    }
    mysqli_stmt_close($stmt);

} else {
    // Redirect if accessed directly without POST method
    header("Location: schedule.php");
    exit();
}

include 'footer.php'; 
?>