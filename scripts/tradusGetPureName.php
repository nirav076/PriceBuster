<?php
    
    function getPureName($name,$categoryOfProduct)
	{
	       if ($categoryOfProduct == "Mobile") 
	       {
                  $name = trim($name);
	       	$name = substr($name, 0, strpos($name, "Mobile Phone"));
                  return $name;
       	}

       	else if ($categoryOfProduct == "Laptop")
       	{
                  
                  return $name;
       	}

       	else if ($categoryOfProduct == "Digital Camera")
       	{
                  $name = trim(preg_replace('/\b(combo|of)\b/i', "", trim($name)));
       		return $name;
       	}

            else if ($categoryOfProduct == "Digital Television")
       	{
                  
       		return $name;
       	}
	}

?>