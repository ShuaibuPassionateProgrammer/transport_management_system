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
<body>
    <div class="header p-4 shadow">
        <h1 class="text-center">TRANSPORT MANAGEMENT SYSTEM</h1>
    </div>

    <div class="container-fluid pt-3">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <img src="image/deluxe-bg.jpg" style="height: 400px;" alt="" class="img-responsive">
            </div>
            <div class="col-md-6 pt-3 text-center">
                <h1>Feed Back</h1>
                <p class="text-muted">To send a feedback, fill in the form below</p>
                <form action="send-feedback-process.php" method="post">
                    <div class="form-group">
                        <label for="fullname" class="float-left">Full Name</label><br>
                        <input type="text" name="full_name" placeholder="Your name" class="form-control float-left" required><br>
                    </div><br>
                    <div class="form-group">
                        <label for="email" class="float-left">E-Mail</label>
                        <input type="email" name="email" placeholder="Your email address" class="form-control float-left"><br>
                    </div><br><br>
                    <div class="form-group">
                        <label for="phone" class="float-left">Phone Number</label>
                        <input type="tel" name="phone" placeholder="Your phone number" class="form-control float-left" required><br>
                    </div><br><br>
                    <div class="form-group">
                        <label for="subject" class="float-left">Subject</label>
                        <input type="subject" name="subject" placeholder="Your subject" class="form-control float-left"><br>
                    </div><br><br>
                    <div class="form-group">
                        <label for="message" class="float-left">Message</label>
                        <textarea rows="5" name="message" placeholder="Your message" class="form-control float-left" required></textarea><br>
                    </div><br><br>
                    <br><br><br>
                    <div class="form-group">
                        <br><br>
                        <input type="submit" name="send_feedback" class="btn btn-primary float-left" value="Send FeedBack">
                    </div>
                </form>
                <p class="pt-4">
                    <a href="../transport-management-system/">Back to Homepage</a>
                </p>
            </div>
        </div>
    </div>
</body>
</html>