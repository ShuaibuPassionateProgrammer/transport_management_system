<?php include 'connection.php';
include 'topnav.php'; ?>

<div class="contanier">
    <div class="card card-register mx-auto mt-5">
        <?php
        if (isset($_GET['id']) && is_numeric($_GET['id'])) {
            $id = $_GET['id'];
            $query = 'SELECT * FROM route WHERE ROUTE_ID = ?';
            $stmt = mysqli_prepare($db, $query);
            mysqli_stmt_bind_param($stmt, "i", $id);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            $row = mysqli_fetch_array($result);

            if ($row) {
                $zz = htmlspecialchars($row['ROUTE_ID']);
                $i = htmlspecialchars($row['FAIR']);
                $a = htmlspecialchars($row['START']);
                $b = htmlspecialchars($row['FINISH']);
            } else {
                echo "Route not found.";
                exit;
            }
        } else {
            echo "Invalid ID.";
            exit;
        }
        ?>

        <div class="col-lg-12 p-4">
            <h2>Edit Records</h2>
            <form role="form" method="post" action="routeedit1.php">
                <div class="form-group">
                    <input type="hidden" name="id" value="<?php echo $zz; ?>" />
                </div>
                <div class="form-group">
                    <input class="form-control" placeholder="Fair" name="FAIR" value="<?php echo $i; ?>">
                </div>
                <div class="form-group">
                    <input class="form-control" placeholder="Start" name="START" value="<?php echo $a; ?>">
                </div>
                <div class="form-group">
                    <input class="form-control" placeholder="Finish" name="FINISH" value="<?php echo $b; ?>">
                </div>
                <button type="submit" class="btn btn-primary">Update Record</button>
            </form>         
        </div>
    </div>
    <!-- /.container-fluid -->
</div>
<?php include 'footer.php'; ?>