<?php
	include "navigationPage.php";
	// allows member to add a testimonial for the service to be viewable by everyone (including Public user) pending Admin approval
	
	
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
		$email = $_SESSION['email'];
		$sqlRead = "SELECT t0.*, t1.username FROM testimonials As t0 INNER JOIN user AS t1 ON t0.user_id = t1.id WHERE t1.email ='$email'";
		$resultRead = mysqli_query($connDB, $sqlRead);
		$sqlReadService = "SELECT * FROM  services";
		$resultService = mysqli_query($connDB, $sqlReadService);
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="pageStyle.css">
<link rel="stylesheet" href="testimonials.css">
<link rel="stylesheet" href="registration.css">
</head>
<body>
  <div class="testimonials-contanier">
    <div class="header">
      <button class="btn-primary" onclick="openModal(null)">Add Review</button>
    </div>
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
  <div class="modal-container">
    <div class="add-child-modal">
      <form id="review_form" action="testimonials_backend.php" method="post">
        <div class="form-group">
          <label>Services : </label>
          <select name="service_type" id="service" required>
            <?php 
              $numRows = mysqli_num_rows($resultService);
              if($numRows){
                  while($row = mysqli_fetch_array($resultService))
                  {
             ?>
             <option value="<?php echo $row['id'] ?>"><?php echo $row['name'].'('.$row['fee'].')' ?></option>
             <?php 
               }
              }
             ?>
          </select>
        </div>
        <div class="form-group">
          <label>Reviews : </label>
		  <textarea name="review" cols="30" rows="10"></textarea>
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
	  var services = <?php echo getServices($connDB); ?>;
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
	}
?>
