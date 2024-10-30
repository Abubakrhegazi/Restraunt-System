<?php

$host = "localhost";
$username = "root";
$password = "";
$database = "resturant_software_db";

$con = mysqli_connect($host, $username ,$password, $database);

if(!$con){

    die("Connection failed" . mysqli_connect_error());

} else {
    //echo "Connected successfully";
}

function check_query($result){
    global $con;
    if(!$result){
        return "Error" . mysqli_error($con);
    }
    return true;
}



