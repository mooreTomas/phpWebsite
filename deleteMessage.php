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
	$message = pass_input($_POST['message']);
	
	if($connDB)
	{
		$sql = "DELETE FROM contact_us WHERE Message='$message'";
					
		if ($result=mysqli_query($connDB, $sql))
		{ 
			header("Location:contact_us_manage.php");
		}
		else
		{
			echo "An error occured - please try again <br>";
			echo mysqli_error($connDB);	
		}
		mysqli_close($connDB);
	}
	else
	{
		echo"Connection to database unsuccessful! <br>",mysqli_connect_error,"<br>";
	}		
}
?>