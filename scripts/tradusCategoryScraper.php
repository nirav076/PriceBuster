<?php
	function tradusMobile($con)
	{
		$url = "http://www.tradus.com/mobiles-accessories-smart-phones/t/7844";
		$data = curl($url) ;
		  
		$products = extractDataTradus($data, "Mobile");
		printData($products);

		$msg = initialiseDatabase($con,"tradus","www.tradus.in","Mobile");
	  	echo "</br>Success initialise Database:".$msg;

		$msg = insertData($con,"Mobile","tradus",$products); 
		echo "</br>Success insertData (page1):".$msg;

		//use this for more pages in for loop
		/*$pageNo = 1;
		for ($pageNo=1; $pageNo<=3 ; $pageNo++) { 
			 $url = "http://www.tradus.com/mobiles-accessories-smart-phones/t/7844?Page=".$pageNo;   
		     $data = curl($url) ;
		     $products = extractDataTradus($data);
		     printData($products);

		     $msg = insertData($con,"Mobile","tradus",$products); 
		     echo "</br>Success insertData (page2):".$msg;

		  }*/
		mysqli_close($con);	    
	}


	
	function tradusLaptop($con)
	{
		$url = "http://www.tradus.com/notebooks-laptops-apple-sony-hp-dell-lenovo/t/7689";
		$data = curl($url) ;
		  
		$products = extractDataTradus($data, "Laptop");
		printData($products);

		$msg = initialiseDatabase($con,"tradus","www.tradus.in","Laptop");
	  	echo "</br>Success initialise Database:".$msg;

		$msg = insertData($con,"Laptop","tradus",$products); 
		echo "</br>Success insertData (page1):".$msg;

		//use this for more pages in for loop
		/*$pageNo = 1;
		for ($pageNo=1; $pageNo<=3 ; $pageNo++) { 
			 $url = "http://www.tradus.com/notebooks-laptops-apple-sony-hp-dell-lenovo/t/7689?Page=".$pageNo;   
		     $data = curl($url) ;
		     $products = extractDataTradus($data);
		     printData($products);

		     $msg = insertData($con,"Laptop","tradus",$products); 
		     echo "</br>Success insertData (page2):".$msg;

		  }*/
		mysqli_close($con);	    
	}

	

	function tradusDigitalCamera($con)
	{
		$url = "http://www.tradus.com/digital-camera-samsung-canon-nikon-sony/t/7668";
		$data = curl($url) ;
		  
		$products = extractDataTradus($data, "Digital Camera");
		printData($products);

		$msg = initialiseDatabase($con,"tradus","www.tradus.in","Digital Camera");
	  	echo "</br>Success initialise Database:".$msg;

		$msg = insertData($con,"Digital Camera","tradus",$products); 
		echo "</br>Success insertData (page1):".$msg;

		//use this for more pages in for loop
		/*$pageNo = 1;
		for ($pageNo=1; $pageNo<=3 ; $pageNo++) { 
			 $url = "http://www.tradus.com/digital-camera-samsung-canon-nikon-sony/t/7668?Page=".$pageNo;   
		     $data = curl($url) ;
		     $products = extractDataTradus($data);
		     printData($products);

		     $msg = insertData($con,"Digital Camera",tradus",$products); 
		     echo "</br>Success insertData (page2):".$msg;

		  }*/
		mysqli_close($con);	    
	}

	

	function tradusDigitalTelevision($con)
	{
		$url = "http://www.tradus.com/home-entertainment-tv/t/10426";
		$data = curl($url) ;
		  
		$products = extractDataTradus($data, "Digital Television");
		printData($products);

		$msg = initialiseDatabase($con,"tradus","www.tradus.in","Digital Television");
	  	echo "</br>Success initialise Database:".$msg;

		$msg = insertData($con,"Digital Television","tradus",$products); 
		echo "</br>Success insertData (page1):".$msg;

		//use this for more pages in for loop
		/*$pageNo = 1;
		for ($pageNo=1; $pageNo<=3 ; $pageNo++) { 
			 $url = "http://www.tradus.com/home-entertainment-tv/t/10426?Page=".$pageNo;   
		     $data = curl($url) ;
		     $products = extractDataTradus($data);
		     printData($products);

		     $msg = insertData($con,"Digital Television",tradus",$products); 
		     echo "</br>Success insertData (page2):".$msg;

		  }*/
		mysqli_close($con);	    
	}
?>