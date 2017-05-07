<?php
/**
 * Created by PhpStorm.
 * User: AZIZUL
 * Date: 5/7/2017
 * Time: 6:16 PM
 */
require('db.php');

$id = $_POST['ID'];
$name =$_POST['c_name'];
$designation = $_POST['c_designation'];
$division = $_POST['c_division'];
$subdivision = $_POST['c_subdivision'];
$phone1 = $_POST['c_phone1'];
$phone2 = $_POST['c_phone2'];
$email1 = $_POST['c_email1'];
$email2 = $_POST['c_email2'];
if("" == trim($_POST['ID'])) {
    $sql = "insert into info (`id`,`name`,`division`,`subdivision`, `designation`, `phone1`,`phone2`,`email1`,`email2`) values 
                        ('$id','$name','$division','$subdivision','$designation', '$phone1','$phone1','$email1', '$email2')";
}
else {
    $sql = "UPDATE info SET 
    `name`='$name',`division`='$division',`subdivision`='$subdivision', `designation`='$designation', 
    `phone1`='$phone1',`phone2`='$phone2',`email1`='$email1',`email2`='$email2'
    WHERE `id`='$id' ";
}
mysqli_query($con,$sql) or die(mysql_error());
?>

<script>
    location.href = 'index.php';
</script>

