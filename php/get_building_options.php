<?php

$sel_query="SELECT DISTINCT building FROM buildings;";
$result = mysqli_query($con,$sel_query);
$builds = "";
$prevbuild = "";

if(isset($_SESSION['subdivision'])) {
	$sql = "SELECT building FROM location WHERE subdiv_name='". $_SESSION['subdivision'] . "'";
	$result2 = mysqli_query($con,$sql);
	if(mysqli_num_rows($result2)>0) {
		$row = mysqli_fetch_assoc($result2);
		$prevbuild = $row["building"];
		$builds .= "<option value=\"" . $prevbuild . "\">" . $prevbuild . "</option>";
	}
}

while($row = mysqli_fetch_assoc($result)) {
	$build = $row["building"];
	if($build != $prevbuild)
		$builds .= "<option value=\"" . $build . "\">" . $build . "</option>";
}

echo $builds;
?>