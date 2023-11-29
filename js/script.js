//For Mobile Menu
jQuery(document).ready(function($) {
	//Close Menu On Click Overlay
	jQuery('.mobilemenu-overlay').click(function(e){
		jQuery("#main-navigation").removeClass("menu-open");
		jQuery(".menu-item").removeClass("open");
		return false;
	});

	
	jQuery(".afrfqbt").text("Request a Quote");

	if(jQuery('.icheckbox_square-aero').hasClass('disabled')){
		jQuery(this).parent().addClass('check-hide');
	}


	//Append Close Button In Menu
	jQuery("#main-navigation .main-nav").append("<div id='mob-menu-closed'>&times;</div>");
	setTimeout(function(){
		jQuery('#mob-menu-closed').click(function(e){
			jQuery("#main-navigation").removeClass("menu-open");
			jQuery(".menu-item").removeClass("open");
			return false;
		})
	}, 100);

	if(jQuery(document).width()<1025){
		jQuery(".sub-menu").prepend('<li class="sub-menu-back-btn "><i class="fa fa-angle-left"></i>Back</li>');
	}
	jQuery(".sub-menu-back-btn").on("click", function() {
		if(jQuery(this).parent().parent(".menu-item").hasClass('open')){
			jQuery(this).parent().parent(".menu-item").removeClass("open");
		}
	});

	jQuery(window).resize(function($) {
	//Close Menu On Click Overlay
		jQuery('.mobilemenu-overlay').click(function(e){
			jQuery("#main-navigation").removeClass("menu-open");
			jQuery(".menu-item").removeClass("open");
			return false;
		})

		//Append Close Button In Menu
		setTimeout(function(){
			jQuery('#mob-menu-closed').click(function(e){
				jQuery("#main-navigation").removeClass("menu-open");
				jQuery(".menu-item").removeClass("open");
				//return false;
			})
		}, 100)

		jQuery(".sub-menu-back-btn").on("click", function() {
			if(jQuery(this).parent().parent(".menu-item").hasClass('open')){
				jQuery(this).parent().parent(".menu-item").removeClass("open");
			}
		});
	});
});

(function ($) {
var obj = {
	onClick: function () {
		$("#main-navigation").toggleClass("menu-open");
	}
};

$("#mobile-nav-button").on("click", obj.onClick);
})(jQuery);
	/*** Custom For Navigation ***/
	function subnavigation(){
	jQuery('.menu-item:has(ul)').prepend('<span class="menu_arrow"></span>');
	jQuery('.main-nav li span.menu_arrow').click(function (e) {
	jQuery(this).parent('li').toggleClass('open')
});
}
jQuery(document).ready(function($) {
	jQuery('.main-nav li.services-menu').toggleClass('open');
	jQuery(document).click(function(){
	jQuery('#main-navigation').removeClass('menu-open');
});
jQuery("#main-navigation").click(function(e){
	e.stopPropagation();
});
// Navigation
subnavigation();
});


jQuery(document).ready(function() {
	jQuery('.hero-banner-slider').slick({
		infinite: true,
		slidesToShow: 1,
		slidesToScroll: 1
	});

	jQuery('.amp-featured-slider').slick({
        infinite: true,
        dots: false,
		arrows:true,
		slidesToShow: 4,
		slidesToScroll: 1,
		prevArrow: '<span class="prev"><i class="fa fa-angle-left fa-4x" aria-hidden="true"></i></span>',
		nextArrow: '<span class="next"><i class="fa fa-angle-right fa-4x" aria-hidden="true"></i></span>',
		responsive: [{
			breakpoint: 1399,
			settings: {
			  slidesToShow: 3,
			  slidesToScroll: 1
			}
		  }, {
			breakpoint: 991,
			settings: {
			  slidesToShow: 2,
			  slidesToScroll: 1,
			  infinite: true,
			}
		  },  {
			breakpoint: 575,
			settings: {
			  slidesToShow: 1,
			  slidesToScroll: 1,
			  infinite: true,
			  autoplay: true,
			  autoplaySpeed: 2000,
			}
		  }]
    });

	jQuery('.product-list-slider').slick({
        infinite: true,
        dots: false,
		arrows:true,
		slidesToShow: 6,
		slidesToScroll: 1,
		prevArrow: '<span class="prev"><i class="fa fa-angle-left fa-4x" aria-hidden="true"></i></span>',
		nextArrow: '<span class="next"><i class="fa fa-angle-right fa-4x" aria-hidden="true"></i></span>',
		responsive: [{
			breakpoint: 1600,	
			settings: {
			  slidesToShow: 5,	
			  slidesToScroll: 1,
			  dots: true,
			}
		  }, {
				breakpoint: 1280,
				settings: {
				  slidesToShow: 4,
				  slidesToScroll: 1,
				  dots: true,
				}
			  }, 
			{
			breakpoint: 1024,
			settings: {
			  slidesToShow: 3,
			  slidesToScroll: 1,
			  dots: true,
			}
		  }, {
			breakpoint: 991,
			settings: {
			  slidesToShow: 2,
			  slidesToScroll: 1,
			  dots: true,
			  infinite: true,
			}
		  },  {
			breakpoint: 575,
			settings: {
			  slidesToShow: 1,
			  slidesToScroll: 1,
			  dots: true,
			  infinite: true,
			  autoplay: true,
			  autoplaySpeed: 2000,
			}
		  }]
    });
});

$=jQuery;
// Code By Webdevtrick ( https://webdevtrick.com )
$(document).ready(function(){
    var submitIcon = $('.searchbox-icon');
    var inputBox = $('.searchbox-input');
    var searchBox = $('.searchbox');
    var isOpen = false;
    submitIcon.click(function(){
        if(isOpen == false){
            searchBox.addClass('searchbox-open');
            inputBox.focus();
            isOpen = true;
        } else {
            searchBox.removeClass('searchbox-open');
            inputBox.focusout();
            isOpen = false;
        }
    });  
     submitIcon.mouseup(function(){
            return false;
        });
    searchBox.mouseup(function(){
            return false;
        });
    $(document).mouseup(function(){
            if(isOpen == true){
                $('.searchbox-icon').css('display','block');
                submitIcon.click();
            }
        });

    jQuery('.lp-search-close').click(function(){
        searchBox.removeClass('searchbox-open');
        inputBox.focusout();
        isOpen = false;
    });
});
function buttonUp(){
    var inputVal = $('.searchbox-input').val();
    inputVal = $.trim(inputVal).length;
    if( inputVal !== 0){
        $('.searchbox-icon').css('display','none');
    } else {
        $('.searchbox-input').val('');
        $('.searchbox-icon').css('display','block');
    }
}



// $(".innerfiltercate input").on("change", function (e) {
// 	jQuery(".innerfiltercate input:checked").not(this).prop("checked", false);
//   });
  $(".attr-filter-block ul li input").on("click", function (e) {
	jQuery('body').addClass('loaderon');
	jQuery('.loader-1').show();
	var cat_id = []; // New array
    	$(".product-cat ul li input:checked").each(function () {
		cat_id.push(this.value);
	});

	var capacity_id = []; // New array
	$(".cap-attr ul li input:checked").each(function () {
		capacity_id.push(this.value);
	});
	

	var cap_memory = []; // New array
	$(".cap-memory ul li input:checked").each(function () {
		cap_memory.push(this.value);
	});

	var cap_voltage = []; // New array
	$(".cap-voltage ul li input:checked").each(function () {
		cap_voltage.push(this.value);
	});
	
	var tax_brand = []; // New array
	$(".tax-brand ul li input:checked").each(function () {
		tax_brand.push(this.value);
	});


	$.ajax({
	  url: amp_ajax_object.ajax_url,
	  type: "POST",
	  cache: false,
	  data: {
		action: "search_by_attributes",
		categoryid: cat_id,
		capacity: capacity_id,
		memory: cap_memory,
		voltage: cap_voltage,
		brand: tax_brand,
	  },
	  cache: false,
	  success: function(data) {
		jQuery('body').removeClass('loaderon');
		jQuery('.loader-1').hide();
		jQuery( 'html, body' ).animate({ scrollTop: jQuery('.amp-product-list').offset().top-20 }, '500' );
		if ($.trim(data)){   
			jQuery(".amp-product-list").removeClass('noproduct container');
			jQuery(".amp-product-list table tbody").html('<tr>'+
			'<th class="amp-thumb">Brand</td>'+
			'<th class="part-number">Part Number</td>'+
			'<th>Voltage</td>'+
			'<th>Capacity</td>'+
			'<th>Speed</th>'+
			'<th>Form Factor</th>'+
			'<th>Price</td>'+
			'<th>Product Selection</th>'+
			'</tr>' + data);
			}
			else {
			jQuery(".amp-product-list").addClass('noproduct container');
			jQuery(".amp-product-list table tbody").html('<p class="woocommerce-info">No products were found matching your selection.</p>');
			}	
	  },
	 
	});
  });