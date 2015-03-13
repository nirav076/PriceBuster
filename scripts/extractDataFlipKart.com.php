<?php
include "./flipkartGetPureName.php";

function extractDataFlipKart($data, $categoryOfProduct)
{
    $products = array();        // Creating an array of Products on the page
            
    $itemNames = array();       // Creating an array to store the product names
    $companyNames = array();    //Store Company Name
    $prices = array();          //and Product Prices
    $linksToProductPage = array();  // and Link to each Products main Page 
    $images = array();              // and the image available on the current page
    
    $productContainers = array();   //The product Wrappers              
    
    $doc = new DOMDocument();

    @$doc->loadHTML($data);      // Creating and loading the received HTML file
         
     $className = "product browse-product "; // The Extra space as present in site source code
     $productContainers = getElementsByClassName($doc, $className);   
 
 //######################## Processing Per Product ########################
     
   foreach($productContainers as $productContainer)
    {          
       $anchors = $productContainer->getElementsByTagName("a"); // loading all the links per product wrapper 
       foreach($anchors as $anchor)
       {
         if($anchor->getAttribute("class")=="fk-anchor-link")
         {
              $name = getPureName($anchor->nodeValue, $categoryOfProduct);
              $company = substr($name, 0,strpos($name, " "));//To extract company name at first position. Also in ebay and all
              array_push($companyNames, $company);
              array_push($itemNames, $name);  // This node value has the product Name 
              array_push($linksToProductPage,"http://www.flipkart.com".trim($anchor->getAttribute("href"))); // This has the link to the main product Page      
         }
       }    
      
      
       $divs = $productContainer->getElementsByTagName("div"); // loading all the divs per product wrapper   
       foreach($divs as $div)
       {
            if($div->getAttribute("class")=="fk-price line rpadding3")
            {
              preg_match("/(\d)*$/",$div->nodeValue,$matches);//remove Rs.
              array_push($prices, $matches[0]);    // This node has the Price of Product   
            }
       }
   
  
       $imgs = $productContainer->getElementsByTagName("img"); // loading all the images  
       foreach($imgs as $img)           // If condidion not used here because there is onl\y onew image per product Wrapper
       {
          $iUrl = $img->getAttribute("src");
          $iUrl = preg_replace('(100x100)', '275x275', $iUrl);
          array_push($images, $iUrl);  // This node has the Link to  thumbnail image on current page     
       }   

    }    
    
    return initialiseProduct($itemNames, $companyNames, $prices, $images, $linksToProductPage) ;   
}
?>
