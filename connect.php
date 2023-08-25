<?php

	//Constant values required to connect to DB
	DEFINE('DB_HOST', 'localhost');
	DEFINE('DB_USER', 'root');
	DEFINE('DB_PASSWORD', '');
	DEFINE('DB_NAME','projectDB');

	$connDB = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

?>