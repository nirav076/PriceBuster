<?php
	
	function insertData($con,$category,$storeName,$products)
	{
		include "./saveImage.php";
		$query = "SELECT categoryId FROM categoryOfProduct WHERE categoryName='".$category."';";
		$result = mysqli_query($con,$query);
		$result = mysqli_fetch_array($result,MYSQLI_ASSOC);
		$categoryId = $result['categoryId'];
		echo "</br>category :".$categoryId;
		

		$success = 1;
		foreach ($products as $product) 
		{
			$query = "INSERT IGNORE INTO companyList (companyName, categoryId)
						VALUES ('".trim($product->getCompany())."','".$categoryId."');";

			if(mysqli_query($con,$query));
			else
			{
				echo "Error in inserting product name :".mysqli_error($con);
				$success = 0;
			}			

			/********entry in companyList(Refernced by products)******/

			$query = "INSERT INTO products (productName,companyName,categoryId,specificationDestination,review,overallRating,popularity)
						VALUES ('".trim($product->getName())."','".trim($product->getCompany())."','".$categoryId."','not done!','awsome product!!','3.1','0');";
			if(mysqli_query($con,$query));
			else
			{
				echo "Error in inserting product name :".mysqli_error($con);
				$success = 0;
			}

			/*******Entry in products TABLE*********/

			//store image in system
			$query = mysqli_query($con,"SHOW TABLE STATUS WHERE name='products'");
			if(!$query)
			{
				echo "Auto error:".mysqli_error($con);
			} 
			$row = mysqli_fetch_array($query,MYSQLI_ASSOC); 
			$next_inc_value = $row["Auto_increment"];
			echo "</br>Auto :".$next_inc_value;
			$imageUrl = trim($product->getImage());
			if($imageUrl!="Not Available.")
			saveImage($category,$next_inc_value-1,$imageUrl);
			else
				saveImage($category,$next_inc_value-1,"http://localhost/PriceBuster/images/notAvailable.jpeg");
															

		/******Image saved******/
			

			//echo "</br>Product name:".$product->getName();
			$result = mysqli_query($con,"SELECT productId FROM products WHERE productName='".trim($product->getName())."';");
			$productId = mysqli_fetch_array($result,MYSQLI_ASSOC);

			//echo "</br>Product name:".$storeName;
			$result = mysqli_query($con,"SELECT storeId FROM onlineStores WHERE storeName='".$storeName."';");
			$storeId = mysqli_fetch_array($result,MYSQLI_ASSOC);
			

			//echo "</br>ProductID:".$productId["productId"];
			//echo "</br>StoreID:".$storeId["storeId"];
			//echo "</br>Product price:".$product->getPrice();
			$query = "INSERT INTO productInfo (productId,storeId,productPrice,productPageUrl)
						VALUES ('".$productId["productId"]."','".$storeId["storeId"]."','".trim($product->getPrice())."','".trim($product->getLinkToProductPage())."');";
			echo "</br>Query :".$query."</br></br>";

			if(mysqli_query($con,$query));
			else
			{
				echo "</br>Error in inserting product name :".mysqli_error($con)."</br>";
				$success = 0;
			}
		/******Entry in productInfo******/
		}

	return $success; 
	}

?>