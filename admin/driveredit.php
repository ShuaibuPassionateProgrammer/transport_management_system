<?php 
include 'connection.php';
include 'topnav.php'; 
?>

<div class="contanier">
    <div class="card card-register mx-auto mt-5">
    <?php
    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $id = $_GET['id'];
        $query = 'SELECT * FROM driver WHERE DRIVER_ID = ?';
        $stmt = mysqli_prepare($db, $query);
        mysqli_stmt_bind_param($stmt, "i", $id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $row = mysqli_fetch_array($result);

        if ($row) {
            $did = htmlspecialchars($row['DRIVER_ID']);
            $dname = htmlspecialchars($row['DRIVER_NAME']);
            $demail = htmlspecialchars($row['DRIVER_EMAIL']);
            $dphone = htmlspecialchars($row['DRIVER_PHONE']);
            $edate = htmlspecialchars($row['EMPLOY_DATE']);
        } else {
            echo "Driver not found.";
            exit;
        }
    } else {
        echo "Invalid ID.";
        exit;
    }
    ?>

    <div class="col-lg-12 p-4">
            <h2 class="ml-4">Edit Driver Records</h2>
            <!-- <div class="col-lg-6"> -->

            <form role="form" method="post" action="driveredit1.php">
                <div class="form-group">
                    <input type="hidden" name="id" value="<?php echo $did; ?>" />
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Driver Name" name="DRIVER_NAME" value="<?php echo $dname; ?>" required>
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" placeholder="Driver Email" name="DRIVER_EMAIL" value="<?php echo $demail; ?>" required>
                    </div>
                    <div class="form-group">
                        <input type="tel" class="form-control" placeholder="Driver Phone" name="DRIVER_PHONE" value="<?php echo $dphone; ?>" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Employ Date" name="EMPLOY_DATE" value="<?php echo $edate; ?>" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Update Driver</button>
            </form> 
        <!-- </div> -->
    </div>
    
</div>
<!-- /.container-fluid -->
</div>
<?php include 'footer.php'; ?>