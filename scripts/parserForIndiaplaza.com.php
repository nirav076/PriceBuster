<?php

include "./curl.php";
include "./printData.php";
include "./productClass.php";
include "./extractDataIndiaplaza.com.php";
include "./initialiseProduct.php";
include "./setUpDatabase.php";
include "./connectToDatabase.php";
include "./initialiseDatabase.php";   //put entry of category(Mobile) and storeName in database
include "./insertDataToDb.php";


//$file = "mobiles.FlipKart.com.html";
//$data = $file ; 

  $url = "http://www.indiaplaza.com/sale-mobiles-6.htm?sort=dp";
  $data = curl($url) ;
   
  //use this for more pages in for loop
  //$url = "http://www.indiaplaza.com/sale-mobiles-6.htm?sort=dp&PageNo=2";

  $products = extractDataIndiaplaza($data);
  printData($products);

  $msg = initialiseDatabase($con,"indiaplaza","www.indiaplaza.com","Mobile");
  echo "</br>Success initialise Database:".$msg;

  $msg = insertData($con,"Mobile","indiaplaza",$products);	//(con,categoryId,storeName,arrayOfProductsObject)
  echo "</br>Success :".$msg;
  
	mysqli_close($con);	    
?>