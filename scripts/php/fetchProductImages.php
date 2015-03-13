<?php
/*****************************************************************

Author: Ranjit Mishra
Date: 1 May 2013
About: This script is to retrieve the images asynchonously through 
ajax unobtrusively . 

*****************************************************************/
require_once "./connectToDatabase.php";
require_once "./productClass.php";

$type = $_GET["type"];
$category = $_GET["category"];
$limit = $_GET["limit"];

$firstString = "";
$middleString = "";
$lastString = "";
$limitString = "";

switch($type)
{
    case "mostPopularProducts": 
    
    $firstString = 'select productId, product.productName, categoryName, min(productPrice) as productPrice,popularity from product, productInfo, categoryOfProduct where product.productName = productInfo.productName and product.categoryId = categoryOfProduct.categoryId';
    $lastString = 'group by product.productName order by popularity';
    break;
    
    case "mostPopularBrands":
    
    $firstString = 'select productId, product.productName, categoryName, min(productPrice) as productPrice,companyName from product, productInfo, categoryOfProduct where product.productName = productInfo.productName and product.categoryId = categoryOfProduct.categoryId';
    $lastString = 'group by companyName order by popularity';
    break;
    
    case "newArrivals":
    $firstString = 'select productId, product.productName, categoryName, min(productPrice) as productPrice from product, productInfo, categoryOfProduct where product.productName = productInfo.productName and product.categoryId = categoryOfProduct.categoryId';
    $lastString = 'group by product.productName order by lastUpdated';
    break;
    
    case "featured":
    $firstString = 'select productId, product.productName, categoryName, min(productPrice) as productPrice from product, productInfo, categoryOfProduct where product.productName = productInfo.productName and product.categoryId = categoryOfProduct.categoryId';
    $lastString = 'group by product.productName order by overallRating';
    break;
    
    default:return 0;
}       // prepare the queries for the types 

switch($category)
{
    case "all":$middleString = ' '; // a space 
              break;
    case "mobiles":
    case "cameras":
    case "digitalTelevisions":
    case "laptops":$middleString = 'and categoryName = "'.$category.'"';
                   break; 
    default : return 0;
}   // preapare the query strings for the categories 

if($limit>18) $limit = 18; // 2 contents in a slider is the max current under consideration
    $limitString = "limit ".$limit;


$query = $firstString." ".$middleString." ".$lastString." ".$limitString;
            // Concatenate all the parts separated by spaces to create the entire query string 

$products = array() ;  // This would hold the values of the products Retrieved from database 
            
$mySqlHandle = connectToDatabase(); // Establish the  conection to the database 

if($resultSet = mysqli_query($mySqlHandle,$query))  // check for valid result set 
{
    while($resultRow = mysqli_fetch_array($resultSet,MYSQLI_ASSOC))
    {
                        // get the associative array in ResultRow
            $myProduct = new product(); /* We shall have to include the
                                            file productClass.php for this */ 
            
            $myProduct->setId($resultRow['productId']);
            $myProduct->setName($resultRow['productName']);
            $myProduct->setPrice($resultRow['productPrice']);
            $myProduct->setCategory($resultRow['categoryName']);
            $myProduct->setCompany($resultRow['companyName']);
            $products[] = $myProduct;   
    }       //End of while Loop

$echoString = "";
foreach($products as $myProduct)
 {
     $echoString .= $myProduct->getId();
     $echoString .=":".$myProduct->getName();
     $echoString .=":".$myProduct->getPrice();
     $echoString .=":".$myProduct->getCompany();
     $echoString .=":".$myProduct->getCategory().",";
  }       //End of foreach Loop
  echo $echoString;
}       //End of If condition
else return 0;
?>
