<?php
    session_start(); 
    include "connect.php"; 
    if(!isset($_SESSION['loginStatus'])){
		$_SESSION['loginStatus'] = 0;
	}
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        // print_r($_POST['user_id']);
        if($connDB)
        {
            if($_POST['action'] == 'update'){
                $id = $_POST['id'];
                $type=$_POST['type'];
                $sql = "UPDATE testimonials SET is_show = '$type' WHERE id = '$id'";
                mysqli_query($connDB, $sql);
                return;
            } else {
                $user_id = $_SESSION['user_id'];
                $service_type = $_POST['service_type'];
                $review = $_POST['review'];
                $sqlQuery1 = "INSERT INTO testimonials (`user_id`,`service_id`,`review`) VALUES ('$user_id','$service_type','$review')";
                $resultQuery1 = mysqli_query($connDB, $sqlQuery1);
                // echo $user_id;
                header("Location:testimonials_add.php");
            }
        }
    }
?>