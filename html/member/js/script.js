/* top navigation fixed */
var nav = $('nav');
var offset = nav.offset();
var gap = $('#nav-gap');
jQuery(function($) {
	$(window).scroll(function () {
	  if($(window).scrollTop() > offset.top) {
      height = nav.height();
      gap.css('display','block');
      gap.css('height',nav.height());
	    nav.addClass('nav-fixed');
	  } else {
      gap.css('display','none');
	    nav.removeClass('nav-fixed');
	  }
	});
});
/* navigation mobile */
$(document).ready(function(){
  if(window.innerWidth <= 767) {
    $('nav ul').css('display','none');
  }
});
$(window).resize(function(){
  if(window.innerWidth <= 767) {
    $('nav ul').css('display','none');
  } else {
    $('nav ul').css('display','block');
  }
});
$('.nav-switch').click(function(){
  if(window.innerWidth <= 767) {
    if($('nav div ul').css('display')=='none'){
      $('nav div ul').slideDown('normal');
      $('nav div span.icon').html('<i class="fa fa-angle-up" aria-hidden="true"></i>');
    }else{
      $('nav div ul').slideUp('normal');
      $('nav div span.icon').html('<i class="fa fa-angle-down" aria-hidden="true"></i>');
    }
  }
});

$(function(){
  $('a[href^=#]').click(function() {
	  if(window.innerWidth <= 767) {
			$('nav div ul').css('display','none');
			$('nav div span.icon').html('<i class="fa fa-angle-down" aria-hidden="true"></i>');
		}
  });
});

/* tap */
$(function(){
  $('.tap').bind('touchstart', function(){
    $(this).addClass('ontap');
  }).bind('touchend', function(){
    $(this).removeClass('ontap');
  });
});

/* smooth scroll */
$(function() {
  $(".top-scroll").on('click', function () {
    $('html,body').animate({ scrollTop: 0 }, 'swing');
      return false;
    });
});
