<?php
include "navigationPage.php";
	
	if(!isset($_SESSION['loginStatus'])){
		$_SESSION['loginStatus'] = 0;
	}
	else
	{
		if($_SESSION['loginStatus'] == 1 && $_SESSION['level'] == "Admin"){	
			
			echo"<br><h3>Add feature box</h3>";
		
			?>	
			<!DOCTYPE html>
			<html>
			<head>
			<link rel="stylesheet" href="pageStyle.css">
			</head>
			<body>
			<div class="form-container">
			  <form action="AddBox.php" method="POST">
				<div class="row">
				  <div class="col-25">
					<label for="image">Image: </label>
				  </div>
				  <div class="col-75">
					<input type="text" id="image" name="image" placeholder="e.g. exampleImage.png" required >
				  </div>
				</div>
				<div class="row">
				  <div class="col-25">
					<label for="title">Title:</label>
					 </div>
					 <div class="col-75">
					<input type="text" name="title" placeholder="e.g. Event" required>
				  </div>
				</div>
				<div class="row">
				  <div class="col-25">
					<label for="detail">Detail:</label>
				  </div>
				  <div class="col-75">
					<input type="text" name="detail" placeholder="e.g. Colour's Day" required >
				  </div>
				</div>						
				<div class="row">
				  <div class="col-25">
					<label for="content">Content: </label>
				  </div>
				  <div class="col-75">
				   <textarea class="longText" id="content" name="content" style="height:200px; min-width:400px;" placeholder="e.g. This will occur on the 5th July"  required ></textarea>
				  </div>
				</div>	
				<div class="row">
				  <div class="col-25">
					<label for="link">Link: </label>
				  </div>
				  <div class="col-75">
				   <input type="text" name="link" placeholder="e.g. contact.php" required >
				   </div>
				</div>
				<div class="row">
				  <div class="col-25">
					<label for="linkText">LinkText: </label>
				  </div>
					<div class="col-75">
					  <input type="text" name="linkText" placeholder="e.g. For more info contact us" required >
				   </div>
				</div>
				<div class="row">
				  <input type="submit" value="Add" style="background:purple">
				</div>
			  </form>
			</div>
			</body>
			</html>
			<?php
			
			$sqlRead = "SELECT * FROM feature_box";
			$resultRead = mysqli_query($connDB, $sqlRead);
			
			if($resultRead)
			{				
				echo"<br><h3>Current feature box/'es </h3>";
				
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
					  <form action="deleteBox.php" method="POST">
						<div class="row">
						  <div class="col-25">
							<label for="image">Image: </label>
						  </div>
						  <div class="col-75">
							<input type="text" id="image" name="image" value="<?php echo $row['image'];?>" readonly >
						  </div>
						</div>
						<div class="row">
						  <div class="col-25">
							<label for="title">Title:</label>
						  </div>
						  <div class="col-75">
							<input type="text" name="title" value="<?php echo $row['title'];?>" readonly>
						  </div>
						</div>
						<div class="row">
						  <div class="col-25">
							<label for="detail">Detail:</label>
						  </div>
						  <div class="col-75">
							<input type="text" name="detail" value="<?php echo $row['detail'];?>" readonly >
						  </div>
						</div>
						<div class="row">
						  <div class="col-25">
							<label for="content">Content: </label>
						  </div>
						  <div class="col-75">
						   <textarea class="longText" id="content" name="content" style="height:200px; min-width:400px;" placeholder="<?php echo $row['content'];?>"  readonly ></textarea>
						  </div>
						</div>
						<div class="row">
						  <div class="col-25">
							<label for="link">Link: </label>
						  </div>
						  <div class="col-75">
						   <input type="text" name="link" value="<?php echo $row['link'];?>" readonly >
						   </div>
						</div>
						<div class="row">
						  <div class="col-25">
							<label for="linkText">LinkText: </label>
						  </div>
						  <div class="col-75">
						   <input type="text" name="linkText" value="<?php echo $row['linkText'];?>" readonly >
						   </div>
						</div>
						<div class="row">
						  <input type="text" value="<?php echo $row['title'];?>" name="updateThisField" style="display:none">
						</div>
						<div class="row">
							<input type="submit" value="Delete" name="btn" style="background:red">							
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
			
		}
	}
	
?>