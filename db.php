<?php

    // connect to db
    $conn = mysqli_connect("localhost", "NaMN", "a4apple", "job" );

    // check connection
    if(!$conn){

        echo "Connection Error: " . mysqli_connect_error();

    }    

?>