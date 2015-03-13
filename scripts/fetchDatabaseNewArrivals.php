<?php
	include "C:/wamp/www/PriceBuster/OO_Code/connectToDatabase.php";
	$query = "SELECT max(productId) from products WHERE time=(SELECT max(time) FROM products);";

	if($result = mysqli_query($con,$query)) $row = mysqli_fetch_row($result);
	else
	{
		echo "Error : ".mysqli_error($con);
	}

	echo "<img src='/codeRanjit/PriceBuster.com/images/a.jpg' alt='New Product' />";
	mysqli_close($con);
?>