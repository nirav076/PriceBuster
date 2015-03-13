<?php 
/****************************************
Author : Ranjit Mishra
Date:April 28th 2013
About: This file contains the function to 
       create the slider in the HTML taking  
       an array of Products 
*****************************************/


function createSlider($noOfSlides = 3,$productPerSlide = 3)
{
    $slideCounter = 0 ;
    
    $sliderString = '<div class = "roller">'; //roller begins 
    
    while($slideCounter < $noOfSlides)
    {
        $sliderString .='<div class  = "slide" currentSlide =';
        $sliderString .=($slideCounter == 0)?"\"true\"":"\"false\"";
        $sliderString .='>';
        
        for($productCounter = 0 ; $productCounter < $productPerSlide; ++$productCounter)
             $sliderString .= createProduct();
             
        $sliderString .='</div>';
          ++$slideCounter;
    } 
    
     $sliderString .='</div>';  
     echo $sliderString;
}   //Function ends 

?>
