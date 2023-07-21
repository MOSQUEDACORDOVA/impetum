// A $( document ).ready() block.
$( document ).ready(function() {

    // $('body, html').fadeIn('slow');
    $( "body, html" ).animate({
    opacity: 1
}, 1500, function() {
    // Animation complete.
  });

    
    //trigger the scroll
    $(window).scroll();//ensure if you're in current position when page is refreshed
});

jQuery(document).ready(function($){
	//if you change this breakpoint in the style.css file (or _layout.scss if you use SASS), don't forget to update this value as well
	var MQL = 1170;

	// //primary navigation slide-in effect
	// if($(window).width() > MQL) {
	// 	var headerHeight = $('.cd-header').height();
	// 	$(window).on('scroll',
	// 	{
	//         previousTop: 0
	//     },
	//     function () {
	// 	    var currentTop = $(window).scrollTop();
	// 	    //check if user is scrolling up
	// 	    if (currentTop < this.previousTop ) {
	// 	    	//if scrolling up...
	// 	    	if (currentTop > 0 && $('.cd-header').hasClass('is-fixed')) {
	// 	    		$('.cd-header').addClass('is-visible');
	// 	    	} else {
	// 	    		$('.cd-header').removeClass('is-visible is-fixed');
	// 	    	}
	// 	    } else {
	// 	    	//if scrolling down...
	// 	    	$('.cd-header').removeClass('is-visible');
	// 	    	if( currentTop > headerHeight && !$('.cd-header').hasClass('is-fixed')) $('.cd-header').addClass('is-fixed');
	// 	    }
	// 	    this.previousTop = currentTop;
	// 	});
	// }

	//open/close primary navigation
	$('.cd-primary-nav-trigger').on('click', function(){
		$('.cd-menu-icon').toggleClass('is-clicked');
		$('.cd-header').toggleClass('menu-is-open');
        //$('#footer_menu').toggleClass('view');

		//in firefox transitions break when parent overflow is changed, so we need to wait for the end of the trasition to give the body an overflow hidden
		if( $('.cd-primary-nav').hasClass('is-visible') ) {
			$('.cd-primary-nav').removeClass('is-visible').one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend',function(){
				$('body').removeClass('overflow-hidden');
                $('.burger-svg__bars').css({ fill: "#000" });
                $('#logo_white').hide();
                $('#logo_grey').show();
			});
		} else {
			$('.cd-primary-nav').addClass('is-visible').one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend',function(){
				$('body').addClass('overflow-hidden');
                $('.burger-svg__bars').css({ fill: "#fff" });
                $('#logo_white').show();
                $('#logo_grey').hide();
			});
		}
	});
});


$(function(){

	var $burger = $('.burger');
	var $bars = $('.burger-svg__bars');
	var $bar = $('.burger-svg__bar');
	var $bar1 = $('.burger-svg__bar-1');
	var $bar2 = $('.burger-svg__bar-2');
	var $bar3 = $('.burger-svg__bar-3');
	var isChangingState = false;
	var isOpen = false;
	var burgerTL = new TimelineMax();

	function burgerOver() {

		if(!isChangingState) {
			burgerTL.clear();
			if(!isOpen) {
				burgerTL.to($bar1, 0.5, { y: -2, ease: Elastic.easeOut })
						.to($bar2, 0.5, { scaleX: 0.6, ease: Elastic.easeOut, transformOrigin: "50% 50%" }, "-=0.5")
						.to($bar3, 0.5, { y: 2, ease: Elastic.easeOut }, "-=0.5");
			}
			else {
				burgerTL.to($bar1, 0.5, { scaleX: 1.2, ease: Elastic.easeOut })
						.to($bar3, 0.5, { scaleX: 1.2, ease: Elastic.easeOut }, "-=0.5");
			}
		}
	}

	function burgerOut() {
		if(!isChangingState) {
			burgerTL.clear();
			if(!isOpen) {
				burgerTL.to($bar1, 0.5, { y: 0, ease: Elastic.easeOut })
						.to($bar2, 0.5, { scaleX: 1, ease: Elastic.easeOut, transformOrigin: "50% 50%" }, "-=0.5")
						.to($bar3, 0.5, { y: 0, ease: Elastic.easeOut }, "-=0.5");
			}
			else {
				burgerTL.to($bar1, 0.5, { scaleX: 1, ease: Elastic.easeOut })
						.to($bar3, 0.5, { scaleX: 1, ease: Elastic.easeOut }, "-=0.5");
			}
		}
	}

	function showCloseBurger() {
		burgerTL.clear();
		burgerTL.to($bar1, 0.3, { y: 6, ease: Power4.easeIn })
				.to($bar2, 0.3, { scaleX: 1, ease: Power4.easeIn }, "-=0.3")
				.to($bar3, 0.3, { y: -6, ease: Power4.easeIn }, "-=0.3")
				.to($bar1, 0.5, { rotation: 45, ease: Elastic.easeOut, transformOrigin: "50% 50%" })
				.set($bar2, { opacity: 0, immediateRender: false }, "-=0.5")
				.to($bar3, 0.5, { rotation: -45, ease: Elastic.easeOut, transformOrigin: "50% 50%", onComplete: function() { isChangingState = false; isOpen = true; } }, "-=0.5");
	}

	function showOpenBurger() {
		burgerTL.clear();
		burgerTL.to($bar1, 0.3, { scaleX: 0, ease: Back.easeIn })
				.to($bar3, 0.3, { scaleX: 0, ease: Back.easeIn }, "-=0.3")
				.set($bar1, { rotation: 0, y: 0 })
				.set($bar2, { scaleX: 0, opacity: 1 })
				.set($bar3, { rotation: 0, y: 0 })
				.to($bar2, 0.5, { scaleX: 1, ease: Elastic.easeOut })
				.to($bar1, 0.5, { scaleX: 1, ease: Elastic.easeOut }, "-=0.4")
				.to($bar3, 0.5, { scaleX: 1, ease: Elastic.easeOut, onComplete: function() { isChangingState = false; isOpen = false; } }, "-=0.5");
	}

	$burger.on('click', function(e) {

		if(!isChangingState) {
			isChangingState = true;

			if(!isOpen) {
				showCloseBurger();
			}
			else {
				showOpenBurger();
			}
		}

	});

	$burger.hover( burgerOver, burgerOut );

});
