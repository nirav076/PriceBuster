<?php
    

    function getPureNameMobiles($mobileName)
	{
	      $pattern = "/\(.*\)|-|\(|\)|\b(red|black|white|pink|grey|[0-9]*gb|mobile.*|factory|unlocked)\b/i";
	      
	      $mobileName = preg_replace($pattern," ",$mobileName); 
	                            // replacing all the brackets and '-' with a " " ; space
          $pattern = "/.*\d+(\w*|\b)/";
          $matchResult =  preg_match($pattern,$mobileName,$matches);
          if(!$matchResult);
          else
            $mobileName = $matches[0]; // If no match is found , don't touch 
                                         // else initialise with the match
	      
	      preg_replace("/[ ]+/"," ",$mobileName); //Replace many spaces with a single space
	       return $mobileName;
	}

?>
