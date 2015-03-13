<?php

/*

    The elements of various products on this sites are differentiated by Ids
    with the general pattern <some Identifier>.<common product Id per Product>.
    We here First find that common Id  and then proceed further .
    
 Problems :
    **       The function getElementById() doesn't work with $productContainer
        MayBe it doesn't work with DomElement that Is returned from 
        getElementByClassName(), there for Id is used with $doc 
    
*/    
       

function extractDataYebhi($data)
{
              
    $itemNames = array();       // Creating an array to store the product names
    $companyNames = array();    //store company name
    $prices = array();          //and Product Prices
    $images = array();              // and the image available on the current page
    $linksToProductPage = array();  // and Link to each Products main Page  
    
    $productContainers = array();   //The product Wrappers              
    
    $doc = new DOMDocument();
    @$doc->loadHTML($data);      // Creating and loading the received HTML file

    $className = "price_Reviews";
    $productContainers = getElementsByClassName($doc, $className);    
  
 //######################## Processing Per Product ########################
     
     foreach($productContainers as $productContainer)
    {          
      $anchors = $productContainer->getElementsByTagName("a");
      $patternToSearch = "/p_([0-9]*)/";
      $perProductId ;
            
      foreach($anchors as $anchor)
      {
        if(preg_match($patternToSearch, $anchor->getAttribute("id"), $match)) 
        {
          $perProductId = $match[1] ;  // Finding that common Id
        }   //end Of If
      }     //end of foreach:$anchors  
      
      $name = $doc->getElementById("p_$perProductId")->nodeValue;
      array_push($itemNames, $name);  //Get the Product Name refer to problems **
     
      $company = substr($name, 0, strpos($name, " "));
      array_push($companyNames, $company); 
     
      array_push($images, $doc->getElementById("itemImg_$perProductId")->getAttribute("src")); // Get Images
      array_push($linksToProductPage, "http://zeta.yebhi.com/".$doc->getElementById("anchor_$perProductId")->getAttribute("href")); // get the page link to individual Product
                                
    }    //end of foreach:$productContainers
    
###########################  Special Conditions For Price ############################

        $priceElements = getElementsByClassName($doc, "inr") ;
        $patternToSearch = "/[0-9]*$/"; //It doesn't work without the $ at the end . may be because of Binary data that precedes the expression
        foreach($priceElements as $priceElement)
        {
            preg_match($patternToSearch, $priceElement->nodeValue,$match);
            array_push($prices, $match[0]);
        }
  
     return initialiseProduct($itemNames, $companyNames, $prices, $images, $linksToProductPage); 
  
 }   // End of funciton extractDataYebhi
?>
