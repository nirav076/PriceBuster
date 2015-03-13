<?php
	$server = "localhost";
	$user = "root";
	$password = "";
	$dataBase = "PriceBuster";

	$con = mysqli_connect($server,$user,$password); 
	if (!$con) {
    	die('Connect Error ('.mysqli_connect_errno().')'.mysqli_connect_error());
	}

	if(!mysqli_select_db($con,$dataBase))
	{
		mysqli_query($con,"CREATE DATABASE ".$dataBase);
		mysqli_select_db($con,$dataBase);
			
	} 
	else
	{
		mysqli_select_db($con,$dataBase);
	}
?>