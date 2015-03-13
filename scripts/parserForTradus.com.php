
<?php

include "./curl.php";
include "./printData.php";
include "./productClass.php";
include "./initialiseProduct.php";
include "./getElementsByClassName.php";
include "./extractDataTradus.com.php";
include "./setUpDatabase.php";
include "./connectToDatabase.php";
include "./initialiseDatabase.php";   //put entry of category(Mobile) and storeName in database
include "./insertDataToDb.php";
include "./tradusCategoryScraper.php";

set_time_limit(100);

	//tradusMobile($con);
	//tradusDigitalCamera($con);
	//tradusLaptop($con);
	tradusDigitalTelevision($con);
?>

