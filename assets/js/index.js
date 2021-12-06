//Tabs
addEventListener('load', (event) => {
    move();

});

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

/*document.querySelector(".poster-image").onclick = function() { fadeImage() };

function fadeImage() {
document.querySelector(".poster-image").style.display = "none";
}*/

function displayNone() {
    barContainer.style.display = "none";
}
/*document.addEventListener("DOMContentLoaded", function(event) {
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
}*/


//nav bar

// INTERACTIONS
//------ WORD SCROLL-----//
// seleccionar los elementos
/*let wordScrollEl = document.querySelectorAll('.text-svg');

for (let i = 0; i < wordScrollEl.length; i++) {
    console.log(wordScrollEl[i].children);
    let iterator = i + 1;

    //add unique id to container
    wordScrollEl[i].setAttribute('id', 'text-container-' + iterator);
    let textContainer = document.querySelector('#text-container-' + iterator);


    //add unique id to line svg
    let line = wordScrollEl[i].getElementsByTagName('line');
    line[0].setAttribute('id', 'text-curve-' + iterator);


    //add href to reference id to line svg
    let getTextPath = wordScrollEl[i].getElementsByTagName('textPath');
    let textPath = getTextPath[0];
    textPath.setAttribute('href', '#text-curve-' + iterator);

    // get path
    let path = wordScrollEl[i].querySelector(textPath.getAttribute('href'));
    console.log("path---->" + path);
    let pathLength = path.getTotalLength();
    console.log("pathLength---->" + pathLength);

    //agrego attributo para que este fuera del view port el texto
    function updateTextPathOffset(offset) {
        textPath.setAttribute('startOffset', offset);
    }
    updateTextPathOffset(pathLength);

    //funcion onscroll para que cambie de posicion cuando scrollea
    function onScroll() {
        requestAnimationFrame(function() {
            let rect = textContainer.getBoundingClientRect();
            let scrollPercent = rect.y / window.innerHeight;
            // console.log(scrollPercent);
            updateTextPathOffset(scrollPercent * 0.5 * pathLength);
        });
    }
    window.addEventListener('scroll', onScroll);
}*/

// INTERACTIONS
//------ WORD SCROLL MULTIPLE-----//
// seleccionar los elementos
let wordScrollEl = document.querySelectorAll('.text-svg');

for (let i = 0; i < wordScrollEl.length; i++) {

    let iterator = i + 1;

    //add unique id to container
    wordScrollEl[i].setAttribute('id', 'text-container-' + iterator);
    let textContainer = document.querySelector('#text-container-' + iterator);
  

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
        requestAnimationFrame(function() {
            let rect = textContainer.getBoundingClientRect();
            let scrollPercent = rect.y / window.innerHeight;
            // console.log(scrollPercent);
            let total = scrollPercent * 0.5 * pathLength;
            updateTextPathOffset(scrollPercent * 0.5 * pathLength);
        });
    }
    window.addEventListener('scroll', onScroll);
}









//--------slider splide--------//
document.addEventListener('DOMContentLoaded', function() {

    let elms = document.getElementsByClassName('splide');

    const options = {
        direction: 'ttb',
        height: '95vh',
        pagination: false
    }
    for (let i = 0; i < elms.length; i++) {
        new Splide(elms[i], options).mount();
    }

});



//------- swiper slider --------//
document.addEventListener('DOMContentLoaded', function() {

    /*  console.log("from splide MS")
      let elms = document.getElementsByClassName('splidems');
      console.log("hiiii: " + elms);
      const options = {
          height: '95vh',
          pagination: false
      }
      for (let i = 0; i < elms.length; i++) {
          new Splide(elms[i], options).mount();
      }*/

    const swiper = new Swiper('.swiper-container', {
        // Optional parameters
        pagination: {
            el: '.swiper-pagination',
            type: 'progressbar',
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },

    });
});

function initForm() {
    ! function(e) {
        var t, n, o, r, i, a, d, c, s, l = Math.random().toString(36).substring(7),
            m = document.referrer,
            h = [],
            u = function() {
                var i;
                if (e.target_id) {
                    if (!(i = document.getElementById(e.target_id))) return;
                    if (i.getAttribute("ssformAdded")) return;
                    i.setAttribute("ssformAdded", 1)
                } else e.polling = !1;
                e.intervalId && !e.polling && (clearInterval(e.intervalId), e.intervalId = 0);
                var a = function(e) { if (e) { var t = document.cookie.match("(^|;) ?" + e + "=([^;]*)(;|$)"); return t ? unescape(t[2]) : null } return document.cookie }("__ss_tk");
                "http:" === window.location.protocol && h.push("_noSsl=1"), a && h.push("_tk=" + a);
                var c = h.length ? h.join("&") : "",
                    m = "instance=" + l,
                    u = ["<iframe", 'id="' + (s = "ssf_" + n) + '"', 'data-form-id="' + n + '"', 'data-instance-id="' + l + '"', 'src="' + d + t + "/" + n + ("" !== c ? "?" + c + "&" + m : "?" + m) + '"', 'style="overflow-y: auto;"', 'frameborder="0"', 'height="' + (r || 1e3) + '"', 'width="' + (o || 500) + '"', "></iframe>"].join(" ");
                i ? i.innerHTML = u : document.write(u), "function" != typeof window.postMessage && setInterval(function() { window.location.hash.match(/^#redirectURL=(.*)/) && (window.top.location = RegExp.$1) }, 500)
            },
            f = function(e) {
                var t = e.data;
                if (t && "redirect" === t.action && t.url) {
                    if ("/" === t.url.charAt(0)) {
                        var o = document.createElement("a");
                        if (o.href = window.top.location, "pages.services" === o.hostname) {
                            var r = o.pathname.split("/", 2);
                            2 === r.length && -1 === t.url.indexOf(r[1]) && (t.url = "/" + r[1] + t.url)
                        }
                    }
                    window.top.location = t.url
                } else if (t && t.formID && t.formID === n && (null === t.instanceID || void 0 === t.instanceID || t.instanceID === l)) {
                    var i = '[data-form-id="' + n + '"][data-instance-id="' + l + '"]';
                    (c = document.querySelector(i)) || (c = document.getElementById(s)), t.force ? c.height = t.height || c.height : c.height = Math.max(t.height, c.height), c.parentNode && (c.parentNode.style.minHeight = t.height + "px", c.parentNode.parentNode && (c.parentNode.parentNode.style.minHeight = t.height + "px"))
                }
            };
        ! function() {
            if (t = e.account, n = e.formID, o = e.width || "100%", r = 200, i = e.domain, a = e.hidden, d = "https://", t && n && i) {
                if (d += i ? i + "/prospector/form/" : "app.sharpspring.com/prospector/form/", a)
                    for (var c in a) a.hasOwnProperty(c) && h.push(encodeURIComponent(c) + "=" + encodeURIComponent(a[c]));
                m && h.push("rf__sb=" + encodeURIComponent(m)), void 0 !== window.addEventListener ? window.addEventListener("message", f, !1) : void 0 !== window.attachEvent && window.attachEvent("onmessage", f), "complete" !== document.readyState && e.target_id ? document.addEventListener ? document.addEventListener("DOMContentLoaded", function() { e.intervalId = setInterval(function() { u() }, 100) }) : document.attachEvent("onreadystatechange", function() { "complete" === document.readyState && u() }) : u()
            } else console && console.warn && console.warn("It seems that the embed code was not implemented correctly. ")
        }()
    }(ss_form);


}

/*var tabInfoSwiper = new Swiper(".swiper-container.tab-info", {
    direction: "horizontal",
    pagination: {
        el: '.swiper-pagination.tab-info',
        type: 'progressbar',
    },
    navigation: {
        nextEl: '.swiper-button-next.tab-info',
        prevEl: '.swiper-button-prev.tab-info',
    },
  });*/



function swipperInit() {


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
// scroll nav effect
let scrollpos = window.scrollY
const header = document.querySelector("nav")
const header_height = header.offsetHeight
const add_class_on_scroll = () => header.classList.add("scrolling")
const remove_class_on_scroll = () => header.classList.remove("scrolling")

window.addEventListener('scroll', function () {
    scrollpos = window.scrollY;
    if (scrollpos > 0) {
        add_class_on_scroll()
    } else {
        remove_class_on_scroll()
    }

})