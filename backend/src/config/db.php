<?php

$host = "localhost";
$username = "root";
$password = "";
$database = "resturant_software_db";

$conn = mysqli_connect($host, $username ,$password, $database);

if(!$conn){

    die("Connection failed" . mysqli_connect_error());

} else {
//       echo "Connected";
}

function check_query($result){
    global $conn;
    if(!$result){
        return "Error" . mysqli_error($conn);
    }
    return true;
}



