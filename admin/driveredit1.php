<?php include 'connection.php';
include 'topnav.php'; ?>
<body>
<?php
$d_id = trim($_POST['id']);
$dname = trim($_POST['DRIVER_NAME']);
$demail = trim($_POST['DRIVER_EMAIL']);
$dphone = trim($_POST['DRIVER_PHONE']);
$edate = trim($_POST['EMPLOY_DATE']);

if (empty($d_id) || empty($dname) || empty($demail) || empty($dphone) || empty($edate)) {
    echo '<script>alert("All fields are required.");window.history.back();</script>';
} else {
    $query = 'UPDATE driver SET DRIVER_NAME = ?, DRIVER_EMAIL = ?, DRIVER_PHONE = ?, EMPLOY_DATE = ? WHERE DRIVER_ID = ?';
    $stmt = mysqli_prepare($db, $query);
    mysqli_stmt_bind_param($stmt, "ssssi", $dname, $demail, $dphone, $edate, $d_id);

    if (mysqli_stmt_execute($stmt)) {
        echo '<script>alert("Update Successful.");window.location = "driver.php";</script>';
    } else {
        error_log("Error updating driver: " . mysqli_error($db));
        echo '<script>alert("An error occurred. Please try again.");window.history.back();</script>';
    }
    mysqli_stmt_close($stmt);
}
 <?php include 'footer.php'; ?>