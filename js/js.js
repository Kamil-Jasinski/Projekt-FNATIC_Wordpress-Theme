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



/////////////////////////////////////////////////////  
////   SCROLL UP

function scrollUp() {

    var scrollPos = window.scrollY;
    var arrow = document.getElementById('go-up-arrow');
    
    if (scrollPos >= 1000) {
//        console.log('SHOW ARROW ' + scrollPos);
        

            arrow.style.opacity = .6;

        arrow.style.display = "block";

    }
    else {
//        console.log('HIDE ARROW ' + scrollPos);
        
        arrow.style.display = "none";
    }
   
}
document.addEventListener('scroll', scrollUp);



/////////////////////////////////////////////////////  
////   IS VISIBLE
////   Source: https://www.youtube.com/watch?v=_5Bu3JY-ZHc

function isVisible() {
    /* Zmienne: */
    const featureBoxes = document.querySelectorAll('.fb-anim');
    const fbNumbers = document.querySelectorAll('.fb-anim2');
    
    /* Sprawdza czy feature box'y są widoczne na ekranie */
        featureBoxesObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                    if(entry.intersectionRatio > 0 ) {
                        entry.target.style.animation =  `featureBoxes 2s forwards ease-out`;
                    };
        //            else {
        //                entry.target.style.animation = 'none';
        //            }
            });
        });

        featureBoxes.forEach(box => {
            featureBoxesObserver.observe(box);
        });



    /* Sprawdza czy liczby w feature box'ach są widoczne na ekranie */
        NumbersObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                    if(entry.intersectionRatio > 0 ) {
                        entry.target.style.animation =  `numberColor .7s forwards ease-in-out`;
                    }
//                    else {
//                        entry.target.style.animation = 'none';
//                    };
//  Po usunięciu komentarza numer zacznie zmieniać kolor na #fda207 kiedy będzie 
//  widoczny, a na #151515 kiedy zniknie z pola widzenia (cały czas)
            });
        });
        fbNumbers.forEach(number => {
            NumbersObserver.observe(number);
        });
};

document.addEventListener('scroll', isVisible);


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
////   Dodatek do pluginu "Page scroll to id", dzięki temu hamburger menu zamyka się po kliknięciu w link, a plugin zajmuje się samym smooth scroll'em
document.querySelectorAll('a').forEach(link => {
    link.addEventListener('click', function (e) {
        
        if(!isClosed) {
        //jeśli menu jest otwarte 'false' - zamknij
            navContainer.style.transform = "translateX(-105%)";
            hamburgerOpen.style.transform = "translateX(0)";
            $('body').removeClass("fixedPosition");
            
        isClosed = true;
        }
    });
});



function changeStyle() {
    /*Co 500ms funkcja nadaje display:block dla elementu, powodem jest znikające textarea po zmianie rozmiaru przeglądarki z kolei powodem znikania textarea jest plugin Native Emoji*/

    /*EDIT: po edycji pluginu w ~2650 linijce kodu w pliku native_emoji.js textarea nie znika po zmianie rozmiaru przeglądarki, dlatego wystarczy, że ta funkcja wykona się tylko raz*/
   var placeholder = document.getElementById('comment');
    placeholder.style.display = "block";
    
}
document.addEventListener("DOMContentLoaded", setTimeout(changeStyle, 50));

/////////////////////////////////////////////////////  
////   Smooth Scroll dla PC
////   Ten Smooth Scroll działa tylko dla onepage, nie działa dla linków z innej strony
//document.querySelectorAll('a[href^="#"]').forEach(anchor => {
//    anchor.addEventListener('click', function (e) {
////        e.preventDefault();
//        
//        if(!isClosed) {
//        //jeśli menu jest otwarte 'false' - zamknij
//
//            navContainer.style.transform = "translateX(-105%)";
//            hamburgerOpen.style.transform = "translateX(0)";
////            hamburger.innerHTML = hamburgerLines;
//        
//        isClosed = true;
//    }
//
////        document.querySelector(this.getAttribute('href')).scrollIntoView({
////            behavior: 'smooth'
////        });
//    });
//});


/////////////////////////////////////////////////////  
////   Smooth Scroll dla PC
////   Ten Smooth Scroll działa dla linków z innch stron, ale nie dla onepage.
//    $(document).ready(function() {
//  // Add smooth scrolling to all links
//  $("a").on('click', function(event) {
//
//    // Make sure this.hash has a value before overriding default behavior
//    if (this.hash !== "") {
//
//      // Store hash
//      var hash = this.hash;
//
//      // Using jQuery's animate() method to add smooth page scroll
//      // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
//      $('html, body').animate({
//        scrollTop: $(hash).offset().top
//      }, 2000, function() {
//
//        // Add hash (#) to URL when done scrolling (default click behavior)
//        window.location.hash = hash;
//      });
//      return false;
//    } // End if
//  });
//});







    
    










    
