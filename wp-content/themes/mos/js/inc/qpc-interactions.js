var $ = require("jquery");
window.jQuery = $;

const qpcInteractions = (qpcInteractions) => {

  $(function() {
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

      // SCROLLING ANCORE
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

        var scroll = $(window).scrollTop();
        if (scroll >= 500) {
          $(".wrap-header").addClass("sticky");

        } else {
          $(".wrap-header").removeClass("sticky");
        }
      });

    });

}
export { qpcInteractions };
