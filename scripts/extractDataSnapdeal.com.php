<?php
include "./snapdealGetPureName.php";

function extractDataSnapdeal($data,$categoryOfProduct)
{
    $products = array();        // Creating an array of Products on the page
            
    $itemNames = array();       // Creating an array to store the product names
    $companyNames = array();
    $prices = array();          //and Product Prices
    $linksToProductPage = array();  // and Link to each Products main Page 
    $images = array();               // and the image available on the current page   
    
    $doc = new DOMDocument();

    @$html=$doc->loadHTML($data);      // Creting and loading the received HTML file
    
    $productContainer = $doc->getElementById("products-main4");    // loading the product wrapper         
    $anchors = $productContainer->getElementsByTagName("a"); // loading all the links per product wrapper     
    $divs = $productContainer->getElementsByTagName("div"); // loading all the divs per product wrapper      
    $imgDivs = getElementsByClassName($productContainer, "product-image"); // loading all the images  

    
    foreach($divs as $div)
    {
        if($div->getAttribute("class")=="product_grid_cont_heading")
        {
          $name = getPureName($div->nodeValue,$categoryOfProduct);
          $company = substr($name, 0,strpos($name, " "));
          array_push($itemNames, $name);
          array_push($companyNames, $company);
        }

        if ($div->getAttribute("class")=="product_price ") 
        {
          preg_match("/[0-9]*$/", trim($div->textContent), $match);  
          array_push($prices,$match[0]);
        }

        if ($div->getAttribute("class")=="product_price no-float") 
        {
          preg_match("/[0-9]*$/", trim($div->textContent), $match);  
          array_push($prices,$match[0]);
        }
    }

    foreach ($anchors as $anchor) 
    {
        if ($anchor->getAttribute("class")=="hit-ss-logger") 
        {
          array_push($linksToProductPage, $anchor->getAttribute("href"));
        }   
        
      
    }
   
   foreach($imgDivs as $imgDiv)           // If condidion not used here because there is onl\y onew image per product Wrapper
    {
       if($imgDiv->hasAttribute("scr"))
       {
        $iUrl = preg_replace('/\b(166x194)\b/i', 'large', $imgDiv->getAttribute("scr"));
        array_push($images, $iUrl);
       }
       else
       {
          $iUrl = preg_replace('/\b(166x194)\b/i', 'large', $imgDiv->getElementsByTagName("img")->item(0)->getAttribute("src"));
          array_push($images, $iUrl);
        }
    }
    
   for($counter = 0; $counter < count($itemNames); ++$counter)
   {
    $myProduct = new product();
    
    $myProduct->setName($itemNames[$counter]) ;
    $myProduct->setCompany($companyNames[$counter]);
    $myProduct->setPrice($prices[$counter]);
    $myProduct->setImage($images[$counter]) ;
    $myProduct->setLinkToProductPage($linksToProductPage[$counter]);
    
    array_push($products, $myProduct);
   }
   
   return $products; 
      
}
?>
