<?php
    
    define('HOST', "localhost"); //Define the default constants for this site 
	define('USER', "root");
	define('PASSWORD', "");
	define('DATABASE', "PriceBuster");

/*-----------------------------------------------------------------------------
Function Use :

              For default arguments for this site, No parameters are required ,
              
        connectToDatabase() ; 
        
              for any changes in parameters, all parameters to the left must be
              provideed as per rule of default parametrs 
        
        connectToDatabase('192.168.2.1','ranjit'); 
        connectToDatabase('192.168.2.1','ranjit','thisIsMyPasswrd','myDataBase') ;  

----------------------------------------------------------------------------*/

	
function connectToDatabase($host = HOST, $user = USER, $password = PASSWORD, $database = DATABASE)
{	
	$con = mysqli_connect($host,$user,$password); 
	if (!$con)                                      /* Connect with the default parameters 
	                                                     for this project   */
	 {
    	die('Connect Error ('.mysqli_connect_errno().')'.mysqli_connect_error());
	 }

	if(!mysqli_select_db($con,$database))
	{
		if(mysqli_query($con,"CREATE DATABASE ".$database.";"))
		    echo "database Created";
		else die(mysqli_error($con));
		    
		if(!mysqli_select_db($con,$database)) 
		die ("Cannot Connect to ".$database." ".mysqli_error($con));
	}
	 
	 /* If the database selection fails ie; if the databse does not exists
	    create database and then select it .
	    Can Also be accomplished using 'CREATE  DATABASE IF NOT EXISTS $databaseName'
	*/   
	return $con; // return the connection resource 
	 
}
?>
