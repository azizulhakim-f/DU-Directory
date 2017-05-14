<?php
/**
 * Created by PhpStorm.
 * User: AZIZUL
 * Date: 5/14/2017
 * Time: 5:09 PM
 */
$sel_query="SELECT DISTINCT division FROM info;";
$result = mysqli_query($con,$sel_query);
$divs = "";
while($row = mysqli_fetch_assoc($result)) {
    $div = $row["division"];
    $divs .= "<option value=\"" . $div . "\">" . $div . "</option>";
}
echo $divs;
