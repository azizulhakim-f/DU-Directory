<?php

require('../db.php');
include('../auth.php');


$oldpass = $_POST['oldpass'];
$newpass = $_POST['newpass'];
$sel_query="SELECT * FROM users where password = '".md5($oldpass)."'";
$result = mysqli_query($con,$sel_query);

if(mysqli_num_rows($result)>0) {
	$sql = "UPDATE users SET password = '".md5($newpass)."' WHERE password='".md5($oldpass)."'";
	$result = mysqli_query($con,$sql);
	if($result == true)
		echo "Success";
	else
		echo "Unable to update";
}
else {
	echo "Old Password did not match";
}

?>