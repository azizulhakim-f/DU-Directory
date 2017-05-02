<?php
require('db.php');
include("auth.php");
?>

<!DOCTYPE html>
<html>
<title>DU Directory Dashboard</title>
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
<body class="w3-light-grey w3-content" style="max-width:1600px">

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
    <div class="w3-container">
        <a href="#" onclick="w3_close()" class="w3-hide-large w3-right w3-jumbo w3-padding w3-hover-grey" title="close menu">
            <i class="fa fa-remove"></i>
        </a>
        <img src="image/du.png" style="width:80%;" class="w3-round"><br><br>
        <h4><b>DU DASHBOARD</b></h4>
        <p class="w3-text-grey">Text todo</p>
    </div>
    <div class="w3-bar-block">
        <a href="#portfolio" onclick="w3_close()" class="w3-bar-item w3-button w3-padding w3-text-teal"><i class="fa fa-th-large fa-fw w3-margin-right"></i>DIRECTORY</a>
        <a href="#statistics" onclick="w3_close()" class="w3-bar-item w3-button w3-padding"><i class="fa fa-user fa-fw w3-margin-right"></i>STATISTICS</a>
        <a href="#contact" onclick="w3_close()" class="w3-bar-item w3-button w3-padding"><i class="fa fa-envelope fa-fw w3-margin-right"></i>CONTACT</a>
        <a href="logout.php" onclick="w3_close()" class="w3-bar-item w3-button w3-padding"><i class="fa fa-envelope fa-fw w3-margin-right"></i>LOGOUT</a>
    </div>
    <div class="w3-panel w3-large">
        <i class="fa fa-facebook-official w3-hover-opacity"></i>
        <i class="fa fa-instagram w3-hover-opacity"></i>
        <i class="fa fa-snapchat w3-hover-opacity"></i>
        <i class="fa fa-pinterest-p w3-hover-opacity"></i>
        <i class="fa fa-twitter w3-hover-opacity"></i>
        <i class="fa fa-linkedin w3-hover-opacity"></i>
    </div>
</nav>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px">

    <!-- Header -->
    <header id="portfolio">
        <a href="#"><img src="/w3images/avatar_g2.jpg" style="width:65px;" class="w3-circle w3-right w3-margin w3-hide-large w3-hover-opacity"></a>
        <span class="w3-button w3-hide-large w3-xxlarge w3-hover-text-grey" onclick="w3_open()"><i class="fa fa-bars"></i></span>
        <div class="w3-container">
            <h1><b>DU Directory</b></h1>
            <div class="w3-section w3-bottombar w3-padding-16">
                <div class="w3-section" name="searchmenu">
                    <script src = "js/ajaxscript.js" ></script>
                    <label>Division</label>
                    <select class="w3-select" type="text" name="division" onChange="updatesubdivision(this.options[this.options.selectedIndex].value)" >
                        <option value="" disabled selected>Choose Division</option>
                        <?php
                        $sel_query="SELECT DISTINCT division FROM info;";
                        $result = mysqli_query($con,$sel_query);
                        while($row = mysqli_fetch_assoc($result)) { ?>
                            <option value= "<?php echo $row["division"]?>" >  <?php echo $row["division"]?> </option>
                        <?php } ?>
                    </select>

                    <label>Sub-Division</label>
                    <select class="w3-select" id="subdivisionid" name="subdivision">
                        <option value="" disabled selected>Choose SubDivision</option>
                    </select>

                    <div id="dom-target" style="display: none;">
                        <?php
                        $sel_query="SELECT DISTINCT division, subdivision FROM info;";
                        $result = mysqli_query($con,$sel_query);
                        while($row = mysqli_fetch_assoc($result)){
                            echo $row['division'] . "#" . $row['subdivision'] . "\n";
                        }
                        ?>
                    </div>

                    <span class="w3-margin-right w3-black w3-button" onclick="getContacts()">Filter</span>
                    <script src = "js/subdivisionOption.js"></script>
                    <script src = "js/ajaxscript.js"></script>
                </div>
            </div>

        </div>
    </header>

    <div class="w3-row-padding" id="contactdisplay">
        <?php include ("getData.php") ?>
    </div>

    <!-- Pagination -->
    <div class="w3-center w3-padding-32">
        <div class="w3-bar">
            <a href="#" class="w3-bar-item w3-button w3-hover-black">«</a>
            <a href="#" class="w3-bar-item w3-black w3-button">1</a>
            <a href="#" class="w3-bar-item w3-button w3-hover-black">2</a>
            <a href="#" class="w3-bar-item w3-button w3-hover-black">3</a>
            <a href="#" class="w3-bar-item w3-button w3-hover-black">4</a>
            <a href="#" class="w3-bar-item w3-button w3-hover-black">»</a>
        </div>
    </div>



    <div class="w3-container w3-padding-large" style="margin-bottom:32px">
        <h4 id="statistics">Contact Statistics</h4>
        <p>অনুষদ</p>
        <div class="w3-grey">
            <div class="w3-container w3-dark-grey w3-padding w3-center" style="width:95%">
                <?php include ("php/contact_faculty.php") ?>
            </div>
        </div>

        <p>ইনস্টিটিউট</p>
        <div class="w3-grey">
            <div class="w3-container w3-dark-grey w3-padding w3-center" style="width:95%">
                <?php include ("php/contact_institute.php") ?>
            </div>
        </div>

        <p>অফিস</p>
        <div class="w3-grey">
            <div class="w3-container w3-dark-grey w3-padding w3-center" style="width:95%">
                <?php include ("php/contact_office.php") ?>
            </div>
        </div>

        <p>হল</p>
        <div class="w3-grey">
            <div class="w3-container w3-dark-grey w3-padding w3-center" style="width:95%">
                <?php include ("php/contact_hall.php") ?>
            </div>
        </div>

        <p>সর্বমোট</p>
        <div class="w3-grey">
            <div class="w3-container w3-dark-grey w3-padding w3-center" style="width:95%">
                <?php include ("php/contact_all.php") ?>
            </div>
        </div>
        <hr>
    </div>

    <!-- Add Contact Section -->
    <div class="w3-container w3-padding-large w3-grey">
        <h3 id="contact"><b>Add Contact</b></h3>
        <hr class="w3-opacity">
        <form action="/action_page.php" target="_blank">

            <div class="w3-section">
                <label>Name</label>
                <input class="w3-input w3-border" type="text" name="Name" required>
            </div>

            <div class="w3-section">
                <label>Designation</label>
                <input class="w3-input w3-border" type="text" name="designation" required>
            </div>

            <div class="w3-section" name="optionmenu">
                <label>Division</label>
                <select class="w3-select" type="text" name="division" required onChange="updatesubdivision(this.options[this.options.selectedIndex].value)" >
                    <option value="" disabled selected>Choose Division</option>
                    <?php
                    $sel_query="SELECT DISTINCT division FROM info;";
                    $result = mysqli_query($con,$sel_query);
                    while($row = mysqli_fetch_assoc($result)) { ?>
                        <option value= "<?php echo $row["division"]?>" >  <?php echo $row["division"]?> </option>
                    <?php } ?>
                </select>

                <label>Sub-Division</label>
                <select class="w3-select" id="subdivisionid" name="subdivision" required>
                    <option value="" disabled selected>Choose SubDivision</option>
                </select>

                <div id="dom-target" style="display: none;">
                    <?php
                    $sel_query="SELECT DISTINCT division, subdivision FROM info;";
                    $result = mysqli_query($con,$sel_query);
                    while($row = mysqli_fetch_assoc($result)){
                        echo $row['division'] . "#" . $row['subdivision'] . "\n";
                    }
                    ?>
                </div>

                <script src = "js/subdivisionOption.js"></script>
            </div>

            <div class="w3-section">
                <label>Mobile</label>
                <input class="w3-input w3-border" type="number" name="phone1" required>
            </div>

            <div class="w3-section">
                <label>Telephone</label>
                <input class="w3-input w3-border" type="number" name="phone2" required>
            </div>

            <div class="w3-section">
                <label>Genuine Email</label>
                <input class="w3-input w3-border" type="email" name="email1" required>
            </div>

            <div class="w3-section">
                <label>DU Email</label>
                <input class="w3-input w3-border" type="email" name="email2" required>
            </div>

            <div class="w3-section">
                <label>Message</label>
                <input class="w3-input w3-border" type="text" name="Message" required>
            </div>

            <button type="submit" class="w3-button w3-black w3-margin-bottom"><i class="fa fa-paper-plane w3-margin-right"></i>Add This Info</button>

        </form>
    </div>

    <!-- Footer -->
    <footer class="w3-container w3-padding-32 w3-dark-grey">
        <div class="w3-row-padding">
            <div class="w3-third">
                <h3>Copyright</h3>
                <p>This Dashboard and corresponding android app DU-Directory is created as web project supervised by Md. Mamunur Rashid.</p>
            </div>

            <div class="w3-third">
                <h3>Created By</h3>
                <ul class="w3-ul w3-hoverable">
                    <li class="w3-padding-16">
                        <img src="image/azizul.jpg" class="w3-left w3-margin-right" style="width:50px">
                        <span class="w3-large">Azizul Hakim</span><br>
                        <span>Csedu 20th batch</span>
                    </li>
                    <li class="w3-padding-16">
                        <img src="image/jahid.jpg" class="w3-left w3-margin-right" style="width:50px">
                        <span class="w3-large">Jahid Hasan</span><br>
                        <span>Csedu 20th batch</span>
                    </li>
                </ul>
            </div>

            <div class="w3-third">
                <h3>Other DU sites</h3>
                <p>
                    <span class="w3-tag w3-black w3-margin-bottom">Travel</span> <span class="w3-tag w3-grey w3-small w3-margin-bottom">New York</span> <span class="w3-tag w3-grey w3-small w3-margin-bottom">London</span>
                    <span class="w3-tag w3-grey w3-small w3-margin-bottom">IKEA</span> <span class="w3-tag w3-grey w3-small w3-margin-bottom">NORWAY</span> <span class="w3-tag w3-grey w3-small w3-margin-bottom">DIY</span>
                    <span class="w3-tag w3-grey w3-small w3-margin-bottom">Ideas</span> <span class="w3-tag w3-grey w3-small w3-margin-bottom">Baby</span> <span class="w3-tag w3-grey w3-small w3-margin-bottom">Family</span>
                    <span class="w3-tag w3-grey w3-small w3-margin-bottom">News</span> <span class="w3-tag w3-grey w3-small w3-margin-bottom">Clothing</span> <span class="w3-tag w3-grey w3-small w3-margin-bottom">Shopping</span>
                    <span class="w3-tag w3-grey w3-small w3-margin-bottom">Sports</span> <span class="w3-tag w3-grey w3-small w3-margin-bottom">Games</span>
                </p>
            </div>

        </div>
    </footer>

    <div class="w3-black w3-center w3-padding-24">Powered by <a href="https://www.w3schools.com/w3css/default.asp" title="W3.CSS" target="_blank" class="w3-hover-opacity">CseDU</a></div>

    <!-- End page content -->
</div>

<script>
    // Script to open and close sidebar
    function w3_open() {
        document.getElementById("mySidebar").style.display = "block";
        document.getElementById("myOverlay").style.display = "block";
    }

    function w3_close() {
        document.getElementById("mySidebar").style.display = "none";
        document.getElementById("myOverlay").style.display = "none";
    }
</script>

</body>
</html>
