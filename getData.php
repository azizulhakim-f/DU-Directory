<?php
/**
 * Created by PhpStorm.
 * User: AZIZUL
 * Date: 5/1/2017
 * Time: 8:02 PM
 */
require('db.php');
include('auth.php');

$sql = "";
if(!empty($_POST['dept'])){
    $sql = "SELECT * FROM `info` WHERE `subdivision` = ";
    $sql .= "'" . $_POST['dept'] . "'";
}
else {
    $_POST['dept'] = $_SESSION['subdivision'];
    $sql = "SELECT * FROM `info` WHERE `subdivision` = ";
    $sql .= "'".$_SESSION['subdivision']."'";
}

$count = 0;
$display = "";

//DEPARTMENT NAME PART
$dept = "<div class=\"w3-row-padding\" id=\"deptartmentdisplay\">";
$dept .= "<div class=\"w3-container w3-white w3-center w3-margin w3-gray w3-round-xlarge\">";
$dept .= "<h3><b>". $_POST['dept'] . "</b></h3>";
$dept .= "</div>";
$dept .= "</div>";


$display .= $dept;

$display .= "<div class=\"w3-row-padding\" id=\"contactdisplay\">";

$result = mysqli_query($con,$sql);
while($row = mysqli_fetch_assoc($result)) {
    if( $count>0 && $count%3==0){
        $display .= "</div><div class=\"w3-row-padding\">";
    }


    $display .= "<div class=\"w3-third w3-animate-opacity w3-container w3-margin-bottom \">";
    $display .= "<div class=\"w3-container w3-display-container w3-hover-grey w3-white w3-center w3-round-large\">";

    //NAME PART
    $name = "<header class=\"w3-container w3-center \">";
    $name .= "<h5><b>". $row["name"] . "</b></h5>";
    $name .= "</header>";
    $display .= $name;

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

    //BUTTONS

    $button = "<button class=\"w3-button w3-display-middle w3-display-hover  w3-dark-gray\" onclick='editContact(" . $row['id'] . ")' >EDIT</button>";
    $button .= "<button class=\"w3-button w3-display-bottommiddle w3-display-hover  w3-dark-gray\" onclick='deleteContact(" . $row['id'] . ")' >DELETE</button>";

    //If no permission I will just... NOT add this buttons. :v
    if($row['subdivision']===$_SESSION['subdivision']) {
        $display .= $button;
    }

    $display .= "</div>";
    $display .= "</div>";

    $count++;
}

$display .= "</div>";

echo $display;

?>

