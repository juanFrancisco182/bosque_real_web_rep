<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Bosque Real </title>
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <meta name="description" content="Bosque real desarrollos para vivir mejor"/>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="assets/css/reset.min.css">
    <link rel="stylesheet" href="assets/css/responsive-navbar.css">
    <link rel="stylesheet" href="assets/css/word-banner.min.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css"/>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Archivo:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

    <script>
    var currentPage = "<?php echo $this->uri->segment('1');?>";

    var api_url = "<?php echo API_URL?>";
    </script>
    <!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-NKJC6BM');</script>
<!-- End Google Tag Manager -->
    <!-- Facebook Pixel Code -->
<script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window,document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
 fbq('init', '877216793199937');
fbq('track', 'PageView');
</script>

<!-- Google Tag Manager --> <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start': 		new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0], 		j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src= 		'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f); })			(window,document,'script','dataLayer','GTM-MMX5PKZ');</script> <!-- End Google Tag 			Manager 	-->
<noscript>
 <img height="1" width="1"
src="https://www.facebook.com/tr?id=877216793199937&ev=PageView
&noscript=1"/>
</noscript>
<!-- End Facebook Pixel Code -->
</head>
<body id="mainpage">
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NKJC6BM"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<div id="loader">
    <div id="loader-bar"></div>
    <img src="assets/img/logo-br-dorado.png" alt="">
</div>
<!--HEADER-->
<?php $this->load->view('templates/header_template')?>

<!--CONTENT-->
<div class="wrapper" id="watchScroll"  style="color:var(--c-main); overflow-x: hidden !important;">


</div>

<!--FOOTER-->
<?php $this->load->view('templates/footer_template')?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

<script type="text/javascript" src="assets/js/index.js"></script>
<script type="text/javascript" src="assets/js/navbar.js" async></script>

<script src="https://unpkg.com/aos@next/dist/aos.js"></script>

<script>
function fadeImage() {
document.querySelector(".poster-image").style.display = "none";
}
  initPage();


    function initPage(){

        if(currentPage =='aviso'){
            $('#watchScroll').html( getAviso());
        }
       //

            return $.ajax({
        beforeSend: function() {},
        type: 'GET',
        async: true,
        cache: false,
        url: `${api_url}/front`,
        dataType: 'json',
        success:  function(res) {
            var pageInMemory;
            var departamentos='';
            var terrenos='';
            var oficinas='';
              menu ='';
              res.pages.forEach( page => {
                if( page.type === "1"  && (currentPage == "" || currentPage == "home") ){ currentPage = page.path }
                sessionStorage.setItem( page.path , JSON.stringify( page ) );
                html ='';
                if( page.type!="1" && page.section_type=="1" ){ departamentos+=`<li><a href="${ page.path }">${ page.name }</a></li>`; }
                if( page.type!="1" && page.section_type=="2" ){ terrenos+=`<li><a href="${ page.path }">${ page.name }</a></li>`; }
                if( page.type!="1" && page.section_type=="3" ){ oficinas+=`<li><a href="${ page.path }">${ page.name }</a></li>`; }

                pageInMemory =  JSON.parse(sessionStorage.getItem(currentPage));

            });
            if(currentPage =='aviso'){
            $('#watchScroll').html( getAviso());
            $('#departamentos-menu').html(departamentos);
           $('#departamentos-menu-footer').html(departamentos);
           $('#terrenos-menu').html(terrenos);
           $('#footer-list-terreno').html(terrenos);
           $('#oficinas-menu').html(oficinas);
           $('#footer-oficinas-list').html(oficinas);
            initMenu();
           
        }else{
            if( pageInMemory.sections.length > 0 ){
                    pageInMemory.sections.forEach(section => {
                      if( section.widgetsIntoSection.length > 0 ){
                        html += section.widgetsIntoSection[0].htmlRender;

                        $('p').each(function() {
                        var $this = $(this);
                        if($this.html().replace(/\s|&paragraph;/g, '').length == 0)
                        $this.remove(); });
                      }
                   });
              }
              html+='<a class="whatsapp-icon" href="https://api.whatsapp.com/send?phone=5215573296393&text=Contactanos"></a>';
           $('#watchScroll').html(html);
           $('#departamentos-menu').html(departamentos);
           $('#departamentos-menu-footer').html(departamentos);
           $('#terrenos-menu').html(terrenos);
           $('#footer-list-terreno').html(terrenos);
           $('#oficinas-menu').html(oficinas);
           $('#footer-oficinas-list').html(oficinas);

           let page =  JSON.parse(sessionStorage.getItem(currentPage));
           if( page.type === "3"){
                    $('.whatsapp-icon').remove();
                    $('#normalNav').remove();
                    $('#normalNav').hide();
                    $('#landingNav').show();

                }else{
                    $('#landingNav').remove();
                    $('#landingNav').hide();
                    $('#normalNav').show();
                }
           document.documentElement.style.setProperty('--c-main', page.main_color);
           document.documentElement.style.setProperty('--ms-c-highlight', page.highlights_color);
           document.documentElement.style.setProperty('--c-secondary', page.secondary_color);


           var body = $('body');
           if( page.type === "2"){
            var element = document.getElementById('mainpage');
            element.classList.add('microSite');
               var elem = document.getElementById('event1');
               if (elem){
                    var txt = elem.textContent || elem.innerText;
              openTabFunc(event, txt);

               }
               setTimeout(() => {
                //swipperInit();
                initMenu();
                initSwipperSlide();
              
               }, 1000);
               var existVideo = document.getElementsByClassName('poster-image');

               if(existVideo.length > 0){
                document.querySelector(".poster-image").onclick = function() { fadeImage() };
               }

           }else{
          //  var element = document.getElementById('mainpage');
          //  element.classList.r   ('microSite');
          setTimeout(() => {
            initSwipperSlide();
               }, 1000);

          var body = $('body');
          body.removeClass('microSite')
           }
           $("img").attr("loading","lazy");
        }
       //


        },
        error: function(error) {

        },
        complete: function() {
            setTimeout(function(){


                checkP();

                AOS.init({
                    delay: 300,
                    mirror: true,
                    duration: 600,
                });
             }, 2000);

        }
    });




    }





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
    setTimeout(() => {
          initSwipperSlide();
    }, 500);


}

    function initSwipperSlide(){

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
    var infoSwiper = new Swiper(".swiper-container.infoSwiper", {
        direction: "vertical",
        pagination: {
          el: ".swiper-pagination.info",
          clickable: true,
        },
        navigation: {
            nextEl: ".swiper-button-next.info",
            prevEl: ".swiper-button-prev.info",
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
    setTimeout(() => {
                //swipperInit();

                $('.img-full').removeClass('img-full').addClass('img-slider');
               }, 1000);



    }
    function checkP(){
        setTimeout(function(){
          $("p").each(function() {
            var $el = $(this);
            if($.trim($el.html()) == "${paragraph1}" || $.trim($el.html()) == "${paragraph2}" || $.trim($el.html()) == "${paragraph3}" || $.trim($el.html()) == "${paragraph4}") {
              $el.remove();
            }
          });


            }, 100);
            initScroll()
    }
  function  initScroll(){
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
    }
    function initMenu(){
        console.log("menuInit");
    const menu = document.querySelector('nav')
    menu.setAttribute('class', 'main-nav ')
    console.log("MENUUUU!", menu);
    const menuHeading = document.querySelector('nav > div')
    menuHeading.setAttribute('class', 'main-nav__heading mobile-style')


    const toggleButton = menu.querySelector('button #ham')
        console.log("toggleButton" + toggleButton);
    toggleButton.setAttribute('id', 'toggle-nav')

    const menuUl = document.querySelector('nav > ul')
    menuUl.setAttribute('class', 'main-nav__menu')

    const menuLis = document.querySelectorAll('nav > ul > li')
    for (const menuLi of menuLis) {
        menuLi.setAttribute('class', 'main-nav__menu-item')

        if (menuLi.querySelector('ul') !== null) {
            menuLi.classList.add('main-nav__menu-item--dropdown')
        }
    }

    const menuLinks = document.querySelectorAll(
        'nav > ul > li > a ,  nav > ul > li > span'
    )
    for (const menuLink of menuLinks) {
        menuLink.setAttribute('class', 'main-nav__menu-item-link')
    }

    const subMenus = menu.querySelectorAll('span + ul')
    for (const subMenu of subMenus) {
        subMenu.setAttribute('class', 'main-nav__sub-menu')
    }

    const subMenuLis = menu.querySelectorAll('span + ul > li')

    for (const subMenuLi of subMenuLis) {
        subMenuLi.setAttribute('class', 'main-nav__sub-menu-item')
    }
    const subMenuLiLinks = menu.querySelectorAll('span + ul > li > a')

    for (const subMenuLisLink of subMenuLiLinks) {
        subMenuLisLink.setAttribute('class', 'main-nav__sub-menu-item-link')
    }
    }



    function getAviso(){
        return `  <section  style="background-color: var( --c-secondary);">

<div  class="aviso-priv" >
    <h1 class="h4-bold" style="width:100%; text-align: center">Aviso de Privacidad</h1>
    <br><br>
    <p class="text-secondary font-weight-bold">AVISO DE PRIVACIDAD relacionado con los datos personales, recabados por BOSQUE REAL COUNTRY CLUB, S.A. DE C.V., , sus filiales o subsidiarias y sus directivos (en adelante denominadas en conjunto como “BOSQUE REAL”)</p>
    <p class="text-secondary font-weight-bold">1. Generales</p>

    <p class="text-muted">
        1.1. BOSQUE REAL pertenece a un grupo de sociedades comprometidas y respetuosas de los derechos sobre los datos personales de las personas físicas, reconocidos en el artículo 16 fracción II de la Constitución Política de los Estados Unidos Mexicanos, así como de las disposiciones de la Ley Federal de protección de datos personales en posesión de los particulares, su reglamento y la demás normativa vinculada aplicable. por lo anterior, pone a su disposición el presente aviso de privacidad, en aras de que el titular de los datos personales, se encuentre facultado a ejercitar su derecho a la autodeterminación informativa.
    </p>
    <p class="text-muted">
        1.2. Al ingresar y utilizar cualquiera de los dominios y subdominios de BOSQUE REAL, los cuales de manera enunciativa y no limitativa, se señalan los siguientes: www.bosquereal.com.mx, www.terragd.com, www.bosquereal.com.mx/showroom.html, www.bosquerealejecutivo.com.mx, www.lavistabosquereal.com, www.ivybosquereal.com, www.brfest.com.mx, www.bosquerealservicios.com.mx, www.albertosalame.org, www.blue.bosquereal.com.mx, www.embajadores.bosquereal.com.mx, www.five.bosquereal.com.mx, www.incanto.bosquereal.com.mx, www.ivy.bosquereal.com.mx, www.lavista.bosquereal.com.mx, www.lavistaterrenos.bosquereal.com.mx, www.life.bosquereal.com.mx, www.lotes.bosquereal.com.mx, www.reserva.bosquereal.com.mx, www.residence.bosquereal.com.mx, www.terrenos.bosquereal.com.mx, www.towers.bosquereal.com.mx, www.myoffice.bosquereal.com.mx, www. theoffice.bosquereal.com.mx; todos ellos en adelante referidos indistintamente como “LOS SITIOS” PROPIEDAD DE BOSQUE REAL, Usted (EL TITULAR) declara que está entendiendo y aceptando los términos y las condiciones contenidos en este aviso y declara y otorga expresamente su aceptación y consentimiento utilizando para tal efecto medios electrónicos, en términos de lo dispuesto por el artículo 1803 del Código Civil Federal.
    </p>
    <p class="text-muted">
        1.3. Si el TITULAR no acepta en forma absoluta y completa los términos y condiciones de este aviso, deberá abstenerse de compartir cualquier tipo de información a BOSQUE REAL por cualquier medio incluyendo “LOS SITIOS”.
    </p>
    <p class="text-muted">
        1.4. Para el caso que el TITULAR continúe en el uso de cualquiera de “LOS SITIOS” sea en forma total o parcial, dicha acción se considerará como su absoluta y expresa aceptación a los términos y condiciones aquí estipulados.
    </p>
    <p class="text-muted">
        1.5. La sola utilización de cualquiera de “LOS SITIOS”, le otorga al público TITULAR (en adelante referido como el "TITULAR" o los "TITULARES") e implica la aceptación, plena e incondicional, de todas y cada una de las condiciones generales y particulares incluidas en este aviso de privacidad en la versión publicada por BOSQUE REAL, en el momento mismo en que el TITULAR acceda a cualquiera de “LOS SITIOS”.
    </p>
    <p class="text-muted">
        LAS PARTES DECLARAN QUE, AL NO EXISTIR, ERROR, DOLO, MALA FE O CUALQUIER OTRO VICIO DE LA VOLUNTAD QUE PUDIERA NULIFICAR LA VALIDEZ DEL PRESENTE INSTRUMENTO, AMBAS ACUERDAN EN SUJETARSE AL TENOR DE LO ESTIPULADO EN LOS SIGUIENTES:
    </p>

    <p class="text-secondary font-weight-bold">2. Definiciones</p>
    <p class="text-muted">
        2.1. Titular. – La persona física (TITULAR) a quien identifican o corresponden los datos personales.
    </p>
    <p class="text-muted">
        2.2. Datos personales sensibles. – Aquellos datos personales que afecten a la esfera más íntima de su titular, o cuya utilización indebida pueda dar origen a discriminación o conlleve un riesgo grave para éste.
    </p>
    <p class="text-muted">
        2.3. Responsable. – Persona física o moral (BOSQUE REAL) de carácter privado que decide sobre el tratamiento de los datos personales.
    </p>
    <p class="text-muted">
        2.4. Encargado. – La persona física o moral que sola o conjuntamente con otras trate datos personales por cuenta del responsable.
    </p>
    <p class="text-muted">
        2.5. Tratamiento. – La obtención, uso (que incluye el acceso, manejo, aprovechamiento, transferencia o disposición de datos personales), divulgación o almacenamiento de datos personales por cualquier medio.
    </p>
    <p class="text-muted">
        2.5.1. Transferencia. – Toda comunicación de datos realizada a persona distinta del responsable o encargado del tratamiento.
    </p>
    <p class="text-muted">
        2.6. Derechos ARCO. – Derechos de acceso, rectificación, cancelación y oposición.
    </p>
    <p class="text-muted">
        2.7. Consentimiento Tácito. – Se entenderá que el titular ha consentido en el tratamiento de los datos, cuando habiéndose puesto a su disposición el Aviso de Privacidad, no manifieste su oposición.
    </p>
    <p class="text-muted">
        2.8. Finalidades Primarias. – Aquellas finalidades para las cuales se solicitan principalmente los datos personales y por lo que se da origen a la relación entre BOSQUE REAL y EL TITULAR.
    </p>
    <p class="text-muted">
        2.9. Finalidades Secundarias. – Aquellas finalidades que no son imprescindibles para la relación entre BOSQUE REAL y EL TITULAR, pero que con su tratamiento contribuye al cumplimiento del objeto social de las empresas que comprende BOSQUE REAL.
    </p>
    <p class="text-muted">
        2.10. Medios Electrónicos: Significa individual o conjuntamente, los equipos, medios electrónicos, magnéticos, ópticos o de cualquier otra tecnología, sistemas automatizados de procesamiento de datos y redes de telecomunicaciones, ya sean privados o públicos, locales o internacionales, dentro de los cuales, enunciativa más no limitativamente se incluyen: (i) el teléfono, el celular, el correo electrónico, chat, whatsapp, mensajes push, la aplicación para dispositivos móviles (“APP”), las tecnologías conocidas como GSM (Global System for Mobile Communications), GPRS (General Packet Radio Service), CDMA (Code Division for Multiple Access), TDMA (Time Division for Multiple Access), HSPDA (High Speed Downlink Packet Access) o cualquier otra tecnología celular o de radio frecuencias que permitan utilizar SMS (servicio de mensajes cortos por sus siglas “Short Message Service”), MMS (servicio de mensajes multimedia, por sus siglas “Multimedia Messaging Service”) o cualquier otro servicio similar; (ii) las redes de comunicación vía cable, satélite, transmisión de ondas y o cualquier otra similar, los “SITIOS”; (iii) las terminales de cómputo, sistemas o software internos, Internet, el Fanpage de Facebook, el perfil de Twitter, e Instagram de Bosque Real y aquellos elementos electrónicos que en el futuro se lleguen a considerar como tales, aceptables a “BOSQUE REAL”.
    </p>
    <p class="text-muted">
        2.11. Conjuntos Urbanos: Conjunto Urbano Bosque Real, Conjunto Urbano BR y Conjunto Urbano Reserva Bosque Real.
    </p>

    <p class="text-secondary font-weight-bold">3. Identidad y domicilio del responsable que recaba los datos personales</p>
    <p class="text-muted">
        El Responsable de la obtención de los datos personales es BOSQUE REAL COUNTRY CLUB, S.A. DE C.V. y sus filiales o subsidiarias (Bosque Real), quien se compromete a respetar lo establecido en el presente Aviso de Privacidad (en lo sucesivo el “Aviso”), mismo que está puesto a su disposición, en cumplimiento a lo establecido en la Ley Federal de Protección de Datos Personales en Posesión de los Particulares (en lo sucesivo la “Ley”), su Reglamento y la demás normativa vinculada, y es aplicable respecto a los datos personales de las personas físicas, que BOSQUE REAL obtiene con motivo de las actividades que realiza con los clientes, prospectos de clientes y/o socios, y/o participantes en eventos, y/o colonos, proveedores, prospectos de proveedores, condóminos, visitantes a las instalaciones, y usuarios de “LOS SITIOS”, de Medios Electrónicos y de las redes sociales en las que participa BOSQUE REAL.
    </p>
    <p class="text-muted">
        El domicilio que, para los efectos del presente aviso, establece BOSQUE REAL, es el ubicado en: Carretera México-Huixquilucan No. 180, Colonia San Bartolomé Coatepec, C.P. 52774, Huixquilucan, Estado de México, México.
    </p>

    <p class="text-secondary font-weight-bold">4. Datos personales que se recaban</p>
    <p class="text-muted">
        4.1. EL TITULAR reconoce y acepta que BOSQUE REAL, obtendrá directamente los siguientes datos personales, atendiendo a la relación con cada TITULAR: Nombre completo, lugar y fecha de nacimiento, fotografía, nacionalidad, dirección de casa y oficina, teléfono de domicilio, oficina y teléfono celular, correo electrónico, estado civil, régimen matrimonial, nombre del cónyuge, ocupación, nacionalidad, correo electrónico, marca, modelo y color de automóvil, número de placas del automóvil, número de hijos en caso de tenerlos, nombres de los beneficiarios de los títulos accionarios. Además, se piden los siguientes documentos en copia simple: identificación oficial, actas de nacimiento, actas de matrimonio, comprobante de domicilio, CURP, R.F.C., en su caso, documento migratorio, escritura o boleta predial o contrato de compraventa del inmueble y Cartas de Recomendación de dos socios de BOSQUE REAL. Adicionalmente, BOSQUE REAL podrá recabar los siguientes datos patrimoniales: Registro Federal de Contribuyentes, crédito Infonavit, carta de crédito Infonavit, modificaciones al salario, régimen fiscal, ingresos mensuales, gastos mensuales, bienes inmuebles de su propiedad, tipo de cuenta bancaria, número, banco y sucursal, referencias comerciales y bancarias, actividad preponderante, datos de tarjetas bancarias, cuenta Clabe, historial crediticio del Buró de Crédito.<br><br>
        En caso de Personas Morales y Fideicomisos, se recabará el Acta Constitutiva y/o algún otro tipo de documento público o privado que defina la situación corporativa de estos, identificación del Representante legal o apoderado, así como la escritura pública en la que consten las facultades, comprobante de domicilio, Registro Federal de Contribuyentes, número de teléfono, correos electrónicos para contacto, datos financieros y patrimoniales (estados financieros, declaraciones anuales, constancia de situación fiscal, estado de cuenta bancario).
    </p>
    <p class="text-muted">
        4.2. EL TITULAR en este acto, otorga su consentimiento expreso en términos del artículo 8 de la LFPDPPP, para que BOSQUE REAL, trate sus datos personales, incluidos los denominados financieros y/o patrimoniales contenidos en esta cláusula, para cumplir con las finalidades que establece el presente Aviso de Privacidad.
    </p>
    <p class="text-muted">
        4.3. BOSQUE REAL manifiesta que podrá obtener los datos personales de EL TITULAR mediante las denominadas fuentes de acceso público, a efecto de validar, actualizar y contactará EL TITULAR, respetando en todo momento la expectativa razonable de privacidad, a que se refiere el artículo 7 de la LFPDPPP.
    </p>
    <p class="text-muted">
        4.4. BOSQUE REAL usará información IP (Protocolo de Internet, por sus siglas en inglés Internet Protocole) para analizar cualquier tipo de amenazas a “LOS SITIOS”, así como para recabar información demográfica. Sin embargo, la información IP, en ningún caso será utilizada para identificar a los TITULARES, excepto cuando haya probabilidades de actividad fraudulenta.
    </p>
    <p class="text-muted">
        4.5. Datos de identificación en redes sociales: Nombre de usuario en Facebook, Twitter, Instagram y LinkedIn, entre otros.
    </p>
    <p class="text-muted">
        4.6. En caso de resultar necesario, se recabarán datos personales sensibles, relacionados con el estado de salud de EL TITULAR, sin embargo, en términos de lo establecido por el artículo 9 de la LFPDPPP, en caso de que BOSQUE REAL obtenga dichos datos, será necesario el consentimiento expreso y por escrito de EL TITULAR.
    </p>

    <p class="text-secondary font-weight-bold">5. Uso de “Cookies” y “web beacons”</p>
    <p class="text-muted">
        5.1. BOSQUE REAL reconoce que no es posible que “LOS SITIOS” hagan uso de "cookies" en conexión con ciertas características o funciones. Las cookies son tipos específicos de información que un sitio web transmite al disco duro de la computadora del TITULAR con el fin de mantener los registros. Las cookies pueden servir para facilitar el uso de un sitio web, al guardar contraseñas y preferencias mientras EL TITULAR navega en Internet.
    </p>
    <p class="text-muted">
        5.2. “LOS SITIOS” no usan o guardan cookies para obtener datos de identificación personal de la computadora del TITULAR que no se hayan enviado originalmente como parte de la cookie.
    </p>
    <p class="text-muted">
        5.3. Por su parte, las “web beacons” son imágenes insertadas en una página de Internet o correo electrónico, que puede serutilizado para monitorear el comportamiento de un visitante, como almacenar información sobre la dirección IP del usuario,duración del tiempo de interacción en dicha página y el tipo de navegador utilizado, entre otros.
    </p>
    <p class="text-muted">
        5.4. Aunque la mayoría de los navegadores aceptan “cookies” y “web beacons” automáticamente, EL TITULAR puede configurar su navegador para que no los acepte.
    </p>
    <p class="text-muted">
        5.5. Para desactivar las “cookies”, debe seguir las siguientes instrucciones:
    </p>
    <p class="text-muted">
        5.5.1. En una PC: abrir el explorador de Internet, entrar al menú de “Herramientas”, entrar a “Opciones de Internet”, escoger la pestaña de “Privacidad”, mover el cursor de la Configuración hacia “Bloquear todas las Cookies”.
    </p>
    <p class="text-muted">
        5.5.2. En una Mac: abrir la aplicación de internet, ir a “Preferencias”, escoger la opción de “Seguridad”, escoger “Nunca” en la opción de “Aceptar Cookies”.
    </p>

    <p class="text-secondary font-weight-bold">6. Finalidades del tratamiento de los datos personales</p>
    <p class="text-muted">
        6.1. BOSQUE REAL acepta y reconoce que podrá tratar directamente o a través de encargados, los datos personales de EL TITULAR, de conformidad al tipo de relación que tiene con éste, para las siguientes finalidades primarias:
    </p>
    <p class="text-muted">
        6.1.1. EL TITULAR -Visitante:
    </p>
    <p class="text-muted">
        6.1.1.1. Identificar a los visitantes que se encuentren en las instalaciones de BOSQUE REAL y en los Conjuntos Urbanos.
    </p>
    <p class="text-muted">
        6.1.1.2. Llevar a cabo directamente o a través del Encargado el registro de los ingresos y salidas de los visitantes a las instalaciones de BOSQUE REAL.
    </p>
    <p class="text-muted">
        6.1.1.3. Grabación de audio y/o video en áreas comunes respecto de los visitantes a las instalaciones, mismos que son conservados por: 45 días desde que los mismos son recolectados.
    </p>
    <p class="text-muted">
        6.1.1.4. Almacenar en una base de datos los datos de registro por ingresos y salidas de las instalaciones de BOSQUE REAL, por un periodo de 45 días a partir de la fecha de su registro.
    </p>
    <p class="text-muted">
        6.1.2. EL TITULAR-Clientes y/o Prospectos:
    </p>
    <p class="text-muted">
        6.1.2.1. Identificar y contactar por cualquiera de los Medios Electrónicos, para atender y dar seguimiento a las solicitudes sobre los inmuebles que ofrece BOSQUE REAL.
    </p>
    <p class="text-muted">
        6.1.2.2. Realizar los trámites necesarios para concretar y formalizar la compra-venta de los inmuebles, ante las autoridades, instituciones financieras y fedatarios correspondientes.
    </p>
    <p class="text-muted">
        6.1.2.3. Registrarlos y actualizar los datos en los Medios Electrónicos internos, para el acceso a los datos personales por las personas autorizadas para ello.
    </p>
    <p class="text-muted">
        6.1.2.4. Para que el cliente pueda resolver en línea las dudas respecto de los inmuebles que ofrece BOSQUE REAL.
    </p>
    <p class="text-muted">
        6.1.2.5. Realizar y almacenar un expediente físico del TITULAR-Cliente durante el tiempo que dure la relación comercial, y hasta que los datos de carácter personal hayan dejado de ser necesarios para el cumplimiento de las finalidades previstas por el aviso de privacidad y las disposiciones legales aplicables y hasta por un plazo de 10 años.
    </p>
    <p class="text-muted">
        6.1.2.6. Elaboración de facturación electrónica y notas de crédito derivadas de los servicios que presta BOSQUE REAL.
    </p>
    <p class="text-muted">
        6.1.2.7. Realizar transacciones con instituciones de crédito, que resulten con motivo de la prestación de los servicios.
    </p>
    <p class="text-muted">
        6.1.2.8. Realizar los trámites necesarios para que el TITULAR-Cliente obtenga el Crédito o financiamiento para la adquisición de los inmuebles.
    </p>
    <p class="text-muted">
        6.1.2.9. Corroborar referencias bancarias y comerciales del cliente prospecto.
    </p>
    <p class="text-muted">
        6.1.2.10. Envío de estados de cuenta por servicios y requerimientos de pago.
    </p>
    <p class="text-muted">
        6.1.2.11. Identificar la entrega de promocionales y/o cupones de descuento sobre mercancía.
    </p>
    <p class="text-muted">
        Adicional a las anteriores, los datos personales podrán ser tratados para las siguientes finalidades primarias, cuando dichos clientes o prospectos, tengan el carácter de:
    </p>
    <p class="text-muted">
        6.1.3. EL TITULAR- Colonos:
    </p>
    <p class="text-muted">
        6.1.3.1. Registro en la base de datos del sistema, de los Residentes, condóminos o cualquier otro tipo de usuarios de casas habitación o locales comerciales que se encuentran en los Conjuntos Urbanos.
    </p>
    <p class="text-muted">
        6.1.3.2. Actualizar el registro en la base de datos del sistema de cambios de propietario, arrendatarios o de cualquier forma incorporar los datos de las personas que habiten los inmuebles de los Conjuntos Urbanos.
    </p>
    <p class="text-muted">
        6.1.3.3. Facturación mensual de los servicios prestados dentro de los Conjuntos Urbanos.
    </p>
    <p class="text-muted">
        6.1.3.4. Identificar y contactar vía telefónica, a través de Medios Electrónicos, para el envío de notificaciones masivas o personalizadas por medio de comunicados escritos o por correo electrónico de avisos referentes a los Conjuntos Urbanos.
    </p>
    <p class="text-muted">
        6.1.3.5. Procurar la seguridad de sus residentes, condóminos, locatarios, mantener comunicados a éstos y en general en beneficio y desarrollo de los Conjuntos Urbanos.
    </p>
    <p class="text-muted">
        6.1.3.6. Proveerles de los servicios que prestan las diversas empresas de Bosque Real y realizar las visitas a los inmuebles para verificar el servicio.
    </p><p class="text-muted">
    6.1.3.7. En caso de ser Residente de los Conjuntos Urbanos, sus datos se utilizarán para contactarle de manera personal, por cualquier medio electrónico, para informarle la situación del Conjunto Urbano de que se trate, enviarle estados de cuenta, solicitar el pago de las cuotas, aportaciones, servicios y sanciones a su cargo, proporcionarle los servicios con los que cuentan los Conjuntos Urbanos.
</p>
    <p class="text-muted">
        6.1.3.8. Para permitir y controlar el acceso a los Conjuntos Urbanos de los residentes, condóminos, sus visitantes, sus trabajadores/proveedores y cualquier persona que ingrese.
    </p>
    <p class="text-muted">
        6.1.3.9. Control de dispositivos magnéticos asignados a los Residentes, para el uso de los accesos automáticos vehiculares.
    </p>
    <p class="text-muted">
        6.1.3.10. Elaboración de documentación requerida por los Residentes (constancias) para el control de acceso de personas o bienes (autorizaciones).
    </p>
    <p class="text-muted">
        6.1.3.11. En el evento de un percance vehicular dentro de las instalaciones de los Conjuntos Urbanos, proporcionar a las autoridades la información requerida.
    </p>
    <p class="text-muted">
        6.1.4. Participantes de eventos o torneos:
    </p>
    <p class="text-muted">
        6.1.4.1. Registro como participante en los torneos o eventos organizados por BOSQUE REAL.
    </p>
    <p class="text-muted">
        6.1.4.2. Entrega de premios y reconocimientos por la participación en los eventos o torneos organizados por BOSQUE REAL.
    </p>
    <p class="text-muted">
        6.1.4.3. Identificar y contactar vía telefónica, a través de Medios Electrónicos, para enviar invitaciones a nuevos eventos o torneos que organice BOSQUE REAL.
    </p>
    <p class="text-muted">
        6.1.4.4. Publicación de los resultados de los torneos o eventos en áreas comunes dentro de las instalaciones y/o sitios de BOSQUE REAL.
    </p>
    <p class="text-muted">
        6.1.5. EL TITULAR- Socios/Usuarios Casa Club, Campo de Golf y Campo Ejecutivo:
    </p>
    <p class="text-muted">
        6.1.5.1. Identificar y contactar de manera personal, o por cualquiera de los Medios Electrónicos, para enviar invitaciones a eventos exclusivos organizados por BOSQUE REAL y/o sus socios de negocios.
    </p>
    <p class="text-muted">
        6.1.5.2. Identificación y registro como socio/usuario de BOSQUE REAL.
    </p>
    <p class="text-muted">
        6.1.5.3. Generar la membresía como socio/usuario de BOSQUE REAL y permitir el acceso al campo de golf o al Campo Ejecutivo.
    </p>
    <p class="text-muted">
        6.1.5.4. Poder acceder a los servicios e instalaciones del Campo de Golf y Casa Club, y al Campo Ejecutivo.
    </p>
    <p class="text-muted">
        6.1.5.5. Control de dispositivos magnéticos asignados a los Socios/Usuarios, para el uso de los accesos automáticos vehiculares.
    </p>
    <p class="text-muted">
        6.1.5.6. Para contactarle de manera personal, a través de cualquiera de los Medios Electrónicos, para informarle la situación de la Casa Club de BOSQUE REAL, el club ejecutivo y los campos de golf localizados en el Conjunto Urbano Bosque Real, enviarle estados de cuenta, solicitar el pago de las cuotas, aportaciones, servicios y sanciones a su cargo, proporcionarle los servicios con los que cuentan dichos lugares.
    </p>
    <p class="text-muted">
        6.1.6. EL TITULAR- Personal de obra, Proveedor, prospecto de proveedor/Contratista y empleados de estos, en estos casos las finalidades primarias serán las siguientes:
    </p>
    <p class="text-muted">
        6.1.6.1. Identificar a los trabajadores, empleados, contratistas, proveedores, subcontratistas y sus empleados, que se encuentren en las instalaciones de BOSQUE REAL y de los Conjuntos Urbanos. Llevar a cabo directamente o a través del Encargado el registro de los ingresos y salidas de los Proveedores/Contratistas/Subcontratistas y empleados de estos, a las instalaciones de BOSQUE REAL y de los Conjuntos Urbanos. Grabación de audio y/o video en áreas comunes durante su estancia en las instalaciones, mismos que son conservados por: la Dirección de Seguridad de Bosque Real. Almacenar en una base de datos, los datos de registro por ingresos y salidas de las instalaciones de BOSQUE REAL.
    </p>
    <p class="text-muted">
        6.1.6.2. Dar de alta, en caso de ser necesario el perfil del Personal de obra, Proveedor, prospecto de proveedor/Contratista y empleados de estos, en el software de uso interno de BOSQUE REAL para el acceso interno a los datos personales por las personas autorizadas para ello.
    </p>
    <p class="text-muted">
        6.1.6.3. Contactarlo vía telefónica, a través de Medios Electrónicos, para dar seguimiento a las solicitudes de servicios y/o productos que requiere BOSQUE REAL.
    </p>
    <p class="text-muted">
        6.1.6.4. Realizar transferencias bancarias, solicitar estados de cuenta, y rectificación de los datos, con motivo de las requisiciones de productos o servicios que le haga BOSQUE REAL.
    </p>
    <p class="text-muted">
        6.1.6.5. Realizar las aclaraciones sobre los pagos.
    </p>
    <p class="text-muted">
        6.1.6.6. Generar un registro y control en la base de datos de “Proveedores” de BOSQUE REAL, que será conservado y actualizada por 15-quince años desde que los mismos son generados.
    </p><p class="text-muted">
    6.1.6.7. En caso de ser necesario, llevar un expediente físico y/o electrónico del Proveedor, prospecto de proveedor/Contratista, durante el tiempo que dure la relación comercial y por 15-quince años posteriores a su terminación por cualquier causa.
</p>
    <p class="text-muted">
        6.1.6.8. Para que BOSQUE REAL, en coordinación con el Proveedor/Contratista, den cumplimiento a su obligación de mantener la seguridad, salud e higiene y la prevención de riesgos de trabajo en los centros de trabajo establecida en la Ley Federal del Trabajo (LFT), las disposiciones emitidas por el CONSEJO DE SALUBRIDAD GENERAL, o cualquier otra autoridad encargada de la rectoría para la atención de la contingencia que se trate, las NOM’s aplicables, así como los reglamentos interiores de trabajo y los lineamientos en materia de construcción, y de salud e higiene.
    </p>
    <p class="text-muted">
        6.1.6.9. Para que, ante la existencia de algún riesgo sanitario o de cualquier otro tipo, BOSQUE REAL pueda implementar las políticas y procesos necesarios para atender dicha situación.
    </p>
    <p class="text-muted">
        6.1.6.10. En caso de dar positivo de COVID-19 o presentar algún síntoma o condición, para dar aviso a sus familiares y canalizarlo a un centro de salud o a su casa.
    </p>
    <p class="text-muted">
        6.1.6.11. Para el mantenimiento de la relación contractual, y
    </p>
    <p class="text-muted">
        6.1.6.12. Para evitar daños al individuo y a terceros.
    </p>
    <p class="text-muted">
        6.1.7. EL TITULAR –Usuario de LOS SITIOS, de la APP y de las redes sociales en las que participa BOSQUE REAL:
    </p>
    <p class="text-muted">
        6.1.7.1. Contactar por cualquiera de los Medios Electrónicos, o por cualquier medio disponible a EL TITULAR-Usuario, para atender y dar seguimiento a sus comentarios o solicitudes en el apartado de “Contacto” de LOS SITIOS.
    </p>
    <p class="text-muted">
        6.1.7.2. Contactar con los usuarios de los Medios Electrónicos de BOSQUE REAL para dar seguimiento a los comentarios o solicitudes de información recibidas.
    </p>
    <p class="text-muted">
        6.1.7.3. Resolver dudas de los Usuarios respecto de los inmuebles que ofrece BOSQUE REAL, en línea a través de LOS SITIOS.
    </p>
    <p class="text-muted">
        6.1.7.4. Contactar con cualquiera de los Medios Electrónicos o cualquier otro medio de BOSQUE REAL.
    </p>
    <p class="text-muted">
        6.1.7.5. Almacenar los datos personales en el sistema interno, durante el tiempo que dure la relación con BOSQUE REAL y por 15-quince años posteriores.
    </p>
    <p class="text-muted">
        6.2. BOSQUE REAL podrá tratar los datos personales del TITULAR para las siguientes finalidades secundarias:
    </p>
    <p class="text-muted">
        6.2.1. Para el caso del TITULAR-Cliente-Socio-Usuario-Residente-Colono, evaluar la calidad de los productos ofrecidos por BOSQUE REAL, así como la calidad de atención a sus comentarios o solicitudes.
    </p>
    <p class="text-muted">
        6.2.2. Para enviarles comunicaciones o boletines con fines publicitarios o mercadotécnicos respecto de los inmuebles, productos o servicios que ofrece BOSQUE REAL, haciendo uso de Medios Electrónicos, o cualquier otro medio de publicidad disponible.
    </p>
    <p class="text-muted">
        6.2.3. Realizar estudios internos sobre hábitos de consumo.
    </p>
    <p class="text-muted">
        6.2.4. Para proporcionarle comunicaciones adicionales, información y promociones, tales como boletines informativos e invitaciones a eventos.
    </p>
    <p class="text-muted">
        6.2.5. Informar vía correo electrónico sobre cambios o nuevos productos que estén relacionados con los inmuebles que ofrece BOSQUE REAL.
    </p>
    <p class="text-muted">
        6.2.6. Para contactar al TITULAR-Cliente-Socio-Usuario-Residente-Colono, a fin de informarle de actualizaciones de LOS SITIOS, mensajes informativos y relativos a servicios, incluyendo actualizaciones de seguridad importantes.
    </p>
    <p class="text-muted">
        6.2.7. Generar informes internos sobre la utilización de LOS SITIOS.
    </p>
    <p class="text-muted">
        6.2.8. Para el caso de los TITULAR-Cliente-Socio-Usuario-Residente-Colono y Proveedores, generar un registro en las bases de datos de BOSQUE REAL que serán conservados por 15-quince años.
    </p>
    <p class="text-muted">
        6.2.9. Envíos masivos de mail marketing
    </p>
    <p class="text-muted">
        6.2.10. Encuestas telefónicas o vía correo electrónico o por cualquier otro de los Medios Electrónicos, respecto de los intereses y expectativas de los inmuebles ofrecidos o administrados por BOSQUE REAL.
    </p>
    <p class="text-muted">
        6.2.11. Atender y dar seguimiento a solicitudes o comentarios en los perfiles de BOSQUE REAL dentro de las redes sociales o por cualquier otro de los Medios Electrónicos.
    </p>
    <p class="text-muted">
        6.2.12. Para el envío de boletines, revistas o cualquier otro tipo de comunicados relacionados con las medidas de seguridad, salude higiene y la prevención de riesgos de trabajo en los centros de trabajo, que sean emitidas por BOSQUE REAL, o cualquier autoridad sanitaria.
    </p>
    <p class="text-muted">
        6.2.13. Para coadyuvar, a solicitud de las autoridades competentes, de conformidad con lo previsto en las fracciones V, VI y VII del artículo 10 de la Ley Federal de Protección de Datos Personales en Posesión de los particulares.
    </p>
    <p class="text-muted">
        6.3. En caso de que EL TITULAR no desee que sus datos personales sean utilizados para todas o algunas de las Finalidades Secundarias que se establecen en el apartado 6.2., deberá enviar una solicitud de eliminación de sus datos, especificando las finalidades para las que desea que no sean tratados sus datos personales, al siguiente correo electrónico: mvr@bosquereal.com.mx
    </p>
    <p class="text-muted">
        6.4. Asimismo, BOSQUE REAL informa al TITULAR que, salvo las excepciones que se describen en el punto 6.1 y 6.2 del presente Aviso, todos los datos personales almacenados tanto en soportes físicos y/o electrónicos, serán almacenados por 15-quince años, una vez que concluya la finalidad para la que fueron recabados, para su posterior destrucción.
    </p>

    <p class="text-secondary font-weight-bold">7. Limitaciones para el acceso y divulgación de los datos personales</p>
    <p class="text-muted">
        BOSQUE REAL, se compromete a realizar su mejor esfuerzo para proteger la seguridad de los datos personales que EL TITULAR le está entregando, mediante la celebración de actos jurídicos, el uso de Medios Electrónicos que controlen el acceso, uso o divulgación sin autorización de la información personal; para tal efecto, se almacena la información personal en bases de datos con acceso limitado que se encuentran en instalaciones controladas con mecanismos de seguridad; BOSQUE REAL, se compromete a que la información proporcionada por EL TITULAR, sea considerada con carácter confidencial, y utilizada bajo plena privacidad.<br>
        En este tenor, BOSQUE REAL se obliga a tomar las medidas necesarias para garantizar que los Encargados que requiera cumplan con lo establecido en el presente Aviso de Privacidad.<br>
        No obstante lo anterior y, en caso de que se presenten vulneraciones de seguridad ocurridas en cualquier fase del tratamiento, que afecten de forma significativa los derechos patrimoniales o morales de los TITULARES, éstos serán informados por correo electrónico, o por cualquiera de los Medios Electrónicos de forma inmediata, a fin de que estos últimos puedan tomar las medidas correspondientes a la defensa de sus derechos, deslindando de cualquier responsabilidad a BOSQUE REAL, si la vulneración no es imputable a él.
    </p>

    <p class="text-secondary font-weight-bold">8. Responsable de tramitar las solicitudes</p>
    <p class="text-muted">
        En caso de que EL TITULAR necesite revocar su consentimiento, así como Acceder, Rectificar, Cancelar, Oponerse al tratamiento de los datos personales que ha proporcionado, lo deberá hacer a través de las personas designadas por BOSQUE REAL, cuyos datos se describen a continuación y quien le entregará el formato correspondiente:
    </p>
    <p class="text-muted">
        Nombre: Lic. Marcela Valiente Riveros
    </p>
    <p class="text-muted">
        Correo electrónico: mvr@bosquereal.com.mx
    </p>

    <p class="text-secondary font-weight-bold">9. Medios para revocar el consentimiento</p>
    <p class="text-muted">
        EL TITULAR de los datos personales podrá revocar el consentimiento para el tratamiento de sus datos, la cual se otorga con la aceptación del presente; asimismo podrá manifestar su negativa para el tratamiento de sus datos personales con relación a las finalidades secundarias. Dicha revocación del consentimiento, incluida la revocación del consentimiento que se obtiene por medios electrónicos y la manifestación de la negativa para el tratamiento de sus datos personales se deberá de hacer observando el siguiente procedimiento, utilizando el formato que BOSQUE REAL pone a su disposición:
    </p>
    <p class="text-muted">
        9.1. Enviar un correo electrónico en atención a los Responsables, designados en el punto 8- ocho del presente Aviso, mediante el cual serán atendidas dichas solicitudes.
    </p><p class="text-muted">
    9.2. Enviar una solicitud o mensaje de datos al correo electrónico antes precisado, en el que señale:
</p>
    <p class="text-muted">
        9.2.1. El nombre completo del TITULAR, domicilio y correo electrónico para recibir la respuesta que se genere con motivo de su solicitud;
    </p>
    <p class="text-muted">
        9.2.2. El motivo de su solicitud;
    </p>
    <p class="text-muted">
        9.2.3. Los argumentos que sustenten su solicitud o petición;
    </p>
    <p class="text-muted">
        9.2.4. Documento oficial que acredite su identidad y que demuestre que es quien dice ser; y
    </p>
    <p class="text-muted">
        9.2.5. Fecha a partir de la cual, se hace efectiva la revocación de su consentimiento.
    </p>
    <p class="text-muted">
        9.3. BOSQUE REAL notificará a EL TITULAR, en un plazo máximo de 20 (veinte) días, contados desde la fecha en que se recibió la solicitud sobre el ejercicio de los derechos ARCO, la resolución adoptada, a efecto de que, si resulta procedente, se haga efectiva la misma dentro de los 15 (quince) días siguientes a la fecha en que se comunica la respuesta, mediante un mensaje que contenga que ha ejecutado de todos los actos tendientes a no tratar los datos personales de EL TITULAR.
    </p>
    <p class="text-muted">
        9.4. En caso de que el titular opte por manifestar la negativa para el tratamiento de sus datos personales con relación a las finalidades secundarias, y en caso de que el aviso de privacidad no se le haya hecho del conocimiento de EL TITULAR de manera directa y personal, este tendrá 5 días hábiles para llevar a cabo el procedimiento antes descrito.
    </p>
    <p class="text-secondary font-weight-bold">10. Medios para ejercer los derechos ARCO</p>
    <p class="text-muted">
        En caso de que EL TITULAR necesite Acceder, Rectificar, Cancelar u Oponerse a los datos personales que ha proporcionado a BOSQUE REAL, el TITULAR deberá seguir el siguiente procedimiento, utilizando el formato que BOSQUE REAL pone a su disposición:
    </p>
    <p class="text-muted">
        10.1. Enviar un correo electrónico en atención a los Responsables, designados en el punto 8- ocho del presente Aviso, mediante el cual serán atendidas dichas solicitudes, señalando lo siguiente:
    </p>
    <p class="text-muted">
        10.1.1. El nombre completo del TITULAR, domicilio y correo electrónico para recibir la respuesta que se genere con motivo de su solicitud;
    </p>
    <p class="text-muted">
        10.1.2. El motivo de su solicitud;
    </p>
    <p class="text-muted">
        10.1.3. Los argumentos que sustenten su solicitud o petición;
    </p>
    <p class="text-muted">
        10.1.4. Documento oficial que acredite su identidad y que demuestre que es quien dice ser;
    </p>
    <p class="text-muted">
        10.1.5. Descripción clara y precisa de los datos personales respecto de los que se busca ejercer alguno de los derechos ARCO, y cualquier otro elemento o documento que facilite la localización de los datos personales.
    </p>
    <p class="text-muted">
        10.1.6. Tratándose de solicitudes de rectificación de datos personales, el TITULAR deberá indicar, además de lo señalado, las modificaciones realizarse y aportar la documentación que sustente su petición.
    </p>
    <p class="text-muted">
        10.2. BOSQUE REAL notificará al TITULAR, en un plazo máximo de 20 (veinte) días contados desde la fecha en que se recibió la solicitud de acceso, rectificación, cancelación u oposición, la resolución adoptada, a efecto de que, si resulta procedente, se haga efectiva la misma dentro de los 15 (quince) días siguientes a la fecha en que se comunica la respuesta. Tratándose de solicitudes de acceso a datos personales, procederá la entrega previa acreditación de la identidad del solicitante o representante legal, según corresponda. En casos justificados, BOSQUE REAL podrá prorrogar el plazo de respuesta, previa notificación por escrito al Titular.
    </p>

    <p class="text-secondary font-weight-bold">11. Transferencia de datos personales</p>
    <p class="text-muted">
        11.1. BOSQUE REAL se obliga a no transferir los datos personales a favor de terceros, salvo en el caso que resulte necesario para cumplir con las finalidades establecidas en el presente Aviso de Privacidad.
    </p>
    <p class="text-muted">
        11.2. Para situaciones operativas de BOSQUE REAL, en el caso de los clientes, para finalizar el proceso de compra-venta de inmuebles con la escrituración de los mismos a nombre del TITULAR-Cliente, sus datos personales podrán ser transferidos a los notarios públicos y a las siguientes personas morales con quienes BOSQUE REAL y sus directivos se vinculan comercialmente, no requiriéndose el consentimiento del TITULAR por encontrarse en una de las situaciones de excepción que prevé el artículo 37 de la LFPDPPP: BRLIFE, S.A.P.I. DE C.V.; CONSTRUCCIONES TIG, S.A DE C.V.; CONTROLADORA TCP, S.A. DE C.V.; COMPAÑIA DE FRACCIONAMIENTOS TCP, S.A. DE C.V.; DESARROLLOS BOSQUE REAL, S.A DE C.V.; BOSQUE REAL COUNTRY CLUB, S.A. DE C.V.; ADMINISTRACIÓN DE SERVICIOS BOSQUE REAL, A.C.; OPERADORA DE CASAS CLUB TCP, S.A. DE C.V.; MULTISERVICIOS TCP, S.A. DE C.V.; HIDROSERVICIOS TCP, S.A. DE C.V.; MANTENIMIENTO Y SERVICIOS TCP, S.A. DE C.V.; PROMOTORA DE FRACCIONAMIENTOS TCP, S.A. DE C.V.; SERVICIOS INTEGRALES BOSQUE REAL, S.A. DE C.V.; BOSQUE REAL TU CASA, S.A. DE C.V.; CORPORATE BUILDINGS, S.A.P.I. DE C.V.; TCP ENERGY, S.A.P.I. DE C.V.; TERRA CAPITAL PARTNERS, S.A. DE C.V.; ASOCIACIÓN CONDÓMINOS BR FIVE TORRE “A” A.C.; RESIDENCE LIFESTYLE, A. C.; ADMINISTRADORA DE NÓMINA TCP. S.A. DE C.V., ADMINISTRADORA TOWERS B, A.C.; BANCO MERCANTIL DEL NORTE, SOCIEDAD ANÓNIMA, INSTITUCIÓN DE BANCA MÚLTIPLE, GRUPO FINANCIERO BANORTE, DIVISIÓN FIDUCIARIA (CAUSAHABIENTE POR FUSIÓN DE IXE BANCO, SOCIEDAD ANÓNIMA), INSTITUCIÓN DE BANCA MÚLTIPLE, GRUPO FINANCIERO BANORTE, DIVISIÓN FIDUCIARIA, EN SU CALIDAD DE FIDUCIARIO DEL FIDEICOMISO F/794; LOS PROYECTOS IDENTIFICADOS COMO THE OFFICE BY BOSQUEREAL, THE OFFICE BY PININFARINA, BLUE BY BOSQUE REAL, BANCO AZTECA, S.A., INSTITUCIÓN DE BANCA MÚLTIPLE, DIRECCION FIDUCIARIA, COMO FIDUCIARIO DEL FIDEICOMISO IDENTIFICADO COMO PROYECTO “BOSQUE REAL RESIDENCE”, NÚMERO DE FIDEICOMISO “F/1044”; TAMBIEN COMO FIDUCIARIO DEL FIDEICOMISO IDENTIFICADO COMO PROYECTO ARGENTA TOWERS, NÚMERO DE FIDEICOMISO “F/752”; TAMBIEN COMO FIDUCIARIO DEL FIDEICOMISO IDENTIFICADO COMO PROYECTO LA VISTA, NUMERO DE FIDEICOMISO F/1126; TAMBIÉN COMO FIDUCIARIO DEL FIDEICOMISO IDENTIFICADO COMO BOSQUE REAL RESERVA, NÚMERO F/ 1127; TAMBIÉN COMO FIDUCIARIO DEL FIDEICOMISO IDENTIFICADO COMO PROYECTO IVY BY BOSQUE REAL, NÚMERO DE FIDEICOMISO F/1132; TAMBIÉN COMO FIDUCIARIO DEL FIDEICOMISO IDENTIFICADO COMO PROYECTO THE OAKS, NÚMERO F/1138; TAMBIÉN COMO FIDUCIARIO DEL FIDEICOMISO F/723; COMO FIDUCIARIO DEL FIDEICOMISO F/911, IDENTIFICADO COMO PROYECTO BOSQUE REAL INCANTO y la FUNDACION ALBERTO SALAME COHEN I.A.P.y/o cualquiera de los directivos de BOSQUE REAL, las administraciones de los edificios de BOSQUE REAL FIVE y de los desarrollos inmobiliarios a cargo de “Bosque Real”.
    </p>
    <p class="text-muted">
        11.3. Asimismo, en cumplimiento de sus obligaciones legales, y con efectos informativos al TITULAR, se le indica que BOSQUE REAL podrá realizar las siguientes transferencias de sus datos personales:
    </p>
    <p class="text-muted">
        11.3.1. IMSS, INFONAVIT, CNBV, SAT, Autoridades Estatales o Municipales, a efecto de dar cumplimiento a la legislación laboral, de desarrollo urbano, de seguridad social, así como el pago de contribuciones.
    </p>
    <p class="text-muted">
        11.3.2. Instituciones bancarias, a efecto realizar el cobro o el pago de los servicios, que requiere u ofrece BOSQUE REAL para sus clientes y proveedores.
    </p>
    <p class="text-muted">
        11.3.3. Autoridades e instituciones privadas y gubernamentales para prestar los servicios solicitados por los clientes.
    </p>

    <p class="text-secondary font-weight-bold">12. Modificaciones</p>
    <p class="text-muted">
        Las partes acuerdan que el Aviso de Privacidad, puede ser modificado en el tiempo y forma que BOSQUE REAL lo determine, atendiendo al estudio y las regulaciones que en materia de protección de datos personales surjan, por lo que se obliga a mantener actualizado el presente aviso, para su consulta en LOS SITIOS a efecto de que, en su caso, EL TITULAR se encuentre en posibilidad de ejercer sus derechos ARCO.
    </p>

    <p class="text-secondary font-weight-bold">13. Autoridad garante</p>
    <p class="text-muted">
        Si usted considera que su derecho a la protección de sus datos personales ha sido lesionado por alguna conducta u omisión de nuestra parte, o presume alguna violación a las disposiciones previstas en la Ley Federal de Protección de Datos Personales en Posesión de los Particulares, su reglamento y demás ordenamientos aplicables, podrá interponer su inconformidad o denuncia ante el Instituto Nacional de Transparencia, Acceso a la Información y Protección de Datos Personales (INAI). Para mayor información, le sugerimos visitar su página oficial de Internet www.inai.org.mx.
    </p>

    <p class="text-secondary font-weight-bold">14. Ley aplicable y jurisdicción</p>
    <p class="text-muted">
        Las partes expresan que el presente aviso, se regirá por las disposiciones legales aplicables en la República Mexicana, en especial, por lo dispuesto en la Ley Federal de Datos Personales en Posesión de los Particulares y su reglamento.<br>
        Para el caso de que exista una disputa o controversia, derivada de la interpretación, ejecución o cumplimiento del aviso de cualquiera de los documentos que del mismo se deriven, o que guarden relación con éste, las partes amigablemente, buscarán llegar a un acuerdo dentro de un plazo de treinta (30) días naturales, contados a partir de la fecha en que surja cualquier diferencia y se notifique por escrito sobre dicho evento a la contraparte, deduciendo el proceso de mediación ante el Centro de Justicia Alternativa de la ciudad de México, llevándose al amparo de la Ley de Justicia Alternativa del Tribunal Superior de Justicia de la ciudad de México, y su Reglamento Interno, vigente al momento de que se presente la controversia.<br>
        En caso de que las partes no lleguen a un acuerdo, convienen en este acto en someter todas las desavenencias que deriven del presente AVISO o de cualquiera de los documentos que del mismo se deriven, o que guarden relación con éste o con aquéllos, a ser resueltas de manera definitiva, sometiéndose a la competencia y leyes de las Autoridades Administrativas Federales o Tribunales de la ciudad de México, renunciando expresamente a cualquier fuero distinto que por razones de sus domicilios presentes o futuros pudieren corresponderles.
    </p>

    <p class="text-secondary font-weight-bold">[Fecha de última actualización julio 2020]</p>
<a class="btn-main" href="/" style="margin-top: 55px; width:200px;">Regresar</a>
</div>
</section>`;
    }


</script>

</body>
</html>
