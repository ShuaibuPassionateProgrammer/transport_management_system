<?php 
include 'connection.php';
include 'topnav.php'; 
?>
<div class="col-lg-12">
    <div>
        <i class="fas fa-table"></i>
        Driver Records  <a href="driveradd.php?action=add" type="button" class="btn btn-xs btn-primary">Add New</a>
    </div>    
    
    <br> </br>      
    
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>Driver Name</th>
                    <th>Driver Email</th>
                    <th>Driver Phone</th>
                    <th>Employ Date</th>
                    <th>Options</th>
                </tr>
            </thead>
            <tbody>
                <?php                  
                $query = 'SELECT * FROM driver';
                $result = mysqli_query($db, $query) or die (mysqli_error($db));

                while ($row = mysqli_fetch_assoc($result)) {
                                        
                    echo '<tr>';
                    echo '<td>'. htmlspecialchars($row['DRIVER_NAME']).'</td>';
                    echo '<td>'. htmlspecialchars($row['DRIVER_EMAIL']).'</td>';
                    echo '<td>'. htmlspecialchars($row['DRIVER_PHONE']).'</td>';
                    echo '<td>'. htmlspecialchars($row['EMPLOY_DATE']).'</td>';
                    echo '<td> <a type="button" class="btn btn-xs btn-primary" href="driversearch.php?action=edit & id='.$row['DRIVER_ID'] . '" > SEARCH </a> ';
                    echo ' <a  type="button" class="btn btn-xs btn-warning" href="driveredit.php?action=edit & id='.$row['DRIVER_ID'] . '"> EDIT </a> ';
                    echo ' <a  type="button" class="btn btn-xs btn-danger" href="driverdel.php?type=driver&delete & id='.$row['DRIVER_ID'] . '" onclick="return confirm(\'Are you sure, you want to Delete a Driver\');">DELETE </a> </td>';
                    echo '</tr> ';
                }
                ?> 
            </tbody>
        </table>
    </div>
<?php include 'footer.php'; ?>