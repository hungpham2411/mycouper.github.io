/*

 Main.js

 01. Menu toggle
 02. Top bar height effect
 03. Home content slider
 04. Home background slider
 05. Home background and content slider
 06. Quote slider
 07. Image slider
 08. Services slider
 09. Employee slider
 10. Work slider
 11. Footer promo
 12. Contact form
 13. Scrollto
 14. Magnific popup
 15. Equal height
 16. fitVids

 */


(function () {
    "use strict";

    /* ==================== 01. Menu toggle ==================== */
    jQuery(function ($) {
        $('#toggle').click(function (e) {
            e.stopPropagation();
        });
        $('html').click(function (e) {
            if (!$('.toggle').is($(e.target))) {
                $('#toggle').prop("checked", false);
            }
        });
    });

    /* ==================== 02. Top bar height effect ==================== */
    jQuery(window).bind("scroll", function () {
        if (jQuery(this).scrollTop() > 100) {
            jQuery(".top-bar").removeClass("tb-large").addClass("tb-small");
        } else {
            jQuery(".top-bar").removeClass("tb-small").addClass("tb-large");
        }
    });

    /* ==================== 03. Home content slider ==================== */
    // jQuery('.home-c-slider').bxSlider({
    // 	mode: 'horizontal',
    // 	pager: false,
    // 	controls: true,
    // 	nextText: '<i class="bs-right fa fa-angle-right"></i>',
    // 	prevText: '<i class="bs-left fa fa-angle-left"></i>'
    // });

    // /* ==================== 04. Home background slider ==================== */
    // jQuery('.home-bg-slider').bxSlider({
    // 	mode: 'fade',
    // 	auto: true,
    // 	speed: 1000,
    // 	pager: false,
    // 	controls: false,
    // 	nextText: '<i class="bs-right fa fa-angle-right"></i>',
    // 	prevText: '<i class="bs-left fa fa-angle-left"></i>'
    // });

    /* ==================== 05. Home background and content slider ==================== */
    // jQuery('.home-bgc-slider').bxSlider({
    // 	mode: 'fade',
    // 	pager: true,
    // 	controls: true,
    // 	nextText: '<i class="bs-right fa fa-angle-right"></i>',
    // 	prevText: '<i class="bs-left fa fa-angle-left"></i>'
    // });

    // /* ==================== 06. Quote slider ==================== */
    // jQuery('.quote-slider').bxSlider({
    // 	mode: 'horizontal',
    // 	controls: false,
    // 	adaptiveHeight: true
    // });

    /* ==================== 07. Image slider ==================== */
    jQuery('.img-slider').bxSlider({
        mode: 'fade',
        pager: false,
        controls: true,
        nextText: '<i class="bs-right fa fa-angle-right"></i>',
        prevText: '<i class="bs-left fa fa-angle-left"></i>'
    });

    // /* ==================== 08. Services slider ==================== */
    // jQuery(function($) {

    // 	var owl = $(".services-slider");

    // 	owl.owlCarousel({
    // 		pagination: false,
    // 		navigation: false,
    // 		items: 4,
    // 		itemsDesktop: [1000,3],
    // 		itemsTablet: [600,2],
    // 		itemsMobile: [321,1]
    // 	});

    // 	// Custom navigation
    // 	$(".serv-next").click(function(){
    // 		owl.trigger('owl.next');
    // 	})
    // 	$(".serv-prev").click(function(){
    // 		owl.trigger('owl.prev');
    // 	})

    // });

    // /* ==================== 09. Employee slider ==================== */
    // jQuery(function($) {

    // 	var owl = $(".employee-slider");

    // 	owl.owlCarousel({
    // 		pagination: false,
    // 		navigation: false,
    // 		items: 4,
    // 		itemsDesktop: [1000,3],
    // 		itemsTablet: [600,2],
    // 		itemsMobile: [321,1]
    // 	});

    // 	// Custom navigation
    // 	$(".emp-next").click(function(){
    // 		owl.trigger('owl.next');
    // 	})
    // 	$(".emp-prev").click(function(){
    // 		owl.trigger('owl.prev');
    // 	})

    // });

    // /* ==================== 10. Work slider ==================== */
    // jQuery(function($) {

    // 	var owl = $(".work-slider");

    // 	owl.owlCarousel({
    // 		pagination: false,
    // 		navigation: false,
    // 		items: 3,
    // 		itemsDesktop: [1000,3],
    // 		itemsTablet: [600,2],
    // 		itemsMobile: [321,1]
    // 	});

    // 	// Custom navigation
    // 	$(".work-next").click(function(){
    // 		owl.trigger('owl.next');
    // 	})
    // 	$(".work-prev").click(function(){
    // 		owl.trigger('owl.prev');
    // 	})

    // });

    /* ==================== 11. Footer promo ==================== */
    jQuery('.promo-control').click(function () {
        jQuery('.footer-promo').slideToggle(500);
        if (jQuery('.footer-promo').is(':visible')) {
            jQuery('html, body').animate({
                scrollTop: jQuery('.footer-promo').offset().top
            }, 500);
        }
    });

    /* ==================== 12. Contact form ==================== */
    jQuery(function ($) {
        function isValidEmailAddress(emailAddress) {
            var pattern = new RegExp(/^(("[\w-+\s]+")|([\w-+]+(?:\.[\w-+]+)*)|("[\w-+\s]+")([\w-+]+(?:\.[\w-+]+)*))(@((?:[\w-+]+\.)*\w[\w-+]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][\d]\.|1[\d]{2}\.|[\d]{1,2}\.))((25[0-5]|2[0-4][\d]|1[\d]{2}|[\d]{1,2})\.){2}(25[0-5]|2[0-4][\d]|1[\d]{2}|[\d]{1,2})\]?$)/i);
            return pattern.test(emailAddress);
        }
        ;

        $('#submit').on('click', function (event) {
            event.preventDefault();

            //name
            var name = $("#name").val();
            if (name == "") {

                $('#message').text("Name required.").slideDown(300);
                $("#name").focus();
                return false;
            }

			//address
            var address = $("#address").val();
            if (address == "") {

                $('#message').text("Address required.").slideDown(300);
                $("#address").focus();
                return false;
            }
			
            //email (check if entered anything)
            var email = $("#email").val();
            //email (check if entered anything)
            if (email == "") {
                $('#message').text("Email required.").slideDown(300);
                $("#email").focus();
                return false;
            }

            //email (check if email entered is valid)

            if (email !== "") {  // If something was entered
                if (!isValidEmailAddress(email)) {
                    $('#message').text("Email is not valid.").slideDown(300);
                    $("#email").focus();   //focus on email field
                    return false;
                }
            }

			//phone
			var phone = $("#phone").val();
			var phoneValid = /^[0-9 +]+$/;
			var testPhone = phoneValid.test(phone);
			if(testPhone == false){
				
                $('#message').text("Phone is not valid.").slideDown(300);
                $("#phone").focus();
                return false;
			}
			
			//title
            var title = $("#title").val();
            if (title == "") {

                $('#message').text("Title required.").slideDown(300);
                $("#title").focus();
                return false;
            }
			
            // comments
            var comments = $("#comments").val();

            if (comments == "") {
                $('#message').text("Comments required.").slideDown(300);
                $("#comments").focus();
                return false;
            }


            var action = $('#contactform').attr('action');

            $('#message').slideUp(300, function () {
                $('#message').hide();
                $('#submit')
                        .after('<img src="public/images/loader.gif" class="loader">')
                        .attr('disabled', 'disabled');
            });

            jQuery.ajax({
                type: "POST",
                url: action,
                dataType: 'json',
                cache: false,
                data: $('#contactform').serialize(),
                success: function (data) {

                    $('#message').text(data.msg).slideDown(300);
                    $('#contactform img.loader').fadeOut(300, function () {
                        $(this).remove();
                    });
                    $('#submit').removeAttr('disabled');

                    if (data.info !== 'error') {
                        $('#contactform').slideUp(300);
                    } else {
                        $('#contactform').slideUp(300);
                    }
                }
            });
        });

    });

    /* ==================== 13. Scrollto ==================== */
    jQuery(function ($) {
        $('.scrollto').bind('click.scrollto', function (e) {
            e.preventDefault();

            var target = this.hash,
                    $target = $(target);

            $('html, body').stop().animate({
                'scrollTop': $target.offset().top - 0
            }, 900, 'swing', function () {
                window.location.hash = target;
            });
        });
    });

    /* ==================== 14. Magnific popup ==================== */
    // Image popup
    jQuery('.popup').magnificPopup({
        type: 'image',
        fixedContentPos: false,
        fixedBgPos: false,
        removalDelay: 300,
        mainClass: 'mfp-fade'
    });

    // YouTube, Vimeo and Google Maps popup
    jQuery('.popup-youtube, .popup-vimeo, .popup-gmaps').magnificPopup({
        disableOn: 700,
        type: 'iframe',
        fixedContentPos: false,
        fixedBgPos: false,
        removalDelay: 300,
        mainClass: 'mfp-fade',
        preloader: false
    });

    // Soundcloud
    jQuery('.popup-soundcloud').magnificPopup({
        type: 'iframe',
        iframe: {
            patterns: {
                soundcloud: {
                    index: 'soundcloud.com',
                    id: function (url) {
                        var m = url.match(/^.+soundcloud.com\/tracks\/([^_&]+)?/);
                        if (m !== null) {
                            if (m[1] !== undefined) {

                                return m[1];
                            }
                        }
                        return null;
                    },
                    src: 'https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/%id%&amp;auto_play=false&amp;hide_related=false&amp;visual=true'

                }
            }
        },
        fixedContentPos: false,
        fixedBgPos: false,
        removalDelay: 300,
        mainClass: 'mfp-fade',
        preloader: false


    });

    // Gallery popup
    jQuery('.popup-gallery').magnificPopup({
        type: 'image',
        gallery: {
            enabled: true
        },
        fixedContentPos: false,
        fixedBgPos: false,
        removalDelay: 300,
        mainClass: 'mfp-fade'
    });

    jQuery('.gallery-link').on('click', function () {
        jQuery(this).next().magnificPopup('open');
    });

    jQuery('.gallery').each(function () {
        jQuery(this).magnificPopup({
            delegate: 'a',
            type: 'image',
            gallery: {
                enabled: true,
                navigateByImgClick: true
            },
            fixedContentPos: false,
            fixedBgPos: false,
            removalDelay: 300,
            mainClass: 'mfp-fade'
        });
    });



    /* ==================== 15. Equal height ==================== */
    /* Use the .equal class on a row if you want the columns to be equal in height */
    jQuery('.equal').children('.col').equalizeHeight();
    jQuery(window).resize(function () {
        jQuery('.equal').children('.col').equalizeHeight();
        setTimeout(function () {
            jQuery('.equal').children('.col').equalizeHeight();
        }, 100);
        setTimeout(function () {
            jQuery('.equal').children('.col').equalizeHeight();
        }, 400);
        setTimeout(function () {
            jQuery('.equal').children('.col').equalizeHeight();
        }, 1400);
        setTimeout(function () {
            jQuery('.equal').children('.col').equalizeHeight();
        }, 2400);
    });
    setTimeout(function () {
        jQuery(window).trigger('resize scroll');
    }, 1000);
    setTimeout(function () {
        jQuery(window).trigger('resize scroll');
    }, 3000);
    jQuery(window).load(function () {
        jQuery('.equal').children('.col').equalizeHeight();
        jQuery(window).trigger('resize scroll');
        setTimeout(function () {
            jQuery('.equal').children('.col').equalizeHeight();
        }, 1000);
        setTimeout(function () {
            jQuery('.equal').children('.col').equalizeHeight();
        }, 1300);
    });

    /* ==================== 16. fitVids ==================== */
    jQuery(".responsive-video").fitVids();

    jQuery(".responsive-video").fitVids({customSelector: "iframe[src^='https://w.soundcloud.com']"});


})(jQuery);