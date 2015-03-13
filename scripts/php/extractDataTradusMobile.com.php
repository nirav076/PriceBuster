<?php

function extractDataTradusMobile($data)
{
              
    $itemNames = array();       // Creating an array to store the product names
    $prices = array();          //and Product Prices
    $images = array();              // and the image available on the current page
    $linksToProductPage = array();  // and Link to each Products main Page  
    
    $productContainers = array();   //The product Wrappers              
    
    $doc = new DOMDocument();
    @$doc->loadHTML($data);      // Creating and loading the received HTML file
    
    $productContainers = getElementsByClassName($doc, "prod_main_div");  
  
 //######################## Processing Per Product ########################
     
     foreach($productContainers as $productContainer) 
    { 
      $productNameElements = getElementsByClassName($productContainer, "product_name");
      foreach($productNameElements as $productNameElement) // there is only one element anyway
      {
        array_push($itemNames, $productNameElement->getElementsByTagName("a")->item(0)->nodeValue);         //Item Names
       
        array_push($linksToProductPage,"www.tradus.com".$productNameElement->getElementsByTagName("a")->item(0)->getAttribute("href")); // Link To page Saved
      }
      
      $productImageElements = getElementsByClassName($productContainer, "product_image");  //Image per wrapper assuming to be one
      foreach($productImageElements as $productImageElement)
      {
           $image = $productImageElement->getElementsByTagName("img")->item(0)->getAttribute("src"); 
           
           preg_match('/http:\/\/(.*)/',$image,$matches);
           $image =$matches[0]; 
           array_push($images, $image); //There's a single element/product
      }     // product Images
      
      $productPriceElements = getElementsByClassName($productContainer, "prod_offerprice");
      
      $productPriceElement = $productPriceElements[0]; // Only one exists anyway !
      array_push($prices, $productPriceElement->textContent); // NodeValue Works just fine 
                    //Prices
       
    }    //end of foreach:$productContainers
    
    
//###########################################################################
     $category = "mobiles";
     return initialiseProduct($itemNames, $prices, $images, $linksToProductPage,$category); 
 }   // End of funciton extractDataYebhi
?>
