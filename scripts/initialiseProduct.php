<?php

function initialiseProduct($itemNames, $companyNames, $prices, $images, $linkToProductPage)
 {   
  
   $products = array();        // Creating an array of Products on the page 
   for($counter = 0; $counter < count($itemNames); ++$counter)
   {
    $myProduct = new product();
    
    $myProduct->setName(trim($itemNames[$counter]));
    $myProduct->setCompany(trim($companyNames[$counter]));
    $myProduct->setPrice(trim($prices[$counter]));
    $myProduct->setImage(trim($images[$counter]));
    $myProduct->setLinkToProductPage(trim($linkToProductPage[$counter]));
    
    array_push($products, $myProduct);
   }
   
   return $products; 
    
 }                  /*All the entries are trimmed to remove the special characters from
                        the beginning and the  end of the entries*/
 
 ?>
