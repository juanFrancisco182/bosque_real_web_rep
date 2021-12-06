document.addEventListener('DOMContentLoaded', function () {
    swipperInit();


   
    AOS.init({
        delay: 300,
        mirror: true,
        duration: 600,
    });

    document.querySelector(".poster-image").onclick = function() { fadeImage() };

    function fadeImage() {
    document.querySelector(".poster-image").style.display = "none";
}


});
//Tabs


window.onload = function(event) {
    move();
  };

let i = 0;
let width = 1;
let barContainer = document.getElementById("loader");

function move() {
    if (i == 0) {
        i = 1;

        let bar = document.getElementById("loader-bar");
        let id = setInterval(frame, 15);

        function frame() {
            if (width >= 100) {
                barContainer.style.opacity = "0";
                setTimeout(displayNone, 400);
            } else if (width >= 100) {
                clearInterval(id);
                i = 0;
            } else {
                width++;
                bar.style.width = width + "%";
            }
        }
    }

}

function displayNone() {
    barContainer.style.display = "none";
}
document.addEventListener("DOMContentLoaded", function(event) {
    openTabFunc(event, 'Exteriores')
});

function openTabFunc(evt, tabName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(tabName).style.display = "block";
    evt.currentTarget.className += " active";
}


//nav bar

// INTERACTIONS
//------ WORD SCROLL MULTIPLE-----//
// seleccionar los elementos
let wordScrollEl = document.querySelectorAll('.text-svg');
  
for (let i = 0; i < wordScrollEl.length; i++) {

     let iterator = i + 1;

     //add unique id to container
     wordScrollEl[i].setAttribute('id', 'text-container-' + iterator);
     let textContainer= document.querySelector('#text-container-'+ iterator);
   

    //add unique id to line svg
   let line = wordScrollEl[i].getElementsByTagName('path');
    line[0].setAttribute('id', 'text-curve-' + iterator);
  

     //add href to reference id to line svg
     let getTextPath = wordScrollEl[i].getElementsByTagName('textPath');
     let textPath = getTextPath[0];
     textPath.setAttribute('href', '#text-curve-' + iterator);

     // get path
     let path = wordScrollEl[i].querySelector(textPath.getAttribute('href'));
     let pathLength = path.getTotalLength();
     //agrego attributo para que este fuera del view port el texto
     function updateTextPathOffset(offset) {
         textPath.setAttribute('startOffset', offset);
     }
     updateTextPathOffset(pathLength);

     //funcion onscroll para que cambie de posicion cuando scrollea
     function onScroll() {
         requestAnimationFrame(function () {
             let rect = textContainer.getBoundingClientRect();
             let scrollPercent = rect.y / window.innerHeight;
             // console.log(scrollPercent);
             let total = scrollPercent * 0.5 * pathLength;
             updateTextPathOffset(scrollPercent * 0.5 * pathLength);
         });
     }
     window.addEventListener('scroll',onScroll);
 }
//=================================
//=================================

var textPath = document.querySelector('#text-path');

var textContainer = document.querySelector('#text-container');

var path = document.querySelector( textPath.getAttribute('href') );

var pathLength = path.getTotalLength();


function updateTextPathOffset(offset){
    textPath.setAttribute('startOffset', offset);
}

updateTextPathOffset(pathLength);

function onScroll(){
    requestAnimationFrame(function(){
        var rect = textContainer.getBoundingClientRect();
        var scrollPercent = rect.y / window.innerHeight;
       
        updateTextPathOffset( scrollPercent * 2 * pathLength );
    });
}

window.addEventListener('scroll',onScroll);



//=================================
//=================================



// scroll nav effect
let scrollpos = window.scrollY
const header = document.querySelector("nav")
const header_height = header.offsetHeight
const add_class_on_scroll = () => header.classList.add("scrolling")
const remove_class_on_scroll = () => header.classList.remove("scrolling")

window.addEventListener('scroll', function () {
    scrollpos = window.scrollY;

    if (scrollpos >= header_height) {
        add_class_on_scroll()
    } else {
        remove_class_on_scroll()
    }

})







function swipperInit(){
  
    var infoSwiper = new Swiper(".swiper-container.infoSwiper", {
        direction: "vertical",
        edgeSwipeThreshold:55,
        pagination: {
          el: ".swiper-pagination.info",
          clickable: true,
        },
        navigation: {
            nextEl: ".swiper-button-next.info",
            prevEl: ".swiper-button-prev.info",
          },
      });
      var tabInfoSwiper = new Swiper(".swiper-container.tab-info", {
        direction: "horizontal",
        pagination: {
            el: '.swiper-pagination.tab-info',
            type: 'progressbar',
        },
        navigation: {
            nextEl: '.swiper-button-next.tab-info',
            prevEl: '.swiper-button-prev.tab-info',
        },
      });
      var highlightSwiper = new Swiper(".swiper-container.highlightSwiper", {
        direction: "vertical",
        pagination: {
          el: ".swiper-pagination.highlightS",
          clickable: true,
        },
        navigation: {
            nextEl: ".swiper-button-next.highlightS",
            prevEl: ".swiper-button-prev.highlightS",
          },
      });

    const swiper1 = new Swiper('.swiper-container.one', {
        // Optional parameters
        pagination: {
            el: '.swiper-pagination.one',
            type: 'progressbar',
        },
        navigation: {
            nextEl: '.swiper-button-next.one',
            prevEl: '.swiper-button-prev.one',
        },

    });
    const swiper2 = new Swiper('.swiper-container.two', {
        // Optional parameters
        pagination: {
            el: '.swiper-pagination.two',
            type: 'progressbar',
        },
        navigation: {
            nextEl: '.swiper-button-next.two',
            prevEl: '.swiper-button-prev.two',
        },

    });
    const swiper3 = new Swiper('.swiper-container.three', {
        // Optional parameters
        pagination: {
            el: '.swiper-pagination.three',
            type: 'progressbar',
        },
        navigation: {
            nextEl: '.swiper-button-next.three',
            prevEl: '.swiper-button-prev.three',
        },

    });
  
}



