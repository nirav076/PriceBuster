
<?php

require_once "./curl.php";
require_once "./printData.php";
require_once "./productClass.php";
require_once "./initialiseProduct.php";
require_once "./getElementsByClassName.php";
require_once "./extractDataSnapdealMobile.com.php";
require_once "./enterToDatabase.php";

set_time_limit(0);

//$file = "../../resourceFolder/mobiles.snapdeal.com.html";

$url = 'http://www.snapdeal.com/products/mobiles-mobile-phones';
$url .='?q=Price%3A999%2C56599&sort=plrty&storeID=mobiles-mobile-phones_wdgt4in1';
$url .= '_Widest%20Range%20of%20Mobiles';

$data = curl($url) ; 

//$data = $file;
$products = extractDataSnapdealMobile($data);

//printData($products);
enterToDatabase($products,"mobiles","snapdeal");

// After everything has been 
$query = 'UPDATE onlineStore SET lastUpdated = NOW() WHERE storeName = "snapdeal"';

$mySqlHandle = connectToDatabase();
if(!mysqli_query($mySqlHandle, $query))
{
    die("\n Could Not Update with \n".$query." \n ".mysqli_errno($mySqlHandle));
}

mysqli_close($mySqlHandle);
?>

