(function($) {
'use strict';
jQuery(document).on('ready', function(){
	
	/*PRELOADER JS*/
	$(window).on('load', function() { 
		$('.preloader').fadeOut();
		$('.status-mes').delay(350).fadeOut('slow'); 
	}); 
	/*END PRELOADER JS*/

	 
	/*Language JS*/
	 $(".lan_area").on('click', function() {
	   $(".lan_area .csub-menu").toggle();

	 });
	 
	 /*Currency area JS*/
	 $(".currency_area").on('click', function() {
	   $(".currency_area .csub-menu").toggle();

	 });
	 
	 /*Start Search JS*/
	 $(".search_btn").on('click', function() {
	   $(".search-box").toggle();
	   $("input[type='text']").focus();
	 });
	 
	/*	Mobile Menu
	------------------------*/
	$('.mobile-menu nav').meanmenu({
		meanScreenWidth: "767",
		meanMenuContainer: ".header_btm_area .col-xs-12.col-sm-12.col-md-9",
	});
	 
	// jQuery Lightbox
	jQuery('.lightbox').venobox({
		numeratio: true,
		infinigall: true
	});	
	

	$('.venobox').venobox(); 
	
	
	$(window).scroll(function() {
		
		  if ($(this).scrollTop() > 100) {
			$('#header').addClass('menu-shrink');
		  } else {
			$('#header').removeClass('menu-shrink');
		  }
		});
		
		$('a').on('click', function(e){
			var anchor = $(this);
			$('html, body').stop().animate({
				scrollTop: $(anchor.attr('href')).offset().top - 50
			}, 1500);
			e.preventDefault();
		});
			
	
	// Declare Carousel jquery object
	var slider_active = $('.slider_active');
	slider_active.owlCarousel({
		loop:true,
		navText:['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
		animateIn: 'fadeIn',
		animateOut: 'fadeOut',
		smartSpeed:450,
		autoplay:true,
		autoplayTimeout:6000,
		mouseDrag:false,
		nav:true,
		dots:true,
		responsive:{
			0:{
				items:1
			},
			600:{
				items:1
			},
			1000:{
				items:1
			}
		}
	});

	// Testimonials slider 		
	$("#testimonial-slider").owlCarousel({
		items:2,
		navText:['<i class="fa fa-long-arrow-left"></i>','<i class="fa fa-long-arrow-right"></i>'],
		smartSpeed:450,
		autoplay:true,
		autoplayTimeout:6000,
		mouseDrag:true,
		nav:false,
		dots:false,
		responsive:{
			0:{
				items:1
			},
			600:{
				items:1
			},
			1000:{
				items:2
			}
		}
	});		
	
	// brand slider 
	$('.brand_slide').owlCarousel({
		loop:true,
		dots:true,
		autoplay:true,
		responsiveClass:true,
		items : 6, //10 items above 1000px browser width
		responsive:{
			0:{
				items:2,
				nav:false
			},
			400:{
				items:2,
				nav:false
			},
			600:{
				items:3,
				nav:false
			},
			1000:{
				items:5,
				nav:false,
				loop:true
			}
		}
	})
	
	
	// testimonial slider 		
	$('.test_slide').owlCarousel({
		autoplay:false,
		responsiveClass:true,
		items : 1, //10 items above 1000px browser width
		responsive:{
			0:{
				items:1,
				nav:false
			},
			600:{
				items:1,
				nav:false
			},
			1000:{
				items:1,
				nav:false,
			}
		}
	});		



	// Counter 
	$('.counter').counterUp({
		delay: 10,
		time: 1000
	});


	// jQuery MixItUp
	$('.product_item').mixItUp();
	
	 // Vide Section
	$("#video").simplePlayer();
	

	
	
});

new WOW().init();
})(jQuery);	
