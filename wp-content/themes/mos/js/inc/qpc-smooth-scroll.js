var $ = require("jquery");
window.jQuery = $;
const qpcScroll = (qpcScroll) => {

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
export { qpcScroll };
