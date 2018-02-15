$('.owl-carousel').owlCarousel({
    loop:true,
    nav:true,
    navText:['<i class="fas fa-chevron-left fa-2x"></i>','<i class="fas fa-chevron-right fa-2x"></i>'],
    dots:false,
    autoplay:true,
    autoplayTimeOut:5000,
    items:1
    // animateOut: 'slideOutDown',
    // animateIn: 'slideInRight',

})
// $(window).scroll(function () {
//     if ($(document).scrollTop()>110)
//     {
//         $('.wsmain').addClass('wsmainscroll');
//
//     }
//     else {
//         $('.wsmain').removeClass(('wsmainscroll'))
//     }
// });
// $(function () {
//     $('.wsmain').stickyNavbar({
//         sectionTop:0,
//         activeClass: "active",          // Class to be added to highlight nav elements
//         sectionSelector: "scrollto",    // Class of the section that is interconnected with nav links
//         animDuration:0,              // Duration of jQuery animation
//         startAt: 160,                     // Stick the menu at XXXpx from the top of the this() (nav container)
//         easing: "linear",               // Easing type if jqueryEffects = true, use jQuery Easing plugin to extend easing types - gsgd.co.uk/sandbox/jquery/easing
//         animateCSS: true,               // AnimateCSS effect on/off
//         animateCSSRepeat: false,        // Repeat animation everytime user scrolls
//         cssAnimation: "fadeInDown",     // AnimateCSS class that will be added to selector
//         jqueryEffects: false,           // jQuery animation on/off
//         jqueryAnim: "slideDown",        // jQuery animation type: fadeIn, show or slideDown
//         selector: "a",                  // Selector to which activeClass will be added, either "a" or "li"
//         mobile: false,                  // If false nav will not stick under 480px width of window
//         mobileWidth: 480,               // The viewport width (without scrollbar) under which stickyNavbar will not be applied (due usability on mobile devices)
//         zindex: 9999,                   // The zindex value to apply to the element: default 9999, other option is "auto"
//         stickyModeClass: "sticky",      // Class that will be applied to 'this' in sticky mode
//         unstickyModeClass: "unsticky"
//     });
// });





$(document).ready(function(){
    $(".wsmenu").sticky({
        className:'wsmans',
        zIndex:9999
    });
});



$(document).ready(function () {
      var headerhight=$('.header').outerHeight();


       $('.coxSatilanlar,.enirimdeOlanlar,.elaqe').click(function (e) {
            var linkhref=$(this).attr('href');
            $('html,body').animate({
                scrollTop:$(linkhref).offset().top -headerhight
                   },1000)  ;
                   e.preventDefault();
                         });


});
$(document).ready(function() {
    $(".gry, .blue, .green, .red, .orange, .yellow, .purple, .pink, .whitebg, .tranbg").on("click", function() {
        $(".wsmain")
            .removeClass()
            .addClass('wsmain pm_' + $(this).attr('class') );
    });

    $(".blue-grdt, .gry-grdt, .green-grdt, .red-grdt, .orange-grdt, .yellow-grdt, .purple-grdt, .pink-grdt").on("click", function() {
        $(".wsmain")
            .removeClass()
            .addClass('wsmain pm_' + $(this).attr('class') );
    });
});

var Jquery = $;

$('.mehsul-azalt, .mehsul-artir').click(function () {

   var id = $(this).attr('data-id');
   var eded = $(this).attr('data-eded');
    Jquery.ajax({
        type:'PATCH',
        url:'/sebet/guncelle/' +id,
        data:{eded:eded},
        success:function (data) {
             window.location.href='/sebet';
        document.getElementById(id).innerHTML=data.eded;
            $(_this).attr('data-eded', parseInt(eded) + 1 )
        }
    });
});
