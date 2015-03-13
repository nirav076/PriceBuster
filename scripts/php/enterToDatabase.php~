<?php

/*--------------------------------------
    Name :extractImages.php
    Author:Ranjit Mishra
    Date: April 10th 2013
------------------------------------------*/

/* Function  to enter all the details into the table pricebuster */

require_once "./connectToDatabase.php";
include_once "./sanitizeInput.php";
require_once "./extractImages.php";
require_once "./createThumbnail.php";

define('mysqlDuplicateErrorCode',"1062");

function enterToDatabase($products,$category,$onlineStore)
{
    $mySqlHandle  = connectToDatabase();   //Connects to default database  
    
  foreach($products as $myProduct)
  {
    $myProduct->setName(sanitizeInput($myProduct->getName()));
    $myProduct->setPrice(sanitizeInput($myProduct->getPrice()));   
    $myProduct->setCompany(sanitizeInput($myProduct->getCompany()));
    $myProduct->setLinkToProductPage(sanitizeInput($myProduct->getLinkToProductPage())) ;

                            // Sanitizes all the values making input safe for database

/*-------------------------------------------------------------------------------------------*/

    $query = "select categoryId from categoryOfProduct where categoryName = '".$category."'";
    $result = mysqli_query($mySqlHandle, $query);
    if(!$result)
    {
        die ("\n Cannot get the categoryId , Query failed".mysqli_error($mySqlHandle));
    }
     
     $resultArray = mysqli_fetch_array($result);
     $categoryId  = $resultArray['categoryId']; 
                               
                                //get the categoryId to store from category Name 

/*-------------------------------------------------------------------------------------------*/
     
    $query = "select storeId from onlineStore where StoreName = '".$onlineStore."'";
    $result = mysqli_query($mySqlHandle, $query);
    if(!$result)
    {
        die ("\n Cannot get the StoreId , Query failed".mysqli_error($mySqlHandle));
    }                           
     
     $resultArray = mysqli_fetch_array($result);
     $storeId  = $resultArray['storeId'];                                
                                
                                
                                //get the StoreId to store from $onlineStore  in param 
                                
/*-------------------------------------------------------------------------------------------*/
                                
    $query = 'insert into product(productName, companyName, categoryId) values ("';
    $query .= $myProduct->getName().'","'. $myProduct->getCompany().'","'.$categoryId.'")';
    
    if(!mysqli_query($mySqlHandle, $query)) // values entered into the products table
      {      
            if(mysqli_errno($mySqlHandle)==mysqlDuplicateErrorCode)
                {                               //if values cannot be entered look for the duplicate error
                    enterDuplicateToProductInfo($myProduct,$mySqlHandle,$storeId);
                }
              else                
                die ("\n Cannot Execute Insert Operation on Product ".mysqli_errno($mySqlHandle).mysqli_error($mySqlHandle));

                                  // Insert the values: productName , companyName and  categoryId to 
                                 // product table
                                // If error is other than duplicate error die()  
       }
     else
     {
            $query = "select MAX(productId) from product";
            $result = mysqli_query($mySqlHandle, $query);
            $resultArray = mysqli_fetch_array($result);
            $myProduct->setId($resultArray[0]); 
            
            $imagePath = extractImages($myProduct,$category);
            createThumbnail($imagePath);
        }
      // Call the function to extract and store the image 
    
/*-------------------------------------------------------------------------------------------*/

   enterDuplicateToProductInfo($myProduct,$mySqlHandle,$storeId); 
                   //Even if single value , enter into ProductInfo Table
                   
                   
   $query = 'INSERT INTO company(companyName, categoryId) VALUES ("';
   $query .= $myProduct->getCompany().'","'.$categoryId.'")';
   
   if(!mysqli_query($mySqlHandle,$query))
        if(mysqli_errno($mySqlHandle)== mysqlDuplicateErrorCode);
        else
            {
                echo("\nCould not execute query :\n".$query);
                echo("\nError:".mysqli_errno($mySqlHandle).mysqli_error($mySqlHandle))  ;
                die();           
            }
                  // If duplicate values exist do nothing 

/*-------------------------------------------------------------------------------------------*/
   
  } 
   mysqli_close($mySqlHandle);      // Closing the databse handle ! 
}


function enterDuplicateToProductInfo($myProduct,$mySqlHandle,$storeId)
{

    $query = 'INSERT INTO productInfo(productName, storeId, productPrice, productPageUrl) values(';
    $query .= '"'.$myProduct->getName().'","'.$storeId.'","';
    $query .= $myProduct->getPrice().'","'.$myProduct->getLinkToProductPage().'")';  
                             // If duplicate values exist make entry into productInfo 
                             
    if (!mysqli_query($mySqlHandle,$query))
      if(mysqli_errno($mySqlHandle)== mysqlDuplicateErrorCode);
      else              
        die ("\n cannot Execute Insert Operation on productInfo ".mysqli_errno($mySqlHandle).mysqli_error($mySqlHandle)); 
                 
                   //If here to duplicate value , do nothing    
}
?>
