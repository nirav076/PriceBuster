<!DOCTYPE html>
<?php
$category = $_GET['category'];
    switch($category)
    {
      case "mobiles":
      case "cameras":
      case "digitalTelevisions":
      case "laptops":$myCategory = $category;
                     break;
      default : exit("");
    }

?>
<html lan = "en">
    <head>
        <meta charset = "utf-8">
        <title>Categories Page</title>
        
        <link rel = "stylesheet" href = "../css/siteWideGeneralStyle.css" >
        <link rel = "stylesheet" href = "../css/categoryPageSpecificStyle.css" >
        <?php 
         require_once "../scripts/php/createProduct.php";
         require_once "../scripts/php/createSlider.php";
        ?> 
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
             
                
             <img class = "siteLogo" src = "../images/siteLogo.png" height = "100px"  />
        
             <div class = "searchBar" id = "inCategorySearchBar">  <!-- Bar for Search box and Button -->
                 <input class = "searchInput" id = "inCategorySeachInput" placeholder = "Enter Your Search Here ..." maxlength = "70"/>
                 <a class = "searchButton" id = "inCategorySearchButton" href = "#">Search</a>
            </div>      <!-- home page search bar ends-->
        </div>                      
 
             <!--Site header Ends-->
          
          
         <!-- Content Body begins-->   
           
         <div class = "contentBody">                      <!-- menu Box -->
                           
              <!-- Featured begins -->
              <div class = "slider headerLess" id = "inCategoryFeatured">
                    <div class = "contentHolder" id = "inCategoryFeaturedContentHolder">
                        <ul class = "navigationButtons"> 
                                <li class = "previous"></li>
                                <li class = "after"></li>
                        </ul> 
                        <div class = "content mostPopularProducts" category = <?php echo $myCategory ?>>     
                        <?php 
                             createSlider();
                        ?>                      
                        </div><!--End of content -->
                   </div>  <!--End of content Holder-->
                      
                    <div class = "header">
                       
                        <div class = inclinedRibbonWrapper>
                            <div class = "ribbon inclinedRibbon leftInclinedRibbon greenRibbon" id = "homePageNewArrivalRibbon">
                                <span class = "ribbonHeader" id = "homePageNewArrivalRibbonHeader">Featured</span> 
                            </div>
                        </div> 
                    </div>     <!-- end of header-->               
                   
                   
                   <div class = "footer">                
                        <div class = "navigationDisplay">
                             <ul class = "navigationDisplayButtons">
                                 <span class = "navButton current"></span>
                                 <span class = "navButton"></span>
                                 <span class = "navButton"></span>
                             </ul>
                        </div>   <!-- end of navigation Display -->         
                    </div> <!-- End of footer-->
              </div>    <!-- end of Carousal -->
              
             
              <!-- Most Popular Product Slider begins -->
              <div class = "slider" id = "inCategoryMostPopularProductsSlider">
                <div class = "header">
                    <div class = "ribbon leftSidedRibbon blueRibbon" id = "inCategoryMostPopularProductsSliderRibbon">
                        <span class = "ribbonHeader" id = "inCategoryMostPopularProductsRibbonHeader">Most PopularProducts</span>
                    </div>
                </div>  <!-- header ends -->
              
                <div class = "contentHolder" id = "inCategoryMostPopularProductsContentHolder">
                     <ul class = "navigationButtons"> 
                        <li class = "previous"></li>
                        <li class = "after"></li>
                    </ul>   
                    <div class = "content mostPopularProducts" category = <?php echo $myCategory ?>>
                     <?php 
                        createSlider();
                    ?>     
                    </div>  <!-- End of Slider Content -->
                </div>
                
                <div class = "footer">
                    <div class = "navigationDisplay">
                         <ul class = "navigationDisplayButtons">
                              <span class = "navButton current"></span>
                             <span class = "navButton"></span>
                             <span class = "navButton"></span>
                         </ul>
                    </div>   <!-- end of navigation Display -->         
                </div>
          </div>    <!-- end of Most Popular products -->
              
              
            <div class = "rightPanel">  <!-- Right Panel begins here --> 
              
              <!-- Latest News begins -->
              <div class = "display" id = "latestNews">
                <div class = "header">
                    <div class = "ribbon leftSidedRibbon greenRibbon" id = "inCategoryLatestNewsRibbon">
                        <span class = "ribbonHeader" id = "inCategoryLatestNewsHeader">Latest News</span>
                    </div>
                </div>
                
                <div class = "content" >
                     <h4>Turn your Galaxy S3 into a diluted S4</h4>
                     <p><img src = "../images/galaxyNews.jpg" />Android Jelly Bean 4.2.2, which will
                       bring the functionality of the Galaxy S4 to the Galaxy S3...</p>
                       
                     <h4>BlackBerry Q5 release date and price</h4>
                     <p><img src = "../images/RIMNews.jpg" />The BlackBerry Q5 is here,
                      and about time too as the Canadian firm launches its first "affordable" ...</p>  
                </div>
                
                <div class = "footer">
                </div> <!-- End of footer -->
              </div>    <!-- end of Latest News -->
          
                 <div class = "display" id = "searchByBrand">
                <div class = "header">
                    <div class = "ribbon leftSidedRibbon greenRibbon" id = "searchByBrandRibbon">
                        <span class = "ribbonHeader" id = "searchByBrandRibbonHeader">Select By Brand</span>
                    </div>
                </div>
                
                <div class = "content" >
                    
                    <div id = "companyOptions">
                        <label for  = "company">Company</label>
                        <select id = "company">
                        <?php
                            require_once "../scripts/php/connectToDatabase.php";
                            $mySqlHandle = connectToDatabase();                        
                            $query = 'select companyName from company,categoryOfProduct';
                            $query .= ' where categoryOfProduct.categoryId = company.categoryId';
                            $query .= ' and categoryName = "'.$category.'"';
    ;
                            if($result = mysqli_query($mySqlHandle,$query))
                            {
                                while($row = mysqli_fetch_array($result))
                                {
                                    echo "<option>".$row['companyName']."</option>";   
                                }
                                    
                            }
                        ?>
                        </select>
                      </div> 
                     <div id = "modelOptions">     
                        <label for = "model">Model</label>
                        <select id  = "model">
                        </select>
                    </div>    
                    
                </div>
                
                <div class = "footer">
                </div> <!-- End of footer -->
              </div>    <!-- end of Seelct By Brand News -->
              
           <!-- New Arrival begins-->
              <div class = "display" id = "inCategoryNewArrival">
                       <div class = "content newArrivals" category = <?php echo $myCategory ?> id = "inCategoryNewArrivalContent">
                        
                         <?php
                            createSlider(1,1);
                         ?>
                     
                     </div> <!--End of conetnt-->
                    
                    <div class = inclinedRibbonWrapper>
                        <div class = "ribbon inclinedRibbon leftInclinedRibbon greenRibbon" id = "inCategoryNewArrivalRibbon">
                           
                           
                            <span class = "ribbonHeader" id = "inCategoryNewArrivalRibbonHeader">New Arrivals</span> 
                       </div>
                    </div>                 
                 
                 
                 
                 <div class = "footer">
                    <div class = "navigationDisplay">
                         
                    </div>   <!-- end of  Display -->         
                 </div> <!-- End of footer -->
              </div>
               <!-- New Arrival Ends-->
            </div> <!-- Right Panel ends here -->   
               
              <!-- Most Popular Brands slider begins -->
              <div class = "slider" id = "inCategoryMostPopularBrandsSlider">
                <div class = "header">
                    <div class = "ribbon leftSidedRibbon orangeRibbon" id = "inCategoryMostPopularBrandSliderRibbon">
                        <span class = "ribbonHeader" id = "inCategoryMostPopularBrandRibbonHeader">Most Popular Brands</span>
                    </div>
                </div>  <!--End of header-->

                <div class = "contentHolder" id  = "inCategoryMostPopularBrandsContentHolder">    
                     <ul class = "navigationButtons"> 
                        <li class = "previous"></li>
                        <li class = "after"></li>
                     </ul>                 

                    <div class = "content mostPopularBrands" category = <?php echo $myCategory?>>
                   
                         <img src = "../images/apple.png" height = "194px" />
                         <img src = "../images/samsung.jpg" />
                         <img src = "../images/sony.jpg" />
                         
                    </div>  <!--End Of content -->
                    
                </div> <!--End of Content Holder-->
                
                <div class = "footer">
                </div>
              </div>    <!-- end of Most Popular Brands -->
         
           </div> 
       <!-- Content Body ends -->
            
       <div class = "siteFooter" id = "inCategorySiteFooter">
            <div class = "content" id = "inCategoryFooterContent">
            </div>
       </div>
       
    </body>
    <script src = "../scripts/javascript/siteJavascript.js"></script>
</html>

