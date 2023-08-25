<?php
session_start(); 
include "connect.php"; 
if(!isset($_SESSION['loginStatus'])){
		$_SESSION['loginStatus'] = 0;
	}

if($_SERVER['REQUEST_METHOD'] == "POST")
{
	//No validation as tags, blank spaces and apostrophes are neccessary
	$image = ($_POST['image']);
	$title = ($_POST['title']);
	$detail = ($_POST['detail']);
	$content = $_POST['content'];
	$link = ($_POST['link']);
	$linkText = ($_POST['linkText']);
	
	if($connDB)
	{
		$sqlAddEntry = "INSERT INTO `feature_box`(`image`, `title`, `detail`, `content`, `link`, `linkText`) VALUES ('$image','$title','$detail','$content','$link','$linkText');";
					
		// Execute the sql query
		$query = mysqli_query($connDB, $sqlAddEntry);
		
		if ($query)
		{ 
			header("Location:indexPage_Edit.php");
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