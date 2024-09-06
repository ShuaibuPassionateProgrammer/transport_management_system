<?php 
include 'connection.php';
include 'topnav.php'; 
?>

<div>
    <i class="fas fa-table"></i> Passenger Records
</div>

<br></br>

<div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>#</th>
                <th>Full Name</th>
                <th>E-Mail</th>
                <th>Phone</th>
                <th>Bus Name</th>
                <th>Bus Type</th>
                <th>Route Start</th>
                <th>Route Finish</th>
                <th>Fair</th>
                <th>Arrival</th>
                <th>Departure</th>
                <th>Location</th>
                <th>Payment Status</th>
                <th>Actions</th>
                <!--full_name 	email 	phone 	bus_name 	bus_type 	route_start 	route_finish 	fair 	arrival 	departure 	location-->
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT * FROM booking";
            $query = mysqli_query($db, $sql);

            $sn = 1;
            if(mysqli_num_rows($query)) {
                while($row = mysqli_fetch_assoc($query)) {
                    ?>
                    <tr>
                        <td><?php echo $sn++;?></td>
                        <td><?php echo $row['full_name'];?></td>
                        <td><?php echo $row['email'];?></td>
                        <td><?php echo $row['phone'];?></td>
                        <td><?php echo $row['bus_name'];?></td>
                        <td><?php echo $row['bus_type'];?></td>
                        <td><?php echo $row['route_start'];?></td>
                        <td><?php echo $row['route_finish'];?></td>
                        <td><?php echo $row['fair'];?></td>
                        <td><?php echo $row['arrival'];?></td>
                        <td><?php echo $row['departure'];?></td>
                        <td><?php echo $row['location'];?></td>
                        <td><?php echo $row['paymentstatus'];?></td>
                        <td>
                            <span class="bg-info text-light p-2">Approved</span>
                        </td>
                    </tr>
                    <?php
                }
            }
            else {
                ?>
                <tr>
                    <td colspan="13"><p class="text-danger">Passenger not available!</p> </td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
</div>

<?php include 'footer.php';?>