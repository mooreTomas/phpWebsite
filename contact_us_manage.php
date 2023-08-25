<?php
	include "navigationPage.php";
	// admin pahe to delete/view messages sent via the Contact page
	
	if(!isset($_SESSION['loginStatus'])){
		$_SESSION['loginStatus'] = 0;
	}
	else
	{
		if($_SESSION['loginStatus'] == 1 && $_SESSION['level'] == "Admin"){	
			
		$sqlRead = "SELECT * FROM contact_us";
		$resultRead = mysqli_query($connDB, $sqlRead);
		
		if($resultRead)
		{
			$numRows = mysqli_num_rows($resultRead);
			echo"<br><h3>You have ", $numRows," messages </h3> <br>";
			
			while($row = mysqli_fetch_array($resultRead))
			{
				?>	
				
				<!DOCTYPE html>
				<html>
				<head>
				<link rel="stylesheet" href="pageStyle.css">
				</head>
				<body>
				<div class="form-container">
				  <form action="deleteMessage.php" method="POST">
					<div class="row">
					  <div class="col-25">
						<label for="name">Name: </label>
					  </div>
					  <div class="col-75">
						<input type="text" id="name" name="name" value="<?php echo $row['Name'];?>" readonly >
					  </div>
					</div>
					<div class="row">
					  <div class="col-25">
						<label for="email">Email:</label>
					  </div>
					  <div class="col-75">
						<input type="email" name="email" value="<?php echo $row['Email'];?>" readonly>
					  </div>
					</div>
					<div class="row">
					  <div class="col-25">
						<label for="phone">Telephone:</label>
					  </div>
					  <div class="col-75">
						<input type="text" name="phone" value="<?php echo $row['Phone'];?>" readonly >
					  </div>
					</div>
					<div class="row">
					  <div class="col-25">
						<label for="message">Message: </label>
					  </div>
					  <div class="col-75">
						<input type="text" name="message" style="height:200px " value="<?php echo $row['Message'];?>" readonly >
					  </div>
					</div>
					<div class="row">
					  <input type="submit" value="Delete" style="background:red">
					</div>
				  </form>
				</div>

				</body>
				</html>
				<?php
			}
			
		}
		else
		{
			echo "Read from database failed - please try again <br>";
		}
		mysqli_close($connDB);
		}
	}
	
?>