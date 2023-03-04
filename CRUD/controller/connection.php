<?php

$hostname = "localhost";
$username = "root";
$password = "";
$databaseName = "crud";

try {
    $connect = mysqli_connect($hostname, $username, $password, $databaseName);
} catch (Exception $error) {
    echo $error;
}
 
?>