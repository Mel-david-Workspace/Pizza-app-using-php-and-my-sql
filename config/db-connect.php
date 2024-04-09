<?php 
    //connect to database
    $conn = mysqli_connect('localhost', 'MelDavid', 'test1234', 'meldavidpizza');

    //check connection
    if (!$conn) {
        # code...
        echo 'Connection error: ' . mysqli_connect_error();
    }
?>