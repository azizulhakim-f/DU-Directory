<?php
$sel_query="SELECT COUNT(*) FROM `info` WHERE `division` LIKE '%অফিস%'";
$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)){
    echo $row["COUNT(*)"] ;
}
?>

