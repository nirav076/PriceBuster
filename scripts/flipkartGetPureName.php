<?php
    
    function getPureName($name,$categoryOfProduct)
	{
	       if ($categoryOfProduct == "Mobile") 
	       {
	       	$name = trim(preg_replace('/\s*\([^)]*\)/', '', $name));//removes everything in between brackets()Also in snapdeal
                  return $name;
       	}

       	else if ($categoryOfProduct == "Laptop")
       	{
                  $name = trim(preg_replace('/\s*\([^)]*\)/', '', $name));//removes everything in between brackets()Also in snapdeal
       		return $name;
       	}

       	else if ($categoryOfProduct == "Digital Camera")
       	{
                  $name = trim(preg_replace('/\s*\([^)]*\)/', '', $name));//removes everything in between brackets()Also in snapdeal
       		return $name;
       	}

       	else if ($categoryOfProduct == "Digital Television")
       	{
                  $name = trim(preg_replace('/\s*\([^)]*\)/', '', $name));//removes everything in between brackets()Also in snapdeal
       		return $name;
       	}
	}

?>