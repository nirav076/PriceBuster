<?php

function printData($products)
{   
    
       
    foreach($products as $product)
    {   
        
        echo "<b>Name :</b>".$product->getName()."<br/>";
        echo "<b>Manufacturer :</b>".$product->getCompany()."<br/>";
        echo "<b>Price:</b>".$product->getPrice()."<br/>";
        echo "<b>Image:</b>".$product->getImage()."<br/>";
        echo "<b>Page Link :</b>".$product->getLinkToProductPage()."<br/><br/>";       
    }
    
    return ; 
}

?>
