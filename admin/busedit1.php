<?php 
include 'connection.php';
include 'topnav.php'; 
?>

<body>
    <?php
    $zz = trim($_POST['id']);
    $bname = trim($_POST['BUS_NAME']);
    $btype = trim($_POST['BUS_TYPE']);
    $did = trim($_POST['DRIVER_ID']);

    if (empty($zz) || empty($bname) || empty($btype) || empty($did)) {
        echo '<script>alert("All fields are required.");window.history.back();</script>';
    } else {
        $query = 'UPDATE bus SET BUS_NAME = ?, BUS_TYPE = ?, DRIVER_ID = ? WHERE BUS_ID = ?';
        $stmt = mysqli_prepare($db, $query);
        mysqli_stmt_bind_param($stmt, "ssii", $bname, $btype, $did, $zz);

        if (mysqli_stmt_execute($stmt)) {
            echo '<script>alert("Update Successful.");window.location = "bus.php";</script>';
        } else {
            error_log("Error updating bus: " . mysqli_error($db));
            echo '<script>alert("An error occurred. Please try again.");window.history.back();</script>';
        }
        mysqli_stmt_close($stmt);
    }
 <?php include 'footer.php'; ?>