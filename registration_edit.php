<?php
	include "navigationPage.php";
	// // allows Member to register a child under a particular category and select duration of stay required, calculates total cost
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
      $sqlReadService = "SELECT * FROM  services";
      $resultService = mysqli_query($connDB, $sqlReadService);
      // var_dump($resultRead);
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="pageStyle.css">
<link rel="stylesheet" href="registration.css">
</head>
<body>
  <div class="registration-container">
    <div class="category-item category-item-header">
      <div class="name"><b>Name</b></div>
      <div class="fee"><b>Fee</b></div>
      <div class="action"></div>
    </div>
    <?php 
      $numRows = mysqli_num_rows($resultService);
      if($numRows){
          while($row = mysqli_fetch_array($resultService))
          {
    ?>
    <div class="category-item">
      <div class="name"><?php echo $row['name'] ?></div>
      <div class="fee"><input id=<?php echo "service-".$row['id'] ?> value=<?php echo $row['fee'] ?> type="number" min="0" /></div>
      <div class="action"><button class="btn-primary" onclick="save(<?php echo $row['id'] ?>)">Save</button></div>
    </div>
    <?php
          }
        }
    ?>
  </div>
  <script src="jquery.min.js"></script>
  <script>
    function save(id) {
      $.ajax({
        type:'post',
        url:'registration_backend.php',
        data:{
          value:$(`#service-${id}`).val(),
          id:id,
          action:'fee_edit'
        },
        success:function() {
          location.reload();
        }
      })
    }
    $(document).ready(function () {
    
    })
  </script>
</body>
</html>
<?php
	}
	}
?>
