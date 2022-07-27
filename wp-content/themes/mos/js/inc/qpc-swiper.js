import Swiper from "swiper/bundle";
var $ = require("jquery");
window.jQuery = $;

const qpcSwiper = (qpcswipe) => {

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

  var swiperGrid = new Swiper('.swiperGrid', {
    speed: 600,
    //loop: true,
    //autoHeight: true,
    calculateHeight:true,
    slidesPerColumn: 2,
    slidesPerGroup :3,
    slidesPerColumnFill: 'row',
    autoplay: {
      delay: 4500,
      disableOnInteraction: false
    },
    breakpoints: {
      1024: {
        slidesPerView: 3,
        spaceBetween: 0
      },
      768: {
        slidesPerView: 2,
        spaceBetween: 0
      },
      320: {
        slidesPerView: 2,
        spaceBetween: 0
      }
    },
    // init: false,
    pagination: {
      el: '.swiper-swiperGrid',
      clickable: true,
      dynamicBullets: true
    }
  });

  var swiper2 = new Swiper('.swiper2', {
    speed: 600,
    //loop: true,
    //autoHeight: true,
    calculateHeight:true,
    autoplay: {
      delay: 94000,
      disableOnInteraction: false
    },
    breakpoints: {
      1024: {
        slidesPerView: 3,
        spaceBetween: 0
      },
      768: {
        slidesPerView: 2,
        spaceBetween: 0
      },
      320: {
        slidesPerView: 2,
        spaceBetween: 0
      }
    },
    // init: false,
    pagination: {
      el: '.swiper-pagination2',
      clickable: true,
      dynamicBullets: true

    },
    navigation: {
      nextEl: '.swiper-button-next2',
      prevEl: '.swiper-button-prev2'
    }
  });


}
export { qpcSwiper };
