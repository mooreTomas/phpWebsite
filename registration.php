<?php
	include "navigationPage.php";
	
	// member can view the children they have registered with the service here
	
  function getServiceText($connDB,$id) {
    $sql = "SELECT * FROM  services WHERE id='$id' LIMIT 1";
    $result = mysqli_query($connDB, $sql);
    while($row = mysqli_fetch_array($result)){
      return $row['name'].'(€'.$row['fee'].' per week)';
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
      $user_id = $_SESSION['user_id'];
      $sqlRead = "SELECT * FROM registration WHERE user_id ='$user_id'";
      $resultRead = mysqli_query($connDB, $sqlRead);
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
    <div class="header">
      <button class="btn-primary" onclick="openModal(null)">Add child</button>
    </div>
    
    <div class="child-item header-item">
      <div class="name"><b>Name</b></div>
      <div class="category"><b>Category</b></div>
      <div class="service"><b>Service Type</b></div>
      <div class="duration"><b>Duration(Weeks)</b></div>
    </div>
    <?php 
			$numRows = mysqli_num_rows($resultRead);
      if($numRows){
          while($row = mysqli_fetch_array($resultRead))
          {
        ?>
          <div class="child-item">
            <div class="name"><?php echo $row['child_name'];?></div>
            <div class="category"><?php echo $row['category'];?></div>
            <div class="service_type"><?php echo getServiceText($connDB,$row['service_type']);?></div>
            <div class="duration"><?php echo $row['duration'];?></div>
            <div><button class="btn-primary" onclick='openModal(<?php echo json_encode($row); ?>)'>Edit</button></div>
          </div>
        <?php 
          }
        }
      else {
      ?>
        <div class="child-item">You haven't registered any children.</div>
      <?php 
        }
      ?>
  </div>
  <div class="modal-container">
    <div class="add-child-modal">
      <form id="register_form" action="registration_backend.php" method="post">
        <div class="form-group">
          <label>Total Cost : </label>
          <input type="text" id="total_cost" disabled>
        </div>
        <div class="form-group">
          <label>Name : </label>
          <input type="text" name="child_name" placeholder="Enter your children's name" required>
        </div>
        <div class="form-group">
          <label>Categories : </label>
          <select name="category" id="category" required>
            <option value="Baby">Baby</option>
            <option value="Wobblers">Wobblers</option>
            <option value="Toddlers">Toddlers</option>
            <option value="Preschool">Preschool</option>
          </select>
        </div>
        <div class="form-group">
          <label>Services : </label>
          <select name="service_type" id="service" required>
            <?php 
              $numRows = mysqli_num_rows($resultService);
              if($numRows){
                  while($row = mysqli_fetch_array($resultService))
                  {
             ?>
             <option value="<?php echo $row['id'] ?>"><?php echo $row['name'].'(€'.$row['fee'].' per week)' ?></option>
             <?php 
               }
              }
             ?>
          </select>
        </div>
        <div class="form-group">
          <label>Duration(Weeks) : </label>
          <input type="number" name="duration" id="duration" value="1" required>
        </div>
        <input type="text" hidden name="id">
        <div class="modal-footer">
          <button type="button" class="modal-footer-btn btn-default" onclick="cancelModal()">Cancel</button>
          <button type="button" class="modal-footer-btn btn-primary" onmousedown="post()">Save</button>
        </div>
      </form>
    </div>
  </div>
	<script src="https://smtpjs.com/v3/smtp.js"></script>
  <script src="jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
  <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
  <script>
	  var services = <?php echo getServices($connDB); ?>;
    jQuery.validator.setDefaults({
      debug: true,
      success: "valid"
    });
		function post() { // function to send email confirmation once member registers a child for a service
      var form = $( "#register_form" ).eq(0);
      if(form.valid()){
        Email.send({
        	Host: "smtp.gmail.com",
        	Username : "griffithchildcare@gmail.com",
        	Password : "PasswordSWDEmail1234",
        	To : "<?php echo $_SESSION['email']; ?>",
        	From : "griffithchildcare@gmail.com",
        	Subject : "Registration Confirmation",
        	Body : "Hi, this email is to inform you that have successfully registered your child with Griffith Childcare.",
        })
        .then(function(message){
          var formdata = form.serializeArray();
          var submitData = {};
          for (let index = 0; index < formdata.length; index++) {
            submitData[formdata[index].name] = formdata[index].value;         
          }
          $.ajax({
            url:'registration_backend.php',
            type:'post',
            data:submitData,
            success:function (){
              location.reload();
            }
          })
        });
      }
      
		}
    function openModal(params){
      if(params){
        Object.getOwnPropertyNames(params).map((e) => {
          tag = $('.add-child-modal').find("[name="+e+"]");
          if(tag) {
            tag.val(params[e]);
          }
        })
      }
      var selectedService = services.find((e) => e.id === $('#service').val());
      var duration = parseInt($('#duration').val());
      $('#total_cost').val('€'+parseInt(selectedService.fee)*duration);
      $(".add-child-modal").show(200);
    }
    function cancelModal(){
      $(".add-child-modal").find("[name=id]").eq(0).val('');
      $(".add-child-modal").find("[name=child_name]").eq(0).val('');
      $(".add-child-modal").find("[name=category]").eq(0).val('Baby');
      $(".add-child-modal").find("[name=service_type]").eq(0).val(services[0].id);
      $(".add-child-modal").find("[name=duration]").eq(0).val(1);
      $(".add-child-modal").hide(200);
    }
    $(document).ready(function() {
      $('#service').on('change',function() {
        var selectedService = services.find((e) => e.id === $('#service').val());
        var duration = parseInt($('#duration').val());
        $('#total_cost').val('€'+parseInt(selectedService.fee)*duration);
      })
      $('#duration').on('change',function() {
        var selectedService = services.find((e) => e.id === $('#service').val());
        var duration = parseInt($('#duration').val());
        $('#total_cost').val('€'+parseInt(selectedService.fee)*duration);
      })
    })
  </script>
</body>
</html>
<?php
	}
	}
?>
