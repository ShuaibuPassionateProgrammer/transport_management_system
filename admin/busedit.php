<?php 
include 'connection.php';
include 'topnav.php'; 
?>

<div class="contanier">
    <div class="card card-register mx-auto mt-5">
        <?php 
        if (isset($_GET['id']) && is_numeric($_GET['id'])) {
            $id = $_GET['id'];
            $query = 'SELECT * FROM bus WHERE BUS_ID = ?';
            $stmt = mysqli_prepare($db, $query);
            mysqli_stmt_bind_param($stmt, "i", $id);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            $row = mysqli_fetch_array($result);

            if ($row) {
                $zz = htmlspecialchars($row['BUS_ID']);
                $i = htmlspecialchars($row['BUS_NAME']);
                $a = htmlspecialchars($row['BUS_TYPE']);
                $b = htmlspecialchars($row['DRIVER_ID']);
            } else {
                echo "Bus not found.";
                exit;
            }
        } else {
            echo "Invalid ID.";
            exit;
        }
        ?>

        <div class="col-lg-12" style="box-shadow: rgba(2,2,2,0,2);">
            <h1>Edit Records</h1>
            <div class="col-lg-6"> 
                <form role="form" method="post" action="busedit1.php">
                    <div class="form-group">
                        <input type="hidden" name="id" value="<?php echo $zz; ?>" />
                    </div>
                    <div class="form-group">
                        <input class="form-control" placeholder="Bus Name" name="BUS_NAME" value="<?php echo $i; ?>">
                    </div>
                    <div class="form-group">
                        <input class="form-control" placeholder="Bus Type" name="BUS_TYPE" value="<?php echo $a; ?>">
                    </div>
                    <div class="form-group">
                        <input class="form-control" placeholder="DRIVER ID" name="DRIVER_ID" value="<?php echo $b; ?>">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Update Record</button>
                    </div>
                </form>  
            </div>
        </div>
            
    </div>
    <!-- /.container-fluid -->
</div>