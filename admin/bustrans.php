<?php include'header.php' ;?>
<?php include'connection.php' ;?>

<div class="col-lg-12">
    <?php
    // $bid= $_POST['id'];
    $bname = trim($_POST['BUS_NAME']);
    $btype = trim($_POST['BUS_TYPE']);
    $did = trim($_POST['DRIVER_ID']);

    if (isset($_GET['action']) && $_GET['action'] == 'add') {
        if (empty($bname) || empty($btype) || empty($did)) {
            echo '<script>alert("All fields are required.");window.history.back();</script>';
        } else {
            $query = "INSERT INTO bus (BUS_NAME, BUS_TYPE, DRIVER_ID) VALUES (?, ?, ?)";
            $stmt = mysqli_prepare($db, $query);
            mysqli_stmt_bind_param($stmt, "ssi", $bname, $btype, $did);

            if (mysqli_stmt_execute($stmt)) {
                echo '<script>alert("Successfully added.");window.location = "bus.php";</script>';
            } else {
                error_log("Error adding bus: " . mysqli_error($db));
                echo '<script>alert("An error occurred. Please try again.");window.history.back();</script>';
            }
            mysqli_stmt_close($stmt);
        }
    } else {
        header("Location: bus.php");
        exit();
    }
</div>