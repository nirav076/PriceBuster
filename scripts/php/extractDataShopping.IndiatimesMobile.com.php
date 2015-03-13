<?php
require_once "./initialiseProduct.php";

function extractDataIndiatimesMobile($data)
{
              
    $itemNames = array();       // Creating an array to store the product names
    $prices = array();          //and Product Prices
    $images = array();              // and the image available on the current page
    $linksToProductPage = array();  // and Link to each Products main Page  
    
    $productContainers = array();   //The product Wrappers              
    
    $doc = new DOMDocument();
    @$doc->loadHTML($data);      // Creating and loading the received HTML file
    
    $productContainers = getElementsByClassName($doc, "productcoloumn zur");  
  
 //######################## Processing Per Product ########################
         
     foreach($productContainers as $productContainer) 
    { 
      $productNameElement = getElementsByClassName($productContainer, "itemname");
      $productImageElement = getElementsByClassName($productContainer, "lazy");
      
      $productPriceElement = getElementsByClassName($productContainer, "price");
      if(!count($productPriceElement))  // for special Case when the class is different
      {
        $productPriceElement = getElementsByClassName($productContainer, "price pricefont");
      }
      preg_match("/[0-9]*$/", $productPriceElement[0]->textContent, $match);
                            // To counter the special '`' in prices
                            
      array_push($itemNames, $productNameElement[0]->textContent); //Item Name
      array_push($prices, $match[0]);                               //Prices
      array_push($images, $productImageElement[0]->getAttribute("data-original"));    //Images
      array_push($linksToProductPage,"http://shopping.indiatimes.com" . $productNameElement[0]->getAttribute("href"));    
                                            // link to product pages
    }    //end of foreach:$productContainers
    
   
    
//###########################################################################
     //$images = extractImageLinks($linksToProductPage) ;
     $category = "mobiles";   
     return initialiseProduct($itemNames, $prices, $images, $linksToProductPage,$category); 
  
 }   // End of funciton extractDataYebhi
 
 
 function extractImageLinks($pageLinks) 
{
   @$doc = new DOMDocument();  
   $imageLinks;
   
   foreach($pageLinks as $pageLink) 
   {    
        $data = curl($pageLink);
        @$doc->loadHTML($data);
      
        $imageElement = $doc->getElementById("zoom1");
        
        if(!count($imageElement)); /* Some links are not getting  downloaded*/
        else
            $imageLinks[] = $imageElement->getAttribute("href");
   }
   return $imageLinks;
}
?>
