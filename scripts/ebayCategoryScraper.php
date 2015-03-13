<?php
	
	function ebayMobile($con)
	{
		$url = "http://www.ebay.in/sch/Mobile-Phones-/15032/i.html?LH_BIN=1&_from=R40&_nkw=&_dmpt=IN_Mobile_Phones&rt=nc&LH_ItemCondition=3";
		$data = curl($url) ;
		  
		$products = extractDataEbay($data,"Mobile");
		printData($products);

		$msg = initialiseDatabase($con,"ebay","www.ebay.in","Mobile");
	  	echo "</br>Success initialise Database:".$msg;

		$msg = insertData($con,"Mobile","ebay",$products); 
		echo "</br>Success insertData (page1):".$msg;

		//use this for more pages in for loop
		/*$pageNo = 2;
		for ($pageNo=2; $pageNo<=3 ; $pageNo++) { 
			 $url = "http://www.ebay.in/sch/Mobile-Phones-/15032/i.html?LH_BIN=1&LH_ItemCondition=3&_pgn=".$pageNo."&_skc=".(($pageNo-1)*50)."&rt=nc";   
		     $data = curl($url) ;
		     $products = extractDataEbay($data);
		     printData($products);

		     $msg = insertData($con,1,"ebay",$products); 
		     echo "</br>Success insertData (page2):".$msg;

		  }*/
		mysqli_close($con);	    
	}

	function ebayDigitalCamera($con)
	{
		$url = "http://www.ebay.in/sch/Digital-Cameras-/29997/i.html?LH_BIN=1&_dmpt=IN_Compact_Digital_Cameras&rt=nc&LH_ItemCondition=3";
		$data = curl($url) ;
		  
		$products = extractDataEbay($data,"Digital Camera");
		printData($products);

		$msg = initialiseDatabase($con,"ebay","www.ebay.in","Digital Camera");
	  	echo "</br>Success initialise Database:".$msg;

		$msg = insertData($con,"Digital Camera","ebay",$products); 
		echo "</br>Success insertData (page1):".$msg;

		//use this for more pages in for loop
		/*$pageNo = 2;
		for ($pageNo=2; $pageNo<=3 ; $pageNo++) { 

			 $url = "http://www.ebay.in/sch/Digital-Cameras-/29997/i.html?LH_BIN=1&LH_ItemCondition=3&_pgn=".$pageNo."&_skc=".(($pageNo-1)*50)."&rt=nc";
		     $data = curl($url) ;
		     $products = extractDataEbay($data);
		     printData($products);

		     $msg = insertData($con,1,"ebay",$products); 
		     echo "</br>Success insertData (page2):".$msg;

		  }*/
		mysqli_close($con);	    

	}

	function ebayLaptop($con)
	{
		$msg = initialiseDatabase($con,"ebay","www.ebay.in","Laptop");
	  	echo "</br>Success initialise Database:".$msg;

	  	
		$url = "http://www.ebay.in/sch/Laptops-/16159/i.html?LH_BIN=1&_catref=1&_dmpt=IN_PC_Laptops&rt=nc&LH_ItemCondition=3";
		$data = curl($url) ;
		  
		$products = extractDataEbay($data, "Laptop");
		printData($products);

		$msg = insertData($con,"Laptop","ebay",$products); 
		echo "</br>Success insertData (page1):".$msg;

		//use this for more pages in for loop
		/*$pageNo = 2;
		for ($pageNo=2; $pageNo<=3 ; $pageNo++) { 

			 $url = "http://www.ebay.in/sch/Digital-Cameras-/29997/i.html?LH_BIN=1&LH_ItemCondition=3&_pgn=".$pageNo."&_skc=".(($pageNo-1)*50)."&rt=nc";
		     $data = curl($url) ;
		     $products = extractDataEbay($data);
		     printData($products);

		     $msg = insertData($con,1,"ebay",$products); 
		     echo "</br>Success insertData (page2):".$msg;

		  }*/
		mysqli_close($con);	    

	}

	function ebayDigitalTelevision($con)
	{
		$msg = initialiseDatabase($con,"ebay","www.ebay.in","Digital Television");
	  	echo "</br>Success initialise Database:".$msg;

	  	
		$url = "http://www.ebay.in/sch/LCD-LED-Televisions-/11071/i.html?LH_BIN=1&_from=R40&_nkw=television&_dmpt=IN_LCD_LED_Plasma_Televisions&rt=nc&LH_ItemCondition=3";
		$data = curl($url) ;
		  
		$products = extractDataEbay($data, "Digital Television");
		printData($products);

		$msg = insertData($con,"Digital Television","ebay",$products); 
		echo "</br>Success insertData (page1):".$msg;

		//use this for more pages in for loop
		/*$pageNo = 2;
		for ($pageNo=2; $pageNo<=3 ; $pageNo++) { 

					
			 $url = "http://www.ebay.in/sch/LCD-LED-Televisions-/11071/i.html?LH_BIN=1&LH_ItemCondition=3&_from=R40&_nkw=television&_pgn=".$pageNo."&_skc=".(($pageNo-1)*50)."&rt=nc";
		     $data = curl($url) ;
		     $products = extractDataEbay($data);
		     printData($products);

		     $msg = insertData($con,1,"ebay",$products); 
		     echo "</br>Success insertData (page2):".$msg;

		  }*/
		mysqli_close($con);	    

	}
	

?>