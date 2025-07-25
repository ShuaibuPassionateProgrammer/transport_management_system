<?php
include 'connection.php';
include 'topnav.php'; 
?>

<div class="col-lg-12">
    <div>
        <i class="fas fa-table"></i>
        Bus Records  <a href="busadd.php?action=add" type="button" class="btn btn-xs btn-primary">Add New</a>
    </div>
    
    <br> </br>
    
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>Bus Name</th>
                    <th>Bus Type</th>
                    <th>Driver ID</th>
                    <th>Options</th>
                </tr>
            </thead>
            <tbody>
                <?php                  
                $query = 'SELECT * FROM bus';
                $result = mysqli_query($db, $query) or die (mysqli_error($db));
                  
                while ($row = mysqli_fetch_assoc($result)) {
                                        
                    echo '<tr>';
                    echo '<td>'. htmlspecialchars($row['BUS_NAME']).'</td>';
                    echo '<td>'. htmlspecialchars($row['BUS_TYPE']).'</td>';
                    echo '<td>'. htmlspecialchars($row['DRIVER_ID']).'</td>';
                    echo '<td> <a type="button" class="btn btn-xs btn-primary" href="bussearch.php?action=edit & id='.$row['BUS_ID'] . '" > SEARCH </a> ';
                    echo ' <a  type="button" class="btn btn-xs btn-warning" href="busedit.php?action=edit & id='.$row['BUS_ID'] . '"> EDIT </a> ';
                    echo ' <a  type="button" class="btn btn-xs btn-danger" href="busdel.php?type=bus&delete & id=' . $row['BUS_ID'] . '" onclick="return confirm(\'Are you sure, you want to Delete a Vehicle\');">DELETE </a> </td>';
                    echo '</tr> ';
                }
            ?>                      
            </tbody>
        </table>
    </div>
<?php include 'footer.php'; ?>