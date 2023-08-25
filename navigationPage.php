<?php	
	include "login.php"; 
	// navigation layout for website
	
	
	if(!isset($_SESSION['loginStatus'])){
		$_SESSION['loginStatus'] = 0;
		header("Location:login.html");
	}
	else
	{
		if($_SESSION['loginStatus'] == 1){
		if($_SESSION['level'] == "Public"){
					
	
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="headerStyle.css">
</head>
<body>
<div class="topnav">
  <a href="index1.php">Home</a>
  <!-- <a href="registration.php">Registration</a> -->
  <a href="facilites.php">Services & Facilities</a>
  <a href="testimonials.php">Testimonials</a>
  <a href="contact.php">Contact Us</a>
  <div class="login-container">
    <form action="logout.php">
		<button type="submit">Logout</button>
    </form>
  </div>
</div>
</body>
</html>
<?php
	}
	elseif($_SESSION['level'] == "Member"){
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="headerStyle.css">
</head>
<body>
<div class="topnav">
  <a href="index1.php">Home</a>
  <a href="registration.php">Registration</a>
  <a href="facilites.php">Services & Facilities</a>
  <a href="testimonials.php">Testimonials</a>
  <a href="day_details.php">Day details</a>
  <a href="testimonials_add.php">Testimonial Add</a>
  <a href="contact.php">Contact Us</a>
  <div class="login-container">
    <form action="logout.php">
		<button type="submit">Logout</button>
    </form>
  </div>
</div>
</body>
</html>
<?php
	}
	elseif($_SESSION['level'] == "Admin"){
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="headerStyle.css">
<script type="text/javascript" src="adminHeader.js"></script>
</head>
<body>
<div class="topnav">
	<div class="dropdown">
		<button class="dropbtn" onclick="HomePages()">Home Pages</button>
		<div class="dropdown-content" id="homeDropdown">
			<a href="index1.php">Home</a>	
			<a href="indexPage_Edit.php">Home Edit</a>
		</div>
	</div>  
	<div class="dropdown">
		<button class="dropbtn" onclick="regPages()">Registration Pages</button>
		<div class="dropdown-content" id="regDropdown">
			<a href="registration.php">Registration</a>
			<a href="registration_edit.php">Registration Edit</a>
		</div>
	</div>
	<a href="facilites.php">Services & Facilities</a>
	<div class="dropdown">
		<button class="dropbtn" onclick="testimonialPages()">Testimonial Pages</button>
		<div class="dropdown-content" id="testimonialDropdown">
			<a href="testimonials.php">Testimonials</a>
			<a href="testimonials_add.php">Testimonial Add</a>
			<a href="testimonials_manage.php">Testimonials Manage</a>
		</div>
	</div>
	<div class="dropdown">
		<button class="dropbtn" onclick="dayPages()">Day Pages</button>
		<div class="dropdown-content" id="dayDropdown">
			<a href="day_details.php">Day details</a>
			<a href="day_details_edit.php">Day details Edit</a>
		</div>
	</div>
	<div class="dropdown">
		<button class="dropbtn" onclick="contactPages()">Contact Pages</button>
		<div class="dropdown-content" id="contactDropdown">
			<a href="contact.php">Contact Us</a>
			<a href="contact_us_manage.php">Contact Us Manage</a>
		</div>
	</div>	
  <div class="login-container">
    <form action="logout.php">
		<button type="submit">Logout</button>
    </form>
  </div>
</div>
<style>
.dropdown {
  float: left;
  overflow: hidden;
}

.dropdown .dropbtn {
  cursor: pointer;
  font-size: 16px;  
  border: none;
  outline: none;
  color: black;
  padding: 14px 16px;
  background-color: inherit;
  font-family: inherit;
  margin: 0;
}

.topnav a:hover, .dropdown:hover .dropbtn, .dropbtn:focus {
   background-color: #ddd;
  color: black;
}

.dropdown-content {
  display: none;
  position: fixed;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  float: none;
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.dropdown-content a:hover {
  background-color: #ddd;
}

.show {
  display: block;
}
</style>
</body>
</html>
<?php
	}
	}else{
		header("Location:login.html");
	}
	}
?>