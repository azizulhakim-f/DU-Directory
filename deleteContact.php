<?php
/**
 * Created by PhpStorm.
 * User: AZIZUL
 * Date: 5/6/2017
 * Time: 6:39 PM
 */

require('db.php');
$id=$_POST['id'];
$query = "DELETE FROM info WHERE `id` = '$id' ";
$result = mysqli_query($con,$query) or die ( mysqli_error());
?>

