<?php
/*
    Always remember to get the Individual array Element to process
    from the current getElementsByClassName form where an array is returned.
    The hassles may be rectified by returning a type os DOMNodeList
    
*** Warning 
        The HTML is wrong with image src spelled wrongly as scr and attributed 
        to div at some places
*/


function extractDataSnapdealMobile($data)
{
              
    $itemNames = array();       // Creating an array to store the product names
    $prices = array();          //and Product Prices
    $images = array();              // and the image available on the current page
    $linksToProductPage = array();  // and Link to each Products main Page  
    
    $productContainers = array();   //The product Wrappers              
    
    $doc = new DOMDocument();
    @$doc->loadHTML($data);      // Creating and loading the received HTML file
    
    $productContainers = getElementsByClassName($doc, "product_grid_cont");  
   
 //######################## Processing Per Product ########################
        
    foreach($productContainers as $productContainer) 
    { 
         $productNameElement = getElementsByClassName($productContainer, "product_grid_cont_heading");      //name Element
         $productLinkToProductPageElement = getElementsByClassName($productContainer, "hit-ss-logger");     // Product Link Element
         
       
          //############# Special Treatment For Price ################//  
         
         $productPriceElement = getElementsByClassName($productContainer, "product_price no-float");        
         if(!count($productPriceElement))
         {
             $productPriceElement = getElementsByClassName($productContainer, "product_price ");
             //Space at the end wasted half an hour To debug . always look at Source file
         }      //Price Element
        
        preg_match("/[0-9]*$/", trim($productPriceElement[0]->textContent), $match);  //match for the selling price and not the origianl marked price
       //without trimming only partial list gets displayed
       
      
        //###################################################################           
       
         array_push($itemNames, $productNameElement[0]->textContent); // pushed the name
         array_push($prices, $match[0]);                        //Pushed the price
         
         array_push($linksToProductPage, $productLinkToProductPageElement[0]->getAttribute("href"));
            
       
    }    //end of foreach:$productContainers
   
   
     $images = extractImageLinks($linksToProductPage) ;
//###########################################################################
    $category = "mobiles";
    return initialiseProduct($itemNames, $prices, $images, $linksToProductPage,$category); 
  
 }   // End of funciton extractDataYebhi
 
function extractImageLinks($pageLinks) 
{
   $doc = new DOMDocument();  
   $imageLinks = array();
   
   foreach($pageLinks as $pageLink) 
   {    
        $data = curl($pageLink);
        @$doc->loadHTML($data);
        $imageElements = getElementsByClassName($doc,"jqzoom"); 
        
        $imageLinks[] = $imageElements[0]->getAttribute("href");
   }
   
   return $imageLinks;
}
 
?>
