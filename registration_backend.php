<?php
    session_start(); 
    include "connect.php"; 
    if(!isset($_SESSION['loginStatus'])){
		$_SESSION['loginStatus'] = 0;
	}
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        if($connDB)
        {
            if($_POST['action'] == 'fee_edit'){
                $id = $_POST['id'];
                $value=$_POST['value'];
                $sql = "UPDATE services SET fee = '$value' WHERE id = '$id'";
                mysqli_query($connDB, $sql);
                return;
            } else {
                $user_id = $_SESSION['user_id'];
                $child_name = $_POST['child_name'];
                $category = $_POST['category'];
                $service_type = $_POST['service_type'];
                $duration = $_POST['duration'];
                $id = $_POST['id'];
                if($_POST['id'] == ''){
                    $sqlQuery1 = "INSERT INTO registration (`user_id`,`child_name`,`category`, `service_type`, `duration`) VALUES ('$user_id','$child_name','$category','$service_type','$duration')";
                    $resultQuery1 = mysqli_query($connDB, $sqlQuery1);
                } else {
                    $sqlQuery1 = "UPDATE registration SET `user_id` = '$user_id',`child_name` = '$child_name',`category`='$category', `service_type`='$service_type', `duration`='$duration' WHERE id='$id'";
                    $resultQuery1 = mysqli_query($connDB, $sqlQuery1);
                }
                header("Location:registration.php");
            }
        }
    }
?>