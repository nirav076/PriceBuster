<?php
	
	include "./connectToDatabase.php";

	/********Connection Established**********/
	$query = "CREATE TABLE IF NOT EXISTS categoryOfProduct (categoryId TINYINT AUTO_INCREMENT,
													categoryName VARCHAR(20) UNIQUE,
													PRIMARY KEY(categoryId)
													)ENGINE=INNODB;";
	
	if(mysqli_query($con,$query))echo "</br>Table Created: categoryOfProduct";
	else
  		{
  			echo "</br>Error creating table: " . mysqli_error($con);
  		}

	/******categoryOfProduct TABLE CREATED*******/

  $query = "CREATE TABLE IF NOT EXISTS companyList (companyName VARCHAR(10),
                                                    categoryId TINYINT,
                                                    PRIMARY key(companyName,categoryId),

                                                    FOREIGN key(categoryId)
                                                    REFERENCES categoryOfProduct(categoryId)
                                                    ON UPDATE CASCADE ON DELETE CASCADE
                                                    )ENGINE=INNODB;";
if(mysqli_query($con,$query))echo "</br>Table Created: companyList";
  else
      {
        echo "</br>Error creating table: " . mysqli_error($con);
      }

  /**********companyList TABLE CREATED*********/

	$query = "CREATE TABLE IF NOT EXISTS products (productId MEDIUMINT AUTO_INCREMENT,
													productName VARCHAR(100),
													companyName VARCHAR(10),
													categoryId TINYINT,
													specificationDestination VARCHAR(20),
													review TEXT,
													overallRating DECIMAL(2,1),
													popularity SMALLINT,
													PRIMARY KEY(productId),

													FOREIGN KEY(categoryId)
													REFERENCES categoryOfProduct(categoryId)
													ON UPDATE CASCADE ON DELETE CASCADE,

                          FOREIGN KEY(companyName)
                          REFERENCES companyList(companyName)
                          ON UPDATE CASCADE ON DELETE CASCADE
													)ENGINE=INNODB;";
	
	if(mysqli_query($con,$query))echo "</br>Table Created: products";
	else
  		{
  			echo "</br>Error creating table: " . mysqli_error($con);
  		}
  	/******products TABLE CREATED(references categoryOfProduct)*******/

  	$query = "CREATE TABLE IF NOT EXISTS onlineStores (storeId MEDIUMINT AUTO_INCREMENT,
  														storeName VARCHAR(20) UNIQUE,
  														homeUrl VARCHAR(30),
  														lastUpdated TIMESTAMP,
  														PRIMARY KEY(storeId)
													)ENGINE=INNODB;";
	
	if(mysqli_query($con,$query))echo "</br>Table Created: onlineStores";
	else
  		{
  			echo "</br>Error creating table: " . mysqli_error($con);
  		}
  	/******onlineStores TABLE CREATED*******/

	$query = "CREATE TABLE IF NOT EXISTS productInfo (infoId MEDIUMINT AUTO_INCREMENT,
  														productId MEDIUMINT NOT NULL,
  														storeId MEDIUMINT NOT NULL,
  														productPrice FLOAT(8,2),
  														lastUpdated TIMESTAMP,
  														productPageUrl VARCHAR(100),
  														PRIMARY KEY(infoId),

  														FOREIGN KEY(productId) 
  														REFERENCES products(productId)
  														ON UPDATE CASCADE ON DELETE CASCADE,

  														FOREIGN KEY(storeId) 
  														REFERENCES onlineStores(storeId)
  														ON UPDATE CASCADE ON DELETE CASCADE
													)ENGINE=INNODB;";
	
	if(mysqli_query($con,$query))echo "</br>Table Created: productInfo";
	else
  		{
  			echo "</br>Error creating table: " . mysqli_error($con);
  		}
  	/******productInfo TABLE CREATED(references products and onlineStores)*******/  	

  	$query = "CREATE TABLE IF NOT EXISTS priceAlert (alertId MEDIUMINT AUTO_INCREMENT,
  														productId MEDIUMINT NOT NULL,
  														targetPrice INT,
  														mobileNo INT(10),
  														emailAddress VARCHAR(20),
  														time TIMESTAMP,

  														PRIMARY KEY(alertId),

  														FOREIGN KEY(productId) 
  														REFERENCES products(productId)
  														ON UPDATE CASCADE ON DELETE CASCADE
													)ENGINE=INNODB;";
	
	if(mysqli_query($con,$query))echo "</br>Table Created: priceAlert";
	else
  		{
  			echo "</br>Error creating table: " . mysqli_error($con);
  		}
  	/******priceAlert TABLE CREATED(references products)*******/  	


  	$query = "CREATE TABLE IF NOT EXISTS ratings (rating INT(1),
  														productId MEDIUMINT NOT NULL,
  														
  														FOREIGN KEY(productId) 
  														REFERENCES products(productId)
  														ON UPDATE CASCADE ON DELETE CASCADE
													)ENGINE=INNODB;";
	
	if(mysqli_query($con,$query))echo "</br>Table Created: ratings";
	else
  		{
  			echo "</br>Error creating table: " . mysqli_error($con);
  		}
  	/******ratings TABLE CREATED(references products)*******/  	


  	$query = "CREATE TABLE IF NOT EXISTS missingStore (storeName VARCHAR(20),
  														time TIMESTAMP,
  														PRIMARY KEY(storeName,time)
                              )ENGINE=INNODB;";
	
	if(mysqli_query($con,$query))echo "</br>Table Created: missingStore";
	else
  		{
  			echo "</br>Error creating table: " . mysqli_error($con);
  		}
  	/******misssingStore TABLE CREATED(references products)*******/  	

  	$query = "CREATE TABLE IF NOT EXISTS error (time TIMESTAMP,
  														productId MEDIUMINT NOT NULL,
  														 														
  														PRIMARY KEY(time),

  														FOREIGN KEY(productId) 
  														REFERENCES products(productId)
  														ON UPDATE CASCADE ON DELETE CASCADE
													)ENGINE=INNODB;";
	
	if(mysqli_query($con,$query))echo "</br>Table Created: error</br>";
	else
  		{
  			echo "</br>Error creating table: " . mysqli_error($con)."</br>";
  		}
  	/******error TABLE CREATED(references products)*******/  	

	mysqli_close($con);

?>