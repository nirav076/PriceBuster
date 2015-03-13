
<?php

include "./curl.php";
include "./printData.php";
include "./productClass.php";
include "./extractDataFlipKart.com.php";
include "./initialiseProduct.php";
include "./getElementsByClassName.php";
include "./setUpDatabase.php";
include "./connectToDatabase.php";
include "./initialiseDatabase.php";   //put entry of category(Mobile) and storeName in database
include "./insertDataToDb.php";
include "./flipkartCategoryScraper.php";

set_time_limit(100);

//$file = "mobiles.FlipKart.com.html";

flipkartMobile($con);
//flipkartDigitalCamera($con);
//flipkartLaptop($con);
//flipkartDigitalTelevision($con);

?>

