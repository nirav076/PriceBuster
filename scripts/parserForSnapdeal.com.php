<?php

include "./curl.php";
include "./printData.php";
include "./productClass.php";
include "./extractDataSnapdeal.com.php";
include "./initialiseProduct.php";
include "./setUpDatabase.php";
include "./connectToDatabase.php";
include "./initialiseDatabase.php";
include "./insertDataToDb.php";
include "./getElementsByClassName.php";
include "./snapdealCategoryScraper.php";

set_time_limit(100);

  snapdealMobile($con);
  //snapdealDigitalCamera($con);
  //snapdealLaptop($con);
  //snapdealDigitalTelevision($con);


?>