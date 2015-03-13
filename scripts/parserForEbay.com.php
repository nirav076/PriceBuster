<?php
include "./curl.php";
include "./printData.php";
include "./productClass.php";
include "./extractDataEbay.com.php";
include "./initialiseProduct.php";    //initialise product class
include "./setUpDatabase.php";
include "./connectToDatabase.php";
include "./initialiseDatabase.php";   //put entry of category(Mobile) and storeName in database
include "./insertDataToDb.php";
include "./ebayCategoryScraper.php";

set_time_limit(100);

//$file = "mobiles.FlipKart.com.html";
//$data = $file ; 

  ebayMobile($con);
  //ebayDigitalCamera($con);
  //ebayLaptop($con);
  //ebayDigitalTelevision($con);
  
?>