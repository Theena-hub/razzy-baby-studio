(function($) {

	"use strict";



    // Header Fixed
    $(window).scroll(function(){
      var sticky = $('.sticky'),
          scroll = $(window).scrollTop();

      if (scroll >= 50) sticky.addClass('fixed');
      else sticky.removeClass('fixed');
    });



    // Navbar Animation
     jQuery('#main-nav').stellarNav({
        theme: 'light',
        breakpoint: 1199,
        openingSpeed: 200,
        closingDelay: 50,
        position: 'right',
        sticky: false
    });



    //Bootstrap Carousel
    $('.carousel').carousel({
        pause: "false"
    });



    // Pogo Slider
    if($('#pogo-slider').length > 0){
            $('#pogo-slider').pogoSlider({
            autoplay: true,
            generateButtons: false,
            autoplayTimeout: 5000,
            displayProgess: true,
            targetWidth: 1920,
            // targetHeight: 500,
            responsive: true,
            pauseOnHover: false,
        }).data('plugin_pogoSlider');
    }


    // testimonial-carousel
    if($('.testimonial-carousel').length){
        $('.testimonial-carousel').owlCarousel({
            loop: true,
            margin: 30,
            dots: true,
            nav: false,
            autoplayHoverPause: false,
            autoplay: true,
            autoplayTimeout: 4000,
            smartSpeed: 800,
            center: false,
            // navText: [
            //   '<i class="fa fa-long-arrow-down"></i>',
            //   '<i class="fa fa-long-arrow-up"></i>'
            // ],
            responsive: {
                0: {
                    items: 1,
                    center: false
                },
                480:{
                    items:1,
                    center: false
                },
                600: {
                    items: 1,
                    center: false
                },
                768: {
                    items: 2
                },
                992: {
                    items: 2
                },
                1200: {
                    items: 2
                }
            }
        })
    }


    // project-carousel
    if($('.project-slider').length){
        $('.project-slider').owlCarousel({
            loop: true,
            margin: 0,
            dots: false,
            nav: true,
            autoplayHoverPause: false,
            autoplay: true,
            autoplayTimeout: 4000,
            smartSpeed: 800,
            center: false,
            navText: [
              '<i class="fa fa-arrow-circle-o-left"></i>',
              '<i class="fa fa-arrow-circle-o-right"></i>'
            ],
            responsive: {
                0: {
                    items: 1,
                    center: false
                },
                480:{
                    items:1,
                    center: false
                },
                600: {
                    items: 1,
                    center: false
                },
                768: {
                    items: 1
                },
                992: {
                    items: 1
                },
                1200: {
                    items: 1
                }
            }
        })
    }


    // Isotope Script
    $(window).on('load', function() {
        function sortingGallery() {
            if ($(".my-gallery .gallery-nav").length) {
                var $container = $('.gallery-container');
                $container.isotope({
                    filter:'*',
                    animationOptions: {
                        duration: 750,
                        easing: 'linear',
                        queue: false,
                    }
                });

                $(".gallery-nav li a").on("click", function() {
                    $('.gallery-nav li .active').removeClass('active');
                    $(this).addClass('active');
                    var selector = $(this).attr('data-filter');
                    $container.isotope({
                        filter:selector,
                        animationOptions: {
                            duration: 750,
                            easing: 'linear',
                            queue: false,
                        }
                    });
                    return false;
                });
            }
        }
        sortingGallery();
    }); 
    $('.gallery-container').isotope({
      itemSelector: '.item',
      masonry: {
        gutter: 30
      }
    });

    $(window).on('load', function() {
        function sortingGallery() {
            if ($(".my-gallery .gallery-nav").length) {
                var $container = $('.gallery-container-nospace');
                $container.isotope({
                    filter:'*',
                    animationOptions: {
                        duration: 750,
                        easing: 'linear',
                        queue: false,
                    }
                });

                $(".gallery-nav li a").on("click", function() {
                    $('.gallery-nav li .active').removeClass('active');
                    $(this).addClass('active');
                    var selector = $(this).attr('data-filter');
                    $container.isotope({
                        filter:selector,
                        animationOptions: {
                            duration: 750,
                            easing: 'linear',
                            queue: false,
                        }
                    });
                    return false;
                });
            }
        }
        sortingGallery();
    }); 
    $('.gallery-container-nospace').isotope({
      itemSelector: '.item',
      masonry: {
        gutter: 0
      }
    });






    // Background Image Call Script
    if ($('.background-image').length > 0) {
        $('.background-image').each(function () {
            var src = $(this).attr('data-src');
            $(this).css({
                'background-image': 'url(' + src + ')'
            });
        });
    }



    // Parallax background
    $('.parallax').jarallax({
        speed: 0.5
    });



})(window.jQuery);