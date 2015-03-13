/*

Author : Ranjit Mishra
Date : 27th April 2013
Purpose : The file slider.js makes a simple slider with javaqscript and css transitions

*/


    window.addEventListener("load",downloadProducts,false); /* Call the Function download 
                                                   images on when windows finishes loading */

function downloadProducts()
{ 

/*************************************************************************************/   

   var productDetails = document.getElementsByClassName("productDetails");
   for(var counter = 0 ; counter < productDetails.length; ++counter)
       productDetails[counter].style.display = "none";
    
            //Hiding the Product Details in the initial preloader stages 
/***************************************************************************************/        
   
   downloadFeaturedImages();  //call for downloading featured images 
   downloadNewArrivalsImages(); //call for downloading newArrival images 
   downloadMostPopularProductsImages();//call for downloading mostPopularProducts images 
   downloadMostPopularBrandsImages();//call for downloading mostPopularBrands images 
   
                
   // Functions for downloading Images 
/******************************************************************************************/   
   
   // Adding event liteners to the navigation buttons 
    slideSize = 540; //in pixels 

    navigationButtonsBackward = document.getElementsByClassName("previous");
    navigationButtonsForward = document.getElementsByClassName("after");

    for ( counter = 0; counter < navigationButtonsBackward.length; ++counter)
    {
        navigationButtonsBackward[counter].addEventListener("click",moveBackward,false);
        navigationButtonsForward[counter].addEventListener("click",moveForward,false);
    }
    
/*****************************************************************************************/   
  
} //End of function downloadImages()


/*-------------- Preparing the requests for all the four categories -----------------------*/

function downloadFeaturedImages()
{
    var featured = document.getElementsByClassName("featured");

    for(var counter = 0 ; counter < featured.length ; ++counter)
    {
       var category = featured[counter].getAttribute("category");
       var products = featured[counter].getElementsByClassName("product"); 
       /* get the category and allproducts from the box */
       
       var limit = products.length; // The limit is no of products in the box 
      
       prepareImageRequests("featured",category,limit,products);
    }               /* Function to prepare ajax requests */
                    /* End of for loop */
}                   /* end of downloadFeaturedImages() */

function downloadMostPopularProductsImages()
{

    var mostPopularProducts = document.getElementsByClassName("mostPopularProducts");
    for(var counter = 0 ; counter < mostPopularProducts.length ; ++counter)
    {
       var category = mostPopularProducts[counter].getAttribute("category");
       var products = mostPopularProducts[counter].getElementsByClassName("product"); 
       
       /* get the category and allproducts from the box */
       
       var limit = products.length; // The limit is no of 0products in the box 
       prepareImageRequests("mostPopularProducts",category,limit,products);
    }               /* Function to prepare ajax requests */
   
    /* End of for loop */
} /*End of funciton downloadMostPopularProductsImages() */

function downloadMostPopularBrandsImages()
{
    var mostPopularBrands = document.getElementsByClassName("mostPopularBrands");
    for(var counter = 0 ; counter < mostPopularBrands.length ; ++counter)
    {
       var category = mostPopularBrands[counter].getAttribute("category");
       var products = mostPopularBrands[counter].getElementsByClassName("product"); 
       
       /* get the category and allproducts from the box */
       
       var limit = products.length; // The limit is no of 0products in the box 
       prepareImageRequests("mostPopularBrands",category,limit,products);
    }               /* Function to prepare ajax requests */
    /* End of for loop */
} /*End of funciton downloadMostPopularBrandsImages() */

function downloadNewArrivalsImages()
{
    var newArrivals = document.getElementsByClassName("newArrivals");
    for(var counter = 0 ; counter < newArrivals.length ; ++counter)
    {
       var category = newArrivals[counter].getAttribute("category");
       var products = newArrivals[counter].getElementsByClassName("product"); 
       /* get the category and allproducts from the box */
       
       var limit = products.length; // The limit is no of 0products in the box 
       
       prepareImageRequests("newArrivals",category,limit,products);
    }               /* Function to prepare ajax requests */
                    /* End of for loop */
}                   /* end of downloadFeaturedImages() */

/*-----------------------------------------------------------------------------------*/

function prepareImageRequests(type,category,limit,products)
{
    var xhr = createXHR();      // create the ajax object
    var url = "../scripts/php/fetchProductImages.php?";
        url += "type=" + type + "&";
        url += "category=" + category + "&";
        url += "limit=" + limit;
                                  // Prepare the url from the parameters 
   if (xhr)        //If xhr is true
    {
        xhr.open("GET",url, true);
        switch(type) // Switching to different image handling functions with different types
        {
            case "featured":
                        xhr.onreadystatechange = function(){handleFeaturedImages(xhr,products);};
                        break;
            case "newArrivals":
                        xhr.onreadystatechange = function(){handleNewArrivalsImages(xhr,products);};
                        break;
            case "mostPopularBrands":
                        xhr.onreadystatechange = function(){handleMostPopularBrandsImages(xhr,products);};
                        break;
            case "mostPopularProducts":
                        xhr.onreadystatechange = function() {handleMostPopularProductsImages(xhr,products);};
                        break;
            default:break;
        }
                     /* REMEMBER :: onreadystatechange won't work
                      without anonymous function  uh ! 
                      wasted 3h hours on that ! */
                      
        xhr.send(null); // call handling funciton for the returbed response from teh server 
    } //End of if 
    
}   //end of function 


/**********************************************************************************/
                    // parsers and setters for the four categories
        
function handleFeaturedImages(xhr,products)
{
    var returnedProducts = handleXhrResponse(xhr);
    if(returnedProducts)
    {
        var returnedProductsLength = --returnedProducts.length;
        for(var counter  = 0 ; counter < returnedProductsLength ; ++counter)
        {
            var values = returnedProducts[counter].split(":");
            
                /*
                    values {
                         0 => productId,
                         1 => productName,
                         2 => productPrice,
                         3 => companyname,
                         4 => category                 
                    }*/
             products[counter].style.height = "322px";
             products[counter].style.width = "225px";
             
             products[counter].getElementsByClassName("preloaderImage")[0].setAttribute("class","productImage");
             products[counter].getElementsByClassName("preloaderImage")[0].src = "../images/"+values[4]+"/"+values[0]+".jpg" ;
             
             products[counter].getElementsByClassName("productName")[0].innerHTML = values[1] ;  
             products[counter].getElementsByClassName("productPrice")[0].innerHTML = values[2] ;     
             
             products[counter].getElementsByClassName("productDetails")[0].style["display"] = "block";    /* Putting this here would 
                ensure that Only when images get
                loaded do the product details get displayed  */
            } // End of for loop
        
       }// End  Of If 
}
       // end of handleFeaturedImages function  
       
       
function handleNewArrivalsImages(xhr,products)
{
    var returnedProducts = handleXhrResponse(xhr);
    if(returnedProducts)
    {
        var returnedProductsLength = --returnedProducts.length;
        for(var counter  = 0 ; counter < returnedProductsLength ; ++counter)
        {
            var values = returnedProducts[counter].split(":");
            
                /*
                    values {
                         0 => productId,
                         1 => productName,
                         2 => productPrice,
                         3 => companyname,
                         4 => category                 
                    }*/
                products[counter].getElementsByClassName("preloaderImage")[0].src = "../images/"+values[4]+"/"+values[0]+".jpg" ; 
              products[counter].getElementsByClassName("productName")[0].innerHTML = values[1] ;  
              products[counter].getElementsByClassName("productPrice")[0].innerHTML = values[2] ;  
              products[counter].getElementsByClassName("productDetails")[0].style["display"] = "block"; 
         } 
     }
}   // Even though it has the duplication of code .
    //It still is a better bet as it is easy to  manage!

function handleMostPopularProductsImages(xhr,products)
{
    var returnedProducts = handleXhrResponse(xhr);
    if(returnedProducts)
    {
        var returnedProductsLength = --returnedProducts.length;
        for(var counter  = 0 ; counter < returnedProductsLength ; ++counter)
        {
            var values = returnedProducts[counter].split(":");
            
                /*
                    values {
                         0 => productId,
                         1 => productName,
                         2 => productPrice,
                         3 => companyname,
                         4 => category                 
                    }*/
                products[counter].getElementsByClassName("preloaderImage")[0].src = "../images/"+values[4]+"/"+values[0]+"Thumbnail.jpeg" ;
                products[counter].getElementsByClassName("productName")[0].innerHTML = values[1] ;  
              products[counter].getElementsByClassName("productPrice")[0].innerHTML = values[2] ;  
               products[counter].getElementsByClassName("productDetails")[0].style["display"] = "block";   
         }
          
     } 
}
function handleMostPopularBrandsImages(xhr,products)
{
    var returnedProducts = handleXhrResponse(xhr);
    if(returnedProducts)
    {
        var returnedProductsLength = --returnedProducts.length;
        for(var counter  = 0 ; counter < returnedProductsLength ; ++counter)
        {
            var values = returnedProducts[counter].split(":");
            
                /*
                    values {
                         0 => productId,
                         1 => productName,
                         2 => productPrice,
                         3 => companyname,
                         4 => category                 
                    }*/
            products[counter].getElementsByClassName("productImage")[0].src = "../images/brands"+"/"+values[3]+".jpeg" ;
            products[counter].getElementsByClassName("productName")[0].innerHTML = values[1] ;  
              products[counter].getElementsByClassName("productPrice")[0].innerHTML = values[2] ;  
            products[counter].getElementsByClassName("productDetails")[0].style["display"] = "block";         
         } //End of for loop
     }  // End of if 
}


function handleXhrResponse(xhr)
{
    if (xhr.readyState == 4 && xhr.status == 200)
    {
        products = xhr.responseText.split(",");
        return products;
    }
    else return 0;
}
            /* It handles the response from teh server and returns the split
             products in an array  */

 function createXHR()
{
try { return new XMLHttpRequest(); } catch(e) {}
try { return new ActiveXObject("Msxml2.XMLHTTP.6.0"); } catch (e) {}
try { return new ActiveXObject("Msxml2.XMLHTTP.3.0"); } catch (e) {}
try { return new ActiveXObject("Msxml2.XMLHTTP"); } catch (e) {}
try { return new ActiveXObject("Microsoft.XMLHTTP"); } catch (e) {}
return null;
}           /* Wrapper to create XMLHttpRequests fro various browsers */
           
            /* !!! ***** IMP ******!!!!
             Hey man I did not know that not ending your comment would result
             in javascript not working 
            */  
            
/********* Search Function  ***********************/
  var searchButton =  document.getElementById("homePageSearchButton");
 searchButton.addEventListener('click', getSearchResults,false);
 
 function getSearchResults(){}
/***********************************************************/


/* Functions for the event handlers added*/

/*****************  function for the slider to move forward *******************/
function moveForward()
{
  
  roller = this.parentNode.parentNode.getElementsByClassName("roller")[0];
  slides = this.parentNode.parentNode.getElementsByClassName("slide");
  navigationButtons = this.parentNode.parentNode.parentNode.getElementsByClassName("navButton");
  
  currentSlide = (-1);
  firstSlide = 0;
  lastSlide = 0;    // we get the roller and slide that called the function 
  
  for(counter = 0 ; counter < slides.length; ++counter)
  {
    if(slides[counter].getAttribute("currentSlide") == "true")
      {  
        currentSlide = counter;
        break;
       }
  }
  
  lastSlide = (slides.length - 1);
  
  slides[currentSlide].setAttribute("currentSlide","false");
  navigationButtons[currentSlide].setAttribute("class","navButton"); // navButton is class foo css
  
  if (currentSlide == lastSlide)
  {
   roller.style.left = "0px";
   
   slides[firstSlide].setAttribute("currentSlide","true");
   navigationButtons[firstSlide].setAttribute("class","navButton current");
  }
  else
  {
    roller.style.left = ((-1) * (currentSlide + 1) * slideSize) + "px"; 
    slides[++currentSlide].setAttribute("currentSlide","true");
    navigationButtons[currentSlide].setAttribute("class","navButton current");
  }
}

/***********************  function for the slider to move forward ************/

function moveBackward()    
{
  roller = this.parentNode.parentNode.getElementsByClassName("roller")[0];
  slides = this.parentNode.parentNode.getElementsByClassName("slide");
  currentSlide = 0;
  firstSlide = 0;
  lastSlide = 0;    
  
  for(counter = 0 ; counter < slides.length; ++counter)
  {
    if(slides[counter].getAttribute("currentSlide") === "true")
      {  
        currentSlide = counter;
        break;
       }
  }
  
  slides[currentSlide].setAttribute("currentSlide","false");
  navigationButtons[currentSlide].setAttribute("class","navButton"); // navButton is class foo css
  
  lastSlide = (slides.length - 1);
  
  if (currentSlide == firstSlide)
  {
   roller.style.left = ((-1) * lastSlide * slideSize) + "px";
   slides[lastSlide].setAttribute("currentSlide","true");
   navigationButtons[lastSlide].setAttribute("class","navButton current");
  }
  else
  {
    roller.style.left = ((-1) * (currentSlide - 1) * slideSize) + "px"; 
    slides[--currentSlide].setAttribute("currentSlide","true");
    navigationButtons[currentSlide].setAttribute("class","navButton current");
  }
}
