<?php include'header.php' ;?>
<?php include'connection.php' ;?>


 <div class="col-lg-12">
    <?php
    $fr= $_POST['FAIR'];
    $str= $_POST['START'];
    $fsh= $_POST['FINISH'];
            
            
    
    switch($_GET['action']){
        case 'add':			
            $query = "INSERT INTO route (FAIR,START,FINISH) VALUES ('".$fr."','".$str."','".$fsh."')";
            mysqli_query($db,$query)or die (mysqli_error($db));;
            break;
                    
        }
    ?>
    	<script type="text/javascript">
			alert("Successfully added.");
			window.location = "route.php";
		</script>
                    </div>