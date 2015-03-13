<?php
include "./tradusGetPureName.php";
function extractDataTradus($data,$categoryOfProduct)
{
              
    $itemNames = array();       // Creating an array to store the product names
    $companyNames = array();    //store company name
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
        $name = $productNameElement->getElementsByTagName("a")->item(0)->nodeValue;
        $name = getPureName($name, $categoryOfProduct);
        
        $company = substr($name, 0,strpos($name, " "));//To extract company name at first position. Also in ebay and all
        
        array_push($itemNames, $name);         //Item Names
        array_push($companyNames, $company);    //company name
        array_push($linksToProductPage, "http://www.tradus.com/".$productNameElement->getElementsByTagName("a")->item(0)->getAttribute("href")); // Link To page Saved
      }
      
      $productImageElements = $productContainer->getElementsByTagName("img");  //Image per wrapper assuming to be one
      foreach($productImageElements as $productImageElement)
      {
           array_push($images, $productImageElement->getAttribute("src"));
      }     // product Images
      
      $productPriceElements = getElementsByClassName($productContainer, "prod_offerprice");
      
      $productPriceElement = $productPriceElements[0]; // Only one exists anyway !
      $price = $productPriceElement->textContent;
      preg_match("/(\d)+(?=\.)/",$price,$matches);//remove Rs. and get price before .00 ie12234.00(also in ebay)
      array_push($prices, $matches[0]); // NodeValue Works just fine 
                    //Prices
       
    }    //end of foreach:$productContainers
    
    
//###########################################################################

        
     return initialiseProduct($itemNames,$companyNames, $prices, $images, $linksToProductPage); 
  
 }   // End of funciton extractDataYebhi
?>
