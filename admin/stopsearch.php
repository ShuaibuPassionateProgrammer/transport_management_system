<?php 
include 'connection.php';
include 'topnav.php'
?>

<div class="contanier">
    <div class="card card-register mx-auto mt-5">
        <div class="card-header"> <h2>Check Record</h2> </div>
        <div class="card-body">
            <?php
            $query = 'SELECT * FROM stop
                        WHERE
                        LOCATION_ID ='.$_GET['id'];
                        $result = mysqli_query($db, $query) or die(mysqli_error($db));
                        while($row = mysqli_fetch_array($result))
                        {   
                            $zz= $row['LOCATION_ID'];
                            $i= $row['LOCATION_NAME'];
                            $a=$row['ROUTE_ID'];
                        }
                        
                        $id = $_GET['id'];
                    
            ?>
            <form role="form" method="post" action="stop.php">
                
                <div class="form-group">
                    <input type="hidden" name="id" value="<?php echo $zz; ?>" />
                </div>
                <div class="form-group">
                    <input class="form-control" placeholder="Location Name" name="LOCATION_NAME" value="<?php echo $i; ?>">
                </div>
                <div class="form-group">
                    <input class="form-control" placeholder="Route ID" name="ROUTE_ID" value="<?php echo $a; ?>">
                </div>

                <button type="submit" class="btn btn-default">Return to main menu</button>
                


            </form>  
        </div>
    </div>
    
</div>
<!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>

</body>

</html>