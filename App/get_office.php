<?php
$hostname="localhost";
$username="dudirectory";
$password="dudirectory";
$database="dudirectory";

$sql = "SELECT DISTINCT subdivision FROM info WHERE division = 'অফিস';";

$con = mysqli_connect($hostname,$username,$password,$database);
mysqli_query($con,'SET CHARACTER SET utf8');
mysqli_query($con,"SET SESSION collation_connection ='utf8_general_ci'") or die (mysql_error());

$result = mysqli_query($con, $sql);

$response = array();

while($row = mysqli_fetch_array($result)){
	array_push($response, array(
				"office_name"=>$row[0],
		));
}

	echo json_encode(array("response"=>$response));

	mysqli_close($con);
?>