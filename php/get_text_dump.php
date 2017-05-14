<?php
/**
 * Created by PhpStorm.
 * User: AZIZUL
 * Date: 5/14/2017
 * Time: 7:46 PM
 */
$sel_query="SELECT DISTINCT division, subdivision FROM info;";
$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)){
    echo $row['division'] . "#" . $row['subdivision'] . "\n";
}
?>