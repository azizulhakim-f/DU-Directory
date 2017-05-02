<?php


require('db.php');
include("auth.php");

$status = "";
if(isset($_POST['new']) && $_POST['new']==1)
{
$trn_date = date("Y-m-d H:i:s");
$name =$_REQUEST['name'];
$division = $_REQUEST['division'];
$phone1 = $_REQUEST['phone1'];
$ins_query="insert into info (`name`,`division`,`phone1`) values ('$name','$division','$phone1')";
mysqli_query($con,$ins_query) or die(mysql_error());
$status = "New Record Inserted Successfully.</br></br><a href='view.php'>View Inserted Record</a>";
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Insert New Record</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<div class="form">
<p><a href="dashboard.php">Dashboard</a> | <a href="view.php">View Records</a> | <a href="php/logout.php">Logout</a></p>

<div>
<h1>Insert New Record</h1>
<form name="form" method="post" action=""> 
<input type="hidden" name="new" value="1" />
<p><input type="text" name="name" placeholder="Enter Name" required /></p>
<p><input type="text" name="division" placeholder="Enter division" required /></p>
<p><input type="text" name="phone1" placeholder="Enter phone" required /></p>
<p><input name="submit" type="submit" value="Submit" /></p>
</form>
<p style="color:#FF0000;"><?php echo $status; ?></p>
<br /><br /><br /><br />
</div>

<form name="classic">
<select name="countries" size="4" onChange="updatecities(this.selectedIndex)" style="width: 150px">
<option selected>Select A City</option>
<option value="usa">USA</option>
<option value="canada">Canada/option>
<option value="uk">United Kingdom</option>
</select>
 
<select name="cities" size="4" style="width: 150px" onClick="alert(this.options[this.options.selectedIndex].value)">
</select>
</form>
 
<script type="text/javascript">
var countrieslist=document.classic.countries
var citieslist=document.classic.cities
 
var cities=new Array()
cities[0]=""
cities[1]=["New York|newyorkvalue", "Los Angeles|loangelesvalue", "Chicago|chicagovalue", "Houston|houstonvalue", "Austin|austinvalue"]
cities[2]=["Vancouver|vancouvervalue", "Tonronto|torontovalue", "Montreal|montrealvalue", "Calgary|calgaryvalue"]
cities[3]=["London|londonvalue", "Glasgow|glasgowsvalue", "Manchester|manchestervalue", "Edinburgh|edinburghvalue", "Birmingham|birminghamvalue"]
 
function updatecities(selectedcitygroup){
    citieslist.options.length=0
    if (selectedcitygroup>0){
        for (i=0; i<cities[selectedcitygroup].length; i++)
            citieslist.options[citieslist.options.length]=new Option(cities[selectedcitygroup][i].split("|")[0], cities[selectedcitygroup][i].split("|")[1])
    }
}
 
</script>


</div>
</body>
</html>