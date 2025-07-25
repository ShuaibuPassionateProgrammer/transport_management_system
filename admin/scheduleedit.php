<?php 
include 'connection.php';
include 'topnav.php'; 
?>

<div class="contanier">
    <div class="card card-register mx-auto mt-5">
    <?php
    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $id = $_GET['id'];
        $query = 'SELECT * FROM schedule WHERE SCHEDULE_ID = ?';
        $stmt = mysqli_prepare($db, $query);
        mysqli_stmt_bind_param($stmt, "i", $id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $row = mysqli_fetch_array($result);

        if ($row) {
            $zz = htmlspecialchars($row['SCHEDULE_ID']);
            $i = htmlspecialchars($row['ARRIVAL']);
            $a = htmlspecialchars($row['DEPARTURE']);
            $b = htmlspecialchars($row['BUS_ID']);
        } else {
            echo "Schedule not found.";
            exit;
        }
    } else {
        echo "Invalid ID.";
        exit;
    }
    ?>
            <div class="col-lg-12">
                <h2>Edit Records</h2>
                <div class="col-lg-6">
                    <form role="form" method="post" action="scheduleedit1.php">
                        <div class="form-group">
                            <input type="hidden" name="id" value="<?php echo $zz; ?>" />
                        </div>
                        <div class="form-group">
                            <input class="form-control" placeholder="Arrival" name="ARRIVAL" value="<?php echo $i; ?>">
                        </div>
                        <div class="form-group">
                            <input class="form-control" placeholder="Departure" name="DEPARTURE" value="<?php echo $a; ?>">
                        </div> 
                        <div class="form-group">
                            <input class="form-control" placeholder="Bus ID" name="BUS_ID" value="<?php echo $b; ?>">
                        </div>
                        <button type="submit" class="btn btn-primary">Update Record</button>
                        <br></br>
                    </form>  
                </div>
            </div>    
        </div>
    </div>
<?php include 'footer.php'; ?>