<?php
require('db.php');
include("auth.php");
?>

<!DOCTYPE html>
<html>


<head>
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
        <a href="#directory" onclick="w3_close()" class="w3-bar-item w3-button w3-padding w3-text-teal"><i class="fa fa-address-book fa-fw w3-margin-right"></i>DIRECTORY</a>
        <a href="#statistics" onclick="w3_close()" class="w3-bar-item w3-button w3-padding"><i class="fa fa-bar-chart fa-fw w3-margin-right"></i>STATISTICS</a>
		<a href="#contact" onclick="w3_close()" class="w3-bar-item w3-button w3-padding"><i class="fa fa-user fa-fw w3-margin-right"></i>ADD CONTACT</a>
		<a href="#location" onclick="w3_close()" class="w3-bar-item w3-button w3-padding"><i class="fa fa-edit fa-fw w3-margin-right"></i>EDIT LOCATION</a>
		<a href="changepass.php" onclick="w3_close()" class="w3-bar-item w3-button w3-padding"><i class="fa fa-lock fa-fw w3-margin-right"></i>CHANGE PASSWORD</a>
		<a href="logout.php" onclick="w3_close()" class="w3-bar-item w3-button w3-padding"><i class="fa fa-sign-out fa-fw w3-margin-right"></i>LOGOUT</a>
        <a href="#copyrightsection" onclick="w3_close()" class="w3-bar-item w3-button w3-padding"><i class="fa fa-copyright fa-fw w3-margin-right"></i>ABOUT DEVELOPER</a>
    </div>
</nav>


<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>


<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px">



    <!-- Header -->
    <header id="directory">
        <span class="w3-button w3-hide-large w3-xxlarge w3-hover-text-grey" onclick="w3_open()"><i class="fa fa-bars"></i></span>
        <div class="w3-container">
            <h1><b>DU Directory</b></h1>
            <div class="w3-section w3-bottombar w3-padding-16">
                <div class="w3-section" name="searchmenu">
                    <script src = "js/loadContacts.js" ></script>
                    <label>Division</label>
                    <select class="w3-select" type="text" name="division" onChange="updatesubdivision(this.options[this.options.selectedIndex].value)" >
                        <option value="" disabled selected>Choose Division</option>
                        <?php include("php/get_division_options.php") ?>
                    </select>

                    <label>Sub-Division</label>
                    <select class="w3-select" id="subdivisionid" name="subdivision">
                        <option value="" disabled selected>Choose SubDivision</option>
                    </select>

                    <!-- TEXT DUMP -->
                    <div id="dom-target" style="display: none;">
                        <?php include("php/get_text_dump.php") ?>
                    </div>

                    <span class="w3-margin-right w3-black w3-button" onclick="getContacts()">Filter</span>
                    <script>
						function updatesubdivision(selecteddivision){

                            var xhttp = new XMLHttpRequest();

                            xhttp.onreadystatechange = function(){
                                if(this.readyState== 4 && this.status == 200){
                                    //console.log(this.responseText);
                                    document.getElementById("subdivisionid").innerHTML = this.responseText;
                                    //document.getElementById("showName").insertAdjacentHTML('');
                                }
                            };

                            var params = "division="+selecteddivision;
                            xhttp.open("POST","php/get_subdivisions.php", true);
                            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                            xhttp.send(params);
                        }
					</script>
                    <script src = "js/loadContacts.js"></script>
                </div>
            </div>
        </div>
    </header>



    <!-- This is where all the Contact cards Load -->
    <div class="w3-row-padding" id="contactdisplay">
        <?php include ("getData.php") ?>
    </div>
    <script src = 'js/editdeletebutton.js'></script>



    <!-- Pagination, just for style, doesn't work -->
    <!--<div class="w3-center w3-padding-32">
        <div class="w3-bar">
            <a href="#" class="w3-bar-item w3-button w3-hover-black">«</a>
            <a href="#" class="w3-bar-item w3-black w3-button">1</a>
            <a href="#" class="w3-bar-item w3-button w3-hover-black">2</a>
            <a href="#" class="w3-bar-item w3-button w3-hover-black">3</a>
            <a href="#" class="w3-bar-item w3-button w3-hover-black">4</a>
            <a href="#" class="w3-bar-item w3-button w3-hover-black">»</a>
        </div>
    </div>-->




    <div class="w3-container w3-padding-large" style="margin-bottom:32px">
        <h4 id="statistics">Contact Statistics</h4>
        <p>অনুষদ</p>
        <div class="w3-grey">
            <div class="w3-container w3-dark-grey w3-padding w3-center" style="width:100%">
                <?php include ("php/contact_faculty.php") ?>
            </div>
        </div>

        <p>ইনস্টিটিউট</p>
        <div class="w3-grey">
            <div class="w3-container w3-dark-grey w3-padding w3-center" style="width:100%">
                <?php include ("php/contact_institute.php") ?>
            </div>
        </div>

        <p>অফিস</p>
        <div class="w3-grey">
            <div class="w3-container w3-dark-grey w3-padding w3-center" style="width:100%">
                <?php include ("php/contact_office.php") ?>
            </div>
        </div>

        <p>হল</p>
        <div class="w3-grey">
            <div class="w3-container w3-dark-grey w3-padding w3-center" style="width:100%">
                <?php include ("php/contact_hall.php") ?>
            </div>
        </div>

        <p>সর্বমোট</p>
        <div class="w3-grey">
            <div class="w3-container w3-dark-grey w3-padding w3-center" style="width:100%">
                <?php include ("php/contact_all.php") ?>
            </div>
        </div>
        <hr>
    </div>

    <!-- Add Contact Section -->
    <div class="w3-container w3-padding-large w3-grey">
        <h3 id="contact"><b>Add Contact</b></h3>
        <hr class="w3-opacity">
        <form action="insert_edit_contact.php" method="post">
            <div class="w3-section">
                <input class="w3-input w3-border" type="hidden" id="form_id" name="ID">
            </div>

            <div class="w3-section">
                <label>Name</label>
                <input class="w3-input w3-border" type="text" id="form_name" name="c_name" required>
            </div>

            <div class="w3-section">
                <label>Designation</label>
                <input class="w3-input w3-border" type="text" id="form_designation" name="c_designation" required>
            </div>

            <div class="w3-section" name="optionmenu">
                <label>Division</label>
                <select class="w3-select" type="text" id="form_division"  name="c_division" required>
                    <option value="<?php echo $_SESSION['division']?>" selected><?php echo $_SESSION['division']?></option>
                </select>
                <label>Sub-Division</label>
                <select class="w3-select" type="text" id="form_subdivision" name="c_subdivision" required>
                    <option value="<?php echo $_SESSION['subdivision']?>" selected><?php echo $_SESSION['subdivision']?></option>
                </select>
            </div>

            <div class="w3-section">
                <label>Mobile</label>
                <input class="w3-input w3-border" type="number" id="form_phone1" name="c_phone1" >
            </div>

            <div class="w3-section">
                <label>Telephone</label>
                <input class="w3-input w3-border" type="number" id="form_phone2" name="c_phone2" >
            </div>

            <div class="w3-section">
                <label>Genuine Email</label>
                <input class="w3-input w3-border" type="email" id="form_email1" name="c_email1" >
            </div>

            <div class="w3-section">
                <label>DU Email</label>
                <input class="w3-input w3-border" type="email" id="form_email2" name="c_email2" >
            </div>

            <button type="submit" class="w3-button w3-black w3-margin-bottom"><i class="fa fa-paper-plane w3-margin-right"></i>Add This Info</button>

        </form>
    </div>

	<!--Edit Location-->
	<div class="w3-container w3-padding-large">
		<h3 id="location"><b>Edit Location</b></h3>
		<form action="php/set_building.php" method="post">
			<div class="w3-section">

				<select class="w3-select" type="text" id="form_building" name="building" required>
					<?php include ("php/get_building_options.php") ?>
				</select>

				<button type="submit" class="w3-button w3-black w3-margin-bottom"><i class="fa fa-paper-plane w3-margin-right"></i>Set Location</button>
			</div>
		</form>
	</div>

    <!-- Footer -->
    <footer class="w3-container w3-padding-32 w3-dark-grey" id="copyrightsection">
        <div class="w3-row-padding">
            <!--<div class="w3-third">
                <h3>Copyright</h3>
                <p>This Dashboard and corresponding android app DU-Directory is created as web project by Azizul Hakim, Jahid Hasan, Sayontan Chowdhury and Md. Tahsin Tausif and supervised by Dr. Md. Mamun-or-Rashid.</p>
            </div>-->

            <div class="w3-third">
                <h3>Developed By</h3>
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
				<h3>.</h3>
				<ul class="w3-ul w3-hoverable">
					<li class="w3-padding-16">
						<img src="image/sayon.jpg" class="w3-left w3-margin-right" style="width:50px">
						<span class="w3-large">Sayontan Chowdhury</span><br>
						<span>Csedu 20th batch</span>
					</li>
					<li class="w3-padding-16">
						<img src="image/jahid.jpg" class="w3-left w3-margin-right" style="width:50px">
						<span class="w3-large">Md. Tahsin Tausif</span><br>
						<span>Csedu 20th batch</span>
					</li>
				</ul>
			</div>

            <div class="w3-third">
                <h3>Supervised By</h3>
                <ul class="w3-ul w3-hoverable">
                    <li class="w3-padding-16">
                        <img src="image/proffesormamun.jpg" class="w3-left w3-margin-right" style="width:50px">
                        <span class="w3-large">Dr. Md. Mamun-or-Rashid</span><br>
                        <span>University of Dhaka</span>
                    </li>
                </ul>
            </div>

        </div>
    </footer>

    <div class="w3-black w3-center w3-padding-24">Powered by <a href="http://www.cse.du.ac.bd/" title="W3.CSS" target="_blank" class="w3-hover-opacity">CSEDU</a></div>

    <!-- End page content -->
</div>

</body>
</html>
