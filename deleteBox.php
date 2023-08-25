<?php
session_start(); 
include "connect.php"; 
if(!isset($_SESSION['loginStatus'])){
		$_SESSION['loginStatus'] = 0;
	}

if($_SERVER['REQUEST_METHOD'] == "POST")
{
	$title = $_POST['title'];
	$detail = $_POST['detail'];
	
	if($connDB)
	{	
			$sql = "DELETE FROM feature_box WHERE title='$title' AND detail='$detail'";
			
			$query = mysqli_query($connDB, $sql);
			
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