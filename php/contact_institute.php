<?php
$sel_query="SELECT COUNT(*) FROM `info` WHERE `division` LIKE '%ইনস্টিটিউট%'";
$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)){
    echo $row["COUNT(*)"] ;
}
?>

