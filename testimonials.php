<?php
	include "navigationPage.php";
	
	function getServiceText($connDB,$id) {
		$sql = "SELECT * FROM  services WHERE id='$id' LIMIT 1";
		$result = mysqli_query($connDB, $sql);
		while($row = mysqli_fetch_array($result)){
		  return $row['name'].'('.$row['fee'].')';
		}
	}
	function getServices($connDB) {
		$sql = "SELECT * FROM  services";
		$result = mysqli_query($connDB, $sql);
		$services = [];
		while($row = mysqli_fetch_array($result)){
		  array_push($services,$row);
		}
		return json_encode($services);
	  }
	if(!isset($_SESSION['loginStatus'])){
		$_SESSION['loginStatus'] = 0;
	}
	else
	{
		if($_SESSION['loginStatus'] == 1){	
		$username = $_SESSION['user'];
		$sqlRead = "SELECT t0.*, t1.username FROM testimonials As t0 LEFT JOIN user AS t1 ON t0.user_id = t1.id WHERE t0.is_show =1";
		$resultRead = mysqli_query($connDB, $sqlRead);
		$sqlReadService = "SELECT * FROM  services";
		$resultService = mysqli_query($connDB, $sqlReadService);
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="pageStyle.css">
<link rel="stylesheet" href="testimonials.css">
</head>
<body>
  <div class="testimonials-contanier">
    <div class="child-item header-item">
      <div class="service"><b>Service</b></div>
      <div class="review"><b>Review</b></div>
			<div class="space"></div>
      <div class="user"><b>User</b></div>
    </div>
    <?php 
		$numRows = mysqli_num_rows($resultRead);
        if($numRows){
          while($row = mysqli_fetch_array($resultRead))
          {
        ?>
          <div class="child-item">
            <div class="service"><?php echo getServiceText($connDB,$row['service_id']);?></div>
            <div class="review"><pre><?php echo $row['review'];?></pre></div>
			<div class="space"></div>
            <div class="user"><?php echo $row['username'];?></div>
          </div>
        <?php 
          }
        }
      else {
      ?>
        <div class="child-item">There is no Reviews.</div>
      <?php 
        }
      ?>
  </div>
  <script src="jquery.min.js"></script>
  <script>
	  var services = <?php echo getServices($connDB); ?>;
  </script>
</body>
</html>

<?php
	}
	}
?>
