<?php 

function curl($url)
{
    $curlHandle = curl_init(); 
    curl_setopt($curlHandle, CURLOPT_URL, $url);    
    curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, TRUE); 
    curl_setopt($curlHandle, CURLOPT_BINARYTRANSFER,TRUE);
    
    $data = curl_exec($curlHandle);
    curl_close($curlHandle);    
    return $data ;
} 
 
?>
