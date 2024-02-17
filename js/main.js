$(document).ready(function() {

  $('#panel').hpanel({
    duration: 65000,
    padding: 0,
    hover:true,
    focus:false,
    stop: false
  });

  $('.hero-slider').slick({
    infinite: true,
    slidesToShow: 1,
    adaptiveHeight: true,
    autoplay: true,
    autoplaySpeed: 5000,
    arrows: false
  });

  $('.secondary-slider').slick({
    infinite: true,
    slidesToShow: 1,
    adaptiveHeight: true,
    autoplay: false,
    autoplaySpeed: 5000,
    arrows: true,
    dots: true,
    variableHeight: true
  });

  $('.bars').click(function() {
  	$('.menu').slideDown();
  });

  $('.close-menu').click(function() {
  	$('.menu').slideUp();
  	$('.sub-menu-list-one').slideUp();
  	$('.sub-menu-list-two').slideUp();
  });

  $('.sub-menu-one').click(function() {
  	$('.sub-menu-list-one').slideToggle();
    $(this).toggleClass('active');
  });

  $('.sub-menu-two').click(function() {
  	$('.sub-menu-list-two').slideToggle();
    $(this).toggleClass('active');
  });

  

  $('.hp-blurb').first().addClass('active');
  var totalHpBlurb = 0;
  $('.hp-blurb').each(function(){
  totalHpBlurb++;
  $(this).attr('data-index',totalHpBlurb);
});

 $('.red-btn').click(function() {

  $('.red-btn img').addClass('pulseContent');
        setTimeout(function(){ $('.red-btn img').removeClass('pulseContent'); }, 250);

   var index = $('.hp-blurb.active').attr('data-index');
   $('.hp-blurb.active').removeClass('active');

   if(index < totalHpBlurb) {
     index++;
     $('.hp-blurb[data-index="'+index+'"]').addClass('active');
   } else {
     $('.hp-blurb[data-index="1"]').addClass('active');
   }
 });
      

  $(".performer").click(function() {

    var $overlay = $(this).siblings(".overlay");
    var $bio = $(this).parents(".performer-wrapper").find(".bio");
    
    $('.overlay').removeClass('active');
    $('.bio').removeClass('active');

    $overlay.addClass('active');
    $bio.addClass('active');
	});

	$(".performer-wrapper .overlay").click(function() { 

		var $overlay = $(this);
	  var $bio = $(this).parents(".performer-wrapper").find(".bio");

		$overlay.removeClass('active');
	  $bio.removeClass('active');
	});

	$(".bio").click(function() { 

		var $overlay = $('.performer-wrapper .overlay');
	  var $bio = $('.bio');

		if ($(window).width() >= 768) {
		  $overlay.removeClass('active');
	  	$bio.removeClass('active');
		}
		else {
		  //do 
		}

	});

  $('.expand-text').click(function() {
    if ($(window).width() < 768) {
      $(this).removeClass('active');
      $('.expansion').slideDown();
      $('.collapse-text').addClass('active');
    }
    else {
     
    }
  });

  $('.collapse-text').click(function() {
  	if ($(window).width() < 768) {
      $('.expansion').slideUp();
  
      setTimeout(function(){ 
        $('.collapse-text').removeClass('active'); 
        $('.expand-text').addClass('active');
      }, 250);
    }
    else {
     
    }
  	
  });

    $('.nav-link').click(function (e) {
    $(this).tab('show');
    $('.nav-item').removeClass('active');
    $(this).parent().addClass('active');
  });

  $('.slide-info').matchHeight();
  $('.wpcf7 input, .wpcf7 textarea').attr('autocomplete', 'off');
  $('.wpcf7 input, .wpcf7 textarea').attr('onfocus', 'this.value=""');

  SVGInject($("img.svg-inject"));

});

$( window ).load(function() {
  $(".tribe-countdown-time").attr("ID",null);
  var hash = window.location.hash;

  $(function(){
    $('html, body').animate({
        scrollTop: $(hash).offset().top
    }, 500);
    return false;
});
});

