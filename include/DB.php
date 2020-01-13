<?php 
    $host = "localhost";
    $username = "root";
    $password = "";
    $dbname = "trueincube";
    global $conn ;
    $conn = mysqli_connect($host, $username, $password, $dbname);

    if (!$conn) {
        die("Cannot connect to MySQL!");
    }
    mysqli_query($conn, "set NAMES utf8");
    date_default_timezone_set("Asia/Bangkok");

