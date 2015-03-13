<?php

function extractDataIndiaplaza($data)
{
    $products = array();        // Creating an array of Products on the page
            
    $itemNames = array();       // Creating an array to store the product names
    $companyNames = array();    //Array for storing company Name
    $prices = array();          //and Product Prices
    $linksToProductPage = array();  // and Link to each Products main Page 
    $images = array();               // and the image available on the current page   
    
    $doc = new DOMDocument();

    @$html=$doc->loadHTML($data);      // Creting and loading the received HTML file
    
    $productContainer = $doc->getElementById("browsedResult");    // loading the product wrapper         
    $spans = $productContainer->getElementsByTagName("span"); // loading all the links per product wrapper     
    $divs = $productContainer->getElementsByTagName("div"); // loading all the divs per product wrapper      
    $imgs = $productContainer->getElementsByTagName("img"); //Images inside div tag  

    
    foreach($divs as $div)
    {
        if($div->getAttribute("class")=="home_deal_title_aug20")
        {
              $name = $div->nodeValue;
              $name = trim($name);
              array_push($itemNames, $name);    // This node has the name of Product   
              $company = substr($name, 0, strpos($name, " "));
              array_push($companyNames, $company);
              array_push($linksToProductPage,"www.indiaplaza.com".$div->getElementsByTagName("a")->item(0)->getAttribute("href"));
        }

    }

    foreach ($spans as $span) 
    {
        if ($span->getAttribute("class")=="browse_op") 
        {
          $price = $span->nodeValue;
          preg_match("/(\d)+$/", $price, $matches);
          array_push($prices, $matches[0]);    //price
        }   
    }

    foreach ($imgs as $img) {
      $match = "ContentPlaceHolder1_SpecificValuesHolder_ctl00_dlBrowseView_Image1";
      if(substr($img->getAttribute("id"), 0,strlen($match))==$match);
      {
        $iUrl = $img->getAttribute("src");
        $iUrl = preg_replace('(MOB1706)', 'L-mob1706', $iUrl);
        $iUrl = preg_replace('(NOK1-T)', 'nok1', $iUrl);
        $iUrl = preg_replace('(NOK01-T)', 'NOK01-L', $iUrl);
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
