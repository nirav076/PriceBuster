<?php 
/******************************************************
Author:Ranjit Mishra
Date :April 28th 2013
About: This function takes in a productId and category
       and echos the product HTML string
*******************************************************/

function createProduct()
{
    $productString = '<a href = "#"><div class = "product">
                       <img src = "../images/preloader.gif"';
    $productString .= 'class = "preloaderImage"';
    $productString  .= 'alt = "Image Unavailable" />';
   
    $productString .= '<div class = "productDetails">
                         <span class = "productName"></span>
                         <span class = "currency inr">₹</span>
                         <span class = "productPrice"></span> 
                       </div>';
      
    $productString .=' </div></a>';
   return $productString;
}

?>
