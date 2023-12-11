<?php
    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "phpsignup";

    $connection = new mysqli($server, $username, $password, $database);

    if($connection->connect_error){
        die("connection to this database failed due to".$connection->connect_error);
    }

?>