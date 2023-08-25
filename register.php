<?php
session_start(); 
include "connect.php"; 

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
	$user = pass_input($_POST['username']);
	$email = pass_input($_POST['email']);
	$pass = pass_input($_POST['password']);
	$pass = sha1($pass);
	
	
	if(!empty($_POST['username']&&!empty($_POST['email'])&&!empty($_POST['password'])))
	{
		if($connDB)
		{
			$sqlQuery1 = "SELECT * FROM user WHERE email='$email' ";
			
			$resultQuery1 = mysqli_query($connDB, $sqlQuery1);
			
			if(mysqli_num_rows($resultQuery1)==0)
			{
				
				$sqlQuery1 = "INSERT INTO `user` (email,username, PASSWORD, userlevel) VALUES ('$email','$user','$pass','Member')";
				mysqli_query($connDB, $sqlQuery1);

				$_SESSION['user'] = $user;
				$_SESSION['email'] = $email;
				$_SESSION['loginStatus'] = 1;
				$_SESSION['level'] = 'Member';
				
				header("Location:index1.php");
			}
			else
			{
				echo"This email is already used! Use another email! <br>";
			}
			
		}else
		{
			echo"Connection to database unsuccessful! <br>",mysqli_connect_error,"<br>";
		}
	}
}


?>