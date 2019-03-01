function akmalMenu() {

    $(".main-menu-nav").on("click", ".menu-toggler", function() {
        console.log("yellow");
        $(this).addClass("close");
        $(".main-menu-div").addClass("mobiel-menu"); /*.css({ "left": "0" });*/
        $(".body-overlay").css({ "display": "block", "z-index": "1" });
    });
    $(".main-menu-nav").on("click", ".body-overlay, .close-icon, .menu-toggler.close", function() {
        console.log("dark");
        $(".menu-toggler").removeClass("close");
        $(".main-menu-div").removeClass("mobiel-menu");
        $(".body-overlay").css({ "display": "none", "z-index": "-1" });
    });

    /* adding span with arrow and .has-sub class */
    var menuID = $(".main-menu-nav");
    var downArrows = "<span class='down-arrow'></span>";
    var catchSubs = menuID.find('li ul');
    //$(".main-menu-nav li").has("ul").addClass('has-sub');
    catchSubs.parent().addClass('has-sub');
    catchSubs.parent().append(downArrows);

    /* submenu accordian */


    menuID.find('.down-arrow').on('click', function() {
        if ($(this).siblings('ul').hasClass('open')) {
            /*$(this).siblings('ul').removeClass('open');*/
            $(this).siblings('ul').slideUp(500, function() {
                jQuery(this).removeClass("open");
            });
            $(this).removeClass('submenu-opened');
        } else {
            /*$(".down-arrow").siblings('ul').removeClass('open');*/
            /*$(".down-arrow").removeClass('submenu-opened');*/
            // $(this).siblings('ul').addClass('open');
            $(this).siblings('ul').slideDown(500, function() {
                jQuery(this).addClass("open");
            });;
            $(this).addClass('submenu-opened');
        }
    });
    $(".main-menu-nav ul").unbind('mouseenter mouseleave');

    resizeFix = function() {
        var mediasize = 991;
        if ($(window).width() > mediasize) {
            //menuID.find('ul').show();
            /* Adding class on hover */
            menuID.on("mouseenter", ".has-sub", function() {
                /*$(".has-sub").removeClass("hovered");*/
                $(this).addClass("hovered");
            }).on("mouseleave", ".has-sub", function() {
                $(this).removeClass("hovered");
            })
        }
        if ($(window).width() <= mediasize) {
            //menuID.find('ul').hide().removeClass('open');

            $(".main-menu-nav").on("mouseenter", ".has-sub", function() {
                $(".has-sub").removeClass("hovered");

            }).on("mouseleave", ".has-sub", function() {
                $(this).removeClass("hovered");
            })
        }
    };
    resizeFix();
    return $(window).on('resize', resizeFix);
}


// =============
jQuery(document).ready(function() {
    //sticky header
    var header = jQuery(".main-menu-nav");
    var hheight = header.outerHeight();
    // console.log(hheight);
    var coverUp = jQuery(".top-bar");
    var hcoverUp = coverUp.outerHeight();
    jQuery(window).scroll(function() {
        var scroll = jQuery(window).scrollTop();
        var device = jQuery(window).width();
        // if (scroll > 200) {
        //     header.removeClass('positioning').addClass("fixedUp");

        // } else {
        //     header.removeClass("fixedUp").addClass('positioning');

        // }
        if (scroll > hcoverUp) {

            header.removeClass('clearHeader').addClass("darkHeader");
            coverUp.removeClass('noCoverUp').addClass("coverUp").css({ "margin-bottom": hheight + "px" });
            if (device > 991) {
                coverUp.css({ "margin-bottom": hheight + "px" });
            }
        } else {
            header.removeClass("darkHeader").addClass('clearHeader');
            coverUp.removeClass('coverUp').addClass("noCoverUp").css({ "margin-bottom": 0 });
            if (device > 991) {
                coverUp.css({ "margin-bottom": 0 });
            }
        }
        if (scroll > 950) {
            header.removeClass('oldColor').addClass("diffColor");
        } else {
            header.removeClass("diffColor").addClass('oldColor');
        }

        var resizeFixed = function() {
            var mediasize = 991;
            if ($(window).width() > mediasize) {
                header.removeClass("yes-mobile");
                header.addClass("not-mobile");
                coverUp.removeClass("yes-mobile");
                coverUp.addClass("not-mobile");
            }
            if ($(window).width() <= mediasize) {
                header.removeClass("not-mobile")
                header.addClass("yes-mobile");
                coverUp.removeClass("not-mobile");
                coverUp.addClass("yes-mobile").css({ "margin-bottom": 0 });
            }
        };
        resizeFixed();
        return $(window).on('resize', resizeFixed);

    });

    /*sideMenu();*/
    akmalMenu();

    // jQuery('.text-slides').slick({
    //     dots: true,
    //     infinite: true,
    //     slidesToShow: 1,
    //     // autoplay: true,
    //     // autoplaySpeed: 3000,
    //     arrows: false,
    //     variableWidth: false,
    //     fade: true,
    //     cssEase: 'linear',
    //     customPaging : function(slider, i) {
    //         var thumb = $(slider.$slides[i]).data();
    //         i = i+1;
    //         return '<button type="button">0'+i+'</button>';
    //     }
    // });
    jQuery('.first-view-slider').slick({
        dots: true,
        infinite: true,
        slidesToShow: 1,
        // autoplay: true,
        // autoplaySpeed: 3000,
        arrows: false,
        variableWidth: false,
        fade: true,
        cssEase: 'linear',
        customPaging : function(slider, i) {
            var thumb = $(slider.$slides[i]).data();
            i = i+1;
            return '<button type="button">0'+i+'</button>';
        }
    });
    /**/
    jQuery('.lat-news-slider').slick({
        
        infinite: false,
        slidesToShow: 3,
        slidesToScroll: 1,
        // autoplay: true,
        // autoplaySpeed: 3000,
        arrows: true,
        rows: 0,
        variableWidth: false,
        responsive: [{
                breakpoint: 1199,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 991,
                settings: {
                    arrows: false,
                    dots: true,
                    slidesToShow: 2
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    arrows: false,
                    dots: true
                }
            }
        ]
    })
    .on('setPosition', function (event, slick) {
        slick.$slides.css('height', slick.$slideTrack.height() + 'px');
    });
    /**/
    jQuery('.vid-blog-wrapper').slick({
        dots: true,
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        // autoplay: true,
        // autoplaySpeed: 3000,
        arrows: false,
        variableWidth: false
    });
    /**/
    jQuery('.fifa-slider').slick({
        dots: true,
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        // autoplay: true,
        // autoplaySpeed: 3000,
        arrows: true,
        variableWidth: false,
        appendArrows: $(".fifa-control"),
        appendDots: $(".fifa-control"),
        responsive: [{
                breakpoint: 767,
                settings: {
                    arrows: true,
                    dots: false
                }
            }
        ],
        // customPaging: function(slider, i) {
        //     console.log(slider);
        //     var tittle = $(slider.$slides[i]).data('slidertitle');
        //     if(tittle.length){
        //         return '<a>' + tittle + '</a>';
        //     }
        //   }
        customPaging: function(slider, i) {
            //FYI just have a look at the object to find aviable information
            //press f12 to access the console
            //you could also debug or look in the source
            var tittle = $(slider.$slides[i]).find(".fifa-item").data('slidertitle');
            //console.log(tittle);
            //var slideNumber = i + 1,
            //totalSlides = slider.slideCount;
            return (
              '<a class="slick-nav">' + tittle + '</a>'
            );
        }
    });
    /**/
    jQuery('.icc-slider').slick({
        dots: true,
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        // autoplay: true,
        // autoplaySpeed: 3000,
        arrows: false,
        variableWidth: false,
        appendDots: $(".icc-control"),
        customPaging: function(slider, i) {
            var tittle = $(slider.$slides[i]).find(".icc-item").data('slidertitle');
            return (
              '<a class="slick-nav">' + tittle + '</a>'
            );
        }
    });
    /**/
    jQuery('.result-slider').slick({
        dots: true,
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        // autoplay: true,
        // autoplaySpeed: 3000,
        arrows: false,
        variableWidth: false,
        appendDots: $(".rs-nav"),
        responsive: [{
                breakpoint: 991,
                settings: {
                    slidesToShow: 2
                }
            },
            {
                breakpoint: 767,
                settings: {
                    slidesToShow: 1
                }
            }
        ],
        customPaging: function(slider, i) {
            var tittle = $(slider.$slides[i]).find(".rs-item").data('slidertitle');
            return (
              '<a class="result-row-1">' + tittle + '</a>'
            );
        }
    });
    /**/
    jQuery('.lt-slider').slick({
        dots: true,
        infinite: false,
        slidesToShow: 1,
        slidesToScroll: 1,
        // autoplay: true,
        // autoplaySpeed: 3000,
        arrows: false,
        variableWidth: false,
        appendDots: $("#lt-nav"),
        customPaging: function(slider, i) {
            var tittle = $(slider.$slides[i]).find(".lt-title").text();
            return (
              '<a class="">' + tittle + '</a>'
            );
        }
    });
    /**/
    // jQuery('.summary-card-slider').slick({
    //     dots: true,
    //     infinite: true,
    //     slidesToShow: 1,
    //     slidesToScroll: 1,
    //     arrows: true,
    //     variableWidth: false,
    //     appendDots: $(".slider-naved"),
    //     appendArrows: $(".slider-naved"),
    //     customPaging: function(slider, i) {
    //         var tittle = $(slider.$slides[i]).find(".sc-item").data('slidertitle');
    //         var tittle2 = $(slider.$slides[i]).find(".sc-item").data('slidertitle2');
    //         return (
    //           '<a class="sn-item"><strong>' + tittle + '</strong><span>' + tittle + '</span></a>'
    //         );
    //     }
    // });
    jQuery('.summary-card-slider').slick({
        dots: false,
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        variableWidth: false,
        asNavFor: '.slider-naved'
    });
    jQuery('.slider-naved').slick({
        dots: false,
        infinite: true,
        slidesToShow: 9,
        slidesToScroll: 1,
        arrows: true,
        variableWidth: false,
        asNavFor: '.summary-card-slider',
        centerMode: true,
        focusOnSelect: true
    });

    /**/
    jQuery('.profile-slider').slick({
        dots: false,
        infinite: false,
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: true,
        variableWidth: false,
        appendArrows: $(".ps-nav")
    });



    // ======
    jQuery('.blogVidSlider').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        fade: true,
        asNavFor: '.blogVidSliderNav'
    });
    jQuery('.blogVidSliderNav').slick({
        slidesToShow: 2,
        slidesToScroll: 1,
        asNavFor: '.blogVidSlider',
        dots: false,
        arrows: true,
        centerMode: true,
        focusOnSelect: true
    });


    // ===================
    // $(".huntScrollr").mCustomScrollbar({
    //     axis: "x",
    //     theme: "light-3",
    //     advanced: {
    //         autoExpandHorizontalScroll: true
    //     }
    // });
/* leagues opening detail on table click */
$(".open-tr table").on("click", "tr.open-nv", function(event){
    event.preventDefault();
    if($(this).next("tr.not-visible").length==1){
        $(".yes-visible").removeClass("yes-visible").addClass("not-visible").slideUp();
        $(this).next("tr.not-visible").removeClass("not-visible").addClass("yes-visible").slideDown();
    } else {
        $(".yes-visible").removeClass("yes-visible").addClass("not-visible").slideUp();
    }
    
});

/* match height */
$(".photo-gal a").matchHeight();
$(".epl-team").matchHeight();
/* custom scroll bar */

    $(".thisScroll").mCustomScrollbar({
        axis:"y",
        theme:"light-3"
    });

    $('[data-toggle="tooltip"]').tooltip(); 


/* full page menu */
    /*var isLateralNavAnimating = false;

    //open/close lateral navigation
    $('.cd-nav-trigger').on('click', function(event){
        event.preventDefault();
        //stop if nav animation is running
        if( !isLateralNavAnimating ) {
            if($(this).parents('.csstransitions').length > 0 ) isLateralNavAnimating = true;

            $('body').toggleClass('navigation-is-open');
            $('.cd-navigation-wrapper').one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend', function(){
                //animation is over
                isLateralNavAnimating = false;
            });
        }
    });
*/

    $('.fancybox').fancybox();



});/* document ready */