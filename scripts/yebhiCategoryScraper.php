<?php
	function yebhiMobile($con)
	{
		$url = "http://zeta.yebhi.com/online-shopping/mobile-store/mobiles-and-tablets/mobile-phones.html?affint=MobileFlyMenu&source=menu";
		$data = curl($url) ;
		  
		$products = extractDataYebhi($data);
		printData($products);

		$msg = initialiseDatabase($con,"yebhi","www.yebhi.in","Mobile");
	  	echo "</br>Success initialise Database:".$msg;

		$msg = insertData($con,"Mobile","yebhi",$products); 
		echo "</br>Success insertData (page1):".$msg;

		//use this for more pages in for loop
		/*$pageNo = 1;
		for ($pageNo=1; $pageNo<=3 ; $pageNo++) { 


			 $url = "http://zeta.yebhi.com/online-shopping/mobile-store/mobiles-and-tablets/mobile-phones.html?affint=MobileFlyMenu&source=menu&startIndex=".($pageNo*51)+1;   
		     $data = curl($url) ;
		     $products = extractDataYebhi($data);
		     printData($products);

		     $msg = insertData($con,"Mobile","yebhi",$products); 
		     echo "</br>Success insertData (page2):".$msg;

		  }*/
		mysqli_close($con);	    
	}


	function yebhiDigitalCamera($con)
	{
		$url = "http://zeta.yebhi.com/online-shopping/digital-cameras.html?affint=CameraFlyMenu&source=menu";
		$data = curl($url) ;
		  
		$products = extractDataYebhi($data);
		printData($products);

		$msg = initialiseDatabase($con,"yebhi","www.yebhi.in","Digital Camera");
	  	echo "</br>Success initialise Database:".$msg;

		$msg = insertData($con,"Digital Camera","yebhi",$products); 
		echo "</br>Success insertData (page1):".$msg;

		//use this for more pages in for loop
		/*$pageNo = 1;
		for ($pageNo=1; $pageNo<=3 ; $pageNo++) { 


			 $url = "http://zeta.yebhi.com/online-shopping/digital-cameras.html?affint=CameraFlyMenu&source=menu&startIndex=".($pageNo*51)+1;   
		     $data = curl($url) ;
		     $products = extractDataYebhi($data);
		     printData($products);

		     $msg = insertData($con,"Digital Camera","yebhi",$products); 
		     echo "</br>Success insertData (page2):".$msg;

		  }*/
		mysqli_close($con);	    
	}
?>