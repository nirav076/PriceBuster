<?php
	function extract_data($data)
	{
		$dom = new DOMDocument();
		@$dom->loadHTML($data);
		$table = $dom->getElementsByTagName('table');
		$trs = $table->item(0)->getElementsByTagName('tr');
		$companyName = array();
		$linkToPage =array();
				
		foreach ($trs as $tr) {
			$tds = $tr->getElementsByTagName('td');
			for($i=1 ; $i < $tds->length ; $i=$i+2)
			{
				$name = $tds->item($i)->nodeValue;
				$name = str_replace("phones", "", $name);	//remove phones
				$name = implode(" ",explode(" ", $name, -1));			//remove nos
				array_push($companyName, $name);

				$linkToPage[]="www.gsmarena.com/".$tds->item($i)->firstChild->getAttribute("href");
			}
		}

		return array($companyName,$linkToPage);
	}

	function print_Data($scrappedPage)
	{
		
		$noOfItems = count($scrappedPage[0]);
		for($counter = 0; $counter < $noOfItems; ++$counter )
    	{
       
       		$company = $scrappedPage[0][$counter];
       		$link = $scrappedPage[1][$counter];
       		echo ($counter+1)."Company :".$company."<br/>" ;
       		echo "Link : ".$link."</br></br>";
       		
    	}   
    
    	return ; 
	}

	function insert_Data($con,$scrappedPage)
	{
		$sucess = 1;
		
		$noOfItems = count($scrappedPage[0]);
		for($counter = 0; $counter < $noOfItems; ++$counter )
    	{
       
       		$company = $scrappedPage[0][$counter];
       		$link = $scrappedPage[1][$counter];
       		$values = "'".$company."','".$link."'";
       		$query = "INSERT INTO companyList (categoryName, companyName, linkToCompanyProducts)
				VALUES ('Mobile',".$values.");";
       		if(mysqli_query($con,$query));
       		else
       		{
       			echo "</br>Insert Error :".mysqli_error($con);
       			$sucess = 0;
       		}
       		
    	}   
    
    	return $sucess; 
	}

	$url = "http://www.gsmarena.com/makers.php3";
	$data = curl($url);
	$scrappedPage = extract_data($data);
	//print_Data($scrappedPage);
	include "./connectToDatabase.php";
	$query = "CREATE TABLE IF NOT EXISTS companyList (categoryName VARCHAR(10),
														companyName VARCHAR(10),
														linkToCompanyProducts VARCHAR(50)
														)ENGINE=INNODB;";

	if(mysqli_query($con,$query))echo "</br>companyList created!</br>";
	else
	{
		echo "companyList Problem:".mysqli_error($con);
	}

	$msg = insert_Data($con,$scrappedPage);

	echo "INsert companyList:".$msg;
	mysqli_close($con);

?>

		



