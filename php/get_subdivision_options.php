<?php
/**
 * Created by PhpStorm.
 * User: AZIZUL
 * Date: 5/14/2017
 * Time: 8:19 PM
 */

$sel_query="SELECT DISTINCT subdivision FROM info;";
$result = mysqli_query($con,$sel_query);
$subdivs = "";
while($row = mysqli_fetch_assoc($result)) {
    $subdiv = $row["subdivision"];
    $subdivs .= "<option value=\"" . $subdiv . "\">" . $subdiv . "</option>";
}
echo $subdivs;
?>

