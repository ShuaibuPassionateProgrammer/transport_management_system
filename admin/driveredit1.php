<?php include 'connection.php';
include 'topnav.php'; ?>
<body>
<?php
$d_id = $_POST['id'];
$dname = $_POST['DRIVER_NAME'];
$demail = $_POST['DRIVER_EMAIL'];
$dphone = $_POST['DRIVER_PHONE'];
$edate = $_POST['EMPLOY_DATE'];
					
$query = 'UPDATE driver set DRIVER_NAME ="'.$dname.'",
    DRIVER_EMAIL ="'.$demail.'",
    DRIVER_PHONE ="'.$dphone.'",
    EMPLOY_DATE ="'.$edate.'" WHERE
    DRIVER_ID ="'.$d_id.'"';
    $result = mysqli_query($db, $query) or die(mysqli_error($db));				
?>	
	<script type="text/javascript">
			alert("Update Successfull.");
			window.location = "driver.php";
		</script>
 <?php include 'footer.php'; ?>