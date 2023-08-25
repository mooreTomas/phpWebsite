<!--day_details  	
Show an attractively formatted table for one row of the day table.
Parents can only see their child data,
they can filter a day. Admin can filter all children and all days.  	Member & Admin  -->
<?php
	include "navigationPage.php";
	
	if(!isset($_SESSION['loginStatus'])){
		$_SESSION['loginStatus'] = 0;
	}
	else
	{
		if($_SESSION['loginStatus'] == 1){
			$user_id = $_SESSION['user_id'];
				
			$sqlRead = "SELECT t0.*, t1.child_name AS `Name` FROM day AS t0 INNER JOIN registration AS t1 ON t0.child_id = t1.id WHERE t1.user_id='$user_id'";
			$resultRead = mysqli_query($connDB, $sqlRead);
	
			?>		
			<html>
			<head>
			<link rel="stylesheet" href="pageStyle.css">
			</head>
			<body>
				<div class="day-container">
					<?php
					echo "<table border='1'  class='center'>

					<tr>
					<th>Name</th>
					<th>Temperature</th>
					<th>Breakfast</th>
					<th>Lunch</th>
					<th>Activities</th>
					<th>Date</th>
					</tr>";

					while($row = mysqli_fetch_array($resultRead))
					{
					echo "<tr>";

					echo "<td>" . $row['Name'] . "</td>";
					echo "<td>" . $row['Temperature'] . "</td>";
					echo "<td>" . $row['Breakfast'] . "</td>";
					echo "<td>" . $row['Lunch'] . "</td>";
					echo "<td>" . $row['Activities'] . "</td>";
					echo "<td>" . $row['date'] . "</td>";
					echo "</tr>";

					}

					echo "</table>";

					?>
				</div>
			<form action="filteredDate.php" method="GET">
			<label for="date">Filter by Date: </label>
					<input type="text" name="date" min="10" required><br><br>
					<input type="submit" value="Filter" style="background:green">
			</form>
			</body>
			</html>		
			<?php
		}
		else
		{
			echo "Read from database failed - please try again <br>";
		}
		mysqli_close($connDB);
		}	
?>