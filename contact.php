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
<div class="form-container">
  <form action="messages.php" method="POST">
    <div class="row">
      <div class="col-25">
        <label for="name">Name: </label>
      </div>
      <div class="col-75">
        <input type="text" id="name" name="name" placeholder="Your name.." required >
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="email">Email:</label>
      </div>
      <div class="col-75">
        <input type="email" name="email" placeholder="Your email.." required >
      </div>
    </div>
	<div class="row">
      <div class="col-25">
        <label for="phone">Telephone:</label>
      </div>
      <div class="col-75">
        <input type="text" name="phone" placeholder="Your phone number.." required >
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="message">Message: </label>
      </div>
      <div class="col-75">
        <textarea id="message" name="message" placeholder="Enter message here.." style="height:200px" required ></textarea>
      </div>
    </div>
    <div class="row">
      <input type="submit" value="Submit">
    </div>
  </form>
</div>

</body>
</html>
<?php
	}
	}
?>
