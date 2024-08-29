 <?php include'header.php' ;?>
<?php include'connection.php' ;?>

 <div class="col-lg-12">
                <?php
						$dname= $_POST['DRIVER_NAME'];
                		$demail= $_POST['DRIVER_EMAIL'];
					    $dphone= $_POST['DRIVER_PHONE'];
						
						
				
					switch($_GET['action']){
						case 'add':			
								$query = "INSERT INTO driver
								(DRIVER_NAME,DRIVER_EMAIL,DRIVER_PHONE,EMPLOY_DATE)
								VALUES ('".$dname."','".$demail."','".$dphone."',NOW())";
								mysqli_query($db,$query)or die (mysqli_error($db));
							
						break;
									
						}
				?>
    	<script type="text/javascript">
			alert("Successfully added.");
			window.location = "driver.php";
		</script>
                    </div>