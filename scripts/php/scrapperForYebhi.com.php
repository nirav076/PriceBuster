
<?php

require_once "./curl.php";
require_once "./printData.php";
require_once "./productClass.php";
require_once "./extractDataYebhiMobile.com.php";
require_once "./initialiseProduct.php";
require_once "./getElementsByClassName.php";
require_once "./enterToDatabase.php";
require_once "./extractImages.php";

set_time_limit(0);

//$file = "../../resourceFolder/mobiles.yebhi.com.html";

$index = 0; 
//$data = $file ;

 
do 
{
    $url = "http://www.yebhi.com/online-shopping/mobile-store/mobiles-and-tablets/";
    $url .= "mobile-phones.html?affint=MobileFlyMenu&source=menu&od=10&startIndex=".$index;
    
    $data = curl($url) ;    // Download the file 
    $products = extractDataYebhiMobile($data);
    enterToDatabase($products,"mobiles","yebhi");
    $index += 50;
}
while($index <= 200);

// After everything has been 
$query = 'UPDATE onlineStore SET lastUpdated = NOW() WHERE storeName = "yebhi"';

$mySqlHandle = connectToDatabase();
if(!mysqli_query($mySqlHandle, $query))
{
    die("\n Could Not Update with \n".$query." \n ".mysqli_errno($mySqlHandle));
}

mysqli_close($mySqlHandle);

?>

