<?php

	function saveImage($category,$id,$imageUrl)
	{
		$ch = curl_init ($imageUrl);
    	curl_setopt($ch, CURLOPT_HEADER, 0);
    	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    	curl_setopt($ch, CURLOPT_BINARYTRANSFER,1);
    	$raw=curl_exec($ch);
    	curl_close ($ch);
    	$image = imagecreatefromstring($raw);

    	if($image !== false)
    	{
    		imagejpeg($image, "..\images\\".$category."\\".$id.".jpeg");
    		imagedestroy($image);
    	}

        list($oldWidth,$oldHeight) = getimagesize("..\images\\".$category."\\".$id.".jpeg");

        $newImage = imagecreatetruecolor(166,194);
        $oldImage = imagecreatefromjpeg("..\images\\".$category."\\".$id.".jpeg");     /*creating the images from file and thambnal in the memory  */

        imagecopyresampled($newImage,$oldImage,0,0,0,0,166,194,$oldWidth,$oldHeight);  /* creating a copy of image with resampling*/
        imagejpeg($newImage,"..\images\\".$category."\\thumbnail\\".$id.".Thumb.jpeg",100); /*Saving the image into image path withh 100% quality */

        $newImage = imagecreatetruecolor(250,293);
        imagecopyresampled($newImage, $oldImage, 0, 0, 0, 0, 250, 293, $oldWidth, $oldHeight);
        imagejpeg($newImage,"..\images\\".$category."\\".$id.".jpeg",100);

        imagedestroy($newImage);
        imagedestroy($oldImage);        /* freeing up memory from the image*/
    	return;
	}
?>