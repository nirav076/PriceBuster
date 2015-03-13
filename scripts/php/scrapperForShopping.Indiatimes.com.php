
<?php

require_once "./curl.php";
require_once "./printData.php";
require_once "./productClass.php";
require_once "./initialiseProduct.php";
require_once "./getElementsByClassName.php";
require_once "./enterToDatabase.php";
require_once "./extractImages.php";
require_once "./extractDataShopping.IndiatimesMobile.com.php";

$file = "../../resourceFolder/mobiles.shopping.indiatimes.com.html";
set_time_limit(0); 
$index = 0; 
//$data = $file ;

 
do 
{
    $url = "http://shopping.indiatimes.com/mobiles/mobiles-mobile-handsets-smart-phones/?start=".$index;
    $data = curl($url) ;
    $products = extractDataIndiatimesMobile($data);
    
    enterToDatabase($products,"mobiles","indiatimes");
    $index +=32 ;
}
while($index <= 64);

// After everything has been 
$query = 'UPDATE onlineStore SET lastUpdated = NOW() WHERE storeName = "indiatimes"';

$mySqlHandle = connectToDatabase();
if(!mysqli_query($mySqlHandle, $query))
{
    die("\n Could Not Update with \n".$query." \n ".mysqli_errno($mySqlHandle));
}

mysqli_close($mySqlHandle);

?>

