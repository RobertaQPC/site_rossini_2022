import barba from '@barba/core';
import Swiper from 'swiper/bundle';
import { gsap } from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";
import Isotope from "isotope-layout";
import { qpcSwiper } from './inc/qpc-swiper.js';
import { qpcTransitions } from './inc/qpc-transitions.js';
import { qpcInteractions } from './inc/qpc-interactions.js';
import { qpcScroll } from './inc/qpc-smooth-scroll.js';
import { qpcHorizontalScrollText } from './inc/qpc-horizontal-scroll-text.js';

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

gsap.registerPlugin(ScrollTrigger);

function hGallery(){
  $( function() {
   $("html, body").animate({ scrollTop: 0 }, 700);
    var qpcGalleryWrapper = document.querySelector('.qpc-horizontal-gallery');
    var qpcHgallery = document.querySelector('.qpc-h-gallery');
    var qpcHgalleryLength =$(qpcHgallery).innerWidth() - $( window ).width();
    var tl = gsap.timeline();
     if (qpcHgallery)  {
      tl.to(qpcHgallery, {
        x: '-' + qpcHgalleryLength,
        scrollTrigger: {
          trigger: qpcGalleryWrapper,
          start: 'center center',
          end: '+=' + qpcHgalleryLength,
          pin: true,
          scrub: 0.1,
        }
      })
     }
  })
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
      qpcTransitions();
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

// Carico gli script di terze parti
barba.hooks.afterEnter(() => {

  if(/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)){
  // vero per il mobile

  }else{

  }
  //qpcScroll();
  qpcHorizontalScrollText();
  hGallery();
  qpcSwiper();
  qpcInteractions();

  // Disabilito Barba su questi elementi
$(function () {
  $(".wrap-accordion a, .swiper-wrapper a, .wp-block-gallery a, .qpc-horizontal-gallery a,  .wpml-ls-link, .ab-item, #wp-toolbar a, #wpadminbar a, .toggle, .popout, .extra-menu a, #wp-toolbar a").addClass("no-barba");
  //$('.wp-block-columns, .wp-block-group').addClass('qpc-container');
  var blank = 'noopener';
  $('a').filter('a[rel^="'+blank+'"]').addClass('no-barba');


// aggiungo gli stili hover ai vai menu
 $('ul.menu-qpc-class li, .info-menu-class li, .popup-menu-info-container .col-ds a ').addClass('cta-button cta-button-underline-reverse');
 //$('.popup-menu-info-container .col-ds a ').addClass('cta-button cta-button-underline');


  jQuery('.gallery-item').each(function() {
    jQuery(this).find(".gallery-icon a").attr('data-fancybox', 'group-Gallery' + $(this).parent().attr('id'));
    var caption = $(this).find('.wp-caption-text').text();
    //alert(caption);
    jQuery(this).find('.immagine-gallery').attr('title', caption);
  });


   $('.info-menu').click(function()  {
       $('.popup-menu-info').toggleClass('popup-menu-info-slide');
       $('body').toggleClass('body-overflow-h');
    });

    $('.icon-close').click(function()  {
      $('.popup-menu-info').removeClass('popup-menu-info-slide');
      $('body').removeClass('body-overflow-h');
    });

    $(document).keyup(function(e) {
      if (e.keyCode == 27) {
      $('.popup-menu-info').removeClass('popup-menu-info-slide');
      $('body').removeClass('body-overflow-h');
    }   // esc
  });


  $(".toggle").on('click', function(event) {
    $('.popout').toggleClass('popout-slide');
    $('.button_container ').toggleClass('active');
    $(".menu-main-menu-container").toggleClass("popout-active");
    event.stopImmediatePropagation(); // lo utilizzo per barba altrimenti il toggle viene richiamato 2 volte
});

  // pareggio l'altezza del titolo nel caso andasse su 2 righe
  var maxHeight = 0;
   $(".wrap-box-slide span:first-child").each(function() {
     if ($(this).outerHeight() > maxHeight) {
       maxHeight = $(this).outerHeight();
     }
   }).height(maxHeight);

   var maxHeight = 0;
    $(".mc-description-title").each(function() {
      if ($(this).outerHeight() > maxHeight) {
        maxHeight = $(this).outerHeight();
      }
    }).height(maxHeight);

   var maxHeight = 0;
    $(".calendario-template .mc-description.news-home a").each(function() {
      if ($(this).outerHeight() > maxHeight) {
        maxHeight = $(this).outerHeight();
      }
    }).height(maxHeight);

    var maxHeight = 0;
     $(".news-home p").each(function() {
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

});


  // su mobile risolvo il click della tendina nel caso ci fosse assegnato un url
  $(".menu-qpc-class li.menu-item-has-children > a").on('click', function(event) {
		event.preventDefault();
	});

}); //afterEnter


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
