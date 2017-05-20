<?php
require('db.php');
include("auth.php");
?>

<!DOCTYPE html>
<html>


<head>
	<title>Change Password - DU Directory</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<style>
		body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", sans-serif}
	</style>
	<script>
		var valid = false;
        function check() {
            var pass = document.getElementById("new_pass").value;
            var cpass = document.getElementById("conf_pass").value;
            if(pass.length<6||pass.length>20) {
                document.getElementById("message").innerHTML = "Password needs to be between 6 to 20 characters";
                document.getElementById("new_pass").style = "border-width: thick; border-color: red";
                valid = false;
                return;
            }

            document.getElementById("new_pass").style = "border-width: thick; border-color: #4CAF50";
            document.getElementById("conf_pass").style = "border-width: thick; border-color: #4CAF50";
            document.getElementById("message").innerHTML = "";
            valid = true;
            if(pass != cpass) {
                document.getElementById("message").innerHTML = "Passwords do not match";
                document.getElementById("conf_pass").style = "border-width: thick; border-color: red";
                valid = false;
            }
        }

        function submit() {
            if(!valid) {
                document.getElementById("message").innerHTML = "Fields not correctly filled";
                return;
			}

            var xhttp = new XMLHttpRequest();

            xhttp.onreadystatechange = function(){
                if(this.readyState== 4 && this.status == 200){
                    console.log(this.responseText);
                    if(this.responseText.indexOf("Success")!=-1)
                        window.location.href = "index.php";
                    else
                    	document.getElementById("message").innerHTML = this.responseText;

                }
            };

            var oldpass = document.getElementById("old_pass").value;
            var newpass = document.getElementById("new_pass").value;
            var params = "oldpass="+oldpass+"&newpass="+newpass;
            //console.log(value);
            xhttp.open("POST","php/password_changer.php", true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send(params);
            //console.log("sent");
        }
	</script>
</head>



<body class="w3-light-grey w3-content" style="max-width:1600px">



<!-- Sidebar/menu -->
<script src="js/sidebar_openclose.js"></script>
<nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
	<div class="w3-container">
		<a href="#" onclick="w3_close()" class="w3-hide-large w3-right w3-jumbo w3-padding w3-hover-grey" title="close menu">
			<i class="fa fa-remove"></i>
		</a>
		<img src="image/du.png" style="width:80%;" class="w3-round"><br><br>
		<h4><b><a href="index.php" style="text-decoration: none">DU DASHBOARD</a></b></h4>
		<p class="w3-text-grey"></p>
	</div>
	<div class="w3-bar-block">
		<a href="index.php" onclick="w3_close()" class="w3-bar-item w3-button w3-padding"><i class="fa fa-home fa-fw w3-margin-right"></i>HOME</a>
		<a href="#change" onclick="w3_close()" class="w3-bar-item w3-button w3-padding"><i class="fa fa-lock fa-fw w3-margin-right"></i>CHANGE PASSWORD</a>
		<a href="logout.php" onclick="w3_close()" class="w3-bar-item w3-button w3-padding"><i class="fa fa-sign-out fa-fw w3-margin-right"></i>LOGOUT</a>
	</div>
</nav>


<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>


<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px">

	<div class="w3-container">
	<h1><b>DU Directory</b></h1>
	</div>

	<div class="w3-container w3-padding-large w3-grey">
		<h3 id="change"><b>Change Password</b></h3>
		<hr class="w3-opacity">
			<div class="w3-section">
				<label>Old Password</label>
				<input class="w3-input w3-border" type="password" id="old_pass" name="old_pass" required>
			</div>


			<div class="w3-section">
				<label>New Password</label>
				<input class="w3-input" type="password" id="new_pass" name="new_pass" style="border-width: thick" onkeyup="check()" required>
			</div>


			<div class="w3-section">
				<label>Confirm Password</label>
				<input class="w3-input" type="password" id="conf_pass" name="conf_pass"  style="border-width: thick" onkeyup="check()" required>
			</div>

			<br><a id="message"></a></br>

			<button type="submit" class="w3-button w3-black w3-margin-bottom" onclick="submit()"><i class="fa fa-paper-plane w3-margin-right"></i>Add This Info</button>

	</div>
	<!-- End page content -->
</div>

</body>
</html>
