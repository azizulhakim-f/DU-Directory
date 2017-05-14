<?php
/**
 * Created by PhpStorm.
 * User: AZIZUL
 * Date: 5/14/2017
 * Time: 4:54 PM
 */
$div = $_POST['division'];
$sel_query="SELECT DISTINCT subdivision FROM info where division = '$div';";
$result = mysqli_query($con,$sel_query);

$subdivs = "";
$options = "";

while($row = mysqli_fetch_assoc($result)){
    if($subdivs == "") $subdivs .= $row['subdivision'];
    else $subdivs .= '~' . $row['subdivision'];
    $sub = $row['subdivision'];
    $options .= "<option>".$sub."</option>";
}

echo options;
?>