<?php

	function initialiseDatabase($con,$storeName,$homeUrl,$categoryName)
	{
		$sucess = 1;
		$query = "INSERT INTO onlineStores (storeName,homeUrl) VALUES('".$storeName."','".$homeUrl."')
   					ON DUPLICATE KEY UPDATE lastUpdated=CURRENT_TIMESTAMP;";

	   	if(mysqli_query($con,$query))echo "</br>Row inserted/updated in onlineStores.";
	   	else
	   	{

	   		$sucess = 0;
	  		echo "</br>Error in inserting/updating table: " . mysqli_error($con);
	  		
	   	}
		
	/*********store info inserted in onlineStores***********/

		$query = "INSERT IGNORE INTO categoryOfProduct (categoryName) VALUES('".$categoryName."')";

	   	if(mysqli_query($con,$query))echo "</br>Row inserted/notinsrted in catefpryOfProduct.";
	   	else
	   	{
	   		$sucess = 0;
	  		echo "</br>Error in inserting/updating table: " . mysqli_error($con);
	  		
	   	}
	/*******category information inserted in categoryOfProduct**********/
	return $sucess;
	}

?>