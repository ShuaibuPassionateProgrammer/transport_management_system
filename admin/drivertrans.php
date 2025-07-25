<?php include'header.php'; ?>
<?php include'connection.php'; ?>

<div class="col-lg-12">
    <?php
    $dname = trim($_POST['DRIVER_NAME']);
    $demail = trim($_POST['DRIVER_EMAIL']);
    $dphone = trim($_POST['DRIVER_PHONE']);

    if (isset($_GET['action']) && $_GET['action'] == 'add') {
        if (empty($dname) || empty($demail) || empty($dphone)) {
            echo '<script>alert("All fields are required.");window.history.back();</script>';
        } elseif (!filter_var($demail, FILTER_VALIDATE_EMAIL)) {
            echo '<script>alert("Invalid email format.");window.history.back();</script>';
        } else {
            $query = "INSERT INTO driver (DRIVER_NAME, DRIVER_EMAIL, DRIVER_PHONE, EMPLOY_DATE) VALUES (?, ?, ?, NOW())";
            $stmt = mysqli_prepare($db, $query);
            mysqli_stmt_bind_param($stmt, "sss", $dname, $demail, $dphone);

            if (mysqli_stmt_execute($stmt)) {
                echo '<script>alert("Successfully added.");window.location = "driver.php";</script>';
            } else {
                error_log("Error adding driver: " . mysqli_error($db));
                echo '<script>alert("An error occurred. Please try again.");window.history.back();</script>';
            }
            mysqli_stmt_close($stmt);
        }
    } else {
        header("Location: driver.php");
        exit();
    }
</div>