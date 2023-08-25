<?php
    session_start(); 
    include "connect.php"; 
    if(!isset($_SESSION['loginStatus'])){
		$_SESSION['loginStatus'] = 0;
	}
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        if($connDB)
        {
            $user_id = $_SESSION['user_id'];
            $child_id = $_POST['child_id'];
            $Temperature = $_POST['Temperature'];
            $Breakfast = $_POST['Breakfast'];
            $Lunch = $_POST['Lunch'];
            $date = $_POST['date'];
            $Activities  = $_POST['Activities'];
            $sqlQuery1 = "INSERT INTO `day` (child_id,Temperature,BreakFast,Lunch,Activities,`date`) VALUES ('$child_id','$Temperature','$Breakfast','$Lunch','$Activities','$date')";
            $resultQuery1 = mysqli_query($connDB, $sqlQuery1);
            header("Location:day_details_edit.php");
        }
    }
?>