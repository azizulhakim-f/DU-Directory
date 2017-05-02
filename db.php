<?php

$host = "localhost";
$user = "dudirectory";
$pass = "dudirectory";
$database = "dudirectory";

$con = mysqli_connect($host, $user, $pass, $database);

if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$con->query("SET CHARACTER SET utf8");
$con->query("SET SESSION collation_connection =’utf8_general_ci'");

?>