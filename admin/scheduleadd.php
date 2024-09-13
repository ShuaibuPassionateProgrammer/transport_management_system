<?php 
include 'connection.php';
include 'topnav.php'; 
?>

<div class="contanier">
    <div class="card card-register mx-auto mt-5">
        <div class="card-header"><h2>Add Schedule Record</h2> </div>
        <div class="card-body">
            <form role="form" method="post" action="scheduletrans.php?action=add">
                <div class="form-group">
                    <label for="Departure">Departure</label>
                    <input type="datetime-local" class="form-control" placeholder="Departure" name="DEPARTURE">
                </div>
                <div class="form-group">
                    <label for="Arrival">Arrival</label>
                    <input type="datetime-local" class="form-control" placeholder="Arrival" name="ARRIVAL">
                </div>

                <div class="form-group">
                    <label for="Vehicle">Vehicle</label>
                    <select name="BUS_ID" class="form-control">
                    <option selected disabled>-- Select a Vehicle --</option>
                    <?php
                    $sql = "SELECT BUS_ID, BUS_NAME FROM bus";
                    $query = mysqli_query($db, $sql);
                    if(mysqli_num_rows($query) > 0) {
                        while($row = mysqli_fetch_assoc($query)) {
                        ?><option value="<?php echo $row['BUS_ID'];?>"><?php echo $row['BUS_NAME'];?></option> <?php
                        }
                    }
                    else {
                        ?><option disabled value="0"><?php echo "Bus ID not found!";?></option> <?php
                    }
                    ?>
                    </select>
                </div> 
                
                <button type="submit" class="btn btn-primary">Add Schedule</button>
                <button type="reset" class="btn btn-danger">Clear Entry</button>


            </form>  
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->
        <footer class="sticky-footer">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
            <span>Copyright © Your Website <?php echo date('Y');?></span>
            </div>
          </div>
        </footer>

      </div>
      <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="login.php">Logout</a>
          </div>
        </div>
      </div>
    </div>
<?php include 'footer.php';?>