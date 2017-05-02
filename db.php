<?php
$con = mysqli_connect("localhost","id1338053_gedu","csedu","id1338053_du_directory");

// Check connection
if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$con->query("SET CHARACTER SET utf8");
$con->query("SET SESSION collation_connection =’utf8_general_ci'");

?>