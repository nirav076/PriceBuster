
<?php

include "./curl.php";
include "./printData.php";
include "./productClass.php";
include "./extractDataYebhi.com.php";
include "./initialiseProduct.php";
include "./getElementsByClassName.php";
include "./setUpDatabase.php";
include "./connectToDatabase.php";
include "./initialiseDatabase.php";   //put entry of category(Mobile) and storeName in database
include "./insertDataToDb.php";
include "./yebhiCategoryScraper.php";


//$file = "mobiles.yebhi.com.html";
//$data = $file ; 
set_time_limit(100);

	//yebhiMobile($con);
	yebhiDigitalCamera($con);
	
?>

