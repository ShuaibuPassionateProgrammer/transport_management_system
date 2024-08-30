<?php include('connection.php');?>
<?php include('topnav.php');?>

<div>
    <i class="fas fa-table"></i>
    Passengers Feed Back 
</div><br>

<table>
    <thead>
        <tr>
            <td>#</td>
            <td>Full Name</td>
            <td>Email</td>
            <td>Phone</td>
            <td>Subject</td>
            <td>Message</td>
            <td class="text-center">Actions</td>
        </tr>
    </thead>
    <tbody>
        <?php
        $sql = "SELECT * FROM feedback f JOIN booking b ON f.booking_id = b.id";
        $query = mysqli_query($db, $sql);

        if(mysqli_num_rows($query) > 0) {
            while ($row=mysqli_fetch_assoc($query)) {
                <tr>
                    <td><?=$row['id']?></td>
                    <td><?=$row['fullname']?></td>
                    <td><?=$row['email']?></td>
                    <td><?=$row['phone']?></td>
                    <td><?=$row['subject']?></td>
                    <td><?=$row['message']?></td>
                    <td class="text-center">
                        <a href="feedbackedit.php?fid=<?php echo $row['id']?>" class="btn btn-info">Edit</a>
                        <a href="feedbackreply.php?freply=<?php echo $row['id']?>" class="btn btn-success">Reply</a>
                        <a href="feedbackdel.php?fdel=<?php echo $row['id']?>" class="btn btn-danger" onclick="return confirm('Are you sure, you want to Delete a FeedBack');">Delete</a>
                    </td>
                </tr>
                <?php
            }
        }
        else {
            ?>
            <td colspan="7"><p class="text-danger">FeedBack not available!</p></td>
            <?php
        }
        ?>
            }
        }
        ?>
    </tbody>
</table>