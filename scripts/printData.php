<?php

function printData($products)
{   
    
    $counter = 1;
    foreach($products as $product)
    {   
        echo $counter.":";
        echo "<b>Name :</b>".$product->getName()."<br/>";
        echo "<b>Company Name:</b>".$product->getCompany()."<br/>";
        echo "<b>Price:</b>".$product->getPrice()."<br/>";
        echo "<b>Image:</b>".$product->getImage()."<br/>";
        echo "<b>Page Link :</b>".$product->getLinkToProductPage()."<br/><br/>";       
        $counter++;
    }
    
    return ; 
}

?>
