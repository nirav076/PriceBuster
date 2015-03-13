<?php

	function snapdealMobile($con)
	{
		$url = "http://www.snapdeal.com/products/mobiles-mobile-phones?sort=plrty&storeID=mobiles-mobile-phones_viewall";
		$data = curl($url) ;
		//use this for more pages in for loop
		//its ajex
		$products = extractDataSnapdeal($data, "Mobile");
		printData($products);
		
		$msg = initialiseDatabase($con,"snapdeal","www.snapdeal.com","Mobile");
		echo "</br>Success initialise Database:".$msg;

		$msg = insertData($con,"Mobile","snapdeal",$products);	//(con,categoryId,storeName,arrayOfProductsObject)
		echo "</br>Success (page 1):".$msg;
  
		mysqli_close($con);	 
		return;

	}

	function snapdealDigitalCamera($con)
	{

		$url = "http://www.snapdeal.com/products/cameras-digital-cameras?sort=plrty&storeID=cameras-digital-cameras_viewall";
		$data = curl($url) ;
		//echo $data;
		//use this for more pages in for loop
		//its ajex
		$products = extractDataSnapdeal($data, "Digital Camera");
		printData($products);
		
		$msg = initialiseDatabase($con,"snapdeal","www.snapdeal.com","Digital Camera");
		echo "</br>Success initialise Database:".$msg;

		$msg = insertData($con,"Digital Camera","snapdeal",$products);	//(con,categoryId,storeName,arrayOfProductsObject)
		echo "</br>Success (page 1):".$msg;
  
		mysqli_close($con);	 
		return;

	}


	function snapdealLaptop($con)
	{

		$url = "http://www.snapdeal.com/products/computers-laptops?sort=plrty&storeID=computers-laptops_viewall";
		$data = curl($url) ;
		//echo $data;
		//use this for more pages in for loop
		//its ajex
		$products = extractDataSnapdeal($data, "Laptop");
		printData($products);
		
		$msg = initialiseDatabase($con,"snapdeal","www.snapdeal.com","Laptop");
		echo "</br>Success initialise Database:".$msg;

		$msg = insertData($con,"Laptop","snapdeal",$products);	//(con,categoryId,storeName,arrayOfProductsObject)
		echo "</br>Success (page 1):".$msg;
  
		mysqli_close($con);	 
		return;

	}

	function snapdealDigitalTelevision($con)
	{

		$url = "http://www.snapdeal.com/products/electronic-tv-accessories?sort=plrty&storeID=electronic-tv-accessories_viewall";
		$data = curl($url) ;
		//echo $data;
		//use this for more pages in for loop
		//its ajex
		$products = extractDataSnapdeal($data, "Digital Television");
		printData($products);
		
		$msg = initialiseDatabase($con,"snapdeal","www.snapdeal.com","Digital Television");
		echo "</br>Success initialise Database:".$msg;

		$msg = insertData($con,"Digital Television","snapdeal",$products);	//(con,categoryId,storeName,arrayOfProductsObject)
		echo "</br>Success (page 1):".$msg;
  
		mysqli_close($con);	 
		return;

	}
	
?>