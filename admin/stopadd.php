<?php 
include 'connection.php';
include 'topnav.php'; 
?>

<div class="contanier"> 
    <div class="card card-register mx-auto mt-5">
        <div class="card-header"><h2>Add new Stop</h2> </div>
        <div class="card-body">
            <form role="form" method="post" action="stoptrans.php?action=add">    
                <div class="form-group">
                    <input class="form-control" placeholder="Location Name" name="LOCATION_NAME">
                </div>
                <div class="form-group">
                    <!-- <label for="Route">Route</label> -->
                    <select name="ROUTE_ID" class="form-control">
                    <option selected disabled>-- Select a Route --</option>
                    <?php
                    $sql = "SELECT ROUTE_ID, FINISH FROM route";
                    $query = mysqli_query($db, $sql);
                    if(mysqli_num_rows($query) > 0) {
                        while($row = mysqli_fetch_assoc($query)) {
                        ?><option value="<?php echo $row['ROUTE_ID'];?>"><?php echo $row['FINISH'];?></option> <?php
                        }
                    }
                    else {
                        ?><option disabled value="0"><?php echo "Route ID not found!";?></option> <?php
                    }
                    ?>
                    </select>
                </div>
                
                <button type="submit" class="btn btn-primary">Add Stop</button>
                <button type="reset" class="btn btn-danger">Clear Entry</button>


            </form>  
        </div>
    </div>

        </div>
        <!-- /.container-fluid -->
 <?php include 'footer.php'; ?>