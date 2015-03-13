<!DOCTYPE html>
<html lan = "en">
    <head>
        <meta charset = "utf-8">
        <meta http-equiv = "cache-control" content = "no-cache">
        
                        <!-- Setting to no cache will allow to fetch the current state -->
        <title>PriceBuster</title>
        
        <link rel = "stylesheet" href = "../css/ranjit/siteWideGeneralStyle.css" >
        <link rel = "stylesheet" href = "../css/ranjit/homePageSpecificStyle.css" >
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
                    <li class = "socialIcons" id = "rssIcon"><a href = "#"><img alt = "rss Social Icon " src = "../images/rss.png" /></a></li>                 </ul> 
            <!-- End Of Social Icon Bar-->                          
            <!-- social bar ends-->
            
          
           <!-- header which will have search and logo -->
             
                
            
              <img class = "siteLogo" src = "../images/siteLogo.png" height = "100px"  />
        
             <div class = "searchBar" id = "homePageSearchBar">  <!-- Bar for Search box and Button -->
                 <input class = "searchInput" id = "homePageSeachInput" placeholder = "Enter Your Search Here ..." maxlength = "70"/>
                 <a href = "#"><div class = "searchButton" id = "homePageSearchButton">Search</div></a>
            </div>      <!-- home page search bar ends-->
        </div>                      
 
             <!--Site header Ends-->
          
          
         <!-- Content Body begins-->   
           
         <div class = "contentBody">                      <!-- menu Box -->
              <div class = "menu" id = "homePageCategoriesMenu">
                 
                 <div class = "header" id = "homePageMenuHeader">
                      <div class = "ribbon leftSidedRibbon greenRibbon" id = "homePageCategoryRibbon">
                        <span class = "ribbonHeader" id = "categoriesMenuTitle">Categories</span>
                      </div>          
                 </div>               
                       <!-- Menu Entries -->
                  <ul class = "verticalMenu" id = "homePageCategoryMenu">
                    <a href = "./categoryPage.php?category=mobiles"> <li class = "menuEntry" id = "menuEntryMobiles" />Mobiles</a>
                        <div class = "categoryMegaMenu" id = "homePageMobilesMegaMenu">
                            <div class = "imageDisplayArea mostPopularProducts" category = "mobiles">
                             <?php
                                   $noOfProductsPerSlide = 3;
                                   for($counter = 0; $counter < $noOfProductsPerSlide ; ++$counter) 
                                     {
                                        $productString = createProduct();
                                        echo $productString;
                                     }
                                
                              ?>
                       
                            </div>      <!--end of image Display Area -->
                             
                             <hr class = "separator" />
                            <div class = "classificationArea"> <!--Classifiction Area begins -->
                                <div class = "byBrand">
                                    <span class = "criteria">By Brand</span>
                                    <p class = "criteriaDetails">
                                        Samsung 
                                        Nokia 
                                        Micromax 
                                        Samsung 
                                        Nokia 
                                        
                                    </p>
                                </div>
                                
                            </div> <!--End of Classification Area-->
                        </div>   <!--End of Mobiles mega Menu-->
                      </li>
                      
                      <li class = "menuEntry" id = "menuEntryCameras"><a href = "#">Cameras</a>
                        <div class = "categoryMegaMenu" id = "homePageCamerasMegaMenu">
                            <div class = "imageDisplayArea mostPopularProducts" category = "cameras">
                               
                                <?php
                                   for($counter = 0; $counter < $noOfProductsPerSlide ; ++$counter) 
                                     {
                                        $productString = createProduct();
                                        echo $productString;
                                     }
                                 ?>
                              
                            </div>      <!--end of image Display Area -->
                           
                             <hr class = "separator" /> 
                            <div class = "classificationArea">
                                  <div class = "classificationArea">
                               
                            </div> <!--End of Classification Area-->
                           </div> <!--End of Cameras Mega Menu -->
                        </div>
                      </li>
                      
                      <li class = "menuEntry" id = "menuEntryDigitalTelevisions">
                        <a href = "#">Digital Televisions</a>
                        <div class = "categoryMegaMenu" id = "homePageDigitalTelevisionsMegaMenu">
                             <div class = "imageDisplayArea mostPopularProducts" category = "digitalTelevisions">
                                 
                                 <?php
                                   for($counter = 0; $counter < $noOfProductsPerSlide ; ++$counter) 
                                     {
                                        $productString = createProduct();
                                        echo $productString;
                                     }
                                
                                 ?>
                              
                            </div>      <!--end of image Display Area -->
                            <hr class = "separator" />
                            
                            <div class = "classificationArea">
                                  <div class = "classificationArea">
                                
                                
                            </div> <!--End of Classification Area-->
                            </div>  <!--End of Digitaltelevision Mega menu  Area-->
                        </div>
                      </li>
                      
                      <li class = "menuEntry" id = "menuEntryLaptops"><a href = "#">Laptops</a>
                        <div class = "categoryMegaMenu" id = "homePageLaptopsMegaMenu">
                           <div class = "imageDisplayArea mostPopularProducts" category = "laptops">
                             
                              <?php
                                   for($counter = 0; $counter < $noOfProductsPerSlide ; ++$counter) 
                                     {
                                        $productString = createProduct();
                                        echo $productString;
                                     }
                                
                              ?>
                              
                            </div>      <!--end of image Display Area -->
                             
                             <hr class = "separator" />
                             
                            <div class = "classificationArea">
                                  <div class = "classificationArea">
                               
                                
                            </div> <!--End of Classification Area-->
                            </div> <!--End of laptop Mega menu -->
                        </div>
                      </li>
                  </ul>   <!-- End of Menu Entries -->
              </div>  <!-- Category Menu ends -->
              
              <!-- carousal begins -->
              <div class = "slider headerLess"  id = "homePageCarousal">
                    <div class = "header">
                    </div>              <!--Even though heaer won't be presented, it is present -->
                   
                     <div class = "contentHolder" id = "homePageCarousalContentHolder">                   
                        <ul class = "navigationButtons"> 
                                <li class = "previous"></li>
                                <li class = "after"></li>
                        </ul> 
                        <div class = "content mostPopularProducts" category = "all"> <!--content begins-->
                        <?php 
                            $noOfSlides = 3;
                            $productsPerSlide = 1;
                            createSlider($noOfSlides, $productsPerSlide);
                        ?>                       
                       
                        </div> <!--content ends  -->
                     </div>   
                   <div class = "footer">    <!-- footer Begins -->            
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
              <div class = "slider mostPopularProducts" id = "mostPopularProductsSlider" category = "all">
                <div class = "header">
                    <div class = "ribbon leftSidedRibbon blueRibbon" id = "mostPopularProductsSliderRibbon">
                        <span class = "ribbonHeader" id = "mostPopularProductsRibbonHeader">Most PopularProducts</span>
                    </div>
                 </div> <!-- End of header -->
                 
                 <div class = "contentHolder" id = "homeMostPopularProductsContentHolder">
                    
                     <ul class = "navigationButtons"> 
                                <li class = "previous"></li>
                                <li class = "after"></li>
                    </ul> 
                    <div class = "content"> <!--content begins-->
                           
                      <!----------------------------------------------------------->   
                      <?php 
                        createSlider();
                      ?>
                  <!----------------------------------------------------------->

                  </div>        <!--End of Slider Content-->
                </div>  <!-- End of  ContentHolder -->
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
              
              
             <div class = "rightPanel">  <!--Right Panel begins -->   
           <!-- New Arrival begins-->
              <div class = "display headerLess" id = "homePageNewArrival" >
                    
                    <div class = "content newArrivals" id = "homePageNewArrivalContent" category = "all">
                         <?php
                            $noOfSlides = 1;
                            $productsPerSlide = 1;
                            
                            createSlider($noOfSlides, $productsPerSlide);
                         ?>
                    </div>
                    
                    <div class = "header"></div>
                    <div class = inclinedRibbonWrapper>
                        <div class = "ribbon inclinedRibbon leftInclinedRibbon greenRibbon" id = "homePageNewArrivalRibbon">
                            <span class = "ribbonHeader" id = "homePageNewArrivalRibbonHeader">New Arrivals</span> 
                       </div>
                    </div>                 
                 
                 <div class = "footer">
                             
                 </div> <!-- End of footer -->
              </div>
               <!-- New Arrival Ends-->

               <!-- Featured Product begins-->
              <div class = "display headerLess featured" id = "homePageFeatured" category = "all">
                    <div class = "content" id = "homePageFeaturedContent">
                     <?php
                            $noOfSlides = 1;
                            $productsPerSlide = 1;
                            
                            createSlider($noOfSlides,$productsPerSlide);
                     ?>   
                    </div> <!-- End of content -->
                    
                    <!--We see here that the content is on top of head , 
                        this ensures that the content lies below the head -->
                    
                   <div class = "header">
                   </div>
                   <div class = "inclinedRibbonWrapper"> 
                        <div class = "ribbon inclinedRibbon leftInclinedRibbon blueRibbon" id = "homePageFeaturedRibbon">
                            <span class = "ribbonHeader" id = "homePageFeaturedRibbonHeader">Featured</span>
                        </div>
                    </div>
                
                
                <div class = "footer">
                    
                 </div> <!-- End of footer -->
              </div>
               <!-- Featured Product Ends-->
               
                <!-- facebook Box begins-->
               <div class = "display" id = "homePageFacebookBox">
                   
                     <div class = "content" id = "homePageFacebookContent" >
                     <iframe src="//www.facebook.com/plugins/likebox.php?href=https%3A%2F%2Fwww.facebook.com%2Fpages%2FPricebuster%2F451161508306171&amp;width=292&amp;height=290&amp;show_faces=true&amp;colorscheme=light&amp;stream=false&amp;show_border=true&amp;header=true" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:292px; height:290px;" allowTransparency="true"></iframe>
                     </div>
               </div>                               
                <!-- facebook Box Ends-->
           </div>             <!-- Right panel ends -->    
               
              <!-- Most Popular Brands slider begins -->
             <div class = "slider mostPopularBrands" id = "mostPopularBrandsSlider" category = "all">
                <div class = "header">
                    <div class = "ribbon leftSidedRibbon orangeRibbon" id = "mostPopularProductsSliderRibbon">
                        <span class = "ribbonHeader" id = "mostPopularProductsRibbonHeader">Most Popular Brands</span>
                    </div>
                </div> <!--End of header -->
                
                    
                 <div class = "contentHolder" id = "homeMostPopularBrandsContentHolder">   
                    <ul class = "navigationButtons"> <!-- navigation Button begins -->
                        <li class = "previous"></li>
                        <li class = "after"></li>
                    </ul> <!-- navigation button ends  -->                                        
                    
                    <div class = "content"> <!--content begins-->
                     
                     <img src = "../images/apple.png" height = "194px" />
                     <img src = "../images/samsung.jpg" />
                     <img src = "../images/sony.jpg" />
                    
                    </div> <!-- Conetnt eneds -->
                  </div> <!--end of content hOlder -->
                   
                <div class = "footer">  <!-- footer begins  -->
                             
                </div> <!--End of footer -->
                
             </div>    <!-- end of Most Popular Brands -->
             
             
              
              <!-- Latest News begins -->
              <div class = "slider" id = "latestNews">
                <div class = "header">
                    <div class = "ribbon leftSidedRibbon greenRibbon" id = "homePageLatestNewsRibbon">
                        <span class = "ribbonHeader" id = "homePageLatestNewsHeader">Latest News</span>
                    </div>
                </div>
                
                <div class = "contentHolder" id = "homeLatestNewsContentHolder">
                    <ul class = "navigationButtons"> 
                        <li class = "previous"></li>
                        <li class = "after"></li>
                    </ul>   <!-- end of navigation -->
                    <div class = "content">
                    
                        <h3>Tumblr to get more ads in Yahoo deal; are concerns justified?</h3>
                        <p><img src = "../images/tumblrNews.jpg" />Tumblr users are jumping ship for Wordpress as Yahoo closes a deal to 
                        buy Tumblr for $1.1 billion (UK£722 million, AU$1.12 billion).But the Tumblr 
                        defection may turn out to be more of a blip than some sort of mass exodus.
                        Wordpress founder Matt Mullenweg wrote... </p>
                    
                    </div><!-- End of content-->
                </div>     <!--End of content Holder -->
                <div class = "footer">
                    <div class = "navigationDisplay">
                         <ul class = "navigationDisplayButtons">
                             <span class = "navButton current"></span>
                             <span class = "navButton"></span>
                             <span class = "navButton"></span>
                         </ul>
                    </div>   <!-- end of  Display -->         
                 </div> <!-- End of footer -ho->
              </div>    <!-- end of Latest News -->
          
        
           </div> 
       <!-- Content Body ends -->
            
       <div class = "siteFooter" id = "homePageSiteFooter">
            <div class = "footerContent" id = "homePageFooterContent">
               
               <div id = "about">
                    <h4> About</h4>
                    <p> 
                        Hi !!! This is the about section of the site. This is a prototype of the 
                        site which shall help in consumers take in the right shopping decisions 
                        online. <br />
                        This has been created as part of the final Year project in 
                        Bachelors of Engineering @ GTU for year 2013.
                    </p>
               </div>
       
                <span id = "copyright">&copy; Copyright GTU 2009-2013</span>
            </div>
       </div>
       
    </body>
    <script type = "text/javascript" src = "../scripts/javascript/siteJavascript.js"></script>
</html>
