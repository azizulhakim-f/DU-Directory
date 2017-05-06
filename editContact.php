<?php
/**
 * Created by PhpStorm.
 * User: AZIZUL
 * Date: 5/6/2017
 * Time: 6:39 PM
 */
require('db.php');

$sql = "";
if(!empty($_POST['id'])){
    $sql = "SELECT * FROM `info` WHERE `id` = ";
    $sql .= "'" . $_POST['id'] . "'";
}

$result = mysqli_query($con,$sql);
$row = mysqli_fetch_assoc($result);

$name = 'azizul hakimmmm';
$desig = 'student';
$div = 'কলা অনুষদ';
$subdiv = 'cse';
$phone1 = '034343434';
$data = $row['name'] . '~' . $row['designation'] . '~' .  $row['division'] . '~' . $row['subdivision'] . '~' . $row['phone1'];
echo $data;

?>
