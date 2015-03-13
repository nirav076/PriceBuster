<?php

/*---------------------------------

Author : Ranjit Mishra
Date : Sunday April 14th 2013

-----------------------------------*/

define('productThumbnailWidth',166);
define('productThumbnailHeight',194);

define('productImageWidth',225);
define('productImageHeight',322); /* defining some global constants for thumbnail size*/


function createThumbnail($oldImagePath)
{                       /*Function taking one patameter , Old image path */

        $newImagePath = dirname($oldImagePath)."/".basename($oldImagePath,".jpg")."Thumbnail.jpeg";

        // creating the new image path !
         
        list($oldWidth,$oldHeight) = getimagesize($oldImagePath);


    //    header("content-type: image/jpeg");
                                             /*other wise it wil just show garbage text 
                                            on screen, for saving file not necessary */
                                            
        $newImage = imagecreatetruecolor(productThumbnailWidth,productThumbnailHeight);
        
        $oldImage = imagecreatefromjpeg($oldImagePath);
                                                        /*creating the images from file and 
                                                        thumbnail in the memory */ 
                                                        
        imagecopyresampled($newImage,$oldImage,0,0,0,0,productThumbnailWidth,productThumbnailHeight,$oldWidth,$oldHeight);  /* creating a copy of image with resampling*/
        imagejpeg($newImage,$newImagePath,100); /*Saving the image into image path withh 100% quality */

/*-------------------------------------------------------------------------------*/

        $newImage = imagecreatetruecolor(productImageWidth,productImageHeight);
        imagecopyresampled($newImage,$oldImage,0,0,0,0,productImageWidth,productImageHeight,$oldWidth,$oldHeight);
        imagejpeg($newImage,$oldImagePath,100);
                    
                    /*creating another image and over writing the original with dimesions 
                          225*322   */
/*-------------------------------------------------------------------------------*/

        imagedestroy($newImage);
        imagedestroy($oldImage);        /* freeing up memory from the image*/

}

?>
