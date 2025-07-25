<?php
$db = mysqli_connect('localhost', 'root', '');
if (!$db) {
    // Log the error to a file or a logging service
    error_log('Database connection failed: ' . mysqli_connect_error());
    // Display a generic error message to the user
    die('Unable to connect to the database. Please try again later.');
}

if (!mysqli_select_db($db, 'tms_002')) {
    // Log the error
    error_log('Database selection failed: ' . mysqli_error($db));
    // Display a generic error message
    die('Could not select the database. Please try again later.');
}