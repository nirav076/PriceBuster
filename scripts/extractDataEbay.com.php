<?php
include "./ebayGetPureName.php";

function extractDataEbay($data,$categoryOfProduct)
{
    $products = array();        // Creating an array of Products on the page
            
    $itemNames = array();       // Creating an array to store the product names
    $companyNames = array();    //Company Name
    $prices = array();          //and Product Prices
    $linksToProductPage = array();  // and Link to each Products main Page 
    $images = array();               // and the image available on the current page   
    
    $doc = new DOMDocument();

    @$html=$doc->loadHTML($data);      // Creting and loading the received HTML file
    
    $productContainer = $doc->getElementById("ResultSetItems");    // loading the product wrapper         
    $anchors = $productContainer->getElementsByTagName("a"); // loading all the links per product wrapper     
    $divs = $productContainer->getElementsByTagName("div"); // loading all the divs per product wrapper      
    $tds = $productContainer->getElementsByTagName("td"); // loading all the images td->a->img  

    
    foreach($anchors as $anchor)
    {
        if($anchor->getAttribute("class")=="vip")
        { 
              $name = getPureName($anchor->nodeValue,$categoryOfProduct);//get Name which is uniform and standard
              array_push($itemNames,$name);  // This node value has the product Name 
              $company = substr($name, 0,strpos($name, " "));
              array_push($companyNames,$company);
              array_push($linksToProductPage,$anchor->getAttribute("href")); // This has the link to the main product Page      
        }
    }
                

    foreach($divs as $div)
    {
        if($div->getAttribute("class")=="g-b")
        {     
              $price = $div->nodeValue;
              $price=preg_replace("/(,)/", "",$price);
              preg_match("/(\d)+(?=\.)/",$price,$matches);//remove Rs.
              array_push($prices, $matches[0]);    // This node has the Price of Product   
        }
    }
   
   foreach ($tds as $td) {
      if($td->getAttribute("class")=="pic lt ipic img")
      {
        $as=$td->getElementsByTagName("a");
        if($as->length!=0)
        {
          if($as->item(0)->hasAttribute("imgurl"))$images[]=$as->item(0)->getAttribute("imgurl");
          else
          {
            $img=$as->item(0)->getElementsByTagName("img");
            $images[]=$img->item(0)->getAttribute("src");
          }
        }
        else
          $images[]="Not Available.";
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
