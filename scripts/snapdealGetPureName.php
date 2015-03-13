<?php
    
    function getPureName($name,$categoryOfProduct)
	{
	       if ($categoryOfProduct == "Mobile") 
	       {
	       	$name = trim(preg_replace('/\s*\([^)]*\)/', '', $name));//removes everything in between brackets()
                  $pattern = '/\b(black|-black|white|-white|yellow|-8gb|16gb|8gb|gb|\dmp)\b/i';
                  $name = trim(preg_replace($pattern, "", $name));
                  return $name;
       	}

       	else if ($categoryOfProduct == "Laptop")
       	{
                  $name = trim(preg_replace('/\s*\([^)]*\)/', '', $name));//removes everything in between brackets()
                  $pattern = '/\b(black|-black|white|-white|yellow|-8gb|16gb|8gb|gb|\dmp)\b/i';
                  $name = trim(preg_replace($pattern, "", $name));
                  return $name;
       	}

       	else if ($categoryOfProduct == "Digital Camera")
       	{
                  $name = trim(preg_replace('/\s*\([^)]*\)/', '', $name));//removes everything in between brackets()
                  $pattern = '/\b(black|-black|white|-white|yellow|-8gb|16gb|8gb|gb|\dmp)\b/i';
                  $name = trim(preg_replace($pattern, "", $name));
       		return $name;
       	}

            else if ($categoryOfProduct == "Digital Television")
       	{
                  $name = trim(preg_replace('/\s*\([^)]*\)/', '', $name));//removes everything in between brackets()
                  $pattern = '/\b(black|-black|white|-white|yellow|-8gb|16gb|8gb|gb|\dmp)\b/i';
                  $name = trim(preg_replace($pattern, "", $name));
       		return $name;
       	}
	}

?>