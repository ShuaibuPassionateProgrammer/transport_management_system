<?php 
include 'connection.php';
include 'topnav.php'; 
?>
<body>
    <?php
    $zz = trim($_POST['id']);
    $fr = trim($_POST['FAIR']);
    $str = trim($_POST['START']);
    $fsh = trim($_POST['FINISH']);

    if (empty($zz) || empty($fr) || empty($str) || empty($fsh)) {
        echo '<script>alert("All fields are required.");window.history.back();</script>';
    } else {
        $query = 'UPDATE route SET FAIR = ?, START = ?, FINISH = ? WHERE ROUTE_ID = ?';
        $stmt = mysqli_prepare($db, $query);
        mysqli_stmt_bind_param($stmt, "sssi", $fr, $str, $fsh, $zz);

        if (mysqli_stmt_execute($stmt)) {
            echo '<script>alert("Update Successful.");window.location = "route.php";</script>';
        } else {
            error_log("Error updating route: " . mysqli_error($db));
            echo '<script>alert("An error occurred. Please try again.");window.history.back();</script>';
        }
        mysqli_stmt_close($stmt);
    }
<?php include 'footer.php'; ?>