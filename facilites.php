<?php
	include "navigationPage.php";
	
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
          src="https://images.pexels.com/photos/159823/kids-girl-pencil-drawing-159823.jpeg?auto=compress&cs=tinysrgb&h=750&w=1260"
          alt=""></div>
      <div class="col-lg-6 col-12 fac-text">
        <h1 class="fac-h1"><span>Services and Facilities</span> </h1>
        <p>We offer a range of services in Griffith Childcare. Not only do we offer full daycare all week long, but we
          also offer half day (8-12) care. For those working on weekends, we also offer full daycare on weekends too!
        </p>
        <p>As far as facilities go, we have adequate parking, safe enclosed play area for children and specials needs
          ready bathrooms.</p>
      </div>
    </div>
  </div>
  <div class="container mt-5">
    <div class="row m-0 mb-5">
      <h3 class="fac-h1 text-center col-12 mt-4 pb-3"><span>Check out some of our daily activities!</span> </h3>
      <a href="">
        <div class="col-lg-4 col-md-2 col-12">
          <div class="card fac-card">
            <img src="images/1.jpeg" class="card-img-top" alt="...">
            <div class="card-body">
  
              <p class="card-text text-center"><a href="#"> Colouring and art projects! </a></p>
  
            </div>
          </div>
        </div>
      </a>
      
      <div class="col-lg-4 col-md-2 col-12">
        <?php
		      if($_SESSION['level'] == "Public"){
         ?>
          <a href="login.html">
            <div class="card fac-card">
              <img src="images/2.jpeg" class="card-img-top" alt="...">
              <div class="card-body">
    
                <p class="card-text text-center"><a href="login.html"> Going to the local pitch for some soccer! </a></p>
    
              </div>
            </div>
          </div>
          </a>
        <?php 
          }
         else {
         ?>
         <a href="facilites_private.php">
           <div class="card fac-card">
             <img src="images/2.jpeg" class="card-img-top" alt="...">
             <div class="card-body">
   
               <p class="card-text text-center"><a href="facilites_private.php"> Parents click here for more information!</a></p>
   
             </div>
           </div>
         </div>
         </a>
         <?php
         }
         ?>
        
      <div class="col-lg-4 col-md-2 col-12">
        <a href="">
          <div class="card fac-card">
            <img src="images/3.jpeg" class="card-img-top" alt="...">
            <div class="card-body">
  
              <p class="card-text text-center"><a href="#"> Story time! </a></p>
  
            </div>
          </div>
        </a>
        
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