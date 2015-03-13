<?php

function getElementsByClassName($documentHandle, $className)
{
   $elementsOfClass = array(); //This array stores the elements of the class $className
   $allElements = $documentHandle->getElementsBytagName("*"); // It gets all the Elements
                       
   foreach($allElements as $element)
   {
        if($element->getAttribute("class")==$className)
        {
            array_push($elementsOfClass, $element); //Checking for the $className
        }     
   }  
   
   return $elementsOfClass ;
}
?>
