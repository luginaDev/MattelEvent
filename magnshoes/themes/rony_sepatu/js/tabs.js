$.fn.tabs = function() {
	var selector = this;
	
	this.each(function() {
		var obj = $(this); 
		
		$(obj.attr('href')).hide();
		
		$(obj).click(function() {
			$(selector).removeClass('selected');
			
			$(selector).each(function(i, element) {
				$($(element).attr('href')).hide();
			});
			
			$(this).addClass('selected');
			
			$($(this).attr('href')).fadeIn();
			
			return false;
		});
	});

	$(this).show();
	
	$(this).first().click();
};

    $(document).ready(function(){
       $("a[data-gal^='prettyPhoto']").prettyPhoto({
  animationSpeed:'slow',theme:'facebook',slideshow:5000, autoplay_slideshow: true
        });
    });
	
$(document).ready(function(){
var isAnimating = false;
$(function () {
$('#menu > ul > li').hover(function() {
if (!isAnimating) {
$(this).find('div').stop(true, true).slideUp(500);
$(this).find('div').stop(true, true).slideDown(500);
isAnimating = true;
}
}, function() {
$(this).find('div').stop(true, true).slideDown(500);
$(this).find('div').stop(true, true).slideUp(500);
isAnimating = false;
});}); 
});





$(document).ready(function(){
$("#cart").hover(
function () {
$('#cart .content').stop(true, true).slideDown(400);
$.ajax({
url: 'index.php?route=checkout/cart/update',
dataType: 'json',
success: function(json) {
if (json['output']) {
$('#cart .content').html(json['output']);
}
}
});
},
function () {
$('#cart .content').stop(true, true).slideUp(400);
}
); 
   }); 



	jQuery(document).ready(function(){
	// hide #back-top first
	jQuery("#back-top").hide();
	// fade in #back-top
	jQuery(function () {
		jQuery(window).scroll(function () {
			if (jQuery(this).scrollTop() > 100) {
				jQuery('#back-top').fadeIn();
			} else {
				jQuery('#back-top').fadeOut();
			}
		});

		// scroll body to 0px on click
		jQuery('#back-top a').click(function () {
			jQuery('body,html').animate({
				scrollTop: 0
			}, 800);
			return false;
		});
	});

});

$(function(){
$('#header .links li').last().addClass('last');
$('.breadcrumb a').last().addClass('last');
$('.cart tr').eq(0).addClass('first');
});
