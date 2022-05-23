
var $ = jQuery;

 $(window).scroll(function() {

  if($('.qpc-infografica').hasClass("qpc-inview")){

    $('.count').each(function () {
        var target = $(this).attr('data-target');
        $(this).delay(1500).animate({
            Counter: target
        }, {
            duration: 2500,
            easing: 'swing',
            step: function (now) {
                $(this).text(Math.ceil(now));
            }
          });
     });
   }
 });
