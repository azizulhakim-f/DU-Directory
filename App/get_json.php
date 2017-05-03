<?php
$hostname="localhost";
$username="dudirectory";
$password="dudirectory";
$database="dudirectory";

$sql = "select * from info;";

$con = mysqli_connect($hostname,$username,$password,$database);
mysqli_query($con,'SET CHARACTER SET utf8');
mysqli_query($con,"SET SESSION collation_connection ='utf8_general_ci'") or die (mysql_error());

$result = mysqli_query($con, $sql);

$response = array();

while($row = mysqli_fetch_array($result)){
	array_push($response, array(
				"name"=>$row[1],
				"division"=>$row[2],
				"sub_division"=>$row[3],
				"designation"=>$row[4],
				"phone1"=>$row[5],
				"phone2"=>$row[6],
				"email1"=>$row[7],
				"email2"=>$row[8],
				"short_code"=>$row[9],
				"info"=>$row[10],
				"name_eng"=>$row[11],
		));
}

	echo json_encode(array("response"=>$response));

	mysqli_close($con);
?>