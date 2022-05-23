import barba from '@barba/core';
import Swiper from 'swiper/bundle';
import { gsap } from "gsap";
import Isotope from "isotope-layout";


var jQueryBridget = require('jquery-bridget');
jQueryBridget( 'isotope', Isotope, $ );

var $ = require("jquery");
window.jQuery = $;
require("@fancyapps/fancybox");


function delay(n) {
  n = n || 2000;
  return new Promise(done => {
    setTimeout(() => {
      done();
    }, n);
  });
}

function qpcScroll(){

  $( function() {

  let scrollable = document.querySelector('[data-barba="container"]');
  $('[data-barba="wrapper"]').addClass('qpcScrollWrapper');
  $('[data-barba="container"]').addClass('qpcScrollContainer');

  let current = 0;
  let target = 0;
  let ease = 0.075;

  // Funzione Linear ineterpolation https://en.wikipedia.org/wiki/Linear_interpolation
  function lerp(start, end, t){
      return start * (1 - t ) + end * t;
  }

  // Triggero il body e imposto l'altezza del documento
  function initScroll(){
      document.body.style.height = `${scrollable.getBoundingClientRect().height}px`;
    //  var pippo = $(scrollable).outerHeight();
    //  $('body').css('height', pippo );
  }

  // Imposto il div per gestire lo smooth scroll tramite la lerp function
  function smoothScroll(){
      target = window.scrollY;
      current = lerp(current, target, ease);
      scrollable.style.transform = `translate3d(0,${-current}px, 0)`;
      requestAnimationFrame(smoothScroll);
  }

  initScroll()

  smoothScroll()

  setTimeout(() => window.dispatchEvent(new Event('resize')), 100);

  //mappo .wrap-header e rimuovo il doppione che viene duplicato al cambio pagina
     var _divs = $('.wrap-header');
     if (_divs.length > 1)
       _divs[1].remove();

       $(window).scroll(function() {
         var scroll = $(window).scrollTop();
         if (scroll >= 500) {
           $(".wrap-header").insertBefore('[data-barba="wrapper"]');

         } else {
           $(".wrap-header").insertAfter('.strip-2');
         }
       });


});

}


//  Animazione per tutte le pagine
function pageTransition() {
  var tl = gsap.timeline();


    tl.to(".loading-container", {
        duration: 1.2,
        width: "100%",
        top: "0",
        ease: "Expo.easeInOut",
    });

    tl.to(".loading-container", {
        duration: 1,
        width: "100%",
        top: "100vh",
        ease: "Expo.easeInOut",
        delay: 0.3,
    });
    tl.set(".loading-container", { top: "-100vh" });


//  tl.to('.loading-container', { duration: 1, opacity: 1, ease: "power1.out", delay: 0.5 });
//  tl.to('.loading-container', {opacity:0, display:"none"});

  //tl.to('.loading-container', { duration: .5, opacity: 1,  ease: "power1.out", delay: 1 });
//  $(".loading-container").addClass("active");

}

//barba.use(barbaCss);
barba.init({
  debug: true,
  sync: true,
  cacheIgnore: false,
  prefetchIgnore: false,
  timeout: 30000,
  prevent: ({ el }) => el.classList && el.classList.contains('no-barba'),

  transitions: [{
    name: 'fade',
    async leave(data) {
      const done = this.async();
      pageTransition();
      await delay(1000);
      done();
    },

    async enter(data) {
    },

    async once(data) {
    }
  },

  ]
});


// Setto le <body> classes, barba.hooks.afterLeave rimpiazza il vecchio Barba.Dispatcher.on("newPageReady"...
barba.hooks.afterLeave((data) => {
  var nextHtml = data.next.html;
  var response = nextHtml.replace(/(<\/?)body( .+?)?>/gi, '$1notbody$2>', nextHtml)
  var bodyClasses = $(response).filter('notbody').attr('class')
  $("body").attr("class", bodyClasses);
  $("html, body").animate({ scrollTop: 0 }, 700);
});


barba.hooks.after(() => {
//  console.log('after');


});


// Carico gli script di terze parti
barba.hooks.afterEnter(() => {

  if(/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)){
  // vero per il mobile

  }else{
    qpcScroll();
  }

  var swiper1 = new Swiper('.swiper1', {

    speed: 1,
    autoplay: {
      delay: 4000,
      disableOnInteraction: false
    },
    pagination: {
      el: '.swiper-pagination1',
      clickable: true
    },
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev'
    },
    on: {
      slideChange: function() {
        $(".swiper-slide.swiper-slide-active").removeClass("mos");

      },
      init: function() {
        $(".swiper-slide.swiper-slide-active").addClass("mos");

      },
      transitionStart: function() {
        $(".swiper-slide.swiper-slide-active").addClass("mos");

      },
    }
  });

  var swiper2 = new Swiper('.swiper2', {
    speed: 600,
    loop: true,
    autoHeight: true,
    calculateHeight:true,
    autoplay: {
      delay: 4000,
      disableOnInteraction: false
    },
    breakpoints: {
      1024: {
        slidesPerView: 3,
        spaceBetween: 30
      },
      768: {
        slidesPerView: 2,
        spaceBetween: 30
      },
      320: {
        slidesPerView: 2,
        spaceBetween: 10
      }
    },
    // init: false,
    pagination: {
      el: '.swiper-pagination2',
      clickable: true
    },
    navigation: {
      nextEl: '.swiper-button-next2',
      prevEl: '.swiper-button-prev2'
    }
  });

  var swiper3 = new Swiper('.swiper3', {
    slidesPerView: 4,
    spaceBetween: 30,
    autoplay: {
      delay: 3000,
      disableOnInteraction: false
    },
    // init: false,
    pagination: {
      el: '.swiper-pagination3',
      clickable: true
    },
    breakpoints: {
      1024: {
        slidesPerView: 3,
        spaceBetween: 10
      },
      768: {
        slidesPerView: 3,
        spaceBetween: 30
      },
      640: {
        slidesPerView: 1,
        spaceBetween: 20
      },
      320: {
        slidesPerView: 1,
        spaceBetween: 10
      }
    }
  });

  $(window).scroll(function() {
  $('.qpc-trigger').each(function() {
    if ($(window).scrollTop()+$(window).height() >= $(this).position().top && $(window).scrollTop() < $(this).position().top + $(this).height()) {
      if (!$(this).hasClass('qpc-inview')){
      $(this).addClass('qpc-inview');
      }
    }
    else if ($(this).hasClass('qpc-inview')) {
      $(this).removeClass('qpc-inview');
    }
  });
});

$( document ).ready(function() {
  //backToTheTop
  var offset = 300,
    offset_opacity = 1200,
    scroll_top_duration = 700;
  var $back_to_top = $('.qpc-top');
  $(window).scroll(function() {
    ($(this).scrollTop() > offset) ? $back_to_top.addClass('qpc-is-visible') : $back_to_top.removeClass('qpc-is-visible');
    if ($(this).scrollTop() > offset_opacity) {
      $back_to_top.addClass('qpc-fade-out');
    }
  });

  //smooth scroll to top
  $back_to_top.on('click', function(event) {
    event.preventDefault();
    $('body,html').animate({
      scrollTop: 0
    }, scroll_top_duration
    );
  });
  });

  // Disabilito Barba su questi elementi
  jQuery(document).ready(function () {
    $(".gallery-icon a, .wpml-ls-link, .ab-item, #wp-toolbar a, #wpadminbar a, .toggle, .popout, .extra-menu a, #wp-toolbar a").addClass("no-barba");
    $('.wp-block-columns, .wp-block-group').addClass('qpc-container');
    var blank = 'noopener';
    $('a').filter('a[rel^="'+blank+'"]').addClass('no-barba');
  });


/*
  $(' .wp-block-image, .blocco-text-img .wp-block-cover').addClass('qpc-trigger text-focus-in');
  $(' .wp-block-group .wp-block-group__inner-container, article .wp-block-cover, .wp-block-column p').addClass('qpc-trigger fade-in-bottom');
  */


  jQuery('.gallery-item').each(function() {
    jQuery(this).find(".gallery-icon a").attr('data-fancybox', 'group-Gallery' + $(this).parent().attr('id'));
    var caption = $(this).find('.wp-caption-text').text();
    //alert(caption);
    jQuery(this).find('.immagine-gallery').attr('title', caption);
  });



  $(".toggle").on('click', function(event) {
    $(".popout").toggle({ direction: "left" }, 300, function() {
    });
    $(".menu-main-menu-container").addClass("popout-active");

    //  event.stopImmediatePropagation(); // lo utilizzo per barba altrimenti il toggle viene richiamato 2 volte
  });

  // pareggio l'altezza del titolo nel caso andasse su 2 righe
  $( ".qpc-col-33 h3" ).wrap( "<div class='h3-wrapper'></div>" );
  var maxHeight = 0;
   $(".h3-wrapper").each(function() {
     if ($(this).outerHeight() > maxHeight) {
       maxHeight = $(this).outerHeight();
     }
   }).height(maxHeight);

   $( ".calendario-template .mc-description.news-home a" ).addClass( "autoHeightTitleDesc" );
   $( ".autoHeightTitleDesc" ).wrap( "<div class='mc-d-wrapper'></div>" );
   var maxHeight = 0;
    $(".mc-d-wrapper").each(function() {
      if ($(this).outerHeight() > maxHeight) {
        maxHeight = $(this).outerHeight();
      }
    }).height(maxHeight);


  // Prendo l'elemento tab__content più alto
  let height = -1;
  $('.tab__content').each(function() {
    height = height > $(this).outerHeight() ? height : $(this).outerHeight();
    $(this).css('position', 'absolute');
  });
  // Setto l'altezza del tab prendendo l'elemento più alto di tab__content
  $('[data-tabs]').css('height', height + 100 + 'px');

  // SCROLLING ANCORE
  /* va in conflitto con le frecce del bootstrap-carousel e i tab jquery, mettere un selettore.*/
  $('a[href*=\\#]:not([href=\\#])').click(function() {
    if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '')
      | location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
      if (target.length) {
        $('html,body').animate({
          scrollTop: target.offset().top
        }, 1000);
        return false;
      }
    }
  });

/*
  var heightSwiper = $('.cont-swiper-news').innerHeight();
  $( ".cont-swiper-news" ).css( "min-height", heightSwiper );
  */

$( function() {
  var $grid = $('.isotope').isotope({
    // options
    itemSelector: '.qpc-col-33',
    layoutMode: 'fitRows'
  });

  // bind filter button click
$('.filters-button-group').on( 'click', 'button', function() {  
  var filterValue = $( this ).attr('data-filter');

  $grid.isotope({ filter: filterValue });
});
// change is-checked class on buttons
$('.button-group').each( function( i, buttonGroup ) {
  var $buttonGroup = $( buttonGroup );
  $buttonGroup.on( 'click', 'button', function() {
    $buttonGroup.find('.is-checked').removeClass('is-checked');
    $( this ).addClass('is-checked');
  });
});

  $(window).scroll(function() {
    var scroll = $(window).scrollTop();
    if (scroll >= 500) {
      $(".wrap-header").addClass("sticky");

    } else {
      $(".wrap-header").removeClass("sticky");
    }
  });
});


  // su mobile risolvo il click della tendina nel caso ci fosse assegnato un url
  $(".menu-qpc-class li.menu-item-has-children > a").on('click', function(event) {
		event.preventDefault();
	});

});


// Evito il ricaricamento di Barba nella pagina corrente
var links = document.querySelectorAll('a[href]');
var cbk = function(e) {
  if (e.currentTarget.href === window.location.href) {
    e.preventDefault();
    e.stopPropagation();
  }
};
for (var i = 0; i < links.length; i++) {
  links[i].addEventListener('click', cbk);
}
