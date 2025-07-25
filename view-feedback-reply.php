<?php include('connection.php');?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TRANSPORT MANAGEMENT SYSTEM</title>
    <!-- Bootstrap core CSS-->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
    <style>
        html, body {
            font-family: 'Tahoma', sans-serif;
        }
        .header {
            box-shadow: 0 1px 3px rgba(2,2,2,0.2);
        }
        .img-responsive {
            height: 100%;
            width: 100%;
        }
        
    </style>
</head>
<body id="bg">
    <!-- Body content -->

    <div class="header p-4 shadow">
        <h1 class="text-center">TRANSPORT MANAGEMENT SYSTEM</h1>
    </div>

    <div class="container pt-3 mt-5">
        <div class="row">
            <div class="col-md-12">
                <!-- <img src="image/deluxe-bg.jpg" alt="" class="img-responsive"> -->
            <!-- </div>
            <div class="col-md-6 pt-3 text-center"> -->
                <h2>TRANSPORT MANAGEMENT SYSTEM</h2>
                <?php
                $sql = "SELECT * FROM feedback";
                $query = mysqli_query($db, $sql);

                if(mysqli_num_rows($query) > 0) {
                    while ($data=mysqli_fetch_assoc($query)) {
                        ?>
                        <div class="alert alert-info">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong><?=htmlspecialchars($data['replymessage'])?></strong><br/>
                        </div>
                        <?php
                    }
                }
                else {
                    echo "<p style='font-size: large;'>No Feedbacks Available!</p>";
                }
                ?>
            </div>
        </div>
        <p class="pt-4">
            <a href="../transport-management-system/">Back to Homepage</a>
        </p>
    </div>
    
    <script src="./vendor/jquery/jquery.min.js"></script>
    <script src="./vendor/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>