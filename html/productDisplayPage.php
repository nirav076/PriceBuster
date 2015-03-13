<!DOCTYPE html>
  <?php
    require_once "../scripts/connectToDatabase.php"; 
    $productId = 3;
    
    $sql = "SELECT categoryName,categoryId FROM `categoryofproduct` WHERE categoryId=(select categoryId FROM products where productId=".$productId.")";
    $row = mysqli_fetch_array(mysqli_query($con,$sql), MYSQLI_ASSOC);
    $categoryofproduct = $row["categoryName"];
    $categoryId = $row["categoryId"];

    $sql = "SELECT productName,overallRating FROM `products` WHERE productId=".$productId; 
    $row = mysqli_fetch_array(mysqli_query($con,$sql), MYSQLI_ASSOC);
    $productName = $row["productName"];
    $ratings = $row["overallRating"];

    $sql = "SELECT onlineStores.storeName,productPrice,productPageUrl FROM `onlinestores`,`productInfo` WHERE onlinestores.storeId=productInfo.storeId and productId=".$productId;
    $storeName = array();
    $productPrice = array();
    $productPageUrl = array();
    $result = mysqli_query($con,$sql);
    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
    {
      array_push($storeName, $row["storeName"]);
      array_push($productPrice, $row["productPrice"]);
      array_push($productPageUrl, $row["productPageUrl"]);
    }


  ?>
    <html lang = "en">
        <head>
            <meta charset = "utf-8">
            <title>Product Page </title>
            <link rel = "stylesheet" href = "../css/siteWideGeneralStyle.css">
            <link rel = "stylesheet" href = "../css/productPageSpecificStyle.css">
            <link rel = "stylesheet" href = "../css/productPageOther.css">
            <link rel = "stylesheet" href = "../css/exp.css">
            <link rel = "stylesheet" href = "../css/star.css">
            <script src="../javascript/exp.js"></script>

        </head>
        <body>
             <div class = "siteHeader">
                     <!-- Social Icon Bar Begins -->
                 <ul class = "socialIconBar">          <!-- links to social Sites -->
                    <li  class = "socialIcons" id = "facebookIcon"><a href = "#"><img alt = "facebook Social Icon " src = "../images/facebook.png" /></a></li>
                    <li class = "socialIcons" id = "twitterIcon"><a href = "#"><img alt = "twitter Social Icon " src = "../images/twitter.png" /></a></li>
                    <li class = "socialIcons" id = "rssIcon"><a href = "#"><img alt = "rss Social Icon " src = "../images/rss.png" /></a></li>
                 </ul> 
            <!-- End Of Social Icon Bar-->                          
            <!-- social bar ends-->
            
          
           <!-- header which will have search and logo -->
             
                
             <div class = "ribbon leftSidedRibbon" id = "productPageLogoRibbon">
             </div>
        
             <div class = "searchBar" id = "inCategorySearchBar">  <!-- Bar for Search box and Button -->
                 <input class = "searchInput" id = "inCategorySeachInput" placeholder = "Enter Your Search Here ..." maxlength = "70"/>
                 <a class = "searchButton" id = "inCategorySearchButton" href = "#">Search</a>
            </div>      <!-- home page search bar ends-->
        </div>                      
 
             <!--Site header Ends-->
             
             <!--Content Body Begins-->
         <div class = "contentBody"> 
         
               <!-- product begins -->
            <div class = "display" id = "productPageProduct">
              
                 <div id = "productImagePrice">
                    
                    <div id = "productImage">
                        <?php
                          $minUrl = $productPageUrl[0];
                          echo "<a href='".$minUrl."'>";
                          echo "<img src='../images/".$categoryofproduct."/".$productId.".jpeg' alt='Apple iphone 5'/>";
                          echo "</a>";
                        ?>
                    </div>
                    
                    <div id = "productNamePrice">
                      <div id = "price">
                        <h2>
                          <?php
                            $minStoreName = $storeName[0]; 
                            echo $productName;
                            $minPrice = $productPrice[0];
                          ?>
                        </h2>
                      Best price Rs. <span><?php echo $minPrice; ?></span>
                      </div><!-- End of price id-->

                      
                    </div><!-- End of productNamePrice-->
                 
                    <div id = "detailLinks">
                      <div id = "button">
                      at<img src="../images/ebay.jpg" alt="ebay.in" align="center"/>
                        <a id="buyNowButton" href='<?php echo $minUrl ?>;>' target='_blank'>Buy Now</a>
                      </div>
                      <div id='links'>
                        <a href="#productPageProductDetails"><p>View all sellers</p></a>
                        <a href="#productPageProductDetails"><p>Specifications</p></a>
                        <a href="#productPageProductDetails"><p>Review</p></a>
                      </div></br>

                      <div id = "ratings">
                        
                        <ul class="rating">
                          <li><a href="#" title="1 Star">1</a></li>
                          <li><a href="#" title="2 Stars">2</a></li>
                          <li><a href="#" title="3 Stars">3</a></li>
                          <li><a href="#" title="4 Stars">4</a></li>
                          <li><a href="#" title="5 Stars">5</a></li>
                        </ul>
                        
                        <p><?php
                          echo $ratings;
                        ?>based on 14 ratings</p>
                      </div><!--end of Ratings-->
                    </div><!--end of datalinks-->
                    
                 </div><!-- End of productImagePrice-->
                 
                 <div class = "footer" border-style="solid">
                 </div> <!-- End of footer -->
            </div>
                   <!-- product Ends-->

                   
              <!-- TopShops -->     
            <div class = "display" id = "productPageTopShops">
                <div class = "header headerLess">                  
                  
                </div>
                 
                <div class = "content" id = "productPageTopShopsContent">
                </div>
                
                <div class = "footer">
                </div> <!-- End of footer -->
            </div>
                 <!--topShops Ends-->  


                
                <!-- Product Details-->
               <div class = "display" id = "productPageProductDetails">
                <div class = "header">

                    <div class = "ribbon leftSidedRibbon greenRibbon" id = "productPageProductDetailsRibbon">
                        <span class = "ribbonHeader" id = "productPageProductDetailsRibbonHeader">Product Details</span>
                    </div>
                    
                    <ul class = "horizontalMenu" id="productDetail">
                        <li class = "menuEntry" id="comparePrice"><a href = "javascript:showDiv('comparePrices','specifications','review')">Compare Prices</a></li>
                        <li class = "menuEntry" id="specification"><a href = "javascript:showDiv('specifications','comparePrices','review')">Specifications</a></li>
                        <li class = "menuEntry" id="rev"><a href = "javascript:showDiv('review','comparePrices','specifications')">Reviews</a></li>
                    </ul>

                 </div>  <!-- header ends -->
                 
                 <div class = "content" id = "productPageProductDetailsContent">
                    
                    <!-- Content of Compare Prices-->
                    <div id="comparePrices">
                         
                        <?php
                          for ($i=1; $i<count($storeName) ; $i++) { 
                            echo "<ul id='button'>";
                            echo "<li><img src='../images/".$storeName[$i].".jpg' alt='ebay.in' align='center'/></li>";
                            echo "<li id='price'>Rs.".$productPrice[$i]."</li>";
                            echo "<li id=buyButton><a id='buyNowButton' href='".$productPageUrl[$i]."' target='_blank'>Buy Now</a></li>";
                            echo "</ul></br>";
                          }
                        ?>                                          
                        
                    </div>

                    <!-- Content of Specifications -->
                    <div id="specifications">
                      <table>
                      <tr><td>Operating Frequency / Network Type</td><td>GSM 850 / 900 / 1800 / 1900</td></tr>
                      <tr><td>SIM Network Type</td><td>GSM</td></tr>
                      <tr><td>Weight</td><td>185 G</td></tr>
                      <tr><td>Colors</td><td>Black, Gray, Red, Yellow, White</td></tr>
                      <tr><td>Bluetooth</td><td>Yes, v3.0 with A2DP, EDR</td></tr>
                      <tr><td>USB</td><td>Yes, microUSB v2.0</td></tr>
                      <tr><td>Battery Capacity</td><td>Li-ion,2000 mAH</td></tr>
                      <tr><td>Music player</td><td>Yes, Music Formats : MP3, ASF, WAV, MP4, AAC, AMR</td></tr>
                      
                      </table>
                    </div>

                    <!-- Content of Photos -->
                    <div id="review">
                      <p align='justify' font='sans-serif'>This product is a new gift by Nokia in the very famous and successful Lumia series, which supports wireless charging. The Finnish handsets maker, Nokia, has some way back launched the highest ever 41 megapixels camera sensor smartphone, Nokia PureView 808, which was very warmly welcomed by the Indian customers. The company has again created the magic with Nokia Lumia 920 that has the same PureView camera, but this time it is 16 megapixels only. The body built of this phone is very attractive and to make it more appealing the company designed various vibrant colored body cover for this smartphone. The Lumia series is doing a good business in the market and with the time to come it is supposed that this will also boost up the decreased market share of Nokia. The display of this droid is very sharp and crystal clear. Unlike the PureView 808, this smartphone is not running on the Symbian operating system but it has the very new and advanced Microsoft Windows Phone 8, Apollo, operating system that brings a whole new experience at your feet. Another most appealing feature of this phone is its Dual core 1.5 GHz processor that makes the processing speed of this beast pretty fast, like the lightening in the sky. The only drawback with this smartphone is that it does not hold any microSD card slot, so you cannot extend the external memory of the device.</p>
                      <p align='justify'>This product has an AMOLED capacitive touchscreen with multi touch facility. The 4.5 inches wide display provides a screen resolution of 720 x 1280 pixels with 16 million colors conspiring to make so many color combinations. The 326 ppi of pixel density brings real life like look to the device thus you will feel everything moving on the screen is real and you can touch it with your naked hands. Not only the screen, but the sound quality of this handsets also very good and of superior quality. The Internet connectivity options like EDGE, GPRS, 3G with HSPA+ speed, Wi-Fi, etc. delivers very fast connectivity speed and to add more usability to this, you will also find GPS navigation application in the device. The internal storage capacity of this phone is 32GB with 1GB space for RAM. The camera has Carl Zeiss Optics and the lens has auto focus feature with support of LED flash. This camera completely depends on the PureView technology and this shooter can also record 1080 pixel videos by capturing 30 frames per second.</p>
                      <p align='justify'>This product is also the owner of very robust and strong battery that delivers you a fair enough talk time and standby time.</p>
                      <h5 style="color:'green';">Overall Review</h5>
                      <p align='justify'>This product is a new flagship Lumia phone that runs on the latest and most advanced Microsoft Windows Phone 8, Apollo, operating system. The Finnish handset maker, Nokia, has come up with a new smartphone based on the totally different platform and very unique technology. To boost up the sales of Nokia phones in the market, the company is every now and then releasing a new handset that holds some special features, like Nokia 808 PureView that holds a camera of 41 megapixels. Nokia Lumia 920 also has something very special and unique that makes it stand out of the queue and this special feature is its ability to get charged wirelessly. It sounds amazing, as now you do not have to keep your phone away to charge it. You simply have to put your device on any of the Qi-compatible charger and it will get charged automatically without having any wire connection. All you need to do is to attach the Wireless Charging Shell to your device and make it rest on the Fatboy pillow and it will start charging on its own.</p>
                    </div>

                 </div>
                 
                 <div class = "footer">
                 </div> <!-- End of Product Details  -->
              </div>

           <div class = "rightPanel">
               <!-- Compare Mobiles -->
              <div class = "display" id = "productPageCompareProducts">
                 
                <div class = "header">
                    <div class = "ribbon leftSidedRibbon blueRibbon" id = "productPageCompareProductsRibbon">
                        <span class = "ribbonHeader" id = "productPageCompareProductsRibbonHeader">Compare Products</span>
                    </div>
                 </div>  <!-- header ends -->
                               
                 <div class = "content" id = "productPageCompareProducts">
                    <div id = "compareProduct">
                      <form name="compareProduct">

                        <?php
                          
                          $sql = "SELECT DISTINCT productInfo.productId, productName, productPrice FROM `productinfo`,`products` WHERE productInfo.productId=products.productId AND productPrice BETWEEN ".($minPrice-2000)." AND ".($minPrice+2000)." AND productInfo.productId !=".$productId."  AND categoryId =".$categoryId."  LIMIT 0, 10 ";
                          $result = mysqli_query($con,$sql);
                          $productNameComp = array();
                          $productIdComp = array();
                          $productPriceComp = array();
                          while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
                          {
                            array_push($productNameComp, $row["productName"]);
                            array_push($productIdComp, $row["productId"]);
                            array_push($productPriceComp, $row["productPrice"]);
                          }

                          for ($i=0; $i < count($productIdComp); $i++) { 
                            echo "<ul id = 'inner' align='left'>";
                            echo "<li><input type='checkbox' name='compareProduct' value='".$productIdComp[$i]."'></li>";
                            echo "<li id='imageBlock'><img src='../images/".$categoryofproduct."/thumbnail/".$productIdComp[$i].".thumb.jpeg' alt='".$productNameComp[$i]."' align=center></li>";
                            echo "<li id='detail'>".$productNameComp[$i]."</li>";
                            echo "</ul></br>";
                            echo "<hr/>";
                          }

                        ?>
                        
                         <div id='button'><a id="buyNowButton" href='#'>Compare</a> </div>
                       
                      </form>
                    </div>
                 </div>
                 
                 <div class = "footer">
                 </div> <!-- End of footer -->
             </div>
               <!-- Compare Mobiles Ends-->
                 
              <!-- set Price alerts -->
              <div class = "display" id = "productPageSetPriceAlerts">
                 <div class = "header">
                    <div class = "ribbon leftSidedRibbon yellowRibbon" id = "productPageSetPriceAlertsRibbon">
                        <span class = "ribbonHeader" id = "productPageSetPriceAlertsRibbonHeader">Set Price Alerts</span>
                    </div>
                 </div>  <!-- header ends -->
                 
                 <div class = "content" id = "productPageSetPriceAlertsContent">
                  <div id='setPriceAlert'>
                    <p id='msg' align='left'>Set Price alert and you will be notified when price of this product goes down than you Target Price</p></br>
                    <form name="setPriceAlert" align='left'>
                      
                      <div id='price'><b>Current lowest Price : </b><?php echo "Rs.".$minPrice; ?></div></br>
                      <table style="border:none;">
                      <tr><td><label><b>Target Price : </b></label></td><td><input type='text' name='targetPrice'></td></tr>
                      <tr><td><label><b>Email :        </b></label></td><td><input type='text' name='email' id='email'/></td></tr>
                      <tr><td colspan='2'><div id='button'><a id="buyNowButton" href='#'>Set Alert</a></div></td></tr>
                    </table>
                  </div>
                 </div>
                 
                 <div class = "footer">
                 </div> <!-- End of footer -->
              </div>
               <!-- set Price alerts ends -->
          </div>
           <!--Right Panel ends -->   
             
               
                <!-- facebook Comments -->
              <div class = "display" id = "productPageFacebookComments">
                 <div class = "header headerLess">                  
                 </div>
                 
                 <div class = "content" id = "productPageFacebookCommentsContent">
                 </div>
                 
                 <div class = "footer">
                 </div> <!-- End of footer -->
              </div>
                <!-- facebook Comments ends -->             

           </div> <!--Content Body ends -->
           
           <!--site Footer-->                 
           <div class = "siteFooter" id = "productPageFooter">
                <div class = "content" id = "productPageFooterContent">
                </div>
           </div>
       
    </body>
    <?php
      mysqli_close($con);
    ?>
</html>
