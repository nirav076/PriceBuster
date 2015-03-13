<?php
    
    function getPureName($name,$categoryOfProduct)
	{
	       if ($categoryOfProduct == "Mobile") 
	       {
	       		$pattern = '/\b(new|black|white|brand|gsm|16gb|8gb|16|8|gb|factory|unlocked|\dmp|\')\b/i';
	       		$name = preg_replace($pattern, "", $name);
	       		$name = str_replace("*", "", $name);
	       		$nameArray = explode(" ", trim($name), 7);
            $nameArray = array_slice($nameArray, 0, 6);

            $sliceIndex = 6;
            for ($i=0; $i < count($nameArray); $i++) { 
              if(preg_match("/\d/", $nameArray[$i]))
              {
                $sliceIndex = $i+1;
                break;
              }
            }
            if($sliceIndex == 6)
              $sliceIndex = 3;
  
            $nameArray = array_slice($nameArray, 0, $sliceIndex);
           	$name = implode(" ", $nameArray);
           	return $name;
       		}

       		else if ($categoryOfProduct == "Laptop")
       		{
       			return $name;
       		}

       		else if ($categoryOfProduct == "Digital Camera")
       		{
       			return $name;
       		}

       		else if ($categoryOfProduct == "Digital Television")
       		{
       			return $name;
       		}
	}

?>