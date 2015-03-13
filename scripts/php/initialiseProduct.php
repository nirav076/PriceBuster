<?php
include_once "./getPureName.php";

function initialiseProduct($itemNames, $prices, $images, $linkToProductPage,$category)
 {   
  
   $products = array();        // Creating an array of Products on the page 
   
   for($counter = 0; $counter < count($itemNames); ++$counter)
   {
    $myProduct = new product();
    
    switch($category)
    {
        case "mobiles":
                $itemNames[$counter] = getPureNameMobiles($itemNames[$counter]);
                        break;
        
        case "digitalTelevisions":
                 $itemNames[$counter] = getPureNameDigitalTelevisions($itemNames[$counter]);
                        break;
                        
        case "cameras":
                $itemNames[$counter] = getPureNameCameras($itemNames[$counter]);
                         break;
                         
        case "laptops":
                $itemNames[$counter] = getPureNameLaptops($itemNames[$counter]);
                        break;
       }           
    
    $myProduct->setName(strtolower(trim($itemNames[$counter]))) ;
    
    $match = explode(" ",$myProduct->getName());
    $myProduct->setCompany(trim($match[0]));
    
    preg_match("/((\d)+)\.*/",$prices[$counter],$matches);
    
    $myProduct->setPrice(trim($matches[1]));
    $myProduct->setImage(trim($images[$counter])) ;
    $myProduct->setLinkToProductPage(trim($linkToProductPage[$counter]));
    
    array_push($products, $myProduct);
   }
   
   return $products; 
    
 }                  /*All the entries are trimmed to remove the special characters from
                        the beginning and the  end of the entries*/
 
 ?>
