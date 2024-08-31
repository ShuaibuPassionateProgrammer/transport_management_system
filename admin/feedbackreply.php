<?php
if(isset($_GET['freply'])) {
    $fid = $_GET['freply'];
    ?>
<div class="container mb-4 p-4 mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8 shadow">
            <?php
            $sql = "SELECT * FROM feedback WHERE booking_id = $fid";
            $query = mysqli_query($db, $sql);

            if(mysqli_num_rows($query) > 0) {
                while($row = mysqli_fetch_assoc($query)) {
                    ?>
                    <form action="feedbackedit1.php" method="post">
                        <div class="form-group">
                            <h2 class="text-left">Reply FeedBack</h2>
                            <hr>
                        </div>
                        <input type="hidden" name="id" value="<?php echo $fid;?>">
                        <div class="form-group">
                            <label for="fullname" class="float-left">Full Name</label><br>
                            <input type="text" name="full_name" value="<?php echo $row['fullname'];?>" placeholder="Your name" class="form-control float-left" required><br>
                        </div><br>
                        <div class="form-group">
                            <label for="email" class="float-left">E-Mail</label>
                            <input type="email" name="email" value="<?php echo $row['email'];?>" placeholder="Your email address" class="form-control float-left"><br>
                        </div><br><br>
                        <div class="form-group">
                            <label for="message" class="float-left">Message</label>
                            <textarea rows="5" name="message" placeholder="Reply message" class="form-control float-left" required></textarea><br>
                        </div><br><br>
                        <br><br><br>
                        <div class="form-group">
                            <br><br>
                            <input type="submit" name="reply_feedback" class="btn btn-info float-left" value="Reply FeedBack">
                        </div>
                        <br><br>
                    </form>
                    <?php
                }
            }
            else {
                echo "FeedBack not found!";
            }
            ?>
            
        </div>
    </div>
</div>
    <?php
}
else {
    header('location: feedback.php');
}
?>