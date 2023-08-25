<?php
session_start(); 
include "connect.php"; 

function userLevelCheck($userLevel){	
	if($userLevel== "PublicUser"){
		return "Public";
	}
	elseif($userLevel== "MemberUser"){
		return "Member";
	}
	elseif($userLevel== "AdminUser"){
		return "Admin";
	}
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
	$email = pass_input($_POST['email']);
	$pass = pass_input($_POST['password']);
	$pass = sha1($pass);
	
	$userLevel = ($_POST['btn']);
	
	$level = userLevelCheck($userLevel);
	
	
	if(!empty($_POST['email']&&!empty($_POST['password'])))
	{
		if($connDB)
		{
			//Verify that the username and password entered are the same as the ones in the database
			
			//Check is the username exists in the table 
			$sqlQuery1 = "SELECT * FROM user WHERE email='$email' AND userlevel='$level'";
			
			//Execute the query
			$resultQuery1 = mysqli_query($connDB, $sqlQuery1);
			
			if(mysqli_num_rows($resultQuery1)>0)
			{
				//Check if the password matches that stored in the database
				$row = mysqli_fetch_array($resultQuery1);
				
				//Extract the password for the user from the database
				$passwordDB = $row['password'];
				
				//Compare the db password with the inputted one
				if($pass == $passwordDB)
				{
					echo "Login Successful<br> <br>";
					
					//Create session variables
					$_SESSION['user'] = $row['username'];
					$_SESSION['email'] = $row['email'];
					$_SESSION['user_id'] = $row['id'];
					$_SESSION['loginStatus'] = 1;
					$_SESSION['level'] = $level;
					
					//Go to Home page
					header("Location:index1.php");
					
				}else
				{
					echo "Password incorrect - please try again<br>";
					$_SESSION['loginStatus'] = 0;
				}
			}
			else
			{
				echo"This email is not registered <br>";
			}
			
		}else
		{
			echo"Connection to database unsuccessful! <br>",mysqli_connect_error,"<br>";
		}
	}
}


?>