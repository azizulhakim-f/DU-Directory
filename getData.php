<?php
/**
 * Created by PhpStorm.
 * User: AZIZUL
 * Date: 5/1/2017
 * Time: 8:02 PM
 */
require('db.php');



$sql = "";
if(!empty($_POST['dept'])){
    $sql = "SELECT * FROM `info` WHERE `subdivision` = ";
    $sql .= "'" . $_POST['dept'] . "'";
}
else {
    $sql = "SELECT * FROM `info` WHERE `subdivision` = ";
    $sql .= "'কম্পিউটার বিজ্ঞান ও প্রকৌশল বিভাগ'";
}

$count = 0;
$display = "";
$display .= "<div class=\"w3-row-padding\" id=\"contactdisplay\">";

$result = mysqli_query($con,$sql);
while($row = mysqli_fetch_assoc($result)) {
    if( $count>0 && $count%3==0){
        $display .= "</div><div class=\"w3-row-padding\">";
    }
    $display .= "<div class=\"w3-third w3-container w3-margin-bottom\">";
    $display .= "<div class=\"w3-container w3-white w3-center\">";
    $display .= "<h5><b>" . $row["name"] . "</b></h5>";
    $display .= "<p>" . $row["designation"] . "</p>";

    $phn = "<div class=\"w3-row\">";
    $phn .= "<div class=\"w3-half w3-container\"><p>";
    if($row["phone1"]) $phn .= $row["phone1"];
    $phn .= "</p> </div>";
    $phn .= "<div class=\"w3-half w3-container\"><p>";
    if($row["phone2"]) $phn .= $row["phone2"];
    $phn .= "</p> </div>";
    $phn .= "</div>";

    $display .= $phn;


    if($row["email1"]){
        $display .= "<p>" . $row["email1"] . "</p>";
    }

    if($row["email2"]){
        $display .= "<p>" . $row["email2"] . "</p>";
    }


    $display .= "</div>";
    $display .= "</div>";
    $count++;
}

$display .= "</div>";

echo $display;
