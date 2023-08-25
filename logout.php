<?php
session_start();

//Check if loginStatus is 1 
if($_SESSION['loginStatus']>=1)
{
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="login.css">
</head>
<body>

<div class="btn-group" align="center">
	<div class="button-content">
	<p>Goodbye. <br>Thank you for visiting this website.<br> We hope to see you again soon.</p>
	<button onclick="location.href='login.html';">Login</button>
	</div>
</div>
</body>
</html>

<?php
	session_unset();
	session_destroy();	
}
else
{
	header("Location:login.html");
}

?>