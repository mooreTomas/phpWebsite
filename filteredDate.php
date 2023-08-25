<?php
include "navigationPage.php";
if(!isset($_SESSION['loginStatus'])){
		$_SESSION['loginStatus'] = 0;
	}

if($_SERVER['REQUEST_METHOD'] == "GET")
{
	$date = pass_input($_GET['date']);
	
	if($connDB)
	{
		if($_SESSION['level'] == "Member"){	
		$user_id = $_SESSION['user_id'];

		$sql = "SELECT t0.*, t1.child_name AS `Name` FROM DAY AS t0 INNER JOIN registration AS t1 ON t0.child_id = t1.id WHERE t1.user_id='$user_id' AND t0.date = '$date'";
		if ($result=mysqli_query($connDB, $sql))
		{ 
			?>		
				<html>
				<head>
				<link rel="stylesheet" href="pageStyle.css">
				</head>
				<body>
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

				while($row = mysqli_fetch_array($result))
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
				<button onclick="location.href='day_details.php';" style="float:right; width:200px; padding:20px; margin:50px;">See all Entries</button>
				</body>
				</html>				

				<?php
			
		}
		}elseif($_SESSION['level']=="Admin"){
			
			$child = $_GET['child'];
			
			if(isset($_GET['child']) && !empty($_GET['child'])){
				$sqlRead = "SELECT t0.*, t1.child_name AS Name FROM `day` AS t0 INNER JOIN registration AS t1 ON t1.id = t0.child_id WHERE t1.child_name LIKE '%$child%' AND t0.date = '$date' ";
				$resultRead = mysqli_query($connDB, $sqlRead);
		
				?>		
				<html>
				<head>
				<link rel="stylesheet" href="pageStyle.css">
				</head>
				<body>
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
				<button onclick="location.href='day_details.php';" style="float:right; width:200px; padding:20px; margin:50px;">See all Entries</button>
				</body>
				</html>				
			<?php
			} else {
				$sql = "SELECT * FROM day WHERE date='$date'";
					
		if ($result=mysqli_query($connDB, $sql))
		{ 
			?>		
				<html>
				<head>
				<link rel="stylesheet" href="pageStyle.css">
				</head>
				<body>
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

				while($row = mysqli_fetch_array($result))
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
				<button onclick="location.href='day_details.php';" style="float:right; width:200px; padding:20px; margin:50px;">See all Entries</button>
				</body>
				</html>				

				<?php
			}
			
			
		
		}
		mysqli_close($connDB);
	}
	else
	{
		echo"Connection to database unsuccessful! <br>",mysqli_connect_error,"<br>";
	}		
}
}

?>
