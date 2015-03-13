 before = document.getElementById("homeMostPopularProductNavPrevious");
 after = document.getElementById("homeMostPopularProductNavNext");

before.addEventListener('click',moveBackward,false);
after.addEventListener('click',moveForward,false);

 leftPosition = 0;
 slideLength = (166*3 + 40); /* 20px is the margin around the slide */
 slideNumber = 1;

contentSlide = document.getElementById("homePopularProductSlideRoller");
contentSlide.style.left = leftPosition + "px";



function moveForward()
{
    
   if(slideNumber == 4)
   {
      leftPosition += ((slideNumber -1) * slideLength);
      slideNumber = 1;  
   }
   else 
   {
        leftPosition -= slideLength;
        ++slideNumber; 
   }
   contentSlide.style.left = leftPosition + "px";
   
}

function moveBackward()
{
   if(slideNumber == 1)
   {
      leftPosition -= ( 3 * slideLength); 
      slideNumber = 4; 
   }
   else 
   {
        leftPosition += slideLength;
        --slideNumber;
   }
   
   contentSlide.style.left = leftPosition + "px";
}

