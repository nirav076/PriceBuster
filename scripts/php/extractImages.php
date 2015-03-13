<?php

/*-----------------------------------------
    Name :extractImages.php
    Author:Ranjit Mishra
    Date: April 10th 2013
--------------------------------------------*/


/*Function to extract the images and place them to images directory with 
name as  : /images/<category>/<productId> */

require_once "./curl.php";
require_once "./productClass.php";
require_once "./printData.php";

function extractImages($myProduct,$category)
{
   
       if(!$image = curl($myProduct->getImage()))
         $image = curl($myProduct->getImage());    //If No image , we try just once more                                           //Download Image upto three tries
   
    $productImagePath = "../../images/$category/".$myProduct->getId().".jpg";
    file_put_contents($productImagePath, $image);   // store the image at the location 

    return $productImagePath ; // return the image path 
    
}
