<?php
	include "navigationPage.php";
	
	if(!isset($_SESSION['loginStatus'])){
		$_SESSION['loginStatus'] = 0;
	}
	else
	{
		if($_SESSION['loginStatus'] == 1){	
	
?>
<!DOCTYPE html>
<html>
<head>

<link rel="stylesheet" href="pageStyle.css">
</head>
<body>  
  <div class="grid-container-image">
	<div id="outer" style="overflow: hidden;">
     <!-- <img src="images/Homepage.png" alt="Children" />-->
	</div>
	<section class="imgdesc">
			<h1>Griffith  Kids</h1>
			<p><br>Griffith Kids is owned and operated by Griffith Childcare Ltd. All of our employees are qualified childcare assistants and are committed to helping your child in their first few years.</p>
			<p>We have a unique environment where your children can discover their talents, gain independence, and develop socially and emotionally.</p>
			<p>We will encourage your children to participate in all the activities we provide, such as handicrafts, cooking, scientific experiments, daily outdoor activities, and lifelong learning skills such as singing, communication and music.</p>
			<p>We take our responsibilities very seriously, and we know that we play a key role in helping to create the adults of the future. Why not call yourself to see, please contact us to arrange a visit or to learn about any of the services we provide.</p>
			<br><br>
	</section>
	</div>  

	
	<div class="wrapper">
	<h2>Info Section</h2>
	<div class="feature">
	<?php
	$sqlRead = "SELECT * FROM feature_box";
		$resultRead = mysqli_query($connDB, $sqlRead);
		
		if($resultRead)
		{
			
			while($row = mysqli_fetch_array($resultRead))
			{
				
				$folder_path = 'http://localhost/project/'.$row['link'];				
				$imageSource='http://localhost/project/images/'.$row['image'];
				?>					
					<div class="feature_member">
						<div class="feature_img">
							<?php echo "<img src=".$imageSource." alt='feature_image'>";?>
						</div>
					
						<h3><?php echo$row['title'];?></h3>
						<p class="role"><?phpecho$row['detail'];?></p>
						<p class="notice"><?php echo$row['content'];?></p> 
						<?php echo "<a href=".$folder_path.">",$row['linkText'],"</a>";?>
					</div>
				<?php
			}
			
		}
	?>
	</div>
	</div>	
</body>
</html>
<?php
	}
	}
?>

