<?php
    $server="localhost";
    $username="root";
    $password="";
    $database="bank";

    $conn=mysqli_connect($server,$username,$password,$database);
    if(!$conn){
        die("Failed to connect ".mysqli_connect_error());
    }
    // else{
    //     echo "Connection is created ";
    // }
?>