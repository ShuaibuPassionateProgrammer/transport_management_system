<?php
require('connection.php');
session_start();


$user = trim($_POST['user']);
$upass = trim($_POST['pass']);

//create some sql statement
$sql = "SELECT * FROM `admin` WHERE `user` = ?";
$stmt = mysqli_prepare($db, $sql);
mysqli_stmt_bind_param($stmt, "s", $user);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if($result->num_rows > 0){
    $found_user = mysqli_fetch_array($result);
    $existing_pass = $found_user['password'];

    // Verify password
    if (password_verify($upass, $existing_pass) || md5($upass) === $existing_pass) {

        // If password is still MD5, rehash and update it
        if (md5($upass) === $existing_pass) {
            $new_hash = password_hash($upass, PASSWORD_DEFAULT);
            $update_sql = "UPDATE `admin` SET `password` = ? WHERE `id` = ?";
            $update_stmt = mysqli_prepare($db, $update_sql);
            mysqli_stmt_bind_param($update_stmt, "si", $new_hash, $found_user['id']);
            mysqli_stmt_execute($update_stmt);
        }

        //fill the result to session variable
        $_SESSION['MEMBER_ID'] = $found_user['id'];
        $_SESSION['fname'] = $found_user['fname'];
        $_SESSION['lname'] = $found_user['lname'];
        $_SESSION['position'] = $found_user['status'];
        
        if ($_SESSION['position']=='ADMIN') {
            header("Location: index.php");
            exit();
        }
        else
        {
            header("Location: homepage.php");
            exit();
        }
    } else {
        echo '<script>alert("Invalid Username or Password!"); window.location = "login.php";</script>';
    }
}else{
//if theres no result
    echo '<script>alert("Invalid Username or Password!"); window.location = "login.php";</script>';
}
    
$db->close();
?>