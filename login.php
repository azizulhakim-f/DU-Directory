<?php
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <style>
        body,h1 {font-family: "Raleway", sans-serif}
        body, html {height: 100%}
        .bgimg {
            background-image: url('image/dubackground.jpg');
            min-height: 100%;
            background-position: center;
            background-size: cover;
        }
    </style>
</head>



<body>
<?php
require('db.php');
session_start();

if (isset($_POST['username'])){
    $username = stripslashes($_REQUEST['username']);
    $username = mysqli_real_escape_string($con,$username);
    $password = stripslashes($_REQUEST['password']);
    $password = mysqli_real_escape_string($con,$password);

    //Checking is user existing in the database or not
    $query = "SELECT * FROM `users` WHERE username='$username' and password='".md5($password)."'";
    $result = mysqli_query($con,$query) or die(mysqli_error($con));
    $rows = mysqli_num_rows($result);
    if($rows==1){
        $_SESSION['username'] = $username;
        header("Location: index.php"); // Redirect user to index.php
    }else{
        echo "<script language=\"JavaScript\">\n";
        echo "alert('Username or Password was incorrect!');\n";
        echo "window.location='login.php'";
        echo "</script>";
    }
}else{
    ?>

    <div class="bgimg w3-display-container w3-animate-opacity w3-text-white">
        <div class="w3-container">
            <div class="w3-display-topmiddle">
                <h1 class="w3-jumbo w3-animate-top">DU DIRECTORY</h1>
                <hr class="w3-border-grey" style="margin:auto;width:40%">
                <button onclick="document.getElementById('id01').style.display='block'" class="w3-center w3-button w3-green ">Login</button>
            </div>


            <div id="id01" class="w3-modal">
                <div class="w3-modal-content w3-card-4 w3-animate-zoom w3-text-black" style="max-width:600px">

                    <div class="w3-center"><br>
                        <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-xlarge w3-transparent w3-display-topright" title="Close Modal">×</span>
                        <img src="image/loginavater.png" alt="Avatar" style="width:30%" class="w3-circle w3-margin-top">
                    </div>

                    <form class="w3-container" action="" method="post" name="login"">
                    <div class="w3-section">
                        <label><b>Username</b></label>
                        <input class="w3-input w3-border w3-margin-bottom" id="usernameid" type="text" placeholder="Enter Username" name="username" required>
                        <label><b>Password</b></label>
                        <input class="w3-input w3-border" type="password" placeholder="Enter Password" name="password" required>
                        <button class="w3-button w3-block w3-green w3-section w3-padding" type="submit">Login</button>
                        <input class="w3-check w3-margin-top" type="checkbox" checked> Remember Me <br>
                    </div>
                    </form>

                    <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
                        <button onclick="document.getElementById('id01').style.display='none'" type="button" class="w3-button w3-red">Cancel</button>
                    </div>

                </div>
            </div>
        </div>

    </div>
<?php } ?>
</body>

</html>