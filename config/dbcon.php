<?php
    $host = "localhost";
    $username = "id21438285_root";
    $password = "P123456789vn@";
    $database = "id21438285_hoangphat";

    $con = mysqli_connect($host, $username, $password, $database);

    if (!$con){
        die("Error". mysqli_connect_error());
    }
?>