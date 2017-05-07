<?php
$sel_query="SELECT COUNT(*) FROM `info` WHERE `division` LIKE '%অনুষদ%'";
$result = mysqli_query($con,$sel_query);
$count = 0;
$total = 0;
while($row = mysqli_fetch_assoc($result)){
    $count = $row["COUNT(*)"] ;
}
$sel_query="SELECT COUNT(*) FROM `info`";
$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)){
    $total =  $row["COUNT(*)"] ;
}
$percent = $count * 100 / (float) $total;
echo "\"width:". $percent ."%\"";
?>

