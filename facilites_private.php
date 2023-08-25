<?php
	include "navigationPage.php";
	// not accesible to public, must be member to view this page
	
	if(!isset($_SESSION['loginStatus'])){
		$_SESSION['loginStatus'] = 0;
	}
	else
	{
		if($_SESSION['loginStatus'] == 1){	
	
?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
    integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="facilites.css">
  <title>Hello, world!</title>
</head>

<body>

  <div class="container mt-5">
    <div class="row m-0">
      <div class="col-lg-6 col-12"><img class="img-fluid"
          src="https://images.pexels.com/photos/3006119/pexels-photo-3006119.jpeg?auto=compress&cs=tinysrgb&dpr=3&h=750&w=1260"
          alt="">
          <h3 class="fac-h1"><span>We teach our preschoolers teamwork and soccer skills with a qualified soccer coach once a week at the local club</span> </h3>
        </div>
      <div class="col-lg-6 col-12">
        <img class="img-fluid"
          src="https://images.pexels.com/photos/296301/pexels-photo-296301.jpeg?auto=compress&cs=tinysrgb&h=750&w=1260"
          alt="">
          <h3 class="fac-h1"><span>We don’t just play soccer on the local pitch, there are games for everyone</span> </h3>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns"
    crossorigin="anonymous"></script>


</body>

</html>
<?php
    }
  }
?>