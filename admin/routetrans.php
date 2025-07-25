<?php include'header.php' ;?>
<?php include'connection.php' ;?>


 <div class="col-lg-12">
    <?php
    $fr = trim($_POST['FAIR']);
    $str = trim($_POST['START']);
    $fsh = trim($_POST['FINISH']);

    if (isset($_GET['action']) && $_GET['action'] == 'add') {
        if (empty($fr) || empty($str) || empty($fsh)) {
            echo '<script>alert("All fields are required.");window.history.back();</script>';
        } else {
            $query = "INSERT INTO route (FAIR, START, FINISH) VALUES (?, ?, ?)";
            $stmt = mysqli_prepare($db, $query);
            mysqli_stmt_bind_param($stmt, "sss", $fr, $str, $fsh);

            if (mysqli_stmt_execute($stmt)) {
                echo '<script>alert("Successfully added.");window.location = "route.php";</script>';
            } else {
                error_log("Error adding route: " . mysqli_error($db));
                echo '<script>alert("An error occurred. Please try again.");window.history.back();</script>';
            }
            mysqli_stmt_close($stmt);
        }
    } else {
        header("Location: route.php");
        exit();
    }
</div>