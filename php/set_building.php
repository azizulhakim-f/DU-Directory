<?php

require('../db.php');

ini_set('display_errors', 1);
error_reporting(E_ALL);
session_start();
if(isset($_SESSION["subdivision"])) {
	$building = $_POST["building"];
	$subdivision = $_SESSION["subdivision"];

	$sql = "SELECT * FROM location WHERE subdiv_name='".$subdivision."'";
	$result = mysqli_query($con,$sql);
	if(mysqli_num_rows($result)>0) {
		$sql = "UPDATE location SET building='". $building ."' WHERE subdiv_name='". $subdivision . "'";
	}
	else {
		$sql = "INSERT INTO location (subdiv_name,building) VALUES ('".$subdivision."','".$building."')";
	}

	mysqli_query($con, $sql);

	echo $subdivision.$building;
}
?>

<script>
    location.href = '../index.php';
</script>

