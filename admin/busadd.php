<?php 
include 'connection.php';
include 'topnav.php'; 
?>

<div class="contanier"> 
    <div class="card card-register mx-auto mt-5">
        <div class="card-header"><h2>Add new Vehicle</h2> </div>
        <div class="card-body">
                 

                        <form role="form" method="post" action="bustrans.php?action=add">
                            
                            <!-- <div class="form-group">
                            <input class="form-control" placeholder="BUS ID" name="BUS_ID" required>
                            </div> -->
                            <div class="form-group">
                            <input class="form-control" placeholder="BUS Name" name="BUS_NAME" required>
                            </div>
                            <div class="form-group">
                              <input class="form-control" placeholder="BUS Type" name="BUS_TYPE" required>
                            </div> 
                            <div class="form-group">
                              <select name="DRIVER_ID" class="form-control">
                                <option selected disabled>-- Select a Driver --</option>
                                <?php
                                $sql = "SELECT DRIVER_ID, DRIVER_NAME FROM driver";
                                $query = mysqli_query($db, $sql);
                                if(mysqli_num_rows($query) > 0) {
                                  while($row = mysqli_fetch_assoc($query)) {
                                    ?><option value="<?php echo $row['DRIVER_ID'];?>"><?php echo $row['DRIVER_NAME'];?></option> <?php
                                  }
                                }
                                else {
                                  ?><option disabled value="0"><?php echo "Driver ID not found!";?></option> <?php
                                }
                                ?>
                              </select>
                            </div> 
                           
                            <button type="submit" class="btn btn-primary"> <h6> Add Vehicle </h6> </button>
                            <button type="reset" class="btn btn-danger"> <h6> Clear Entry </h6> </button>


                      </form>  
                    </div>
                </div>

        </div>
        <!-- /.container-fluid -->