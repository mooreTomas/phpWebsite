<?php 
session_start(); 
include "connect.php"; 
if(!isset($_SESSION['loginStatus'])){
		$_SESSION['loginStatus'] = 0;
	}

function pass_input($data)
	{
		$data = trim($data);
		$data = stripslashes($data);
		$data = strip_tags($data);
		$data = htmlentities($data);
		$data = htmlspecialchars($data);
		return $data;
	}

if($_SERVER['REQUEST_METHOD'] == "POST")
{
	$name = pass_input($_POST['name']);
	$email = pass_input($_POST['email']);
	$phone = pass_input($_POST['phone']);
	$message = pass_input($_POST['message']);
	
	$email = filter_var($email, FILTER_SANITIZE_EMAIL);
	
	if(filter_var($email, FILTER_VALIDATE_EMAIL))
	{
		if($connDB)
		{
		$sqlAddEntry = "INSERT INTO contact_us(Name, Email, Phone, Message) 
		VALUES('$name', '$email', '$phone', '$message')";
					
		// Execute the sql query
		$query = mysqli_query($connDB, $sqlAddEntry);
					
		// Inform user if query execution was unsuccessful
		if(!$query)
		{
			echo "An error occured - please try again <br>";
			echo mysqli_error($connDB);
		}
		else
		{
?>
			<!DOCTYPE html>
			<html>
			<head>
			<link rel="stylesheet" href="login.css">
			</head>
			<body>

			<div class="btn-group" align="center">
				<div class="button-content">
				<p><?php 
				echo "<h2>Message Successfully Added</h2>Name: $name <br><br>Email: $email <br><br>Phone No: $phone <br><br>Message: $message <br> <br>";		
				?></p>
				<button onclick="location.href='index1.php';">HomePage</button>
				</div>
			</div>
			</body>
			</html>
			<?php
		}
		mysqli_close($connDB);
		}
		else
		{
			echo"Connection to database unsuccessful! <br>",mysqli_connect_error,"<br>";
		}
	}	
	else
	{
		header("Location:contact.php");
	}
	
}
?>