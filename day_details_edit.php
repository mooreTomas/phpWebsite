
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
			$sqlRead = "SELECT t0.*, t1.child_name AS `Name` FROM day AS t0 INNER JOIN registration AS t1 ON t0.child_id = t1.id";
			$resultRead = mysqli_query($connDB, $sqlRead);

			$sql = "SELECT * FROM registration";
			$childs = mysqli_query($connDB, $sql);
	
			?>		
			<html>
			<head>
			<link rel="stylesheet" href="pageStyle.css">
			<link rel="stylesheet" href="registration.css">
			</head>
			<body>
				<div class="day-container">
					<div class="header center">
					<button class="btn-primary" onclick="openModal(null)">Add</button>
					</div>
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
			<label for="date">Filter by Date & Child: </label>
					<input type="text" name="date" placeholder="Date" min="10" required><br><br>
					<input type="text" name="child" placeholder="Childs Name"><br><br>
					<input type="submit" value="Filter" style="background:green">
			</form>
			<div class="modal-container">
				<div class="add-child-modal">
				<form id="review_form" action="day_detail_backend.php" method="post">
					<div class="form-group">
					<label>Childs : </label>
					<select name="child_id" id="childs" required>
						<?php 
							while($row = mysqli_fetch_array($childs))
							{

						?>
						<option value="<?php echo $row['id'] ?>"><?php echo $row['child_name']; ?></option>
						<?php 
							}
						?>
					</select>
					</div>
					<div class="form-group">
						<label>Temperature : </label>
						<input type="text" name="Temperature" required></input>
					</div>
					<div class="form-group">
						<label>Breakfast : </label>
						<input type="text" name="Breakfast" required></input>
					</div>
					<div class="form-group">
						<label>Lunch : </label>
						<input type="text" name="Lunch" required></input>
					</div>
					<div class="form-group">
						<label>Activities : </label>
						<input type="text" name="Activities" required></input>
					</div>
					<div class="form-group">
						<label>Date : </label>
						<input type="date" name="date" required></input>
					</div>
					<div class="modal-footer">
					<button type="button" class="modal-footer-btn btn-default" onclick="cancelModal()">Cancel</button>
					<button type="submit" class="modal-footer-btn btn-primary">Save</button>
					</div>
				</form>
				</div>
			</div>
			<script src="jquery.min.js"></script>
			<script>
				function openModal(params) {
					if(params){
						Object.getOwnPropertyNames(params).map((e) => {
						tag = $('.add-child-modal').find("[name="+e+"]");
						if(tag) {
							tag.val(params[e]);
						}
						})
					}
					$(".add-child-modal").show(200);
				}
				function cancelModal(){
				$(".add-child-modal").find("[name=id]").eq(0).val('');
				$(".add-child-modal").find("[name=child_name]").eq(0).val('');
				$(".add-child-modal").find("[name=category]").eq(0).val('Baby');
				$(".add-child-modal").find("[name=service_type]").eq(0).val('Half day care');
				$(".add-child-modal").find("[name=duration]").eq(0).val('');
				$(".add-child-modal").hide(200);
				}
			</script>
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