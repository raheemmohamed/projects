$(function() {
	//main banner slider
	$('#banner-slider').owlCarousel({
		items: 1,
		autoplay: true,
		loop: true,
		nav: false
	});

	//partner logo slider
	$('#partner-slider').owlCarousel({
		items: 4,
		autoplay: true,
		loop: true,
		nav: false
	});	

	navigation();

	tabs();

	mobileToggle();

	galleryPopUp();

	enquiryPopUp();

	loadmoremenu1();

	loadmoremenu2();

	loadmoremenu3();

	loadmoremenu4();

	//ulIntoSelect();
});

	function tabs() {
		$('ul.tabs li').first().addClass('active');
		$('.tab-content .tab-pane').first().addClass('active');

		$('ul.tabs li').click(function() {
			var $this = $(this),
				$siblings = $this.parent().children(),
				position = $siblings.index($this);

			$('.tab-content .tab-pane').removeClass('active').eq(position).addClass('active');
			$siblings.removeClass('active');
			$this.addClass('active');
		});

		$('ul.tabs li a').click(function(e) {
			e.preventDefault();
		});			
	}

	function navigation() {
		$('ul li.dropdown .dropdown-link').click(function(e) {
			e.preventDefault();
			var siblings = $(this).parent().siblings();
			siblings.find('.dropdown-menu').slideUp();
			$(this).next().slideToggle();
		});

		// $('ul li.dropdown .dropdown-link').mouseleave(function() {
		// 	var siblings = $(this).parent().siblings();
		// 	siblings.find('.dropdown-menu').stop().slideUp();			
		// 	$(this).next().slideUp();
		// });

		// $('.dropdown-menu').hover(function() {
		// 	$(this).next().stop().slideUp();
		// });

		$('.dropdown-menu').mouseleave(function() {
			$(this).slideUp();
		});			
	}

	function mobileToggle() {
		$('.mobile-toggle-button').click(function() {
			$(this).toggleClass('active');
			$('ul.nav-links').slideToggle();
		});
	}

	function galleryPopUp() {
		$('.gallery-container .image').click(function() {
			var bg = $(this).css('background-image');
			bg = bg.replace('url(','').replace(')','').replace(/\"/gi, "");
			
			$('.gallery-pop-up .gallery-image').css('background-image', 'url('+ bg +')');

			$('.gallery-pop-up').css('display', 'flex');
		});

		$('.image-dismiss').click(function() {
			$('.gallery-pop-up').css('display', 'none');
		});
	}

	function enquiryPopUp() {
		$('.inquire').click(function(e) {
			e.preventDefault();

			var productTitle = $(this).parent().find('.product-title').text();

			$('.enquiry-form .enquiry .enquiry_subject').val(productTitle);

			$('.enquiry-form').css('display', 'flex');
		});

		$('.enquiry-dismiss').click(function() {
			$('.enquiry-form').css('display', 'none');
		});
	}

	function ulIntoSelect() {
		$('ul.tabs').each(function() {
		    var select = $(document.createElement('select')).insertBefore($(this).hide());
		    $('>li a', this).each(function() {
		        var a = $(this).click(function() {
		            if ($(this).attr('target')==='_blank') {
		                window.open(this.href);
		            }
		            else {
		                window.location.href = this.href;
		            }
		        }),
		        option = $(document.createElement('option')).appendTo(select).val(this.href).html($(this).html()).click(function() {
		            a.click();
		        });
		    });
		});		
	}

	function loadmoremenu1() {
		size_li = $("#product-menu01 .product-item #products-1 li").size();
		x=4;
		$('#product-menu01 .product-item #products-1 li:lt('+x+')').show();
		if(x==size_li || size_li==0){
				$('#product-menu01 #product-menu01-loadMore').hide();
			}
		$('#product-menu01 #product-menu01-loadMore').click(function () {
			size_li = $("#product-menu01 .product-item #products-1 li").size();
			x= (x+4 <= size_li) ? x+4 : size_li;
			$('#product-menu01 .product-item #products-1 li:lt('+x+')').show();

			if(x==size_li){
				$('#product-menu01 #product-menu01-loadMore').hide();
			}
		});
	}

	function loadmoremenu2() {
		size_li = $("#product-menu02 .product-item #products-2 li").size();
		x=4;
		$('#product-menu02 .product-item #products-2 li:lt('+x+')').show();
		if(x==size_li || size_li==0){
				$('#product-menu02 #product-menu02-loadMore').hide();
			}
		$('#product-menu02 #product-menu02-loadMore').click(function () {
			size_li = $("#product-menu02 .product-item #products-2 li").size();
			x= (x+4 <= size_li) ? x+4 : size_li;
			$('#product-menu02 .product-item #products-2 li:lt('+x+')').show();

			if(x==size_li){
				$('#product-menu02 #product-menu02-loadMore').hide();
			}
		});		
    
	}

	function loadmoremenu3() {
		size_li = $("#product-menu03 .product-item #products-3 li").size();
		x=4;
		$('#product-menu03 .product-item #products-3 li:lt('+x+')').show();
		if(x==size_li || size_li==0){
				$('#product-menu03 #product-menu03-loadMore').hide();
			}
		$('#product-menu03 #product-menu03-loadMore').click(function () {
			size_li = $("#product-menu03 .product-item #products-3 li").size();
			x= (x+4 <= size_li) ? x+4 : size_li;
			$('#product-menu03 .product-item #products-3 li:lt('+x+')').show();

			if(x==size_li){
				$('#product-menu03 #product-menu03-loadMore').hide();
			}
		});		
    
	}

	function loadmoremenu4() {
		size_li = $("#product-menu04 .product-item #products-4 li").size();
		x=4;
		$('#product-menu04 .product-item #products-4 li:lt('+x+')').show();
		if(x==size_li || size_li==0){
				$('#product-menu04 #product-menu04-loadMore').hide();
			}
		$('#product-menu04 #product-menu04-loadMore').click(function () {
			size_li = $("#product-menu04 .product-item #products-4 li").size();
			x= (x+4 <= size_li) ? x+4 : size_li;
			$('#product-menu04 .product-item #products-4 li:lt('+x+')').show();

			if(x==size_li){
				$('#product-menu04 #product-menu04-loadMore').hide();
			}
		});		
    
	}