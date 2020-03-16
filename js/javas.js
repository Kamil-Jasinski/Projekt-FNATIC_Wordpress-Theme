/////////////////////////////////////////////////////  
////   Załadowanie JQuery
//var script = document.createElement('script');
//script.src = 'https://code.jquery.com/jquery-3.4.1.min.js';
//script.type = 'text/javascript';
//document.getElementsByTagName('body')[0].appendChild(script);

//window.onload = function() {
//    if (window.jQuery) {  
//        // jQuery is loaded  
//        alert("Yeah!");
//    } else {
//        // jQuery is not loaded
//        alert("Doesn't Work");
//    }
//}







/////////////////////////////////////////////////////  
////   Otwieranie/Zamykanie Mobile Menu
const navContainer = document.getElementById("navContainer"); 
const hamburgerOpen  = document.getElementById('hamburger-open');
const hamburgerClose  = document.getElementById('hamburger-close');
let isClosed = true;
hamburgerOpen.addEventListener('click', openMenu);
hamburgerClose.addEventListener('click', closeMenu);

function openMenu() {   
    
        if(isClosed) {
            //jeśli menu jest zamknięte 'true' - otwórz
                navContainer.style.transform = "translateX(0)";
                hamburgerOpen.style.transform = "translateX(50vw)";

            isClosed = false;
        };
};
    
function closeMenu () {
    if(!isClosed) {
            //jeśli menu jest otwarte 'false' - zamknij
                navContainer.style.transform = "translateX(-105%)";
                hamburgerOpen.style.transform = "translateX(0)";

            isClosed = true;
        };
};







/////////////////////////////////////////////////////  
////   Smooth Scroll dla PC
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        
        if(!isClosed) {
        //jeśli menu jest otwarte 'false' - zamknij

            navContainer.style.transform = "translateX(-105%)";
            hamburgerOpen.style.transform = "translateX(0)";
//            hamburger.innerHTML = hamburgerLines;
        
        isClosed = true;
    }

        document.querySelector(this.getAttribute('href')).scrollIntoView({
            behavior: 'smooth'
        });
    });
});







/////////////////////////////////////////////////////  
////   Slick Slider
$('.slick-wrapper').slick({
  dots: true,
  arrows: false,
  infinite: false,
  speed: 300,
  slidesToShow: 3, //dodaje element
  slidesToScroll: 1, // przesówa o 1 
  responsive: [
    {
      breakpoint: 1025,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
        infinite: true,
        dots: true
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ]
});

    
    
    
    
   