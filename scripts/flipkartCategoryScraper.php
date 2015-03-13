<?php

	function flipkartMobile($con)
	{
		$index = "1";
		do 
		{
	    	$url = "http://www.flipkart.com/mobiles/pr?sid=tyy%2C4io&layout=grid&start=".$index;
	    	$data = curl($url) ;
	    	//$data = $file ; 
	    	$products = extractDataFlipKart($data,"Mobile");
	    	printData($products);

	    	$msg = initialiseDatabase($con,"flipkart","www.flipkart.com","Mobile");
			echo "</br>Success initialise Database:".$msg;
	 
	 		$msg = insertData($con,"Mobile","flipkart",$products); 
			echo "</br>Success insertData (page1):".$msg;

	    	$index += 20 ;
		}
		while($index<20);
		return;
	}

	function flipkartDigitalCamera($con)
	{
		$index = "1";
		do 
		{
	    	$url = "http://www.flipkart.com/cameras/pr?sid=jek%2Cp31&layout=grid".$index;
	    	$data = curl($url) ;
	    	//$data = $file ; 
	    	$products = extractDataFlipKart($data,"Digital Camera");
	    	printData($products);

	    	$msg = initialiseDatabase($con,"flipkart","www.flipkart.com","Digital Camera");
			echo "</br>Success initialise Database:".$msg;
	 
	 		$msg = insertData($con,"Digital Camera","flipkart",$products); 
			echo "</br>Success insertData (page1):".$msg;

	    	$index += 20 ;
		}
		while($index<20);
		return;
	}

	function flipkartLaptop($con)
	{
		$index = "1";
		do 
		{
			/*******This will remove everithing in between brackets from name***********/
	    	$url = "http://www.flipkart.com/laptops/pr?p%5B%5D=sort%3Dpopularity&sid=6bo%2Cb5g&layout=grid".$index;
	    	$data = curl($url) ;
	    	//echo $data;
	    	//$data = $file ; 
	    	$products = extractDataFlipKart($data, "Laptop");
	    	printData($products);

	    	$msg = initialiseDatabase($con,"flipkart","www.flipkart.com","Laptop");
			echo "</br>Success initialise Database:".$msg;
	 
	 		$msg = insertData($con,"Laptop","flipkart",$products); 
			echo "</br>Success insertData (page1):".$msg;

	    	$index += 20 ;
		}
		while($index<20);
		return;
	}

	function flipkartDigitalTelevision($con)
	{
		$index = "1";
		do 
		{
			/*******This will remove everithing in between brackets from name***********/
	    	$url = "http://www.flipkart.com/tvs-audio-video-players/tv-video/tvs/pr?p%5B%5D=sort%3Dpopularity&sid=ckf%2Csee%2Cczl&layout=grid".$index;
	    	$data = curl($url) ;
	    	//echo $data;
	    	//$data = $file ; 
	    	$products = extractDataFlipKart($data, "Digital Television");
	    	printData($products);

	    	$msg = initialiseDatabase($con,"flipkart","www.flipkart.com","Digital Television");
			echo "</br>Success initialise Database:".$msg;
	 
	 		$msg = insertData($con,"Digital Television","flipkart",$products); 
			echo "</br>Success insertData (page1):".$msg;

	    	$index += 20 ;
		}
		while($index<20);
		return;
	}




?>