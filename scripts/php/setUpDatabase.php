<?php
	
	include "./connectToDatabase.php";

     $con = connectToDatabase(); // Connecting to the database with the default values           

	/********Connection Established**********/
	$query = "CREATE TABLE IF NOT EXISTS categoryOfProduct (categoryId TINYINT NOT NULL AUTO_INCREMENT,
													categoryName VARCHAR(25) NOT NULL UNIQUE,
													PRIMARY KEY(categoryId)
													)ENGINE=INNODB;";
	
	if(mysqli_query($con,$query))echo "\n"."Table Created: categoryOfProduct";
	else
  		{
  			echo "\n"."Error creating table categoryOfProduct: " . mysqli_error($con);
  		}

	/******categoryOfProduct TABLE CREATED*******/

	$query = "CREATE TABLE IF NOT EXISTS product (productId MEDIUMINT NOT NULL AUTO_INCREMENT,
													productName VARCHAR(100) NOT NULL,
													companyName VARCHAR(25) NOT NULL,
													categoryId TINYINT NOT NULL,
													
													overallRating DECIMAL(2,1) NOT NULL DEFAULT '0',
													popularity SMALLINT NOT NULL DEFAULT '0',
													
													PRIMARY KEY(productId),
													UNIQUE(productName),
													FOREIGN KEY(categoryId)
													REFERENCES categoryOfProduct(categoryId)
													ON UPDATE CASCADE ON DELETE CASCADE
													
													)ENGINE=INNODB;";
	
	if(mysqli_query($con,$query))echo "\n"."Table Created: product";
	else
  		{
  			echo "\n"."Error creating table product: " . mysqli_error($con);
  		}
  	/******product TABLE CREATED(references categoryOfProduct)*******/

  	$query = "CREATE TABLE IF NOT EXISTS onlineStore (storeId MEDIUMINT NOT NULL AUTO_INCREMENT,
  													  storeName VARCHAR(25) NOT NULL DEFAULT '',
  														
  													  lastUpdated TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  													
  														PRIMARY KEY(storeId),
  														UNIQUE(storeName)
													)ENGINE=INNODB;";
	
	if(mysqli_query($con,$query))echo "\n"."Table Created: onlineStore";
	else
  		{
  			echo "\n"."Error creating table onlineStore: " . mysqli_error($con);
  		}
  	/******onlineStore TABLE CREATED*******/

	$query = "CREATE TABLE IF NOT EXISTS productInfo (
  														productName VARCHAR(100) NOT NULL,
  														storeId MEDIUMINT NOT NULL,
  														productPrice FLOAT(8,2) DEFAULT '0',
  														lastUpdated TIMESTAMP NOT NULL,
  														productPageUrl VARCHAR(255) NOT NULL DEFAULT '',
  														
  														PRIMARY KEY(productName,storeId),

  														FOREIGN KEY(productName) 
  														REFERENCES product(productName)
  														ON UPDATE CASCADE ON DELETE CASCADE,

  														FOREIGN KEY(storeId) 
  														REFERENCES onlineStore(storeId)
  														ON UPDATE CASCADE ON DELETE CASCADE
													)ENGINE=INNODB;";
	
	if(mysqli_query($con,$query))echo "\n"."Table Created: productInfo";
	else
  		{
  			echo "\n"."Error creating table productInfo: " . mysqli_error($con);
  		}
  	/******productInfo TABLE CREATED(references product and onlineStore)*******/  	

  	$query = "CREATE TABLE IF NOT EXISTS priceAlert (alertId MEDIUMINT NOT NULL AUTO_INCREMENT,
  														productId MEDIUMINT NOT NULL,
  														targetPrice INT NOT NULL,
  														mobileNo VARCHAR(10),
  														emailAddress VARCHAR(50),
  														time TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

  														PRIMARY KEY(alertId),

  														FOREIGN KEY(productId) 
  														REFERENCES product(productId)
  														ON UPDATE CASCADE ON DELETE CASCADE
													)ENGINE=INNODB;";
	
	if(mysqli_query($con,$query))echo "\n"."Table Created: priceAlert";
	else
  		{
  			echo "\n"."Error creating table priceAlert: " . mysqli_error($con);
  		}
  	/******priceAlert TABLE CREATED(references product)*******/  	


  	$query = "CREATE TABLE IF NOT EXISTS rating (rating INT(1) NOT NULL DEFAULT '0',
  														productId MEDIUMINT NOT NULL,
  														
  														FOREIGN KEY(productId) 
  														REFERENCES product(productId)
  														ON UPDATE CASCADE ON DELETE CASCADE
													)ENGINE=INNODB;";
	
	if(mysqli_query($con,$query))echo "\n"."Table Created: ratings";
	else
  		{
  			echo "\n"."Error creating table rating: " . mysqli_error($con);
  		}
  	/******ratings TABLE CREATED(references product)*******/  	


  	$query = "CREATE TABLE IF NOT EXISTS missingStore (storeName VARCHAR(100),
  														time TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  														PRIMARY KEY(storeName,time)
                                                       )ENGINE=INNODB;";
	
	if(mysqli_query($con,$query))echo "\n"."Table Created: missingStore";
	else
  		{
  			echo "\n"."Error creating table missingStore: " . mysqli_error($con);
  		}
  	/******misssingStore TABLE CREATED(references product)*******/  	

  	$query = "CREATE TABLE IF NOT EXISTS error (time TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  														productId MEDIUMINT NOT NULL,
  														 														
  														PRIMARY KEY(time),

  														FOREIGN KEY(productId) 
  														REFERENCES product(productId)
  														ON UPDATE CASCADE ON DELETE CASCADE
										        )ENGINE=INNODB;";
	
	if(mysqli_query($con,$query))echo "\n"."Table Created: error";
	else
  		{
  			echo "\n"."Error creating table error: " . mysqli_error($con)."\n";
  		}
  	/******error TABLE CREATED(references product)*******/ 

/* Entering into categoryOfProduct some predefined categories */ 

    $categories = array("mobiles","cameras","digitalTelevisions","laptops");
    
    foreach($categories as $myCategory)
    {
       if(!mysqli_query($con,'INSERT INTO categoryOfProduct(categoryName) VALUES("'.$myCategory.'");'))
        echo "\ncannot insert values ". mysqli_error($con);
        
    }
    
  /****** error TABLE CREATED(references product) *******/ 
 
  $query = "CREATE TABLE IF NOT EXISTS company (companyName VARCHAR(25) NOT NULL,
  	                                              categoryId TINYINT NOT NULL ,
  	                                              
  	                                              PRIMARY KEY(companyName,categoryId),
  	                                              FOREIGN KEY(categoryId) REFERENCES 
  	                                              categoryOfProduct(categoryId)
  	                                              ON DELETE CASCADE
												)ENGINE=INNODB;";
	
	if(mysqli_query($con,$query))echo "\n"."Table Created: company";
	else
  		{
  			echo "\n"."Error creating table company: " . mysqli_error($con)."\n";
  		}	

    /****** company TABLE CREATED(references company)*******/     	

/* Entering into onlineStores some predefind store entries */


   $onlineStores = array("indiatimes","snapdeal","tradus","yebhi");
    
    foreach($onlineStores as $myOnlineStore)
    {
       if(!mysqli_query($con,'INSERT INTO onlineStore(storeName) VALUES("'.$myOnlineStore.'");'))
        echo "\ncannot insert values ". mysqli_error($con);
    }
    echo "\n";
/* End of onlineStore entries */

	mysqli_close($con);


