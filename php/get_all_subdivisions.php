<?php
/**
 * Created by PhpStorm.
 * User: AZIZUL
 * Date: 5/14/2017
 * Time: 5:09 PM
 */
$sel_query="SELECT DISTINCT subdivision FROM info;";
$result = mysqli_query($con,$sel_query);
$divs = "";
while($row = mysqli_fetch_assoc($result)) {
    $div = $row["subdivision"];
    $divs .= "<option value=\"" . $div . "\">" . $div . "</option>";
}
echo $divs;
?>